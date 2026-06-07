@extends('layouts.app')
@section('title', 'Kasir')
@section('header_title', 'Kasir')

@section('content')
    <div class="space-y-4">

        {{-- Search & Cart Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Product Grid --}}
            <div class="lg:col-span-2 space-y-4">
                {{-- Search Bar --}}
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="search-produk" placeholder="Cari atau scan barcode produk..."
                        class="w-full h-14 pl-12 pr-4 text-sm font-medium bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none transition-all dark:text-white dark:placeholder-slate-500"
                        autofocus>
                </div>

                {{-- Category Filter --}}
                <div class="flex gap-2 overflow-x-auto pb-2 custom-scrollbar">
                    <button
                        class="flex-shrink-0 px-4 py-2 rounded-xl text-xs font-bold bg-blue-500 text-white shadow-sm">Semua</button>
                    @foreach ($kategoris ?? [] as $kat)
                        <button
                            class="flex-shrink-0 px-4 py-2 rounded-xl text-xs font-bold bg-white dark:bg-white/5 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-white/10 hover:bg-blue-50 dark:hover:bg-blue-500/10 transition-colors">{{ $kat->nama }}</button>
                    @endforeach
                </div>

                {{-- Product Cards --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3" id="product-grid">
                    @forelse($produks ?? [] as $produk)
                        <button onclick="addToCart({{ $produk->id }}, '{{ $produk->nama }}', {{ $produk->harga_jual }})"
                            class="bg-white dark:bg-white/5 rounded-2xl p-3 border border-slate-100 dark:border-white/10 hover:shadow-md hover:border-blue-200 dark:hover:border-blue-500/30 transition-all text-left group">
                            <div
                                class="w-full aspect-square rounded-xl bg-slate-100 dark:bg-white/5 mb-2 flex items-center justify-center overflow-hidden">
                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <svg class="w-8 h-8 text-slate-300 dark:text-slate-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                @endif
                            </div>
                            <p class="text-xs font-bold text-slate-800 dark:text-white truncate">{{ $produk->nama }}</p>
                            <p class="text-xs font-black text-blue-500 mt-0.5">Rp
                                {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
                            <p class="text-[10px] text-slate-400 mt-0.5">Stok: {{ $produk->stok }}</p>
                        </button>
                    @empty
                        <div class="col-span-full text-center py-12 text-slate-400">
                            <p class="text-sm font-bold">Belum ada produk</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Cart Panel --}}
            <div
                class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 shadow-sm flex flex-col h-fit lg:sticky lg:top-4">
                <div class="p-4 border-b border-slate-100 dark:border-white/10">
                    <h3 class="text-sm font-black text-slate-800 dark:text-white uppercase tracking-wider">🛒 Keranjang</h3>
                </div>

                <div class="flex-1 p-4 space-y-3 max-h-96 overflow-y-auto custom-scrollbar" id="cart-items">
                    <p class="text-sm text-slate-400 text-center py-8">Keranjang kosong</p>
                </div>

                <div class="p-4 border-t border-slate-100 dark:border-white/10 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-slate-400 font-medium">Subtotal</span>
                        <span class="font-black text-slate-800 dark:text-white" id="cart-subtotal">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-lg">
                        <span class="text-slate-800 dark:text-white font-black">Total</span>
                        <span class="font-black text-blue-500" id="cart-total">Rp 0</span>
                    </div>

                    {{-- Payment Method --}}
                    <div class="grid grid-cols-2 gap-2">
                        <button onclick="processPayment('tunai')"
                            class="h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-xl font-bold text-sm hover:shadow-lg transition-all active:scale-[0.98]">
                            💵 Tunai
                        </button>
                        <button onclick="processPayment('qris')"
                            class="h-12 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl font-bold text-sm hover:shadow-lg transition-all active:scale-[0.98]">
                            📱 QRIS
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        {{-- Tambahkan Script Midtrans Snap --}}
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>

        <script>
            let cart = [];

            function addToCart(id, nama, harga) {
                const existing = cart.find(item => item.id === id);
                if (existing) {
                    existing.jumlah++;
                } else {
                    cart.push({
                        id,
                        nama,
                        harga,
                        jumlah: 1
                    });
                }
                renderCart();
            }

            function removeFromCart(id) {
                cart = cart.filter(item => item.id !== id);
                renderCart();
            }

            function renderCart() {
                const container = document.getElementById('cart-items');
                if (cart.length === 0) {
                    container.innerHTML = '<p class="text-sm text-slate-400 text-center py-8">Keranjang kosong</p>';
                } else {
                    container.innerHTML = cart.map(item => `
            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-white/5">
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-slate-800 dark:text-white truncate">${item.nama}</p>
                    <p class="text-xs text-blue-500 font-bold">Rp ${item.harga.toLocaleString('id-ID')} × ${item.jumlah}</p>
                </div>
                <div class="flex items-center gap-1">
                    <button onclick="updateQty(${item.id}, -1)" class="w-7 h-7 rounded-lg bg-slate-200 dark:bg-white/10 text-slate-600 dark:text-white text-xs font-bold hover:bg-slate-300">−</button>
                    <span class="w-8 text-center text-xs font-black text-slate-800 dark:text-white">${item.jumlah}</span>
                    <button onclick="updateQty(${item.id}, 1)" class="w-7 h-7 rounded-lg bg-blue-500 text-white text-xs font-bold hover:bg-blue-600">+</button>
                    <button onclick="removeFromCart(${item.id})" class="w-7 h-7 rounded-lg text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-500/10 text-xs ml-1">✕</button>
                </div>
            </div>
        `).join('');
                }

                const total = cart.reduce((sum, item) => sum + (item.harga * item.jumlah), 0);
                document.getElementById('cart-subtotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
                document.getElementById('cart-total').textContent = 'Rp ' + total.toLocaleString('id-ID');
            }

            function updateQty(id, delta) {
                const item = cart.find(i => i.id === id);
                if (item) {
                    item.jumlah += delta;
                    if (item.jumlah <= 0) removeFromCart(id);
                    else renderCart();
                }
            }

            // UPDATE FUNGSI PROCESS PAYMENT
            async function processPayment(method) {
                if (cart.length === 0) {
                    alert('Keranjang masih kosong!');
                    return;
                }

                if (method === 'qris') {
                    try {
                        // Ubah teks tombol sementara agar user tau sedang loading
                        const btnQris = document.querySelector('button[onclick="processPayment(\'qris\')"]');
                        const originalText = btnQris.innerHTML;
                        btnQris.innerHTML = '⏳ Memproses...';
                        btnQris.disabled = true;

                        // 1. Kirim data keranjang ke Controller menggunakan Fetch API
                        const response = await fetch('/checkout-kasir', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                // CSRF Token WAJIB disertakan karena kita menggunakan route web
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                items: cart,
                                method: 'qris'
                            })
                        });

                        const result = await response.json();

                        // Kembalikan tombol seperti semula
                        btnQris.innerHTML = originalText;
                        btnQris.disabled = false;

                        // 2. Jika Token berhasil didapat, panggil Midtrans Snap
                        if (result.snap_token) {
                            window.snap.pay(result.snap_token, {
                                onSuccess: function(result) {
                                    alert("Pembayaran QRIS Berhasil!");
                                    console.log(result);
                                    cart = []; // Kosongkan keranjang
                                    renderCart();
                                },
                                onPending: function(result) {
                                    alert("Menunggu pembayaran!");
                                    console.log(result);
                                },
                                onError: function(result) {
                                    alert("Pembayaran gagal!");
                                    console.log(result);
                                },
                                onClose: function() {
                                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                                }
                            });
                        } else {
                            alert('Gagal membuat transaksi: ' + (result.message || 'Kesalahan sistem'));
                        }

                    } catch (error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat menghubungi server.');
                    }
                } else {
                    // Logika untuk pembayaran Tunai (Bisa diarahkan ke backend untuk simpan database langsung)
                    alert('Pembayaran TUNAI berhasil!');
                    cart = [];
                    renderCart();
                }
            }
        </script>
    @endpush
@endsection

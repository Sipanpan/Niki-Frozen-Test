@extends('layouts.app')
@section('title', 'Daftar Produk')
@section('header_title', 'Daftar Produk')
@section('content')
<div class="space-y-4">
    <div class="flex flex-col sm:flex-row gap-3 items-start sm:items-center justify-between">
        <div class="relative flex-1 max-w-sm">
            <input type="text" placeholder="Cari produk..." class="w-full h-10 pl-10 pr-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
            <svg class="w-4 h-4 absolute left-3 top-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <a href="{{ url('/produk/create') }}" class="h-10 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-bold inline-flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            Tambah Produk
        </a>
    </div>
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-slate-100 dark:border-white/10">
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Produk</th>
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">SKU</th>
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Kategori</th>
                    <th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Harga Beli</th>
                    <th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Harga Jual</th>
                    <th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Stok</th>
                    <th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Aksi</th>
                </tr></thead>
                <tbody>
                    @forelse($produks ?? [] as $p)
                    <tr class="border-b border-slate-50 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                        <td class="p-4"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-white/5 flex items-center justify-center flex-shrink-0 overflow-hidden">@if($p->gambar)<img src="{{ asset('storage/'.$p->gambar) }}" class="w-full h-full object-cover">@else<svg class="w-5 h-5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>@endif</div><span class="font-bold text-slate-800 dark:text-white">{{ $p->nama }}</span></div></td>
                        <td class="p-4 font-mono text-slate-500">{{ $p->sku ?? '-' }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $p->kategori->nama ?? '-' }}</td>
                        <td class="p-4 text-right text-slate-600 dark:text-slate-300">Rp {{ number_format($p->harga_beli, 0, ',', '.') }}</td>
                        <td class="p-4 text-right font-bold text-slate-800 dark:text-white">Rp {{ number_format($p->harga_jual, 0, ',', '.') }}</td>
                        <td class="p-4 text-center"><span class="px-2 py-1 rounded-lg text-xs font-bold {{ $p->isLowStock() ? 'bg-rose-50 text-rose-600 dark:bg-rose-500/10 dark:text-rose-400' : 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400' }}">{{ $p->stok }}</span></td>
                        <td class="p-4 text-center">
                            <a href="{{ url('/produk/'.$p->id.'/edit') }}" class="text-blue-500 hover:text-blue-600 font-bold text-xs">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="p-8 text-center text-slate-400">Belum ada produk</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ ($produks ?? collect())->links() }}
</div>
@endsection

@extends('layouts.app')
@section('title', 'Tambah Penjualan')
@section('header_title', 'Tambah Penjualan')
@section('content')
<div class="max-w-4xl">
    <form method="POST" action="{{ url('/penjualan') }}" class="space-y-6">
        @csrf
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Pelanggan</label>
                    <select name="pelanggan_id" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                        <option value="">Umum (Walk-in)</option>
                        @foreach($pelanggans ?? [] as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Metode Bayar</label>
                    <select name="metode_bayar" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                        <option value="tunai">Tunai</option>
                        <option value="qris">QRIS</option>
                        <option value="transfer">Transfer</option>
                        <option value="hutang">Hutang</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Keterangan</label>
                <textarea name="keterangan" rows="2" class="w-full px-4 py-3 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none" placeholder="Catatan tambahan..."></textarea>
            </div>
        </div>
        <button type="submit" class="h-12 px-8 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold text-sm transition-colors">Simpan Penjualan</button>
    </form>
</div>
@endsection

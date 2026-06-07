@extends('layouts.app')
@section('title', 'Tambah Pembelian')
@section('header_title', 'Tambah Pembelian')
@section('content')
<div class="max-w-4xl">
    <form method="POST" action="{{ url('/pembelian') }}" class="space-y-6">
        @csrf
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Supplier</label>
                    <select name="supplier_id" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                        <option value="">Pilih Supplier</option>
                        @foreach($suppliers ?? [] as $s)
                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">No. Faktur</label>
                    <input type="text" name="no_faktur" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none" placeholder="No. Faktur">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ now()->format('Y-m-d') }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Status Bayar</label>
                    <select name="status_bayar" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                        <option value="lunas">Lunas</option>
                        <option value="belum_lunas">Belum Lunas</option>
                        <option value="sebagian">Sebagian</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Keterangan</label>
                <textarea name="keterangan" rows="2" class="w-full px-4 py-3 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none" placeholder="Catatan..."></textarea>
            </div>
        </div>
        <button type="submit" class="h-12 px-8 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold text-sm transition-colors">Simpan Pembelian</button>
    </form>
</div>
@endsection

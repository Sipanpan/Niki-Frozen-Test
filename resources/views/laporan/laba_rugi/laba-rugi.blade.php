@extends('layouts.app')
@section('title', 'Laba Rugi')
@section('header_title', 'Laporan Laba Rugi')
@section('content')
<div class="space-y-4">
    <div class="flex gap-2"><input type="date" name="dari" value="{{ request('dari', now()->startOfMonth()->format('Y-m-d')) }}" class="h-10 px-3 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"><input type="date" name="sampai" value="{{ request('sampai', now()->format('Y-m-d')) }}" class="h-10 px-3 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-5"><p class="text-xs font-bold text-slate-400 mb-1">Total Penjualan</p><p class="text-2xl font-black text-emerald-500">Rp {{ number_format($totalPenjualan ?? 0, 0, ',', '.') }}</p></div>
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-5"><p class="text-xs font-bold text-slate-400 mb-1">Total Pengeluaran</p><p class="text-2xl font-black text-rose-500">Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}</p></div>
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-5"><p class="text-xs font-bold text-slate-400 mb-1">Laba Bersih</p><p class="text-2xl font-black {{ ($labaBersih ?? 0) >= 0 ? 'text-emerald-500' : 'text-rose-500' }}">Rp {{ number_format($labaBersih ?? 0, 0, ',', '.') }}</p></div>
    </div>
</div>
@endsection

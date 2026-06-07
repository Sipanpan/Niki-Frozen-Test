@extends('layouts.app')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Greeting --}}
    <div>
        <h2 class="text-2xl font-black text-slate-800 dark:text-white tracking-tight">
            Halo, {{ Auth::user()->name ?? 'User' }}! 👋
        </h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mt-1">
            Berikut ringkasan toko Anda hari ini — {{ now()->translatedFormat('l, d F Y') }}
        </p>
    </div>

    {{-- Metric Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Penjualan Hari Ini --}}
        <div class="bg-white dark:bg-white/5 rounded-2xl p-5 border border-slate-100 dark:border-white/10 shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
            </div>
            <p class="text-2xl font-black text-slate-800 dark:text-white">Rp {{ number_format($penjualanHariIni ?? 0, 0, ',', '.') }}</p>
            <p class="text-xs font-bold text-slate-400 mt-1">Penjualan Hari Ini</p>
        </div>

        {{-- Transaksi Hari Ini --}}
        <div class="bg-white dark:bg-white/5 rounded-2xl p-5 border border-slate-100 dark:border-white/10 shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path></svg>
                </div>
            </div>
            <p class="text-2xl font-black text-slate-800 dark:text-white">{{ $transaksiHariIni ?? 0 }}</p>
            <p class="text-xs font-bold text-slate-400 mt-1">Transaksi Hari Ini</p>
        </div>

        {{-- Total Produk --}}
        <div class="bg-white dark:bg-white/5 rounded-2xl p-5 border border-slate-100 dark:border-white/10 shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-violet-50 dark:bg-violet-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <p class="text-2xl font-black text-slate-800 dark:text-white">{{ $totalProduk ?? 0 }}</p>
            <p class="text-xs font-bold text-slate-400 mt-1">Total Produk</p>
        </div>

        {{-- Stok Menipis --}}
        <div class="bg-white dark:bg-white/5 rounded-2xl p-5 border border-slate-100 dark:border-white/10 shadow-sm hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
                </div>
            </div>
            <p class="text-2xl font-black text-slate-800 dark:text-white">{{ $stokMenipis ?? 0 }}</p>
            <p class="text-xs font-bold text-slate-400 mt-1">Stok Menipis</p>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ url('/kasir') }}" class="flex items-center gap-3 p-4 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl text-white shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30 transition-all duration-200 group">
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-black">Buka Kasir</p>
                <p class="text-xs text-white/70">Mulai transaksi</p>
            </div>
        </a>

        <a href="{{ url('/produk/create') }}" class="flex items-center gap-3 p-4 bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 shadow-sm hover:shadow-md transition-all duration-200 group">
            <div class="w-10 h-10 rounded-xl bg-violet-50 dark:bg-violet-500/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            </div>
            <div>
                <p class="text-sm font-black text-slate-800 dark:text-white">Tambah Produk</p>
                <p class="text-xs text-slate-400">Produk baru</p>
            </div>
        </a>

        <a href="{{ url('/pembelian/create') }}" class="flex items-center gap-3 p-4 bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 shadow-sm hover:shadow-md transition-all duration-200 group">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-black text-slate-800 dark:text-white">Pembelian</p>
                <p class="text-xs text-slate-400">Tambah stok</p>
            </div>
        </a>

        <a href="{{ url('/laporan/laba-rugi') }}" class="flex items-center gap-3 p-4 bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 shadow-sm hover:shadow-md transition-all duration-200 group">
            <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-500/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-black text-slate-800 dark:text-white">Laporan</p>
                <p class="text-xs text-slate-400">Laba rugi</p>
            </div>
        </a>
    </div>

</div>
@endsection

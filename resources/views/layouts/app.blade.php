<!DOCTYPE html>
<html lang="id" class="bg-theme-bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>@yield('title', 'Dashboard') — Niki Frozen</title>
    <meta name="description" content="Niki Frozen — Sistem Point of Sale & Inventory Management Modern">
    <meta name="robots" content="noindex, nofollow">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('brana-logo.png') }}">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="h-full overflow-hidden bg-theme-bg transition-colors duration-300 flex flex-col">

<div class="flex flex-1 h-full overflow-hidden min-h-0">

    {{-- ============================================================ --}}
    {{-- SIDEBAR --}}
    {{-- ============================================================ --}}
    <aside id="sidebar" class="fixed inset-y-0 left-0 h-full z-40 w-64 transform -translate-x-full lg:translate-x-0 transition-all duration-300 ease-in-out lg:sticky lg:top-0 flex-shrink-0 print:hidden">
        <div class="flex flex-col h-full bg-[rgb(var(--color-nav-deep))] text-white border-r border-white/5 shadow-2xl overflow-hidden">

            {{-- Brand --}}
            <div class="flex items-center gap-4 px-6 border-b border-white/5 flex-shrink-0 sticky top-0 z-20 bg-[rgb(var(--color-nav-deep))] sidebar-brand-safe-area">
                <div class="flex items-center justify-center w-12 h-12 rounded-2xl overflow-hidden bg-white/10 backdrop-blur-md border border-white/10 flex-shrink-0 shadow-lg shadow-black/20">
                    <img src="{{ asset('brana-logo.png') }}" alt="Niki Frozen" class="w-12 h-12 object-contain p-1.5" onerror="this.onerror=null; this.src='{{ asset('logo.png') }}'">
                </div>
                <div class="min-w-0 flex-1">
                    <h1 class="text-xl font-black tracking-tighter truncate leading-none mb-1 uppercase font-display flex items-baseline gap-1">
                        <span class="text-white">BRANA</span>
                        <span class="text-[rgb(var(--color-nav-active))]">POS</span>
                    </h1>
                    <div class="flex items-center gap-1.5 overflow-hidden">
                        <span class="relative flex h-1.5 w-1.5 flex-shrink-0">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                        </span>
                        <p class="text-[10px] font-bold text-slate-400 truncate uppercase tracking-[0.15em]">Niki Frozen</p>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto custom-scrollbar">
                <div class="px-4 space-y-6 pt-4">

                    {{-- UTAMA --}}
                    <div class="space-y-2">
                        <p class="px-3 mb-2 text-[10px] font-black uppercase tracking-[0.2em] text-white/50 font-display">UTAMA</p>
                        <div class="menu-group" data-open="false">
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 relative {{ request()->routeIs('dashboard') ? 'bg-[rgb(var(--color-nav-active))] text-[rgb(var(--color-nav-deep))] shadow-lg shadow-black/20' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                <span class="font-display">Dashboard</span>
                            </a>
                        </div>
                    </div>

                    {{-- TRANSAKSI --}}
                    <div class="space-y-2">
                        <p class="px-3 mb-2 text-[10px] font-black uppercase tracking-[0.2em] text-white/50 font-display">TRANSAKSI</p>

                        {{-- Penjualan --}}
                        <div class="menu-group" data-open="{{ request()->is('kasir*', 'penjualan*', 'retur*', 'piutang*') ? 'true' : 'false' }}">
                            <button type="button" class="menu-toggle w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 group relative text-white/80 hover:bg-white/5 hover:text-white">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path></svg>
                                    <span class="font-display">Penjualan</span>
                                </span>
                                <svg class="chevron w-4 h-4 flex-shrink-0 transition-transform duration-200 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="submenu overflow-hidden transition-all duration-300 max-h-0">
                                <ul class="ml-6 pl-4 border-l border-white/10 space-y-1 py-1">
                                    <li><a href="{{ url('/kasir') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('kasir*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Kasir</span></a></li>
                                    <li><a href="{{ url('/penjualan') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('penjualan*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Riwayat Penjualan</span></a></li>
                                    <li><a href="{{ url('/retur') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('retur*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Retur Penjualan</span></a></li>
                                    <li><a href="{{ url('/piutang') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('piutang*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Piutang</span></a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- Pembelian --}}
                        <div class="menu-group" data-open="{{ request()->is('pembelian*', 'hutang*', 'retur-pembelian*') ? 'true' : 'false' }}">
                            <button type="button" class="menu-toggle w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 group relative text-white/80 hover:bg-white/5 hover:text-white">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    <span class="font-display">Pembelian</span>
                                </span>
                                <svg class="chevron w-4 h-4 flex-shrink-0 transition-transform duration-200 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="submenu overflow-hidden transition-all duration-300 max-h-0">
                                <ul class="ml-6 pl-4 border-l border-white/10 space-y-1 py-1">
                                    <li><a href="{{ url('/pembelian') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('pembelian') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Daftar Pembelian</span></a></li>
                                    <li><a href="{{ url('/pembelian/create') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('pembelian/create') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Tambah Pembelian</span></a></li>
                                    <li><a href="{{ url('/hutang') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('hutang*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Hutang</span></a></li>
                                    <li><a href="{{ url('/retur-pembelian') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('retur-pembelian*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Retur Pembelian</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- DATA MASTER --}}
                    <div class="space-y-2">
                        <p class="px-3 mb-2 text-[10px] font-black uppercase tracking-[0.2em] text-white/50 font-display">DATA MASTER</p>

                        {{-- Produk --}}
                        <div class="menu-group" data-open="{{ request()->is('produk*') ? 'true' : 'false' }}">
                            <button type="button" class="menu-toggle w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 group relative text-white/80 hover:bg-white/5 hover:text-white">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    <span class="font-display">Produk</span>
                                </span>
                                <svg class="chevron w-4 h-4 flex-shrink-0 transition-transform duration-200 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="submenu overflow-hidden transition-all duration-300 max-h-0">
                                <ul class="ml-6 pl-4 border-l border-white/10 space-y-1 py-1">
                                    <li><a href="{{ url('/produk') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('produk') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Daftar Produk</span></a></li>
                                    <li><a href="{{ url('/kategori') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('kategori*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Kategori</span></a></li>
                                    <li><a href="{{ url('/satuan') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('satuan*') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Satuan</span></a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- Pelanggan --}}
                        <div class="menu-group" data-open="{{ request()->is('pelanggan*') ? 'true' : 'false' }}">
                            <button type="button" class="menu-toggle w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 group relative text-white/80 hover:bg-white/5 hover:text-white">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    <span class="font-display">Pelanggan</span>
                                </span>
                                <svg class="chevron w-4 h-4 flex-shrink-0 transition-transform duration-200 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="submenu overflow-hidden transition-all duration-300 max-h-0">
                                <ul class="ml-6 pl-4 border-l border-white/10 space-y-1 py-1">
                                    <li><a href="{{ url('/pelanggan') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('pelanggan') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Daftar Pelanggan</span></a></li>
                                    <li><a href="{{ url('/pelanggan/create') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('pelanggan/create') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Tambah Pelanggan</span></a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- Supplier --}}
                        <div class="menu-group" data-open="{{ request()->is('supplier*') ? 'true' : 'false' }}">
                            <button type="button" class="menu-toggle w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 group relative text-white/80 hover:bg-white/5 hover:text-white">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    <span class="font-display">Supplier</span>
                                </span>
                                <svg class="chevron w-4 h-4 flex-shrink-0 transition-transform duration-200 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="submenu overflow-hidden transition-all duration-300 max-h-0">
                                <ul class="ml-6 pl-4 border-l border-white/10 space-y-1 py-1">
                                    <li><a href="{{ url('/supplier') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('supplier') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Daftar Supplier</span></a></li>
                                    <li><a href="{{ url('/supplier/create') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 {{ request()->is('supplier/create') ? 'text-white' : 'text-white/60 hover:text-white hover:translate-x-1' }}"><span class="font-display">Tambah Supplier</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- LAPORAN --}}
                    <div class="space-y-2">
                        <p class="px-3 mb-2 text-[10px] font-black uppercase tracking-[0.2em] text-white/50 font-display">LAPORAN</p>

                        {{-- Laba Rugi --}}
                        <div class="menu-group" data-open="{{ request()->is('laporan/laba-rugi*', 'laporan/pengeluaran*') ? 'true' : 'false' }}">
                            <button type="button" class="menu-toggle w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 group relative text-white/80 hover:bg-white/5 hover:text-white">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                    <span class="font-display">Laba Rugi</span>
                                </span>
                                <svg class="chevron w-4 h-4 flex-shrink-0 transition-transform duration-200 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="submenu overflow-hidden transition-all duration-300 max-h-0">
                                <ul class="ml-6 pl-4 border-l border-white/10 space-y-1 py-1">
                                    <li><a href="{{ url('/laporan/laba-rugi') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 text-white/60 hover:text-white hover:translate-x-1"><span class="font-display">Laba Rugi</span></a></li>
                                    <li><a href="{{ url('/laporan/pengeluaran') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 text-white/60 hover:text-white hover:translate-x-1"><span class="font-display">Input Biaya Operasional</span></a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- Laporan Toko --}}
                        <div class="menu-group" data-open="{{ request()->is('laporan/laporan*', 'laporan/performa*', 'laporan/stock*') ? 'true' : 'false' }}">
                            <button type="button" class="menu-toggle w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 group relative text-white/80 hover:bg-white/5 hover:text-white">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path></svg>
                                    <span class="font-display">Laporan Toko</span>
                                </span>
                                <svg class="chevron w-4 h-4 flex-shrink-0 transition-transform duration-200 opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="submenu overflow-hidden transition-all duration-300 max-h-0">
                                <ul class="ml-6 pl-4 border-l border-white/10 space-y-1 py-1">
                                    <li><a href="{{ url('/laporan/laporan') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 text-white/60 hover:text-white hover:translate-x-1"><span class="font-display">Laporan Shift</span></a></li>
                                    <li><a href="{{ url('/laporan/performa-karyawan') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 text-white/60 hover:text-white hover:translate-x-1"><span class="font-display">Performa Karyawan</span></a></li>
                                    <li><a href="{{ url('/laporan/stock-opname') }}" class="flex items-center gap-3 py-2 rounded-lg text-[13px] font-bold transition-all duration-150 text-white/60 hover:text-white hover:translate-x-1"><span class="font-display">Stock Opname</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- KONFIGURASI --}}
                    <div class="space-y-2">
                        <p class="px-3 mb-2 text-[10px] font-black uppercase tracking-[0.2em] text-white/50 font-display">KONFIGURASI</p>

                        <div class="menu-group" data-open="{{ request()->is('karyawan*') ? 'true' : 'false' }}">
                            <a href="{{ url('/karyawan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 relative {{ request()->is('karyawan*') ? 'bg-[rgb(var(--color-nav-active))] text-[rgb(var(--color-nav-deep))] shadow-lg shadow-black/20' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <span class="font-display">Karyawan</span>
                            </a>
                        </div>

                        <div class="menu-group" data-open="false">
                            <a href="{{ url('/absensi') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-bold transition-all duration-200 relative {{ request()->is('absensi*') ? 'bg-[rgb(var(--color-nav-active))] text-[rgb(var(--color-nav-deep))] shadow-lg shadow-black/20' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="font-display">Kalender Shift</span>
                            </a>
                        </div>
                    </div>

                </div>
            </nav>

            {{-- User Info --}}
            <div class="px-5 py-5 border-t border-white/5 flex-shrink-0 bg-[rgb(var(--color-nav-deep))] mt-auto sticky bottom-0 z-20 w-full">
                <div class="flex items-center gap-3 px-3 py-2.5 rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 transition-all duration-200 group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-[rgb(var(--color-nav-active))] to-amber-600 text-[rgb(var(--color-nav-deep))] text-sm font-black shadow-lg flex-shrink-0">
                        {{ Auth::user()->initial ?? 'U' }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ url('/profil') }}" class="block">
                            <p class="text-[13px] font-black truncate text-white uppercase tracking-tight">{{ Auth::user()->name ?? 'User' }}</p>
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">⭐ {{ ucfirst(Auth::user()->role ?? 'kasir') }}</p>
                        </a>
                    </div>
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" title="Keluar" class="w-8 h-8 flex items-center justify-center rounded-lg text-white/30 hover:text-rose-500 hover:bg-rose-500/10 transition-all">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </aside>

    {{-- Sidebar Overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/50 hidden lg:hidden transition-opacity duration-300"></div>

    {{-- ============================================================ --}}
    {{-- MAIN CONTENT --}}
    {{-- ============================================================ --}}
    <div id="main-content" class="flex-1 flex flex-col overflow-hidden transition-transform duration-300 ease-in-out">

        {{-- Header --}}
        <header class="sticky top-0 z-40 bg-white border-b border-slate-100 dark:bg-[rgb(var(--color-nav-deep))] dark:border-white/10 flex-shrink-0 header-safe-area print:hidden">
            <div class="flex items-center justify-between h-[60px] lg:h-[72px] px-6">
                {{-- Left --}}
                <div class="flex items-center gap-6">
                    {{-- Mobile sidebar toggle --}}
                    <button id="mobile-sidebar-toggle" type="button" class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" aria-label="Toggle sidebar">
                        <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    {{-- Desktop sidebar toggle --}}
                    <button id="sidebar-toggle" type="button" class="hidden lg:inline-flex items-center justify-center w-10 h-10 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" aria-label="Toggle sidebar">
                        <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <div class="flex items-baseline gap-2 whitespace-nowrap min-w-0">
                        <h1 class="text-sm md:text-xl font-black text-slate-800 dark:text-white tracking-tight truncate">@yield('header_title', 'Dashboard')</h1>
                    </div>
                </div>

                {{-- Right --}}
                <div class="flex-1 flex items-center justify-end gap-3 ml-8">
                    {{-- Search --}}
                    <div class="relative flex-1 max-w-md hidden md:block group">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input id="global-search" type="text" placeholder="Cari produk..." class="block w-full h-11 pl-11 pr-4 text-sm font-medium bg-slate-100 border border-slate-200/50 rounded-2xl dark:bg-white/5 dark:text-slate-100 dark:placeholder-zinc-500 dark:border-none focus:ring-2 focus:ring-blue-500/20 focus:bg-white dark:focus:bg-white/10 transition-all outline-none" autocomplete="off">
                    </div>

                    {{-- Theme Toggle --}}
                    <button id="theme-toggle" type="button" class="relative inline-flex items-center w-14 h-7 rounded-full bg-gray-200 dark:bg-gray-700 transition-colors duration-300 focus:outline-none shadow-inner" aria-label="Toggle dark mode">
                        <span class="absolute left-1 top-1 flex items-center justify-center w-5 h-5 rounded-full bg-white shadow-sm transition-transform duration-300 transform dark:translate-x-7 dark:bg-gray-800">
                            <svg class="w-3.5 h-3.5 text-amber-500 block dark:hidden" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.707a1 1 0 01-1.414 1.414l-.708-.707a1 1 0 010-1.414zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zm-4.22 4.22a1 1 0 010 1.415l-.707.708a1 1 0 01-1.414-1.414l.707-.708a1 1 0 011.414 0zM10 18a1 1 0 01-1-1v-1a1 1 0 112 0v1a1 1 0 01-1 1zm-4.22-4.22a1 1 0 01-1.415 0l-.708-.707a1 1 0 011.414-1.414l.708.707a1 1 0 010 1.414zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zm4.22-4.22a1 1 0 010-1.415l.707-.708a1 1 0 011.414 1.414l-.707.708a1 1 0 01-1.414 0zM10 5a5 5 0 100 10 5 5 0 000-10z" clip-rule="evenodd"></path></svg>
                            <svg class="w-3.5 h-3.5 text-blue-400 hidden dark:block" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        </span>
                    </button>

                    <div class="h-6 w-px bg-slate-200 dark:bg-slate-700/50 mx-1 hidden md:block"></div>

                    {{-- Clock --}}
                    <div class="hidden xl:flex items-center gap-2 px-4 py-2 bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/10 rounded-2xl text-[13px] font-black tabular-nums tracking-wide text-slate-600 dark:text-slate-200 transition-colors">
                        <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="real-time-clock">--:--:--</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mx-4 mt-4 p-4 rounded-2xl bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 text-sm font-bold" id="flash-success">
                {{ session('success') }}
            </div>
            <script>setTimeout(() => document.getElementById('flash-success')?.remove(), 5000);</script>
        @endif

        @if(session('error'))
            <div class="mx-4 mt-4 p-4 rounded-2xl bg-rose-50 dark:bg-rose-500/10 border border-rose-200 dark:border-rose-500/20 text-rose-700 dark:text-rose-400 text-sm font-bold" id="flash-error">
                {{ session('error') }}
            </div>
            <script>setTimeout(() => document.getElementById('flash-error')?.remove(), 8000);</script>
        @endif

        {{-- Page Content --}}
        <main id="global-scroll-area" class="flex-1 overflow-y-auto p-6 custom-scrollbar">
            @yield('content')
        </main>

        {{-- Bottom Nav (Mobile) --}}
        <nav class="lg:hidden bottom-nav-safe-area bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-white/10 print:hidden">
            <div class="flex items-center justify-around h-16">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 px-3 py-2 {{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-slate-400' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="text-[10px] font-bold">Home</span>
                </a>
                <a href="{{ url('/kasir') }}" class="flex flex-col items-center gap-1 px-3 py-2 {{ request()->is('kasir*') ? 'text-blue-500' : 'text-slate-400' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path></svg>
                    <span class="text-[10px] font-bold">Kasir</span>
                </a>
                <a href="{{ url('/produk') }}" class="flex flex-col items-center gap-1 px-3 py-2 {{ request()->is('produk*') ? 'text-blue-500' : 'text-slate-400' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    <span class="text-[10px] font-bold">Produk</span>
                </a>
                <a href="{{ url('/profil') }}" class="flex flex-col items-center gap-1 px-3 py-2 {{ request()->is('profil*') ? 'text-blue-500' : 'text-slate-400' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-[10px] font-bold">Profil</span>
                </a>
            </div>
        </nav>
    </div>

</div>

@stack('scripts')
</body>
</html>

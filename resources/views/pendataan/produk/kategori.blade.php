@extends('layouts.app')
@section('title', 'Kategori Produk')
@section('header_title', 'Kategori Produk')
@section('content')
<div class="space-y-4 max-w-2xl">
    <form method="POST" action="{{ url('/kategori') }}" class="flex gap-2">
        @csrf
        <input type="text" name="nama" required placeholder="Nama kategori baru..." class="flex-1 h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
        <button type="submit" class="h-11 px-6 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-bold transition-colors">Tambah</button>
    </form>
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 divide-y divide-slate-100 dark:divide-white/10">
        @forelse($kategoris ?? [] as $k)
        <div class="flex items-center justify-between p-4 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
            <span class="font-bold text-slate-800 dark:text-white">{{ $k->nama }}</span>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-400">{{ $k->produks_count ?? 0 }} produk</span>
                <form method="POST" action="{{ url('/kategori/'.$k->id) }}" onsubmit="return confirm('Hapus kategori?')">@csrf @method('DELETE')<button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-bold">Hapus</button></form>
            </div>
        </div>
        @empty
        <p class="p-8 text-center text-slate-400 text-sm">Belum ada kategori</p>
        @endforelse
    </div>
</div>
@endsection

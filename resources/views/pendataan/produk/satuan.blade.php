@extends('layouts.app')
@section('title', 'Satuan Produk')
@section('header_title', 'Satuan Produk')
@section('content')
<div class="space-y-4 max-w-2xl">
    <form method="POST" action="{{ url('/satuan') }}" class="flex gap-2">
        @csrf
        <input type="text" name="nama" required placeholder="Nama satuan (pcs, kg, liter...)" class="flex-1 h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
        <button type="submit" class="h-11 px-6 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-bold transition-colors">Tambah</button>
    </form>
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 divide-y divide-slate-100 dark:divide-white/10">
        @forelse($satuans ?? [] as $s)
        <div class="flex items-center justify-between p-4 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
            <span class="font-bold text-slate-800 dark:text-white">{{ $s->nama }}</span>
            <form method="POST" action="{{ url('/satuan/'.$s->id) }}" onsubmit="return confirm('Hapus satuan?')">@csrf @method('DELETE')<button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-bold">Hapus</button></form>
        </div>
        @empty
        <p class="p-8 text-center text-slate-400 text-sm">Belum ada satuan</p>
        @endforelse
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Daftar Supplier')
@section('header_title', 'Daftar Supplier')
@section('content')
<div class="space-y-4">
    <div class="flex justify-end"><a href="{{ url('/supplier/create') }}" class="h-10 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-bold inline-flex items-center gap-2 transition-colors"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>Tambah</a></div>
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-sm"><thead><tr class="border-b border-slate-100 dark:border-white/10"><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Nama</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Perusahaan</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Telepon</th><th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Aksi</th></tr></thead><tbody>
    @forelse($suppliers ?? [] as $s)
    <tr class="border-b border-slate-50 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors"><td class="p-4 font-bold text-slate-800 dark:text-white">{{ $s->nama }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $s->perusahaan ?? '-' }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $s->telepon ?? '-' }}</td><td class="p-4 text-center"><a href="{{ url('/supplier/'.$s->id.'/edit') }}" class="text-blue-500 hover:text-blue-600 font-bold text-xs">Edit</a></td></tr>
    @empty<tr><td colspan="4" class="p-8 text-center text-slate-400">Belum ada supplier</td></tr>@endforelse
    </tbody></table></div></div>
</div>
@endsection

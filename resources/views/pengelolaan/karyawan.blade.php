@extends('layouts.app')
@section('title', 'Karyawan')
@section('header_title', 'Karyawan')
@section('content')
<div class="space-y-4">
    <div class="flex justify-end"><a href="{{ url('/karyawan/create') }}" class="h-10 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-bold inline-flex items-center gap-2 transition-colors"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>Tambah</a></div>
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-sm"><thead><tr class="border-b border-slate-100 dark:border-white/10"><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Nama</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Jabatan</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Telepon</th><th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Gaji</th><th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Status</th><th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Aksi</th></tr></thead><tbody>
    @forelse($karyawans ?? [] as $k)
    <tr class="border-b border-slate-50 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors"><td class="p-4 font-bold text-slate-800 dark:text-white">{{ $k->nama }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $k->jabatan ?? '-' }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $k->telepon ?? '-' }}</td><td class="p-4 text-right font-bold text-slate-800 dark:text-white">Rp {{ number_format($k->gaji, 0, ',', '.') }}</td><td class="p-4 text-center"><span class="px-2 py-1 rounded-lg text-xs font-bold {{ $k->is_active ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400' : 'bg-slate-100 text-slate-500 dark:bg-white/5 dark:text-slate-400' }}">{{ $k->is_active ? 'Aktif' : 'Nonaktif' }}</span></td><td class="p-4 text-center"><a href="{{ url('/karyawan/'.$k->id.'/edit') }}" class="text-blue-500 hover:text-blue-600 font-bold text-xs">Edit</a></td></tr>
    @empty<tr><td colspan="6" class="p-8 text-center text-slate-400">Belum ada karyawan</td></tr>@endforelse
    </tbody></table></div></div>
</div>
@endsection

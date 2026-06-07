@extends('layouts.app')
@section('title', 'Kalender Shift')
@section('header_title', 'Kalender Shift / Absensi')
@section('content')
<div class="space-y-4">
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6">
        <p class="text-slate-500 dark:text-slate-400 text-sm">Kalender absensi dan shift karyawan akan ditampilkan di sini.</p>
        {{-- TODO: Implement calendar component --}}
        <div class="mt-4 bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-sm"><thead><tr class="border-b border-slate-100 dark:border-white/10"><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Karyawan</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Tanggal</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Shift</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Jam Masuk</th><th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Jam Keluar</th><th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Status</th></tr></thead><tbody>
        @forelse($absensis ?? [] as $a)
        <tr class="border-b border-slate-50 dark:border-white/5"><td class="p-4 font-bold text-slate-800 dark:text-white">{{ $a->karyawan->nama ?? '-' }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $a->tanggal->format('d/m/Y') }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $a->shift ?? '-' }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $a->jam_masuk ?? '-' }}</td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $a->jam_keluar ?? '-' }}</td><td class="p-4 text-center"><span class="px-2 py-1 rounded-lg text-xs font-bold {{ $a->status == 'hadir' ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400' : 'bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400' }}">{{ ucfirst($a->status) }}</span></td></tr>
        @empty<tr><td colspan="6" class="p-8 text-center text-slate-400">Belum ada data absensi</td></tr>@endforelse
        </tbody></table></div></div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Retur Penjualan')
@section('header_title', 'Retur Penjualan')
@section('content')
<div class="space-y-4">
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 dark:border-white/10">
                        <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">No. Nota</th>
                        <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Tanggal</th>
                        <th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Total Retur</th>
                        <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($returs ?? [] as $r)
                    <tr class="border-b border-slate-50 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                        <td class="p-4 font-mono font-bold text-blue-500">{{ $r->penjualan->no_nota ?? '-' }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $r->tanggal->format('d/m/Y') }}</td>
                        <td class="p-4 text-right font-bold text-rose-500">Rp {{ number_format($r->total, 0, ',', '.') }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $r->keterangan ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="p-8 text-center text-slate-400">Tidak ada retur penjualan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Hutang')
@section('header_title', 'Hutang Supplier')
@section('content')
<div class="space-y-4">
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-slate-100 dark:border-white/10">
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">No. Faktur</th>
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Supplier</th>
                    <th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Jumlah</th>
                    <th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Sisa</th>
                    <th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Jatuh Tempo</th>
                    <th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Status</th>
                </tr></thead>
                <tbody>
                    @forelse($hutangs ?? [] as $h)
                    <tr class="border-b border-slate-50 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                        <td class="p-4 font-mono font-bold text-blue-500">{{ $h->pembelian->no_faktur ?? '-' }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $h->pembelian->supplier->nama ?? '-' }}</td>
                        <td class="p-4 text-right font-bold text-slate-800 dark:text-white">Rp {{ number_format($h->jumlah, 0, ',', '.') }}</td>
                        <td class="p-4 text-right font-bold text-rose-500">Rp {{ number_format($h->sisa, 0, ',', '.') }}</td>
                        <td class="p-4 text-center text-slate-600 dark:text-slate-300">{{ $h->jatuh_tempo?->format('d/m/Y') ?? '-' }}</td>
                        <td class="p-4 text-center"><span class="px-2 py-1 rounded-lg text-xs font-bold {{ $h->status == 'lunas' ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400' : 'bg-rose-50 text-rose-600 dark:bg-rose-500/10 dark:text-rose-400' }}">{{ ucfirst(str_replace('_', ' ', $h->status)) }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-8 text-center text-slate-400">Tidak ada hutang</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

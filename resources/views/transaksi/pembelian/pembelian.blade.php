@extends('layouts.app')
@section('title', 'Daftar Pembelian')
@section('header_title', 'Daftar Pembelian')
@section('content')
<div class="space-y-4">
    <div class="flex justify-end">
        <a href="{{ url('/pembelian/create') }}" class="h-10 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-bold inline-flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            Tambah Pembelian
        </a>
    </div>
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-slate-100 dark:border-white/10">
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">No. Faktur</th>
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Supplier</th>
                    <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Tanggal</th>
                    <th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Total</th>
                    <th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Status</th>
                </tr></thead>
                <tbody>
                    @forelse($pembelians ?? [] as $pb)
                    <tr class="border-b border-slate-50 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                        <td class="p-4 font-mono font-bold text-blue-500">{{ $pb->no_faktur }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $pb->supplier->nama ?? '-' }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $pb->tanggal->format('d/m/Y') }}</td>
                        <td class="p-4 text-right font-bold text-slate-800 dark:text-white">Rp {{ number_format($pb->total, 0, ',', '.') }}</td>
                        <td class="p-4 text-center"><span class="px-2 py-1 rounded-lg text-xs font-bold {{ $pb->status_bayar == 'lunas' ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400' : 'bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400' }}">{{ ucfirst(str_replace('_', ' ', $pb->status_bayar)) }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-8 text-center text-slate-400">Belum ada data pembelian</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

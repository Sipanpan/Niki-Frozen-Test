@extends('layouts.app')
@section('title', 'Riwayat Penjualan')
@section('header_title', 'Riwayat Penjualan')

@section('content')
<div class="space-y-4">
    {{-- Filter --}}
    <div class="flex flex-col sm:flex-row gap-3 items-start sm:items-center justify-between">
        <div class="flex gap-2">
            <input type="date" name="dari" value="{{ request('dari', now()->startOfMonth()->format('Y-m-d')) }}" class="h-10 px-3 rounded-xl text-sm font-medium bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
            <input type="date" name="sampai" value="{{ request('sampai', now()->format('Y-m-d')) }}" class="h-10 px-3 rounded-xl text-sm font-medium bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
        </div>
        <a href="{{ url('/penjualan/create') }}" class="h-10 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm font-bold inline-flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            Tambah
        </a>
    </div>

    {{-- Table --}}
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 dark:border-white/10">
                        <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">No. Nota</th>
                        <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Tanggal</th>
                        <th class="text-left p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Pelanggan</th>
                        <th class="text-right p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Total</th>
                        <th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Metode</th>
                        <th class="text-center p-4 font-bold text-slate-500 dark:text-slate-400 text-xs uppercase">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penjualans ?? [] as $p)
                    <tr class="border-b border-slate-50 dark:border-white/5 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                        <td class="p-4 font-mono font-bold text-blue-500">{{ $p->no_nota }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $p->tanggal->format('d/m/Y') }}</td>
                        <td class="p-4 text-slate-600 dark:text-slate-300">{{ $p->pelanggan->nama ?? 'Umum' }}</td>
                        <td class="p-4 text-right font-bold text-slate-800 dark:text-white">Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                        <td class="p-4 text-center"><span class="px-2 py-1 rounded-lg text-xs font-bold {{ $p->metode_bayar == 'tunai' ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400' : 'bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400' }}">{{ ucfirst($p->metode_bayar) }}</span></td>
                        <td class="p-4 text-center"><span class="px-2 py-1 rounded-lg text-xs font-bold {{ $p->status == 'selesai' ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400' : 'bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400' }}">{{ ucfirst($p->status) }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-8 text-center text-slate-400">Belum ada data penjualan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ ($penjualans ?? collect())->links() }}
</div>
@endsection

@extends('layouts.app')
@section('title', 'Input Biaya Operasional')
@section('header_title', 'Input Biaya Operasional')
@section('content')
<div class="max-w-4xl space-y-6">
    <form method="POST" action="{{ url('/laporan/pengeluaran') }}" class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6 space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Kategori</label><select name="kategori" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"><option value="listrik">Listrik</option><option value="sewa">Sewa</option><option value="gaji">Gaji</option><option value="operasional">Operasional</option><option value="lainnya">Lainnya</option></select></div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Jumlah (Rp)</label><input type="number" name="jumlah" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Tanggal</label><input type="date" name="tanggal" value="{{ now()->format('Y-m-d') }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Deskripsi</label><input type="text" name="deskripsi" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none" placeholder="Keterangan..."></div>
        </div>
        <button type="submit" class="h-12 px-8 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold text-sm transition-colors">Simpan Pengeluaran</button>
    </form>
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-sm"><thead><tr class="border-b border-slate-100 dark:border-white/10"><th class="text-left p-4 font-bold text-slate-500 text-xs uppercase">Tanggal</th><th class="text-left p-4 font-bold text-slate-500 text-xs uppercase">Kategori</th><th class="text-left p-4 font-bold text-slate-500 text-xs uppercase">Deskripsi</th><th class="text-right p-4 font-bold text-slate-500 text-xs uppercase">Jumlah</th></tr></thead><tbody>
    @forelse($pengeluarans ?? [] as $pe)
    <tr class="border-b border-slate-50 dark:border-white/5"><td class="p-4 text-slate-600 dark:text-slate-300">{{ $pe->tanggal->format('d/m/Y') }}</td><td class="p-4"><span class="px-2 py-1 rounded-lg text-xs font-bold bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300">{{ ucfirst($pe->kategori) }}</span></td><td class="p-4 text-slate-600 dark:text-slate-300">{{ $pe->deskripsi ?? '-' }}</td><td class="p-4 text-right font-bold text-rose-500">Rp {{ number_format($pe->jumlah, 0, ',', '.') }}</td></tr>
    @empty<tr><td colspan="4" class="p-8 text-center text-slate-400">Belum ada pengeluaran</td></tr>@endforelse
    </tbody></table></div></div>
</div>
@endsection

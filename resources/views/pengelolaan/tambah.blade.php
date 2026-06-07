@extends('layouts.app')
@section('title', isset($karyawan) ? 'Edit Karyawan' : 'Tambah Karyawan')
@section('header_title', isset($karyawan) ? 'Edit Karyawan' : 'Tambah Karyawan')
@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ isset($karyawan) ? url('/karyawan/'.$karyawan->id) : url('/karyawan') }}" class="space-y-6">
        @csrf @if(isset($karyawan)) @method('PUT') @endif
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Nama *</label><input type="text" name="nama" value="{{ old('nama', $karyawan->nama ?? '') }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Jabatan</label><input type="text" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan ?? '') }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Telepon</label><input type="text" name="telepon" value="{{ old('telepon', $karyawan->telepon ?? '') }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Gaji</label><input type="number" name="gaji" value="{{ old('gaji', $karyawan->gaji ?? 0) }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Tanggal Masuk</label><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', isset($karyawan) ? $karyawan->tanggal_masuk?->format('Y-m-d') : '') }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
            </div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Alamat</label><textarea name="alamat" rows="3" class="w-full px-4 py-3 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">{{ old('alamat', $karyawan->alamat ?? '') }}</textarea></div>
        </div>
        <div class="flex gap-3"><button type="submit" class="h-12 px-8 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold text-sm transition-colors">{{ isset($karyawan) ? 'Update' : 'Simpan' }}</button><a href="{{ url('/karyawan') }}" class="h-12 px-8 bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 rounded-xl font-bold text-sm inline-flex items-center hover:bg-slate-200 dark:hover:bg-white/10 transition-colors">Batal</a></div>
    </form>
</div>
@endsection

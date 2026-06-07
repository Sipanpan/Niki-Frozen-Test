@extends('layouts.app')
@section('title', isset($pelanggan) ? 'Edit Pelanggan' : 'Tambah Pelanggan')
@section('header_title', isset($pelanggan) ? 'Edit Pelanggan' : 'Tambah Pelanggan')
@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ isset($pelanggan) ? url('/pelanggan/'.$pelanggan->id) : url('/pelanggan') }}" class="space-y-6">
        @csrf @if(isset($pelanggan)) @method('PUT') @endif
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6 space-y-4">
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Nama *</label><input type="text" name="nama" value="{{ old('nama', $pelanggan->nama ?? '') }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Telepon</label><input type="text" name="telepon" value="{{ old('telepon', $pelanggan->telepon ?? '') }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Email</label><input type="email" name="email" value="{{ old('email', $pelanggan->email ?? '') }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Alamat</label><textarea name="alamat" rows="3" class="w-full px-4 py-3 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea></div>
        </div>
        <div class="flex gap-3"><button type="submit" class="h-12 px-8 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold text-sm transition-colors">{{ isset($pelanggan) ? 'Update' : 'Simpan' }}</button><a href="{{ url('/pelanggan') }}" class="h-12 px-8 bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 rounded-xl font-bold text-sm inline-flex items-center hover:bg-slate-200 dark:hover:bg-white/10 transition-colors">Batal</a></div>
    </form>
</div>
@endsection

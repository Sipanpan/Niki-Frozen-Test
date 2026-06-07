@extends('layouts.app')
@section('title', isset($produk) ? 'Edit Produk' : 'Tambah Produk')
@section('header_title', isset($produk) ? 'Edit Produk' : 'Tambah Produk')
@section('content')
<div class="max-w-4xl">
    <form method="POST" action="{{ isset($produk) ? url('/produk/'.$produk->id) : url('/produk') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($produk)) @method('PUT') @endif
        <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Nama Produk *</label><input type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">@error('nama')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror</div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">SKU</label><input type="text" name="sku" value="{{ old('sku', $produk->sku ?? '') }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Barcode</label><input type="text" name="barcode" value="{{ old('barcode', $produk->barcode ?? '') }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Kategori</label><select name="kategori_id" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"><option value="">Pilih Kategori</option>@foreach($kategoris ?? [] as $k)<option value="{{ $k->id }}" {{ old('kategori_id', $produk->kategori_id ?? '') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>@endforeach</select></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Satuan</label><select name="satuan_id" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"><option value="">Pilih Satuan</option>@foreach($satuans ?? [] as $s)<option value="{{ $s->id }}" {{ old('satuan_id', $produk->satuan_id ?? '') == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>@endforeach</select></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Harga Beli</label><input type="number" name="harga_beli" value="{{ old('harga_beli', $produk->harga_beli ?? 0) }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Harga Jual *</label><input type="number" name="harga_jual" value="{{ old('harga_jual', $produk->harga_jual ?? 0) }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Stok</label><input type="number" name="stok" value="{{ old('stok', $produk->stok ?? 0) }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Stok Minimum</label><input type="number" name="stok_minimum" value="{{ old('stok_minimum', $produk->stok_minimum ?? 0) }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
                <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Gambar</label><input type="file" name="gambar" accept="image/*" class="w-full h-11 px-4 py-2 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none"></div>
            </div>
            <div><label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Deskripsi</label><textarea name="deskripsi" rows="3" class="w-full px-4 py-3 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea></div>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="h-12 px-8 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold text-sm transition-colors">{{ isset($produk) ? 'Update' : 'Simpan' }} Produk</button>
            <a href="{{ url('/produk') }}" class="h-12 px-8 bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 rounded-xl font-bold text-sm inline-flex items-center transition-colors hover:bg-slate-200 dark:hover:bg-white/10">Batal</a>
        </div>
    </form>
</div>
@endsection

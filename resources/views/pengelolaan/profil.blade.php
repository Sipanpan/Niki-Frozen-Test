@extends('layouts.app')
@section('title', 'Profil Akun')
@section('header_title', 'Profil Akun')
@section('content')
<div class="max-w-2xl space-y-6">

    {{-- Profile Info --}}
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white text-2xl font-black shadow-lg">
                {{ Auth::user()->initial ?? 'U' }}
            </div>
            <div>
                <h2 class="text-lg font-black text-slate-800 dark:text-white">{{ Auth::user()->nama_lengkap ?? Auth::user()->name }}</h2>
                <p class="text-sm text-slate-400">{{ ucfirst(Auth::user()->role ?? 'kasir') }} • @{{ Auth::user()->username }}</p>
            </div>
        </div>

        <form method="POST" action="{{ url('/profil') }}" class="space-y-4">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                    @error('nama_lengkap')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Username</label>
                    <input type="text" name="username" value="{{ old('username', Auth::user()->username) }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                    @error('username')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Display Name</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Hak Akses</label>
                    <input type="text" value="{{ ucfirst(Auth::user()->role) }}" disabled class="w-full h-11 px-4 rounded-xl text-sm bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-500 dark:text-slate-400 outline-none cursor-not-allowed">
                    <p class="text-xs text-slate-400 mt-1">Hak akses hanya bisa diubah oleh admin</p>
                </div>
            </div>
            <button type="submit" class="h-12 px-8 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold text-sm transition-colors">Update Profil</button>
        </form>
    </div>

    {{-- Reset Password --}}
    <div class="bg-white dark:bg-white/5 rounded-2xl border border-slate-100 dark:border-white/10 p-6">
        <h3 class="text-lg font-black text-slate-800 dark:text-white mb-4">🔐 Reset Password</h3>
        <form method="POST" action="{{ url('/profil/password') }}" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Password Lama</label>
                <input type="password" name="current_password" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                @error('current_password')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Password Baru</label>
                <input type="password" name="password" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
                @error('password')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" required class="w-full h-11 px-4 rounded-xl text-sm bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 dark:text-white outline-none">
            </div>
            <button type="submit" class="h-12 px-8 bg-amber-500 hover:bg-amber-600 text-white rounded-xl font-bold text-sm transition-colors">Ubah Password</button>
        </form>
    </div>

</div>
@endsection

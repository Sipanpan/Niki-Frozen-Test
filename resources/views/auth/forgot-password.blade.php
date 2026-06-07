@extends('layouts.guest')

@section('title', 'Lupa Password')

@section('content')
<form method="POST" action="{{ url('/forgot-password') }}" class="space-y-6">
    @csrf

    <div>
        <h2 class="text-xl font-black text-white mb-1">Lupa Password? 🔐</h2>
        <p class="text-slate-400 text-sm">Masukkan username Anda dan kami akan membantu reset password</p>
    </div>

    <div class="space-y-2">
        <label for="username" class="block text-sm font-bold text-slate-300">Username</label>
        <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
            class="w-full h-12 px-4 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-slate-500 text-sm font-medium focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 outline-none transition-all"
            placeholder="Masukkan username">
        @error('username')
            <p class="text-rose-400 text-xs font-bold">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="w-full h-12 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-2xl font-black text-sm uppercase tracking-wider shadow-lg shadow-blue-500/25 transition-all duration-200">
        Reset Password
    </button>

    <p class="text-center text-sm text-slate-400">
        Kembali ke <a href="{{ url('/login') }}" class="text-blue-400 hover:text-blue-300 font-bold">Login</a>
    </p>
</form>
@endsection

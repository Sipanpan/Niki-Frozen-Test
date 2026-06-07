@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<form method="POST" action="{{ url('/login') }}" class="space-y-6">
    @csrf

    <div>
        <h2 class="text-xl font-black text-white mb-1">Selamat Datang 👋</h2>
        <p class="text-slate-400 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    {{-- Username --}}
    <div class="space-y-2">
        <label for="username" class="block text-sm font-bold text-slate-300">Username</label>
        <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
            class="w-full h-12 px-4 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-slate-500 text-sm font-medium focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 outline-none transition-all"
            placeholder="Masukkan username">
        @error('username')
            <p class="text-rose-400 text-xs font-bold">{{ $message }}</p>
        @enderror
    </div>

    {{-- Password --}}
    <div class="space-y-2">
        <label for="password" class="block text-sm font-bold text-slate-300">Password</label>
        <div class="relative">
            <input id="password" name="password" type="password" required
                class="w-full h-12 px-4 pr-12 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-slate-500 text-sm font-medium focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 outline-none transition-all"
                placeholder="Masukkan password">
            <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-white transition-colors">
                <svg id="eye-icon" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </button>
        </div>
        @error('password')
            <p class="text-rose-400 text-xs font-bold">{{ $message }}</p>
        @enderror
    </div>

    {{-- Remember --}}
    <div class="flex items-center justify-between">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/20 bg-white/5 text-blue-500 focus:ring-blue-500/50">
            <span class="text-sm text-slate-400 font-medium">Ingat saya</span>
        </label>
        <a href="{{ url('/forgot-password') }}" class="text-sm text-blue-400 hover:text-blue-300 font-bold transition-colors">Lupa password?</a>
    </div>

    {{-- Submit --}}
    <button type="submit" class="w-full h-12 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-2xl font-black text-sm uppercase tracking-wider shadow-lg shadow-blue-500/25 transition-all duration-200 hover:shadow-xl hover:shadow-blue-500/30 active:scale-[0.98]">
        Masuk
    </button>
</form>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endsection

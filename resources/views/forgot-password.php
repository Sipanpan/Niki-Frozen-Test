<!DOCTYPE html><html lang="id"> <head><!-- Theme initialization (prevent flash) --><script>
    (function () {
      const stored = localStorage.getItem("theme");
      if (stored === "light") {
        document.documentElement.classList.remove("dark");
      } else if (stored === "dark") {
        document.documentElement.classList.add("dark");
      } else {
        const systemPrefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
        if (systemPrefersDark) {
          document.documentElement.classList.add("dark");
        } else {
          document.documentElement.classList.remove("dark");
        }
      }

      // Detect PWA standalone mode and set/clear cookie
      var isPwa = window.matchMedia("(display-mode: standalone)").matches || window.navigator.standalone;
      if (isPwa) {
        document.cookie = "pwa_mode=1; path=/; max-age=31536000; SameSite=Lax";
      } else {
        document.cookie = "pwa_mode=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
      }
    })();
  </script><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"><meta name="generator" content="Astro v5.18.0"><!-- PWA & iOS Mobile Web App --><link rel="manifest" href="/manifest.json"><meta name="theme-color" content="#020d1a"><meta name="mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><meta name="apple-mobile-web-app-title" content="Brana Pos"><link rel="apple-touch-icon" href="/brana-logo.png"><!-- SEO Meta Tags --><title>Lupa Password — Brana POS</title><meta name="description" content="Brana POS — Sistem Point of Sale &#38; Inventory Management Modern untuk Efisiensi Bisnis Anda."><meta name="robots" content="index, follow"><link rel="canonical" href="https://app.branapos.com/forgot-password"><meta name="author" content="Artha Brana Prosperity"><meta name="keywords" content="POS System, Point of Sale, Inventory Management, Brana Software, Kasir Digital, Software Kasir"><!-- Open Graph / Facebook --><meta property="og:type" content="website"><meta property="og:url" content="http://localhost/forgot-password"><meta property="og:title" content="Lupa Password — Brana POS"><meta property="og:description" content="Brana POS — Sistem Point of Sale &#38; Inventory Management Modern untuk Efisiensi Bisnis Anda."><meta property="og:image" content="https://app.branapos.com/brana-logo.png"><meta property="og:site_name" content="Brana POS"><!-- Twitter --><meta property="twitter:card" content="summary_large_image"><meta property="twitter:url" content="http://localhost/forgot-password"><meta property="twitter:title" content="Lupa Password — Brana POS"><meta property="twitter:description" content="Brana POS — Sistem Point of Sale &#38; Inventory Management Modern untuk Efisiensi Bisnis Anda."><meta property="twitter:image" content="https://app.branapos.com/brana-logo.png"><!-- Favicon --><link rel="icon" type="image/png" href="/brana-logo.png"><link rel="stylesheet" href="/_astro/index.CyUxg1Nr.css">
<link rel="stylesheet" href="/_astro/forgot-password.eQTpSjO_.css">
<style>html,body{touch-action:manipulation;-webkit-text-size-adjust:100%}
</style></head> <body class="min-h-screen overflow-x-hidden"> <!-- PWA Cold Start Splash Screen --> <div id="pwa-splash-screen" class="fixed inset-0 z-[999999] flex flex-col items-center justify-center bg-[#020617] text-white transition-all duration-500 pointer-events-auto opacity-0 hidden"> <div class="flex flex-col items-center gap-4"> <div class="relative flex h-24 w-24 items-center justify-center"> <!-- Pulse ring around logo --> <span class="animate-ping absolute inline-flex h-20 w-20 rounded-full bg-accent/30 opacity-75"></span> <!-- Logo --> <img src="/brana-logo.png" alt="Brana Logo" class="relative w-16 h-16 object-contain"> </div> <!-- Brana Text --> <h1 class="text-2xl font-black tracking-widest text-white uppercase font-display mt-2">Brana</h1> <!-- Dot bounce loader --> <div class="flex gap-1.5 mt-4"> <span class="w-2.5 h-2.5 rounded-full bg-accent animate-bounce" style="animation-delay: 0.1s"></span> <span class="w-2.5 h-2.5 rounded-full bg-accent animate-bounce" style="animation-delay: 0.2s"></span> <span class="w-2.5 h-2.5 rounded-full bg-accent animate-bounce" style="animation-delay: 0.3s"></span> </div> </div> </div> <script>
    (function() {
      // Check if not loaded in session yet
      var alreadyLoaded = sessionStorage.getItem("brana_loaded");
      
      if (!alreadyLoaded) {
        var splash = document.getElementById("pwa-splash-screen");
        if (splash) {
          splash.classList.remove("hidden");
          // Force layout reflow then make it visible
          void splash.offsetWidth;
          splash.classList.add("opacity-100");
          
          // Set flag
          sessionStorage.setItem("brana_loaded", "true");
          
          var hideSplash = function() {
            setTimeout(function() {
              splash.classList.replace("opacity-100", "opacity-0");
              setTimeout(function() {
                splash.classList.add("hidden");
              }, 500); // match transition duration
            }, 1200); // beautiful delay so user sees animation
          };

          if (document.readyState === "complete") {
            hideSplash();
          } else {
            window.addEventListener("load", hideSplash);
          }
        }
      }
    })();
  </script>   <div class="relative min-h-screen flex items-center justify-center overflow-hidden px-4"> <!-- Animated background gradient --> <div class="absolute inset-0 bg-gradient-to-br from-slate-100 via-slate-200 to-slate-100 dark:from-[#020d1a] dark:via-[#042d5b] dark:to-[#020d1a]"> <!-- Accent orbs --> <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[#c5a059]/10 dark:bg-[#c5a059]/10 rounded-full blur-3xl animate-float"></div> <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-[#c5a059]/5 dark:bg-[#c5a059]/5 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div> <div class="absolute top-1/2 right-1/3 w-64 h-64 bg-[#c5a059]/5 dark:bg-[#c5a059]/5 rounded-full blur-3xl animate-float" style="animation-delay: -1.5s;"></div> <!-- Grid pattern overlay --> <div class="absolute inset-0 opacity-[0.03] dark:opacity-5 bg-[radial-gradient(circle_at_1px_1px,rgba(0,0,0,0.2)_1px,transparent_0)] dark:bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,0.3)_1px,transparent_0)] bg-[size:40px_40px]"></div> </div> <!-- Forgot Password Card --> <div class="relative z-10 w-full max-w-md animate-fade-in-up"> <!-- Glass Card --> <div class="glass-card p-8 md:p-10 shadow-2xl shadow-black/20"> <!-- Logo & Brand --> <div class="text-center mb-10"> <img src="/brana-logo.png" alt="Brana Logo" class="w-24 h-24 mx-auto mb-4 object-contain animate-float drop-shadow-[0_0_15px_rgba(197,160,89,0.3)]"> <h1 class="text-3xl font-black text-slate-800 dark:text-white tracking-tight uppercase">
Reset Password
</h1> <p class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400 mt-2">
Atur Ulang Kata Sandi Akun Anda
</p> </div> <!-- Error / Success Alert --> <div id="forgot-alert" class="hidden mb-6 p-4 rounded-xl border"> <p id="forgot-alert-text" class="text-sm text-center"></p> </div> <!-- Request Form --> <form id="forgot-form" class="space-y-5"> <div> <label for="email" class="block text-sm font-medium text-slate-600 dark:text-slate-300 mb-2">
Alamat Email
</label> <div class="relative"> <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none"> <svg class="w-5 h-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path> </svg> </div> <input type="email" id="email" name="email" required autocomplete="email" placeholder="Masukkan email terdaftar" class="w-full pl-12 pr-4 py-3 rounded-xl border text-sm bg-white dark:bg-white/5 border-slate-200 dark:border-white/10 text-slate-800 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#c5a059]/50 focus:border-[#c5a059]/50 transition-all duration-200"> </div> </div> <!-- Submit --> <button type="submit" id="submit-btn" class="w-full py-3.5 px-6 rounded-xl font-black text-[11px] uppercase tracking-[0.2em] text-white bg-gradient-to-r from-[#c5a059] to-[#a38048] hover:from-[#d6b16a] hover:to-[#c5a059] focus:outline-none focus:ring-2 focus:ring-[#c5a059] focus:ring-offset-2 focus:ring-offset-slate-900 shadow-lg shadow-[#c5a059]/20 hover:shadow-[#c5a059]/40 transition-all duration-300 ease-in-out active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed"> <span id="btn-text">Kirim Tautan Reset</span> <span id="btn-loading" class="hidden flex items-center justify-center gap-2"> <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
Mengirim...
</span> </button> </form> <div class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
Kembali ke halaman <a href="/login" class="text-[#c5a059] font-bold hover:underline transition-all">Masuk</a> </div> <!-- Footer --> <div class="mt-8 text-center"> <p class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-400 dark:text-slate-500">
© 2026 Brana Software — Artha Brana Prosperity
</p> </div> </div> </div> </div>  <!-- Disable Zoom --> <script>
  // Prevent pinch-to-zoom for mobile native feel
  document.addEventListener('gesturestart', function (e) {
    e.preventDefault();
  });
  document.addEventListener('touchstart', function (e) {
    if (e.touches.length > 1) {
      e.preventDefault();
    }
  }, { passive: false });
  </script>  </body> </html> <script type="module">const a=document.getElementById("forgot-form"),s=document.getElementById("forgot-alert"),m=document.getElementById("forgot-alert-text"),o=document.getElementById("submit-btn"),i=document.getElementById("btn-text"),l=document.getElementById("btn-loading");a.addEventListener("submit",async r=>{r.preventDefault(),e(!1,"");const t=document.getElementById("email").value.trim();if(!t){e(!0,"Email wajib diisi.","error");return}o.disabled=!0,i.classList.add("hidden"),l.classList.remove("hidden");try{const d=await(await fetch("/api/auth/forgot-password",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({email:t})})).json();d.success?(e(!0,d.message||"Tautan reset password berhasil dikirim.","success"),a.reset()):e(!0,d.error||"Gagal memproses permintaan.","error")}catch{e(!0,"Tidak dapat terhubung ke server.","error")}finally{o.disabled=!1,i.classList.remove("hidden"),l.classList.add("hidden")}});function e(r,t,n="error"){if(!r){s.classList.add("hidden");return}m.textContent=t,s.classList.remove("hidden"),n==="success"?s.className="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400":s.className="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400"}</script>
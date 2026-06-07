// ============================================================
// Niki Frozen POS — Main JavaScript
// ============================================================

// Theme initialization (prevent flash)
(function () {
    const stored = localStorage.getItem("theme");
    if (stored === "dark" || (!stored && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
})();

// ============================================================
// Sidebar Toggle
// ============================================================
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const toggle = document.getElementById('sidebar-toggle');
    const mobileToggle = document.getElementById('mobile-sidebar-toggle');

    // Restore desktop collapsed state
    if (localStorage.getItem('sidebar-hidden') === 'true') {
        sidebar?.classList.add('desktop-collapsed');
    }

    function openMobile() {
        sidebar?.classList.remove('-translate-x-full');
        overlay?.classList.remove('hidden');
    }

    function closeMobile() {
        sidebar?.classList.add('-translate-x-full');
        overlay?.classList.add('hidden');
    }

    // Desktop toggle
    toggle?.addEventListener('click', () => {
        if (window.innerWidth >= 1024) {
            sidebar.classList.toggle('desktop-collapsed');
            localStorage.setItem('sidebar-hidden', sidebar.classList.contains('desktop-collapsed').toString());
        } else {
            sidebar.classList.contains('-translate-x-full') ? openMobile() : closeMobile();
        }
    });

    // Mobile toggle
    mobileToggle?.addEventListener('click', openMobile);
    overlay?.addEventListener('click', closeMobile);

    // Submenu accordion
    document.querySelectorAll('.menu-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const group = btn.closest('.menu-group');
            const submenu = group.querySelector('.submenu');
            const chevron = btn.querySelector('.chevron');
            const isOpen = group.dataset.open === 'true';

            // Close all others
            document.querySelectorAll('.menu-group').forEach(g => {
                if (g !== group) {
                    const s = g.querySelector('.submenu');
                    const c = g.querySelector('.chevron');
                    if (s) s.style.maxHeight = '0';
                    if (c) c.classList.remove('rotate-180');
                    g.dataset.open = 'false';
                }
            });

            if (isOpen) {
                submenu.style.maxHeight = '0';
                chevron?.classList.remove('rotate-180');
                group.dataset.open = 'false';
            } else {
                submenu.style.maxHeight = submenu.scrollHeight + 8 + 'px';
                chevron?.classList.add('rotate-180');
                group.dataset.open = 'true';
            }
        });
    });

    // Auto-open active menu groups
    document.querySelectorAll('.menu-group[data-open="true"]').forEach(g => {
        const submenu = g.querySelector('.submenu');
        if (submenu) submenu.style.maxHeight = submenu.scrollHeight + 'px';
    });
});

// ============================================================
// Theme Toggle
// ============================================================
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('theme-toggle');
    if (toggle) {
        toggle.addEventListener('click', () => {
            const isDark = document.documentElement.classList.contains('dark');
            if (isDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    }
});

// ============================================================
// Real-time Clock
// ============================================================
function updateClock() {
    const el = document.getElementById('real-time-clock');
    if (el) {
        const now = new Date();
        el.textContent = now.toLocaleTimeString('id-ID', {
            hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false
        }).replace(/\./g, ':');
    }
}
setInterval(updateClock, 1000);
document.addEventListener('DOMContentLoaded', updateClock);

// ============================================================
// Keyboard Detection (mobile)
// ============================================================
document.addEventListener('focusin', function (e) {
    const t = e.target;
    if (t && (t.tagName === 'INPUT' || t.tagName === 'TEXTAREA')) {
        const type = t.getAttribute('type');
        if (type !== 'checkbox' && type !== 'radio' && type !== 'submit' && type !== 'button') {
            document.documentElement.classList.add('keyboard-open');
        }
    }
});
document.addEventListener('focusout', function () {
    setTimeout(() => {
        if (!document.activeElement || (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA')) {
            document.documentElement.classList.remove('keyboard-open');
        }
    }, 50);
});

// ============================================================
// Global Search
// ============================================================
document.addEventListener('DOMContentLoaded', function () {
    const search = document.getElementById('global-search');
    search?.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            const q = search.value.trim();
            if (q) window.location.href = `/search?q=${encodeURIComponent(q)}`;
        }
    });
});

@php
$active = $active ?? '';
@endphp
<div class="rz-nav-scope"
    x-data="{ mobileMenu: false, minimized: false, scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 30">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

        .rz-nav-scope,
        .rz-nav-scope *,
        .rz-nav-scope *::before,
        .rz-nav-scope *::after {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        }

        .rz-nav-scope h1,
        .rz-nav-scope h2,
        .rz-nav-scope h3,
        .rz-nav-scope p,
        .rz-nav-scope ul {
            margin: 0;
            padding: 0;
        }

        .rz-nav-scope ul {
            list-style: none;
        }

        .rz-nav-scope a {
            text-decoration: none;
            color: inherit;
        }

        .rz-nav-scope button {
            font: inherit;
            border: none;
            background: none;
            cursor: pointer;
            color: inherit;
        }

        .rz-nav-scope img {
            max-width: none;
            display: block;
        }

        [x-cloak] {
            display: none !important;
        }

        /* ---------- BAR UTAMA ---------- */
        .rz-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 0;
            transition: box-shadow .25s ease, padding .25s ease, transform .3s ease;
        }

        .rz-nav--scrolled {
            padding: 8px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .rz-nav--hidden {
            transform: translateY(-100%);
        }

        .rz-nav__inner {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        /* ---------- BRAND ---------- */
        .rz-nav__brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rz-nav__logo {
            width: 36px;
            height: 36px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .rz-nav__brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .rz-nav__brand-top {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            color: #0D9488;
        }

        .rz-nav__brand-bottom {
            font-size: 15px;
            font-weight: 800;
            color: #0F172A;
            letter-spacing: -.01em;
            white-space: nowrap;
        }

        .rz-nav__brand-sub {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .02em;
            color: #64748B;
            white-space: nowrap;
        }

        /* ---------- MENU TENGAH (DESKTOP) ---------- */
        .rz-nav__menu {
            display: none;
            align-items: center;
            gap: 8px;
        }

        .rz-nav__menu a {
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            color: #475569;
            transition: all .2s ease;
        }

        .rz-nav__menu a:hover {
            background: #F1F5F9;
            color: #0F172A;
        }

        .rz-nav__menu a.rz-active {
            background: #0D9488 !important;
            color: #FFFFFF !important;
            font-weight: 600;
        }

        /* ---------- KANAN (DESKTOP) ---------- */
        .rz-nav__right {
            display: none;
            align-items: center;
            gap: 16px;
        }

        .rz-nav__wa {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            transition: color .2s;
        }

        .rz-nav__wa:hover {
            color: #0D9488;
        }

        .rz-nav__sep {
            width: 1px;
            height: 18px;
            background: #CBD5E1;
        }

        .rz-nav__lang-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            transition: color .2s;
        }

        .rz-nav__lang-btn:hover {
            color: #0D9488;
        }

        /* ---------- BURGER MOBILE ---------- */
        .rz-nav__burger {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            color: #0F172A;
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            transition: all .2s;
        }

        .rz-nav__burger:hover,
        .rz-nav__burger:active {
            background: #F1F5F9;
            color: #0D9488;
        }

        @media (min-width: 768px) {
            .rz-nav__menu {
                display: flex;
            }

            .rz-nav__right {
                display: flex;
            }

            .rz-nav__burger {
                display: none;
            }
        }

        /* ---------- OVERLAY + PANEL MOBILE ---------- */
        .rz-nav__overlay {
            position: fixed;
            inset: 0;
            z-index: 110;
            background: rgba(15, 23, 42, .4);
            backdrop-filter: blur(4px);
        }

        .rz-nav__mobile {
            position: fixed;
            top: 68px;
            left: 16px;
            right: 16px;
            z-index: 120;
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 20px 30px -5px rgba(15, 23, 42, 0.15);
            border: 1px solid #E2E8F0;
        }

        .rz-nav__mobile a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            font-weight: 600;
            color: #334155;
            transition: background .2s;
        }

        .rz-nav__mobile a:hover {
            background: #F8FAFC;
        }

        .rz-nav__mobile a.rz-active {
            background: #CCFBF1;
            color: #0D9488;
            border-left: 4px solid #0D9488;
        }

        .rz-nav__mobile-icon {
            width: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rz-nav__mobile-divider {
            margin: 4px 18px;
            border-top: 1px solid #F1F5F9;
        }

        .rz-nav__mobile-lang {
            padding: 14px 18px;
            background: #F8FAFC;
        }

        .rz-nav__mobile-lang-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: #94A3B8;
            margin-bottom: 10px;
        }

        .rz-nav__mobile-lang-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .rz-nav__mobile-lang-grid a {
            justify-content: center;
            border: 1px solid #E2E8F0;
            background: #FFFFFF;
            border-radius: 10px;
            padding: 8px;
            font-weight: 600;
            color: #334155;
        }

        .rz-nav__mobile-lang-grid a.rz-active {
            background: #0D9488;
            border-color: #0D9488;
            color: #FFFFFF !important;
        }

        .rz-nav__spacer {
            height: 64px;
        }

        @media (min-width: 768px) {
            .rz-nav__spacer {
                height: 70px;
            }
        }
    </style>

    <header
        :class="[minimized ? 'rz-nav--hidden' : '', scrolled ? 'rz-nav--scrolled' : '']"
        class="rz-nav">

        <div class="rz-nav__inner">

            {{-- LOGO + NAMA --}}
            <a href="/" class="rz-nav__brand">
                <img src="{{ asset('img/logo-pin-edit.png') }}" class="rz-nav__logo" alt="RSUD AR ROZY">
                <span class="rz-nav__brand-text">
                    <span class="rz-nav__brand-top">RSUD</span>
                    <span class="rz-nav__brand-bottom">AR ROZY</span>
                    <span class="rz-nav__brand-sub">Kota Probolinggo</span>
                </span>
            </a>

            {{-- MENU DESKTOP --}}
            <nav class="rz-nav__menu">
                <a href="/" class="{{ $active === 'home' ? 'rz-active' : '' }}">
                    {{ __('messages.home') }}
                </a>

                @php
                $isNewsSection = request()->is('news') || request()->is('news/*') || request()->is('pkrs') || request()->is('pkrs/*');
                @endphp

                <a href="/news" class="{{ $isNewsSection ? 'rz-active' : '' }}">
                    {{ __('messages.news') }}
                </a>

                <a href="/dashboard" class="{{ $active === 'dashboard' ? 'rz-active' : '' }}">
                    {{ __('messages.dashboard') }}
                </a>

                <a href="{{ route('profile') }}"
                    class="{{ $active === 'profile' ? 'rz-active' : '' }}">
                    {{ __('messages.profile') }}
                </a>
            </nav>

            {{-- KANAN DESKTOP --}}
            <div class="rz-nav__right">
                <a href="https://wa.me/6281130756662" target="_blank" class="rz-nav__wa">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#22C55E">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg>
                    <span>{{ __('messages.whatsapp') }}</span>
                </a>

                <div class="rz-nav__sep"></div>

                <div x-data="{ open: false }" style="position:relative;">
                    <button @click="open = !open" class="rz-nav__lang-btn">
                        @if (app()->getLocale() == 'id')
                        <span>🇮🇩 ID</span>
                        @else
                        <span>🇺🇸 EN</span>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- TOGGLE MOBILE (DENGAN SVG PASTIMUNCUL) --}}
            <button @click="mobileMenu = !mobileMenu" class="rz-nav__burger" aria-label="Toggle Menu">
                <template x-if="!mobileMenu">
                    <!-- Icon Hamburger Bars -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                </template>
                <template x-if="mobileMenu">
                    <!-- Icon Close X -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </template>
            </button>

        </div>
    </header>

    {{-- OVERLAY --}}
    <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="mobileMenu = false" class="rz-nav__overlay"></div>

    {{-- MENU MOBILE --}}
    <div x-show="mobileMenu" x-cloak @click.outside="mobileMenu = false"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
        class="rz-nav__mobile">

        <nav>
            <a href="/" @click="mobileMenu=false" class="{{ $active === 'home' ? 'rz-active' : '' }}">
                <span class="rz-nav__mobile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0D9488" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                </span>
                <span>{{ __('messages.home') }}</span>
            </a>

            <a href="/news" @click="mobileMenu=false" class="{{ $active === 'news' ? 'rz-active' : '' }}">
                <span class="rz-nav__mobile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0D9488" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                        <path d="M18 14h-8" />
                        <path d="M15 18h-5" />
                        <path d="M10 6h8v4h-8z" />
                    </svg>
                </span>
                <span>{{ __('messages.news') }}</span>
            </a>

            <a href="/dashboard" @click="mobileMenu=false" class="{{ $active === 'dashboard' ? 'rz-active' : '' }}">
                <span class="rz-nav__mobile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0D9488" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18" />
                        <path d="m19 9-5 5-4-4-3 3" />
                    </svg>
                </span>
                <span>{{ __('messages.dashboard') }}</span>
            </a>

            <div class="rz-nav__mobile-divider"></div>

            <a href="https://wa.me/6281130756662" target="_blank" @click="mobileMenu=false">
                <span class="rz-nav__mobile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#22C55E">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg>
                </span>
                <span>{{ __('messages.whatsapp') }}</span>
            </a>

            <div class="rz-nav__mobile-divider"></div>

            <div class="rz-nav__mobile-lang">
                <div class="rz-nav__mobile-lang-title">Language</div>
                <div class="rz-nav__mobile-lang-grid">
                    <a href="{{ route('lang.switch', 'id') }}" @click="mobileMenu=false" class="{{ app()->getLocale() == 'id' ? 'rz-active' : '' }}">
                        🇮🇩 Indonesia
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" @click="mobileMenu=false" class="{{ app()->getLocale() == 'en' ? 'rz-active' : '' }}">
                        🇺🇸 English
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div class="rz-nav__spacer"></div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        document.addEventListener('keydown', function(e) {
            const header = document.querySelector(".rz-nav-scope");
            if (!header) return;

            const activeTag = document.activeElement.tagName.toLowerCase();
            if (activeTag === "input" || activeTag === "textarea") return;

            const component = Alpine.$data(header);

            if (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === "h") {
                component.minimized = true;
            }

            if (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === "s") {
                component.minimized = false;
            }

            if (e.key === "Escape") {
                const now = Date.now();
                if (!window.lastEsc) window.lastEsc = 0;

                if (now - window.lastEsc < 400) {
                    component.minimized = !component.minimized;
                }

                window.lastEsc = now;
            }
        });
    });
</script>
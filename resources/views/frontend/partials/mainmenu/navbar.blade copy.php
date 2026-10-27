@php
$active = $active ?? '';
$roleCode = session('account_role_code') ?? '';
@endphp
<header x-data="{
                    mobileMenu: false,
                    minimized: false,
                    scrolled: false
                }" @scroll.window="scrolled = window.scrollY > 30"
                    :class="[
                        minimized ? 'header-hidden' : '',
                        scrolled ? 'py-1 shadow-2xl' : 'py-2'
                    ]"
                    class="header-wrapper
                    fixed top-0 left-0 right-0 z-50
                        bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500
                        backdrop-blur-md
                        text-white
                        transition-all duration-300">

    <!-- BAR ATAS -->
    <div class="max-w-7xl mx-auto px-4 md:px-6">

        <div class="h-16 flex items-center justify-between">

            <!-- KIRI + MENU -->
            <div class="flex items-center gap-4">

                <!-- LOGO -->
                <img src="{{ asset('img/logo-pin-edit.png') }}"
                    class="w-10 h-10 md:w-11 md:h-11 object-contain
                   drop-shadow-[0_4px_10px_rgba(0,0,0,0.35)]">

                <!-- NAMA -->
                <span class="text-lg md:text-xl font-bold tracking-wide whitespace-nowrap">
                    RSUD AR ROZY
                </span>

                <!-- PEMBATAS -->
                <span class="hidden md:block text-white/60">
                    |
                </span>


                <!-- MENU DESKTOP -->
                <nav class="menu hidden md:flex items-center">

                    <ul class="flex items-center gap-6 font-medium">

                        <li>
                            <a href="/"
                                class="{{ $active === 'home' ? 'active' : '' }}">
                                {{ __('messages.home') }}
                            </a>
                        </li>

                        @php
                        $isNewsSection =
                        request()->is('news') ||
                        request()->is('news/*') ||
                        request()->is('pkrs') ||
                        request()->is('pkrs/*');
                        @endphp

                        <li>
                            <a href="/news"
                                class="{{ $isNewsSection ? 'active' : '' }}">
                                {{ __('messages.news') }}
                            </a>
                        </li>

                        <li>
                            <a href="/dashboard"
                                class="{{ $active === 'dashboard' ? 'active' : '' }}">
                                {{ __('messages.dashboard') }}
                            </a>
                        </li>

                    </ul>

                </nav>

            </div>


            <!-- TOGGLE MOBILE -->
            <button @click="mobileMenu = !mobileMenu"
                class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-white/10 transition">

                <i class="fa-solid" :class="mobileMenu ? 'fa-xmark text-2xl' : 'fa-bars text-2xl'">
                </i>

            </button>


            <!-- RIGHT ITEM -->
            <div class="hidden md:flex items-center gap-6">

                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890" target="_blank"
                    class="flex items-center gap-2 text-white/90 hover:text-green-300 transition">

                    <i class="fa-brands fa-whatsapp text-green-400 text-xl"></i>

                    <span class="font-medium">
                        {{ __('messages.whatsapp') }}
                    </span>

                </a>


                <div class="h-6 w-px bg-white/30"></div>


                <!-- Language -->
                <div x-data="{ open: false }" class="relative">

                    <button @click="open=!open" class="flex items-center gap-2 hover:text-yellow-300 transition">

                        @if (app()->getLocale() == 'id')
                        <span>🇮🇩 ID</span>
                        @else
                        <span>🇺🇸 EN</span>
                        @endif

                        <i class="fa-solid fa-chevron-down text-xs"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- OVERLAY -->
    <div x-show="mobileMenu" x-cloak x-transition.opacity @click="mobileMenu = false"
        class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm md:hidden">
    </div>

    <!-- MENU MOBILE -->
    <div x-show="mobileMenu" x-cloak @click.outside="mobileMenu = false"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
        class="fixed
           top-20
           left-4
           right-4
           z-50
           md:hidden">

        <div class="overflow-hidden rounded-2xl bg-white shadow-2xl">

            <nav class="py-2">

                <!-- HOME -->
                <a href="/" @click="mobileMenu=false"
                    class="flex items-center gap-4 px-5 py-4 transition
                hover:bg-slate-100
                {{ $active === 'home' ? 'bg-blue-50 text-blue-600 font-semibold border-l-4 border-blue-500' : 'text-slate-700' }}">

                    <i class="fa-solid fa-house w-6 text-blue-500"></i>

                    <span>{{ __('messages.home') }}</span>

                </a>

                <!-- NEWS -->
                <a href="/news" @click="mobileMenu=false"
                    class="flex items-center gap-4 px-5 py-4 transition
                hover:bg-slate-100
                {{ $active === 'news' ? 'bg-blue-50 text-blue-600 font-semibold border-l-4 border-blue-500' : 'text-slate-700' }}">

                    <i class="fa-solid fa-newspaper w-6 text-pink-500"></i>

                    <span>{{ __('messages.news') }}</span>

                </a>

                <!-- DASHBOARD -->
                <a href="/dashboard" @click="mobileMenu=false"
                    class="flex items-center gap-4 px-5 py-4 transition
                hover:bg-slate-100
                {{ $active === 'dashboard'
                    ? 'bg-blue-50 text-blue-600 font-semibold border-l-4 border-blue-500'
                    : 'text-slate-700' }}">

                    <i class="fa-solid fa-chart-line w-6 text-emerald-500"></i>

                    <span>{{ __('messages.dashboard') }}</span>

                </a>

                <!-- Divider -->
                <div class="mx-5 border-t border-slate-200 my-2"></div>

                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890" target="_blank" @click="mobileMenu=false"
                    class="flex items-center gap-4 px-5 py-4 transition hover:bg-slate-100 text-slate-700">

                    <i class="fa-brands fa-whatsapp w-6 text-green-500"></i>

                    <span>{{ __('messages.whatsapp') }}</span>

                </a>

                <!-- Divider -->
                <div class="mx-5 border-t border-slate-200 my-2"></div>

                <!-- LANGUAGE -->
                <div class="px-5 py-3">

                    <div class="mb-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Language
                    </div>

                    <div class="grid grid-cols-2 gap-3">

                        <a href="{{ route('lang.switch', 'id') }}" @click="mobileMenu=false"
                            class="rounded-xl border py-2.5 text-center transition
                        {{ app()->getLocale() == 'id'
                            ? 'bg-blue-500 border-blue-500 text-black font-semibold'
                            : 'border-slate-300 text-slate-700 hover:bg-slate-100' }}">

                            🇮🇩 Indonesia

                        </a>

                        <a href="{{ route('lang.switch', 'en') }}" @click="mobileMenu=false"
                            class="rounded-xl border py-2.5 text-center transition
                        {{ app()->getLocale() == 'en'
                            ? 'bg-blue-500 border-blue-500 text-black font-semibold'
                            : 'border-slate-300 text-slate-700 hover:bg-slate-100' }}">

                            🇺🇸 English

                        </a>

                    </div>

                </div>

            </nav>

        </div>

    </div>
</header>
<div class="h-16 md:h-20"></div>
<script>
    document.addEventListener('alpine:init', () => {

        document.addEventListener('keydown', function(e) {

            const header = document.querySelector(".header-wrapper");
            if (!header) return;

            const activeTag = document.activeElement.tagName.toLowerCase();
            if (activeTag === "input" || activeTag === "textarea") return;

            const component = Alpine.$data(header);

            // CTRL + SHIFT + H → Hide
            if (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === "h") {
                component.minimized = true;
            }

            // CTRL + SHIFT + S → Show
            if (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === "s") {
                component.minimized = false;
            }

            // Double ESC → Toggle
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
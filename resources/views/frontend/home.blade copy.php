@extends('frontend.layouts.app')
@section('content')
<style>
    /* =========================================================
       RSUD HERO - ISOLATED
    ========================================================== */

    .rsud-hero {
        position: relative !important;
        display: flex !important;
        align-items: flex-end !important;

        width: 100% !important;
        height: 330px !important;
        min-height: 330px !important;
        max-height: 330px !important;

        margin: 0 !important;
        padding: 0 !important;

        overflow: hidden !important;

        background-position: center center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;

        isolation: isolate !important;

        background-image: url('/img/profile.jpg');
    }


    /* =========================================================
       WHITE WING
       TINGGI 220PX
    ========================================================== */

    .rsud-hero .rsud-hero-wing {
        position: absolute !important;

        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;

        width: 100% !important;
        height: 220px !important;

        margin: 0 !important;
        padding: 0 !important;

        display: block !important;

        z-index: 2 !important;

        pointer-events: none !important;

        background: linear-gradient(to top,

                /* =========================
               BAGIAN BAWAH
            ========================== */

                rgba(255, 255, 255, 1) 0%,

                rgba(255, 255, 255, 0.98) 12%,

                rgba(255, 255, 255, 0.94) 24%,

                rgba(255, 255, 255, 0.86) 38%,

                rgba(255, 255, 255, 0.70) 52%,

                rgba(255, 255, 255, 0.52) 65%,

                rgba(255, 255, 255, 0.32) 76%,

                rgba(255, 255, 255, 0.16) 87%,

                rgba(255, 255, 255, 0.05) 95%,

                rgba(255, 255, 255, 0) 100%) !important;

        opacity: 1 !important;

        transform: none !important;

        border: 0 !important;

        box-shadow: none !important;
    }


    /* =========================================================
       EXTRA WHITE GLOW
    ========================================================== */

    .rsud-hero .rsud-hero-wing::after {
        content: "" !important;

        position: absolute !important;

        left: -5% !important;
        bottom: -45px !important;

        width: 110% !important;
        height: 125px !important;

        margin: 0 !important;
        padding: 0 !important;

        background: rgba(255, 255, 255, 0.72) !important;

        filter: blur(38px) !important;

        opacity: 0.95 !important;

        pointer-events: none !important;
    }


    /* =========================================================
       HERO CONTENT
    ========================================================== */

    .rsud-hero .rsud-hero-content {
        position: relative !important;
        z-index: 10 !important;

        width: 100% !important;

        margin-left: auto !important;
        margin-right: auto !important;
    }


    /* =========================================================
       NEWS CARD
    ========================================================== */

    .rsud-hero .rsud-hero-news {
        position: absolute !important;
        z-index: 20 !important;

        margin: 0 !important;
    }


    /* =========================================================
       MOBILE
    ========================================================== */

    @media (max-width: 767px) {

        .rsud-hero {
            height: 330px !important;
            min-height: 330px !important;
            max-height: 330px !important;
        }

        .rsud-hero .rsud-hero-wing {
            height: 155px !important;
        }

        .rsud-hero .rsud-hero-wing::after {
            height: 90px !important;
            bottom: -30px !important;
            filter: blur(30px) !important;
        }
    }


    @media (max-width: 480px) {

        .rsud-hero .rsud-hero-wing {
            height: 135px !important;
        }

    }

    #poliklinik,
    #layanan-unggulan,
    #rawat-inap {
        scroll-margin-top: 20px;
    }
</style>
<!-- ============ HERO ============ -->
<section id="profil" class="relative overflow-visible scroll-mt-24 mb-3">
    <div
        class="rsud-hero">

        <div class="rsud-hero-wing"></div>

        @if (isset($heroNewsList) && $heroNewsList->count() > 0)
        <div class="rsud-hero-news hidden lg:block top-20 right-10 w-72" x-data="{ active: 0, total: {{ $heroNewsList->count() }} }"
            x-init="setInterval(() => active = (active + 1) % total, 5000)">

            <div class="relative rounded-2xl overflow-hidden bg-white shadow-2xl ring-1 ring-black/5">
                @foreach ($heroNewsList as $index => $news)
                <a href="{{ route('news.show', $news->slug) }}" x-show="active === {{ $index }}" x-cloak
                    x-transition.opacity.duration.500ms class="block hover:opacity-95 transition-opacity">

                    <div class="relative h-36 w-full bg-slate-100">
                        @if ($news->thumbnail_url)
                        <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}"
                            class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                        @else
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-emerald-50 to-emerald-100">
                            <i class="fa-regular fa-newspaper text-2xl text-emerald-300"></i>
                        </div>
                        @endif
                    </div>

                    <div class="p-4 text-left">
                        <span
                            class="inline-flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wide text-[#D85A30]">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#D85A30] animate-pulse"></span>
                            {{ $news->category === 'kegiatan' ? 'Kegiatan Terbaru' : 'Berita Terbaru' }}
                        </span>
                        <h4 class="mt-2 text-slate-800 text-sm font-bold leading-5 line-clamp-2">
                            {{ $news->title }}
                        </h4>
                        <div class="mt-2 text-xs text-slate-400">
                            <i class="fa-regular fa-calendar mr-1"></i>
                            {{ optional($news->published_at)->translatedFormat('d M Y') }}
                        </div>
                        <div class="mt-3 text-xs font-bold text-[#0F6E56]">
                            Baca selengkapnya <i class="fa-solid fa-arrow-right ml-0.5"></i>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            @if ($heroNewsList->count() > 1)
            <div class="flex justify-center gap-1.5 mt-3">
                @foreach ($heroNewsList as $index => $news)
                <button type="button" @click="active = {{ $index }}"
                    class="h-1.5 rounded-full transition-all"
                    :class="active === {{ $index }} ? 'w-5 bg-white' : 'w-1.5 bg-white/50'"></button>
                @endforeach
            </div>
            @endif
        </div>
        @endif

        <div class="rsud-hero-content mt-8 w-full max-w-6xl mx-auto px-5 sm:px-6">

            <div class="max-w-xl">

                <span
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/25 text-white text-xs font-semibold tracking-wide backdrop-blur-sm">
                    <i class="fa-solid fa-heart-pulse text-[#F7941D]"></i>
                    IGD siaga 24 jam
                </span>

                <h1 class="mt-4 font-black text-3xl sm:text-4xl md:text-6xl leading-none tracking-tight"
                    style="
                                text-shadow:
                                0 2px 0 rgba(255,255,255,.15),
                                0 4px 12px rgba(0,0,0,.35),
                                0 10px 30px rgba(0,0,0,.45),
                                0 0 25px rgba(63,214,163,.18);
                            ">

                    <span
                        style="
                                    color:#F7941D;
                                    -webkit-text-stroke:1px rgba(255,255,255,.15);
                                ">
                        RSUD
                    </span>

                    <span
                        style="
                                    color:#3FD6A3;
                                    -webkit-text-stroke:1px rgba(255,255,255,.15);
                                ">
                        AR ROZY
                    </span>

                </h1>

                <p class="mt-4 max-w-lg
                            text-white text-base sm:text-lg md:text-xl
                            font-semibold leading-relaxed
                            drop-shadow-[0_4px_16px_rgba(0,0,0,.8)]"
                    style="text-shadow:0 2px 12px rgba(0,0,0,.75);">
                    Melayani sepenuh hati, inti kesuksesan kami.
                </p>

                <div class="mt-8 mb-12 flex flex-col gap-3 sm:flex-row sm:flex-wrap">

                    {{-- FIND DOCTOR --}}
                    <a href="#poliklinik"
                        class="group w-full sm:w-auto inline-flex items-center justify-center gap-3 h-12 px-5 rounded-2xl
                                bg-white text-slate-800 border border-white/80 shadow-lg shadow-black/10
                                hover:bg-emerald-600 hover:text-black hover:border-emerald-600 hover:-translate-y-1
                                transition-all duration-300">

                        <span
                            class="flex items-center justify-center w-9 h-9 rounded-xl
                                        bg-emerald-50 text-emerald-600
                                        group-hover:bg-white group-hover:text-emerald-600
                                        transition-all duration-300">
                            <i class="fa-solid fa-user-doctor"></i>
                        </span>

                        <span class="font-semibold">
                            {{ __('messages.find_doctor') }}
                        </span>

                        <i
                            class="fa-solid fa-arrow-right text-sm transition-transform duration-300 group-hover:translate-x-1"></i>
                    </a>

                    {{-- MENU --}}
                    @foreach ([['icon' => 'fa-table-columns', 'label' => __('messages.dashboard'), 'href' => '/dashboard'], ['icon' => 'fa-newspaper', 'label' => __('messages.news'), 'href' => route('news')], ['icon' => 'fa-file-shield', 'label' => __('messages.ppid'), 'href' => 'ppid']] as $link)
                    <a href="{{ $link['href'] }}"
                        class="group w-full sm:w-auto inline-flex items-center justify-center gap-3 h-12 px-5 rounded-2xl
                                        bg-white/95 text-slate-700 border border-white shadow-lg shadow-black/10
                                        hover:bg-slate-900 hover:text-black hover:border-slate-900 hover:-translate-y-1
                                        transition-all duration-300">

                        <span
                            class="flex items-center justify-center w-9 h-9 rounded-xl
                                        bg-slate-100 text-slate-700
                                        group-hover:bg-white group-hover:text-slate-900
                                        transition-all duration-300">
                            <i class="fa-solid {{ $link['icon'] }}"></i>
                        </span>

                        <span class="font-medium">
                            {{ $link['label'] }}
                        </span>

                    </a>
                    @endforeach

                </div>

            </div>

        </div>
    </div>

    @php
    $quickInfo = [
    [
    'icon' => 'fa-ambulance',
    'title' => 'IGD 24 Jam',
    'subtitle' => 'Pelayanan darurat',
    ],
    [
    'icon' => 'fa-phone',
    'title' => '(031) 123-4567',
    'subtitle' => 'Hubungi Kami',
    ],
    [
    'icon' => 'fa-map-marker-alt',
    'title' => 'Jl. Raya Sidoarjo No.1',
    'subtitle' => 'Lokasi Rumah Sakit',
    ],
    ];
    @endphp
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* ===============================
                                                    FLOATING QUICK INFO
                                                     =============================== */

        #quickinfoAccess {
            position: absolute;
            left: 50%;
            bottom: -52px;
            transform: translateX(-50%);
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 80;
            pointer-events: none;
        }

        #quickinfoAccess .quickinfo-panel {
            pointer-events: auto;
        }

        /* ===============================
                                                    PANEL
                                                    =============================== */

        .quickinfo-panel {

            width: min(820px, calc(100% - 32px));

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 12px 18px;

            border-radius: 20px;

            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(18px);

            border: 1px solid rgba(255, 255, 255, .5);

            box-shadow: 0 18px 40px rgba(15, 23, 42, .12);

        }

        .quickinfo-list {

            display: flex;
            align-items: center;
            width: 100%;

        }

        .quickinfo-item {

            flex: 1;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 4px 14px;

            text-decoration: none;

            color: #0f172a;

            transition: .25s;
        }

        .quickinfo-item:hover {

            transform: translateY(-2px);

        }

        .quickinfo-icon {

            width: 46px;
            height: 46px;

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #fff;

            font-size: 18px;

            flex-shrink: 0;
        }

        .bg-danger {
            background: #ef4444;
        }

        .bg-success {
            background: #059669;
        }

        .bg-primary {
            background: #2563eb;
        }

        .quickinfo-text small {

            display: block;

            font-size: 11px;

            color: #64748b;

            margin-bottom: 2px;

        }

        .quickinfo-text strong {

            display: block;

            font-size: 15px;

            font-weight: 700;

            color: #0f172a;

            line-height: 1.2;

        }

        .quickinfo-divider {

            width: 1px;
            margin: 0 4px;

            align-self: stretch;

            background: #e5e7eb;

        }

        /* ===============================
                                MOBILE
                            =============================== */

        @media (max-width:768px) {

            #quickinfoAccess {
                bottom: -30px;
            }

            .quickinfo-panel {
                width: auto;
                max-width: 260px;
                padding: 8px 10px;
                border-radius: 18px;
            }

            .quickinfo-list {
                flex-direction: row;
                justify-content: center;
                gap: 12px;
            }

            .quickinfo-item {
                flex: none;
                padding: 0;
            }

            /* Sembunyikan tulisan */
            .quickinfo-text {
                display: none;
            }

            /* Hilangkan garis pemisah */
            .quickinfo-divider {
                display: none;
            }

            /* Icon sedikit diperkecil */
            .quickinfo-icon {
                width: 42px;
                height: 42px;
                border-radius: 12px;
                font-size: 16px;
            }

        }
    </style>
    <div id="quickinfoAccess">

        <div class="quickinfo-panel">

            <div class="quickinfo-list">

                <!-- IGD -->
                <div class="quickinfo-item">

                    <div class="quickinfo-icon bg-danger">
                        <i class="fa-solid fa-truck-medical"></i>
                    </div>

                    <div class="quickinfo-text">
                        <small>IGD</small>
                        <strong>24 Jam</strong>
                    </div>

                </div>

                <div class="quickinfo-divider"></div>

                <!-- No Darurat -->
                <a href="tel:0335421118" class="quickinfo-item">

                    <div class="quickinfo-icon bg-success">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>

                    <div class="quickinfo-text">
                        <small>No. Darurat</small>
                        <strong>(0335) 421118</strong>
                    </div>

                </a>

                <div class="quickinfo-divider"></div>

                <!-- Alamat -->
                <a href="https://maps.google.com" target="_blank" class="quickinfo-item">

                    <div class="quickinfo-icon bg-primary">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div class="quickinfo-text">
                        <small>Alamat</small>
                        <strong>Jl. Raya Sidoarjo No.1</strong>
                    </div>

                </a>

            </div>

        </div>

    </div>
</section>

<!-- <div class="py-10 bg-white">
    <div class="mx-auto max-w-6xl h-px bg-slate-200"></div>

    <div
        class="mx-auto -mt-0.5
               w-16 h-1
               rounded-full
               bg-gradient-to-r
               from-emerald-400
               via-emerald-500
               to-emerald-400">
    </div>
</div> -->

<style>
    /* =========================================================
       RSUD NEWS + PKRS
       ISOLATED COMPONENT
    ========================================================== */

    .rsud-news-pkrs {
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        box-sizing: border-box !important;
    }


    /* =========================================================
       MAIN LAYOUT
       NEWS 58% | SEPARATOR | PKRS 40%
    ========================================================== */

    .rsud-news-pkrs .rsud-news-pkrs-layout {
        display: grid !important;

        grid-template-columns:
            58% 1px 40% !important;

        column-gap: 1% !important;

        width: 100% !important;
        max-width: none !important;

        margin: 0 !important;
        padding: 0 !important;

        align-items: stretch !important;
        box-sizing: border-box !important;
    }


    /* =========================================================
       NEWS
    ========================================================== */

    .rsud-news-pkrs .rsud-news {
        width: 100% !important;
        min-width: 0 !important;
        max-width: none !important;

        flex: none !important;

        box-sizing: border-box !important;
    }


    /* =========================================================
       SEPARATOR
    ========================================================== */

    .rsud-news-pkrs .rsud-separator {

        width: 1px !important;
        min-width: 1px !important;
        max-width: 1px !important;

        height: 100% !important;
        min-height: 330px !important;

        background:
            linear-gradient(to bottom,
                transparent,
                #e2e8f0 20%,
                #cbd5e1 50%,
                #e2e8f0 80%,
                transparent) !important;
    }


    /* =========================================================
       PKRS
    ========================================================== */

    .rsud-news-pkrs .rsud-pkrs {

        width: 100% !important;
        min-width: 0 !important;
        max-width: none !important;

        flex: none !important;

        box-sizing: border-box !important;
    }


    /* =========================================================
       SWIPER ISOLATION
    ========================================================== */

    .rsud-news-pkrs .heroNewsSwiper,
    .rsud-news-pkrs .pkrsSwiper {

        width: 100% !important;
        max-width: none !important;
        min-width: 0 !important;

        margin: 0 !important;

        box-sizing: border-box !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-wrapper,
    .rsud-news-pkrs .pkrsSwiper .swiper-wrapper {

        width: 100% !important;
        height: 100% !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-slide,
    .rsud-news-pkrs .pkrsSwiper .swiper-slide {

        width: 100% !important;
        max-width: none !important;
        min-width: 0 !important;

        height: 100% !important;
    }


    /* =========================================================
       NEWS SWIPER
    ========================================================== */

    .rsud-news-pkrs .heroNewsSwiper {

        height: 330px !important;
        min-height: 330px !important;
        max-height: 330px !important;

        overflow: hidden !important;

        border-radius: 32px !important;
    }


    /* =========================================================
       PKRS SWIPER
    ========================================================== */

    .rsud-news-pkrs .pkrsSwiper {

        height: 330px !important;
        min-height: 330px !important;
        max-height: 330px !important;

        overflow: hidden !important;

        border-radius:
            0 28px 28px 0 !important;
    }


    /* =========================================================
       NEWS IMAGE
       40%
    ========================================================== */

    .rsud-news-pkrs .rsud-news-image {

        width: 40% !important;
        min-width: 40% !important;
        max-width: 40% !important;

        flex-shrink: 0 !important;

        box-sizing: border-box !important;
    }


    /* =========================================================
       NEWS CONTENT
       60%
    ========================================================== */

    .rsud-news-pkrs .rsud-news-content {

        width: 60% !important;
        min-width: 60% !important;
        max-width: 60% !important;

        left: -35px !important;

        box-sizing: border-box !important;
    }


    /* =========================================================
       NEWS PAGINATION
    ========================================================== */

    .rsud-news-pkrs .heroNewsSwiper .swiper-pagination {

        display: flex !important;

        align-items: center !important;
        justify-content: center !important;

        gap: 6px !important;

        width: auto !important;

        left: 50% !important;

        bottom: 14px !important;

        transform: translateX(-50%) !important;

        padding: 6px 10px !important;

        border-radius: 999px !important;

        background:
            rgba(255, 255, 255, 0.92) !important;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, 0.08) !important;

        backdrop-filter: blur(10px) !important;

        -webkit-backdrop-filter: blur(10px) !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-pagination-bullet {

        width: 6px !important;
        height: 6px !important;

        margin: 0 !important;

        border-radius: 999px !important;

        background: #94a3b8 !important;

        opacity: 0.45 !important;

        transition:
            width 0.3s ease,
            opacity 0.3s ease,
            background 0.3s ease !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-pagination-bullet-active {

        width: 22px !important;
        height: 6px !important;

        border-radius: 999px !important;

        background: #10b981 !important;

        opacity: 1 !important;
    }


    /* =========================================================
       NEWS NAVIGATION
    ========================================================== */

    .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev,

    .rsud-news-pkrs .heroNewsSwiper .swiper-button-next {

        display: flex !important;

        align-items: center !important;
        justify-content: center !important;

        width: 44px !important;
        height: 44px !important;

        margin: 0 !important;

        top: 50% !important;

        border-radius: 999px !important;

        border:
            1px solid rgba(255, 255, 255, .65) !important;

        background:
            rgba(255, 255, 255, .90) !important;

        color: #475569 !important;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .10) !important;

        backdrop-filter: blur(10px) !important;

        -webkit-backdrop-filter: blur(10px) !important;

        opacity: 0 !important;

        transform:
            translateY(-50%) !important;

        transition:
            opacity .3s ease,
            background .3s ease,
            color .3s ease,
            border-color .3s ease,
            box-shadow .3s ease,
            transform .3s ease !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev {

        left: 14px !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-button-next {

        right: 14px !important;
    }


    .rsud-news-pkrs .heroNewsSwiper:hover .swiper-button-prev,

    .rsud-news-pkrs .heroNewsSwiper:hover .swiper-button-next {

        opacity: 1 !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev::after,

    .rsud-news-pkrs .heroNewsSwiper .swiper-button-next::after {

        font-family: swiper-icons !important;

        font-size: 14px !important;

        font-weight: 700 !important;

        line-height: 1 !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev:hover {

        color: #ffffff !important;

        border-color: #10b981 !important;

        background: #10b981 !important;

        box-shadow:
            0 8px 20px rgba(16, 185, 129, .20) !important;

        transform:
            translateY(-50%) translateX(-2px) !important;
    }


    .rsud-news-pkrs .heroNewsSwiper .swiper-button-next:hover {

        color: #ffffff !important;

        border-color: #10b981 !important;

        background: #10b981 !important;

        box-shadow:
            0 8px 20px rgba(16, 185, 129, .20) !important;

        transform:
            translateY(-50%) translateX(2px) !important;
    }


    /* =========================================================
       PKRS PAGINATION
    ========================================================== */

    .rsud-news-pkrs .pkrsSwiper .swiper-pagination {

        display: flex !important;

        align-items: center !important;
        justify-content: center !important;

        gap: 6px !important;

        width: auto !important;

        left: 50% !important;

        bottom: 70px !important;

        transform: translateX(-50%) !important;

        padding: 6px 10px !important;

        border-radius: 999px !important;

        background:
            rgba(255, 255, 255, .92) !important;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .08) !important;

        backdrop-filter: blur(10px) !important;

        -webkit-backdrop-filter: blur(10px) !important;
    }


    .rsud-news-pkrs .pkrsSwiper .swiper-pagination-bullet {

        width: 6px !important;
        height: 6px !important;

        margin: 0 !important;

        border-radius: 999px !important;

        background: #94a3b8 !important;

        opacity: .45 !important;

        transition:
            width .3s ease,
            opacity .3s ease,
            background .3s ease !important;
    }


    .rsud-news-pkrs .pkrsSwiper .swiper-pagination-bullet-active {

        width: 20px !important;
        height: 6px !important;

        border-radius: 999px !important;

        background: #10b981 !important;

        opacity: 1 !important;
    }


    /* =========================================================
       PKRS NAVIGATION
    ========================================================== */

    .rsud-news-pkrs .pkrsSwiper .swiper-button-prev,

    .rsud-news-pkrs .pkrsSwiper .swiper-button-next {

        display: flex !important;

        align-items: center !important;
        justify-content: center !important;

        width: 40px !important;
        height: 40px !important;

        margin: 0 !important;

        top: 46% !important;

        border-radius: 999px !important;

        border:
            1px solid rgba(226, 232, 240, .85) !important;

        background:
            rgba(255, 255, 255, .94) !important;

        color: #475569 !important;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .08) !important;

        backdrop-filter: blur(10px) !important;

        -webkit-backdrop-filter: blur(10px) !important;

        opacity: 0 !important;

        transform:
            translateY(-50%) !important;

        transition:
            opacity .3s ease,
            background .3s ease,
            color .3s ease,
            border-color .3s ease,
            box-shadow .3s ease,
            transform .3s ease !important;
    }


    .rsud-news-pkrs .pkrsSwiper .swiper-button-prev {

        left: 12px !important;
    }


    .rsud-news-pkrs .pkrsSwiper .swiper-button-next {

        right: 12px !important;
    }


    .rsud-news-pkrs .pkrsSwiper:hover .swiper-button-prev,

    .rsud-news-pkrs .pkrsSwiper:hover .swiper-button-next {

        opacity: 1 !important;
    }


    .rsud-news-pkrs .pkrsSwiper .swiper-button-prev::after,

    .rsud-news-pkrs .pkrsSwiper .swiper-button-next::after {

        font-family: swiper-icons !important;

        font-size: 13px !important;

        font-weight: 700 !important;

        line-height: 1 !important;
    }


    .rsud-news-pkrs .pkrsSwiper .swiper-button-prev:hover {

        color: #ffffff !important;

        border-color: #10b981 !important;

        background: #10b981 !important;

        box-shadow:
            0 8px 20px rgba(16, 185, 129, .20) !important;

        transform:
            translateY(-50%) translateX(-2px) !important;
    }


    .rsud-news-pkrs .pkrsSwiper .swiper-button-next:hover {

        color: #ffffff !important;

        border-color: #10b981 !important;

        background: #10b981 !important;

        box-shadow:
            0 8px 20px rgba(16, 185, 129, .20) !important;

        transform:
            translateY(-50%) translateX(2px) !important;
    }


    /* =========================================================
   MOBILE RESPONSIVE
   DESKTOP TIDAK DIUBAH
    ========================================================= */

    @media (max-width: 1023px) {

        /* =====================================================
       MAIN LAYOUT
    ====================================================== */

        .rsud-news-pkrs .rsud-news-pkrs-layout {

            display: flex !important;
            flex-direction: column !important;

            width: 100% !important;
            max-width: 100% !important;

            gap: 40px !important;

            padding: 0 !important;
        }


        /* =====================================================
       NEWS + PKRS FULL WIDTH
    ====================================================== */

        .rsud-news-pkrs .rsud-news,
        .rsud-news-pkrs .rsud-pkrs {

            width: 100% !important;
            max-width: 100% !important;
            min-width: 0 !important;

            box-sizing: border-box !important;
        }


        /* =====================================================
       SEPARATOR HILANG
    ====================================================== */

        .rsud-news-pkrs .rsud-separator {

            display: none !important;
        }


        /* =====================================================
       NEWS SLIDER
    ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper {

            width: 100% !important;

            height: auto !important;
            min-height: 0 !important;
            max-height: none !important;

            overflow: hidden !important;

            border-radius: 24px !important;
        }


        .rsud-news-pkrs .heroNewsSwiper .swiper-wrapper {

            height: auto !important;
        }


        .rsud-news-pkrs .heroNewsSwiper .swiper-slide {

            width: 100% !important;

            height: auto !important;
            min-height: 0 !important;
        }


        /* =====================================================
       NEWS CARD
    ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper .swiper-slide>a {

            width: 100% !important;
            height: auto !important;

            min-height: 0 !important;

            border-radius: 24px !important;
        }


        /* =====================================================
       NEWS MAIN CONTENT
    ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper .swiper-slide>a>div {

            display: flex !important;

            flex-direction: column !important;

            width: 100% !important;
            height: auto !important;

            min-height: 0 !important;
        }


        /* =====================================================
       NEWS IMAGE
    ====================================================== */

        .rsud-news-pkrs .rsud-news-image {

            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;

            height: 210px !important;
            min-height: 210px !important;
            max-height: 210px !important;

            flex-shrink: 0 !important;

            box-sizing: border-box !important;
        }


        .rsud-news-pkrs .rsud-news-image img {

            max-width: 78% !important;
            max-height: 78% !important;
        }


        /* =====================================================
       NEWS CONTENT
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content {

            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;

            height: auto !important;
            min-height: 0 !important;

            left: 0 !important;

            padding:
                20px 20px 72px 20px !important;

            box-sizing: border-box !important;
        }


        /* Hilangkan divider vertical */
        .rsud-news-pkrs .rsud-news-content>div:first-child {

            display: none !important;
        }


        /* =====================================================
       NEWS TITLE
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content h2 {

            width: 100% !important;
            max-width: 100% !important;

            font-size: 20px !important;
            line-height: 1.3 !important;
        }


        /* =====================================================
       NEWS FOOTER
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content .mt-5 {

            margin-top: 18px !important;
        }


        .rsud-news-pkrs .rsud-news-content .mt-5.flex {

            display: flex !important;

            flex-direction: column !important;

            align-items: flex-start !important;

            justify-content: flex-start !important;

            gap: 14px !important;
        }


        /* =====================================================
       READ MORE
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content .inline-flex {

            width: auto !important;

            max-width: 100% !important;
        }


        /* =====================================================
       NEWS PAGINATION
    ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper .swiper-pagination {

            bottom: 16px !important;

            z-index: 50 !important;
        }


        /* =====================================================
       NEWS NAVIGATION
    ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev,
        .rsud-news-pkrs .heroNewsSwiper .swiper-button-next {

            opacity: 1 !important;

            z-index: 40 !important;
        }


        /* =====================================================
       PKRS CONTAINER
    ====================================================== */

        .rsud-news-pkrs .rsud-pkrs {

            height: auto !important;
            min-height: 0 !important;
            max-height: none !important;
        }


        /* =====================================================
       PKRS SWIPER
    ====================================================== */

        .rsud-news-pkrs .pkrsSwiper {

            width: 100% !important;

            height: 320px !important;
            min-height: 320px !important;
            max-height: 320px !important;

            border-radius: 24px !important;
        }


        .rsud-news-pkrs .pkrsSwiper .swiper-wrapper {

            height: 100% !important;
        }


        .rsud-news-pkrs .pkrsSwiper .swiper-slide {

            height: 100% !important;
        }


        /* =====================================================
       PKRS IMAGE AREA
    ====================================================== */

        .rsud-news-pkrs .pkrsSwiper .swiper-slide>a {

            height: 100% !important;
        }


        .rsud-news-pkrs .pkrsSwiper .swiper-slide>a>div {

            height: 100% !important;
        }


        .rsud-news-pkrs .pkrsSwiper img {

            max-width: 86% !important;
            max-height: 78% !important;
        }


        /* =====================================================
       PKRS FOOTER
    ====================================================== */

        .rsud-news-pkrs .pkrsSwiper .h-\[58px\] {

            height: 58px !important;
            min-height: 58px !important;

            padding-left: 16px !important;
            padding-right: 16px !important;
        }


        /* =====================================================
       PKRS PAGINATION
    ====================================================== */

        .rsud-news-pkrs .pkrsSwiper .swiper-pagination {

            bottom: 68px !important;

            z-index: 50 !important;
        }


        /* =====================================================
       PKRS NAVIGATION
    ====================================================== */

        .rsud-news-pkrs .pkrsSwiper .swiper-button-prev,
        .rsud-news-pkrs .pkrsSwiper .swiper-button-next {

            opacity: 1 !important;

            z-index: 40 !important;
        }
    }


    /* =========================================================
   SMALL MOBILE
   <= 768px
    ========================================================= */

    @media (max-width: 768px) {

        /* =====================================================
       SECTION SPACING
    ====================================================== */

        .rsud-news-pkrs {

            padding-top: 96px !important;
            padding-bottom: 48px !important;
        }


        /* =====================================================
       MAIN GAP
    ====================================================== */

        .rsud-news-pkrs .rsud-news-pkrs-layout {

            gap: 36px !important;
        }


        /* =====================================================
       HEADINGS
    ====================================================== */

        .rsud-news-pkrs .rsud-news>.px-4,
        .rsud-news-pkrs .rsud-pkrs>.px-4 {

            padding-left: 16px !important;
            padding-right: 16px !important;
        }


        .rsud-news-pkrs .rsud-news h2,
        .rsud-news-pkrs .rsud-pkrs h2 {

            font-size: 20px !important;
            line-height: 1.25 !important;
        }


        /* =====================================================
       NEWS SLIDER
    ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper {

            height: auto !important;
            min-height: 0 !important;

            border-radius: 22px !important;
        }


        /* =====================================================
       NEWS IMAGE
    ====================================================== */

        .rsud-news-pkrs .rsud-news-image {

            height: 185px !important;
            min-height: 185px !important;
            max-height: 185px !important;
        }


        .rsud-news-pkrs .rsud-news-image img {

            max-width: 72% !important;
            max-height: 72% !important;

            border-radius: 14px !important;
        }


        /* =====================================================
       NEWS CONTENT
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content {

            padding:
                18px 18px 68px 18px !important;
        }


        /* =====================================================
       CATEGORY
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content .mb-3 {

            margin-bottom: 10px !important;
        }


        .rsud-news-pkrs .rsud-news-content span {

            max-width: 100%;
        }


        /* =====================================================
       TITLE
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content h2 {

            font-size: 18px !important;

            line-height: 1.3 !important;
        }


        /* =====================================================
       DATE
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content .h-9 {

            width: 34px !important;
            height: 34px !important;
        }


        .rsud-news-pkrs .rsud-news-content .text-xs {

            font-size: 11px !important;
        }


        /* =====================================================
       READ MORE
    ====================================================== */

        .rsud-news-pkrs .rsud-news-content .inline-flex {

            padding:
                9px 13px !important;

            font-size: 10px !important;
        }


        /* =====================================================
       NEWS ARROWS
    ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev,
        .rsud-news-pkrs .heroNewsSwiper .swiper-button-next {

            width: 34px !important;
            height: 34px !important;

            top: 25% !important;
        }


        .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev {

            left: 8px !important;
        }


        .rsud-news-pkrs .heroNewsSwiper .swiper-button-next {

            right: 8px !important;
        }


        .rsud-news-pkrs .heroNewsSwiper .swiper-button-prev::after,
        .rsud-news-pkrs .heroNewsSwiper .swiper-button-next::after {

            font-size: 11px !important;
        }


        /* =====================================================
             NEWS PAGINATION
            ====================================================== */

        .rsud-news-pkrs .heroNewsSwiper .swiper-pagination {

            bottom: 14px !important;

            padding:
                5px 8px !important;
        }


        /* =====================================================
            PKRS
            ====================================================== */

        .rsud-news-pkrs .pkrsSwiper {

            height: 285px !important;
            min-height: 285px !important;
            max-height: 285px !important;

            border-radius: 22px !important;
        }


        .rsud-news-pkrs .pkrsSwiper img {

            max-width: 82% !important;
            max-height: 72% !important;

            border-radius: 14px !important;
        }


        /* =====================================================
            PKRS FOOTER
            ====================================================== */

        .rsud-news-pkrs .pkrsSwiper .h-\[58px\] {

            height: 54px !important;
            min-height: 54px !important;

            padding-left: 14px !important;
            padding-right: 14px !important;
        }


        .rsud-news-pkrs .pkrsSwiper .h-\[58px\] .h-9 {

            width: 32px !important;
            height: 32px !important;
        }


        .rsud-news-pkrs .pkrsSwiper .h-\[58px\] .h-10 {

            width: 36px !important;
            height: 36px !important;
        }


        /* =====================================================
            PKRS PAGINATION
        ====================================================== */

        .rsud-news-pkrs .pkrsSwiper .swiper-pagination {

            bottom: 64px !important;

            padding:
                5px 8px !important;
        }


        /* =====================================================
        PKRS ARROWS
        ====================================================== */

        .rsud-news-pkrs .pkrsSwiper .swiper-button-prev,
        .rsud-news-pkrs .pkrsSwiper .swiper-button-next {

            width: 34px !important;
            height: 34px !important;

            top: 43% !important;
        }


        .rsud-news-pkrs .pkrsSwiper .swiper-button-prev {

            left: 8px !important;
        }


        .rsud-news-pkrs .pkrsSwiper .swiper-button-next {

            right: 8px !important;
        }


        .rsud-news-pkrs .pkrsSwiper .swiper-button-prev::after,
        .rsud-news-pkrs .pkrsSwiper .swiper-button-next::after {

            font-size: 11px !important;
        }
    }


    /* =========================================================
            VERY SMALL MOBILE
            <= 480px
    ========================================================= */

    @media (max-width: 480px) {

        .rsud-news-pkrs {

            padding-top: 88px !important;
        }


        /* NEWS */

        .rsud-news-pkrs .rsud-news-image {

            height: 165px !important;
            min-height: 165px !important;
            max-height: 165px !important;
        }


        .rsud-news-pkrs .rsud-news-content {

            padding:
                16px 16px 64px 16px !important;
        }


        .rsud-news-pkrs .rsud-news-content h2 {

            font-size: 17px !important;
        }


        .rsud-news-pkrs .rsud-news-content .mt-5.flex {

            gap: 12px !important;
        }


        /* PKRS */

        .rsud-news-pkrs .pkrsSwiper {

            height: 260px !important;
            min-height: 260px !important;
            max-height: 260px !important;
        }


        .rsud-news-pkrs .pkrsSwiper img {

            max-width: 78% !important;
            max-height: 68% !important;
        }


        .rsud-news-pkrs .pkrsSwiper .h-\[58px\] {

            height: 52px !important;
            min-height: 52px !important;
        }
    }
</style>

<section class="rsud-news-pkrs bg-white pt-28 md:pt-32 lg:pt-40 pb-20">

    @if ($latestNews->count())

    <div class="rsud-news-pkrs-layout">

        {{-- =========================================================
            NEWS
        ========================================================== --}}
        <div class="rsud-news">

            {{-- =========================================================
                JUDUL
            ========================================================== --}}
            <div class="px-4">

                <h2
                    class="
                            text-xl
                            font-extrabold
                            tracking-tight
                            text-slate-800
                            sm:text-2xl
                        ">

                    Berita Tentang Kami

                </h2>

                <div
                    class="
                            mt-2
                            h-1
                            w-12
                            rounded-full
                            bg-emerald-500
                        ">
                </div>

            </div>


            {{-- =========================================================
                NEWS SLIDER
            ========================================================== --}}
            <div
                class="swiper heroNewsSwiper group"
                style="
                        height:330px !important;
                        min-height:330px !important;
                        max-height:330px !important;
                    ">

                <div class="swiper-wrapper">

                    @foreach ($latestNews as $news)

                    <div class="swiper-slide">

                        <a
                            href="{{ route('news.show', $news->slug) }}"
                            class="
                                    group
                                    relative
                                    flex
                                    h-full
                                    w-full
                                    overflow-hidden
                                    rounded-[28px]
                                    bg-white
                                ">


                            {{-- =================================================
                                MAIN CONTENT
                            ================================================== --}}
                            <div
                                class="
                                        relative
                                        z-10
                                        flex
                                        h-full
                                        w-full
                                        flex-col
                                        lg:flex-row
                                    ">


                                {{-- =================================================
                                    IMAGE
                                ================================================== --}}
                                <div
                                    class="
                                        rsud-news-image
                                        relative
                                        flex
                                        h-[45%]
                                        w-full
                                        shrink-0
                                        items-center
                                        justify-center
                                        overflow-hidden

                                        lg:h-full
                                        lg:w-[40%]
                                        lg:max-w-[40%]
                                    ">


                                    {{-- Glow --}}
                                    <div
                                        class="
                                            absolute
                                            left-1/2
                                            top-1/2
                                            h-[70%]
                                            w-[70%]
                                            -translate-x-1/2
                                            -translate-y-1/2
                                            rounded-full
                                            bg-emerald-50
                                            blur-3xl
                                            opacity-70
                                            transition-all
                                            duration-700
                                            group-hover:scale-110
                                            group-hover:opacity-90
                                        ">
                                    </div>


                                    {{-- Image --}}
                                    <img
                                        src="{{ $news->thumbnail_url }}"
                                        alt="{{ $news->title }}"
                                        class="
                                                relative
                                                z-10
                                                block
                                                h-auto
                                                w-auto
                                                max-h-[82%]
                                                max-w-[82%]
                                                rounded-xl
                                                object-contain
                                                transition-all
                                                duration-700
                                                ease-out
                                                group-hover:scale-[1.025]
                                            "
                                        style="
                                                width:auto !important;
                                                height:auto !important;
                                                max-width:82% !important;
                                                max-height:82% !important;
                                                object-fit:contain !important;
                                            ">


                                    {{-- Accent --}}
                                    <div
                                        class="
                                                absolute
                                                bottom-7
                                                left-1/2
                                                z-20
                                                h-1
                                                w-10
                                                -translate-x-1/2
                                                rounded-full
                                                bg-emerald-500
                                                opacity-80
                                                transition-all
                                                duration-500
                                                group-hover:w-16
                                            ">
                                    </div>

                                </div>


                                {{-- =================================================
                                    CONTENT
                                ================================================== --}}
                                <div
                                    class="
                                            rsud-news-content
                                            relative
                                            flex
                                            h-[55%]
                                            w-full
                                            flex-col
                                            justify-center

                                            px-5
                                            pb-7
                                            pt-4

                                            sm:px-6

                                            lg:h-full
                                            lg:w-[60%]
                                            lg:max-w-[60%]
                                            lg:-left-[35px]
                                            lg:px-0
                                            lg:py-8

                                            xl:-left-[45px]
                                            2xl:-left-[50px]
                                        ">


                                    {{-- Vertical divider --}}
                                    <div
                                        class="
                                                absolute
                                                left-0
                                                top-1/2
                                                hidden
                                                h-2/3
                                                w-px
                                                -translate-y-1/2
                                                bg-gradient-to-b
                                                from-transparent
                                                via-emerald-200
                                                to-transparent
                                                lg:block
                                            ">
                                    </div>


                                    <div
                                        class="
                                            relative
                                            z-10
                                            w-full
                                            max-w-none
                                        ">


                                        {{-- =================================================
                                            CATEGORY
                                        ================================================== --}}
                                        <div class="mb-3 lg:mb-4">

                                            <span
                                                class="
                                                        inline-flex
                                                        items-center
                                                        gap-2
                                                        rounded-full
                                                        border
                                                        border-emerald-100
                                                        bg-emerald-50
                                                        px-3
                                                        py-1.5
                                                        text-[10px]
                                                        font-extrabold
                                                        uppercase
                                                        tracking-[.14em]
                                                        text-emerald-700
                                                        shadow-sm
                                                    ">

                                                <span
                                                    class="
                                                        h-1.5
                                                        w-1.5
                                                        rounded-full
                                                        bg-emerald-500
                                                        shadow-[0_0_0_3px_rgba(16,185,129,.12)]
                                                    ">
                                                </span>

                                                {{ ucfirst($news->category) }}

                                            </span>

                                        </div>


                                        {{-- =================================================
                                            TITLE
                                        ================================================== --}}
                                        <h2
                                            class="
                                                    max-w-full
                                                    text-lg
                                                    font-extrabold
                                                    leading-[1.2]
                                                    tracking-tight
                                                    text-slate-800

                                                    sm:text-xl

                                                    lg:text-xl
                                                    xl:text-[25px]
                                                    2xl:text-[27px]

                                                    transition-colors
                                                    duration-300

                                                    group-hover:text-emerald-700
                                                ">

                                            {{ $news->title }}

                                        </h2>


                                        {{-- Accent --}}
                                        <div
                                            class="
                                                    mt-4
                                                    h-1
                                                    w-9
                                                    rounded-full
                                                    bg-emerald-500
                                                    transition-all
                                                    duration-500
                                                    group-hover:w-14
                                                ">
                                        </div>


                                        {{-- =================================================
                                            FOOTER
                                        ================================================== --}}
                                        <div
                                            class="
                                                    mt-5
                                                    flex
                                                    flex-col
                                                    gap-3

                                                    xl:mt-6

                                                    sm:flex-row
                                                    sm:items-center
                                                    sm:justify-between
                                                ">


                                            {{-- DATE --}}
                                            <div
                                                class="
                                                    flex
                                                    items-center
                                                    gap-2.5
                                                    text-xs
                                                    font-medium
                                                    text-slate-500
                                                    mt-2
                                                ">

                                                <div
                                                    class="
                                                            flex
                                                            h-9
                                                            w-9
                                                            shrink-0
                                                            items-center
                                                            justify-center
                                                            rounded-xl
                                                            border
                                                            border-emerald-100
                                                            bg-emerald-50
                                                            text-emerald-600
                                                            shadow-sm
                                                            transition-all
                                                            duration-300
                                                            group-hover:bg-emerald-500
                                                            group-hover:text-white
                                                        ">

                                                    <i class="fa-regular fa-calendar text-xs"></i>

                                                </div>


                                                <div class="flex flex-col ml-2">

                                                    <span
                                                        class="
                                                            text-[9px]
                                                            font-semibold
                                                            uppercase
                                                            tracking-wider
                                                            text-slate-400
                                                        ">

                                                        Dipublikasikan

                                                    </span>


                                                    <span
                                                        class="
                                                                text-xs
                                                                font-semibold
                                                                text-slate-700
                                                            ">

                                                        {{ optional($news->published_at)->translatedFormat('d F Y') }}

                                                    </span>

                                                </div>

                                            </div>


                                            {{-- READ MORE --}}
                                            <div
                                                class="
                                                        inline-flex
                                                        w-fit
                                                        shrink-0
                                                        items-center
                                                        gap-2
                                                        rounded-full
                                                        border
                                                        border-emerald-500
                                                        bg-emerald-500
                                                        px-4
                                                        py-2
                                                        text-[11px]
                                                        font-bold
                                                        text-white
                                                        shadow-md
                                                        transition-all
                                                        duration-300
                                                        sm:text-xs
                                                        group-hover:gap-3
                                                        group-hover:bg-emerald-600
                                                    ">

                                                <span>
                                                    Baca Selengkapnya
                                                </span>


                                                <span
                                                    class="
                                                            flex
                                                            h-5
                                                            w-5
                                                            items-center
                                                            justify-center
                                                            rounded-full
                                                            bg-white/10
                                                            transition-transform
                                                            duration-300
                                                            group-hover:translate-x-1
                                                        ">

                                                    <i
                                                        class="
                                                                fa-solid
                                                                fa-arrow-right
                                                                text-[9px]
                                                            ">
                                                    </i>

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                    @endforeach

                </div>


                {{-- =========================================================
                    PAGINATION
                ========================================================= --}}
                <div
                    class="
                            swiper-pagination
                            !bottom-5
                            !left-1/2
                            !w-auto
                            -translate-x-1/2
                            rounded-full
                            bg-white/90
                            px-3
                            py-1.5
                            shadow-sm
                            backdrop-blur-md
                        ">
                </div>


                {{-- =========================================================
                    PREVIOUS
                ========================================================= --}}
                <div
                    class="
                            swiper-button-prev
                            !left-4
                            !top-1/2
                            !h-11
                            !w-11
                            rounded-full

                            border
                            border-white/60

                            bg-white/90
                            !text-slate-600

                            shadow-md
                            backdrop-blur-md

                            opacity-0
                            transition-all
                            duration-300

                            group-hover:opacity-100

                            hover:!border-emerald-400
                            hover:!bg-emerald-500
                            hover:!text-white
                            hover:shadow-lg
                            hover:shadow-emerald-500/20

                            after:!text-[14px]
                            after:!font-bold
                        ">
                </div>


                {{-- =========================================================
                    NEXT
                ========================================================= --}}
                <div
                    class="
                            swiper-button-next
                            !right-4
                            !top-1/2
                            !h-11
                            !w-11
                            rounded-full

                            border
                            border-white/60

                            bg-white/90
                            !text-slate-600

                            shadow-md
                            backdrop-blur-md

                            opacity-0
                            transition-all
                            duration-300

                            group-hover:opacity-100

                            hover:!border-emerald-400
                            hover:!bg-emerald-500
                            hover:!text-white
                            hover:shadow-lg
                            hover:shadow-emerald-500/20

                            after:!text-[14px]
                            after:!font-bold
                        ">
                </div>

            </div>

        </div>


        {{-- =========================================================
            SEKAT
        ========================================================== --}}
        <div class="rsud-separator"></div>


        {{-- =========================================================
            PKRS
        ========================================================== --}}
        <div
            class="rsud-pkrs"
            style="
                height:330px !important;
                min-height:330px !important;
                max-height:330px !important;
            ">


            <div class="px-4 text-right">

                <h2
                    class="
                        text-xl
                        font-extrabold
                        tracking-tight
                        text-slate-800
                        sm:text-2xl
                    ">

                    Informasi PKRS

                </h2>

                <div
                    class="
                        mt-2
                        ml-auto
                        h-1
                        w-12
                        rounded-full
                        bg-emerald-500
                    ">
                </div>

            </div>


            @if($latestPkrsPosts->count())


            <div
                class="
                    swiper
                    pkrsSwiper
                    group
                    relative
                    h-full
                    overflow-hidden
                    rounded-r-[28px]
                    bg-white
                ">

                <div class="swiper-wrapper">

                    @foreach($latestPkrsPosts as $post)

                    <div class="swiper-slide">

                        <a
                            href="{{ url('/pkrs/' . $post->slug) }}"
                            class="
                                group
                                relative
                                flex
                                h-full
                                w-full
                                overflow-hidden
                                bg-white
                            ">

                            <div
                                class="
                                    relative
                                    flex
                                    h-full
                                    w-full
                                    flex-col
                                    overflow-hidden
                                    bg-white
                                ">


                                {{-- IMAGE --}}
                                <div
                                    class="
                                        relative
                                        flex
                                        min-h-0
                                        flex-1
                                        items-center
                                        justify-center
                                        overflow-hidden
                                    ">


                                    <div
                                        class="
                                            absolute
                                            left-1/2
                                            top-1/2
                                            h-[75%]
                                            w-[75%]
                                            -translate-x-1/2
                                            -translate-y-1/2
                                            rounded-full
                                            bg-emerald-50
                                            blur-3xl
                                            opacity-70
                                            transition-all
                                            duration-700
                                            group-hover:scale-110
                                            group-hover:opacity-100
                                        ">
                                    </div>


                                    @if($post->thumbnail)

                                    <img
                                        src="{{ asset('storage/' . $post->thumbnail) }}"
                                        alt="{{ $post->title }}"
                                        class="
                                            relative
                                            z-10
                                            block
                                            h-auto
                                            w-auto
                                            max-h-[90%]
                                            max-w-[90%]
                                            rounded-2xl
                                            object-contain
                                            transition-all
                                            duration-700
                                            ease-out
                                            group-hover:scale-[1.025]
                                        "
                                        style="
                                            width:auto !important;
                                            height:auto !important;
                                            max-width:90% !important;
                                            max-height:90% !important;
                                            object-fit:contain !important;
                                            object-position:center !important;
                                        ">

                                    @else

                                    <div
                                        class="
                                            relative
                                            z-10
                                            flex
                                            h-24
                                            w-24
                                            items-center
                                            justify-center
                                            rounded-3xl
                                            bg-emerald-50
                                            text-emerald-500
                                            shadow-sm
                                        ">

                                        <i class="fa-solid fa-heart-pulse text-3xl"></i>

                                    </div>

                                    @endif

                                </div>


                                {{-- FOOTER --}}
                                <div
                                    class="
                                        relative
                                        z-30
                                        flex
                                        h-[58px]
                                        w-full
                                        shrink-0
                                        items-center
                                        justify-between
                                        border-t
                                        border-slate-100
                                        bg-white
                                        px-5
                                        lg:px-6
                                    ">


                                    <div
                                        class="
                                            flex
                                            items-center
                                            gap-3
                                            text-xs
                                            font-semibold
                                            text-slate-500
                                        ">

                                        <span
                                            class="
                                                flex
                                                h-9
                                                w-9
                                                shrink-0
                                                items-center
                                                justify-center
                                                rounded-xl
                                                border
                                                border-emerald-100
                                                bg-emerald-50
                                                text-emerald-600
                                            ">

                                            <i class="fa-regular fa-calendar"></i>

                                        </span>

                                        <span>
                                            {{ optional($post->published_at)->translatedFormat('d F Y') }}
                                        </span>

                                    </div>


                                    <span
                                        class="
                                            flex
                                            h-10
                                            w-10
                                            shrink-0
                                            items-center
                                            justify-center
                                            rounded-full
                                            border
                                            border-slate-200
                                            bg-slate-50
                                            text-slate-600
                                            shadow-sm
                                            transition-all
                                            duration-300
                                            group-hover:border-emerald-500
                                            group-hover:bg-emerald-500
                                            group-hover:text-white
                                        ">

                                        <i
                                            class="
                                                fa-solid
                                                fa-arrow-right
                                                text-xs
                                                transition-transform
                                                duration-300
                                                group-hover:translate-x-1
                                            ">
                                        </i>

                                    </span>

                                </div>

                            </div>

                        </a>

                    </div>

                    @endforeach

                </div>


                @if($latestPkrsPosts->count() > 1)

                {{-- =========================================================
                    PAGINATION
                ========================================================= --}}
                <div
                    class="
                            swiper-pagination
                            !bottom-[70px]
                            !left-1/2
                            !w-auto
                            -translate-x-1/2
                            rounded-full
                            bg-white/90
                            px-3
                            py-1.5
                            shadow-sm
                            backdrop-blur-md
                        ">
                </div>


                {{-- =========================================================
                    PREVIOUS
                ========================================================= --}}
                <div
                    class="
                            swiper-button-prev
                            !left-4
                            !top-[46%]
                            !h-10
                            !w-10
                            rounded-full
                            border
                            border-slate-200/80
                            bg-white/90
                            !text-slate-600
                            shadow-sm
                            backdrop-blur-md

                            opacity-0
                            transition-all
                            duration-300

                            group-hover:opacity-100

                            hover:!border-emerald-400
                            hover:!bg-emerald-500
                            hover:!text-white
                            hover:shadow-lg
                            hover:shadow-emerald-500/20

                            after:!text-[13px]
                            after:!font-bold
                        ">
                </div>


                {{-- =========================================================
                    NEXT
                ========================================================= --}}
                <div
                    class="
                        swiper-button-next
                        !right-4
                        !top-[46%]
                        !h-10
                        !w-10
                        rounded-full
                        border
                        border-slate-200/80
                        bg-white/90
                        !text-slate-600
                        shadow-sm
                        backdrop-blur-md

                        opacity-0
                        transition-all
                        duration-300

                        group-hover:opacity-100

                        hover:!border-emerald-400
                        hover:!bg-emerald-500
                        hover:!text-white
                        hover:shadow-lg
                        hover:shadow-emerald-500/20

                        after:!text-[13px]
                        after:!font-bold
                    ">
                </div>

                @endif

            </div>


            @else


            {{-- EMPTY --}}
            <div
                class="
                    flex
                    h-full
                    items-center
                    justify-center
                    rounded-r-[28px]
                    border
                    border-slate-200
                    bg-white
                ">

                <div class="px-8 text-center">

                    <div
                        class="
                            mx-auto
                            flex
                            h-16
                            w-16
                            items-center
                            justify-center
                            rounded-2xl
                            bg-emerald-50
                            text-emerald-600
                        ">

                        <i class="fa-solid fa-heart-pulse text-2xl"></i>

                    </div>

                    <h3
                        class="
                            mt-4
                            text-xl
                            font-bold
                            text-slate-800
                        ">

                        Informasi PKRS

                    </h3>

                    <p
                        class="
                            mt-2
                            text-sm
                            text-slate-500
                        ">

                        Informasi kesehatan dan edukasi
                        dari RSUD Ar Rozy.

                    </p>

                </div>

            </div>

            @endif

        </div>

    </div>

    @endif

</section>

<div class="py-10 bg-white mt-4 mb-8">
    <div class="mx-auto max-w-6xl h-px bg-slate-200"></div>

    <div
        class="mx-auto -mt-0.5
               w-16 h-1
               rounded-full
               bg-gradient-to-r
               from-emerald-400
               via-emerald-500
               to-emerald-400">
    </div>
</div>

<!-- About Us -->
<section id="about" class="md:py-24 py-15 bg-gradient-to-b from-gray-50 to-white">

    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <!-- Header -->
        <div class="text-center mb-14">

            <div
                class="mt-4 w-24 h-1.5
                       bg-gradient-to-r
                       from-blue-500
                       to-indigo-600
                       mx-auto
                       rounded-full">
            </div>

        </div>

        <!-- Tentang -->
        <div class="flex items-center justify-center gap-3 mb-5">

            <div
                class="
                            w-12 h-12
                            rounded-2xl
                            bg-blue-100
                            flex items-center justify-center
                        ">

                <i class="fa-solid fa-hospital text-blue-600 text-xl"></i>

            </div>


            <h3 class="text-xl md:text-2xl font-bold text-gray-800">
                Tentang RSUD Ar Rozy
            </h3>

        </div>

        <p
            class="
                        text-gray-600
                        text-base md:text-lg
                        leading-relaxed
                        text-center
                        max-w-4xl
                        mx-auto
                    ">

            <strong class="text-gray-800">
                RSUD Ar Rozy
            </strong>
            dalam melayani pasien selalu dilandasi dengan ketulusan dan
            keikhlasan secara profesional, dengan tetap menjaga motivasi
            dan semangat yang tinggi tanpa putus asa, serta memenuhi
            standarisasi pelayanan yang prima.

            <br><br>

            Hal tersebut menjadi landasan RSUD Ar Rozy untuk mencapai
            keberhasilan dalam kegiatan pelayanan yang dijalankan.
            RSUD Ar Rozy menempatkan pasien sebagai bagian penting
            dan berkomitmen memberikan pelayanan kesehatan terbaik.

        </p>

        <!-- Visi & Misi -->
        <div class="grid md:grid-cols-2 gap-4 md:gap-8">


            <!-- Visi -->
            <div
                class="
                           p-5 md:p-8
                            min-h-[180px] md:min-h-[220px]
                            flex
                            flex-col
                        ">


                <!-- Icon + Judul tetap di atas -->
                <div class="flex items-center justify-center gap-3 mb-5">

                    <div
                        class="
                            w-12 h-12
                            rounded-2xl
                            bg-green-100
                            flex items-center justify-center
                        ">

                        <i class="fa-solid fa-eye text-green-600 text-xl"></i>

                    </div>


                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">
                        Visi
                    </h3>

                </div>


                <!-- Isi di tengah -->
                <div class="flex-1 flex">

                    <p
                        class="
                                text-base md:text-lg
                                text-gray-700
                                leading-relaxed
                                max-w-md
                                text-center
                            ">

                        <strong class="text-gray-800">
                            "Menjadi Rumah Sakit yang Handal,
                            Unggul, dan Berkualitas"
                        </strong>

                    </p>

                </div>


            </div>

            <!-- Misi -->
            <div class="p-8">

                <div class="flex items-center justify-center gap-3 mb-5">

                    <div
                        class="
                            w-12 h-12
                            rounded-2xl
                            bg-indigo-100
                            flex items-center justify-center
                        ">

                        <i class="fa-solid fa-bullseye text-indigo-600 text-xl"></i>

                    </div>


                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">
                        Misi
                    </h3>

                </div>



                <ol class="space-y-4 md:space-y-5 text-gray-600 text-base md:text-lg leading-relaxed">

                    <li class="flex items-start gap-4">

                        <span
                            class="
                                    mt-2
                                    w-3 h-3
                                    rounded-full
                                    bg-indigo-600
                                    flex-shrink-0
                                    shadow-md
                                    shadow-indigo-300
                                ">
                        </span>

                        <p>
                            Mewujudkan tata kelola rumah sakit yang profesional,
                            akuntabel, transparan, dan inovatif.
                        </p>

                    </li>


                    <li class="flex items-start gap-4">

                        <span
                            class="
                                        mt-2
                                        w-3 h-3
                                        rounded-full
                                        bg-indigo-600
                                        flex-shrink-0
                                        shadow-md
                                        shadow-indigo-300
                                    ">
                        </span>

                        <p>
                            Memberikan pelayanan kesehatan paripurna yang bermutu
                            dan mengutamakan keselamatan pasien.
                        </p>

                    </li>


                    <li class="flex items-start gap-4">

                        <span
                            class="
                                mt-2
                                w-3 h-3
                                rounded-full
                                bg-indigo-600
                                flex-shrink-0
                                shadow-md
                                shadow-indigo-300
                            ">
                        </span>

                        <p>
                            Membangun kepuasan pelanggan dengan mewujudkan
                            pelayanan prima secara konsisten.
                        </p>

                    </li>

                </ol>


            </div>


        </div>
    </div>

</section>

<section id="igd" class="py-20 bg-gray-50">

    <div class="max-w-full mx-auto px-6">

        <!-- Judul Section -->
        <div class="text-center mb-10">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 tracking-tight">
                IGD & Rawat Inap
            </h2>
            <p class="mt-4 text-gray-500 text-lg">
                Pelayanan cepat, profesional, dan penuh kepedulian
            </p>
            <div class="mt-4 w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
        </div>

        <!-- Gambar -->
        <div class="flex flex-col md:flex-row items-center min-h-[420px] md:gap-x-[8px]">

            <div class="w-full md:w-1/2 relative overflow-hidden rounded-2xl group">

                <img src="/img/igd.jpg"
                    class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110"
                    style="clip-path: polygon(0 0, 100% 0, 88% 100%, 0% 100%);" alt="IGD">

                <div class="absolute bottom-32 left-8 text-white">
                    <h3 class="text-2xl md:text-3xl font-bold">Instalasi Gawat Darurat</h3>
                    <p class="text-sm mt-2 text-gray-200">Siaga 24 Jam dengan tim medis profesional</p>
                </div>

                <!-- KONTAK (WA + TELP SEJAJAR) -->
                <div
                    class="absolute bottom-8 left-8 z-20
                                bg-white/95 backdrop-blur-sm
                                rounded-xl px-5 py-4
                                shadow-xl
                                flex flex-col sm:flex-row gap-4 sm:items-center">

                    <!-- WhatsApp -->
                    <a href="https://wa.me/6281234567890" class="flex items-center gap-3 group/contact">

                        <div class="bg-green-100 p-2 rounded-full">
                            <svg class="w-5 h-10 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.52 3.48A11.86 11.86 0 0012.05 0C5.49 0 .14 5.36.14 11.96c0 2.11.55 4.17 1.6 5.98L0 24l6.26-1.64a11.9 11.9 0 005.79 1.48h.01c6.56 0 11.91-5.36 11.91-11.96 0-3.19-1.24-6.19-3.45-8.4z" />
                            </svg>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 leading-none">WhatsApp</p>
                            <p class="text-sm font-semibold text-green-600">
                                0812-3456-7890
                            </p>
                        </div>
                    </a>

                    <!-- Divider -->
                    <div class="hidden sm:block h-10 w-px bg-gray-300"></div>

                    <!-- Telepon -->
                    <a href="tel:112" class="flex items-center gap-3">

                        <div class="bg-red-100 p-2 rounded-full">
                            <svg class="w-5 h-10 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79a15.46 15.46 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V21a1 1 0 01-1 1C9.39 22 2 14.61 2 5a1 1 0 011-1h4.49a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.19 2.2z" />
                            </svg>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 leading-none">Hotline IGD</p>
                            <p class="text-sm font-semibold text-red-600">
                                112
                            </p>
                        </div>
                    </a>

                    <div class="hidden sm:block h-10 w-px bg-gray-300"></div>

                    <a href="tel:03354490000" class="flex items-center gap-3">

                        <div class="bg-red-100 p-2 rounded-full">
                            <svg class="w-5 h-10 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79a15.46 15.46 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V21a1 1 0 01-1 1C9.39 22 2 14.61 2 5a1 1 0 011-1h4.49a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.19 2.2z" />
                            </svg>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 leading-none">Hotline IGD</p>
                            <p class="text-sm font-semibold text-red-600">
                                0335-4490000
                            </p>
                        </div>
                    </a>

                </div>

            </div>

            <!-- ================= RAWAT INAP ================= -->
            <div class="w-full md:w-1/2 relative overflow-hidden rounded-2xl group">

                <!-- Shape sama seperti IGD -->
                <div class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110"
                    style="clip-path: polygon(12% 0, 100% 0, 100% 100%, 0% 100%);" alt="Rawat Inap">

                    <!-- Slider -->
                    <div id="slider" class="flex transition-transform duration-700 ease-in-out">

                        <!-- Slides -->
                        <div class="min-w-full">
                            <img src="/img/leaflet/1.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                        <div class="min-w-full">
                            <img src="/img/leaflet/2.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                        <div class="min-w-full">
                            <img src="/img/leaflet/3.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                        <div class="min-w-full">
                            <img src="/img/leaflet/4.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                        <div class="min-w-full">
                            <img src="/img/leaflet/5.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                        <div class="min-w-full">
                            <img src="/img/leaflet/6.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                        <div class="min-w-full">
                            <img src="/img/leaflet/7.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                        <div class="min-w-full">
                            <img src="/img/leaflet/8.png"
                                class="w-full h-[320px] md:h-[460px] object-cover transition duration-700 group-hover:scale-110">
                        </div>

                    </div>
                </div>
                <!-- Text -->
                <div class="absolute bottom-8 left-8 text-white z-10">
                    <h3 class="text-2xl md:text-3xl font-bold">Rawat Inap</h3>
                    <p class="text-sm mt-2 text-gray-200">Fasilitas modern dengan pelayanan optimal</p>
                    <!-- BUTTON -->
                    <a
                        href="#rawat-inap"
                        class="inline-flex
                   items-center
                   gap-2
                   mt-4
                   px-4 py-2.5
                   rounded-xl
                   bg-white/15
                   backdrop-blur-md
                   border border-white/30
                   text-white
                   text-xs md:text-sm
                   font-semibold
                   shadow-lg
                   transition-all duration-300
                   hover:bg-white
                   hover:text-[#0f766e]
                   hover:border-white
                   hover:-translate-y-0.5">

                        <span>
                            Lihat Rawat Inap
                        </span>

                        <i
                            class="fas fa-arrow-right text-xs
                       transition-transform duration-300
                       group-hover:translate-x-1">
                        </i>

                    </a>
                </div>

                <!-- Dots -->
                <div class="absolute bottom-4 right-6 flex space-x-2 z-10">
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer"></span>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section id="poliklinik" class="py-16 bg-white">

    <div class="max-w-6xl mx-auto px-4">

        <!-- Judul Section -->
        <div class="text-center mb-8">

            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 tracking-tight">
                Rawat Jalan 🩺
            </h2>

            <p class="mt-4 text-gray-500 text-lg">
                Langkah Kecil Hari Ini, Sehat Esok Hari.
            </p>

            <div class="mt-4 w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full">
            </div>

        </div>


        <!-- =====================================================
             FILTER
        ====================================================== -->

        <div class="mb-8">

            <div
                class="max-w-5xl mx-auto
                        rounded-3xl
                        border border-gray-100
                        bg-white
                        shadow-[0_10px_40px_rgba(0,0,0,0.06)]
                        p-5 md:p-7">

                <!-- Header Filter -->
                <div class="flex items-center gap-3 mb-6">

                    <div
                        class="flex items-center justify-center
                                w-11 h-11
                                rounded-2xl
                                bg-indigo-50
                                text-indigo-600">

                        <i class="fas fa-filter text-base"></i>

                    </div>

                    <div>

                        <h3 class="text-base md:text-lg font-bold text-gray-800">
                            Temukan Dokter
                        </h3>

                        <p class="text-xs md:text-sm text-gray-500 mt-0.5">
                            Pilih dokter atau poliklinik yang ingin Anda cari
                        </p>

                    </div>

                </div>


                <!-- Filter -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    <select
                        id="filterDokter"
                        class="appearance-none
                            [-webkit-appearance:none]
                            [-moz-appearance:none]
                            w-full
                            rounded-2xl
                            border border-gray-200
                            bg-gray-50
                            px-4 py-3.5 pr-11
                            text-sm text-gray-700
                            font-medium
                            outline-none
                            transition-all duration-200
                            hover:bg-white
                            hover:border-indigo-200
                            focus:bg-white
                            focus:border-indigo-500
                            focus:ring-4
                            focus:ring-indigo-100">

                        <option value="">
                            Semua Dokter
                        </option>

                        @foreach ($rawatJalan->sortBy('name')->unique('name') as $doctor)

                        <option value="{{ Str::lower($doctor->name) }}">
                            {{ $doctor->name }}
                        </option>

                        @endforeach

                    </select>



                    <select
                        id="filterPoli"
                        class="appearance-none
                                [-webkit-appearance:none]
                                [-moz-appearance:none]
                                w-full
                                rounded-2xl
                                border border-gray-200
                                bg-gray-50
                                px-4 py-3.5 pr-11
                                text-sm text-gray-700
                                font-medium
                                outline-none
                                transition-all duration-200
                                hover:bg-white
                                hover:border-indigo-200
                                focus:bg-white
                                focus:border-indigo-500
                                focus:ring-4
                                focus:ring-indigo-100">

                        <option value="">
                            Semua Poliklinik
                        </option>

                        @foreach ($rawatJalan->sortBy('clinic')->unique('clinic') as $doctor)

                        <option value="{{ Str::lower($doctor->clinic) }}">
                            {{ $doctor->clinic }}
                        </option>

                        @endforeach

                    </select>

                </div>


                <!-- =================================================
             HASIL FILTER
            ================================================== -->

                <div
                    class="mt-6
                            pt-5
                            border-t border-gray-100
                            flex flex-col sm:flex-row
                            items-center
                            justify-between
                            gap-3">

                    <div
                        id="filterResultInfo"
                        class="flex items-center gap-2
                                 text-sm text-gray-500">

                        <span
                            class="flex items-center justify-center
                                    w-8 h-8
                                    rounded-xl
                                    bg-green-50
                                    text-green-600">

                            <i class="fas fa-user-doctor text-xs"></i>

                        </span>

                        <span>

                            Menampilkan

                            <span
                                id="filterResultCount"
                                class="font-bold text-gray-800">

                                {{ $rawatJalan->count() }}

                            </span>

                            dokter

                        </span>

                    </div>


                    <!-- Reset -->
                    <button
                        type="button"
                        id="resetDoctorFilter"
                        class="inline-flex items-center gap-2
                                px-4 py-2
                                rounded-xl
                                text-xs font-semibold
                                text-gray-500
                                bg-gray-50
                                hover:bg-indigo-50
                                hover:text-indigo-600
                                transition-all duration-200">

                        <i class="fas fa-rotate-left"></i>

                        Reset Filter

                    </button>

                </div>

            </div>

        </div>


        <!-- =====================================================
             GRID DOKTER
        ====================================================== -->

        <div
            id="doctorGrid"
            class="grid grid-cols-1 md:grid-cols-3 gap-10">

            @foreach ($rawatJalan as $doctor)

            <div
                class="doctor-filter-item"
                data-doctor="{{ Str::lower($doctor->name) }}"
                data-clinic="{{ Str::lower($doctor->clinic) }}">

                @include(
                'frontend.partials.doctor-card',
                ['doctor' => $doctor]
                )

            </div>

            @endforeach

        </div>


        <!-- =====================================================
             EMPTY RESULT
        ====================================================== -->

        <div
            id="doctorEmptyState"
            class="hidden text-center py-20">

            <div class="text-5xl mb-5">
                🩺
            </div>

            <h3 class="text-xl font-bold text-gray-700">
                Dokter tidak ditemukan
            </h3>

            <p class="mt-2 text-gray-500">
                Tidak ada dokter yang sesuai dengan filter yang dipilih.
            </p>

            <button
                type="button"
                id="resetDoctorFilter"
                class="mt-6 inline-flex items-center
                px-5 py-2.5 rounded-xl
                bg-indigo-600 text-white text-sm font-semibold
                hover:bg-indigo-700 transition">

                Reset Filter

            </button>

        </div>

    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const filterDokter = document.getElementById('filterDokter');
        const filterPoli = document.getElementById('filterPoli');

        const doctorItems = document.querySelectorAll('.doctor-filter-item');

        const resultCount = document.getElementById('filterResultCount');
        const emptyState = document.getElementById('doctorEmptyState');
        const resetButton = document.getElementById('resetDoctorFilter');


        function filterDoctors() {

            const selectedDoctor = filterDokter.value.toLowerCase();
            const selectedPoli = filterPoli.value.toLowerCase();

            let visibleCount = 0;


            doctorItems.forEach(function(item) {

                const doctorName = item.dataset.doctor || '';
                const clinicName = item.dataset.clinic || '';

                const doctorMatch =
                    selectedDoctor === '' ||
                    doctorName === selectedDoctor;

                const clinicMatch =
                    selectedPoli === '' ||
                    clinicName === selectedPoli;


                if (doctorMatch && clinicMatch) {

                    item.classList.remove('hidden');

                    visibleCount++;

                } else {

                    item.classList.add('hidden');

                }

            });


            // Update jumlah
            resultCount.textContent = visibleCount;


            // Empty state
            if (visibleCount === 0) {

                emptyState.classList.remove('hidden');

            } else {

                emptyState.classList.add('hidden');

            }

        }


        // Filter dokter
        filterDokter.addEventListener(
            'change',
            filterDoctors
        );


        // Filter poli
        filterPoli.addEventListener(
            'change',
            filterDoctors
        );


        // Reset
        resetButton.addEventListener(
            'click',
            function() {

                filterDokter.value = '';
                filterPoli.value = '';

                filterDoctors();

            }
        );

    });
</script>

<section id="penunjang" class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Judul Section -->
        <div class="text-center mb-24 mt-20">
            <h2 class="text-4xl md:text-3xl font-bold text-gray-800 tracking-tight">
                Pelayanan Penunjang 🩺❤
            </h2>

            <p class="mt-4 text-gray-500 text-lg">
                Setiap Detail untuk Kesembuhan Anda.
            </p>

            <div class="mt-4 w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
        </div>

        <!-- Grid Pelayanan Penunjang -->
        @foreach ($penunjang->chunk(3) as $row)

        @php
        $count = $row->count();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-10">

            {{-- 1 ITEM → TENGAH --}}
            @if ($count === 1)

            <div class="hidden md:block"></div>

            <div class="w-full">
                @include('frontend.partials.doctor-card', [
                'doctor' => $row->first()
                ])
            </div>

            <div class="hidden md:block"></div>


            {{-- 2 ITEM → KIRI + TENGAH --}}
            @elseif ($count === 2)

            @foreach ($row as $doctor)
            <div class="w-full">
                @include('frontend.partials.doctor-card', [
                'doctor' => $doctor
                ])
            </div>
            @endforeach

            <div class="hidden md:block"></div>


            {{-- 3 ITEM → KIRI + TENGAH + KANAN --}}
            @else

            @foreach ($row as $doctor)
            <div class="w-full">
                @include('frontend.partials.doctor-card', [
                'doctor' => $doctor
                ])
            </div>
            @endforeach

            @endif

        </div>

        @endforeach

    </div>
</section>

<section id="rawat-inap" class="relative py-16 md:py-24 bg-white overflow-hidden">

    <div class="max-w-6xl mx-auto px-4">


        <!-- =================================================
             BANNER FASILITAS
        ================================================== -->

        <div
            class="relative
            w-full
            h-[300px] sm:h-[360px] md:h-[440px] lg:h-[500px]
            rounded-[2rem]
            overflow-hidden
            shadow-2xl">

            <!-- FOTO BANNER -->

            <img
                alt="Fasilitas Rawat Inap RSUD Ar Rozy"
                class="absolute inset-0
                w-full h-full
                object-cover">


            <!-- OVERLAY -->

            <div
                class="absolute inset-0
                bg-gradient-to-t
                from-black/80
                via-black/35
                to-black/5">
            </div>


            <!-- CONTENT -->

            <div
                class="absolute inset-x-0 bottom-0
                p-6 md:p-10 lg:p-12">

                <div class="max-w-3xl">

                    <span
                        class="inline-flex items-center gap-2
                        px-4 py-2
                        rounded-full
                        bg-white/15
                        backdrop-blur-md
                        border border-white/20
                        text-white
                        text-xs md:text-sm
                        font-semibold">

                        <i class="fas fa-bed"></i>

                        Layanan Rawat Inap

                    </span>


                    <h2
                        class="mt-4
                        text-3xl sm:text-4xl md:text-5xl
                        font-extrabold
                        text-white
                        tracking-tight">

                        Kenyamanan untuk
                        <span class="text-indigo-300">
                            Pemulihan Anda
                        </span>

                    </h2>


                    <p
                        class="mt-3
                        max-w-2xl
                        text-sm md:text-base
                        text-white/85
                        leading-relaxed">

                        Fasilitas rawat inap yang nyaman dan
                        mendukung proses pemulihan pasien dengan
                        pelayanan tenaga kesehatan profesional.

                    </p>

                </div>

            </div>

        </div>



        <!-- =================================================
             JUDUL DAFTAR KAMAR
        ================================================== -->

        <div
            class="text-center
            mt-16 md:mt-20
            mb-10">

            <span
                class="text-xs md:text-sm
                font-bold
                tracking-widest
                uppercase
                text-indigo-600">

                Pilihan Kamar

            </span>


            <h3
                class="mt-2
                text-3xl md:text-4xl
                font-extrabold
                text-gray-800">

                Kelas Rawat Inap

            </h3>


            <p
                class="mt-3
                max-w-2xl
                mx-auto
                text-gray-500
                text-sm md:text-base">

                Pilih kelas kamar sesuai dengan kebutuhan
                dan kenyamanan Anda.

            </p>

        </div>

    </div>

    <div class="max-w-6xl mx-auto px-4">
        <!-- =================================================
        CARD KAMAR 
        ================================================== -->

        <div
            class="grid
            grid-cols-1
            md:grid-cols-2
            lg:grid-cols-3
            gap-6 md:gap-7">


            <!-- =================================================
            VVIP CARD
            ================================================== -->
            <div style="position: relative; background: #fff; border-radius: 24px; border: 1px solid #f3f4f6; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; transition: all .3s ease;"
                class="group hover:-translate-y-2 hover:shadow-2xl">

                <!-- FOTO CARD -->
                <div style="position: relative; height: 224px; overflow: hidden;">

                    <img
                        src="{{ asset('img/leaflet/2.png') }}"
                        alt="Kamar VVIP"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform .7s ease;"
                        class="group-hover:scale-105">

                    <!-- GRADIENT -->
                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2) 50%, transparent);"></div>

                    <!-- BADGE PREMIUM -->
                    <div style="position: absolute; left: 16px; top: 16px; z-index: 10;">
                        <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 14px rgba(0,0,0,0.4); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase;">
                            <span style="width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9); display: inline-block;"></span>
                            <span style="background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                                VVIP
                            </span>
                        </span>
                    </div>

                    <!-- STATUS -->
                    <div style="position: absolute; right: 16px; top: 16px; z-index: 10;">
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 999px; background: rgba(255,255,255,0.92); color: #059669; font-size: 11px; font-weight: 700; white-space: nowrap; box-shadow: 0 2px 8px rgba(0,0,0,0.12);">
                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; display: inline-block;"></span>
                            Tersedia
                        </span>
                    </div>

                    <!-- TITLE -->
                    <div style="position: absolute; left: 20px; right: 20px; bottom: 20px; z-index: 10;">
                        <span style="display: block; font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(255,255,255,0.75); font-weight: 500;">
                            Kamar Rawat Inap
                        </span>
                        <h4 style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-style: italic; font-weight: 600; color: #fff; line-height: 1.2; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin: 0;">
                            VVIP RAUDLOH
                        </h4>
                    </div>

                </div>


                <!-- CONTENT -->
                <div style="padding: 24px;">

                    <!-- FASILITAS SINGKAT -->
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px; color: #9ca3af;">
                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-couch" style="font-size: 11px;"></i> Ruang tunggu
                        </span>
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;"></span>
                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-tv" style="font-size: 11px;"></i> Smart TV
                        </span>
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;"></span>
                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-snowflake" style="font-size: 11px;"></i> AC
                        </span>
                    </div>

                    <!-- TARIF -->
                    <div>
                        <p style="font-size: 10px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 600; color: #B08D4F; margin: 0;">
                            Tarif per malam
                        </p>
                        <p style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-weight: 600; line-height: 1; color: #B9862F; margin: 6px 0 0;">
                            Rp 450.000
                        </p>
                    </div>

                    <!-- DIVIDER -->
                    <div style="margin: 20px 0; border-top: 1px solid #f3f4f6;"></div>

                    <!-- TOMBOL DETAIL -->
                    <button
                        type="button"
                        data-open-room="vvip"
                        onclick="window.openRoomModal('vvip', event)"
                        style="width: 100%; display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 20px; border-radius: 16px; font-size: 14px; font-weight: 700; transition: all .3s ease; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.4); cursor: pointer;"
                        class="hover:shadow-lg hover:-translate-y-0.5">

                        <span style="background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 60%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                            Lihat Selengkapnya
                        </span>

                        <i class="fas fa-arrow-right" style="font-size: 11px; color: #D8B86A;"></i>

                    </button>

                </div>

            </div>

            <!-- =================================================
                VIP
            ================================================== -->
            <div style="position: relative; background: #fff; border-radius: 24px; border: 1px solid #f3f4f6; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; transition: all .3s ease;"
                class="group hover:-translate-y-2 hover:shadow-2xl">


                <!-- =================================================
                    FOTO CARD VIP
                ================================================== -->

                <div style="position: relative; height: 224px; overflow: hidden;">

                    <img
                        src="{{ asset('img/leaflet/4.png') }}"
                        alt="Kamar VIP"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform .7s ease;"
                        class="group-hover:scale-105">


                    <!-- =================================================
                        GRADIENT
                    ================================================== -->

                    <div
                        style="position: absolute; inset: 0; background: linear-gradient( to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2) 50%, transparent );">
                    </div>


                    <!-- =================================================
                    BADGE VIP
                    ================================================== -->

                    <div
                        style="position: absolute; left: 16px; top: 16px; z-index: 10;">

                        <span
                            style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 14px rgba(0,0,0,0.4); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase;">

                            <!-- GOLD DOT -->

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: radial-gradient( circle at 30% 30%, #F6E4B0, #B98F45 ); box-shadow: 0 0 8px rgba(216,184,106,0.9); display: inline-block;">
                            </span>


                            <!-- VIP TEXT -->

                            <span
                                style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                                VIP
                            </span>

                        </span>

                    </div>


                    <!-- =================================================
                    STATUS
                    ================================================== -->

                    <div
                        style="position: absolute; right: 16px; top: 16px; z-index: 10;">

                        <span
                            style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 999px; background: rgba(255,255,255,0.92); color: #059669; font-size: 11px; font-weight: 700; white-space: nowrap; box-shadow: 0 2px 8px rgba(0,0,0,0.12);">

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; display: inline-block;">
                            </span>

                            Tersedia

                        </span>

                    </div>


                    <!-- =================================================
                    TITLE
                  ================================================== -->

                    <div
                        style="position: absolute; left: 20px; right: 20px; bottom: 20px; z-index: 10;">


                        <span
                            style="display: block; font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(255,255,255,0.75); font-weight: 500;">
                            Kamar Rawat Inap
                        </span>


                        <h4
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-style: italic; font-weight: 600; color: #fff; line-height: 1.2; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin: 0;">
                            VIP ZAM ZAM
                        </h4>

                    </div>

                </div>


                <!-- =================================================
                    CONTENT VIP
                ================================================== -->

                <div
                    style="padding: 24px;">


                    <!-- =================================================
                        FASILITAS SINGKAT
                    ================================================== -->

                    <div
                        style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px; color: #9ca3af; flex-wrap: wrap; row-gap: 8px;">


                        <!-- AC -->

                        <span
                            style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">

                            <i
                                class="fas fa-snowflake"
                                style="font-size: 11px;">
                            </i>

                            AC

                        </span>


                        <!-- DIVIDER -->

                        <span
                            style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;">

                        </span>


                        <!-- TV -->

                        <span
                            style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">


                            <i
                                class="fas fa-tv"
                                style="font-size: 11px;">
                            </i>

                            TV

                        </span>


                        <!-- DIVIDER -->

                        <span
                            style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;">

                        </span>


                        <!-- KAMAR MANDI -->

                        <span
                            style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">


                            <i
                                class="fas fa-shower"
                                style="font-size: 11px;">
                            </i>

                            Kamar mandi

                        </span>


                        <!-- DIVIDER -->

                        <span
                            style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;">

                        </span>


                        <!-- LEMARI -->

                        <span
                            style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">


                            <i
                                class=" fas fa-box"
                                style="font-size: 11px;">
                            </i>

                            Lemari

                        </span>

                    </div>


                    <!-- =================================================
                    TARIF VIP
                    ================================================== -->

                    <div>

                        <p
                            style="font-size: 10px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 600; color: #B08D4F; margin: 0;">
                            Tarif per malam
                        </p>


                        <p
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-weight: 600; line-height: 1; color: #B9862F; margin: 6px 0 0;">
                            Rp 350.000
                        </p>

                    </div>


                    <!-- =================================================
                        DIVIDER
                    ================================================== -->

                    <div
                        style="margin: 20px 0; border-top: 1px solid #f3f4f6;">
                    </div>


                    <!-- =================================================
                    TOMBOL DETAIL VIP
                 ================================================== -->

                    <button
                        type="button"
                        data-open-room="vip"
                        onclick="window.openRoomModal('vip', event)"
                        style="width: 100%; display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 20px; border-radius: 16px; font-size: 14px; font-weight: 700; transition: all .3s ease; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.4); cursor: pointer;"
                        class="hover:shadow-lg hover:-translate-y-0.5">


                        <!-- TEXT -->

                        <span
                            style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 60%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                            Lihat Selengkapnya
                        </span>


                        <!-- ICON -->

                        <i
                            class="fas fa-arrow-right"
                            style="font-size: 11px; color: #D8B86A;">
                        </i>

                    </button>

                </div>

            </div>

            <!-- =================================================
            KAMAR KELAS I, II, III
            ================================================== -->
            <div
                style="position: relative; background: #fff; border-radius: 24px; border: 1px solid #f3f4f6; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; transition: all .3s ease;"
                class="group hover:-translate-y-2 hover:shadow-2xl">


                <!-- =================================================
                FOTO CARD KELAS 1,2,3
                ================================================== -->

                <div
                    style="position: relative; height: 224px; overflow: hidden;">

                    <img
                        src="{{ asset('img/leaflet/6.png') }}"
                        alt="Kamar Kelas 1,2,3"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform .7s ease;"
                        class="group-hover:scale-105">


                    <!-- GRADIENT -->

                    <div
                        style="position: absolute; inset: 0; background: linear-gradient( to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2) 50%, transparent );">
                    </div>


                    <!-- BADGE KELAS 1,2,3 -->

                    <div
                        style="position: absolute; left: 16px; top: 16px; z-index: 10;">

                        <span
                            style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 14px rgba(0,0,0,0.4); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase;">

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: radial-gradient( circle at 30% 30%, #F6E4B0, #B98F45 ); box-shadow: 0 0 8px rgba(216,184,106,0.9); display: inline-block;">
                            </span>

                            <span
                                style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                                KELAS 1,2,3
                            </span>

                        </span>

                    </div>


                    <!-- STATUS -->

                    <div
                        style="position: absolute; right: 16px; top: 16px; z-index: 10;">

                        <span
                            style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 999px; background: rgba(255,255,255,0.92); color: #059669; font-size: 11px; font-weight: 700; white-space: nowrap; box-shadow: 0 2px 8px rgba(0,0,0,0.12);">

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; display: inline-block;">
                            </span>

                            Tersedia

                        </span>

                    </div>


                    <!-- TITLE -->

                    <div
                        style="position: absolute; left: 20px; right: 20px; bottom: 20px; z-index: 10;">

                        <span
                            style="display: block; font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(255,255,255,0.75); font-weight: 500;">
                            Kamar Rawat Inap
                        </span>

                        <h4
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-style: italic; font-weight: 600; color: #fff; line-height: 1.2; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin: 0;">
                            KELAS 1,2,3
                        </h4>

                    </div>

                </div>


                <!-- =================================================
                CONTENT KELAS 1,2,3
                ================================================== -->

                <div
                    style="padding: 24px;">


                    <!-- FASILITAS SINGKAT -->

                    <div
                        style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px; color: #9ca3af; flex-wrap: wrap; row-gap: 8px;">

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-snowflake" style="font-size: 11px;"></i>
                            AC
                        </span>

                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;"></span>

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-tv" style="font-size: 11px;"></i>
                            TV
                        </span>

                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;"></span>

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-bed" style="font-size: 11px;"></i>
                            Tempat Tidur
                        </span>

                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;"></span>

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-box" style="font-size: 11px;"></i>
                            Lemari
                        </span>

                    </div>


                    <!-- TARIF KELAS 1,2,3 -->

                    <div>

                        <p
                            style="font-size: 10px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 600; color: #B08D4F; margin: 0;">
                            Tarif per malam
                        </p>

                        <p
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 28px; font-weight: 600; line-height: 1; color: #B9862F; margin: 6px 0 0;">
                            Rp 150.000 – 250.000
                        </p>

                    </div>


                    <!-- DIVIDER -->

                    <div
                        style="margin: 20px 0; border-top: 1px solid #f3f4f6;">
                    </div>


                    <!-- TOMBOL DETAIL KELAS 1,2,3 -->

                    <button
                        type="button"
                        data-open-room="k123"
                        onclick="window.openRoomModal('k123', event)"
                        style="width: 100%; display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 20px; border-radius: 16px; font-size: 14px; font-weight: 700; transition: all .3s ease; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.4); cursor: pointer;"
                        class="hover:shadow-lg hover:-translate-y-0.5">

                        <span
                            style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 60%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                            Lihat Selengkapnya
                        </span>

                        <i
                            class="fas fa-arrow-right"
                            style="font-size: 11px; color: #D8B86A;">
                        </i>

                    </button>

                </div>

            </div>

            <!-- =================================================
            KAMAR ISOLASI MINA
            ================================================== -->
            <div
                style="position: relative; background: #fff; border-radius: 24px; border: 1px solid #f3f4f6; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; transition: all .3s ease;"
                class="group hover:-translate-y-2 hover:shadow-2xl">


                <!-- =================================================
                FOTO CARD ISOLASI MINA
                ================================================== -->

                <div
                    style="position: relative; height: 224px; overflow: hidden;">

                    <img
                        src="{{ asset('img/leaflet/kamar-mina/MINA.jpeg') }}"
                        alt="Kamar Kelas 1,2,3"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform .7s ease;"
                        class="group-hover:scale-105">


                    <!-- GRADIENT -->

                    <div
                        style="position: absolute; inset: 0; background: linear-gradient( to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2) 50%, transparent );">
                    </div>


                    <!-- BADGE ISOLASI MINA-->

                    <div
                        style="position: absolute; left: 16px; top: 16px; z-index: 10;">

                        <span
                            style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 14px rgba(0,0,0,0.4); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase;">

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: radial-gradient( circle at 30% 30%, #F6E4B0, #B98F45 ); box-shadow: 0 0 8px rgba(216,184,106,0.9); display: inline-block;">
                            </span>

                            <span
                                style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                                ISOLASI MINA
                            </span>

                        </span>

                    </div>


                    <!-- STATUS -->

                    <div
                        style="position: absolute; right: 16px; top: 16px; z-index: 10;">

                        <span
                            style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 999px; background: rgba(255,255,255,0.92); color: #059669; font-size: 11px; font-weight: 700; white-space: nowrap; box-shadow: 0 2px 8px rgba(0,0,0,0.12);">

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; display: inline-block;">
                            </span>

                            Tersedia

                        </span>

                    </div>


                    <!-- TITLE -->

                    <div
                        style="position: absolute; left: 20px; right: 20px; bottom: 20px; z-index: 10;">

                        <span
                            style="display: block; font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(255,255,255,0.75); font-weight: 500;">
                            Kamar Rawat Inap
                        </span>

                        <h4
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-style: italic; font-weight: 600; color: #fff; line-height: 1.2; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin: 0;">
                            ISOLASI MINA
                        </h4>

                    </div>

                </div>


                <!-- =================================================
                CONTENT KELAS 1,2,3
                ================================================== -->

                <div
                    style="padding: 24px;">


                    <!-- FASILITAS SINGKAT -->

                    <div
                        style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px; color: #9ca3af; flex-wrap: wrap; row-gap: 8px;">

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-snowflake" style="font-size: 11px;"></i>
                            AC
                        </span>

                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;"></span>

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">
                            <i class="fas fa-bed" style="font-size: 11px;"></i>
                            Tempat Tidur
                        </span>
                    </div>


                    <!-- TARIF ISOLASI MINA -->

                    <div>

                        <p
                            style="font-size: 10px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 600; color: #B08D4F; margin: 0;">
                            Tarif per malam
                        </p>

                        <p
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-weight: 600; line-height: 1; color: #B9862F; margin: 6px 0 0;">
                            Rp 150.000
                        </p>

                    </div>


                    <!-- DIVIDER -->

                    <div
                        style="margin: 20px 0; border-top: 1px solid #f3f4f6;">
                    </div>


                    <!-- TOMBOL DETAIL ISOLASI MINA-->

                    <button
                        type="button"
                        data-open-room="k3m"
                        onclick="window.openRoomModal('k3m', event)"
                        style="width: 100%; display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 20px; border-radius: 16px; font-size: 14px; font-weight: 700; transition: all .3s ease; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.4); cursor: pointer;"
                        class="hover:shadow-lg hover:-translate-y-0.5">

                        <span
                            style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 60%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                            Lihat Selengkapnya
                        </span>

                        <i
                            class="fas fa-arrow-right"
                            style="font-size: 11px; color: #D8B86A;">
                        </i>

                    </button>

                </div>

            </div>

            <!-- =================================================
            KAMAR INTENSIF
            ================================================== -->
            <div
                style="position: relative; background: #fff; border-radius: 24px; border: 1px solid #f3f4f6; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; transition: all .3s ease;"
                class="group hover:-translate-y-2 hover:shadow-2xl">


                <!-- =================================================
                FOTO CARD INTENSIF
                ================================================== -->

                <div
                    style="position: relative; height: 224px; overflow: hidden;">

                    <img
                        src="{{ asset('img/leaflet/kamar-intensif/1.jpeg') }}"
                        alt="Kamar Kelas 1,2,3"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform .7s ease;"
                        class="group-hover:scale-105">


                    <!-- GRADIENT -->

                    <div
                        style="position: absolute; inset: 0; background: linear-gradient( to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2) 50%, transparent );">
                    </div>


                    <!-- BADGE INTENSIF-->

                    <div
                        style="position: absolute; left: 16px; top: 16px; z-index: 10;">

                        <span
                            style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 14px rgba(0,0,0,0.4); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase;">

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: radial-gradient( circle at 30% 30%, #F6E4B0, #B98F45 ); box-shadow: 0 0 8px rgba(216,184,106,0.9); display: inline-block;">
                            </span>

                            <span
                                style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                                INTENSIF
                            </span>

                        </span>

                    </div>


                    <!-- STATUS -->

                    <div
                        style="position: absolute; right: 16px; top: 16px; z-index: 10;">

                        <span
                            style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 999px; background: rgba(255,255,255,0.92); color: #059669; font-size: 11px; font-weight: 700; white-space: nowrap; box-shadow: 0 2px 8px rgba(0,0,0,0.12);">

                            <span
                                style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; display: inline-block;">
                            </span>

                            Tersedia

                        </span>

                    </div>


                    <!-- TITLE -->

                    <div
                        style="position: absolute; left: 20px; right: 20px; bottom: 20px; z-index: 10;">

                        <span
                            style="display: block; font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(255,255,255,0.75); font-weight: 500;">
                            Kamar Rawat Inap
                        </span>

                        <h4
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-style: italic; font-weight: 600; color: #fff; line-height: 1.2; text-shadow: 0 2px 8px rgba(0,0,0,0.6); margin: 0;">
                            INTENSIF
                        </h4>

                    </div>

                </div>


                <!-- =================================================
                CONTENT INTENSIF
                ================================================== -->

                <div
                    style="padding: 24px;">


                    <!-- FASILITAS SINGKAT -->

                    <div
                        style="display: flex; align-items: center; gap: 12px; margin-bottom: 40px; color: #9ca3af; flex-wrap: wrap; row-gap: 8px;">

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">

                        </span>

                        <!-- <span style="width: 4px; height: 4px; border-radius: 50%; background: #e5e7eb;"></span> -->

                        <span style="display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 500;">

                        </span>
                    </div>


                    <!-- TARIF INTENSIF -->

                    <div>

                        <p
                            style="font-size: 10px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 600; color: #B08D4F; margin: 0;">
                            Tarif per malam
                        </p>

                        <p
                            style="font-family:'Fraunces', ui-serif, Georgia, serif; font-size: 30px; font-weight: 600; line-height: 1; color: #B9862F; margin: 6px 0 0;">
                            Rp 150.000
                        </p>

                    </div>


                    <!-- DIVIDER -->

                    <div
                        style="margin: 20px 0; border-top: 1px solid #f3f4f6;">
                    </div>


                    <!-- TOMBOL DETAIL INTENSIF-->

                    <button
                        type="button"
                        data-open-room="intensif"
                        onclick="window.openRoomModal('intensif', event)"
                        style="width: 100%; display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 20px; border-radius: 16px; font-size: 14px; font-weight: 700; transition: all .3s ease; background: linear-gradient( 180deg, #24333B 0%, #0E1619 100% ); border: 1px solid rgba(216,184,106,0.4); cursor: pointer;"
                        class="hover:shadow-lg hover:-translate-y-0.5">

                        <span
                            style="background: linear-gradient( 180deg, #F6E4B0 0%, #D8B86A 60%, #A97C3C 100% ); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                            Lihat Selengkapnya
                        </span>

                        <i
                            class="fas fa-arrow-right"
                            style="font-size: 11px; color: #D8B86A;">
                        </i>

                    </button>

                </div>

            </div>
        </div>
    </div>

    <!-- =====================================================
            POPUP DETAIL KAMAR VVIP
    ====================================================== -->

    <div id="roomDetailModal" class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-5">


        <!-- =================================================
                    BACKDROP
                    ================================================== -->

        <div
            class="absolute
                   inset-0
                   bg-black/60
                   backdrop-blur-sm"
            data-close-room="vvip">
        </div>



        <!-- =================================================
           MODAL
        ================================================== -->

        <div
            class="relative
                            w-full
                            max-w-4xl
                            max-h-[90vh]
                            overflow-y-auto
                            bg-white
                            rounded-2xl
                            shadow-2xl
                            z-10">


            <!-- =================================================
                        CLOSE BUTTON
                    ================================================== -->

            <div style="position: sticky; top: 0; left: 0; width: 100%; height: 0; overflow: visible; z-index: 40;">
                <button
                    type="button"
                    data-close-room="vvip"
                    style="position: absolute; top: 12px; right: 12px; left: auto;"
                    class="w-9
                                        h-9
                                        rounded-full
                                        bg-black/40
                                        backdrop-blur
                                        text-white
                                        flex
                                        items-center
                                        justify-center
                                        hover:bg-black/60
                                        transition">

                    <i class="fas fa-xmark text-sm"></i>

                </button>
            </div>


            <div
                id="roomSlider"
                class="relative
                                h-52
                                sm:h-64
                                md:h-80
                                overflow-hidden
                                bg-gray-900">

                <!-- =====================================================
                            SLIDES
                            ====================================================== -->

                <div
                    id="roomSlides"
                    class="flex
                                    h-full
                                    transition-transform
                                    duration-500
                                    ease-in-out">

                    @for ($i = 1; $i <= 5; $i++)

                        <div
                        class="min-w-full
                                        h-full
                                        relative">

                        <!-- IMAGE -->

                        <img
                            src="{{ asset('img/leaflet/kamar-vvip/' . $i . '.jpg') }}"
                            alt="Kamar VVIP {{ $i }}"
                            class="w-full
                           h-full
                           object-cover"
                            draggable="false">

                        <!-- DARK GRADIENT -->

                        <div
                            class="absolute
                           inset-0
                           bg-gradient-to-t
                           from-black/85
                           via-black/25
                           to-transparent
                           pointer-events-none">
                        </div>

                </div>

                @endfor

            </div>

            <!-- =====================================================
                        MOBILE INFO CARD — tampil hanya di mobile, sebagai
                        layout terpisah di bawah foto (bukan overlay)
                    ====================================================== -->
            <style>
                @media (max-width: 639px) {
                    #roomInformation {
                        display: none !important;
                    }

                    #roomInfoMobile {
                        display: block !important;
                    }
                }

                @media (min-width: 640px) {
                    #roomInfoMobile {
                        display: none !important;
                    }
                }
            </style>
            <div id="roomInfoMobile" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

                <!-- BADGE + TARIF -->
                <div class="flex items-center justify-between gap-3 mb-3">

                    <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 12px rgba(0,0,0,0.35); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">
                        <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);"></span>
                        <span style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                            Kamar VVIP RAUDLOH
                        </span>
                    </span>

                </div>

                <!-- SUBTITLE -->
                <p class="text-[12px] font-medium leading-snug" style="color:#5B6169;">
                    Kenyamanan dan privasi untuk pengalaman perawatan terbaik
                </p>

                <!-- DIVIDER -->
                <div class="flex items-center gap-3 my-3">
                    <span class="h-px flex-1" style="background:#EDE7D8;"></span>
                    <span class="w-1 h-1 rotate-45" style="background:#E9C77B;"></span>
                    <span class="h-px flex-1" style="background:#EDE7D8;"></span>
                </div>

                <!-- TARIF -->
                <div class="mb-3.5">
                    <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#8A7A55;">
                        <i class="fas fa-tag text-[9px]" style="color:#C9A24B;"></i>
                        Tarif per malam
                    </div>
                    <div class="flex items-baseline gap-1.5 mt-1">
                        <strong class="rd-display text-2xl font-semibold leading-none" style="color:#B9862F;">
                            Rp 450.000
                        </strong>
                        <span class="text-xs font-medium" style="color:#6B7280;">
                            / malam
                        </span>
                    </div>
                </div>

                <!-- FASILITAS -->
                <div class="grid grid-cols-2 gap-2 mt-2">

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                            <i class="fas fa-user text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">1 Kamar / 1 Pasien</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F3;color:#527487;">
                            <i class="fas fa-expand text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Kamar Lebih Luas</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EDF1EA;color:#61705D;">
                            <i class="fas fa-couch text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Ruang Penunggu</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F2ECE5;color:#826A53;">
                            <i class="fas fa-wine-bottle text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Minibar</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                            <i class="fas fa-bed text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Sofa Bed</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F1ECE3;color:#76684F;">
                            <i class="fas fa-utensils text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Meja Makan</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                            <i class="fas fa-shower text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Shower Air Hangat</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8EEF1;color:#557080;">
                            <i class="fas fa-wheelchair text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Toilet Disabilitas</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                            <i class="fas fa-snowflake text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Air Conditioner</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#ECE9F1;color:#685E78;">
                            <i class="fas fa-tv text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Smart TV</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EEF0ED;color:#657064;">
                            <i class="fas fa-box text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Es</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F0ECE7;color:#756655;">
                            <i class="fas fa-shirt text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Baju</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F1ECE4;color:#77654D;">
                            <i class="fas fa-mug-hot text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Teko Listrik</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F5EC;color:#3A9B5D;">
                            <i class="fas fa-wifi text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Free WiFi</span>
                    </div>
                </div>
            </div>


            <!-- =====================================================
                        ROOM INFORMATION — PREMIUM OVERLAY
                    ====================================================== -->

            <style>
                /* Signature display face for the VVIP mark — if this is already imported elsewhere in your layout (e.g. in the room detail modal), remove this duplicate <style> block. */
                @import url('https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;1,9..144,500&display=swap');

                .rd-display {
                    font-family: 'Fraunces', ui-serif, Georgia, serif;
                }

                .scrollbar-hide::-webkit-scrollbar {
                    display: none;
                }

                .scrollbar-hide {
                    -ms-overflow-style: none;
                    scrollbar-width: none;
                }
            </style>


            <div
                id="roomInformation"
                class="absolute
                                left-4
                                right-4
                                bottom-4
                                sm:left-6
                                sm:right-6
                                sm:bottom-6
                                text-white
                                z-20
                                pointer-events-none">

                <!-- =================================================
                            CONTRAST SCRIM — guarantees legibility on any photo
                        ================================================== -->

                <div
                    class="absolute
                                    -inset-x-4
                                    sm:-inset-x-6
                                    -top-48
                                    -bottom-4
                                    sm:-bottom-6
                                    bg-gradient-to-t
                                    from-black/85
                                    via-black/45
                                    to-transparent
                                    -z-10
                                    pointer-events-none">
                </div>


                <!-- =================================================
                            TOP INFO
                        ================================================== -->

                <div class="flex items-center justify-between gap-3 mb-3">

                    <!-- BADGE VVIP -->
                    <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 6px 18px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                        <!-- shine sweep -->
                        <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: vvipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                        <!-- gold dot -->
                        <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);"></span>

                        <!-- gold gradient text -->
                        <span style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">
                            Kamar VVIP RAUDLOH
                        </span>

                    </span>

                </div>

                <style>
                    @keyframes vvipShine {
                        0% {
                            transform: translateX(-150%);
                        }

                        50% {
                            transform: translateX(150%);
                        }

                        100% {
                            transform: translateX(150%);
                        }
                    }
                </style>



                <!-- =================================================
                            TITLE
                        ================================================== -->

                <!-- <h3 id="roomInformationTitle" class="rd-display text-2xl sm:text-3xl md:text-4xl font-semibold italic leading-tight tracking-tight text-white text-left w-full self-start" style="text-shadow:0 2px 4px rgba(0,0,0,0.95),0 4px 10px rgba(0,0,0,0.85),0 8px 18px rgba(0,0,0,0.65);">
                            Kamar VVIP
                        </h3> -->


                <!-- =================================================
                            SUBTITLE
                        ================================================== -->

                <p class="mt-1.5 text-[11px] sm:text-xs md:text-sm text-white font-medium tracking-wide text-left" style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 7px rgba(0,0,0,0.9),0 5px 12px rgba(0,0,0,0.7);">
                    Kenyamanan dan privasi untuk pengalaman perawatan terbaik
                </p>

                <!-- =================================================
                            DIVIDER
                        ================================================== -->

                <div
                    class="flex items-center gap-3 my-3.5 sm:my-4">
                    <span class="h-px flex-1 bg-white/15"></span>
                    <span class="w-1 h-1 rotate-45 bg-[#E9C77B]"></span>
                    <span class="h-px flex-1 bg-white/15"></span>
                </div>

                <!-- =================================================
                            TARIF + FASILITAS
                        ================================================== -->

                <div class="flex flex-col items-start gap-2.5 w-full">

                    <!-- =================================================
                                TARIF — ATAS
                            ================================================== -->

                    <div class="shrink-0">

                        <div class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">
                            <i class="fas fa-tag text-[#E9C77B] text-[9px] drop-shadow-[0_1px_4px_rgba(0,0,0,0.8)]"></i>
                            Tarif per malam
                        </div>

                        <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                            <strong class="rd-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#F3D58A] tracking-tight" style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">
                                Rp 450.000
                            </strong>

                            <span class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">
                                / malam
                            </span>

                        </div>

                    </div>


                    <!-- =================================================
                                FASILITAS — BAWAH
                            ================================================== -->

                    <style>
                        .vvip-facility-grid {
                            grid-template-columns: repeat(5, minmax(0, 1fr));
                        }

                        @media (max-width: 480px) {
                            .vvip-facility-grid {
                                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                                row-gap: 8px !important;
                            }
                        }

                        @media (min-width: 481px) and (max-width: 640px) {
                            .vvip-facility-grid {
                                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                                row-gap: 8px !important;
                            }
                        }
                    </style>

                    <div class="w-full min-w-0 mt-2">
                        <div class="grid gap-x-0 gap-y-0 items-start w-full max-w-full vvip-facility-grid">

                            <!-- 1 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                                    <i class="fas fa-user text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    1 Kamar / 1 Pasien
                                </span>
                            </div>

                            <!-- 2 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F3;color:#527487;">
                                    <i class="fas fa-expand text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Kamar Lebih Luas
                                </span>
                            </div>

                            <!-- 3 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EDF1EA;color:#61705D;">
                                    <i class="fas fa-couch text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Ruang Penunggu
                                </span>
                            </div>

                            <!-- 4 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F2ECE5;color:#826A53;">
                                    <i class="fas fa-wine-bottle text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Minibar
                                </span>
                            </div>

                            <!-- 5 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                                    <i class="fas fa-bed text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Sofa Bed
                                </span>
                            </div>

                            <!-- 6 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F1ECE3;color:#76684F;">
                                    <i class="fas fa-utensils text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Meja Makan
                                </span>
                            </div>

                            <!-- 7 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                                    <i class="fas fa-shower text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Shower Air Hangat
                                </span>
                            </div>

                            <!-- 8 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8EEF1;color:#557080;">
                                    <i class="fas fa-wheelchair text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Toilet Disabilitas
                                </span>
                            </div>

                            <!-- 9 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                                    <i class="fas fa-snowflake text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Air Conditioner
                                </span>
                            </div>

                            <!-- 10 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#ECE9F1;color:#685E78;">
                                    <i class="fas fa-tv text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Smart TV
                                </span>
                            </div>

                            <!-- 11 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EEF0ED;color:#657064;">
                                    <i class="fas fa-box text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Lemari Es
                                </span>
                            </div>

                            <!-- 12 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F0ECE7;color:#756655;">
                                    <i class="fas fa-shirt text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Lemari Baju
                                </span>
                            </div>

                            <!-- 13 -->
                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F1ECE4;color:#77654D;">
                                    <i class="fas fa-mug-hot text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight" style="color:#292D32;">
                                    Teko Listrik
                                </span>
                            </div>

                            <div class="flex items-center gap-1 w-fit min-w-0 rounded-md px-1.5 py-2 border"
                                style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1"
                                    style="background:#E8F5EC;color:#3A9B5D;">
                                    <i class="fas fa-wifi text-[8px]"></i>
                                </div>

                                <span class="min-w-0 truncate text-[10px] sm:text-[11px] font-semibold leading-tight"
                                    style="color:#292D32;">
                                    Free WiFi
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div> <!-- /#roomSlider -->
    </div> <!-- /.room-modal__content -->
    </div> <!-- /#roomDetailModal -->

    <!-- =====================================================
                POPUP DETAIL KAMAR VIP
    ====================================================== -->

    <div id="roomDetailModalVip" class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-5">

        <!-- =================================================
                    BACKDROP
                ================================================== -->

        <div
            class="absolute inset-0 bg-black/60 backdrop-blur-sm"
            data-close-room="vip">
        </div>


        <!-- =================================================
                MODAL
             ================================================== -->

        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white rounded-2xl shadow-2xl z-10">

            <!-- =================================================
                    CLOSE BUTTON
                ================================================== -->

            <div style="position: sticky; top: 0; left: 0; width: 100%; height: 0; overflow: visible; z-index: 40;">

                <button
                    type="button"
                    data-close-room="vip"
                    style="position: absolute; top: 12px; right: 12px; left: auto;"
                    class="w-9 h-9 rounded-full bg-black/40 backdrop-blur text-white flex items-center justify-center hover:bg-black/60 transition">

                    <i class="fas fa-xmark text-sm"></i>

                </button>

            </div>


            <!-- =================================================
                    SLIDER
                ================================================== -->

            <div id="roomSliderVip" class="relative h-52 sm:h-64 md:h-80 overflow-hidden bg-gray-900">

                <div id="roomSlidesVip" class="flex h-full transition-transform duration-500 ease-in-out">

                    @for ($i = 1; $i <= 4; $i++)

                        <div class="min-w-full h-full relative">

                        <img
                            src="{{ asset('img/leaflet/kamar-vip/' . $i . '.jpg') }}"
                            alt="Kamar VIP {{ $i }}"
                            class="w-full h-full object-cover"
                            draggable="false">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent pointer-events-none"></div>

                </div>

                @endfor

            </div>

        </div>


        <!-- =====================================================
            MOBILE INFO CARD
        ====================================================== -->

        <style>
            @media (max-width: 639px) {
                #roomInformationVip {
                    display: none !important;
                }

                #roomInfoMobileVip {
                    display: block !important;
                }
            }

            @media (min-width: 640px) {
                #roomInfoMobileVip {
                    display: none !important;
                }
            }
        </style>


        <div id="roomInfoMobileVip" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

            <!-- BADGE -->

            <div class="flex items-center justify-between gap-3 mb-3">

                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 12px rgba(0,0,0,0.35); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        Kamar VIP ZAM ZAM

                    </span>

                </span>

            </div>


            <!-- SUBTITLE -->

            <p class="text-[12px] font-medium leading-snug" style="color:#5B6169;">
                Kenyamanan dan privasi untuk pengalaman perawatan terbaik
            </p>


            <!-- DIVIDER -->

            <div class="flex items-center gap-3 my-3">

                <span class="h-px flex-1" style="background:#EDE7D8;"></span>

                <span class="w-1 h-1 rotate-45" style="background:#E9C77B;"></span>

                <span class="h-px flex-1" style="background:#EDE7D8;"></span>

            </div>


            <!-- TARIF -->

            <div class="mb-3.5">

                <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#8A7A55;">

                    <i class="fas fa-tag text-[9px]" style="color:#C9A24B;"></i>

                    Tarif per malam

                </div>

                <div class="flex items-baseline gap-1.5 mt-1">

                    <strong class="vip-display text-2xl font-semibold leading-none" style="color:#B9862F;">
                        Rp 350.000
                    </strong>

                    <span class="text-xs font-medium" style="color:#6B7280;">
                        / malam
                    </span>

                </div>

            </div>


            <!-- FASILITAS -->
            <div class="grid grid-cols-2 gap-2 mt-2">

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                        <i class="fas fa-user text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">1 Kamar / 1 Pasien</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EDF1EA;color:#61705D;">
                        <i class="fas fa-couch text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Ruang Penunggu</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                        <i class="fas fa-bed text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Sofa Bed</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                        <i class="fas fa-shower text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Shower Air Hangat</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8EEF1;color:#557080;">
                        <i class="fas fa-wheelchair text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Toilet Disabilitas</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                        <i class="fas fa-snowflake text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Air Conditioner</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#ECE9F1;color:#685E78;">
                        <i class="fas fa-tv text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Smart TV</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EEF0ED;color:#657064;">
                        <i class="fas fa-box text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Es</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F0ECE7;color:#756655;">
                        <i class="fas fa-shirt text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Baju</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F1ECE4;color:#77654D;">
                        <i class="fas fa-mug-hot text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Teko Listrik</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F5EC;color:#3A9B5D;">
                        <i class="fas fa-wifi text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Free WiFi</span>
                </div>
            </div>

        </div>


        <!-- =====================================================
                ROOM INFORMATION — DESKTOP
             ====================================================== -->

        <style>
            .vip-display {
                font-family: 'Fraunces', ui-serif, Georgia, serif;
            }

            .vip-facility-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            @media (max-width: 480px) {
                .vip-facility-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                    row-gap: 8px !important;
                }
            }

            @media (min-width: 481px) and (max-width: 640px) {
                .vip-facility-grid {
                    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                    row-gap: 8px !important;
                }
            }

            @keyframes vipShine {
                0% {
                    transform: translateX(-150%);
                }

                50% {
                    transform: translateX(150%);
                }

                100% {
                    transform: translateX(150%);
                }
            }
        </style>


        <div id="roomInformationVip" class="absolute left-4 right-4 bottom-4 sm:left-6 sm:right-6 sm:bottom-6 text-white z-20 pointer-events-none">

            <!-- SCRIM -->

            <div class="absolute -inset-x-4 sm:-inset-x-6 -top-48 -bottom-4 sm:-bottom-6 bg-gradient-to-t from-black/85 via-black/45 to-transparent -z-10 pointer-events-none"></div>


            <!-- BADGE -->

            <div class="flex items-center justify-between gap-3 mb-3">

                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 6px 18px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <!-- SHINE -->

                    <span
                        style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: vipShine 3.5s ease-in-out infinite; pointer-events: none;">
                    </span>


                    <!-- DOT -->

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>


                    <!-- TEXT -->

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        Kamar VIP ZAM ZAM

                    </span>

                </span>

            </div>


            <!-- SUBTITLE -->

            <p
                class="mt-1.5 text-[11px] sm:text-xs md:text-sm text-white font-medium tracking-wide text-left"
                style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 7px rgba(0,0,0,0.9),0 5px 12px rgba(0,0,0,0.7);">

                Kenyamanan dan privasi untuk pengalaman perawatan terbaik

            </p>


            <!-- DIVIDER -->

            <div class="flex items-center gap-3 my-3.5 sm:my-4">

                <span class="h-px flex-1 bg-white/15"></span>

                <span class="w-1 h-1 rotate-45 bg-[#E9C77B]"></span>

                <span class="h-px flex-1 bg-white/15"></span>

            </div>


            <!-- TARIF + FASILITAS -->

            <div class="flex flex-col items-start gap-2.5 w-full">

                <!-- TARIF -->

                <div class="shrink-0">

                    <div
                        class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap"
                        style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">

                        <i class="fas fa-tag text-[#E9C77B] text-[9px]"></i>

                        Tarif per malam

                    </div>


                    <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                        <strong
                            class="vip-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#F3D58A] tracking-tight"
                            style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                            Rp 350.000

                        </strong>

                        <span
                            class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1"
                            style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

                            / malam

                        </span>

                    </div>

                </div>


                <!-- FASILITAS -->

                <div class="w-full min-w-0 mt-2">

                    <div class="grid gap-x-0 gap-y-0 items-start w-full max-w-full vip-facility-grid">

                        <!-- 1 -->

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                                <i class="fas fa-user text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">1 Kamar / 1 Pasien</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EDF1EA;color:#61705D;">
                                <i class="fas fa-couch text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Kursi Tunggu</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                                <i class="fas fa-bed text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Sofa Bed</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                                <i class="fas fa-shower text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Shower Air Hangat</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8EEF1;color:#557080;">
                                <i class="fas fa-wheelchair text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Toilet Disabilitas</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                                <i class="fas fa-snowflake text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Air Conditioner</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#ECE9F1;color:#685E78;">
                                <i class="fas fa-tv text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Smart TV</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#EEF0ED;color:#657064;">
                                <i class="fas fa-box text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Es</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F0ECE7;color:#756655;">
                                <i class="fas fa-shirt text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Baju</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F1ECE4;color:#77654D;">
                                <i class="fas fa-mug-hot text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Teko Listrik</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F5EC;color:#3A9B5D;">
                                <i class="fas fa-wifi text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Free WiFi</span>
                        </div>

                    </div>

                </div>

            </div>

        </div> <!-- /#roomInformationVip -->
    </div> <!-- /.room-modal__content -->
    </div> <!-- /#roomDetailModalVip -->

    <!-- =====================================================
            POPUP DETAIL KAMAR KELAS 1,2,3
    ====================================================== -->

    <div id="roomDetailModalK123" class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-5">

        <!-- BACKDROP -->

        <div
            class="absolute inset-0 bg-black/60 backdrop-blur-sm"
            data-close-room="k123">
        </div>


        <!-- MODAL -->

        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white rounded-2xl shadow-2xl z-10">

            <!-- CLOSE BUTTON -->

            <div style="position: sticky; top: 0; left: 0; width: 100%; height: 0; overflow: visible; z-index: 40;">

                <button
                    type="button"
                    data-close-room="k123"
                    style="position: absolute; top: 12px; right: 12px; left: auto;"
                    class="w-9 h-9 rounded-full bg-black/40 backdrop-blur text-white flex items-center justify-center hover:bg-black/60 transition">

                    <i class="fas fa-xmark text-sm"></i>

                </button>

            </div>


            <!-- SLIDER -->

            <div id="roomSliderK123" class="relative h-52 sm:h-64 md:h-80 overflow-hidden bg-gray-900">

                <div id="roomSlidesK123" class="flex h-full transition-transform duration-500 ease-in-out">

                    @for ($i = 1; $i <= 3; $i++)

                        <div class="min-w-full h-full relative">

                        <img
                            src="{{ asset('img/leaflet/kamar-1,2,3/' . $i . '.png') }}"
                            alt="Kamar Kelas 1,2,3 {{ $i }}"
                            class="w-full h-full object-cover"
                            draggable="false">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent pointer-events-none"></div>

                </div>

                @endfor

            </div>

        </div>


        <!-- =====================================================
                MOBILE INFO CARD
                ====================================================== -->

        <style>
            @media (max-width: 639px) {
                #roomInformationK123 {
                    display: none !important;
                }

                #roomInfoMobileK123 {
                    display: block !important;
                }
            }

            @media (min-width: 640px) {
                #roomInfoMobileK123 {
                    display: none !important;
                }
            }
        </style>


        <div id="roomInfoMobileK123" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

            <!-- BADGE -->

            <div class="flex items-center justify-between gap-3 mb-3">

                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 12px rgba(0,0,0,0.35); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        Kamar Kelas 1,2,3

                    </span>

                </span>
                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 12px rgba(0,0,0,0.35); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        AROFAH

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        MARWAH

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        SOFA

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        AQSHO

                    </span>

                </span>
            </div>


            <!-- SUBTITLE -->

            <p class="text-[12px] font-medium leading-snug" style="color:#5B6169;">
                Perawatan nyaman dengan harga terjangkau
            </p>


            <!-- DIVIDER -->

            <div class="flex items-center gap-3 my-3">

                <span class="h-px flex-1" style="background:#EDE7D8;"></span>

                <span class="w-1 h-1 rotate-45" style="background:#E9C77B;"></span>

                <span class="h-px flex-1" style="background:#EDE7D8;"></span>

            </div>


            <!-- TARIF -->

            <div class="mb-3.5">

                <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#8A7A55;">

                    <i class="fas fa-tag text-[9px]" style="color:#C9A24B;"></i>

                    Tarif per malam

                </div>

                <div class="flex items-baseline gap-1.5 mt-1">

                    <strong class="k123-display text-2xl font-semibold leading-none" style="color:#B9862F;">
                        Rp 300.000
                    </strong>

                    <span class="text-xs font-medium" style="color:#6B7280;">
                        / malam
                    </span>

                </div>

            </div>


            <!-- FASILITAS -->

            <div class="grid grid-cols-2 gap-2 mt-2">

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                        <i class="fas fa-bed text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Tempat Tidur</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F0ECE7;color:#756655;">
                        <i class="fas fa-shirt text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Baju</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                        <i class="fas fa-shower text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Kamar Mandi Dalam</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                        <i class="fas fa-snowflake text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Air Conditioner</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#ECE9F1;color:#685E78;">
                        <i class="fas fa-tv text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Smart TV</span>
                </div>

                <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                    <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F5EC;color:#3A9B5D;">
                        <i class="fas fa-wifi text-[8px]"></i>
                    </div>
                    <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Free WiFi</span>
                </div>

            </div>

        </div>


        <!-- =====================================================
                ROOM INFORMATION — DESKTOP
                ====================================================== -->

        <style>
            .k123-display {
                font-family: 'Fraunces', ui-serif, Georgia, serif;
            }

            .k123-facility-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            @media (max-width: 480px) {
                .k123-facility-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                    row-gap: 8px !important;
                }
            }

            @keyframes k123Shine {
                0% {
                    transform: translateX(-150%);
                }

                50% {
                    transform: translateX(150%);
                }

                100% {
                    transform: translateX(150%);
                }
            }
        </style>


        <div id="roomInformationK123" class="absolute left-4 right-4 bottom-4 sm:left-6 sm:right-6 sm:bottom-6 text-white z-20 pointer-events-none">

            <!-- SCRIM -->

            <div class="absolute -inset-x-4 sm:-inset-x-6 -top-48 -bottom-4 sm:-bottom-6 bg-gradient-to-t from-black/85 via-black/45 to-transparent -z-10 pointer-events-none"></div>


            <!-- BADGE -->

            <div class="flex flex-col items-start gap-3 mb-3">

                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 6px 18px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: k123Shine 3.5s ease-in-out infinite; pointer-events: none;">
                    </span>

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        Kamar Kelas 1,2,3

                    </span>

                </span>
                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 6px 18px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: k123Shine 3.5s ease-in-out infinite; pointer-events: none;">
                    </span>

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        AROFAH

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        MARWAH

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        SOFA

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        AQSHO

                    </span>

                </span>

            </div>


            <!-- SUBTITLE -->

            <p
                class="mt-1.5 text-[11px] sm:text-xs md:text-sm text-white font-medium tracking-wide text-left"
                style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 7px rgba(0,0,0,0.9),0 5px 12px rgba(0,0,0,0.7);">

                Perawatan nyaman dengan harga terjangkau

            </p>


            <!-- DIVIDER -->

            <div class="flex items-center gap-3 my-3.5 sm:my-4">

                <span class="h-px flex-1 bg-white/15"></span>

                <span class="w-1 h-1 rotate-45 bg-[#E9C77B]"></span>

                <span class="h-px flex-1 bg-white/15"></span>

            </div>


            <!-- TARIF + FASILITAS -->

            <div class="flex flex-col items-start gap-2.5 w-full">

                <!-- TARIF -->

                <div class="shrink-0">

                    <div
                        class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap"
                        style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">

                        <i class="fas fa-tag text-[#E9C77B] text-[9px]"></i>

                        Tarif per malam

                    </div>


                    <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                        <strong
                            class="k123-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#F3D58A] tracking-tight"
                            style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                            Rp 300.000

                        </strong>

                        <span
                            class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1"
                            style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

                            / malam

                        </span>

                    </div>

                </div>


                <!-- FASILITAS -->

                <div class="w-full min-w-0 mt-2">

                    <div class="grid gap-x-0 gap-y-0 items-start w-full max-w-full k123-facility-grid">

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                                <i class="fas fa-bed text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Tempat Tidur</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#F0ECE7;color:#756655;">
                                <i class="fas fa-shirt text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Lemari Baju</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                                <i class="fas fa-shower text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Kamar Mandi Dalam</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                                <i class="fas fa-snowflake text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Air Conditioner</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#ECE9F1;color:#685E78;">
                                <i class="fas fa-tv text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Smart TV</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                            <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F5EC;color:#3A9B5D;">
                                <i class="fas fa-wifi text-[8px]"></i>
                            </div>
                            <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Free WiFi</span>
                        </div>

                    </div>

                </div>

            </div>

        </div> <!-- /#roomInformationK123 -->
    </div> <!-- /.room-modal__content -->
    </div> <!-- /#roomDetailModalK123 -->

    <!-- =====================================================
            POPUP DETAIL KAMAR ISOLASI MINA
    ====================================================== -->

    <div id="roomDetailModalK3m" class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-5">

        <!-- BACKDROP -->

        <div
            class="absolute inset-0 bg-black/60 backdrop-blur-sm"
            data-close-room="k3m">
        </div>


        <!-- MODAL -->

        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white rounded-2xl shadow-2xl z-10">

            <!-- CLOSE BUTTON -->

            <div style="position: sticky; top: 0; left: 0; width: 100%; height: 0; overflow: visible; z-index: 40;">

                <button
                    type="button"
                    data-close-room="k3m"
                    style="position: absolute; top: 12px; right: 12px; left: auto;"
                    class="w-9 h-9 rounded-full bg-black/40 backdrop-blur text-white flex items-center justify-center hover:bg-black/60 transition">

                    <i class="fas fa-xmark text-sm"></i>

                </button>

            </div>


            <!-- SLIDER -->

            <div id="roomSliderK3m" class="relative h-52 sm:h-64 md:h-80 overflow-hidden bg-gray-900">

                <div id="roomSlidesK3m" class="flex h-full transition-transform duration-500 ease-in-out">

                    <div class="min-w-full h-full relative">

                        <img
                            src="{{ asset('img/leaflet/kamar-mina/MINA.jpeg') }}"
                            alt="Kamar ISOLASI MINA"
                            class="w-full h-full object-cover"
                            draggable="false">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent pointer-events-none"></div>

                    </div>

                </div>

            </div>


            <!-- =====================================================
            MOBILE INFO CARD
        ====================================================== -->

            <style>
                @media (max-width: 639px) {
                    #roomInformationK3m {
                        display: none !important;
                    }

                    #roomInfoMobileK3m {
                        display: block !important;
                    }
                }

                @media (min-width: 640px) {
                    #roomInfoMobileK3m {
                        display: none !important;
                    }
                }
            </style>


            <div id="roomInfoMobileK3m" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

                <!-- BADGE -->

                <div class="flex items-center justify-between gap-3 mb-3">

                    <span
                        style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 12px rgba(0,0,0,0.35); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                        <span
                            style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                        </span>

                        <span
                            style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                            Kamar ISOLASI MINA

                        </span>

                    </span>
                </div>


                <!-- SUBTITLE -->

                <p class="text-[12px] font-medium leading-snug" style="color:#5B6169;">
                    Perawatan nyaman dan terjaga dengan isolasi
                </p>


                <!-- DIVIDER -->

                <div class="flex items-center gap-3 my-3">

                    <span class="h-px flex-1" style="background:#EDE7D8;"></span>

                    <span class="w-1 h-1 rotate-45" style="background:#E9C77B;"></span>

                    <span class="h-px flex-1" style="background:#EDE7D8;"></span>

                </div>


                <!-- TARIF -->

                <div class="mb-3.5">

                    <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#8A7A55;">

                        <i class="fas fa-tag text-[9px]" style="color:#C9A24B;"></i>

                        Tarif per malam

                    </div>

                    <div class="flex items-baseline gap-1.5 mt-1">

                        <strong class="k123-display text-2xl font-semibold leading-none" style="color:#B9862F;">
                            Rp 300.000
                        </strong>

                        <span class="text-xs font-medium" style="color:#6B7280;">
                            / malam
                        </span>

                    </div>

                </div>


                <!-- FASILITAS -->

                <div class="grid grid-cols-2 gap-2 mt-2">

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                            <i class="fas fa-bed text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Tempat Tidur</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                            <i class="fas fa-shower text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Kamar Mandi Dalam</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                            <i class="fas fa-snowflake text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Air Conditioner</span>
                    </div>

                    <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                        <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F5EC;color:#3A9B5D;">
                            <i class="fas fa-wifi text-[8px]"></i>
                        </div>
                        <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Free WiFi</span>
                    </div>

                </div>

            </div>


            <!-- =====================================================
                ROOM INFORMATION — DESKTOP
                ====================================================== -->

            <style>
                .k3m-display {
                    font-family: 'Fraunces', ui-serif, Georgia, serif;
                }

                .k3m-facility-grid {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }

                @media (max-width: 480px) {
                    .k123-facility-grid {
                        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                        row-gap: 8px !important;
                    }
                }

                @keyframes k3mShine {
                    0% {
                        transform: translateX(-150%);
                    }

                    50% {
                        transform: translateX(150%);
                    }

                    100% {
                        transform: translateX(150%);
                    }
                }
            </style>


            <div id="roomInformationK3m" class="absolute left-4 right-4 bottom-4 sm:left-6 sm:right-6 sm:bottom-6 text-white z-20 pointer-events-none">

                <!-- SCRIM -->

                <div class="absolute -inset-x-4 sm:-inset-x-6 -top-48 -bottom-4 sm:-bottom-6 bg-gradient-to-t from-black/85 via-black/45 to-transparent -z-10 pointer-events-none"></div>


                <!-- BADGE -->

                <div class="flex flex-col items-start gap-3 mb-3">

                    <span
                        style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 6px 18px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                        <span
                            style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: k123Shine 3.5s ease-in-out infinite; pointer-events: none;">
                        </span>

                        <span
                            style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                        </span>

                        <span
                            style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                            Kamar ISOLASI MINA

                        </span>

                    </span>

                </div>


                <!-- SUBTITLE -->

                <p
                    class="mt-1.5 text-[11px] sm:text-xs md:text-sm text-white font-medium tracking-wide text-left"
                    style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 7px rgba(0,0,0,0.9),0 5px 12px rgba(0,0,0,0.7);">

                    Perawatan nyaman dab terjaga dengan isolasi

                </p>


                <!-- DIVIDER -->

                <div class="flex items-center gap-3 my-3.5 sm:my-4">

                    <span class="h-px flex-1 bg-white/15"></span>

                    <span class="w-1 h-1 rotate-45 bg-[#E9C77B]"></span>

                    <span class="h-px flex-1 bg-white/15"></span>

                </div>


                <!-- TARIF + FASILITAS -->

                <div class="flex flex-col items-start gap-2.5 w-full">

                    <!-- TARIF -->

                    <div class="shrink-0">

                        <div
                            class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap"
                            style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">

                            <i class="fas fa-tag text-[#E9C77B] text-[9px]"></i>

                            Tarif per malam

                        </div>


                        <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                            <strong
                                class="k123-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#F3D58A] tracking-tight"
                                style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                                Rp 300.000

                            </strong>

                            <span
                                class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1"
                                style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

                                / malam

                            </span>

                        </div>

                    </div>


                    <!-- FASILITAS -->

                    <div class="w-full min-w-0 mt-2">

                        <div class="grid gap-x-0 gap-y-0 items-start w-full max-w-full k123-facility-grid">

                            <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E9EEF2;color:#526575;">
                                    <i class="fas fa-bed text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Tempat Tidur</span>
                            </div>

                            <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E7F0F1;color:#55777C;">
                                    <i class="fas fa-shower text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Kamar Mandi Dalam</span>
                            </div>

                            <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F0F2;color:#587985;">
                                    <i class="fas fa-snowflake text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Air Conditioner</span>
                            </div>

                            <div class="flex items-center gap-2 rounded-md px-2 py-2 border" style="background:#FCFAF5;border-color:#F0E4C9;">
                                <div class="w-5 h-5 rounded-md flex items-center justify-center shrink-0 ml-1" style="background:#E8F5EC;color:#3A9B5D;">
                                    <i class="fas fa-wifi text-[8px]"></i>
                                </div>
                                <span class="min-w-0 truncate text-[11px] font-semibold" style="color:#292D32;">Free WiFi</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div> <!-- /#roomInformationK123 -->
        </div> <!-- /.room-modal__content -->
    </div> <!-- /#roomDetailModalK3m -->

    <!-- =====================================================
            POPUP DETAIL KAMAR INTENSIF
    ====================================================== -->

    <div id="roomDetailModalIntensif" class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-5">

        <!-- BACKDROP -->

        <div
            class="absolute inset-0 bg-black/60 backdrop-blur-sm"
            data-close-room="intensif">
        </div>


        <!-- MODAL -->

        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white rounded-2xl shadow-2xl z-10">

            <!-- CLOSE BUTTON -->

            <div style="position: sticky; top: 0; left: 0; width: 100%; height: 0; overflow: visible; z-index: 40;">

                <button
                    type="button"
                    data-close-room="intensif"
                    style="position: absolute; top: 12px; right: 12px; left: auto;"
                    class="w-9 h-9 rounded-full bg-black/40 backdrop-blur text-white flex items-center justify-center hover:bg-black/60 transition">

                    <i class="fas fa-xmark text-sm"></i>

                </button>

            </div>


            <!-- SLIDER -->

            <div id="roomSliderIntensif" class="relative h-52 sm:h-64 md:h-80 overflow-hidden bg-gray-900">

                <div id="roomSlidesIntensif" class="flex h-full transition-transform duration-500 ease-in-out">

                    @for ($i = 1; $i <= 3; $i++)

                        <div class="min-w-full h-full relative">

                        <img
                            src="{{ asset('img/leaflet/kamar-intensif/' . $i . '.jpeg') }}"
                            alt="Kamar Kelas intensif {{ $i }}"
                            class="w-full h-full object-cover"
                            draggable="false">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent pointer-events-none"></div>

                </div>

                @endfor

            </div>

        </div>


        <!-- =====================================================
                MOBILE INFO CARD
                ====================================================== -->

        <style>
            @media (max-width: 639px) {
                #roomInformationIntensif {
                    display: none !important;
                }

                #roomInfoMobileIntensif {
                    display: block !important;
                }
            }

            @media (min-width: 640px) {
                #roomInfoMobileIntensif {
                    display: none !important;
                }
            }
        </style>


        <div id="roomInfoMobileIntensif" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

            <!-- BADGE -->

            <div class="flex items-center justify-between gap-3 mb-3">

                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 12px rgba(0,0,0,0.35); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        Kamar Intensif

                    </span>

                </span>
                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 4px 12px rgba(0,0,0,0.35); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        ICU

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        HCU

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        NICU

                    </span>
                </span>
            </div>


            <!-- SUBTITLE -->

            <p class="text-[12px] font-medium leading-snug" style="color:#5B6169;">
                Perawatan nyaman dengan harga terjangkau
            </p>


            <!-- DIVIDER -->

            <div class="flex items-center gap-3 my-3">

                <span class="h-px flex-1" style="background:#EDE7D8;"></span>

                <span class="w-1 h-1 rotate-45" style="background:#E9C77B;"></span>

                <span class="h-px flex-1" style="background:#EDE7D8;"></span>

            </div>


            <!-- TARIF -->

            <div class="mb-3.5">

                <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#8A7A55;">

                    <i class="fas fa-tag text-[9px]" style="color:#C9A24B;"></i>

                    Tarif per malam

                </div>

                <div class="flex items-baseline gap-1.5 mt-1">

                    <strong class="k123-display text-2xl font-semibold leading-none" style="color:#B9862F;">
                        Rp 300.000
                    </strong>

                    <span class="text-xs font-medium" style="color:#6B7280;">
                        / malam
                    </span>

                </div>

            </div>

        </div>


        <!-- =====================================================
                ROOM INFORMATION — DESKTOP
                ====================================================== -->

        <style>
            .intensif-display {
                font-family: 'Fraunces', ui-serif, Georgia, serif;
            }

            .intensif-facility-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            @media (max-width: 480px) {
                .intensif-facility-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                    row-gap: 8px !important;
                }
            }

            @keyframes intensifShine {
                0% {
                    transform: translateX(-150%);
                }

                50% {
                    transform: translateX(150%);
                }

                100% {
                    transform: translateX(150%);
                }
            }
        </style>


        <div id="roomInformationIntensif" class="absolute left-4 right-4 bottom-4 sm:left-6 sm:right-6 sm:bottom-6 text-white z-20 pointer-events-none">

            <!-- SCRIM -->

            <div class="absolute -inset-x-4 sm:-inset-x-6 -top-48 -bottom-4 sm:-bottom-6 bg-gradient-to-t from-black/85 via-black/45 to-transparent -z-10 pointer-events-none"></div>


            <!-- BADGE -->

            <div class="flex flex-col items-start gap-3 mb-3">

                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 6px 18px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: k123Shine 3.5s ease-in-out infinite; pointer-events: none;">
                    </span>

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        Kamar Intensif

                    </span>

                </span>
                <span
                    style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #24333B 0%, #0E1619 100%); border: 1px solid rgba(216,184,106,0.55); box-shadow: 0 6px 18px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <span
                        style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: k123Shine 3.5s ease-in-out infinite; pointer-events: none;">
                    </span>

                    <span
                        style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #F6E4B0, #B98F45); box-shadow: 0 0 8px rgba(216,184,106,0.9);">
                    </span>

                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        ICU

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        HCU

                    </span>
                    <span
                        style="position: relative; background: linear-gradient(180deg, #F6E4B0 0%, #D8B86A 55%, #A97C3C 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: #D8B86A;">

                        NICU

                    </span>
                </span>

            </div>


            <!-- SUBTITLE -->

            <p
                class="mt-1.5 text-[11px] sm:text-xs md:text-sm text-white font-medium tracking-wide text-left"
                style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 7px rgba(0,0,0,0.9),0 5px 12px rgba(0,0,0,0.7);">

                Perawatan nyaman dengan harga terjangkau

            </p>


            <!-- DIVIDER -->

            <div class="flex items-center gap-3 my-3.5 sm:my-4">

                <span class="h-px flex-1 bg-white/15"></span>

                <span class="w-1 h-1 rotate-45 bg-[#E9C77B]"></span>

                <span class="h-px flex-1 bg-white/15"></span>

            </div>


            <!-- TARIF + FASILITAS -->

            <div class="flex flex-col items-start gap-2.5 w-full">

                <!-- TARIF -->

                <div class="shrink-0">

                    <div
                        class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap"
                        style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">

                        <i class="fas fa-tag text-[#E9C77B] text-[9px]"></i>

                        Tarif per malam

                    </div>


                    <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                        <strong
                            class="k123-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#F3D58A] tracking-tight"
                            style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                            Rp 300.000

                        </strong>

                        <span
                            class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1"
                            style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

                            / malam

                        </span>

                    </div>

                </div>
            </div>
        </div> <!-- /#roomInformationIntensif -->
    </div> <!-- /.room-modal__content -->
    </div> <!-- /#roomDetailModalIntensif -->

    <script>
        (function() {
            const ROOMS = {
                vvip: {
                    modalId: 'roomDetailModal',
                    slidesId: 'roomSlides',
                    total: 5
                },
                vip: {
                    modalId: 'roomDetailModalVip',
                    slidesId: 'roomSlidesVip',
                    total: 4
                },
                k123: {
                    modalId: 'roomDetailModalK123',
                    slidesId: 'roomSlidesK123',
                    total: 3
                },
                k3m: {
                    modalId: 'roomDetailModalK3m',
                    slidesId: 'roomSlidesK3m',
                    total: 1
                },
                intensif: {
                    modalId: 'roomDetailModalIntensif',
                    slidesId: 'roomSlidesIntensif',
                    total: 3
                }
            };

            const state = {};

            function updateSlider(key) {
                const cfg = ROOMS[key];
                const slides = document.getElementById(cfg.slidesId);
                if (!slides) return;
                const idx = (state[key] && state[key].index) || 0;
                slides.style.transform = `translateX(-${idx * 100}%)`;
            }

            function goTo(key, index) {
                const cfg = ROOMS[key];
                state[key] = state[key] || {
                    index: 0
                };
                state[key].index = ((index % cfg.total) + cfg.total) % cfg.total;
                updateSlider(key);
            }

            function nextImage(key) {
                const cfg = ROOMS[key];
                const cur = (state[key] && state[key].index) || 0;
                goTo(key, cur + 1);
            }

            function prevImage(key) {
                const cur = (state[key] && state[key].index) || 0;
                goTo(key, cur - 1);
            }

            function startAutoSlide(key) {
                stopAutoSlide(key);
                state[key] = state[key] || {
                    index: 0
                };
                state[key].timer = setInterval(() => nextImage(key), 5000);
            }

            function stopAutoSlide(key) {
                if (state[key] && state[key].timer) {
                    clearInterval(state[key].timer);
                    state[key].timer = null;
                }
            }

            function openModal(key) {
                const cfg = ROOMS[key];
                if (!cfg) return;
                const modal = document.getElementById(cfg.modalId);
                if (!modal) return;

                // Hanya satu modal yang boleh aktif. Ini mencegah modal sebelumnya
                // menutupi modal yang baru dipilih.
                Object.keys(ROOMS).forEach(function(roomKey) {
                    if (roomKey !== key) closeModal(roomKey, false);
                });

                state[key] = {
                    index: 0
                };
                updateSlider(key);
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                // Jangan bergantung pada utilitas CSS yang mungkin tertimpa oleh
                // stylesheet lain: tampilkan modal yang dipilih secara eksplisit.
                modal.style.setProperty('display', 'flex', 'important');
                modal.style.zIndex = '99999';
                document.body.classList.add('overflow-hidden');
                startAutoSlide(key);
            }

            function closeModal(key, unlockScroll = true) {
                const cfg = ROOMS[key];
                if (!cfg) return;
                const modal = document.getElementById(cfg.modalId);
                if (!modal) return;
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modal.style.setProperty('display', 'none', 'important');
                if (unlockScroll) {
                    document.body.classList.remove('overflow-hidden');
                }
                stopAutoSlide(key);
            }

            // Fallback eksplisit dari atribut tombol. Ini juga menghentikan handler
            // lama lain yang mungkin masih terpasang pada halaman.
            window.openRoomModal = function(key, event) {
                if (event) {
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }
                openModal(key);
            };

            // Ikat handler langsung pada tiap tombol. Dengan begitu tombol VIP dan
            // Kelas 1–3 selalu membuka modal sesuai key-nya, tanpa bergantung pada
            // event bubbling atau susunan elemen card.
            document.querySelectorAll('[data-open-room]').forEach(function(button) {
                button.addEventListener('click', function() {
                    openModal(button.dataset.openRoom);
                });
            });

            document.querySelectorAll('[data-close-room]').forEach(function(button) {
                button.addEventListener('click', function() {
                    closeModal(button.dataset.closeRoom);
                });
            });

            // Keyboard control untuk modal yang sedang terbuka
            document.addEventListener('keydown', function(e) {
                for (const key in ROOMS) {
                    const modal = document.getElementById(ROOMS[key].modalId);
                    if (modal && !modal.classList.contains('hidden')) {
                        if (e.key === 'Escape') closeModal(key);
                        if (e.key === 'ArrowRight') nextImage(key);
                        if (e.key === 'ArrowLeft') prevImage(key);
                    }
                }
            });

            // Swipe mobile untuk setiap slider
            const sliderIds = {
                vvip: 'roomSlider',
                vip: 'roomSliderVip',
                k123: 'roomSliderK123',
                k3m: 'roomSliderK3m',
                intensif: 'roomSliderIntensif'
            };

            Object.keys(ROOMS).forEach(function(key) {

                const sliderEl = document.getElementById(sliderIds[key]);

                if (!sliderEl) return;

                let startX = 0;

                sliderEl.addEventListener('touchstart', e => {
                    startX = e.changedTouches[0].screenX;
                }, {
                    passive: true
                });

                sliderEl.addEventListener('touchend', e => {

                    const diff = startX - e.changedTouches[0].screenX;

                    if (Math.abs(diff) < 50) return;

                    diff > 0 ?
                        nextImage(key) :
                        prevImage(key);

                }, {
                    passive: true
                });

            });
        })();
    </script>


    <!-- =================================================
    INFORMATION
    ================================================== -->

    <div
        class="mt-10
           relative
           overflow-hidden
           rounded-2xl
           border border-indigo-100/80
           bg-gradient-to-r from-indigo-50 via-white to-indigo-50/60
           px-5 py-4.5 md:px-6 md:py-5
           shadow-[0_6px_24px_rgba(79,70,229,0.06)]">

        <!-- Accent -->
        <div
            class="absolute left-0 top-0 bottom-0 w-1
               bg-gradient-to-b from-indigo-500 to-indigo-300">
        </div>

        <div class="flex items-start gap-3.5 md:gap-4">

            <!-- ICON -->
            <div
                class="flex h-9 w-9 shrink-0
                   items-center justify-center
                   rounded-xl
                   bg-indigo-100
                   text-indigo-600
                   ring-1 ring-indigo-200/70">

                <i class="fas fa-circle-info text-sm"></i>

            </div>

            <!-- CONTENT -->
            <div class="min-w-0 pt-0.5">

                <div
                    class="mb-1
                       text-xs md:text-sm
                       font-bold
                       tracking-wide
                       text-indigo-900">

                    Informasi Tarif Rawat Inap

                </div>

                <p
                    class="text-xs md:text-sm
                       leading-6
                       text-indigo-800/85">

                    Tarif yang tercantum merupakan informasi awal.
                    Untuk informasi tarif terbaru, ketersediaan kamar,
                    dan ketentuan rawat inap, silakan menghubungi
                    <span class="font-semibold text-indigo-900">
                        petugas RSUD Ar Rozy
                    </span>.

                </p>

            </div>

        </div>

    </div>

</section>

<section id="layanan-unggulan" class="py-16 bg-gray-50">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul Section -->
        <div class="text-center mb-10">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 tracking-tight">
                Layanan Unggulan Kami
            </h2>
            <p class="mt-4 text-gray-500 text-lg">
                Pelayanan cepat, profesional, dan penuh kepedulian
            </p>
            <div class="mt-4 w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
        </div>

        <!-- Gambar -->
        <div class="max-w-7xl mx-auto px-6">

            <!-- Grid Brosur -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card -->
                <div class="relative group overflow-hidden rounded-3xl shadow-xl">
                    <img src="/img/layanan_unggulan/instalasi gizi.JPG"
                        class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-bold">Instalasi Gizi</h3>
                        <p class="text-sm opacity-80">Menu sehat & terkontrol ahli</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-3xl shadow-xl">
                    <img src="/img/layanan_unggulan/MCU.JPG"
                        class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-bold">Medical Check Up</h3>
                        <p class="text-sm opacity-80">Deteksi dini untuk kesehatan optimal</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-3xl shadow-xl">
                    <img src="/img/layanan_unggulan/ruang bermain rawat inap anak.JPG"
                        class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-bold">Ruang Bermain Anak</h3>
                        <p class="text-sm opacity-80">Nyaman & ramah anak</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-3xl shadow-xl">
                    <img src="/img/layanan_unggulan/ruang operasi.JPG"
                        class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-bold">Ruang Operasi</h3>
                        <p class="text-sm opacity-80">Standar medis modern & steril</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-3xl shadow-xl">
                    <img src="/img/layanan_unggulan/VIP.JPG"
                        class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-bold">Kamar VIP</h3>
                        <p class="text-sm opacity-80">Privasi & kenyamanan maksimal</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-3xl shadow-xl">
                    <img src="/img/layanan_unggulan/VVIP.JPG"
                        class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-bold">Kamar VVIP</h3>
                        <p class="text-sm opacity-80">Fasilitas eksklusif & premium</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Ikuti Aktivitas & Informasi Terbaru Kami
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Dapatkan update kegiatan, edukasi kesehatan, dan informasi penting lainnya
                melalui Instagram dan YouTube resmi kami.
            </p>
            <div class="mt-4 w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">

            <!-- Instagram (1 Kolom) -->
            <div class="md:col-span-1 bg-white rounded-2xl shadow-md p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">
                    Instagram Terbaru
                </h3>

                <blockquote class="instagram-media w-full"
                    data-instgrm-permalink="https://www.instagram.com/reel/DVKsgqUDufr/">
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>

                <div class="text-center mt-4">
                    <a href="https://www.instagram.com/rsudarrozy/" target="_blank"
                        class="inline-block px-5 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-full text-sm transition">
                        Follow Instagram
                    </a>
                </div>
            </div>

            <!-- YouTube (2 Kolom) -->
            <div class="md:col-span-2 bg-white rounded-2xl shadow-md p-6 flex flex-col">

                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    Profile Kami
                </h3>

                <div class="aspect-video w-full rounded-xl overflow-hidden shadow-lg">
                    <iframe
                        class="w-full h-full"
                        src="https://www.youtube-nocookie.com/embed/05UQh8NLM8I?autoplay=1&mute=1&playsinline=1&rel=0"
                        title="Profile RSUD Ar Rozy"
                        frameborder="0"
                        loading="lazy"
                        allow="autoplay; encrypted-media; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="mt-6">
                    <a
                        href="https://www.youtube.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-block px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-full text-sm transition">
                        Subscribe YouTube
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Review Kami ⭐</h2>
        <div class="mt-4 mb-4 w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-50 p-6 rounded-lg shadow">
                <p class="text-gray-700 italic mb-4">"Pelayanan bagus, intinya act of service ❤️
                    Kebersihan bagus, fasilitas juga bagus. Nakes ramah. Makanan enak."</p>
                <h4 class="text-gray-900 font-semibold">— Silvia Resti</h4>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow">
                <p class="text-gray-700 italic mb-4">"Selama di rawat di ruang sofa, ruangannya nyaman & bagus,
                    pelayanannya ramah enak, Dokter pelayanannya bagus, perawat juga pelayanannya bagus &
                    tanggap."</p>
                <h4 class="text-gray-900 font-semibold">— misdi hartono</h4>
            </div>
        </div>
    </div>
</section>


<!-- QUICK ACCESS -->
<style>
    html {
        scroll-behavior: smooth;
    }

    #quickAccess {
        left: 24px;
        top: 120px;
        position: fixed;
        z-index: 9999;
    }

    /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               PANEL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================= */

    .quick-panel {
        width: 240px;
        overflow: hidden;
        border-radius: 18px;
        background: rgba(255, 255, 255, .9);
        backdrop-filter: blur(12px);
        border: 1px solid #e2e8f0;
        box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
    }

    /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                               HEADER
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================= */

    .quick-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 14px;
        margin-bottom: 14px;
        border-bottom: 1px solid #e2e8f0;
    }

    .quick-toggle {
        width: 40px;
        height: 40px;
        flex: 0 0 40px;
        border: none;
        border-radius: 12px;
        background: #0f766e;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: .25s;
    }

    .quick-toggle:hover {
        background: #115e59;
    }

    .quick-title {
        transition: .25s;
        white-space: nowrap;
    }

    .quick-title h4 {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
    }

    .quick-title p {
        margin: 2px 0 0;
        font-size: 12px;
        color: #64748b;
    }

    /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                             MENU
                                                                                                                                                                                                                                                                                                                                                                                                                                         ========================= */

    .quick-item {
        display: flex;
        align-items: center;
        gap: 12px;
        height: 46px;
        padding: 0 12px;
        color: #334155;
        text-decoration: none;
        border-radius: 12px;
        transition: .25s;
    }

    .quick-item:hover {
        background: #0f766e;
        color: #fff;
    }

    .quick-item i {
        width: 40px;
        min-width: 40px;
        text-align: center;
        font-size: 17px;
    }

    .quick-item span {
        white-space: nowrap;
        transition: .2s;
    }

    /* =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                             MINIMIZE
                                                                                                                                                                                                                                                                                                                                                                                                                                         ========================= */

    .quick-panel {
        transition: width .35s ease;
    }

    .quick-header,
    .quick-item {
        transition: .3s;
    }

    .quick-panel.minimized {
        width: 64px;
        padding: 12px 8px;
    }

    .quick-panel.minimized .quick-header {
        gap: 0;
        justify-content: center;
        padding: 0;
        margin: 0 0 10px;
        border-bottom: none;
    }

    .quick-panel.minimized .quick-title {
        opacity: 0;
        width: 0;
        overflow: hidden;
    }

    .quick-panel.minimized .quick-toggle {
        margin: 0;
    }

    .quick-panel.minimized .quick-item {
        justify-content: center;
        padding: 0;
        gap: 0;
    }

    .quick-panel.minimized .quick-item span {
        opacity: 0;
        width: 0;
        overflow: hidden;
    }

    .quick-panel.minimized .quick-item i {
        width: 40px;
        margin: 0;
    }

    .quick-panel.minimized .quick-item:hover {
        transform: scale(1.08);
    }

    .quick-item {
        position: relative;
    }

    .quick-item::before {
        content: "";
        position: absolute;
        left: -6px;
        top: 8px;
        bottom: 8px;
        width: 4px;
        border-radius: 10px;
        background: #0f766e;
        transform: scaleY(0);
        transition: .25s;
    }

    .quick-item.active::before {
        transform: scaleY(1);
    }

    section[id] {
        scroll-margin-top: 90px;
    }

    .quick-panel.minimized nav {
        gap: 8px;
    }

    @media (max-width: 768px) {
        #quickAccess {
            left: 16px;
            top: auto;
            bottom: 24px;
        }

        .quick-panel {
            width: 52px;
            height: 52px;
            padding: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: width .3s ease, height .3s ease, border-radius .3s ease, background .3s ease, box-shadow .3s ease;

            /* === hilangkan background/blur/shadow bawaan saat collapsed === */
            background: transparent;
            backdrop-filter: none;
            border: none;
            box-shadow: none;
        }

        .quick-panel .quick-header {
            margin: 0;
            padding: 0;
            border-bottom: none;
        }

        .quick-panel .quick-title {
            display: none;
        }

        .quick-panel nav {
            display: none;
        }

        /* ===== state saat dibuka di mobile ===== */
        .quick-panel.mobile-open {
            display: flex;
            flex-direction: column;
            width: 230px;
            height: auto;
            border-radius: 18px;
            padding: 14px;
            align-items: stretch;
            justify-content: flex-start;

            /* === background putih baru muncul di sini === */
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(12px);
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
        }

        .quick-panel.mobile-open .quick-header {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            gap: 12px;
            padding-bottom: 14px;
            margin-bottom: 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        .quick-panel.mobile-open .quick-title {
            display: block;
            white-space: normal;
            flex: 1;
            min-width: 0;
            opacity: 1;
            width: auto;
            overflow: visible;
        }

        .quick-panel.mobile-open .quick-title h4,
        .quick-panel.mobile-open .quick-title p {
            white-space: normal;
            word-break: break-word;
        }

        .quick-panel.mobile-open nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .quick-panel.mobile-open .quick-item {
            justify-content: flex-start;
            padding: 0 12px;
            gap: 12px;
        }

        .quick-panel.mobile-open .quick-item i {
            width: 40px;
            min-width: 40px;
        }

        .quick-panel.mobile-open .quick-item span {
            display: inline-block;
            opacity: 1;
            width: auto;
            overflow: visible;
            white-space: nowrap;
        }
    }

    /* =========================
   GO TO TOP
========================= */

    #quickGoTop {
        margin-top: 2px;
        color: #0f766e;
        background: rgba(15, 118, 110, 0.06);
    }

    #quickGoTop:hover {
        background: #0f766e;
        color: #fff;
    }

    #quickGoTop::before {
        display: none !important;
    }
</style>
<div id="quickAccess" class="hidden">

    <div class="quick-panel minimized p-3">

        <div class="quick-header">

            <button id="toggleQuickAccess" class="quick-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="quick-title">
                <h4>Quick Access</h4>
                <p>Navigasi Cepat</p>
            </div>

        </div>

        <nav class="flex flex-col gap-2">

            <!-- PROFIL -->
            <a href="#profil" class="quick-item">
                <i class="fas fa-hospital"></i>
                <span>Profil</span>
            </a>

            <!-- TENTANG KAMI -->
            <a href="#about" class="quick-item">
                <i class="fas fa-heartbeat"></i>
                <span>Tentang Kami</span>
            </a>

            <!-- DOKTER -->
            <a href="#poliklinik" class="quick-item">
                <i class="fas fa-user-md"></i>
                <span>Dokter</span>
            </a>

            <!-- PELAYANAN PENUNJANG -->
            <a href="#penunjang" class="quick-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Pelayanan Penunjang</span>
            </a>

            <!-- RAWAT INAP -->
            <a href="#rawat-inap" class="quick-item">
                <i class="fas fa-bed"></i>
                <span>Rawat Inap</span>
            </a>

            <!-- LAYANAN UNGGULAN -->
            <a href="#layanan-unggulan" class="quick-item">
                <i class="fas fa-star"></i>
                <span>Layanan Unggulan</span>
            </a>

            <!-- DIVIDER -->
            <div
                class="my-1 border-t border-slate-200">
            </div>

            <!-- GO TO TOP -->
            <a href="#"
                id="quickGoTop"
                class="quick-item">
                <i class="fas fa-arrow-up"></i>
                <span>Ke Atas</span>
            </a>

        </nav>

    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        /*
        |--------------------------------------------------------------------------
        | Quick Access
        |--------------------------------------------------------------------------
        */

        const quick = document.getElementById("quickAccess");
        const panel = document.querySelector(".quick-panel");
        const toggle = document.getElementById("toggleQuickAccess");

        function isMobile() {
            return window.matchMedia("(max-width: 768px)").matches;
        }

        function setToggleIcon(isOpen) {

            if (!toggle) return;

            const icon = toggle.querySelector("i");

            if (!icon) return;

            icon.className = isOpen ? "fas fa-times" : "fas fa-bars";

        }

        if (quick) {

            window.addEventListener("scroll", () => {

                quick.classList.toggle(
                    "hidden",
                    window.scrollY < 200
                );

            });

        }

        if (toggle && panel) {

            toggle.addEventListener("click", (e) => {

                if (isMobile()) {

                    e.stopPropagation();

                    panel.classList.toggle("mobile-open");

                    setToggleIcon(panel.classList.contains("mobile-open"));

                } else {

                    panel.classList.toggle("minimized");

                    setToggleIcon(!panel.classList.contains("minimized"));

                }

            });

            // auto-close saat klik di luar panel (khusus mobile)
            document.addEventListener("click", (e) => {

                if (
                    isMobile() &&
                    panel.classList.contains("mobile-open") &&
                    !panel.contains(e.target)
                ) {

                    panel.classList.remove("mobile-open");
                    setToggleIcon(false);

                }

            });

            // reset state saat resize melewati breakpoint
            window.addEventListener("resize", () => {

                if (!isMobile()) {

                    panel.classList.remove("mobile-open");
                    setToggleIcon(!panel.classList.contains("minimized"));

                } else {

                    panel.classList.remove("minimized");
                    setToggleIcon(panel.classList.contains("mobile-open"));

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Section Active Menu
        |--------------------------------------------------------------------------
        */

        const sections = document.querySelectorAll("section[id]");
        const links = document.querySelectorAll(".quick-item");
        const sectionLinks = document.querySelectorAll(
            '.quick-item[href^="#"]:not(#quickGoTop)'
        );

        function setActiveMenu() {

            let current = "";

            sections.forEach(section => {

                const top = section.offsetTop - 140;
                const height = section.offsetHeight;

                if (
                    window.scrollY >= top &&
                    window.scrollY < top + height
                ) {

                    current = section.id;

                }

            });

            sectionLinks.forEach(link => {

                link.classList.remove("active");

                if (
                    link.getAttribute("href") === "#" + current
                ) {

                    link.classList.add("active");

                }

            });

        }

        window.addEventListener(
            "scroll",
            setActiveMenu
        );

        setActiveMenu();

        /*
        |--------------------------------------------------------------------------
        | GO TO TOP — RESET QUICK ACCESS
        |--------------------------------------------------------------------------
        */

        const quickGoTop = document.getElementById("quickGoTop");

        if (quickGoTop) {

            quickGoTop.addEventListener("click", (e) => {

                e.preventDefault();

                // =========================================
                // RESET ACTIVE MENU
                // =========================================
                sectionLinks.forEach(link => {
                    link.classList.remove("active");
                });

                // =========================================
                // HAPUS HASH DARI URL
                // Contoh:
                // localhost:8000/#layanan-unggulan
                // menjadi:
                // localhost:8000/
                // =========================================
                history.replaceState(
                    null,
                    "",
                    window.location.pathname + window.location.search
                );

                // =========================================
                // SCROLL KE PALING ATAS
                // =========================================
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });

                // =========================================
                // TUTUP MOBILE MENU
                // =========================================
                if (isMobile() && panel) {

                    panel.classList.remove("mobile-open");

                    setToggleIcon(false);

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | HERO NEWS SWIPER
        |--------------------------------------------------------------------------
        */

        const heroSlider =
            document.querySelector(".heroNewsSwiper");

        if (heroSlider) {

            new Swiper(heroSlider, {

                effect: "fade",

                fadeEffect: {
                    crossFade: true
                },

                speed: 800,

                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },

                loop: true,

                navigation: {
                    nextEl: ".heroNewsSwiper .swiper-button-next",
                    prevEl: ".heroNewsSwiper .swiper-button-prev"
                },

                pagination: {
                    el: ".heroNewsSwiper .swiper-pagination",
                    clickable: true
                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | PKRS SWIPER
        |--------------------------------------------------------------------------
        */

        const pkrsSlider =
            document.querySelector(".pkrsSwiper");

        if (pkrsSlider) {

            new Swiper(pkrsSlider, {

                effect: "fade",

                fadeEffect: {
                    crossFade: true
                },

                speed: 800,

                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },

                loop: true,

                navigation: {
                    nextEl: ".pkrsSwiper .swiper-button-next",
                    prevEl: ".pkrsSwiper .swiper-button-prev"
                },

                pagination: {
                    el: ".pkrsSwiper .swiper-pagination",
                    clickable: true
                }

            });

        }

    });
</script>
@endsection
@section('scripts')
<script src="{{ asset('js/profile.js') }}"></script>
@endsection
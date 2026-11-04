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

{{--
    ============================================================
    RSUD AR ROZY — HERO + INFORMASI TERKINI
    ------------------------------------------------------------
    - Basis file ini dari versi yang sudah kamu edit sendiri.
    - Perubahan yang saya tambahkan di atasnya:
        1) Informasi Terkini sekarang SOLID 4: 2 PKRS + 2 Berita
           (bukan lagi gabung-lalu-take(4) yang bisa saja komposisinya
           tidak seimbang). Grid dibuat 4 kolom tetap (bukan auto-fit)
           supaya width mengisi rapi untuk 4 item ini.
        2) Thumbnail PKRS sekarang pakai logic PERSIS seperti punya kamu
           di HomeController (thumbnail → video_cover → Storage/asset
           fallback), diterapkan langsung di blade ini untuk
           $latestPkrsPosts.
        3) Baris "IGD 24 Jam / Dokter Profesional / dst." dinaikkan lagi
           (overlap ke foto makin besar).

    - Perubahan terbaru (revisi ini):
        4) Tinggi kartu "Informasi Terkini" dikurangi ± separuh
           (aspect-ratio thumbnail 4/3 → 8/3).
        5) Teks "Baca Selengkapnya" warnanya dibedakan, sekarang hijau
           (#34D399) supaya kontras dengan judul/tanggal yang putih.
        6) Tinggi foto gedung (hero) ditambah sedikit ke bawah —
           min-height hero__inner & hero__media dinaikkan, dan margin
           overlap fitur/informasi disesuaikan supaya tetap rapi.
    ============================================================
--}}
<section id="profil" class="rz-hero-scope">

    <style>
        :root {
            --rz-section-bg: url('{{ asset('img/profile.jpg') }}');
        }

        .rz-hero-scope,
        .rz-hero-scope *,
        .rz-hero-scope *::before,
        .rz-hero-scope *::after {
            box-sizing: border-box;
        }

        .rz-hero-scope {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
        }

        .rz-hero-scope h1,
        .rz-hero-scope h2,
        .rz-hero-scope h3,
        .rz-hero-scope h4,
        .rz-hero-scope p,
        .rz-hero-scope ul {
            margin: 0;
            padding: 0;
        }

        .rz-hero-scope ul {
            list-style: none;
        }

        .rz-hero-scope a {
            text-decoration: none;
            color: inherit;
        }

        .rz-hero-scope button {
            font: inherit;
            border: none;
            background: none;
            cursor: pointer;
            color: inherit;
        }

        .rz-hero-scope img {
            max-width: 100%;
            display: block;
        }

        html {
            scroll-behavior: smooth;
        }

        [x-cloak] {
            display: none !important;
        }

        /* ================= HERO ================= */
        .rz-hero {
            position: relative;
            overflow: hidden;
            background: #F4F8F7;
        }

        .rz-hero__bg-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .rz-hero__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(100deg, rgba(244, 248, 247, .92) 0%, rgba(244, 248, 247, .55) 42%, rgba(244, 248, 247, .22) 75%, rgba(244, 248, 247, .12) 100%);
        }

        /* ---- foto gedung ditambah tinggi sedikit (min-height dinaikkan) ---- */
        .rz-hero__inner {
            position: relative;
            z-index: 3;
            max-width: 1240px;
            margin: 0 auto;
            padding: 10px 20px 54px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            align-items: center;
            min-height: 300px;
        }

        @media (min-width: 992px) {
            .rz-hero__inner {
                grid-template-columns: 1.15fr .85fr;
                padding-top: 12px;
                min-height: 345px;
            }
        }

        .rz-hero__text {
            max-width: 580px;
        }

        .rz-hero__badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 7px 16px 7px 7px;
            border-radius: 999px;
            background: #fff;
            border: 1px solid #A7F3D0;
            color: #0D9488;
            font-size: 12.5px;
            font-weight: 700;
            letter-spacing: .01em;
            box-shadow: 0 6px 16px rgba(15, 23, 42, .08);
        }

        .rz-hero__badge-dot {
            width: 20px;
            height: 20px;
            border-radius: 999px;
            background: #0D9488;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            flex-shrink: 0;
        }

        .rz-hero__title {
            margin-top: 14px;
            font-weight: 800;
            line-height: 1.06;
            letter-spacing: -.02em;
            font-size: clamp(2.1rem, 4.6vw, 3.2rem);
        }

        .rz-hero__title .rz-t1 {
            color: #0f172a;
            display: block;
        }

        .rz-hero__title .rz-t2 {
            color: #0D9488;
            display: block;
        }

        .rz-hero__lead {
            margin-top: 12px;
            color: #475569;
            font-weight: 500;
            font-size: clamp(.95rem, 1.6vw, 1.05rem);
            line-height: 1.55;
            max-width: 480px;
        }

        .rz-hero__actions {
            margin-top: 22px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .rz-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            height: 44px;
            padding: 0 18px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 13.5px;
            white-space: nowrap;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
        }

        .rz-btn--primary {
            background: #0D9488;
            color: #fff;
            box-shadow: 0 10px 22px rgba(15, 110, 86, .28);
        }

        .rz-btn--primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(15, 110, 86, .34);
        }

        .rz-btn--outline {
            background: #fff;
            color: #334155;
            border: 1.5px solid #E2E8F0;
        }

        .rz-btn--outline:hover {
            transform: translateY(-2px);
            border-color: #0D9488;
            color: #0D9488;
            box-shadow: 0 10px 20px rgba(15, 23, 42, .08);
        }

        /* ---- kartu IGD statis mengambang di kanan atas foto ---- */
        .rz-hero__media {
            position: relative;
            height: 100%;
            min-height: 350px;
        }

        .rz-hero__igd-card {
            position: absolute;
            right: 4px;
            bottom: 88px;
            z-index: 6;
            width: 230px;
            background: #fff;
            border-radius: 16px;
            padding: 12px;
            box-shadow: 0 20px 44px rgba(15, 23, 42, .18);
        }

        @media (max-width: 991px) {
            .rz-hero__igd-card {
                position: static;
                width: 100%;
                margin-top: 8px;
            }
        }

        .rz-hero__igd-head {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rz-hero__igd-icon {
            width: 40px;
            height: 40px;
            border-radius: 999px;
            background: #0D9488;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .rz-hero__igd-title {
            font-size: 14.5px;
            font-weight: 800;
            color: #0f172a;
        }

        .rz-hero__igd-sub {
            font-size: 11.5px;
            color: #64748b;
            margin-top: 1px;
        }

        .rz-hero__igd-desc {
            margin-top: 12px;
            font-size: 12.5px;
            color: #475569;
            line-height: 1.55;
        }

        .rz-hero__igd-link {
            margin-top: 12px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 700;
            color: #0D9488;
        }

        /* ================= 4 FITUR ================= */
        /* ---- baris 4 fitur: MENGAMBANG, overlap ke foto ---- */
        .rz-features {
            position: relative;
            z-index: 8;
            max-width: 1180px;
            margin: -66px auto 4px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(14px);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, .6);

            /* Hanya shadow yang diubah */
            box-shadow: 0 4px 14px rgba(15, 23, 42, .06);

            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        @media (min-width: 768px) {
            .rz-features {
                grid-template-columns: repeat(4, 1fr);
                gap: 16px;
                padding: 12px 20px;
                margin-top: -84px;
            }
        }

        @media (max-width: 767px) {
            .rz-features {
                margin-top: -50px;
            }
        }

        .rz-feature {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .rz-feature__icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #ECFDF5;
            color: #0D9488;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
        }

        .rz-feature__title {
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
        }

        .rz-feature__sub {
            font-size: 11.5px;
            color: #64748b;
        }

        /* ================= INFORMASI TERKINI ================= */
        .rz-info {
            position: relative;
            z-index: 4;
            max-width: 1240px;
            margin: 0 auto 10px;
            padding: 0 20px;
        }

        .rz-info__panel {
            background: #fff;
            border-radius: 22px;
            padding: 14px 16px;
            box-shadow: 0 14px 36px rgba(15, 23, 42, .06);
            border: 1px solid #eef1f4;
        }

        .rz-info__head {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .rz-info__title {
            font-size: 17px;
            font-weight: 800;
            color: #0f172a;
        }

        .rz-info__sub {
            font-size: 12.5px;
            color: #64748b;
            margin-top: 2px;
        }

        .rz-info__tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .rz-info__tab {
            padding: 7px 15px;
            border-radius: 999px;
            font-size: 12.5px;
            font-weight: 600;
            color: #475569;
            background: #f1f5f9;
        }

        .rz-info__tab.rz-tab-active {
            background: #0D9488;
            color: #fff;
        }

        .rz-info__more {
            font-size: 12.5px;
            font-weight: 700;
            color: #0D9488;
            white-space: nowrap;
        }

        /* solid 4 item (2 PKRS + 2 Berita) → grid 4 kolom tetap, width menyesuaikan panel. */
        .rz-info__grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 12px;
        }

        @media (min-width: 640px) {
            .rz-info__grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .rz-info__item {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            background: #f1f5f9;
            transition: transform .2s, box-shadow .2s;
        }

        .rz-info__item:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 26px rgba(15, 23, 42, .1);
        }

        /* tinggi kartu dikurangi ± separuh: aspect-ratio 4/3 → 8/3 */
        .rz-info__thumb {
            position: relative;
            aspect-ratio: 8 / 3;
            background: #f1f5f9;
        }

        .rz-info__thumb img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .rz-info__fallback {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ECFDF5;
            color: #6ee7b7;
            font-size: 20px;
        }

        .rz-info__badge {
            position: absolute;
            top: 8px;
            left: 8px;
            padding: 4px 9px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: #fff;
            z-index: 3;
        }

        /* judul/tanggal/CTA jadi overlay di atas gambar (bukan section terpisah) */
        .rz-info__overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0) 42%, rgba(15, 23, 42, .85) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 8px 10px 9px;
        }

        .rz-info__date {
            font-size: 9px;
            color: rgba(255, 255, 255, .75);
        }

        .rz-info__item-title {
            margin-top: 3px;
            font-size: 11.5px;
            font-weight: 700;
            color: #fff;
            line-height: 1.28;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* "Baca Selengkapnya" dibedakan warnanya — hijau, bukan putih lagi */
        .rz-info__cta {
            margin-top: 4px;
            font-size: 10px;
            font-weight: 700;
            color: #34D399;
        }

        /* =========================================================
        STATISTIK / KPI
        ========================================================= */

        .rz-stats {
            position: relative;
            z-index: 5;
            max-width: 1240px;
            margin: 0 auto 4px;
            padding: 0 20px;
        }


        /* ================= PANEL ================= */

        .rz-stats__panel {
            width: 100%;
            background: rgba(255, 255, 255, 0.97);

            border: 1px solid #e8eef0;
            border-radius: 22px;

            padding: 18px 20px;

            box-shadow:
                0 10px 30px rgba(15, 23, 42, 0.06);

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            align-items: stretch;
        }


        /* ================= ITEM ================= */

        .rz-stat {
            position: relative;

            min-width: 0;

            display: flex;
            align-items: center;

            gap: 14px;

            padding: 8px 24px;
        }


        /* Separator antar statistik */

        .rz-stat:not(:last-child)::after {
            content: "";

            position: absolute;

            top: 50%;
            right: 0;

            width: 1px;
            height: 52px;

            background: #dbe4e6;

            transform: translateY(-50%);
        }


        /* ================= ICON ================= */

        .rz-stat__icon-wrap {
            width: 58px;
            height: 58px;

            flex: 0 0 58px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #ecf9f6;

            border: 1px solid #d5f1eb;
        }


        .rz-stat__icon {
            color: #0d9488;

            font-size: 25px;

            line-height: 1;
        }


        /* ================= CONTENT ================= */

        .rz-stat__content {
            min-width: 0;
        }


        /* Judul */

        .rz-stat__value-title {
            margin-bottom: 4px;

            font-size: 14px;
            font-weight: 700;

            line-height: 1.25;

            color: #0f172a;

            white-space: nowrap;
        }


        /* ================= HASIL ================= */

        .rz-stat__result {
            display: flex;
            align-items: center;

            gap: 8px;

            min-height: 29px;
        }


        /* Angka utama */

        .rz-stat__number {
            font-size: 26px;
            font-weight: 800;

            line-height: 1;

            letter-spacing: -0.5px;

            color: #0d9488;
        }


        /* Unit */

        .rz-stat__unit {
            font-size: 13px;
            font-weight: 500;

            color: #64748b;
        }


        /* ================= BADGE ================= */

        .rz-stat__badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 4px 9px;

            border-radius: 6px;

            background: #d9f7e5;

            color: #16803c;

            font-size: 11px;
            font-weight: 800;

            line-height: 1;
        }


        /* ================= GOOGLE STAR ================= */

        .rz-stat__stars {
            display: inline-flex;

            align-items: center;

            gap: 2px;

            margin-left: 2px;
        }

        .rz-stat__stars i {
            color: #f5b82e;

            font-size: 13px;
        }


        /* =========================================================
        TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .rz-stats {
                padding: 0 15px;
            }

            .rz-stats__panel {
                padding: 16px 10px;
            }

            .rz-stat {
                padding: 8px 14px;
                gap: 10px;
            }

            .rz-stat__icon-wrap {
                width: 50px;
                height: 50px;

                flex-basis: 50px;
            }

            .rz-stat__icon {
                font-size: 21px;
            }

            .rz-stat__value-title {
                font-size: 12.5px;
            }

            .rz-stat__number {
                font-size: 22px;
            }

            .rz-stat__stars i {
                font-size: 11px;
            }
        }


        /* =========================================================
        MOBILE
        ========================================================= */

        @media (max-width: 767px) {

            .rz-stats {
                margin-bottom: 15px;
                padding: 0 12px;
            }

            .rz-stats__panel {
                grid-template-columns: repeat(2, 1fr);

                padding: 14px 8px;

                gap: 4px 0;

                border-radius: 18px;
            }

            .rz-stat {
                padding: 12px 10px;

                gap: 9px;
            }

            /* separator vertikal */
            .rz-stat:nth-child(odd)::after {
                display: block;
            }

            .rz-stat:nth-child(even)::after {
                display: none;
            }

            /* separator horizontal */
            .rz-stat:nth-child(-n+2)::before {
                display: none;
            }

            .rz-stat:nth-child(n+3)::before {
                content: "";

                position: absolute;

                top: 0;
                left: 10%;

                width: 80%;
                height: 1px;

                background: #e5edef;
            }

            .rz-stat__icon-wrap {
                width: 44px;
                height: 44px;

                flex: 0 0 44px;
            }

            .rz-stat__icon {
                font-size: 19px;
            }

            .rz-stat__value-title {
                font-size: 11.5px;

                white-space: normal;
            }

            .rz-stat__number {
                font-size: 20px;
            }

            .rz-stat__badge {
                font-size: 9px;
                padding: 3px 6px;
            }

            .rz-stat__unit {
                font-size: 11px;
            }

            .rz-stat__stars {
                gap: 1px;
            }

            .rz-stat__stars i {
                font-size: 9px;
            }
        }


        /* =========================================================
        MOBILE SANGAT KECIL
        ========================================================= */

        @media (max-width: 420px) {

            .rz-stat {
                padding: 10px 6px;
                gap: 7px;
            }

            .rz-stat__icon-wrap {
                width: 39px;
                height: 39px;

                flex-basis: 39px;
            }

            .rz-stat__icon {
                font-size: 17px;
            }

            .rz-stat__value-title {
                font-size: 10.5px;
            }

            .rz-stat__number {
                font-size: 18px;
            }

            .rz-stat__badge {
                font-size: 8px;
            }
        }
    </style>

    {{-- ===== HERO ===== --}}
    <div class="rz-hero">
        <img src="{{ asset('img/profile.jpg') }}" class="rz-hero__bg-img" alt="RSUD AR ROZY" onerror="this.style.display='none'">
        <div class="rz-hero__overlay"></div>

        <div class="rz-hero__inner">

            <div class="rz-hero__text">
                <span class="rz-hero__badge">
                    <span class="rz-hero__badge-dot"><i class="fa-solid fa-plus"></i></span>
                    IGD 24 Jam
                </span>

                <h1 class="rz-hero__title">
                    <span class="rz-t1">Kesehatan Anda,</span>
                    <span class="rz-t2">Prioritas Kami</span>
                </h1>

                <p class="rz-hero__lead">
                    Melayani Sepenuh Hati, Inti Kesuksesan Kami
                </p>

                <div class="rz-hero__actions">
                    <a href="#poliklinik"
                        class="rz-btn rz-btn--primary"
                        style="color: #fff !important;">
                        <i class="fa-solid fa-user-doctor" style="color: #fff !important;"></i>
                        {{ __('messages.find_doctor') }}
                    </a>

                    @foreach ([
                    ['icon' => 'fa-table-columns', 'label' => __('messages.dashboard'), 'href' => '/dashboard'],
                    ['icon' => 'fa-newspaper', 'label' => __('messages.news'), 'href' => route('news')],
                    ['icon' => 'fa-file-shield', 'label' => __('messages.ppid'), 'href' => 'ppid'],
                    ] as $link)
                    <a href="{{ $link['href'] }}" class="rz-btn rz-btn--outline">
                        <i class="fa-solid {{ $link['icon'] }}"></i>
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="rz-hero__media">
                {{-- kartu statis, bukan slider — sesuai gambar. Ganti href kalau punya anchor/halaman IGD sendiri --}}
                <div class="rz-hero__igd-card">
                    <div class="rz-hero__igd-head">
                        <div class="rz-hero__igd-icon"><i class="fa-solid fa-plus"></i></div>
                        <div>
                            <div class="rz-hero__igd-title">IGD 24 JAM</div>
                            <div class="rz-hero__igd-sub">Siap Melayani</div>
                        </div>
                    </div>
                    <p class="rz-hero__igd-desc">
                        Layanan gawat darurat kami siap 24 jam untuk Anda dan keluarga.
                    </p>
                    <a href="tel:0335421118" class="rz-hero__igd-link">
                        Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- ===== 4 FITUR ===== --}}
    <div class="rz-features">
        <div class="rz-feature">
            <div class="rz-feature__icon"><i class="fa-solid fa-truck-medical"></i></div>
            <div>
                <div class="rz-feature__title">IGD 24 Jam</div>
                <div class="rz-feature__sub">Siap Melayani Setiap Saat</div>
            </div>
        </div>
        <div class="rz-feature">
            <div class="rz-feature__icon"><i class="fa-solid fa-user-doctor"></i></div>
            <div>
                <div class="rz-feature__title">Tenaga Medis Profesional</div>
                <div class="rz-feature__sub">30+ Dokter &amp; Tenaga Kesehatan Berpengalaman</div>
            </div>
        </div>
        <div class="rz-feature">
            <div class="rz-feature__icon"><i class="fa-solid fa-building"></i></div>
            <div>
                <div class="rz-feature__title">Fasilitas Modern</div>
                <div class="rz-feature__sub">Kamar KRIS &amp; Alkes Modern</div>
            </div>
        </div>
        <div class="rz-feature">
            <div class="rz-feature__icon"><i class="fa-solid fa-award rz-stat__icon"></i></div>
            <div>
                <div class="rz-feature__title">Layanan Terpercaya</div>
                <div class="rz-feature__sub">Terakreditasi PARIPURNA</div>
            </div>
        </div>
    </div>

    <!-- ================= STATISTIK ================= -->
    <div class="rz-stats">
        <div class="rz-stats__panel">

            <!-- IKM -->
            <div class="rz-stat">
                <div class="rz-stat__icon-wrap">
                    <i class="fa-solid fa-face-smile rz-stat__icon"></i>
                </div>

                <div class="rz-stat__content">
                    <div class="rz-stat__value-title">
                        IKM TW II 2026
                    </div>

                    <div class="rz-stat__result">
                        <span class="rz-stat__number">87,23</span>
                        <span class="rz-stat__badge">BAIK</span>
                    </div>
                </div>
            </div>


            <!-- INDIKATOR MUTU -->
            <div class="rz-stat">
                <div class="rz-stat__icon-wrap">
                    <i class="fa-solid fa-chart-line rz-stat__icon"></i>
                </div>

                <div class="rz-stat__content">
                    <div class="rz-stat__value-title">
                        Nilai Indikator Mutu 2025
                    </div>

                    <div class="rz-stat__result">
                        <span class="rz-stat__number">78,34</span>
                    </div>
                </div>
            </div>


            <!-- DURASI RAWAT JALAN -->
            <div class="rz-stat">
                <div class="rz-stat__icon-wrap">
                    <i class="fa-solid fa-clock rz-stat__icon"></i>
                </div>

                <div class="rz-stat__content">
                    <div class="rz-stat__value-title">
                        Durasi Rata2 Rawat Jalan
                    </div>

                    <div class="rz-stat__result">
                        <span class="rz-stat__number">39,7</span>
                        <span class="rz-stat__unit">menit</span>
                    </div>
                </div>
            </div>


            <!-- GOOGLE REVIEW -->
            <div class="rz-stat">
                <div class="rz-stat__icon-wrap">
                    <i class="fa-solid fa-star rz-stat__icon"></i>
                </div>

                <div class="rz-stat__content">
                    <div class="rz-stat__value-title">
                        Google Review
                    </div>

                    <div class="rz-stat__result">
                        <span class="rz-stat__number">{{ config('hospital.google_review_rating') }}</span>

                        <span class="rz-stat__stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ===== INFORMASI TERKINI — SOLID 4: 2 PKRS terbaru + 2 Berita terbaru ===== --}}
    @php
    $infoItems = collect();

    // ---- 2 Berita terbaru ----
    foreach (($latestNews ?? collect())->take(2) as $n) {
    $infoItems->push((object) [
    'type' => 'berita',
    'label' => 'Berita',
    'badge_bg' => '#0D9488',
    'title' => $n->title,
    'thumbnail_url' => $n->images->first()?->image_url ?? $n->thumbnail_url ?? null,
    'published_at' => $n->published_at,
    'url' => \Illuminate\Support\Facades\Route::has('news.show') ? route('news.show', $n->slug) : url('/news/' . $n->slug),
    ]);
    }

    // ---- 2 PKRS terbaru — thumbnail pakai logic PERSIS seperti di HomeController ----
    foreach (($latestPkrsPosts ?? collect())->take(2) as $p) {
    $pkrsImage = null;

    if (!empty($p->thumbnail)) {
    $pkrsImage = $p->thumbnail_url;
    } elseif (!empty($p->video_cover)) {
    $pkrsImage = $p->video_cover_url;
    }

    $infoItems->push((object) [
    'type' => 'pkrs',
    'label' => 'PKRS',
    'badge_bg' => '#2563EB',
    'title' => $p->title,
    'thumbnail_url' => $pkrsImage,
    'published_at' => $p->published_at,
    // DIPERBAIKI: halaman PKRS itu single-page (list + popup kategori + popup
    // detail via JS), tidak ada route detail terpisah "pkrs.show" — makanya
    // sebelumnya 404. Ini arahkan ke index /pkrs dengan ?post={id}, sesuai
    // mekanisme auto-open ($post di controller -> data-auto-open-post di JS)
    // yang sudah dipakai di halaman PKRS itu sendiri.
    // SESUAIKAN nama query param "post" ini kalau controller kamu membaca
    // parameter dengan nama lain.
    'url' => (\Illuminate\Support\Facades\Route::has('pkrs') ? route('pkrs') : url('/pkrs')) . '?post=' . $p->id,
    ]);
    }

    // urutan tampil: tetap diurutkan dari yang paling baru (komposisinya tetap solid 2+2)
    $infoItems = $infoItems->sortByDesc('published_at')->values();
    @endphp

    @if ($infoItems->count() > 0)
    <div class="rz-info" x-data="{ tab: 'semua' }">
        <div class="rz-info__panel">

            <div class="rz-info__head">
                <div>
                    <div class="rz-info__title">Informasi Terkini</div>
                    <div class="rz-info__sub">Informasi terbaru dari RSUD Ar Rozy</div>
                </div>

                <div class="rz-info__tabs">
                    <button type="button" @click="tab='semua'" class="rz-info__tab" :class="tab==='semua' ? 'rz-tab-active' : ''">Semua</button>
                    <button type="button" @click="tab='berita'" class="rz-info__tab" :class="tab==='berita' ? 'rz-tab-active' : ''">Berita</button>
                    <button type="button" @click="tab='pkrs'" class="rz-info__tab" :class="tab==='pkrs' ? 'rz-tab-active' : ''">PKRS</button>
                </div>

                <a href="{{ route('news') }}" class="rz-info__more">Lihat Semua</a>
            </div>

            <div class="rz-info__grid">
                @foreach ($infoItems as $item)
                <a href="{{ $item->url }}" class="rz-info__item" x-show="tab==='semua' || tab==='{{ $item->type }}'">
                    <div class="rz-info__thumb">
                        @if ($item->thumbnail_url)
                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" loading="lazy">
                        @else
                        <div class="rz-info__fallback"><i class="fa-regular fa-newspaper"></i></div>
                        @endif
                        <span class="rz-info__badge" style="background: {{ $item->badge_bg }};">{{ $item->label }}</span>
                        <div class="rz-info__overlay">
                            <div class="rz-info__date">
                                {{ optional($item->published_at)->translatedFormat('d M Y') }}
                            </div>
                            <div class="rz-info__item-title">{{ $item->title }}</div>
                            <div class="rz-info__cta">
                                Baca Selengkapnya
                                <i class="fa-solid fa-arrow-right" style="margin-left:2px;"></i>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>
    @endif

</section>

<section id="about" class="md:py-24 py-15 bg-gradient-to-b from-gray-50 to-white" style="font-family:'Plus Jakarta Sans','Inter',system-ui,-apple-system,sans-serif;">

    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <!-- Header -->
        <div class="text-center mb-14">

            <div
                class="mt-4 w-24 h-1.5
                       mx-auto
                       rounded-full"
                style="background-image: linear-gradient(to right, #0D9488, #0f766e) !important;">
            </div>

        </div>

        <!-- Tentang -->
        <div class="flex items-center justify-center gap-3 mb-5">

            <div
                class="
                            w-12 h-12
                            rounded-2xl
                            flex items-center justify-center
                        "
                style="background-color: #ECFDF5 !important;">

                <i class="fa-solid fa-hospital text-xl" style="color: #0D9488 !important;"></i>

            </div>


            <h3 class="text-xl md:text-2xl font-bold" style="color: #0f172a !important;">
                Tentang RSUD Ar Rozy
            </h3>

        </div>

        <p
            class="
                        text-base md:text-lg
                        leading-relaxed
                        text-center
                        max-w-4xl
                        mx-auto
                    "
            style="color: #475569 !important;">

            <strong style="color: #0f172a !important;">
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
                            flex items-center justify-center
                        "
                        style="background-color: #ECFDF5 !important;">

                        <i class="fa-solid fa-eye text-xl" style="color: #0D9488 !important;"></i>

                    </div>


                    <h3 class="text-xl md:text-2xl font-bold" style="color: #0f172a !important;">
                        Visi
                    </h3>

                </div>


                <!-- Isi di tengah -->
                <div class="flex-1 flex">

                    <p
                        class="
                                text-base md:text-lg
                                leading-relaxed
                                max-w-md
                                text-center
                            "
                        style="color: #475569 !important;">

                        <strong style="color: #0f172a !important;">
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
                            flex items-center justify-center
                        "
                        style="background-color: #ECFDF5 !important;">

                        <i class="fa-solid fa-bullseye text-xl" style="color: #0D9488 !important;"></i>

                    </div>


                    <h3 class="text-xl md:text-2xl font-bold" style="color: #0f172a !important;">
                        Misi
                    </h3>

                </div>



                <ol class="space-y-4 md:space-y-5 text-base md:text-lg leading-relaxed" style="color: #475569 !important;">

                    <li class="flex items-start gap-4">

                        <span
                            class="
                                    mt-2
                                    w-3 h-3
                                    rounded-full
                                    flex-shrink-0
                                    shadow-md
                                "
                            style="background-color: #0D9488 !important; box-shadow: 0 4px 10px rgba(13,148,136,.35);">
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
                                        flex-shrink-0
                                        shadow-md
                                    "
                            style="background-color: #0D9488 !important; box-shadow: 0 4px 10px rgba(13,148,136,.35);">
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
                                flex-shrink-0
                                shadow-md
                            "
                            style="background-color: #0D9488 !important; box-shadow: 0 4px 10px rgba(13,148,136,.35);">
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

<section id="igd" class="py-20 bg-gray-50" style="font-family:'Plus Jakarta Sans','Inter',system-ui,-apple-system,sans-serif;">

    <style>
        .rz-igd-btn-rawatinap:hover {
            color: #0D9488 !important;
        }
    </style>

    <div class="max-w-full mx-auto px-6">

        <!-- Judul Section -->
        <div class="text-center mb-10">
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight" style="color: #0f172a !important;">
                IGD & Rawat Inap
            </h2>
            <p class="mt-4 text-lg" style="color: #64748b !important;">
                Pelayanan cepat, profesional, dan penuh kepedulian
            </p>
            <div class="mt-4 w-24 h-1 mx-auto rounded-full" style="background-image: linear-gradient(to right, #0D9488, #0f766e) !important;"></div>
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
                   hover:border-white
                   hover:-translate-y-0.5
                   rz-igd-btn-rawatinap">

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

<section id="poliklinik" class="rz-poliklinik py-16 bg-white"
    style="font-family:'Plus Jakarta Sans','Inter',system-ui,-apple-system,sans-serif;">

    <div class="max-w-6xl mx-auto px-4">

        <!-- =====================================================
             JUDUL SECTION
        ====================================================== -->

        <div class="text-center mb-8">

            <h2 class="rz-poliklinik-title text-4xl md:text-5xl font-bold tracking-tight">
                Rawat Jalan 🩺
            </h2>

            <p class="rz-poliklinik-subtitle mt-4 text-lg">
                Langkah Kecil Hari Ini, Sehat Esok Hari.
            </p>

            <div class="mt-4 w-24 h-1 mx-auto rounded-full" style="background-image: linear-gradient(to right, #0D9488, #0f766e) !important;"></div>

        </div>


        <!-- =====================================================
             FILTER
        ====================================================== -->

        <div class="mb-8">

            <div class="rz-filter-card max-w-5xl mx-auto
                        rounded-3xl
                        p-5 md:p-7">

                <!-- Header Filter -->
                <div class="flex items-center gap-3 mb-6">

                    <div class="rz-filter-icon
                                flex items-center justify-center
                                w-11 h-11
                                rounded-2xl">

                        <i class="fas fa-filter text-base"></i>

                    </div>

                    <div>

                        <h3 class="rz-filter-title text-base md:text-lg font-bold">
                            Temukan Dokter
                        </h3>

                        <p class="rz-filter-subtitle text-xs md:text-sm mt-0.5">
                            Pilih dokter atau poliklinik yang ingin Anda cari
                        </p>

                    </div>

                </div>


                <!-- =================================================
                     FILTER SELECT
                ================================================== -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <select
                        id="filterDokter"
                        class="rz-filter-select
                            appearance-none
                            [-webkit-appearance:none]
                            [-moz-appearance:none]
                            w-full
                            rounded-2xl
                            px-4 py-3.5 pr-11
                            text-sm
                            font-medium
                            outline-none
                            transition-all duration-200">

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
                        class="rz-filter-select
                            appearance-none
                            [-webkit-appearance:none]
                            [-moz-appearance:none]
                            w-full
                            rounded-2xl
                            px-4 py-3.5 pr-11
                            text-sm
                            font-medium
                            outline-none
                            transition-all duration-200">

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
                    class="mt-6 pt-5
                           border-t border-gray-100
                           flex flex-col sm:flex-row
                           items-center justify-between
                           gap-3">

                    <div
                        id="filterResultInfo"
                        class="flex items-center gap-2 text-sm rz-result-info">

                        <span
                            class="rz-result-icon
                                   flex items-center justify-center
                                   w-8 h-8
                                   rounded-xl">

                            <i class="fas fa-user-doctor text-xs"></i>

                        </span>

                        <span>

                            Menampilkan

                            <span
                                id="filterResultCount"
                                class="font-bold rz-result-count">

                                {{ $rawatJalan->count() }}

                            </span>

                            dokter

                        </span>

                    </div>


                    <!-- Reset -->
                    <button
                        type="button"
                        id="resetDoctorFilter"
                        class="rz-reset-btn
                               inline-flex items-center gap-2
                               px-4 py-2
                               rounded-xl
                               text-xs font-semibold
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

            <h3 class="rz-empty-title text-xl font-bold">
                Dokter tidak ditemukan
            </h3>

            <p class="rz-empty-sub mt-2">
                Tidak ada dokter yang sesuai dengan filter yang dipilih.
            </p>

            <button
                type="button"
                id="resetDoctorFilter"
                class="rz-empty-reset mt-6 inline-flex items-center
                       px-5 py-2.5 rounded-xl
                       text-white text-sm font-semibold
                       transition">

                Reset Filter

            </button>

        </div>

    </div>


    <!-- =========================================================
         STYLE KHUSUS POLIKLINIK
         Dibuat scoped agar tidak mudah ditimpa CSS global
    ========================================================== -->

    <style>
        /* ===============================
           ROOT SECTION
        =============================== */

        #poliklinik.rz-poliklinik {
            font-family:
                'Plus Jakarta Sans',
                'Inter',
                system-ui,
                -apple-system,
                sans-serif;
        }


        /* ===============================
           JUDUL
        =============================== */

        #poliklinik .rz-poliklinik-title {
            color: #0f172a !important;
        }

        #poliklinik .rz-poliklinik-subtitle {
            color: #64748b !important;
        }


        /* ===============================
           FILTER CARD
        =============================== */

        #poliklinik .rz-filter-card {
            background: #ffffff !important;

            border: 1px solid #eef1f4 !important;

            box-shadow:
                0 10px 40px rgba(15, 23, 42, .06) !important;
        }


        /* ===============================
           ICON FILTER
        =============================== */

        #poliklinik .rz-filter-icon {
            background: #ECFDF5 !important;
            color: #0D9488 !important;
        }

        #poliklinik .rz-filter-icon i {
            color: #0D9488 !important;
        }


        /* ===============================
           HEADER FILTER
        =============================== */

        #poliklinik .rz-filter-title {
            color: #0f172a !important;
        }

        #poliklinik .rz-filter-subtitle {
            color: #64748b !important;
        }


        /* ===============================
           SELECT
        =============================== */

        #poliklinik .rz-filter-select {
            background-color: #f8fafc !important;

            border: 1px solid #e2e8f0 !important;

            color: #334155 !important;
        }


        /* Placeholder / option */

        #poliklinik .rz-filter-select option {
            background: #ffffff !important;
            color: #334155 !important;
        }


        /* Hover */

        #poliklinik .rz-filter-select:hover {
            background-color: #ffffff !important;
            border-color: rgba(13, 148, 136, .40) !important;
        }


        /* Focus */

        #poliklinik .rz-filter-select:focus {
            background-color: #ffffff !important;

            border-color: #0D9488 !important;

            box-shadow:
                0 0 0 4px rgba(13, 148, 136, .15) !important;

            outline: none !important;
        }


        /* ===============================
           HASIL FILTER
        =============================== */

        #poliklinik .rz-result-info {
            color: #64748b !important;
        }

        #poliklinik .rz-result-icon {
            background: #ECFDF5 !important;
            color: #0D9488 !important;
        }

        #poliklinik .rz-result-icon i {
            color: #0D9488 !important;
        }

        #poliklinik .rz-result-count {
            color: #0f172a !important;
        }


        /* ===============================
           RESET FILTER
        =============================== */

        #poliklinik .rz-reset-btn {
            color: #64748b !important;
            background: #f8fafc !important;
        }

        #poliklinik .rz-reset-btn:hover {
            background: #ECFDF5 !important;
            color: #0D9488 !important;
        }


        /* ===============================
           EMPTY STATE
        =============================== */

        #poliklinik .rz-empty-title {
            color: #0f172a !important;
        }

        #poliklinik .rz-empty-sub {
            color: #64748b !important;
        }

        #poliklinik .rz-empty-reset {
            background: #0D9488 !important;
            color: #ffffff !important;
        }

        #poliklinik .rz-empty-reset:hover {
            background: #0f766e !important;
        }


        /* ===============================
           RESPONSIVE
        =============================== */

        @media (max-width: 767px) {

            #poliklinik .rz-filter-card {
                box-shadow:
                    0 6px 24px rgba(15, 23, 42, .05) !important;
            }

        }
    </style>

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

<section id="penunjang" class="py-12 bg-white" style="font-family:'Plus Jakarta Sans','Inter',system-ui,-apple-system,sans-serif;">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Judul Section -->
        <div class="text-center mb-24 mt-20">
            <h2 class="text-4xl md:text-3xl font-bold tracking-tight" style="color: #0f172a !important;">
                Pelayanan Penunjang 🩺❤
            </h2>

            <p class="mt-4 text-lg" style="color: #64748b !important;">
                Setiap Detail untuk Kesembuhan Anda.
            </p>

            <div class="mt-4 w-24 h-1 mx-auto rounded-full" style="background-image: linear-gradient(to right, #0D9488, #0f766e) !important;"></div>
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

<section id="rawat-inap" class="relative py-16 md:py-24 bg-white overflow-hidden" style="font-family:'Plus Jakarta Sans','Inter',system-ui,-apple-system,sans-serif;">

    <div class="max-w-6xl mx-auto px-4"
        style="font-family:'Plus Jakarta Sans','Inter',system-ui,-apple-system,sans-serif;">

        <!-- =================================================
         BANNER FASILITAS
            ================================================== -->

        <div
            class="relative
                w-full
                h-[300px] sm:h-[360px] md:h-[440px] lg:h-[500px]
                rounded-[2rem]
                overflow-hidden"
            style="box-shadow:0 8px 24px rgba(15,23,42,0.08);">

            <img
                src="{{ asset('img/leaflet/2.png') }}"
                alt="Fasilitas Rawat Inap RSUD Ar Rozy"
                class="absolute inset-0 w-full h-full object-cover">

            <div
                class="absolute inset-0
                        bg-gradient-to-t
                        from-black/80
                        via-black/35
                        to-black/5">
            </div>

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
                        <span style="color:#5EEAD4 !important;">
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
                        uppercase"
                style="color:#0D9488 !important;">

                Pilihan Kamar

            </span>

            <h3
                class="mt-2
            text-3xl md:text-4xl
            font-extrabold"
                style="color:#0f172a !important;">

                Kelas Rawat Inap

            </h3>

            <p
                class="mt-3
            max-w-2xl
            mx-auto
            text-sm md:text-base"
                style="color:#64748b !important;">

                Pilih kelas kamar sesuai dengan kebutuhan
                dan kenyamanan Anda.

            </p>

            <div class="mt-4 w-24 h-1 mx-auto rounded-full" style="background-image: linear-gradient(to right, #0D9488, #0f766e) !important;"></div>

        </div>

    </div>

    <div
        class="max-w-6xl mx-auto px-4"
        style="font-family:'Plus Jakarta Sans','Inter',system-ui,-apple-system,sans-serif;">

        <!-- =================================================
         GRID CARD KAMAR
         ================================================== -->

        <div
            class="grid
            grid-cols-1
            md:grid-cols-2
            lg:grid-cols-3
            gap-6 md:gap-7">


            <!-- =================================================
             VVIP
         ================================================== -->

            <div
                style="
                position:relative;
                background:#fff;
                border-radius:24px;
                border:1px solid #e6f4f2;
                box-shadow:0 8px 24px rgba(15,23,42,0.06);
                overflow:hidden;
                transition:all .3s ease;
            "
                class="group hover:-translate-y-1 hover:shadow-xl">

                <div
                    style="
                    position:relative;
                    height:224px;
                    overflow:hidden;
                ">

                    <img
                        src="{{ asset('img/leaflet/2.png') }}"
                        alt="Kamar VVIP"
                        style="
                        width:100%;
                        height:100%;
                        object-fit:cover;
                        transition:transform .7s ease;
                    "
                        class="group-hover:scale-105">

                    <div
                        style="
                        position:absolute;
                        inset:0;
                        background:linear-gradient(
                            to top,
                            rgba(0,0,0,0.8),
                            rgba(0,0,0,0.2) 50%,
                            transparent
                        );
                    ">
                    </div>

                    <!-- BADGE -->

                    <div
                        style="
                        position:absolute;
                        left:16px;
                        top:16px;
                        z-index:10;
                    ">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:8px;
                            padding:6px 14px;
                            border-radius:999px;
                            background:rgba(13,148,136,.92);
                            border:1px solid rgba(255,255,255,.25);
                            box-shadow:0 4px 12px rgba(0,0,0,.18);
                            font-size:10px;
                            font-weight:700;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:#fff;
                        ">

                            <span
                                style="
                                width:6px;
                                height:6px;
                                border-radius:50%;
                                background:#CCFBF1;
                                display:inline-block;
                            ">
                            </span>

                            VVIP

                        </span>

                    </div>


                    <!-- STATUS -->

                    <div
                        style="
                        position:absolute;
                        right:16px;
                        top:16px;
                        z-index:10;
                    ">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                            padding:6px 12px;
                            border-radius:999px;
                            background:rgba(255,255,255,.92);
                            color:#059669;
                            font-size:11px;
                            font-weight:700;
                            white-space:nowrap;
                            box-shadow:0 2px 8px rgba(0,0,0,.10);
                        ">

                            <span
                                style="
                                width:6px;
                                height:6px;
                                border-radius:50%;
                                background:#10b981;
                                display:inline-block;
                            ">
                            </span>

                            Tersedia

                        </span>

                    </div>


                    <!-- TITLE -->

                    <div
                        style="
                        position:absolute;
                        left:20px;
                        right:20px;
                        bottom:20px;
                        z-index:10;
                    ">

                        <span
                            style="
                            display:block;
                            font-size:11px;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:rgba(255,255,255,.75);
                            font-weight:500;
                        ">

                            Kamar Rawat Inap

                        </span>

                        <h4
                            style="
                            font-size:28px;
                            font-weight:800;
                            color:#fff;
                            line-height:1.2;
                            text-shadow:0 2px 8px rgba(0,0,0,.6);
                            margin:0;
                        ">

                            VVIP RAUDLOH

                        </h4>

                    </div>

                </div>


                <!-- CONTENT -->

                <div style="padding:24px;">

                    <!-- FASILITAS -->

                    <div
                        style="
                        display:flex;
                        align-items:center;
                        gap:12px;
                        margin-bottom:20px;
                        color:#64748b;
                        flex-wrap:wrap;
                        row-gap:8px;
                    ">

                        <span
                            style="
                            display:flex;
                            align-items:center;
                            gap:6px;
                            font-size:12px;
                            font-weight:500;
                        ">

                            <i
                                class="fas fa-couch"
                                style="
                                font-size:11px;
                                color:#0D9488;
                            ">
                            </i>

                            Ruang tunggu

                        </span>


                        <span
                            style="
                            width:4px;
                            height:4px;
                            border-radius:50%;
                            background:#cbd5e1;
                        ">
                        </span>


                        <span
                            style="
                            display:flex;
                            align-items:center;
                            gap:6px;
                            font-size:12px;
                            font-weight:500;
                        ">

                            <i
                                class="fas fa-tv"
                                style="
                                font-size:11px;
                                color:#0D9488;
                            ">
                            </i>

                            Smart TV

                        </span>


                        <span
                            style="
                            width:4px;
                            height:4px;
                            border-radius:50%;
                            background:#cbd5e1;
                        ">
                        </span>


                        <span
                            style="
                            display:flex;
                            align-items:center;
                            gap:6px;
                            font-size:12px;
                            font-weight:500;
                        ">

                            <i
                                class="fas fa-snowflake"
                                style="
                                font-size:11px;
                                color:#0D9488;
                            ">
                            </i>

                            AC

                        </span>

                    </div>


                    <!-- TARIF -->

                    <div>

                        <p
                            style="
                            font-size:10px;
                            text-transform:uppercase;
                            letter-spacing:.12em;
                            font-weight:700;
                            color:#0D9488;
                            margin:0;
                        ">

                            Tarif per malam

                        </p>

                        <p
                            style="
                            font-size:28px;
                            font-weight:800;
                            line-height:1;
                            color:#0f766e;
                            margin:6px 0 0;
                        ">

                            Rp 450.000

                        </p>

                    </div>


                    <div
                        style="
                        margin:20px 0;
                        border-top:1px solid #e6f4f2;
                    ">
                    </div>


                    <!-- BUTTON -->

                    <button
                        type="button"
                        data-open-room="vvip"
                        onclick="window.openRoomModal('vvip', event)"
                        style="
                        width:100%;
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:8px;
                        padding:14px 20px;
                        border-radius:16px;
                        font-size:14px;
                        font-weight:700;
                        transition:all .3s ease;
                        background:#0D9488;
                        border:1px solid #0D9488;
                        color:#fff;
                        cursor:pointer;
                    "
                        class="hover:bg-[#0f766e] hover:shadow-lg hover:-translate-y-0.5">

                        <span style="color:#fff;">
                            Lihat Selengkapnya
                        </span>

                        <i
                            class="fas fa-arrow-right"
                            style="
                            font-size:11px;
                            color:#fff;
                        ">
                        </i>

                    </button>

                </div>

            </div>


            <!-- =================================================
             VIP
         ================================================== -->

            <div
                style="
                position:relative;
                background:#fff;
                border-radius:24px;
                border:1px solid #e6f4f2;
                box-shadow:0 8px 24px rgba(15,23,42,.06);
                overflow:hidden;
                transition:all .3s ease;
            "
                class="group hover:-translate-y-1 hover:shadow-xl">

                <div
                    style="
                    position:relative;
                    height:224px;
                    overflow:hidden;
                ">

                    <img
                        src="{{ asset('img/leaflet/4.png') }}"
                        alt="Kamar VIP"
                        style="
                        width:100%;
                        height:100%;
                        object-fit:cover;
                        transition:transform .7s ease;
                    "
                        class="group-hover:scale-105">

                    <div
                        style="
                        position:absolute;
                        inset:0;
                        background:linear-gradient(
                            to top,
                            rgba(0,0,0,.8),
                            rgba(0,0,0,.2) 50%,
                            transparent
                        );
                    ">
                    </div>

                    <div
                        style="
                        position:absolute;
                        left:16px;
                        top:16px;
                        z-index:10;
                    ">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:8px;
                            padding:6px 14px;
                            border-radius:999px;
                            background:rgba(13,148,136,.92);
                            border:1px solid rgba(255,255,255,.25);
                            box-shadow:0 4px 12px rgba(0,0,0,.18);
                            font-size:10px;
                            font-weight:700;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:#fff;
                        ">

                            <span
                                style="
                                width:6px;
                                height:6px;
                                border-radius:50%;
                                background:#CCFBF1;
                            ">
                            </span>

                            VIP

                        </span>

                    </div>

                    <div
                        style="
                        position:absolute;
                        right:16px;
                        top:16px;
                        z-index:10;
                    ">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                            padding:6px 12px;
                            border-radius:999px;
                            background:rgba(255,255,255,.92);
                            color:#059669;
                            font-size:11px;
                            font-weight:700;
                            box-shadow:0 2px 8px rgba(0,0,0,.10);
                        ">

                            <span
                                style="
                                width:6px;
                                height:6px;
                                border-radius:50%;
                                background:#10b981;
                            ">
                            </span>

                            Tersedia

                        </span>

                    </div>

                    <div
                        style="
                        position:absolute;
                        left:20px;
                        right:20px;
                        bottom:20px;
                        z-index:10;
                    ">

                        <span
                            style="
                            display:block;
                            font-size:11px;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:rgba(255,255,255,.75);
                            font-weight:500;
                        ">

                            Kamar Rawat Inap

                        </span>

                        <h4
                            style="
                            font-size:28px;
                            font-weight:800;
                            color:#fff;
                            line-height:1.2;
                            margin:0;
                            text-shadow:0 2px 8px rgba(0,0,0,.6);
                        ">

                            VIP ZAM ZAM

                        </h4>

                    </div>

                </div>


                <div style="padding:24px;">

                    <div
                        style="
                        display:flex;
                        align-items:center;
                        gap:12px;
                        margin-bottom:20px;
                        color:#64748b;
                        flex-wrap:wrap;
                        row-gap:8px;
                    ">

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-snowflake" style="font-size:11px;color:#0D9488;"></i>
                            AC
                        </span>

                        <span style="width:4px;height:4px;border-radius:50%;background:#cbd5e1;"></span>

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-tv" style="font-size:11px;color:#0D9488;"></i>
                            TV
                        </span>

                        <span style="width:4px;height:4px;border-radius:50%;background:#cbd5e1;"></span>

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-shower" style="font-size:11px;color:#0D9488;"></i>
                            Kamar mandi
                        </span>

                        <span style="width:4px;height:4px;border-radius:50%;background:#cbd5e1;"></span>

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-box" style="font-size:11px;color:#0D9488;"></i>
                            Lemari
                        </span>

                    </div>

                    <div>

                        <p style="font-size:10px;text-transform:uppercase;letter-spacing:.12em;font-weight:700;color:#0D9488;margin:0;">
                            Tarif per malam
                        </p>

                        <p style="font-size:28px;font-weight:800;line-height:1;color:#0f766e;margin:6px 0 0;">
                            Rp 350.000
                        </p>

                    </div>

                    <div style="margin:20px 0;border-top:1px solid #e6f4f2;"></div>

                    <button
                        type="button"
                        data-open-room="vip"
                        onclick="window.openRoomModal('vip', event)"
                        style="
                        width:100%;
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:8px;
                        padding:14px 20px;
                        border-radius:16px;
                        font-size:14px;
                        font-weight:700;
                        background:#0D9488;
                        border:1px solid #0D9488;
                        color:#fff;
                        cursor:pointer;
                    "
                        class="hover:bg-[#0f766e] hover:shadow-lg hover:-translate-y-0.5">

                        <span style="color:#fff;">
                            Lihat Selengkapnya
                        </span>

                        <i class="fas fa-arrow-right" style="font-size:11px;color:#fff;"></i>

                    </button>

                </div>

            </div>


            <!-- =================================================
             KELAS 1,2,3
          ================================================== -->

            <div
                style="
                position:relative;
                background:#fff;
                border-radius:24px;
                border:1px solid #e6f4f2;
                box-shadow:0 8px 24px rgba(15,23,42,.06);
                overflow:hidden;
                transition:all .3s ease;
            "
                class="group hover:-translate-y-1 hover:shadow-xl">

                <div style="position:relative;height:224px;overflow:hidden;">

                    <img
                        src="{{ asset('img/leaflet/6.png') }}"
                        alt="Kamar Kelas 1,2,3"
                        style="width:100%;height:100%;object-fit:cover;transition:transform .7s ease;"
                        class="group-hover:scale-105">

                    <div
                        style="
                        position:absolute;
                        inset:0;
                        background:linear-gradient(
                            to top,
                            rgba(0,0,0,.8),
                            rgba(0,0,0,.2) 50%,
                            transparent
                        );
                    ">
                    </div>

                    <div style="position:absolute;left:16px;top:16px;z-index:10;">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:8px;
                            padding:6px 14px;
                            border-radius:999px;
                            background:rgba(13,148,136,.92);
                            border:1px solid rgba(255,255,255,.25);
                            box-shadow:0 4px 12px rgba(0,0,0,.18);
                            font-size:10px;
                            font-weight:700;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:#fff;
                        ">

                            <span style="width:6px;height:6px;border-radius:50%;background:#CCFBF1;"></span>

                            KELAS 1,2,3

                        </span>

                    </div>

                    <div style="position:absolute;right:16px;top:16px;z-index:10;">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                            padding:6px 12px;
                            border-radius:999px;
                            background:rgba(255,255,255,.92);
                            color:#059669;
                            font-size:11px;
                            font-weight:700;
                        ">

                            <span style="width:6px;height:6px;border-radius:50%;background:#10b981;"></span>

                            Tersedia

                        </span>

                    </div>

                    <div style="position:absolute;left:20px;right:20px;bottom:20px;z-index:10;">

                        <span
                            style="
                            display:block;
                            font-size:11px;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:rgba(255,255,255,.75);
                            font-weight:500;
                        ">

                            Kamar Rawat Inap

                        </span>

                        <h4
                            style="
                            font-size:28px;
                            font-weight:800;
                            color:#fff;
                            line-height:1.2;
                            margin:0;
                            text-shadow:0 2px 8px rgba(0,0,0,.6);
                        ">

                            KELAS 1,2,3

                        </h4>

                    </div>

                </div>


                <div style="padding:24px;">

                    <div
                        style="
                        display:flex;
                        align-items:center;
                        gap:12px;
                        margin-bottom:20px;
                        color:#64748b;
                        flex-wrap:wrap;
                        row-gap:8px;
                    ">

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-snowflake" style="font-size:11px;color:#0D9488;"></i>
                            AC
                        </span>

                        <span style="width:4px;height:4px;border-radius:50%;background:#cbd5e1;"></span>

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-tv" style="font-size:11px;color:#0D9488;"></i>
                            TV
                        </span>

                        <span style="width:4px;height:4px;border-radius:50%;background:#cbd5e1;"></span>

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-bed" style="font-size:11px;color:#0D9488;"></i>
                            Tempat Tidur
                        </span>

                        <span style="width:4px;height:4px;border-radius:50%;background:#cbd5e1;"></span>

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">
                            <i class="fas fa-box" style="font-size:11px;color:#0D9488;"></i>
                            Lemari
                        </span>

                    </div>

                    <div>

                        <p style="font-size:10px;text-transform:uppercase;letter-spacing:.12em;font-weight:700;color:#0D9488;margin:0;">
                            Tarif per malam
                        </p>

                        <p style="font-size:26px;font-weight:800;line-height:1;color:#0f766e;margin:6px 0 0;">
                            Rp 150.000 – 250.000
                        </p>

                    </div>

                    <div style="margin:20px 0;border-top:1px solid #e6f4f2;"></div>

                    <button
                        type="button"
                        data-open-room="k123"
                        onclick="window.openRoomModal('k123', event)"
                        style="
                        width:100%;
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:8px;
                        padding:14px 20px;
                        border-radius:16px;
                        font-size:14px;
                        font-weight:700;
                        background:#0D9488;
                        border:1px solid #0D9488;
                        color:#fff;
                        cursor:pointer;
                    "
                        class="hover:bg-[#0f766e] hover:shadow-lg hover:-translate-y-0.5">

                        <span style="color:#fff;">
                            Lihat Selengkapnya
                        </span>

                        <i class="fas fa-arrow-right" style="font-size:11px;color:#fff;"></i>

                    </button>

                </div>

            </div>


            <!-- =================================================
             ISOLASI MINA
         ================================================== -->

            <div
                style="
                position:relative;
                background:#fff;
                border-radius:24px;
                border:1px solid #e6f4f2;
                box-shadow:0 8px 24px rgba(15,23,42,.06);
                overflow:hidden;
                transition:all .3s ease;
            "
                class="group hover:-translate-y-1 hover:shadow-xl">

                <div style="position:relative;height:224px;overflow:hidden;">

                    <img
                        src="{{ asset('img/leaflet/kamar-mina/MINA.jpeg') }}"
                        alt="Kamar Isolasi Mina"
                        style="width:100%;height:100%;object-fit:cover;transition:transform .7s ease;"
                        class="group-hover:scale-105">

                    <div
                        style="
                        position:absolute;
                        inset:0;
                        background:linear-gradient(
                            to top,
                            rgba(0,0,0,.8),
                            rgba(0,0,0,.2) 50%,
                            transparent
                        );
                    ">
                    </div>

                    <div style="position:absolute;left:16px;top:16px;z-index:10;">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:8px;
                            padding:6px 14px;
                            border-radius:999px;
                            background:rgba(13,148,136,.92);
                            border:1px solid rgba(255,255,255,.25);
                            box-shadow:0 4px 12px rgba(0,0,0,.18);
                            font-size:10px;
                            font-weight:700;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:#fff;
                        ">

                            <span style="width:6px;height:6px;border-radius:50%;background:#CCFBF1;"></span>

                            ISOLASI MINA

                        </span>

                    </div>

                    <div style="position:absolute;right:16px;top:16px;z-index:10;">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                            padding:6px 12px;
                            border-radius:999px;
                            background:rgba(255,255,255,.92);
                            color:#059669;
                            font-size:11px;
                            font-weight:700;
                        ">

                            <span style="width:6px;height:6px;border-radius:50%;background:#10b981;"></span>

                            Tersedia

                        </span>

                    </div>

                    <div style="position:absolute;left:20px;right:20px;bottom:20px;z-index:10;">

                        <span
                            style="
                            display:block;
                            font-size:11px;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:rgba(255,255,255,.75);
                            font-weight:500;
                        ">

                            Kamar Rawat Inap

                        </span>

                        <h4
                            style="
                            font-size:28px;
                            font-weight:800;
                            color:#fff;
                            line-height:1.2;
                            margin:0;
                            text-shadow:0 2px 8px rgba(0,0,0,.6);
                        ">

                            ISOLASI MINA

                        </h4>

                    </div>

                </div>


                <div style="padding:24px;">

                    <div
                        style="
                        display:flex;
                        align-items:center;
                        gap:12px;
                        margin-bottom:20px;
                        color:#64748b;
                        flex-wrap:wrap;
                        row-gap:8px;
                    ">

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">

                            <i
                                class="fas fa-snowflake"
                                style="font-size:11px;color:#0D9488;">
                            </i>

                            AC

                        </span>

                        <span style="width:4px;height:4px;border-radius:50%;background:#cbd5e1;"></span>

                        <span style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500;">

                            <i
                                class="fas fa-bed"
                                style="font-size:11px;color:#0D9488;">
                            </i>

                            Tempat Tidur

                        </span>

                    </div>


                    <div>

                        <p style="font-size:10px;text-transform:uppercase;letter-spacing:.12em;font-weight:700;color:#0D9488;margin:0;">
                            Tarif per malam
                        </p>

                        <p style="font-size:28px;font-weight:800;line-height:1;color:#0f766e;margin:6px 0 0;">
                            Rp 150.000
                        </p>

                    </div>


                    <div style="margin:20px 0;border-top:1px solid #e6f4f2;"></div>


                    <button
                        type="button"
                        data-open-room="k3m"
                        onclick="window.openRoomModal('k3m', event)"
                        style="
                        width:100%;
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:8px;
                        padding:14px 20px;
                        border-radius:16px;
                        font-size:14px;
                        font-weight:700;
                        background:#0D9488;
                        border:1px solid #0D9488;
                        color:#fff;
                        cursor:pointer;
                    "
                        class="hover:bg-[#0f766e] hover:shadow-lg hover:-translate-y-0.5">

                        <span style="color:#fff;">
                            Lihat Selengkapnya
                        </span>

                        <i
                            class="fas fa-arrow-right"
                            style="font-size:11px;color:#fff;">
                        </i>

                    </button>

                </div>

            </div>


            <!-- =================================================
             INTENSIF
            ================================================== -->

            <div
                style="
                position:relative;
                background:#fff;
                border-radius:24px;
                border:1px solid #e6f4f2;
                box-shadow:0 8px 24px rgba(15,23,42,.06);
                overflow:hidden;
                transition:all .3s ease;
            "
                class="group hover:-translate-y-1 hover:shadow-xl">

                <div style="position:relative;height:224px;overflow:hidden;">

                    <img
                        src="{{ asset('img/leaflet/kamar-intensif/1.jpeg') }}"
                        alt="Kamar Intensif"
                        style="width:100%;height:100%;object-fit:cover;transition:transform .7s ease;"
                        class="group-hover:scale-105">

                    <div
                        style="
                            position:absolute;
                            inset:0;
                            background:linear-gradient(
                                to top,
                                rgba(0,0,0,.8),
                                rgba(0,0,0,.2) 50%,
                                transparent
                            );
                        ">
                    </div>

                    <div style="position:absolute;left:16px;top:16px;z-index:10;">

                        <span
                            style="
                            display:inline-flex;
                            align-items:center;
                            gap:8px;
                            padding:6px 14px;
                            border-radius:999px;
                            background:rgba(13,148,136,.92);
                            border:1px solid rgba(255,255,255,.25);
                            box-shadow:0 4px 12px rgba(0,0,0,.18);
                            font-size:10px;
                            font-weight:700;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:#fff;
                        ">

                            <span style="width:6px;height:6px;border-radius:50%;background:#CCFBF1;"></span>

                            INTENSIF

                        </span>

                    </div>

                    <div style="position:absolute;right:16px;top:16px;z-index:10;">

                        <span
                            style="
                                display:inline-flex;
                                align-items:center;
                                gap:6px;
                                padding:6px 12px;
                                border-radius:999px;
                                background:rgba(255,255,255,.92);
                                color:#059669;
                                font-size:11px;
                                font-weight:700;
                            ">

                            <span style="width:6px;height:6px;border-radius:50%;background:#10b981;"></span>

                            Tersedia

                        </span>

                    </div>

                    <div style="position:absolute;left:20px;right:20px;bottom:20px;z-index:10;">

                        <span
                            style="
                            display:block;
                            font-size:11px;
                            letter-spacing:.14em;
                            text-transform:uppercase;
                            color:rgba(255,255,255,.75);
                            font-weight:500;
                        ">

                            Kamar Rawat Inap

                        </span>

                        <h4
                            style="
                            font-size:28px;
                            font-weight:800;
                            color:#fff;
                            line-height:1.2;
                            margin:0;
                            text-shadow:0 2px 8px rgba(0,0,0,.6);
                        ">

                            INTENSIF

                        </h4>

                    </div>

                </div>


                <div style="padding:24px;">

                    <div
                        style="
                        min-height:16px;
                        margin-bottom:20px;
                    ">

                    </div>


                    <div>

                        <p style="font-size:10px;text-transform:uppercase;letter-spacing:.12em;font-weight:700;color:#0D9488;margin:0;">
                            Tarif per malam
                        </p>

                        <p style="font-size:28px;font-weight:800;line-height:1;color:#0f766e;margin:6px 0 0;">
                            Rp 150.000
                        </p>

                    </div>


                    <div style="margin:20px 0;border-top:1px solid #e6f4f2;"></div>


                    <button
                        type="button"
                        data-open-room="intensif"
                        onclick="window.openRoomModal('intensif', event)"
                        style="
                        width:100%;
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:8px;
                        padding:14px 20px;
                        border-radius:16px;
                        font-size:14px;
                        font-weight:700;
                        background:#0D9488;
                        border:1px solid #0D9488;
                        color:#fff;
                        cursor:pointer;
                    "
                        class="hover:bg-[#0f766e] hover:shadow-lg hover:-translate-y-0.5">

                        <span style="color:#fff;">
                            Lihat Selengkapnya
                        </span>

                        <i
                            class="fas fa-arrow-right"
                            style="font-size:11px;color:#fff;">
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

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

            #roomDetailModal,
            #roomDetailModal *,
            #roomDetailModal *::before,
            #roomDetailModal *::after {
                box-sizing: border-box;
            }
        </style>


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
                    #roomDetailModal #roomInformation {
                        display: none !important;
                    }

                    #roomDetailModal #roomInfoMobile {
                        display: block !important;
                    }
                }

                @media (min-width: 640px) {
                    #roomDetailModal #roomInfoMobile {
                        display: none !important;
                    }
                }
            </style>
            <div id="roomInfoMobile" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

                <!-- BADGE + TARIF -->
                <div class="flex items-center justify-between gap-3 mb-3">

                    <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 4px 12px rgba(13,148,136,0.28); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">
                        <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>
                        <span style="position: relative; color: #ffffff;">
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
                    <span class="h-px flex-1" style="background:#E5E9E8;"></span>
                    <span class="w-1 h-1 rotate-45" style="background:#5EEAD4;"></span>
                    <span class="h-px flex-1" style="background:#E5E9E8;"></span>
                </div>

                <!-- TARIF -->
                <div class="mb-3.5">
                    <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#0D9488;">
                        <i class="fas fa-tag text-[9px]" style="color:#0D9488;"></i>
                        Tarif per malam
                    </div>
                    <div class="flex items-baseline gap-1.5 mt-1">
                        <strong class="rd-display text-2xl font-semibold leading-none" style="color:#0D9488;">
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
                #roomDetailModal .rd-display {
                    font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
                }

                #roomDetailModal .scrollbar-hide::-webkit-scrollbar {
                    display: none;
                }

                #roomDetailModal .scrollbar-hide {
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
                    <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 6px 18px rgba(13,148,136,0.35), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                        <!-- shine sweep -->
                        <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: rzVvipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                        <!-- teal dot -->
                        <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                        <!-- text -->
                        <span style="position: relative; color: #ffffff;">
                            Kamar VVIP RAUDLOH
                        </span>

                    </span>

                </div>

                <style>
                    @keyframes rzVvipShine {
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
                    <span class="w-1 h-1 rotate-45 bg-[#5EEAD4]"></span>
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
                            <i class="fas fa-tag text-[#5EEAD4] text-[9px] drop-shadow-[0_1px_4px_rgba(0,0,0,0.8)]"></i>
                            Tarif per malam
                        </div>

                        <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                            <strong class="rd-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#5EEAD4] tracking-tight" style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">
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
                        #roomDetailModal .vvip-facility-grid {
                            grid-template-columns: repeat(5, minmax(0, 1fr));
                        }

                        @media (max-width: 480px) {
                            #roomDetailModal .vvip-facility-grid {
                                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                                row-gap: 8px !important;
                            }
                        }

                        @media (min-width: 481px) and (max-width: 640px) {
                            #roomDetailModal .vvip-facility-grid {
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

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

            #roomDetailModalVip,
            #roomDetailModalVip *,
            #roomDetailModalVip *::before,
            #roomDetailModalVip *::after {
                box-sizing: border-box;
            }
        </style>

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
                #roomDetailModalVip #roomInformationVip {
                    display: none !important;
                }

                #roomDetailModalVip #roomInfoMobileVip {
                    display: block !important;
                }
            }

            @media (min-width: 640px) {
                #roomDetailModalVip #roomInfoMobileVip {
                    display: none !important;
                }
            }
        </style>


        <div id="roomInfoMobileVip" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

            <!-- BADGE -->

            <div class="flex items-center justify-between gap-3 mb-3">

                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 4px 12px rgba(13,148,136,0.28); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <span style="position: relative; color: #ffffff;">

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
                <span class="h-px flex-1" style="background:#E5E9E8;"></span>
                <span class="w-1 h-1 rotate-45" style="background:#5EEAD4;"></span>
                <span class="h-px flex-1" style="background:#E5E9E8;"></span>
            </div>


            <!-- TARIF -->

            <div class="mb-3.5">
                <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#0D9488;">
                    <i class="fas fa-tag text-[9px]" style="color:#0D9488;"></i>
                    Tarif per malam
                </div>
                <div class="flex items-baseline gap-1.5 mt-1">
                    <strong class="rd-display text-2xl font-semibold leading-none" style="color:#0D9488;">
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
            #roomDetailModalVip .vip-display {
                font-family: 'Fraunces', ui-serif, Georgia, serif;
            }

            #roomDetailModalVip .vip-facility-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            @media (max-width: 480px) {
                #roomDetailModalVip .vip-facility-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                    row-gap: 8px !important;
                }
            }

            @media (min-width: 481px) and (max-width: 640px) {
                #roomDetailModalVip .vip-facility-grid {
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

                <!-- BADGE VIP -->
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 6px 18px rgba(13,148,136,0.35), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <!-- shine sweep -->
                    <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: rzVipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                    <!-- teal dot -->
                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <!-- text -->
                    <span style="position: relative; color: #ffffff;">
                        Kamar VIP ZAM ZAM

                    </span>

                </span>

            </div>

            <style>
                @keyframes rzVipShine {
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

                    <div class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">
                        <i class="fas fa-tag text-[#5EEAD4] text-[9px] drop-shadow-[0_1px_4px_rgba(0,0,0,0.8)]"></i>

                        Tarif per malam

                    </div>


                    <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                        <strong class="rd-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#5EEAD4] tracking-tight" style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                            Rp 350.000

                        </strong>

                        <span class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

                            / malam

                        </span>

                    </div>

                </div>

                <style>
                    #roomDetailModalVip .vip-facility-grid {
                        grid-template-columns: repeat(5, minmax(0, 1fr));
                    }

                    @media (max-width: 480px) {
                        #roomDetailModalVip .vip-facility-grid {
                            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                            row-gap: 8px !important;
                        }
                    }

                    @media (min-width: 481px) and (max-width: 640px) {
                        #roomDetailModalVip .vip-facility-grid {
                            grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                            row-gap: 8px !important;
                        }
                    }
                </style>

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

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

            #roomDetailModalK123,
            #roomDetailModalK123 *,
            #roomDetailModalK123 *::before,
            #roomDetailModalK123 *::after {
                box-sizing: border-box;
            }
        </style>


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
                #roomDetailModalK123 #roomInformationK123 {
                    display: none !important;
                }

                #roomDetailModalK123 #roomInfoMobileK123 {
                    display: block !important;
                }
            }

            @media (min-width: 640px) {
                #roomDetailModalK123 #roomInfoMobileK123 {
                    display: none !important;
                }
            }
        </style>


        <div id="roomInfoMobileK123" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

            <!-- BADGE -->

            <div class="flex items-center justify-between gap-3 mb-3">

                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 4px 12px rgba(13,148,136,0.28); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <span style="position: relative; color: #ffffff;">

                        Kamar Kelas 1,2,3

                    </span>

                </span>
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 4px 12px rgba(13,148,136,0.28); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <span style="position: relative; color: #ffffff;">

                        AROFAH

                    </span>
                    <span style="position: relative; color: #ffffff;">
                        MARWAH

                    </span>
                    <span style="position: relative; color: #ffffff;">
                        SOFA

                    </span>
                    <span style="position: relative; color: #ffffff;">
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
                <span class="h-px flex-1" style="background:#E5E9E8;"></span>
                <span class="w-1 h-1 rotate-45" style="background:#5EEAD4;"></span>
                <span class="h-px flex-1" style="background:#E5E9E8;"></span>
            </div>


            <!-- TARIF -->

            <div class="mb-3.5">
                <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#0D9488;">
                    <i class="fas fa-tag text-[9px]" style="color:#0D9488;"></i>

                    Tarif per malam

                </div>

                <div class="flex items-baseline gap-1.5 mt-1">
                    <strong class="rd-display text-2xl font-semibold leading-none" style="color:#0D9488;">
                        Rp 150.000 - Rp 250.000
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
            #roomInformationK123 .k123-display {
                font-family: 'Fraunces', ui-serif, Georgia, serif;
            }

            #roomInformationK123 .k123-facility-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            @media (max-width: 480px) {
                #roomInformationK123 .k123-facility-grid {
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

            <div class="flex items-center justify-between gap-3 mb-3">

                <!-- BADGE VIP -->
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 6px 18px rgba(13,148,136,0.35), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <!-- shine sweep -->
                    <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: rzVipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                    <!-- teal dot -->
                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <!-- text -->
                    <span style="position: relative; color: #ffffff;">

                        Kamar Kelas 1,2,3

                    </span>

                </span>
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 6px 18px rgba(13,148,136,0.35), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <!-- shine sweep -->
                    <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: rzVipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                    <!-- teal dot -->
                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <!-- text -->
                    <span style="position: relative; color: #ffffff;">

                        AROFAH

                    </span>
                    <span style="position: relative; color: #ffffff;">

                        MARWAH

                    </span>
                    <span style="position: relative; color: #ffffff;">

                        SOFA

                    </span>
                    <span style="position: relative; color: #ffffff;">

                        AQSHO

                    </span>

                </span>

            </div>

            <style>
                @keyframes rzVipShine {
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

                    <div class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">
                        <i class="fas fa-tag text-[#5EEAD4] text-[9px] drop-shadow-[0_1px_4px_rgba(0,0,0,0.8)]"></i>

                        Tarif per malam

                    </div>


                    <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                        <strong class="rd-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#5EEAD4] tracking-tight" style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                            Rp 150.000 - Rp 250.000

                        </strong>

                        <span class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

                            / malam

                        </span>

                    </div>

                </div>

                <style>
                    #roomDetailModalK123 .vip-facility-grid {
                        grid-template-columns: repeat(5, minmax(0, 1fr));
                    }

                    @media (max-width: 480px) {
                        #roomDetailModalK123 .vip-facility-grid {
                            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                            row-gap: 8px !important;
                        }
                    }

                    @media (min-width: 481px) and (max-width: 640px) {
                        #roomDetailModalK123 .vip-facility-grid {
                            grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                            row-gap: 8px !important;
                        }
                    }
                </style>


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

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

            #roomDetailModalK3m,
            #roomDetailModalK3m *,
            #roomDetailModalK3m *::before,
            #roomDetailModalK3m *::after {
                box-sizing: border-box;
            }
        </style>

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
                    #roomDetailModalK3m #roomInformationK3m {
                        display: none !important;
                    }

                    #roomDetailModalK3m #roomInfoMobileK3m {
                        display: block !important;
                    }
                }

                @media (min-width: 640px) {
                    #roomDetailModalK3m #roomInfoMobileK3m {
                        display: none !important;
                    }
                }
            </style>


            <div id="roomInfoMobileK3m" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

                <!-- BADGE -->

                <div class="flex items-center justify-between gap-3 mb-3">

                    <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 4px 12px rgba(13,148,136,0.28); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                        <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                        <span style="position: relative; color: #ffffff;">

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
                    <span class="h-px flex-1" style="background:#E5E9E8;"></span>
                    <span class="w-1 h-1 rotate-45" style="background:#5EEAD4;"></span>
                    <span class="h-px flex-1" style="background:#E5E9E8;"></span>
                </div>

                <!-- TARIF -->

                <<div class="mb-3.5">
                    <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#0D9488;">
                        <i class="fas fa-tag text-[9px]" style="color:#0D9488;"></i>
                        Tarif per malam
                    </div>
                    <div class="flex items-baseline gap-1.5 mt-1">
                        <strong class="rd-display text-2xl font-semibold leading-none" style="color:#0D9488;">
                            Rp 150.000
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
            #roomInformationK3m .k3m-display {
                font-family: 'Fraunces', ui-serif, Georgia, serif;
            }

            #roomInformationK3m .k3m-facility-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            @media (max-width: 480px) {
                #roomInformationK3m .k3m-facility-grid {
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

            <div class="flex items-center justify-between gap-3 mb-3">

                <!-- BADGE VIP -->
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 6px 18px rgba(13,148,136,0.35), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <!-- shine sweep -->
                    <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: rzVipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                    <!-- teal dot -->
                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <!-- text -->
                    <span style="position: relative; color: #ffffff;">
                        Kamar ISOLASI MINA

                    </span>

                </span>

            </div>

            <style>
                @keyframes rzVipShine {
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

                    <div class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">
                        <i class="fas fa-tag text-[#5EEAD4] text-[9px] drop-shadow-[0_1px_4px_rgba(0,0,0,0.8)]"></i>

                        Tarif per malam

                    </div>


                    <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                        <strong class="rd-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#5EEAD4] tracking-tight" style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                            Rp 150.000

                        </strong>

                        <span class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

                            / malam

                        </span>

                    </div>

                </div>

                <style>
                    #roomDetailModalK3m .k3m-facility-grid {
                        grid-template-columns: repeat(5, minmax(0, 1fr));
                    }

                    @media (max-width: 480px) {
                        #roomDetailModalK3m .k3m-facility-grid {
                            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                            row-gap: 8px !important;
                        }
                    }

                    @media (min-width: 481px) and (max-width: 640px) {
                        #roomDetailModalK3m .k3m-facility-grid {
                            grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                            row-gap: 8px !important;
                        }
                    }
                </style>


                <!-- FASILITAS -->

                <div class="w-full min-w-0 mt-2">

                    <div class="grid gap-x-0 gap-y-0 items-start w-full max-w-full k3m-facility-grid">

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

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

            #roomDetailModalIntensif,
            #roomDetailModalIntensif *,
            #roomDetailModalIntensif *::before,
            #roomDetailModalIntensif *::after {
                box-sizing: border-box;
            }
        </style>

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
                #roomDetailModalIntensif #roomInformationIntensif {
                    display: none !important;
                }

                #roomDetailModalIntensif #roomInfoMobileIntensif {
                    display: block !important;
                }
            }

            @media (min-width: 640px) {
                #roomDetailModalIntensif #roomInfoMobileIntensif {
                    display: none !important;
                }
            }
        </style>


        <div id="roomInfoMobileIntensif" class="px-4 pt-4 pb-8 bg-white border-b border-gray-100">

            <!-- BADGE -->

            <div class="flex items-center justify-between gap-3 mb-3">

                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 4px 12px rgba(13,148,136,0.28); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <span style="position: relative; color: #ffffff;">

                        Kamar Intensif

                    </span>

                </span>
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 16px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 4px 12px rgba(13,148,136,0.28); font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; overflow: hidden;">

                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <span style="position: relative; color: #ffffff;">
                        ICU

                    </span>
                    <span style="position: relative; color: #ffffff;">
                        HCU

                    </span>
                    <span style="position: relative; color: #ffffff;">
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
                <span class="h-px flex-1" style="background:#E5E9E8;"></span>
                <span class="w-1 h-1 rotate-45" style="background:#5EEAD4;"></span>
                <span class="h-px flex-1" style="background:#E5E9E8;"></span>
            </div>


            <!-- TARIF -->

            <div class="mb-3.5">
                <div class="flex items-center gap-1.5 text-[9px] uppercase tracking-[0.14em] font-semibold" style="color:#0D9488;">
                    <i class="fas fa-tag text-[9px]" style="color:#0D9488;"></i>
                    Tarif per malam
                </div>
                <div class="flex items-baseline gap-1.5 mt-1">
                    <strong class="rd-display text-2xl font-semibold leading-none" style="color:#0D9488;">
                        Rp 150.000
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
            #roomDetailModalIntensif .intensif-display {
                font-family: 'Fraunces', ui-serif, Georgia, serif;
            }

            #roomDetailModalIntensif .intensif-facility-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            @media (max-width: 480px) {
                #roomDetailModalIntensif .intensif-facility-grid {
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

                <!-- BADGE VIP -->
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 6px 18px rgba(13,148,136,0.35), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <!-- shine sweep -->
                    <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: rzVipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                    <!-- teal dot -->
                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <!-- text -->
                    <span style="position: relative; color: #ffffff;">

                        Kamar Intensif

                    </span>

                </span>
                <!-- BADGE VIP -->
                <span style="position: relative; display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; border-radius: 999px; background: linear-gradient(180deg, #0F6E56 0%, #0D9488 100%); border: 1px solid rgba(13,148,136,0.45); box-shadow: 0 6px 18px rgba(13,148,136,0.35), inset 0 1px 0 rgba(255,255,255,0.07); font-size: 11px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; overflow: hidden;">

                    <!-- shine sweep -->
                    <span style="position: absolute; inset: 0; background: linear-gradient(100deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%); transform: translateX(-150%); animation: rzVipShine 3.5s ease-in-out infinite; pointer-events: none;"></span>

                    <!-- teal dot -->
                    <span style="position: relative; width: 6px; height: 6px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, #5EEAD4, #0D9488); box-shadow: 0 0 8px rgba(94,234,212,0.9);"></span>

                    <!-- text -->
                    <span style="position: relative; color: #ffffff;">
                        ICU

                    </span>
                    <span style="position: relative; color: #ffffff;">
                        HCU

                    </span>
                    <span style="position: relative; color: #ffffff;">
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

                    <div class="flex items-center gap-1.5 text-white/85 text-[9px] sm:text-[10px] uppercase tracking-[0.14em] font-semibold whitespace-nowrap" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 7px rgba(0,0,0,0.75);">
                        <i class="fas fa-tag text-[#5EEAD4] text-[9px] drop-shadow-[0_1px_4px_rgba(0,0,0,0.8)]"></i>

                        Tarif per malam

                    </div>


                    <div class="flex items-baseline gap-1.5 mt-1 whitespace-nowrap">

                        <strong class="rd-display text-xl sm:text-2xl md:text-3xl font-semibold leading-none text-[#5EEAD4] tracking-tight" style="text-shadow:0 1px 3px rgba(0,0,0,1),0 3px 8px rgba(0,0,0,0.95),0 6px 14px rgba(0,0,0,0.7);">

                            Rp 150.000

                        </strong>

                        <span class="text-xs sm:text-sm text-white/85 font-medium tracking-wide ml-1" style="text-shadow:0 1px 3px rgba(0,0,0,0.95),0 3px 6px rgba(0,0,0,0.75);">

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
           border
           px-5 py-4.5
           md:px-6 md:py-5
           w-[92%]
           max-w-4xl
           mx-auto"
        style="
        border-color: rgba(13,148,136,0.18) !important;
        background-image: linear-gradient(to right, rgba(236,253,245,0.9), #ffffff, rgba(236,253,245,0.6)) !important;
        box-shadow: 0 6px 24px rgba(13,148,136,0.08) !important;
        ">

        <!-- Accent -->
        <div
            class="absolute left-0 top-0 bottom-0 w-1"
            style="background-image: linear-gradient(to bottom, #0D9488, #5EEAD4) !important;">
        </div>

        <div class="flex items-start gap-3.5 md:gap-4">

            <!-- ICON -->
            <div
                class="flex h-9 w-9 shrink-0
                   items-center justify-center
                   rounded-xl
                   ring-1"
                style="
                background-color: #ECFDF5 !important;
                color: #0D9488 !important;
                --tw-ring-color: rgba(13,148,136,0.25) !important;
            ">

                <i class="fas fa-circle-info text-sm"></i>

            </div>

            <!-- CONTENT -->
            <div class="min-w-0 pt-0.5">

                <div
                    class="mb-1
                       text-xs md:text-sm
                       font-bold
                       tracking-wide"
                    style="color: #0f172a !important;">

                    Informasi Tarif Rawat Inap

                </div>

                <p
                    class="text-xs md:text-sm
                       leading-6"
                    style="color: #475569 !important;">

                    Tarif yang tercantum merupakan informasi awal.
                    Untuk informasi tarif terbaru, ketersediaan kamar,
                    dan ketentuan rawat inap, silakan menghubungi
                    <span class="font-semibold" style="color: #0f172a !important;">
                        petugas RSUD Ar Rozy
                    </span>.

                </p>

            </div>

        </div>

    </div>

</section>

<section id="layanan-unggulan" class="rz-layanan-scope py-16 bg-gray-50">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

        .rz-layanan-scope,
        .rz-layanan-scope *,
        .rz-layanan-scope *::before,
        .rz-layanan-scope *::after {
            box-sizing: border-box;
        }

        .rz-layanan-scope {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
        }

        .rz-layanan-scope .rz-layanan-title {
            color: #0f172a;
        }

        .rz-layanan-scope .rz-layanan-sub {
            color: #64748b;
        }

        .rz-layanan-scope .rz-layanan-divider {
            background: linear-gradient(90deg, #0F6E56, #0D9488);
        }
    </style>

    <div class="max-w-6xl mx-auto px-6">

        <!-- Judul Section -->
        <div class="text-center mb-10">
            <h2 class="rz-layanan-title text-4xl md:text-5xl font-bold tracking-tight">
                Layanan Unggulan Kami
            </h2>
            <p class="rz-layanan-sub mt-4 text-lg">
                Pelayanan cepat, profesional, dan penuh kepedulian
            </p>
            <div class="rz-layanan-divider mt-4 w-24 h-1 mx-auto rounded-full"></div>
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

<section class="rz-sosmed-scope py-20 bg-white">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

        .rz-sosmed-scope,
        .rz-sosmed-scope *,
        .rz-sosmed-scope *::before,
        .rz-sosmed-scope *::after {
            box-sizing: border-box;
        }

        .rz-sosmed-scope {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
        }

        .rz-sosmed-scope .rz-sosmed-title {
            color: #0f172a;
        }

        .rz-sosmed-scope .rz-sosmed-sub {
            color: #64748b;
        }

        .rz-sosmed-scope .rz-sosmed-divider {
            background: linear-gradient(90deg, #0F6E56, #0D9488);
        }

        .rz-sosmed-scope .rz-sosmed-card-title {
            color: #0f172a;
        }
    </style>

    <div class="max-w-6xl mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-14">
            <h2 class="rz-sosmed-title text-3xl md:text-4xl font-bold">
                Ikuti Aktivitas & Informasi Terbaru Kami
            </h2>
            <p class="rz-sosmed-sub mt-4 max-w-2xl mx-auto">
                Dapatkan update kegiatan, edukasi kesehatan, dan informasi penting lainnya
                melalui Instagram dan YouTube resmi kami.
            </p>
            <div class="rz-sosmed-divider mt-4 w-24 h-1 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">

            <!-- Instagram (1 Kolom) -->
            <div class="md:col-span-1 bg-white rounded-2xl shadow-md p-4">
                <h3 class="rz-sosmed-card-title text-lg font-semibold mb-4 text-center">
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

                <h3 class="rz-sosmed-card-title text-lg font-semibold mb-4">
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
<section class="rz-review-scope py-16 bg-gray-50">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

        .rz-review-scope,
        .rz-review-scope *,
        .rz-review-scope *::before,
        .rz-review-scope *::after {
            box-sizing: border-box;
        }

        .rz-review-scope {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
        }

        .rz-review-scope .rz-review-title {
            color: #0f172a;
        }

        .rz-review-scope .rz-review-divider {
            background: linear-gradient(90deg, #0F6E56, #0D9488);
        }

        .rz-review-scope .rz-review-quote {
            color: #334155;
        }

        .rz-review-scope .rz-review-name {
            color: #0f172a;
        }
    </style>

    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="rz-review-title text-3xl font-bold mb-4">Review Kami ⭐</h2>
        <div class="rz-review-divider mt-4 mb-4 w-24 h-1 mx-auto rounded-full">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="rz-review-quote italic mb-4">"Pelayanan bagus, intinya act of service ❤️
                    Kebersihan bagus, fasilitas juga bagus. Nakes ramah. Makanan enak."</p>
                <h4 class="rz-review-name font-semibold">— Silvia Resti</h4>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="rz-review-quote italic mb-4">"Selama di rawat di ruang sofa, ruangannya nyaman & bagus,
                    pelayanannya ramah enak, Dokter pelayanannya bagus, perawat juga pelayanannya bagus &
                    tanggap."</p>
                <h4 class="rz-review-name font-semibold">— misdi hartono</h4>
            </div>
        </div>
    </div>
</section>

<style>
    /* ==========================================================
       QUICK ACCESS — semua selector di-scope ke #quickAccess dan
       memakai prefix "qa-" supaya tidak tertimpa / menimpa CSS global
       ========================================================== */

    #quickAccess,
    #quickAccess *,
    #quickAccess *::before,
    #quickAccess *::after {
        box-sizing: border-box;
    }

    /* Reset elemen (specificity rendah, mudah di-override oleh class qa-) */
    #quickAccess :where(div, nav, a, button, span, h4, p, i) {
        margin: 0;
        padding: 0;
        border: 0;
        background: none;
        box-shadow: none;
        text-shadow: none;
        text-transform: none;
        letter-spacing: normal;
        float: none;
    }

    #quickAccess :where(div, nav, a, button, span, h4, p) {
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.3;
        color: inherit;
        text-decoration: none;
    }

    /* ---------- Wrapper ---------- */
    #quickAccess {
        position: fixed;
        left: 24px;
        top: 120px;
        z-index: 9999;
        display: block;
        transition: opacity .25s ease, transform .25s ease, visibility .25s;
    }

    #quickAccess.qa-hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transform: translateX(-12px);
    }

    /* ---------- Panel (background putih solid) ---------- */
    #quickAccess .qa-panel {
        display: block;
        width: 240px;
        padding: 12px;
        overflow: hidden;
        border-radius: 18px;
        background: #fff !important;
        opacity: 1;
        border: 1px solid #e2e8f0;
        box-shadow: 0 16px 36px rgba(0, 0, 0, .16);
        transition: width .3s ease;
    }

    /* ---------- Header ---------- */
    #quickAccess .qa-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 14px;
        margin-bottom: 14px;
        border-bottom: 1px solid #e2e8f0;
    }

    #quickAccess .qa-toggle {
        appearance: none;
        -webkit-appearance: none;
        flex: 0 0 40px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #0f766e;
        color: #fff;
        cursor: pointer;
        line-height: 1;
        transition: background .2s;
        -webkit-tap-highlight-color: transparent;
    }

    #quickAccess .qa-toggle i {
        font-size: 16px;
        line-height: 1;
    }

    #quickAccess .qa-title {
        min-width: 0;
        white-space: nowrap;
    }

    #quickAccess .qa-title h4 {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
    }

    #quickAccess .qa-title p {
        margin-top: 2px;
        font-size: 12px;
        color: #64748b;
    }

    /* ---------- Menu ---------- */
    #quickAccess .qa-nav {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    #quickAccess .qa-item {
        position: relative;
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        gap: 12px;
        height: 46px;
        padding: 0 12px;
        border-radius: 12px;
        color: #334155;
        cursor: pointer;
        transition: background .2s, color .2s;
        -webkit-tap-highlight-color: transparent;
    }

    #quickAccess .qa-item i {
        flex: 0 0 40px;
        width: 40px;
        text-align: center;
        font-size: 17px;
        line-height: 1;
    }

    #quickAccess .qa-item span {
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
        color: inherit;
    }

    #quickAccess .qa-item::before {
        content: "";
        position: absolute;
        left: -6px;
        top: 8px;
        bottom: 8px;
        width: 4px;
        border-radius: 10px;
        background: #0f766e;
        transform: scaleY(0);
        transition: transform .25s;
    }

    #quickAccess .qa-item.qa-active {
        background: rgba(15, 118, 110, .1);
        color: #0f766e;
    }

    #quickAccess .qa-item.qa-active::before {
        transform: scaleY(1);
    }

    #quickAccess .qa-divider {
        flex: 0 0 1px;
        height: 1px;
        margin: 4px 0;
        background: #e2e8f0;
    }

    #quickAccess .qa-top {
        color: #0f766e;
        background: rgba(15, 118, 110, .07);
    }

    #quickAccess .qa-top::before {
        display: none;
    }

    @media (hover: hover) {
        #quickAccess .qa-toggle:hover {
            background: #115e59;
        }

        #quickAccess .qa-item:hover {
            background: #0f766e;
            color: #fff;
        }
    }

    #quickAccess .qa-item:active {
        background: #0f766e;
        color: #fff;
    }

    #quickAccess .qa-toggle:focus-visible,
    #quickAccess .qa-item:focus-visible {
        outline: 2px solid #0f766e;
        outline-offset: 2px;
    }

    /* ==========================================================
       DESKTOP / TABLET (>= 1025px): bisa di-minimize jadi kolom ikon
       ========================================================== */
    @media (min-width: 1025px) {
        #quickAccess .qa-panel.qa-min {
            width: 64px;
            padding: 12px 8px;
        }

        #quickAccess .qa-panel.qa-min .qa-header {
            justify-content: center;
            gap: 0;
            margin-bottom: 10px;
            padding-bottom: 0;
            border-bottom: 0;
        }

        #quickAccess .qa-panel.qa-min .qa-title {
            display: none;
        }

        #quickAccess .qa-panel.qa-min .qa-item {
            justify-content: center;
            gap: 0;
            padding: 0;
        }

        #quickAccess .qa-panel.qa-min .qa-item span {
            display: none;
        }
    }

    @media (min-width: 1025px) and (max-width: 1024px) {
        #quickAccess {
            left: 12px;
        }
    }

    @media (min-width: 1025px) and (max-height: 640px) {
        #quickAccess .qa-nav {
            max-height: calc(100vh - 220px);
            overflow-y: auto;
        }
    }

    /* ==========================================================
       MOBILE (<= 768px)
       Awal  : kotak putih kecil berisi tombol hamburger saja
       Dibuka: langsung memanjang ke atas menampilkan daftar menu + teks
       ========================================================== */
    @media (max-width: 1024px) {
        #quickAccess {
            left: max(16px, env(safe-area-inset-left));
            top: auto;
            bottom: calc(20px + env(safe-area-inset-bottom));
        }

        #quickAccess .qa-panel {
            display: flex;
            flex-direction: column-reverse;
            /* tombol di bawah, daftar menu di atas */
            width: auto;
            padding: 10px;
            transition: none;
        }

        #quickAccess .qa-header {
            margin: 0;
            padding: 0;
            border: 0;
        }

        #quickAccess .qa-toggle {
            flex-basis: 44px;
            width: 44px;
            height: 44px;
        }

        /* saat tertutup: hanya hamburger */
        #quickAccess .qa-panel:not(.qa-open) .qa-title,
        #quickAccess .qa-panel:not(.qa-open) .qa-nav {
            display: none !important;
        }

        /* saat terbuka */
        #quickAccess .qa-panel.qa-open {
            width: min(270px, calc(100vw - 32px));
        }

        #quickAccess .qa-panel.qa-open .qa-header {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #e2e8f0;
        }

        #quickAccess .qa-panel.qa-open .qa-title {
            display: block;
        }

        #quickAccess .qa-panel.qa-open .qa-nav {
            display: flex;
            padding-left: 6px;
            max-height: calc(100vh - 180px);
            max-height: calc(100dvh - 180px);
            overflow-y: auto;
            overscroll-behavior: contain;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        #quickAccess,
        #quickAccess * {
            transition: none !important;
        }
    }
</style>

<div id="quickAccess" class="qa-hidden">

    <div class="qa-panel qa-min">

        <div class="qa-header">

            <button id="toggleQuickAccess" class="qa-toggle" type="button"
                aria-label="Buka menu navigasi cepat" aria-expanded="false" aria-controls="quickNav">
                <i class="fas fa-bars"></i>
            </button>

            <div class="qa-title">
                <h4>Quick Access</h4>
                <p>Navigasi Cepat</p>
            </div>

        </div>

        <nav id="quickNav" class="qa-nav" aria-label="Navigasi cepat">

            <a href="#profil" class="qa-item" title="Profil">
                <i class="fas fa-hospital"></i>
                <span>Profil</span>
            </a>

            <a href="#about" class="qa-item" title="Tentang Kami">
                <i class="fas fa-heartbeat"></i>
                <span>Tentang Kami</span>
            </a>

            <a href="#poliklinik" class="qa-item" title="Dokter">
                <i class="fas fa-user-md"></i>
                <span>Dokter</span>
            </a>

            <a href="#penunjang" class="qa-item" title="Pelayanan Penunjang">
                <i class="fas fa-calendar-alt"></i>
                <span>Pelayanan Penunjang</span>
            </a>

            <a href="#rawat-inap" class="qa-item" title="Rawat Inap">
                <i class="fas fa-bed"></i>
                <span>Rawat Inap</span>
            </a>

            <a href="#layanan-unggulan" class="qa-item" title="Layanan Unggulan">
                <i class="fas fa-star"></i>
                <span>Layanan Unggulan</span>
            </a>

            <div class="qa-divider"></div>

            <a href="#" id="quickGoTop" class="qa-item qa-top" title="Ke Atas">
                <i class="fas fa-arrow-up"></i>
                <span>Ke Atas</span>
            </a>

        </nav>

    </div>

</div>

<script>
    const qaInit = () => {

        if (!document.querySelector('meta[name="viewport"]')) {
            const m = document.createElement("meta");
            m.name = "viewport";
            m.content = "width=device-width, initial-scale=1";
            document.head.appendChild(m);
        }

        /*
        |--------------------------------------------------------------------------
        | Quick Access
        |--------------------------------------------------------------------------
        */

        const SHOW_AFTER = 200; // px scroll sebelum panel muncul (0 = selalu tampil)

        const quick = document.getElementById("quickAccess");
        const panel = quick ? quick.querySelector(".qa-panel") : null;
        const toggle = document.getElementById("toggleQuickAccess");
        const nav = document.getElementById("quickNav");

        if (quick && panel && toggle && nav) {

            const icon = toggle.querySelector("i");
            const mobileQuery = window.matchMedia("(max-width: 1024px)");
            const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

            const isMobile = () => mobileQuery.matches;
            const isOverlay = () => isMobile() || window.innerWidth < 1280;
            const isOpen = () => !panel.classList.contains("qa-min");
            const scrollOffset = () => (isMobile() ? 70 : 90);

            // Satu-satunya tempat state panel diubah
            function setOpen(open) {

                panel.classList.toggle("qa-min", !open);
                panel.classList.toggle("qa-open", open && isMobile());

                if (icon) icon.className = open ? "fas fa-times" : "fas fa-bars";

                toggle.setAttribute("aria-expanded", String(open));
                toggle.setAttribute(
                    "aria-label",
                    open ? "Tutup menu navigasi cepat" : "Buka menu navigasi cepat"
                );

            }

            setOpen(false); // selalu mulai dari kondisi tertutup

            toggle.addEventListener("click", (e) => {
                e.stopPropagation();
                setOpen(!isOpen());
            });

            document.addEventListener("click", (e) => {
                if (isOverlay() && isOpen() && !panel.contains(e.target)) {
                    setOpen(false);
                }
            });

            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && isOpen() && isOverlay()) {
                    setOpen(false);
                    toggle.focus();
                }
            });

            const onBreakpointChange = () => setOpen(false);

            if (mobileQuery.addEventListener) {
                mobileQuery.addEventListener("change", onBreakpointChange);
            } else {
                mobileQuery.addListener(onBreakpointChange);
            }


            /*
            |----------------------------------------------------------------------
            | Klik menu: scroll halus lewat JS (tanpa CSS global)
            |----------------------------------------------------------------------
            */

            const behavior = () => (reduceMotion.matches ? "auto" : "smooth");

            nav.addEventListener("click", (e) => {

                const link = e.target.closest("a");

                if (!link) return;

                e.preventDefault();

                if (link.id === "quickGoTop") {

                    history.replaceState(null, "", window.location.pathname + window.location.search);
                    window.scrollTo({
                        top: 0,
                        behavior: behavior()
                    });

                } else {

                    const href = link.getAttribute("href") || "";
                    const target = document.getElementById(href.replace("#", ""));

                    if (target) {

                        const y = target.getBoundingClientRect().top + window.scrollY - scrollOffset();

                        window.scrollTo({
                            top: y,
                            behavior: behavior()
                        });
                        history.replaceState(null, "", href);

                    }

                }

                if (isOverlay()) setOpen(false);

            });


            /*
            |----------------------------------------------------------------------
            | Tampil/sembunyi + menu aktif (satu listener, di-throttle)
            |----------------------------------------------------------------------
            */

            const sections = Array.from(document.querySelectorAll("section[id]"));
            const sectionLinks = Array.from(
                nav.querySelectorAll('.qa-item[href^="#"]:not(#quickGoTop)')
            );

            let ticking = false;

            function update() {

                ticking = false;

                quick.classList.toggle("qa-hidden", window.scrollY < SHOW_AFTER);

                const line = window.innerHeight * 0.35;
                let current = "";

                sections.forEach(section => {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= line && rect.bottom > line) current = section.id;
                });

                sectionLinks.forEach(link => {
                    link.classList.toggle(
                        "qa-active",
                        link.getAttribute("href") === "#" + current
                    );
                });

            }

            function requestUpdate() {
                if (!ticking) {
                    ticking = true;
                    window.requestAnimationFrame(update);
                }
            }

            window.addEventListener("scroll", requestUpdate, {
                passive: true
            });
            window.addEventListener("resize", requestUpdate);
            update();

        }


        /*
        |--------------------------------------------------------------------------
        | SWIPER (Hero News & PKRS)
        |--------------------------------------------------------------------------
        */

        function initFadeSwiper(selector) {

            const el = document.querySelector(selector);

            if (!el || typeof Swiper === "undefined") return;

            new Swiper(el, {

                effect: "fade",
                fadeEffect: {
                    crossFade: true
                },

                speed: 800,
                loop: true,
                grabCursor: true,

                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },

                navigation: {
                    nextEl: selector + " .swiper-button-next",
                    prevEl: selector + " .swiper-button-prev"
                },

                pagination: {
                    el: selector + " .swiper-pagination",
                    clickable: true
                }

            });

        }

        initFadeSwiper(".heroNewsSwiper");
        initFadeSwiper(".pkrsSwiper");

    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", qaInit);
    } else {
        qaInit();
    }
</script>
@endsection
@section('scripts')
<script src="{{ asset('js/profile.js') }}"></script>
@endsection
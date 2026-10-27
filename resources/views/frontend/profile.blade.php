@extends('frontend.layouts.app')

@section('content')

{{-- =========================================================
    PROFILE QUICK ACCESS
========================================================= --}}
<div id="profileQuickAccess">

    <div class="ppid-quick-panel">

        <div class="ppid-quick-header">

            <div class="ppid-quick-brand flex items-center gap-3">

                <div
                    class="w-10 h-10 rounded-xl
                           bg-gradient-to-br from-orange-500 to-emerald-600
                           flex items-center justify-center
                           text-white shadow-lg">

                    <i class="bi bi-hospital text-lg"></i>

                </div>

                <div>
                    <div class="text-xs font-semibold
                                tracking-widest text-gray-400 uppercase">
                        PROFILE
                    </div>

                    <div class="font-bold text-gray-800">
                        RSUD AR ROZY
                    </div>
                </div>

            </div>

            <button
                type="button"
                id="toggleProfileQuickAccess"
                class="ppid-quick-toggle"
                aria-label="Buka menu navigasi"
                aria-expanded="true">

                <i class="bi bi-list"></i>
            </button>

        </div>


        <nav class="ppid-quick-nav" id="profileQuickNav">

            <a
                href="#tentang-rsud"
                class="ppid-quick-link"
                data-profile-target="tentang-rsud">

                <span class="ppid-quick-icon">
                    <i class="bi bi-hospital"></i>
                </span>

                <span class="ppid-quick-label">
                    Tentang RSUD
                </span>

            </a>


            <a
                href="#struktur-organisasi"
                class="ppid-quick-link"
                data-profile-target="struktur-organisasi">

                <span class="ppid-quick-icon">
                    <i class="bi bi-diagram-3"></i>
                </span>

                <span class="ppid-quick-label">
                    Struktur Organisasi
                </span>

            </a>


            <div class="ppid-quick-group">

                <button
                    type="button"
                    class="ppid-quick-link ppid-quick-parent"
                    data-profile-parent="tupoksi">

                    <span class="ppid-quick-icon">
                        <i class="bi bi-journal-text"></i>
                    </span>

                    <span class="ppid-quick-label">
                        Tugas Pokok & Fungsi
                    </span>

                    <i class="bi bi-chevron-down ppid-quick-arrow"></i>

                </button>


                <div
                    class="ppid-quick-submenu"
                    data-profile-submenu="tupoksi">

                    <a
                        href="#bagian-umum-keuangan"
                        class="ppid-quick-subitem"
                        data-profile-target="bagian-umum-keuangan">

                        <span>01</span>
                        <small>
                            Bagian Umum & Keuangan
                        </small>

                    </a>


                    <a
                        href="#pelayanan-medik"
                        class="ppid-quick-subitem"
                        data-profile-target="pelayanan-medik">

                        <span>02</span>
                        <small>
                            Pelayanan Medik
                        </small>

                    </a>


                    <a
                        href="#pelayanan-keperawatan"
                        class="ppid-quick-subitem"
                        data-profile-target="pelayanan-keperawatan">

                        <span>03</span>
                        <small>
                            Keperawatan & Kebidanan
                        </small>

                    </a>

                </div>

            </div>


            <button
                type="button"
                id="profileBackToTop"
                class="ppid-quick-link">

                <span class="ppid-quick-icon">
                    <i class="bi bi-arrow-up"></i>
                </span>

                <span class="ppid-quick-label">
                    Kembali ke Atas
                </span>

            </button>

        </nav>

    </div>

</div>



{{-- =========================================================
    PROFILE PAGE
========================================================= --}}
<div class="profile-page">


    {{-- =====================================================
        HERO PROFILE + FOTO GEDUNG
    ====================================================== --}}
    <section class="profile-hero">

        {{-- FOTO GEDUNG --}}
        <div class="profile-hero-photo">

            <img
                src="{{ asset('img/profile.jpg') }}"
                alt="Gedung RSUD Ar Rozy Kota Probolinggo">

        </div>


        {{-- OVERLAY --}}
        <div class="profile-hero-overlay"></div>


        {{-- CONTENT --}}
        <div class="profile-hero-content">

            <div class="profile-hero-badge">

                <span class="profile-hero-badge-icon">
                    <i class="bi bi-hospital"></i>
                </span>

                <span>
                    PROFILE RSUD AR ROZY
                </span>

            </div>


            <h1 class="profile-hero-title">

                <span class="profile-hero-orange">
                    PROFILE
                </span>

                <span class="profile-hero-green">
                    RSUD AR ROZY
                </span>

            </h1>


            <p class="profile-hero-description">

                Rumah Sakit Umum Daerah Ar Rozy
                Kota Probolinggo

            </p>


            {{-- HERO INFO --}}
            <div class="profile-hero-info">

                <div class="profile-hero-info-item">

                    <span class="profile-hero-info-icon">
                        <i class="bi bi-building"></i>
                    </span>

                    <div>
                        <small>
                            INSTANSI
                        </small>

                        <strong>
                            RSUD Ar Rozy
                        </strong>
                    </div>

                </div>


                <div class="profile-hero-info-item">

                    <span class="profile-hero-info-icon">
                        <i class="bi bi-geo-alt"></i>
                    </span>

                    <div>
                        <small>
                            WILAYAH
                        </small>

                        <strong>
                            Kota Probolinggo
                        </strong>
                    </div>

                </div>

            </div>

        </div>


        {{-- HERO BOTTOM --}}
        <div class="profile-hero-bottom">

            <div class="profile-hero-scroll">

                <span>
                    SCROLL UNTUK MELIHAT PROFIL
                </span>

                <i class="bi bi-arrow-down"></i>

            </div>

        </div>


        {{-- WAVE --}}
        <div class="profile-hero-wave">

            <svg
                viewBox="0 0 1440 150"
                preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg">

                <path
                    d="
                        M0,90
                        C180,145 330,20 520,65
                        C710,110 820,140 1010,70
                        C1180,8 1310,45 1440,85
                        L1440,150
                        L0,150
                        Z
                    ">
                </path>

            </svg>

        </div>

    </section>



    {{-- =====================================================
        TENTANG RSUD
    ====================================================== --}}
    <section
        id="tentang-rsud"
        class="profile-section profile-about">

        <div class="profile-container">

            <div class="profile-section-heading">

                <span class="profile-eyebrow">
                    PROFIL RUMAH SAKIT
                </span>

                <h2>
                    Tentang
                    <span>RSUD Ar Rozy</span>
                </h2>

                <p>
                    Mengenal lebih dekat Rumah Sakit Umum Daerah
                    Ar Rozy Kota Probolinggo.
                </p>

            </div>


            <div class="profile-about-card">

                <div class="profile-about-accent"></div>


                <div class="profile-about-content">

                    <div class="profile-about-icon">

                        <i class="bi bi-hospital"></i>

                    </div>


                    <div>

                        <h3>
                            RSUD Ar Rozy Kota Probolinggo
                        </h3>


                        <p>
                            Rumah Sakit Umum Daerah (RSUD) Ar Rozy Kota Probolinggo
                            adalah Rumah Sakit Umum Daerah milik Pemerintah Kota
                            Probolinggo yang diselenggarakan berdasarkan pola
                            pengelolaan keuangan Badan Layanan Umum Daerah.
                        </p>


                        <p>
                            RSUD Ar Rozy Kota Probolinggo senantiasa berupaya
                            memberikan pelayanan kesehatan secara menyeluruh,
                            profesional, berkualitas, dan berorientasi pada
                            kebutuhan masyarakat.
                        </p>

                    </div>

                </div>

            </div>


            <div class="profile-highlight-grid">

                <div class="profile-highlight-card">

                    <div class="profile-highlight-number">
                        01
                    </div>

                    <div class="profile-highlight-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h3>
                        Pelayanan Kesehatan
                    </h3>

                    <p>
                        Memberikan pelayanan kesehatan yang
                        menyeluruh kepada masyarakat.
                    </p>

                </div>


                <div class="profile-highlight-card">

                    <div class="profile-highlight-number">
                        02
                    </div>

                    <div class="profile-highlight-icon">
                        <i class="bi bi-person-check"></i>
                    </div>

                    <h3>
                        Profesionalisme
                    </h3>

                    <p>
                        Didukung tenaga kesehatan dan sumber daya
                        manusia yang profesional.
                    </p>

                </div>


                <div class="profile-highlight-card">

                    <div class="profile-highlight-number">
                        03
                    </div>

                    <div class="profile-highlight-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h3>
                        Mutu Pelayanan
                    </h3>

                    <p>
                        Berkomitmen memberikan pelayanan yang
                        aman, bermutu, dan berorientasi pada pasien.
                    </p>

                </div>


                <div class="profile-highlight-card">

                    <div class="profile-highlight-number">
                        04
                    </div>

                    <div class="profile-highlight-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <h3>
                        Untuk Masyarakat
                    </h3>

                    <p>
                        Hadir memberikan pelayanan kesehatan
                        terbaik bagi masyarakat Kota Probolinggo.
                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
        STRUKTUR ORGANISASI
    ====================================================== --}}
    <section
        id="struktur-organisasi"
        class="profile-section profile-structure">

        <div class="profile-container">

            <div class="profile-section-heading">

                <span class="profile-eyebrow">
                    ORGANISASI
                </span>

                <h2>
                    Susunan Struktur
                    <span>RSUD Ar Rozy Kota Probolinggo</span>
                </h2>

                <p>
                    Struktur organisasi sebagai gambaran pembagian
                    tugas, fungsi, kewenangan, dan koordinasi
                    di lingkungan RSUD Ar Rozy Kota Probolinggo.
                </p>

            </div>


            <div class="profile-structure-card">

                <div class="profile-structure-top">

                    <div>

                        <span>
                            STRUKTUR ORGANISASI
                        </span>

                        <h3>
                            RSUD Ar Rozy Kota Probolinggo
                        </h3>

                    </div>


                    <div class="profile-structure-badge">

                        <i class="bi bi-diagram-3"></i>

                    </div>

                </div>


                <div class="profile-structure-image-wrapper">

                    <img
                        src="{{ asset('img/struktur-org.jpg') }}"
                        alt="Struktur Organisasi RSUD Ar Rozy Kota Probolinggo"
                        class="profile-structure-image"
                        loading="lazy">

                </div>


                <div class="profile-structure-footer">

                    <div>

                        <i class="bi bi-info-circle"></i>

                        <span>
                            Struktur organisasi RSUD Ar Rozy
                            Kota Probolinggo.
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
        TUPOKSI
    ====================================================== --}}
    <section
        id="tugas-pokok-fungsi"
        class="profile-section profile-tupoksi">

        <div class="profile-container">

            <div class="profile-section-heading">

                <span class="profile-eyebrow">
                    ORGANISASI DAN TATA KERJA
                </span>

                <h2>
                    TUGAS POKOK
                    <span>DAN FUNGSI</span>
                </h2>

                <p>
                    Uraian tugas pokok dan fungsi unit kerja
                    di lingkungan RSUD Ar Rozy Kota Probolinggo.
                </p>

            </div>



            {{-- =================================================
                01 BAGIAN UMUM DAN KEUANGAN
            ================================================== --}}
            <article
                id="bagian-umum-keuangan"
                class="profile-tupoksi-card">

                <div class="profile-tupoksi-number">
                    01
                </div>


                <div class="profile-tupoksi-header">

                    <div class="profile-tupoksi-icon">
                        <i class="bi bi-building"></i>
                    </div>

                    <div>

                        <span>
                            UNIT KERJA
                        </span>

                        <h3>
                            Bagian Umum dan Keuangan
                        </h3>

                    </div>

                </div>


                <div class="profile-tupoksi-divider"></div>


                <div class="profile-tupoksi-block">

                    <div class="profile-tupoksi-block-title">

                        <span>
                            <i class="bi bi-briefcase"></i>
                        </span>

                        <h4>
                            Tugas
                        </h4>

                    </div>


                    <p>
                        Bagian Umum dan Keuangan mempunyai tugas membantu
                        Direktur dalam memimpin, melaksanakan kebijakan,
                        membina, mengarahkan, dan mengoordinasikan pelaksanaan
                        kegiatan di bidang umum dan keuangan, meliputi: fungsi
                        pengelolaan tata usaha, rumah tangga, hukum, hubungan
                        masyarakat dan pemasaran, keuangan, pelaporan dan
                        evaluasi, penelitian dan pengembangan, sumber daya
                        manusia, pendidikan dan pelatihan, serta mengoordinasikan
                        instalasi di bawahnya.
                    </p>

                </div>


                <div class="profile-tupoksi-block">

                    <div class="profile-tupoksi-block-title">

                        <span>
                            <i class="bi bi-list-check"></i>
                        </span>

                        <h4>
                            Fungsi
                        </h4>

                    </div>


                    <ol class="profile-function-list">

                        <li>
                            pengoordinasian pelaksanaan tugas dan fungsi di
                            bidang umum dan keuangan, meliputi: tata usaha,
                            rumah tangga, hukum, hubungan masyarakat dan
                            pemasaran, keuangan, pelaporan dan evaluasi,
                            penelitian dan pengembangan, sumber daya manusia,
                            pendidikan dan pelatihan, serta mengoordinasikan
                            instalasi di bawahnya;
                        </li>

                        <li>
                            pengoordinasian penyusunan bahan kebijakan teknis
                            di bidang umum dan keuangan, meliputi: tata usaha,
                            rumah tangga, hukum, hubungan masyarakat dan
                            pemasaran, keuangan, pelaporan dan evaluasi,
                            penelitian dan pengembangan, sumber daya manusia,
                            pendidikan dan pelatihan, serta mengoordinasikan
                            instalasi di bawahnya;
                        </li>

                        <li>
                            pengoordinasian pelaksanaan kegiatan di bidang umum
                            dan keuangan, meliputi: tata usaha, rumah tangga,
                            hukum, hubungan masyarakat dan pemasaran, keuangan,
                            pelaporan dan evaluasi, penelitian dan pengembangan,
                            sumber daya manusia, pendidikan dan pelatihan,
                            serta mengoordinasikan instalasi di bawahnya;
                        </li>

                        <li>
                            pembinaan, pengendalian dan pengawasan serta
                            pengkoordinasian di bidang umum dan keuangan,
                            meliputi: tata usaha, rumah tangga, hukum,
                            hubungan masyarakat dan pemasaran, keuangan,
                            pelaporan dan evaluasi, penelitian dan pengembangan,
                            sumber daya manusia, pendidikan dan pelatihan,
                            serta mengoordinasikan instalasi di bawahnya;
                        </li>

                        <li>
                            pengoordinasian pelayanan administrasi di bidang
                            umum dan keuangan, meliputi: tata usaha, rumah
                            tangga, hukum, hubungan masyarakat dan pemasaran,
                            keuangan, pelaporan dan evaluasi, penelitian dan
                            pengembangan, sumber daya manusia, pendidikan dan
                            pelatihan, serta mengoordinasikan instalasi
                            di bawahnya;
                        </li>

                        <li>
                            pengoordinasian evaluasi dan pelaporan pelaksanaan
                            di bidang umum dan keuangan, meliputi: tata usaha,
                            rumah tangga, hukum, hubungan masyarakat dan
                            pemasaran, keuangan, pelaporan dan evaluasi,
                            penelitian dan pengembangan, sumber daya manusia,
                            pendidikan dan pelatihan, serta mengoordinasikan
                            instalasi di bawahnya; dan
                        </li>

                        <li>
                            pelaksanaan tugas dinas lain yang diberikan oleh
                            Direktur sesuai dengan bidang tugasnya.
                        </li>

                    </ol>

                </div>

            </article>



            {{-- =================================================
                02 PELAYANAN MEDIK
            ================================================== --}}
            <article
                id="pelayanan-medik"
                class="profile-tupoksi-card">

                <div class="profile-tupoksi-number">
                    02
                </div>


                <div class="profile-tupoksi-header">

                    <div class="profile-tupoksi-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <div>

                        <span>
                            UNIT KERJA
                        </span>

                        <h3>
                            Bidang Pelayanan Medik, Penunjang Medik,
                            dan Pelayanan Kefarmasian
                        </h3>

                    </div>

                </div>


                <div class="profile-tupoksi-divider"></div>


                <div class="profile-tupoksi-block">

                    <div class="profile-tupoksi-block-title">

                        <span>
                            <i class="bi bi-briefcase"></i>
                        </span>

                        <h4>
                            Tugas
                        </h4>

                    </div>


                    <p>
                        Bidang Pelayanan Medik, Penunjang Medik, dan Pelayanan
                        Kefarmasian mempunyai tugas membantu Direktur dalam
                        memimpin, melaksanakan kebijakan, membina, mengarahkan,
                        dan mengoordinasikan pelaksanaan kegiatan di bidang
                        pelayanan medik, penunjang medik, dan pelayanan
                        kefarmasian.
                    </p>

                </div>


                <div class="profile-tupoksi-block">

                    <div class="profile-tupoksi-block-title">

                        <span>
                            <i class="bi bi-list-check"></i>
                        </span>

                        <h4>
                            Fungsi
                        </h4>

                    </div>


                    <ol class="profile-function-list">

                        <li>
                            melaksanakan perumusan kebijakan teknis di bidang
                            penyelenggaraan pelayanan medis, penunjang medis,
                            dan pelayanan kefarmasian berdasarkan peraturan
                            perundang-undangan dan kebijakan Direktur RSUD
                            Ar Rozy;
                        </li>

                        <li>
                            melaksanakan penyusunan program dan/atau kegiatan
                            pendukung di bidang penyelenggaraan pelayanan
                            medis, penunjang medis, dan pelayanan kefarmasian;
                        </li>

                        <li>
                            melaksanakan pengoordinasian dan penyelenggaraan
                            tugas pelayanan medis, penunjang medis, dan
                            pelayanan kefarmasian;
                        </li>

                        <li>
                            melaksanakan pembinaan dan pengendalian pelaksanaan
                            tugas pelayanan medis, penunjang medis, dan
                            pelayanan kefarmasian;
                        </li>

                        <li>
                            melaksanakan pemantauan, evaluasi dan pelaporan
                            kinerja di bidang penyelenggaraan pelayanan medis,
                            penunjang medis, dan pelayanan kefarmasian;
                        </li>

                        <li>
                            melaksanakan tugas kedinasan lain yang diberikan
                            oleh Direktur RSUD Ar Rozy sesuai dengan
                            bidang tugasnya.
                        </li>

                    </ol>

                </div>

            </article>



            {{-- =================================================
                03 KEPERAWATAN KEBIDANAN
            ================================================== --}}
            <article
                id="pelayanan-keperawatan"
                class="profile-tupoksi-card">

                <div class="profile-tupoksi-number">
                    03
                </div>


                <div class="profile-tupoksi-header">

                    <div class="profile-tupoksi-icon">
                        <i class="bi bi-person-hearts"></i>
                    </div>

                    <div>

                        <span>
                            UNIT KERJA
                        </span>

                        <h3>
                            Bidang Pelayanan Keperawatan,
                            Kebidanan, dan Pelayanan Penunjang
                        </h3>

                    </div>

                </div>


                <div class="profile-tupoksi-divider"></div>


                <div class="profile-tupoksi-block">

                    <div class="profile-tupoksi-block-title">

                        <span>
                            <i class="bi bi-briefcase"></i>
                        </span>

                        <h4>
                            Tugas
                        </h4>

                    </div>


                    <p>
                        Bidang Pelayanan Keperawatan, Kebidanan, dan Pelayanan
                        Penunjang mempunyai tugas membantu Direktur dalam
                        memimpin, melaksanakan kebijakan, membina, mengarahkan,
                        dan mengoordinasikan pelaksanaan kegiatan di bidang
                        pelayanan keperawatan, kebidanan, dan pelayanan
                        penunjang.
                    </p>

                </div>


                <div class="profile-tupoksi-block">

                    <div class="profile-tupoksi-block-title">

                        <span>
                            <i class="bi bi-list-check"></i>
                        </span>

                        <h4>
                            Fungsi
                        </h4>

                    </div>


                    <ol class="profile-function-list">

                        <li>
                            melaksanakan perumusan kebijakan teknis pelayanan
                            keperawatan, kebidanan dan pelayanan penunjang
                            berdasarkan peraturan perundangundangan dan
                            kebijakan Direktur;
                        </li>

                        <li>
                            melaksanakan penyusunan program dan/atau kegiatan
                            pendukung di bidang pelayanan keperawatan,
                            kebidanan, dan pelayanan penunjang;
                        </li>

                        <li>
                            melaksanakan pengoordinasian dan penyelenggaraan
                            tugas pelayanan keperawatan, kebidanan, dan
                            pelayanan penunjang;
                        </li>

                        <li>
                            melaksanakan pembinaan dan pengendalian pelaksanaan
                            tugas pelayanan keperawatan, kebidanan, dan
                            pelayanan penunjang;
                        </li>

                        <li>
                            melaksanakan pemantauan, evaluasi dan pelaporan
                            kinerja di bidang pelayanan keperawatan,
                            kebidanan, dan pelayanan penunjang;
                        </li>

                        <li>
                            melaksanakan tugas kedinasan lain yang diberikan
                            oleh Direktur sesuai dengan bidang tugasnya.
                        </li>

                    </ol>

                </div>

            </article>

        </div>

    </section>



    {{-- =====================================================
        FOOTER CTA
    ====================================================== --}}
    <section class="profile-bottom-cta">

        <div class="profile-bottom-cta-inner">

            <div class="profile-bottom-cta-icon">
                <i class="bi bi-hospital"></i>
            </div>

            <div>

                <span>
                    RSUD AR ROZY KOTA PROBOLINGGO
                </span>

                <h2>
                    Melayani dengan Profesional,
                    Sepenuh Hati.
                </h2>

            </div>


            <button
                type="button"
                class="profile-bottom-top"
                onclick="profileScrollTo('tentang-rsud')"
                aria-label="Kembali ke atas halaman">

                <i class="bi bi-arrow-up"></i>

            </button>

        </div>

    </section>

</div>



{{-- =========================================================
    PROFILE CSS
========================================================= --}}
<style>
    /* =====================================================
       FONT IMPORT

       'Plus Jakarta Sans'  -> font display / heading, tegas
       dan modern, dipakai untuk judul & angka besar.

       'Inter'              -> font body, nyaman dibaca untuk
       paragraf panjang (tugas & fungsi).
    ===================================================== */

    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap');


    /* =====================================================
   VARIABLES
===================================================== */

    .profile-page {

        /* --- warna brand (orange & green, khas RSUD Ar Rozy) --- */
        --profile-orange: #f97316;
        --profile-orange-light: #fb923c;
        --profile-green: #059669;
        --profile-green-dark: #047857;
        --profile-green-light: #34d399;

        /* --- warna netral --- */
        --profile-dark: #0f172a;
        --profile-text: #334155;
        --profile-muted: #64748b;
        --profile-surface: #f8fafc;
        --profile-border: rgba(15, 23, 42, .08);

        /* --- tipografi --- */
        --profile-font-display: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
        --profile-font-body: 'Inter', system-ui, -apple-system, sans-serif;

        font-family: var(--profile-font-body);
        color: var(--profile-text);
    }


    .profile-page * {
        scroll-behavior: smooth;
    }

    @media (prefers-reduced-motion: reduce) {

        .profile-page *,
        .profile-page *::before,
        .profile-page *::after {
            animation-duration: .001ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .001ms !important;
            scroll-behavior: auto !important;
        }

    }



    /* =====================================================
   HERO
===================================================== */

    .profile-hero {

        position: relative;

        min-height: 650px;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;

        background: #061c18;

        isolation: isolate;
    }


    /* =====================================================
   BUILDING PHOTO
===================================================== */

    .profile-hero-photo {

        position: absolute;

        inset: 0;

        z-index: -3;

        overflow: hidden;
    }


    .profile-hero-photo img {

        width: 100%;
        height: 100%;

        object-fit: cover;

        object-position: center;

        transform:
            scale(1.04);

        animation:
            profileHeroZoom 16s ease-in-out infinite alternate;
    }


    @keyframes profileHeroZoom {

        from {
            transform: scale(1.04);
        }

        to {
            transform: scale(1.10);
        }

    }



    /* =====================================================
   HERO OVERLAY
===================================================== */

    .profile-hero-overlay {
        position: absolute;
        inset: 0;
        z-index: -2;

        background:
            linear-gradient(90deg,
                rgba(3, 18, 15, .62) 0%,
                rgba(3, 24, 20, .38) 42%,
                rgba(3, 24, 20, .12) 72%,
                rgba(3, 24, 20, .05) 100%),

            linear-gradient(180deg,
                rgba(2, 15, 12, .08) 0%,
                rgba(2, 15, 12, .02) 55%,
                rgba(2, 15, 12, .28) 100%);
    }



    /* =====================================================
   CONTENT
===================================================== */

    .profile-hero-content {

        position: relative;

        z-index: 5;

        width: min(1180px, calc(100% - 40px));

        margin: 0 auto;

        padding:

            120px 60px 150px;

        text-align: left;
    }


    .profile-hero-badge {

        display: inline-flex;

        align-items: center;

        gap: 10px;

        padding:
            7px 16px 7px 7px;

        margin-bottom: 25px;

        border:
            1px solid rgba(255, 255, 255, .18);

        border-radius: 999px;

        color:
            rgba(255, 255, 255, .85);

        background:
            rgba(255, 255, 255, .08);

        backdrop-filter:
            blur(16px);

        -webkit-backdrop-filter:
            blur(16px);

        font-family: var(--profile-font-display);

        font-size: 10px;

        font-weight: 800;

        letter-spacing: .18em;

        box-shadow:
            0 15px 40px rgba(0, 0, 0, .15);
    }


    .profile-hero-badge-icon {

        width: 34px;
        height: 34px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        color: #fff;

        background:
            linear-gradient(135deg,
                var(--profile-orange),
                var(--profile-green));

        font-size: 15px;
    }



    /* =====================================================
   TITLE
===================================================== */

    .profile-hero-title {

        display: flex;

        flex-direction: column;

        margin: 0;

        font-family: var(--profile-font-display);

        font-size:
            clamp(52px,
                7vw,
                94px);

        line-height: .92;

        font-weight: 900;

        letter-spacing:
            -.06em;
    }


    .profile-hero-orange {

        color:
            var(--profile-orange-light);

        text-shadow:
            0 8px 35px rgba(249, 115, 22, .25);
    }


    .profile-hero-green {

        color:
            var(--profile-green-light);

        text-shadow:
            0 8px 35px rgba(52, 211, 153, .25);
    }



    /* =====================================================
   DESCRIPTION
===================================================== */

    .profile-hero-description {

        max-width: 570px;

        margin:
            27px 0 0;

        color:
            rgba(255, 255, 255, .80);

        font-size: 17px;

        line-height: 1.8;
    }



    /* =====================================================
   HERO INFO
===================================================== */

    .profile-hero-info {

        display: flex;

        flex-wrap: wrap;

        gap: 12px;

        margin-top: 32px;
    }


    .profile-hero-info-item {

        display: flex;

        align-items: center;

        gap: 11px;

        min-width: 190px;

        padding:
            10px 15px;

        border:
            1px solid rgba(255, 255, 255, .12);

        border-radius: 16px;

        background:
            rgba(0, 0, 0, .18);

        backdrop-filter:
            blur(12px);
    }


    .profile-hero-info-icon {

        width: 36px;
        height: 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 11px;

        color: #fff;

        background:
            rgba(16, 185, 129, .22);

        font-size: 15px;
    }


    .profile-hero-info-item small {

        display: block;

        margin-bottom: 2px;

        color:
            rgba(255, 255, 255, .48);

        font-family: var(--profile-font-display);

        font-size: 8px;

        font-weight: 800;

        letter-spacing: .15em;
    }


    .profile-hero-info-item strong {

        display: block;

        color: #fff;

        font-family: var(--profile-font-display);

        font-size: 12px;

        font-weight: 700;
    }



    /* =====================================================
   SCROLL
===================================================== */

    .profile-hero-bottom {

        position: absolute;

        z-index: 5;

        bottom: 105px;

        right: 45px;
    }


    .profile-hero-scroll {

        display: flex;

        align-items: center;

        gap: 12px;

        color:
            rgba(255, 255, 255, .62);

        font-family: var(--profile-font-display);

        font-size: 9px;

        font-weight: 800;

        letter-spacing: .16em;
    }


    .profile-hero-scroll i {

        animation:
            profileScrollArrow 1.5s ease-in-out infinite;
    }


    @keyframes profileScrollArrow {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(5px);
        }

    }



    /* =====================================================
   WAVE
===================================================== */

    .profile-hero-wave {

        position: absolute;

        left: 0;
        right: 0;

        bottom: -1px;

        z-index: 4;

        height: 115px;

        pointer-events: none;
    }


    .profile-hero-wave svg {

        width: 100%;
        height: 100%;

        display: block;
    }


    .profile-hero-wave path {

        fill: #fff;
    }



    /* =====================================================
   CONTAINER
===================================================== */

    .profile-container {

        width:
            min(1180px,
                calc(100% - 32px));

        margin-inline: auto;
    }



    /* =====================================================
   SECTIONS
    ===================================================== */

    .profile-page {
        --profile-scroll-offset: 140px;
    }

    .profile-section {
        position: relative;
        scroll-margin-top: var(--profile-scroll-offset);
    }

    .profile-tupoksi-card {
        scroll-margin-top: var(--profile-scroll-offset);
    }

    @media (max-width: 768px) {

        .profile-page {
            /* Quick access pindah ke bawah di mobile, jadi tidak
               perlu jarak seaman di desktop. */
            --profile-scroll-offset: 90px;
        }

    }


    .profile-about {

        padding:
            90px 0;

        background:
            radial-gradient(circle at 5% 20%,
                rgba(16, 185, 129, .07),
                transparent 28%),
            #fff;
    }


    .profile-structure {

        padding:
            95px 0;

        background:
            linear-gradient(180deg,
                var(--profile-surface),
                #fff);
    }


    .profile-tupoksi {

        padding:
            100px 0;

        background: #fff;
    }



    /* =====================================================
   SECTION HEADING
===================================================== */

    .profile-section-heading {

        max-width: 850px;

        margin:
            0 auto 48px;

        text-align: center;
    }


    .profile-eyebrow {

        display: inline-flex;

        align-items: center;

        gap: 9px;

        margin-bottom: 14px;

        color:
            var(--profile-green);

        font-family: var(--profile-font-display);

        font-size: 10px;

        font-weight: 900;

        letter-spacing: .18em;
    }


    .profile-eyebrow::before,
    .profile-eyebrow::after {

        content: "";

        width: 25px;

        height: 1px;

        background:
            currentColor;

        opacity: .45;
    }


    .profile-section-heading h2 {

        margin: 0;

        color:
            var(--profile-dark);

        font-family: var(--profile-font-display);

        font-size:
            clamp(28px,
                4vw,
                46px);

        line-height: 1.1;

        font-weight: 900;

        letter-spacing: -.04em;
    }


    .profile-section-heading h2 span {

        color:
            var(--profile-green);
    }


    .profile-section-heading p {

        max-width: 700px;

        margin:
            17px auto 0;

        color:
            var(--profile-muted);

        font-size: 14px;

        line-height: 1.8;
    }



    /* =====================================================
   ABOUT CARD
===================================================== */

    .profile-about-card {

        position: relative;

        overflow: hidden;

        padding: 38px;

        border:
            1px solid var(--profile-border);

        border-radius: 28px;

        background:
            linear-gradient(135deg,
                #fff,
                var(--profile-surface));

        box-shadow:
            0 20px 60px rgba(15, 23, 42, .07);
    }


    .profile-about-accent {

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 4px;

        background:
            linear-gradient(90deg,
                var(--profile-orange),
                var(--profile-green));
    }


    .profile-about-content {

        display: grid;

        grid-template-columns:
            72px 1fr;

        gap: 25px;
    }


    .profile-about-icon {

        width: 72px;
        height: 72px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 22px;

        color: white;

        background:
            linear-gradient(135deg,
                var(--profile-orange),
                var(--profile-green));

        font-size: 30px;
    }


    .profile-about-content h3 {

        margin:
            0 0 14px;

        color:
            var(--profile-dark);

        font-family: var(--profile-font-display);

        font-size: 25px;

        font-weight: 800;
    }


    .profile-about-content p {

        margin:
            0 0 14px;

        color:
            var(--profile-text);

        font-size: 14px;

        line-height: 1.9;
    }



    /* =====================================================
   HIGHLIGHT
===================================================== */

    .profile-highlight-grid {

        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 16px;

        margin-top: 18px;
    }


    .profile-highlight-card {

        position: relative;

        overflow: hidden;

        min-height: 215px;

        padding: 27px;

        border:
            1px solid var(--profile-border);

        border-radius: 23px;

        background: #fff;

        transition:
            .35s ease;
    }


    .profile-highlight-card:hover {

        transform:
            translateY(-7px);

        border-color:
            rgba(5, 150, 105, .25);

        box-shadow:
            0 22px 45px rgba(15, 23, 42, .10);
    }


    .profile-highlight-number {

        position: absolute;

        top: 18px;
        right: 22px;

        color:
            #e2e8f0;

        font-family: var(--profile-font-display);

        font-size: 38px;

        font-weight: 900;
    }


    .profile-highlight-icon {

        width: 48px;
        height: 48px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin-bottom: 20px;

        border-radius: 15px;

        color:
            var(--profile-green);

        background:
            rgba(5, 150, 105, .09);

        font-size: 22px;
    }


    .profile-highlight-card h3 {

        margin:
            0 0 9px;

        color:
            var(--profile-dark);

        font-family: var(--profile-font-display);

        font-size: 17px;

        font-weight: 800;
    }


    .profile-highlight-card p {

        margin: 0;

        color:
            var(--profile-muted);

        font-size: 12px;

        line-height: 1.75;
    }



    /* =====================================================
   STRUCTURE
===================================================== */

    .profile-structure-card {

        overflow: hidden;

        border:
            1px solid var(--profile-border);

        border-radius: 28px;

        background: #fff;

        box-shadow:
            0 24px 70px rgba(15, 23, 42, .08);
    }


    .profile-structure-top {

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding:
            28px 32px;

        border-bottom:
            1px solid var(--profile-border);
    }


    .profile-structure-top span {

        display: block;

        margin-bottom: 6px;

        color:
            var(--profile-green);

        font-family: var(--profile-font-display);

        font-size: 9px;

        font-weight: 900;

        letter-spacing: .18em;
    }


    .profile-structure-top h3 {

        margin: 0;

        color:
            var(--profile-dark);

        font-family: var(--profile-font-display);

        font-size: 20px;

        font-weight: 800;
    }


    .profile-structure-badge {

        width: 50px;
        height: 50px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 16px;

        color: #fff;

        background:
            linear-gradient(135deg,
                var(--profile-orange),
                var(--profile-green));

        font-size: 21px;
    }


    .profile-structure-image-wrapper {

        padding: 25px;

        background:
            linear-gradient(135deg,
                var(--profile-surface),
                #eef2f7);
    }


    .profile-structure-image {

        display: block;

        width: 100%;

        height: auto;

        max-height: 850px;

        object-fit: contain;

        margin: auto;

        border-radius: 18px;

        background: #fff;

        box-shadow:
            0 15px 45px rgba(15, 23, 42, .10);
    }


    .profile-structure-footer {

        padding:
            18px 28px;

        color:
            var(--profile-muted);

        font-size: 12px;

        border-top:
            1px solid var(--profile-border);
    }


    .profile-structure-footer div {

        display: flex;

        align-items: center;

        gap: 8px;
    }


    .profile-structure-footer i {

        color:
            var(--profile-green);
    }



    /* =====================================================
   TUPOKSI
===================================================== */

    .profile-tupoksi-card {

        position: relative;

        overflow: hidden;

        margin-bottom: 24px;

        padding: 34px;

        border:
            1px solid var(--profile-border);

        border-radius: 28px;

        background: #fff;

        box-shadow:
            0 15px 45px rgba(15, 23, 42, .06);

        scroll-margin-top: 30px;

        transition:
            .35s ease;
    }


    .profile-tupoksi-card:hover {

        border-color:
            rgba(5, 150, 105, .2);

        box-shadow:
            0 25px 65px rgba(15, 23, 42, .09);
    }


    .profile-tupoksi-number {

        position: absolute;

        top: 20px;
        right: 28px;

        color:
            #f1f5f9;

        font-family: var(--profile-font-display);

        font-size: 65px;

        font-weight: 900;

        line-height: 1;
    }


    .profile-tupoksi-header {

        position: relative;

        z-index: 1;

        display: flex;

        align-items: center;

        gap: 20px;

        padding-right: 70px;
    }


    .profile-tupoksi-icon {

        width: 65px;
        height: 65px;

        flex-shrink: 0;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 20px;

        color: white;

        background:
            linear-gradient(135deg,
                var(--profile-orange),
                var(--profile-green));

        font-size: 27px;
    }


    .profile-tupoksi-header span {

        display: block;

        margin-bottom: 5px;

        color:
            var(--profile-green);

        font-family: var(--profile-font-display);

        font-size: 9px;

        font-weight: 900;

        letter-spacing: .17em;
    }


    .profile-tupoksi-header h3 {

        margin: 0;

        color:
            var(--profile-dark);

        font-family: var(--profile-font-display);

        font-size: 24px;

        line-height: 1.3;

        font-weight: 800;
    }


    .profile-tupoksi-divider {

        height: 1px;

        margin:
            30px 0;

        background:
            linear-gradient(90deg,
                rgba(5, 150, 105, .25),
                rgba(15, 23, 42, .05),
                transparent);
    }


    .profile-tupoksi-block {

        margin-top: 28px;
    }


    .profile-tupoksi-block-title {

        display: flex;

        align-items: center;

        gap: 11px;

        margin-bottom: 14px;
    }


    .profile-tupoksi-block-title span {

        width: 34px;
        height: 34px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        color:
            var(--profile-green);

        background:
            rgba(5, 150, 105, .09);
    }


    .profile-tupoksi-block-title h4 {

        margin: 0;

        color:
            var(--profile-dark);

        font-family: var(--profile-font-display);

        font-size: 15px;

        font-weight: 800;
    }


    .profile-tupoksi-block>p {

        margin: 0;

        color:
            var(--profile-text);

        font-size: 14px;

        line-height: 1.9;
    }



    /* =====================================================
   FUNCTION LIST
===================================================== */

    .profile-function-list {

        margin: 0;

        padding: 0;

        list-style: none;

        counter-reset:
            profile-function;
    }


    .profile-function-list li {

        position: relative;

        counter-increment:
            profile-function;

        display: grid;

        grid-template-columns:
            38px 1fr;

        gap: 13px;

        margin-bottom: 13px;

        padding:
            15px 17px;

        border:
            1px solid rgba(15, 23, 42, .055);

        border-radius: 15px;

        color:
            var(--profile-text);

        background:
            var(--profile-surface);

        font-size: 13px;

        line-height: 1.85;
    }


    .profile-function-list li::before {

        content:
            counter(profile-function,
                lower-alpha);

        width: 29px;
        height: 29px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 9px;

        color:
            var(--profile-green);

        background:
            rgba(5, 150, 105, .10);

        font-family: var(--profile-font-display);

        font-size: 12px;

        font-weight: 900;
    }



    /* =====================================================
   CTA
===================================================== */

    .profile-bottom-cta {

        padding:
            30px 0 60px;

        background: #fff;
    }


    .profile-bottom-cta-inner {

        width:
            min(1180px,
                calc(100% - 32px));

        margin-inline: auto;

        display: flex;

        align-items: center;

        gap: 20px;

        padding:
            28px 30px;

        border-radius: 24px;

        background:
            linear-gradient(135deg,
                var(--profile-dark),
                var(--profile-green-dark));

        box-shadow:
            0 25px 60px rgba(15, 23, 42, .18);
    }


    .profile-bottom-cta-icon {

        width: 54px;
        height: 54px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 16px;

        color: #fff;

        background:
            rgba(255, 255, 255, .12);

        font-size: 23px;
    }


    .profile-bottom-cta-inner span {

        display: block;

        margin-bottom: 5px;

        color:
            rgba(255, 255, 255, .55);

        font-family: var(--profile-font-display);

        font-size: 9px;

        font-weight: 900;

        letter-spacing: .18em;
    }


    .profile-bottom-cta-inner h2 {

        margin: 0;

        color: #fff;

        font-family: var(--profile-font-display);

        font-size: 21px;

        font-weight: 800;
    }


    .profile-bottom-top {

        width: 45px;
        height: 45px;

        margin-left: auto;

        display: flex;

        align-items: center;
        justify-content: center;

        border:
            1px solid rgba(255, 255, 255, .12);

        border-radius: 14px;

        color: white;

        background:
            rgba(255, 255, 255, .08);

        cursor: pointer;

        transition:
            .25s ease;
    }


    .profile-bottom-top:hover {

        background:
            rgba(255, 255, 255, .18);
    }



    /* =====================================================
   QUICK ACCESS
===================================================== */

    #profileQuickAccess {

        position: fixed;

        top: 50%;

        right: 0;

        z-index: 9998;

        transform:
            translateY(-50%);

        font-family: var(--profile-font-body, 'Inter', sans-serif);
    }


    /* =================================================
       PANEL — kondisi terbuka (default)

       Catatan penting: panel TIDAK PERNAH digeser sebagian
       (translateX parsial) seperti versi sebelumnya, karena
       itu menyebabkan konten (ikon & label) terlihat terpotong
       di tepi layar pada mobile. Sekarang transisi antara
       kondisi terbuka <-> tertutup dilakukan dengan mengubah
       *ukuran & bentuk* panel secara utuh (persegi panjang
       rounded -> lingkaran FAB), bukan menggesernya keluar
       layar sebagian.
    ================================================== */

    #profileQuickAccess .ppid-quick-panel {

        width: 285px;

        overflow: hidden;

        border:
            1px solid rgba(15, 23, 42, .08);

        border-right: 0;

        border-radius:
            24px 0 0 24px;

        background:
            rgba(255, 255, 255, .97);

        backdrop-filter:
            blur(20px);

        box-shadow:
            0 25px 70px rgba(15, 23, 42, .16);

        transition:
            width .35s cubic-bezier(.22, 1, .36, 1),
            border-radius .35s ease,
            border-color .35s ease,
            box-shadow .35s ease;
    }


    /* =================================================
       PANEL — kondisi tertutup (FAB bulat)
    ================================================== */

    #profileQuickAccess.is-collapsed .ppid-quick-panel {

        width: 60px;

        border: 1px solid rgba(15, 23, 42, .08);

        border-radius: 999px;

        box-shadow:
            0 18px 40px rgba(15, 23, 42, .20);
    }


    #profileQuickAccess .ppid-quick-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        min-height: 76px;

        padding:
            14px 12px 14px 17px;

        border-bottom:
            1px solid rgba(15, 23, 42, .07);

        transition:
            padding .3s ease,
            min-height .3s ease,
            border-color .3s ease;
    }


    /*
     * Saat collapsed, brand/logo disembunyikan dan header
     * menyusut menjadi lingkaran berisi tombol toggle saja
     * (tidak ada konten yang "kepotong").
     */
    #profileQuickAccess.is-collapsed .ppid-quick-header {

        justify-content: center;

        min-height: 60px;

        padding: 0;

        border-bottom-color: transparent;
    }


    #profileQuickAccess.is-collapsed .ppid-quick-brand {

        display: none;
    }


    #profileQuickAccess .ppid-quick-toggle {

        width: 36px;
        height: 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border: 0;

        border-radius: 12px;

        color: #475569;

        background: var(--profile-surface, #f1f5f9);

        cursor: pointer;

        font-size: 15px;

        transition:
            .25s ease;
    }


    #profileQuickAccess .ppid-quick-toggle:hover {

        color:
            var(--profile-green, #059669);

        background:
            rgba(5, 150, 105, .08);
    }


    #profileQuickAccess.is-collapsed .ppid-quick-toggle {

        width: 60px;
        height: 60px;

        border-radius: 999px;

        color: #fff;

        background:
            linear-gradient(135deg,
                var(--profile-orange, #f97316),
                var(--profile-green, #059669));

        font-size: 20px;
    }


    #profileQuickAccess .ppid-quick-toggle i {

        transition:
            transform .3s ease;
    }


    #profileQuickAccess.is-collapsed .ppid-quick-toggle i {

        transform:
            rotate(180deg);
    }


    /*
     * Nav disembunyikan secara halus (bukan dipotong tepi
     * layar) memakai max-height + opacity, supaya transisinya
     * tetap rapi dan tidak pernah menampilkan teks yang
     * terpenggal.
     */
    #profileQuickAccess .ppid-quick-nav {

        padding: 10px;

        max-height: 70vh;

        opacity: 1;

        overflow-y: auto;

        transition:
            max-height .35s ease,
            opacity .25s ease,
            padding .3s ease;
    }


    #profileQuickAccess.is-collapsed .ppid-quick-nav {

        max-height: 0;

        opacity: 0;

        padding: 0 10px;

        pointer-events: none;

        overflow: hidden;
    }


    #profileQuickAccess .ppid-quick-link {

        width: 100%;

        display: flex;

        align-items: center;

        gap: 11px;

        min-height: 48px;

        padding:
            7px 10px;

        border: 0;

        border-radius: 14px;

        color: #475569;

        background: transparent;

        text-decoration: none;

        font-size: 13px;

        font-weight: 650;

        cursor: pointer;

        transition:
            .25s ease;
    }


    #profileQuickAccess .ppid-quick-link:hover,
    #profileQuickAccess .ppid-quick-link.active {

        color:
            var(--profile-green, #059669);

        background:
            rgba(5, 150, 105, .08);
    }


    #profileQuickAccess .ppid-quick-icon {

        width: 31px;
        height: 31px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        color:
            var(--profile-green, #059669);

        background:
            rgba(5, 150, 105, .08);
    }


    #profileQuickAccess .ppid-quick-label {

        flex: 1;

        text-align: left;
    }


    #profileQuickAccess .ppid-quick-arrow {

        font-size: 12px;

        transition:
            transform .3s ease;
    }


    #profileQuickAccess .ppid-quick-group.open .ppid-quick-arrow {

        transform:
            rotate(180deg);
    }


    #profileQuickAccess .ppid-quick-submenu {

        display: grid;

        gap: 3px;

        max-height: 0;

        overflow: hidden;

        padding-left: 15px;

        transition:
            max-height .4s ease,
            padding .4s ease;
    }


    #profileQuickAccess .ppid-quick-group.open .ppid-quick-submenu {

        max-height: 300px;

        padding:
            4px 0 5px 15px;
    }


    #profileQuickAccess .ppid-quick-subitem {

        display: grid;

        grid-template-columns:
            28px 1fr;

        align-items: center;

        gap: 8px;

        min-height: 40px;

        padding:
            5px 9px;

        border-radius: 11px;

        color: #64748b;

        text-decoration: none;

        font-size: 11px;

        transition:
            .25s ease;
    }


    #profileQuickAccess .ppid-quick-subitem span {

        width: 25px;
        height: 25px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 8px;

        color:
            var(--profile-green, #059669);

        background:
            rgba(5, 150, 105, .08);

        font-family: var(--profile-font-display, 'Plus Jakarta Sans', sans-serif);

        font-size: 9px;

        font-weight: 900;
    }


    #profileQuickAccess .ppid-quick-subitem small {

        font-size: 10px;

        line-height: 1.35;
    }


    #profileQuickAccess .ppid-quick-subitem:hover,
    #profileQuickAccess .ppid-quick-subitem.active {

        color:
            var(--profile-green, #059669);

        background:
            rgba(5, 150, 105, .07);
    }



    /* =====================================================
   RESPONSIVE
===================================================== */

    @media (max-width: 1024px) {

        .profile-highlight-grid {

            grid-template-columns:
                repeat(2, 1fr);

        }

    }


    @media (max-width: 768px) {

        .profile-hero {

            min-height: 620px;

        }


        .profile-hero-content {

            width:
                calc(100% - 30px);

            padding:
                100px 20px 150px;

            text-align: center;
        }


        .profile-hero-title {

            font-size:
                clamp(42px,
                    10vw,
                    65px);

        }


        .profile-hero-description {

            margin-left: auto;
            margin-right: auto;

            font-size: 14px;

        }


        .profile-hero-info {

            justify-content: center;

        }


        .profile-hero-bottom {

            right: auto;
            left: 50%;

            transform:
                translateX(-50%);

            bottom: 90px;

        }


        .profile-about,
        .profile-structure,
        .profile-tupoksi {

            padding:
                70px 0;

        }


        .profile-about-content {

            grid-template-columns: 1fr;

        }


        .profile-about-icon {

            width: 58px;
            height: 58px;

            font-size: 24px;

        }


        .profile-highlight-grid {

            grid-template-columns: 1fr;

        }


        .profile-tupoksi-card {

            padding:
                25px 20px;

        }


        .profile-tupoksi-header {

            align-items:
                flex-start;

            padding-right: 35px;

        }


        .profile-tupoksi-icon {

            width: 54px;
            height: 54px;

            border-radius: 16px;

            font-size: 22px;

        }


        .profile-tupoksi-header h3 {

            font-size: 18px;

        }


        .profile-structure-image-wrapper {

            padding: 12px;

        }


        #profileQuickAccess {

            top: auto;

            bottom: 20px;

            right: 14px;

            transform: none;

        }

        #profileQuickAccess .ppid-quick-panel {

            border-right: 1px solid rgba(15, 23, 42, .08);

            border-radius: 24px;

        }

        #profileQuickAccess.is-collapsed .ppid-quick-panel {

            border-radius: 999px;

        }

    }


    @media (max-width: 480px) {

        .profile-hero {

            min-height: 570px;

        }


        .profile-hero-content {

            padding:
                85px 15px 135px;

        }


        .profile-hero-badge {

            font-size: 8px;

            letter-spacing: .11em;

        }


        .profile-hero-title {

            font-size: 40px;

        }


        .profile-hero-info-item {

            min-width: 165px;

        }


        .profile-hero-scroll {

            font-size: 8px;

        }


        .profile-section-heading h2 {

            font-size: 29px;

        }


        .profile-bottom-cta-icon {

            display: none;

        }


        .profile-bottom-cta-inner h2 {

            font-size: 17px;

        }

    }
</style>



{{-- =========================================================
    JAVASCRIPT
========================================================= --}}
<script>
    document.addEventListener(
        'DOMContentLoaded',
        function() {

            /* =================================================
               ELEMENT
            ================================================= */

            const quickAccess =
                document.getElementById(
                    'profileQuickAccess'
                );

            const toggleButton =
                document.getElementById(
                    'toggleProfileQuickAccess'
                );

            const backToTop =
                document.getElementById(
                    'profileBackToTop'
                );

            const targetLinks =
                document.querySelectorAll(
                    '[data-profile-target]'
                );

            const parentButtons =
                document.querySelectorAll(
                    '[data-profile-parent]'
                );


            /* =================================================
               INITIAL STATE — QUICK ACCESS

               Di layar mobile, panel dimulai dalam kondisi
               collapsed (FAB bulat) supaya tidak menutupi
               konten halaman. Di desktop, panel dimulai
               terbuka seperti biasa.
            ================================================= */

            if (
                quickAccess &&
                toggleButton &&
                window.innerWidth <= 768
            ) {

                quickAccess.classList.add(
                    'is-collapsed'
                );

                toggleButton.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            /* =================================================
               TOGGLE QUICK ACCESS
            ================================================= */

            if (
                quickAccess &&
                toggleButton
            ) {

                toggleButton.addEventListener(
                    'click',
                    function(event) {

                        event.preventDefault();
                        event.stopPropagation();

                        const isCollapsed =
                            quickAccess.classList.toggle(
                                'is-collapsed'
                            );


                        toggleButton.setAttribute(
                            'aria-expanded',
                            String(!isCollapsed)
                        );

                    }
                );

            }


            /* =================================================
               SUBMENU TUPOKSI
            ================================================= */

            parentButtons.forEach(
                function(button) {

                    button.addEventListener(
                        'click',
                        function(event) {

                            event.preventDefault();
                            event.stopPropagation();

                            const group =
                                button.closest(
                                    '.ppid-quick-group'
                                );

                            if (!group) return;

                            group.classList.toggle(
                                'open'
                            );

                        }
                    );

                }
            );


            /* =================================================
               SCROLL TO SECTION
            ================================================= */

            window.profileScrollTo =
                function(targetId) {

                    const target =
                        document.getElementById(
                            targetId
                        );

                    if (!target) return;


                    /*
                     * Jarak section dari bagian atas viewport.
                     *
                     * Nilai ini SINKRON dengan variabel CSS
                     * --profile-scroll-offset (140px desktop,
                     * 90px mobile) supaya posisi berhenti scroll
                     * selalu pas — tidak kependekan (heading
                     * ketutup) atau kepanjangan (jarak kosong
                     * berlebih) baik saat pindah section biasa
                     * maupun saat dituju lewat Quick Access.
                     */
                    const offset =
                        window.innerWidth <= 768 ?
                        90 :
                        140;


                    const position =
                        target.getBoundingClientRect().top +
                        window.scrollY -
                        offset;


                    window.scrollTo({

                        top: Math.max(
                            position,
                            0
                        ),

                        behavior: 'smooth'

                    });

                };


            /* =================================================
               QUICK ACCESS LINKS
            ================================================= */

            targetLinks.forEach(
                function(link) {

                    link.addEventListener(
                        'click',
                        function(event) {

                            event.preventDefault();


                            const targetId =
                                link.getAttribute(
                                    'data-profile-target'
                                );


                            if (!targetId) return;


                            /*
                             * Scroll ke section
                             */
                            profileScrollTo(
                                targetId
                            );


                            /*
                             * Update URL hash
                             */
                            history.pushState(
                                null,
                                '',
                                '#' + targetId
                            );


                            /*
                             * Di mobile,
                             * quick access otomatis minimize.
                             */
                            if (
                                quickAccess &&
                                window.innerWidth <= 768
                            ) {

                                quickAccess.classList.add(
                                    'is-collapsed'
                                );


                                if (toggleButton) {

                                    toggleButton.setAttribute(
                                        'aria-expanded',
                                        'false'
                                    );

                                }

                            }

                        }
                    );

                }
            );


            /* =================================================
               BACK TO TOP
            ================================================= */

            if (backToTop) {

                backToTop.addEventListener(
                    'click',
                    function(event) {

                        event.preventDefault();


                        window.scrollTo({

                            top: 0,

                            behavior: 'smooth'

                        });


                        history.pushState(
                            null,
                            '',
                            window.location.pathname
                        );

                    }
                );

            }


            /* =================================================
               ACTIVE NAVIGATION — PROFILE
            ================================================= */

            const profileNavigationTargets = [

                {
                    id: 'tentang-rsud',
                    type: 'main'
                },

                {
                    id: 'struktur-organisasi',
                    type: 'main'
                },

                {
                    id: 'tugas-pokok-fungsi',
                    type: 'parent'
                },

                {
                    id: 'bagian-umum-keuangan',
                    type: 'child'
                },

                {
                    id: 'pelayanan-medik',
                    type: 'child'
                },

                {
                    id: 'pelayanan-keperawatan',
                    type: 'child'
                }

            ];


            /* =================================================
               CLEAR ACTIVE
            ================================================= */

            function clearProfileActive() {

                document
                    .querySelectorAll(
                        '#profileQuickAccess .ppid-quick-link,' +
                        '#profileQuickAccess .ppid-quick-subitem'
                    )
                    .forEach(
                        function(item) {

                            item.classList.remove(
                                'active'
                            );

                        }
                    );

            }


            /* =================================================
               SET ACTIVE NAVIGATION
            ================================================= */

            function setProfileActive(
                id,
                type
            ) {

                clearProfileActive();


                /* ---------------------------------------------
                   MAIN
                --------------------------------------------- */

                if (
                    type === 'main'
                ) {

                    const link =
                        document.querySelector(
                            '[data-profile-target="' +
                            id +
                            '"]'
                        );


                    if (link) {

                        link.classList.add(
                            'active'
                        );

                    }


                    return;

                }


                /* ---------------------------------------------
                   TUPOKSI PARENT
                --------------------------------------------- */

                if (
                    type === 'parent'
                ) {

                    const parent =
                        document.querySelector(
                            '[data-profile-parent="tupoksi"]'
                        );


                    if (parent) {

                        parent.classList.add(
                            'active'
                        );


                        const group =
                            parent.closest(
                                '.ppid-quick-group'
                            );


                        if (group) {

                            group.classList.add(
                                'open'
                            );

                        }

                    }


                    return;

                }


                /* ---------------------------------------------
                   TUPOKSI CHILD
                --------------------------------------------- */

                if (
                    type === 'child'
                ) {

                    const child =
                        document.querySelector(
                            '[data-profile-target="' +
                            id +
                            '"]'
                        );


                    if (child) {

                        child.classList.add(
                            'active'
                        );

                    }


                    /*
                     * Parent TUPOKSI ikut aktif
                     */
                    const parent =
                        document.querySelector(
                            '[data-profile-parent="tupoksi"]'
                        );


                    if (parent) {

                        parent.classList.add(
                            'active'
                        );


                        const group =
                            parent.closest(
                                '.ppid-quick-group'
                            );


                        if (group) {

                            group.classList.add(
                                'open'
                            );

                        }

                    }

                }

            }


            /* =================================================
               UPDATE ACTIVE NAVIGATION
            ================================================= */

            function updateActiveNavigation() {

                /*
                 * Garis trigger berada pada 30% viewport.
                 *
                 * Jadi section dianggap aktif ketika bagian
                 * atas section sudah mencapai area ini.
                 */
                const triggerLine =
                    window.scrollY +
                    (
                        window.innerHeight *
                        0.30
                    );


                /*
                 * Default:
                 * Tentang RSUD
                 */
                let current =
                    profileNavigationTargets[0];


                /* ---------------------------------------------
                   CARI SECTION UTAMA
                --------------------------------------------- */

                profileNavigationTargets.forEach(
                    function(item) {

                        const element =
                            document.getElementById(
                                item.id
                            );


                        if (!element) return;


                        const elementTop =
                            element.getBoundingClientRect().top +
                            window.scrollY;


                        if (
                            elementTop <=
                            triggerLine
                        ) {

                            current = item;

                        }

                    }
                );


                /* ---------------------------------------------
                   TUPOKSI
                --------------------------------------------- */

                const tupoksiSection =
                    document.getElementById(
                        'tugas-pokok-fungsi'
                    );


                if (tupoksiSection) {

                    const tupoksiTop =
                        tupoksiSection.getBoundingClientRect().top +
                        window.scrollY;


                    /*
                     * Sudah masuk section TUPOKSI
                     */
                    if (
                        triggerLine >=
                        tupoksiTop
                    ) {

                        current = {

                            id: 'tugas-pokok-fungsi',

                            type: 'parent'

                        };


                        /* -------------------------------------
                           TUPOKSI CHILDREN
                        ------------------------------------- */

                        const tupoksiChildren = [

                            'bagian-umum-keuangan',

                            'pelayanan-medik',

                            'pelayanan-keperawatan'

                        ];


                        tupoksiChildren.forEach(
                            function(id) {

                                const child =
                                    document.getElementById(
                                        id
                                    );


                                if (!child) return;


                                const childTop =
                                    child.getBoundingClientRect().top +
                                    window.scrollY;


                                /*
                                 * Child sudah mencapai
                                 * garis trigger
                                 */
                                if (
                                    childTop <=
                                    triggerLine
                                ) {

                                    current = {

                                        id: id,

                                        type: 'child'

                                    };

                                }

                            }
                        );

                    }

                }


                /* ---------------------------------------------
                   TERAPKAN ACTIVE
                --------------------------------------------- */

                setProfileActive(
                    current.id,
                    current.type
                );

            }


            /* =================================================
               SCROLL EVENT
            ================================================= */

            let profileScrollTick =
                false;


            window.addEventListener(
                'scroll',
                function() {

                    /*
                     * Batasi eksekusi supaya tidak terlalu
                     * berat ketika user scrolling cepat.
                     */
                    if (
                        profileScrollTick
                    ) {

                        return;

                    }


                    profileScrollTick =
                        true;


                    window.requestAnimationFrame(
                        function() {

                            updateActiveNavigation();

                            profileScrollTick =
                                false;

                        }
                    );

                }, {
                    passive: true
                }
            );


            /* =================================================
               RESIZE
            ================================================= */

            window.addEventListener(
                'resize',
                function() {

                    updateActiveNavigation();

                }
            );


            /* =================================================
               INITIAL ACTIVE
            ================================================= */

            updateActiveNavigation();


            /* =================================================
               HASH ON LOAD
            ================================================= */

            const hash =
                window.location.hash
                .replace(
                    '#',
                    ''
                );


            if (hash) {

                setTimeout(
                    function() {

                        profileScrollTo(
                            hash
                        );

                    },
                    300
                );

            }


            /* =================================================
               POPSTATE
            ================================================= */

            window.addEventListener(
                'popstate',
                function() {

                    const currentHash =
                        window.location.hash
                        .replace(
                            '#',
                            ''
                        );


                    if (currentHash) {

                        profileScrollTo(
                            currentHash
                        );

                    }

                }
            );

        }
    );
</script>

@endsection
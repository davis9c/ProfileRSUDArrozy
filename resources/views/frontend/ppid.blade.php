@extends('frontend.layouts.app')

@section('content')

<div id="ppidQuickAccess">

    <div class="ppid-quick-panel">


        <!-- =====================================================
             HEADER
             ====================================================== -->

        <div class="ppid-quick-header">

            <button
                id="togglePpidQuickAccess"
                class="ppid-quick-toggle"
                type="button"
                aria-label="Minimalkan navigasi PPID"
                aria-expanded="true">

                <i class="fas fa-times"></i>

            </button>


            <div class="ppid-quick-title">

                <h4>
                    PPID
                </h4>

                <p>
                    Navigasi Cepat
                </p>

            </div>

        </div>


        <!-- =====================================================
             MAIN NAVIGATION
            ====================================================== -->

        <nav class="ppid-quick-main-menu">


            <!-- =================================================
                 TENTANG PPID
                ================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidAboutGroup">


                <button
                    type="button"
                    class="ppid-quick-main-item"
                    id="ppidAboutToggle"
                    aria-expanded="false">

                    <i class="fas fa-info-circle"></i>

                    <span>
                        Tentang PPID
                    </span>

                    <i class="fas fa-chevron-right ppid-menu-arrow"></i>

                </button>

                <!-- =============================================
                     SUB MENU TENTANG PPID
                    ============================================== -->

                <div class="ppid-quick-submenu">

                    <div class="ppid-quick-submenu-inner">


                        <a
                            href="#tentang-ppid"
                            class="ppid-quick-subitem"
                            data-section="tentang-ppid">

                            <i class="fas fa-building"></i>

                            <span>
                                Tentang PPID RSUD Ar Rozy
                            </span>

                        </a>


                        <a
                            href="#visi-misi"
                            class="ppid-quick-subitem"
                            data-section="visi-misi">

                            <i class="fas fa-bullseye"></i>

                            <span>
                                Visi & Misi
                            </span>

                        </a>


                        <a
                            href="#struktur-organisasi"
                            class="ppid-quick-subitem"
                            data-section="struktur-organisasi">

                            <i class="fas fa-sitemap"></i>

                            <span>
                                Struktur Organisasi
                            </span>

                        </a>


                        <a
                            href="#kontak-ppid"
                            class="ppid-quick-subitem"
                            data-section="kontak-ppid">

                            <i class="fas fa-address-book"></i>

                            <span>
                                Kontak Kami
                            </span>

                        </a>


                        <a
                            href="#maklumat-pelayanan"
                            class="ppid-quick-subitem"
                            data-section="maklumat-pelayanan">

                            <i class="fas fa-file-signature"></i>

                            <span>
                                Maklumat Pelayanan
                            </span>

                        </a>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 UNIT KERJA
                 
                 MENU UTAMA / SETARA DENGAN TENTANG PPID
                ================================================== -->

            <a
                href="#unit-kerja"
                class="ppid-quick-main-item ppid-main-link"
                data-section="unit-kerja">

                <i class="fas fa-building"></i>

                <span>
                    Unit Kerja
                </span>

            </a>

            <a
                href="#dasar-hukum"
                class="ppid-quick-main-item ppid-main-link"
                data-section="dasar-hukum">

                <i class="fas fa-scale-balanced"></i>

                <span>
                    Dasar Hukum
                </span>

            </a>

            <!-- =================================================
                STANDAR PELAYANAN
            ================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidStandarPelayananGroup">

                <button
                    type="button"
                    class="ppid-quick-main-item"
                    id="ppidStandarPelayananToggle"
                    aria-expanded="false">

                    <i class="fas fa-clipboard-check"></i>

                    <span>
                        Standar Pelayanan
                    </span>

                    <i class="fas fa-chevron-right ppid-menu-arrow"></i>

                </button>

                <div class="ppid-quick-submenu">

                    <div class="ppid-quick-submenu-inner">

                        <a
                            href="#tata-cara-permohonan"
                            class="ppid-quick-subitem"
                            data-section="tata-cara-permohonan">

                            <i class="fas fa-file-circle-question"></i>

                            <span>
                                Tata Cara Permohonan Informasi
                            </span>

                        </a>


                        <a
                            href="#tata-cara-pengajuan-keberatan"
                            class="ppid-quick-subitem"
                            data-section="tata-cara-pengajuan-keberatan">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span>
                                Tata Cara Pengajuan Keberatan
                            </span>

                        </a>

                        <a
                            href="#jam-layanan"
                            class="ppid-quick-subitem"
                            data-section="jam-layanan">

                            <i class="fas fa-clock"></i>

                            <span>
                                Jam Layanan
                            </span>

                        </a>

                        <a
                            href="#formulir-permohonan-informasi"
                            class="ppid-quick-subitem"
                            data-section="formulir-permohonan-informasi">

                            <i class="fas fa-file-signature"></i>

                            <span>
                                Formulir Permohonan Informasi
                            </span>

                        </a>

                        <a
                            href="#formulir-pemberitahuan-tertulis"
                            class="ppid-quick-subitem"
                            data-section="formulir-pemberitahuan-tertulis">

                            <i class="fas fa-file-lines"></i>

                            <span>
                                Formulir Pemberitahuan Tertulis
                            </span>

                        </a>

                        <a
                            href="#formulir-penolakan-informasi"
                            class="ppid-quick-subitem"
                            data-section="formulir-penolakan-informasi">

                            <i class="fas fa-file-circle-xmark"></i>

                            <span>
                                Formulir Penolakan Informasi
                            </span>

                        </a>

                        <a
                            href="#formulir-keberatan"
                            class="ppid-quick-subitem"
                            data-section="formulir-keberatan">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span>
                                Formulir Keberatan
                            </span>

                        </a>

                    </div>

                </div>

            </div>

            <!-- =====================================================
                DAFTAR INFORMASI PUBLIK
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidDaftarInformasiPublikGroup">

                <button
                    type="button"
                    class="ppid-quick-main-item"
                    id="ppidDaftarInformasiPublikToggle"
                    aria-expanded="false">

                    <i class="fas fa-list-check"></i>

                    <span>
                        Informasi Publik
                    </span>

                    <i class="fas fa-chevron-right ppid-menu-arrow"></i>

                </button>


                <div class="ppid-quick-submenu">

                    <div class="ppid-quick-submenu-inner">

                        <a
                            href="#informasi-tersedia-setiap-saat"
                            class="ppid-quick-subitem"
                            data-section="informasi-tersedia-setiap-saat">

                            <i class="fas fa-circle-info"></i>

                            <span>
                                Informasi yang tersedia setiap saat
                            </span>

                        </a>

                        <a
                            href="#informasi-diumumkan-secara-berkala"
                            class="ppid-quick-subitem"
                            data-section="informasi-diumumkan-secara-berkala">

                            <i class="fas fa-calendar-days"></i>

                            <span>
                                Informasi yang diumumkan secara berkala
                            </span>

                        </a>

                        <a
                            href="#informasi-serta-merta"
                            class="ppid-quick-subitem"
                            data-section="informasi-serta-merta">

                            <i class="fas fa-bolt"></i>

                            <span>
                                Informasi yang serta merta
                            </span>

                        </a>

                        <a
                            href="#daftar-informasi-dikecualikan"
                            class="ppid-quick-subitem"
                            data-section="daftar-informasi-dikecualikan">

                            <i class="fas fa-file-shield"></i>

                            <span>
                                Daftar Informasi Dikecualikan
                            </span>

                        </a>

                        <a
                            href="#dokumen-perencanaan"
                            class="ppid-quick-subitem"
                            data-section="dokumen-perencanaan">

                            <i class="fas fa-file-invoice"></i>

                            <span>
                                Dokumen Perencanaan
                            </span>

                        </a>

                    </div>

                </div>

            </div>

            <!-- =====================================================
               FORMULIR PERMINTAAN INFORMASI
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidFormulirPermintaanInformasiGroup">

                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSduP_m8UB26MyEwD_e1QFQgMe77x7rk8OjxLHnaZEv2qAlutg/viewform"
                    class="ppid-quick-main-item"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="fas fa-file-signature"></i>

                    <span>
                        Formulir Permintaan Informasi
                    </span>

                    <i class="fas fa-arrow-up-right-from-square ppid-menu-external"></i>

                </a>

            </div>

            <!-- =====================================================
                LLID
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidLlid2025Group">

                <a
                    href="https://drive.google.com/file/d/1eD8WKTSxzmkEVRmG2VlP_S5lgw-jS9qc/view"
                    class="ppid-quick-main-item"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="fas fa-file-pdf"></i>

                    <span>
                        LLID 2025
                    </span>

                    <i class="fas fa-arrow-up-right-from-square ppid-menu-external"></i>

                </a>

            </div>

            <!-- =====================================================
                SOP PPID
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidSopPpidGroup">

                <button
                    type="button"
                    class="ppid-quick-main-item"
                    id="ppidSopPpidToggle"
                    aria-expanded="false">

                    <i class="fas fa-file-contract"></i>

                    <span>
                        SOP PPID
                    </span>

                    <i class="fas fa-chevron-right ppid-menu-arrow"></i>

                </button>


                <!-- =============================================
                    SUB MENU SOP PPID
                ============================================== -->

                <style>
                    /* =========================================================
                    SUB MENU TEXT
                    ========================================================= */

                    .ppid-quick-subitem-text {
                        min-width: 0;

                        flex: 1;

                        display: flex;

                        flex-direction: column;

                        justify-content: center;

                        gap: 2px;

                        line-height: 1.2;
                    }


                    /* =========================================================
                    SUB MENU TITLE
                    ========================================================= */

                    .ppid-quick-subitem-text strong {
                        display: block;

                        color: inherit;

                        font-size: 10px;

                        font-weight: 700;

                        white-space: nowrap;

                        overflow: hidden;

                        text-overflow: ellipsis;
                    }


                    /* =========================================================
                    SUB MENU DESCRIPTION
                    ========================================================= */

                    .ppid-quick-subitem-text small {
                        display: block;

                        color: #94a3b8;

                        font-size: 8px;

                        line-height: 1.25;

                        font-weight: 500;

                        white-space: normal;

                        overflow: hidden;

                        display: -webkit-box;

                        -webkit-line-clamp: 2;

                        -webkit-box-orient: vertical;
                    }


                    /* =========================================================
                    ACTIVE SUB MENU
                    ========================================================= */

                    .ppid-quick-subitem.active .ppid-quick-subitem-text small {
                        color: #64748b;
                    }

                    @media (max-width: 767px) {

                        .ppid-quick-subitem-text strong {
                            font-size: 9.5px;
                        }

                        .ppid-quick-subitem-text small {
                            font-size: 7.5px;

                            line-height: 1.2;
                        }

                    }
                </style>

                <div class="ppid-quick-submenu">

                    <div class="ppid-quick-submenu-inner">

                        <a
                            href="#sop-1"
                            class="ppid-quick-subitem"
                            data-section="sop-1">

                            <i class="fas fa-file-lines"></i>

                            <span class="ppid-quick-subitem-text">
                                <strong>
                                    SOP 1
                                </strong>

                                <small>
                                    SOP Pelayanan Permohonan Informasi Publik
                                </small>
                            </span>

                        </a>

                        <a
                            href="#sop-2"
                            class="ppid-quick-subitem"
                            data-section="sop-2">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span class="ppid-quick-subitem-text">

                                <strong>
                                    SOP 2
                                </strong>

                                <small>
                                    SOP Penanganan Keberatan Informasi
                                </small>

                            </span>

                        </a>

                        <a
                            href="#sop-3"
                            class="ppid-quick-subitem"
                            data-section="sop-3">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span class="ppid-quick-subitem-text">

                                <strong>
                                    SOP 3
                                </strong>

                                <small>
                                    SOP Pendokumentasian Informasi Publik
                                </small>

                            </span>

                        </a>

                        <a
                            href="#sop-4"
                            class="ppid-quick-subitem"
                            data-section="sop-4">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span class="ppid-quick-subitem-text">

                                <strong>
                                    SOP 4
                                </strong>

                                <small>
                                    SOP Penetapan dan Pemutakhiran DIP
                                </small>

                            </span>

                        </a>

                        <a
                            href="#sop-5"
                            class="ppid-quick-subitem"
                            data-section="sop-5">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span class="ppid-quick-subitem-text">

                                <strong>
                                    SOP 5
                                </strong>

                                <small>
                                    SOP Penyusunan DIP
                                </small>

                            </span>

                        </a>

                        <a
                            href="#sop-6"
                            class="ppid-quick-subitem"
                            data-section="sop-6">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span class="ppid-quick-subitem-text">

                                <strong>
                                    SOP 6
                                </strong>

                                <small>
                                    SOP Konsekuensi Informasi Publik
                                </small>

                            </span>

                        </a>

                        <a
                            href="#sop-7"
                            class="ppid-quick-subitem"
                            data-section="sop-7">

                            <i class="fas fa-file-circle-exclamation"></i>

                            <span class="ppid-quick-subitem-text">

                                <strong>
                                    SOP 7
                                </strong>

                                <small>
                                    SOP Fasilitasi Sengketa Informasi Publik
                                </small>

                            </span>

                        </a>

                    </div>

                </div>

            </div>

            <!-- =====================================================
                FORMULIR KEBERATAN INFORMASI
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidFormulirKeberatanInformasiGroup">

                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSeVM_KF77G0zHbIHxD2Vz60PQzrIjpy9XvegVgQslpb5mkNSQ/viewform"
                    class="ppid-quick-main-item"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="fas fa-file-circle-exclamation"></i>

                    <span>
                        Formulir Keberatan Informasi
                    </span>

                    <i class="fas fa-arrow-up-right-from-square ppid-menu-external"></i>

                </a>

            </div>

            <!-- =====================================================
                SOP PENGADUAN
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidSopPengaduanGroup">

                <a
                    href="#sop-pengaduan"
                    class="ppid-quick-main-item ppid-main-link"
                    data-section="sop-pengaduan">

                    <i class="fas fa-headset"></i>

                    <span>
                        SOP Pengaduan
                    </span>

                </a>

            </div>

            <!-- =====================================================
                FORMULIR PENGADUAN / ASPIRASI
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidFormulirPengaduanAspirasiGroup">

                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSd1P4PAS5KBIKq9-U4dsBLP9--0RgymYMnmfbjGOQhJ0NPO2g/viewform"
                    class="ppid-quick-main-item"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="fas fa-comment-dots"></i>

                    <span>
                        Formulir Pengaduan / Aspirasi
                    </span>

                    <i class="fas fa-arrow-up-right-from-square ppid-menu-external"></i>

                </a>

            </div>

            <!-- =====================================================
                REKAP SP4N LAPOR
            ====================================================== -->

            <div
                class="ppid-quick-main-group"
                id="ppidRekapSp4nLaporGroup">

                <a
                    href="#rekap-sp4n-lapor"
                    class="ppid-quick-main-item ppid-main-link"
                    data-section="rekap-sp4n-lapor">

                    <i class="fas fa-chart-column"></i>

                    <span>
                        Rekap Pengelolaan SP4N LAPOR! 2025
                    </span>

                </a>

            </div>

            <!-- =====================================================
                BACK TO TOP
            ====================================================== -->

            <div
                class="ppid-quick-back-top-wrapper"
                id="ppidBackToTopGroup">

                <button
                    type="button"
                    class="ppid-quick-back-top"
                    id="ppidBackToTop"
                    aria-label="Kembali ke atas">

                    <span class="ppid-quick-back-top-icon">
                        <i class="fas fa-arrow-up"></i>
                    </span>

                    <span class="ppid-quick-back-top-content">

                        <span class="ppid-quick-back-top-title">
                            Kembali ke Atas
                        </span>

                        <span class="ppid-quick-back-top-desc">
                            Kembali ke awal halaman
                        </span>

                    </span>

                </button>

            </div>

        </nav>

    </div>

</div>

<script>
    /*
     * =====================================================
     * PPID SCROLL RESTORATION
     * =====================================================
     */

    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }


    document.addEventListener('DOMContentLoaded', function() {

        /* =====================================================
           ELEMENT
        ====================================================== */

        const panel =
            document.querySelector('.ppid-quick-panel');


        /*
         * PENTING:
         *
         * Animasi 3D HANYA diterapkan ke .ppid-page.
         *
         * Navbar dan Quick Access tidak ikut dianimasikan.
         */

        const ppidPage =
            document.querySelector('.ppid-page');


        const toggleButton =
            document.getElementById(
                'togglePpidQuickAccess'
            );

        const backToTopButton =
            document.getElementById(
                'ppidBackToTop'
            );


        /* =====================================================
           TENTANG PPID
        ====================================================== */

        const aboutGroup =
            document.getElementById(
                'ppidAboutGroup'
            );


        const aboutToggle =
            document.getElementById(
                'ppidAboutToggle'
            );


        /* =====================================================
           STANDAR PELAYANAN
        ====================================================== */

        const standarPelayananGroup =
            document.getElementById(
                'ppidStandarPelayananGroup'
            );


        const standarPelayananToggle =
            document.getElementById(
                'ppidStandarPelayananToggle'
            );

        /* =====================================================
            DAFTAR INFORMASI PUBLIK
        ===================================================== */

        const daftarInformasiPublikGroup =
            document.getElementById(
                'ppidDaftarInformasiPublikGroup'
            );


        const daftarInformasiPublikToggle =
            document.getElementById(
                'ppidDaftarInformasiPublikToggle'
            );

        /* =====================================================
            SOP PPID
            ====================================================== */

        const sopPpidGroup =
            document.getElementById(
                'ppidSopPpidGroup'
            );


        const sopPpidToggle =
            document.getElementById(
                'ppidSopPpidToggle'
            );


        /* =====================================================
           MENU
        ====================================================== */

        const subItems =
            document.querySelectorAll(
                '.ppid-quick-subitem'
            );


        const mainLinks =
            document.querySelectorAll(
                '.ppid-main-link'
            );


        /* =====================================================
           VALIDATION
        ====================================================== */

        if (
            !panel ||
            !ppidPage ||
            !toggleButton ||
            !backToTopButton ||
            !aboutGroup ||
            !aboutToggle ||
            !standarPelayananGroup ||
            !standarPelayananToggle ||
            !daftarInformasiPublikGroup ||
            !daftarInformasiPublikToggle ||
            !sopPpidGroup ||
            !sopPpidToggle
        ) {
            return;
        }

        /* =====================================================
           SECTION
        ====================================================== */

        const sections = [

            'tentang-ppid',

            'visi-misi',

            'struktur-organisasi',

            'kontak-ppid',

            'maklumat-pelayanan',

            'unit-kerja',

            'dasar-hukum',

            'tata-cara-permohonan',

            'tata-cara-pengajuan-keberatan',

            'jam-layanan',

            'formulir-permohonan-informasi',

            'formulir-pemberitahuan-tertulis',

            'formulir-penolakan-informasi',

            'formulir-keberatan',

            'informasi-tersedia-setiap-saat',

            'informasi-diumumkan-secara-berkala',

            'informasi-serta-merta',

            'daftar-informasi-dikecualikan',

            'dokumen-perencanaan',

            'sop-pengaduan',

            'rekap-sp4n-lapor',

            'sop-1',

            'sop-2',

            'sop-3',

            'sop-4',

            'sop-5',

            'sop-6',

            'sop-7'
        ];


        const sectionElements =
            sections
            .map(function(id) {

                return document.getElementById(id);

            })
            .filter(Boolean);


        /* =====================================================
           RESET ACTIVE
        ====================================================== */

        function resetMenus() {

            /*
             * Reset semua submenu active.
             */

            subItems.forEach(function(item) {

                item.classList.remove(
                    'active'
                );

            });


            /*
             * Reset semua menu utama.
             */

            mainLinks.forEach(function(link) {

                link.classList.remove(
                    'active'
                );

            });


            /*
             * Reset Tentang.
             */

            closeAbout();


            /*
             * Reset Standar Pelayanan.
             */

            closeStandarPelayanan();


            /*
             * Reset Daftar Informasi Publik.
             */

            closeDaftarInformasiPublik();

            closeSopPpid();

        }

        /* =====================================================
           CLOSE TENTANG
        ====================================================== */

        function closeAbout() {

            aboutGroup.classList.remove(
                'open'
            );


            aboutToggle.classList.remove(
                'active'
            );


            aboutToggle.setAttribute(
                'aria-expanded',
                'false'
            );

        }


        /* =====================================================
           OPEN TENTANG
        ====================================================== */

        function openAbout() {

            closeStandarPelayanan();

            closeDaftarInformasiPublik();

            aboutGroup.classList.add(
                'open'
            );

            aboutToggle.setAttribute(
                'aria-expanded',
                'true'
            );

        }


        /* =====================================================
           CLOSE STANDAR PELAYANAN
        ====================================================== */

        function closeStandarPelayanan() {

            standarPelayananGroup.classList.remove(
                'open'
            );


            standarPelayananToggle.classList.remove(
                'active'
            );


            standarPelayananToggle.setAttribute(
                'aria-expanded',
                'false'
            );

        }


        /* =====================================================
           OPEN STANDAR PELAYANAN
        ====================================================== */

        function openStandarPelayanan() {

            closeAbout();

            closeDaftarInformasiPublik();

            standarPelayananGroup.classList.add(
                'open'
            );

            standarPelayananToggle.setAttribute(
                'aria-expanded',
                'true'
            );

        }

        /* =====================================================
        CLOSE DAFTAR INFORMASI PUBLIK
        ===================================================== */

        function closeDaftarInformasiPublik() {

            daftarInformasiPublikGroup.classList.remove(
                'open'
            );

            daftarInformasiPublikToggle.classList.remove(
                'active'
            );

            daftarInformasiPublikToggle.setAttribute(
                'aria-expanded',
                'false'
            );

        }

        /* =====================================================
        CLOSE SOP PPID
        ====================================================== */

        function closeSopPpid() {

            sopPpidGroup.classList.remove(
                'open'
            );

            sopPpidToggle.classList.remove(
                'active'
            );

            sopPpidToggle.setAttribute(
                'aria-expanded',
                'false'
            );

        }


        /* =====================================================
           OPEN DAFTAR INFORMASI PUBLIK
        ===================================================== */

        function openDaftarInformasiPublik() {

            closeAbout();

            closeStandarPelayanan();

            daftarInformasiPublikGroup.classList.add(
                'open'
            );

            daftarInformasiPublikToggle.setAttribute(
                'aria-expanded',
                'true'
            );

        }

        /* =====================================================
        OPEN SOP PPID
        ====================================================== */

        function openSopPpid() {

            closeAbout();

            closeStandarPelayanan();

            closeDaftarInformasiPublik();

            sopPpidGroup.classList.add(
                'open'
            );

            sopPpidToggle.setAttribute(
                'aria-expanded',
                'true'
            );

        }

        /* =====================================================
           EXPAND PANEL
        ====================================================== */

        function expandPanel() {

            panel.classList.remove(
                'minimized'
            );


            toggleButton.setAttribute(
                'aria-expanded',
                'true'
            );


            toggleButton.setAttribute(
                'aria-label',
                'Minimalkan navigasi PPID'
            );


            const icon =
                toggleButton.querySelector('i');


            if (icon) {

                icon.className =
                    'fas fa-times';

            }

        }


        /* =====================================================
           MINIMIZE PANEL
        ====================================================== */

        function minimizePanel() {

            panel.classList.add(
                'minimized'
            );


            toggleButton.setAttribute(
                'aria-expanded',
                'false'
            );


            toggleButton.setAttribute(
                'aria-label',
                'Buka navigasi PPID'
            );


            const icon =
                toggleButton.querySelector('i');


            if (icon) {

                icon.className =
                    'fas fa-bars';

            }

        }

        /* =====================================================
   KEMBALI KE ATAS
    ====================================================== */

        function backToTop() {

            /*
             * Hentikan programmatic scroll sebelumnya.
             */

            clearTimeout(
                programmaticScrollTimer
            );


            /*
             * Reset status navigasi.
             */

            isProgrammaticScroll = true;


            /*
             * Reset semua active menu.
             */

            resetMenus();


            /*
             * Tutup semua submenu.
             */

            closeAbout();

            closeStandarPelayanan();

            closeDaftarInformasiPublik();


            /*
             * Hapus hash section dari URL.
             *
             * Contoh:
             *
             * #sop-pengaduan
             *
             * menjadi:
             *
             * /ppid
             */

            if (
                window.location.hash
            ) {

                history.pushState(
                    null,
                    '',
                    window.location.pathname +
                    window.location.search
                );

            }


            /*
             * Jalankan animasi 3D exit.
             */

            ppidPage.classList.remove(
                'ppid-3d-enter',
                'ppid-3d-exit'
            );


            /*
             * Force reflow.
             */

            void ppidPage.offsetWidth;


            /*
             * Exit animation.
             */

            ppidPage.classList.add(
                'ppid-3d-exit'
            );


            /*
             * Tunggu animasi exit.
             */

            setTimeout(function() {

                ppidPage.classList.remove(
                    'ppid-3d-exit'
                );


                /*
                 * Scroll ke paling atas.
                 */

                window.scrollTo({

                    top: 0,

                    left: 0,

                    behavior: 'auto'

                });


                /*
                 * Enter animation.
                 */

                void ppidPage.offsetWidth;


                ppidPage.classList.add(
                    'ppid-3d-enter'
                );


                /*
                 * Selesaikan navigasi.
                 */

                programmaticScrollTimer =
                    setTimeout(function() {

                        ppidPage.classList.remove(
                            'ppid-3d-enter'
                        );


                        isProgrammaticScroll =
                            false;


                        /*
                         * Pastikan semua menu
                         * benar-benar reset.
                         */

                        resetMenus();

                        closeAbout();

                        closeStandarPelayanan();

                        closeDaftarInformasiPublik();


                    }, 450);


            }, 280);

        }

        /* =====================================================
            BACK TO TOP CLICK
        ====================================================== */

        backToTopButton.addEventListener(
            'click',
            function(event) {

                event.preventDefault();

                backToTop();

            }
        );


        /* =====================================================
           TOGGLE PANEL
        ====================================================== */

        toggleButton.addEventListener(
            'click',
            function() {

                const isMinimized =
                    panel.classList.contains(
                        'minimized'
                    );


                if (isMinimized) {

                    expandPanel();

                } else {

                    minimizePanel();

                }

            }
        );


        /* =====================================================
           TOGGLE TENTANG PPID
        ====================================================== */

        aboutToggle.addEventListener(
            'click',
            function(event) {

                event.preventDefault();


                /*
                 * Jika panel minimized:
                 *
                 * buka panel
                 * buka submenu Tentang
                 *
                 * Tidak scroll.
                 */

                if (
                    panel.classList.contains(
                        'minimized'
                    )
                ) {

                    expandPanel();

                    openAbout();

                    return;

                }


                /*
                 * Jika panel terbuka:
                 *
                 * toggle submenu.
                 */

                const isOpen =
                    aboutGroup.classList.contains(
                        'open'
                    );


                if (isOpen) {

                    closeAbout();

                } else {

                    openAbout();

                }

            }
        );


        /* =====================================================
           TOGGLE STANDAR PELAYANAN
        ====================================================== */

        standarPelayananToggle.addEventListener(
            'click',
            function(event) {

                event.preventDefault();


                /*
                 * Jika panel minimized:
                 *
                 * buka panel
                 * buka submenu Standar Pelayanan
                 *
                 * Tidak scroll.
                 */

                if (
                    panel.classList.contains(
                        'minimized'
                    )
                ) {

                    expandPanel();

                    openStandarPelayanan();

                    return;

                }


                /*
                 * Jika panel terbuka:
                 *
                 * toggle submenu.
                 */

                const isOpen =
                    standarPelayananGroup.classList.contains(
                        'open'
                    );


                if (isOpen) {

                    closeStandarPelayanan();

                } else {

                    openStandarPelayanan();

                }

            }
        );

        /* =====================================================
            TOGGLE DAFTAR INFORMASI PUBLIK
        ===================================================== */

        daftarInformasiPublikToggle.addEventListener(
            'click',
            function(event) {

                event.preventDefault();

                if (
                    panel.classList.contains(
                        'minimized'
                    )
                ) {

                    expandPanel();

                    openDaftarInformasiPublik();

                    return;

                }

                const isOpen =
                    daftarInformasiPublikGroup.classList.contains(
                        'open'
                    );

                if (isOpen) {

                    closeDaftarInformasiPublik();

                } else {

                    openDaftarInformasiPublik();

                }

            }
        );

        /* =====================================================
   TOGGLE SOP PPID
    ====================================================== */

        sopPpidToggle.addEventListener(
            'click',
            function(event) {

                event.preventDefault();


                /*
                 * Jika panel minimized:
                 * buka panel + submenu SOP PPID.
                 */

                if (
                    panel.classList.contains(
                        'minimized'
                    )
                ) {

                    expandPanel();

                    openSopPpid();

                    return;

                }


                /*
                 * Toggle submenu SOP PPID.
                 */

                const isOpen =
                    sopPpidGroup.classList.contains(
                        'open'
                    );


                if (isOpen) {

                    closeSopPpid();

                } else {

                    openSopPpid();

                }

            }
        );


        /* =====================================================
           SET ACTIVE SECTION
        ====================================================== */

        function setActiveSection(sectionId) {

            if (!sectionId) {
                return;
            }


            resetMenus();


            /* =================================================
               UNIT KERJA / DASAR HUKUM
            ================================================== */

            if (
                sectionId === 'unit-kerja' ||
                sectionId === 'dasar-hukum' ||
                sectionId === 'sop-pengaduan' ||
                sectionId === 'rekap-sp4n-lapor'
            ) {

                /*
                 * Tutup semua submenu.
                 */

                closeAbout();

                closeStandarPelayanan();


                /*
                 * Active menu utama.
                 */

                mainLinks.forEach(function(link) {

                    const target =
                        link.getAttribute(
                            'href'
                        );


                    if (
                        target ===
                        '#' + sectionId
                    ) {

                        link.classList.add(
                            'active'
                        );

                    }

                });


                return;
            }

            /* =================================================
            SOP PPID
            ================================================== */

            if (
                sectionId === 'sop-1' ||
                sectionId === 'sop-2' ||
                sectionId === 'sop-3' ||
                sectionId === 'sop-4' ||
                sectionId === 'sop-5' ||
                sectionId === 'sop-6' ||
                sectionId === 'sop-7'
            ) {

                /*
                 * Tutup menu lainnya.
                 */

                closeAbout();

                closeStandarPelayanan();

                closeDaftarInformasiPublik();


                /*
                 * Buka SOP PPID.
                 */

                openSopPpid();


                /*
                 * Parent SOP PPID active.
                 */

                sopPpidToggle.classList.add(
                    'active'
                );


                /*
                 * Pastikan SEMUA submenu SOP
                 * di-reset terlebih dahulu.
                 */

                subItems.forEach(function(item) {

                    item.classList.remove(
                        'active'
                    );

                });


                /*
                 * Aktifkan hanya submenu
                 * sesuai section yang sedang dibuka.
                 */

                const activeSop =
                    document.querySelector(
                        '.ppid-quick-subitem[data-section="' +
                        sectionId +
                        '"]'
                    );


                if (activeSop) {

                    activeSop.classList.add(
                        'active'
                    );

                }


                return;

            }


            /* =================================================
               STANDAR PELAYANAN
            ================================================== */

            if (
                sectionId === 'tata-cara-permohonan' ||
                sectionId === 'tata-cara-pengajuan-keberatan' ||
                sectionId === 'jam-layanan' ||
                sectionId === 'formulir-permohonan-informasi' ||
                sectionId === 'formulir-pemberitahuan-tertulis' ||
                sectionId === 'formulir-penolakan-informasi' ||
                sectionId === 'formulir-keberatan'

            ) {

                /*
                 * Tutup Tentang.
                 */

                closeAbout();


                /*
                 * Buka Standar Pelayanan.
                 */

                openStandarPelayanan();


                /*
                 * Parent Standar Pelayanan active.
                 */

                standarPelayananToggle.classList.add(
                    'active'
                );


                /*
                 * Active submenu.
                 */

                subItems.forEach(function(item) {

                    const target =
                        item.getAttribute(
                            'href'
                        );


                    if (
                        target ===
                        '#' + sectionId
                    ) {

                        item.classList.add(
                            'active'
                        );

                    }

                });


                return;
            }


            /* =================================================
            DAFTAR INFORMASI PUBLIK
            ================================================== */

            if (
                sectionId === 'informasi-tersedia-setiap-saat' ||
                sectionId === 'informasi-diumumkan-secara-berkala' ||
                sectionId === 'informasi-serta-merta' ||
                sectionId === 'daftar-informasi-dikecualikan' ||
                sectionId === 'dokumen-perencanaan'
            ) {

                /*
                 * Tutup menu lain.
                 */

                closeAbout();

                closeStandarPelayanan();


                /*
                 * Buka Daftar Informasi Publik.
                 */

                openDaftarInformasiPublik();


                /*
                 * Parent active.
                 */

                daftarInformasiPublikToggle.classList.add(
                    'active'
                );


                /*
                 * Active submenu.
                 */

                subItems.forEach(function(item) {

                    const target =
                        item.getAttribute(
                            'href'
                        );

                    if (
                        target ===
                        '#' + sectionId
                    ) {

                        item.classList.add(
                            'active'
                        );

                    }

                });


                return;
            }


            /* =================================================
               TENTANG PPID
            ================================================== */

            const tentangSections = [

                'tentang-ppid',

                'visi-misi',

                'struktur-organisasi',

                'kontak-ppid',

                'maklumat-pelayanan'

            ];


            if (
                tentangSections.includes(
                    sectionId
                )
            ) {

                /*
                 * Buka Tentang.
                 */

                openAbout();


                /*
                 * Tutup Standar Pelayanan.
                 */

                closeStandarPelayanan();


                /*
                 * Cari submenu yang sesuai.
                 */

                subItems.forEach(function(item) {

                    const target =
                        item.getAttribute(
                            'href'
                        );


                    if (
                        target ===
                        '#' + sectionId
                    ) {

                        item.classList.add(
                            'active'
                        );


                        aboutToggle.classList.add(
                            'active'
                        );

                    }

                });

            }

        }


        /* =====================================================
           PROGRAMMATIC SCROLL STATE
        ====================================================== */

        let isProgrammaticScroll =
            false;


        let programmaticScrollTimer =
            null;


        /* =====================================================
           PROGRAMMATIC SCROLL
           
           3D HANYA .ppid-page
        ====================================================== */

        function scrollToSection(sectionId) {

            const section =
                document.getElementById(
                    sectionId
                );


            if (!section) {
                return;
            }


            /* =================================================
               CEGAH KLIK BERULANG
            ================================================== */

            if (
                isProgrammaticScroll
            ) {

                return;

            }


            isProgrammaticScroll =
                true;


            clearTimeout(
                programmaticScrollTimer
            );


            /* =================================================
               ACTIVE MENU LANGSUNG
            ================================================== */

            setActiveSection(
                sectionId
            );


            /* =================================================
               UPDATE HASH
            ================================================== */

            if (
                window.location.hash !==
                '#' + sectionId
            ) {

                history.pushState(
                    null,
                    '',
                    '#' + sectionId
                );

            }


            /* =================================================
               3D EXIT
               
               HANYA .ppid-page
            ================================================== */

            ppidPage.classList.remove(
                'ppid-3d-enter'
            );


            ppidPage.classList.remove(
                'ppid-3d-exit'
            );


            /*
             * Force reflow.
             */

            void ppidPage.offsetWidth;


            ppidPage.classList.add(
                'ppid-3d-exit'
            );


            /* =================================================
               TUNGGU EXIT
            ================================================== */

            setTimeout(function() {


                /* =============================================
                   HAPUS EXIT
                ============================================== */

                ppidPage.classList.remove(
                    'ppid-3d-exit'
                );


                /* =============================================
                   HITUNG TARGET
                ============================================== */

                const targetTop =
                    section.getBoundingClientRect().top +
                    window.pageYOffset -
                    20;


                /* =============================================
                   SCROLL
                ============================================== */

                window.scrollTo({

                    top: targetTop,

                    left: 0,

                    behavior: 'auto'

                });


                /* =============================================
                   ENTER
                ============================================== */

                void ppidPage.offsetWidth;


                ppidPage.classList.add(
                    'ppid-3d-enter'
                );


                /* =============================================
                   SELESAI
                ============================================== */

                programmaticScrollTimer =
                    setTimeout(function() {


                        ppidPage.classList.remove(
                            'ppid-3d-enter'
                        );


                        isProgrammaticScroll =
                            false;


                        /*
                         * Pastikan active tetap
                         * sesuai target.
                         */

                        setActiveSection(
                            sectionId
                        );


                    }, 450);


            }, 280);

        }


        /* =====================================================
           SUB MENU CLICK
           
           Termasuk:
           - Tentang PPID
           - Standar Pelayanan
        ====================================================== */

        subItems.forEach(function(item) {

            item.addEventListener(
                'click',
                function(event) {

                    event.preventDefault();


                    const href =
                        item.getAttribute(
                            'href'
                        );


                    if (
                        !href ||
                        href === '#'
                    ) {

                        return;

                    }


                    const sectionId =
                        href.substring(1);


                    scrollToSection(
                        sectionId
                    );

                }
            );

        });


        /* =====================================================
           MAIN MENU CLICK
           
           UNIT KERJA / DASAR HUKUM
        ====================================================== */

        mainLinks.forEach(function(link) {

            link.addEventListener(
                'click',
                function(event) {

                    event.preventDefault();


                    const href =
                        link.getAttribute(
                            'href'
                        );


                    if (
                        !href ||
                        href === '#'
                    ) {

                        return;

                    }


                    const sectionId =
                        href.substring(1);


                    scrollToSection(
                        sectionId
                    );

                }
            );

        });


        /* =====================================================
           ACTIVE BERDASARKAN SCROLL MANUAL
           
           Active hanya berubah setelah user
           benar-benar berhenti scroll.
        ====================================================== */

        let scrollStopTimer =
            null;


        function updateActiveMenu() {

            /*
             * Jangan update ketika sedang
             * menjalankan navigasi Quick Access.
             */

            if (
                isProgrammaticScroll
            ) {

                return;

            }


            /*
             * Titik deteksi section.
             *
             * 160px dari atas viewport.
             */

            const offset =
                160;


            let currentSection =
                null;


            /* -------------------------------------------------
               Cari section terakhir yang sudah melewati offset
            -------------------------------------------------- */

            sectionElements.forEach(
                function(section) {

                    const rect =
                        section.getBoundingClientRect();


                    if (
                        rect.top <= offset
                    ) {

                        currentSection =
                            section;

                    }

                }
            );


            /* -------------------------------------------------
               Update active
            -------------------------------------------------- */

            if (
                currentSection
            ) {

                setActiveSection(
                    currentSection.id
                );

            }

        }


        /* =====================================================
           SCROLL EVENT
           
           HANYA SATU EVENT.
           
           Sebelumnya ada dua listener scroll yang sama,
           sehingga timer saling menimpa.
        ====================================================== */

        window.addEventListener(
            'scroll',
            function() {

                /*
                 * Jangan proses selama
                 * Quick Access sedang menjalankan 3D.
                 */

                if (
                    isProgrammaticScroll
                ) {

                    return;

                }


                clearTimeout(
                    scrollStopTimer
                );


                /*
                 * Tunggu 200ms setelah user
                 * benar-benar berhenti scroll.
                 */

                scrollStopTimer =
                    setTimeout(
                        function() {

                            updateActiveMenu();

                        },
                        200
                    );

            }, {
                passive: true
            }
        );


        /* =====================================================
           INITIAL LOAD
        ====================================================== */

        const initialHash =
            window.location.hash.substring(
                1
            );


        /* =====================================================
           TIDAK ADA HASH
        ====================================================== */

        if (!initialHash) {

            window.scrollTo({

                top: 0,

                left: 0,

                behavior: 'auto'

            });

            resetMenus();

        }


        /* =====================================================
           ADA HASH
        ====================================================== */

        if (initialHash) {

            const initialSection =
                document.getElementById(
                    initialHash
                );


            if (initialSection) {

                requestAnimationFrame(
                    function() {

                        /*
                         * Jangan gunakan smooth scroll.
                         */

                        const targetTop =
                            initialSection
                            .getBoundingClientRect()
                            .top +
                            window.pageYOffset -
                            20;


                        window.scrollTo({

                            top: targetTop,

                            left: 0,

                            behavior: 'auto'

                        });


                        /*
                         * Set active berdasarkan hash.
                         */

                        setActiveSection(
                            initialHash
                        );

                    }
                );

            }

        }


        /* =====================================================
           AFTER PAGE LOAD
        ====================================================== */

        window.addEventListener(
            'load',
            function() {

                if (!initialHash) {

                    window.scrollTo({

                        top: 0,

                        left: 0,

                        behavior: 'auto'

                    });

                    resetMenus();

                }

            }
        );


        /* =====================================================
           BROWSER BACK / FORWARD
           
           popstate tidak membuat history baru.
        ====================================================== */

        window.addEventListener(
            'popstate',
            function() {

                const hash =
                    window.location.hash.substring(
                        1
                    );


                /* =============================================
                   KEMBALI KE ATAS
                ============================================== */

                if (!hash) {

                    resetMenus();

                    window.scrollTo({

                        top: 0,

                        left: 0,

                        behavior: 'auto'

                    });

                    return;

                }


                /* =============================================
                   CARI SECTION
                ============================================== */

                const section =
                    document.getElementById(
                        hash
                    );


                if (!section) {

                    return;

                }


                /*
                 * Jangan jalankan dua navigasi sekaligus.
                 */

                if (
                    isProgrammaticScroll
                ) {

                    return;

                }


                isProgrammaticScroll =
                    true;


                setActiveSection(
                    hash
                );


                /* =============================================
                   EXIT
                ============================================== */

                ppidPage.classList.remove(
                    'ppid-3d-enter',
                    'ppid-3d-exit'
                );


                void ppidPage.offsetWidth;


                ppidPage.classList.add(
                    'ppid-3d-exit'
                );


                setTimeout(
                    function() {


                        ppidPage.classList.remove(
                            'ppid-3d-exit'
                        );


                        /* =====================================
                           HITUNG TARGET
                        ====================================== */

                        const targetTop =
                            section
                            .getBoundingClientRect()
                            .top +
                            window.pageYOffset -
                            20;


                        /* =====================================
                           SCROLL
                        ====================================== */

                        window.scrollTo({

                            top: targetTop,

                            left: 0,

                            behavior: 'auto'

                        });


                        /* =====================================
                           ENTER
                        ====================================== */

                        void ppidPage.offsetWidth;


                        ppidPage.classList.add(
                            'ppid-3d-enter'
                        );


                        clearTimeout(
                            programmaticScrollTimer
                        );


                        programmaticScrollTimer =
                            setTimeout(
                                function() {


                                    ppidPage.classList.remove(
                                        'ppid-3d-enter'
                                    );


                                    isProgrammaticScroll =
                                        false;


                                    setActiveSection(
                                        hash
                                    );


                                },
                                450
                            );

                    },
                    280
                );

            }
        );

    });
</script>

<div class="ppid-page">


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="ppid-hero">

        <div class="ppid-hero-content">

            <div class="ppid-hero-badge">
                <i class="bi bi-shield-check"></i>
                PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI
            </div>

            <h1 class="ppid-hero-title">
                <span class="orange">RSUD</span>
                <span class="green">AR ROZY</span>
            </h1>

            <!-- <p class="ppid-hero-description">
                Wujud komitmen RSUD Ar Rozy Kota Probolinggo
                dalam memberikan pelayanan informasi publik yang
                transparan, mudah diakses, akuntabel, dan terpercaya.
            </p> -->

        </div>

        {{-- Bottom Wave --}}
        <svg class="ppid-hero-wave"
            viewBox="0 0 1440 120"
            xmlns="http://www.w3.org/2000/svg">
            <path fill="#ffffff"
                d="M0,64L80,74.7C160,85,320,107,480,106.7C640,107,800,85,960,74.7C1120,64,1280,64,1360,64L1440,64L1440,120L0,120Z">
            </path>
        </svg>

    </section>


    {{-- =====================================================
         TENTANG PPID
    ====================================================== --}}

    <section class="ppid-section ppid-about" id="tentang-ppid">

        <div class="ppid-container">

            <div class="ppid-section-header">

                <div class="ppid-eyebrow">
                    <i class="bi bi-info-circle-fill"></i>
                    Tentang PPID
                </div>

                <h2 class="ppid-section-title">
                    Tentang PPID RSUD Ar Rozy
                </h2>

                <p class="ppid-section-description">
                    Mengenal peran dan struktur Pejabat Pengelola
                    Informasi dan Dokumentasi di lingkungan RSUD Ar Rozy
                    Kota Probolinggo.
                </p>

            </div>


            <div class="ppid-about-grid">

                {{-- VISUAL --}}

                <div class="ppid-about-visual">

                    <div class="ppid-about-card">

                        <div class="ppid-about-icon">
                            <i class="bi bi-building-check"></i>
                        </div>

                        <h3>
                            Keterbukaan<br>
                            Informasi Publik
                        </h3>

                        <p>
                            RSUD Ar Rozy berkomitmen menyediakan informasi
                            publik secara transparan dan dapat diakses
                            masyarakat sesuai dengan ketentuan yang berlaku.
                        </p>

                    </div>

                </div>


                {{-- CONTENT --}}

                <div class="ppid-about-content">

                    <h3>
                        Mewujudkan Pelayanan Informasi
                        yang Transparan
                    </h3>

                    <p>
                        Pejabat Pengelola Informasi dan Dokumentasi (PPID)
                        RSUD Ar Rozy Kota Probolinggo merupakan bagian yang
                        bertanggung jawab dalam pengelolaan dan pelayanan
                        informasi publik di lingkungan RSUD Ar Rozy.
                    </p>

                    <p>
                        PPID memiliki peran penting dalam memastikan
                        masyarakat memperoleh informasi yang dibutuhkan
                        secara mudah, cepat, tepat, dan akuntabel dengan
                        tetap memperhatikan ketentuan mengenai informasi
                        yang wajib dibuka maupun informasi yang dikecualikan.
                    </p>


                    <div class="ppid-highlight">

                        <div class="ppid-highlight-item">

                            <div class="ppid-highlight-icon">
                                <i class="bi bi-eye-fill"></i>
                            </div>

                            <span>
                                Transparansi Informasi
                            </span>

                        </div>


                        <div class="ppid-highlight-item">

                            <div class="ppid-highlight-icon">
                                <i class="bi bi-person-check-fill"></i>
                            </div>

                            <span>
                                Pelayanan Publik
                            </span>

                        </div>


                        <div class="ppid-highlight-item">

                            <div class="ppid-highlight-icon">
                                <i class="bi bi-file-earmark-text-fill"></i>
                            </div>

                            <span>
                                Dokumentasi Informasi
                            </span>

                        </div>


                        <div class="ppid-highlight-item">

                            <div class="ppid-highlight-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>

                            <span>
                                Akuntabilitas
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         STRUKTUR PPID
    ====================================================== --}}

    <section class="ppid-section ppid-structure" id="struktur-ppid">

        <div class="ppid-container">

            <div class="ppid-section-header">

                <div class="ppid-eyebrow">
                    <i class="bi bi-diagram-3-fill"></i>
                    Struktur Organisasi
                </div>

                <h2 class="ppid-section-title">
                    Struktur PPID RSUD Ar Rozy
                </h2>

                <p class="ppid-section-description">
                    Berikut adalah struktur Pejabat Pengelola Informasi
                    dan Dokumentasi RSUD Ar Rozy Kota Probolinggo.
                </p>

            </div>


            <div class="ppid-table-wrapper">

                <table class="ppid-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan Dalam Dinas / Instansi</th>
                            <th>Kedudukan</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- =================================================
                             ATASAN PPID
                        ================================================== --}}

                        <tr>
                            <td class="number">1</td>

                            <td>
                                <div class="position">
                                    Sekretaris Daerah Kota Probolinggo
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Atasan PPID Kota Probolinggo
                                </span>
                            </td>
                        </tr>


                        {{-- =================================================
                             TIM PERTIMBANGAN
                        ================================================== --}}

                        <tr>
                            <td class="number">2</td>

                            <td>
                                <div class="position">
                                    Direktur UOBK RSUD Ar Rozy
                                    Kota Probolinggo
                                </div>

                                <div class="name">
                                    dr. MOHAMMAD ALI YUSNI, Sp.B.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Tim Pertimbangan
                                </span>
                            </td>
                        </tr>


                        {{-- =================================================
                             PPID PELAKSANA
                        ================================================== --}}

                        <tr>
                            <td class="number">3</td>

                            <td>
                                <div class="position">
                                    Kepala Bagian Umum dan Keuangan
                                </div>

                                <div class="name">
                                    ANDREAN MEI LAUDA, S.E., M.M.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    PPID Pelaksana
                                </span>
                            </td>
                        </tr>


                        {{-- =================================================
                             SEKRETARIS PLID
                        ================================================== --}}

                        <tr>
                            <td class="number">4</td>

                            <td>
                                <div class="position">
                                    Kepala Subbagian Umum
                                </div>

                                <div class="name">
                                    AGUNG PRASTYO TEGUH ADI NUSWANTORO, S.Sos.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Sekretaris PLID
                                </span>
                            </td>
                        </tr>


                        {{-- =================================================
                             BIDANG PELAYANAN
                        ================================================== --}}

                        <tr class="ppid-group-row">

                            <td colspan="3">
                                <i class="bi bi-megaphone-fill"></i>
                                Bidang Pelayanan Informasi dan Dokumentasi
                            </td>

                        </tr>


                        <tr>
                            <td class="number">5</td>

                            <td>
                                <div class="position">
                                    Kepala Subbagian Penelitian dan Pengembangan,
                                    Sumber Daya Manusia, serta Pendidikan dan Pelatihan
                                </div>

                                <div class="name">
                                    ABDUR ROHMAN HAMZAH, S.A.P.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Ketua
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="number">6</td>

                            <td>
                                <div class="position">
                                    Kepala Seksi Kefarmasian
                                </div>

                                <div class="name">
                                    RICE RISKIYAH, S.Farm., Apt.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Anggota
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="number">7</td>

                            <td>
                                <div class="position">
                                    Arsiparis Bagian Umum dan Keuangan
                                </div>

                                <div class="name">
                                    VIVIAN SEPTIA RULITA, Amd.Kom
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Anggota
                                </span>
                            </td>
                        </tr>


                        {{-- =================================================
                             BIDANG PENGOLAHAN DATA
                        ================================================== --}}

                        <tr class="ppid-group-row">

                            <td colspan="3">
                                <i class="bi bi-database-fill"></i>
                                Bidang Pengolahan Data dan Klasifikasi Informasi
                            </td>

                        </tr>


                        <tr>
                            <td class="number">8</td>

                            <td>
                                <div class="position">
                                    Kepala Bidang Pelayanan Keperawatan,
                                    Kebidanan, dan Pelayanan Penunjang
                                </div>

                                <div class="name">
                                    ITJE FAUZIAH, S.ST.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Ketua
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="number">9</td>

                            <td>
                                <div class="position">
                                    Kepala Sub Bagian Keuangan
                                </div>

                                <div class="name">
                                    ROBIATUL ADAWIYAH, SE
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Anggota
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="number">10</td>

                            <td>
                                <div class="position">
                                    Tenaga Teknis RSUD Ar Rozy
                                    Kota Probolinggo
                                </div>

                                <div class="name">
                                    ULFANIA ISLAMI, S.M.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Anggota
                                </span>
                            </td>
                        </tr>


                        {{-- =================================================
                             BIDANG PENYELESAIAN SENGKETA
                        ================================================== --}}

                        <tr class="ppid-group-row">

                            <td colspan="3">
                                <i class="bi bi-shield-exclamation"></i>
                                Bidang Penyelesaian Sengketa Informasi
                            </td>

                        </tr>


                        <tr>
                            <td class="number">11</td>

                            <td>
                                <div class="position">
                                    Kepala Bidang Pelayanan Medik,
                                    Penunjang Medik, dan Kefarmasian
                                </div>

                                <div class="name">
                                    dr. HUSNUL ROFIQ
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Ketua
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="number">12</td>

                            <td>
                                <div class="position">
                                    Kepala Seksi Pelayanan Medik
                                    dan Penunjang Non Medik
                                </div>

                                <div class="name">
                                    dr. ISNA HAJAR MURSYIDAH
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Anggota
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="number">13</td>

                            <td>
                                <div class="position">
                                    Kepala Seksi Pelayanan Keperawatan
                                    dan Kebidanan
                                </div>

                                <div class="name">
                                    YOPI JUNAIDILLAH, S.Kep.Ns., M.Kn.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Anggota
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td class="number">14</td>

                            <td>
                                <div class="position">
                                    Kepala Seksi Pelayanan Penunjang Non Medik
                                </div>

                                <div class="name">
                                    RENY WIJAYANTI, S.ST.
                                </div>
                            </td>

                            <td>
                                <span class="role">
                                    Anggota
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>


    {{-- =====================================================
     VISI & MISI
    ====================================================== --}}

    <section class="ppid-section ppid-vision-mission" id="visi-misi">

        <div class="ppid-container">

            {{-- SECTION HEADER --}}

            <div class="ppid-section-header">

                <div class="ppid-eyebrow">
                    <i class="bi bi-bullseye"></i>
                    Arah & Tujuan
                </div>

                <h2 class="ppid-section-title">
                    Visi & Misi
                </h2>

                <p class="ppid-section-description">
                    Landasan dan arah pengembangan RSUD Ar Rozy
                    dalam memberikan pelayanan kesehatan kepada masyarakat.
                </p>

            </div>


            {{-- CONTENT GRID --}}

            <div class="ppid-vision-grid">

                {{-- =================================================
                 VISI
            ================================================== --}}

                <div class="ppid-vision-card">

                    <div class="ppid-vision-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <div class="ppid-vision-label">
                        VISI
                    </div>

                    <h3>
                        Menjadi Rumah Sakit yang Handal,
                        Unggul, dan Berkualitas
                    </h3>

                    <div class="ppid-vision-decoration">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>


                {{-- =================================================
                 MISI
            ================================================== --}}

                <div class="ppid-mission-card">

                    <div class="ppid-mission-header">

                        <div class="ppid-mission-icon">
                            <i class="bi bi-flag-fill"></i>
                        </div>

                        <div>
                            <div class="ppid-vision-label">
                                MISI
                            </div>

                            <h3>
                                Langkah Kami
                            </h3>
                        </div>

                    </div>


                    <div class="ppid-mission-list">

                        {{-- Misi 1 --}}

                        <div class="ppid-mission-item">

                            <div class="ppid-mission-number">
                                01
                            </div>

                            <div class="ppid-mission-content">

                                <h4>
                                    Tata Kelola Profesional
                                </h4>

                                <p>
                                    Mewujudkan tata kelola rumah sakit
                                    yang profesional, akuntabel, transparan,
                                    dan inovatif.
                                </p>

                            </div>

                        </div>


                        {{-- Misi 2 --}}

                        <div class="ppid-mission-item">

                            <div class="ppid-mission-number">
                                02
                            </div>

                            <div class="ppid-mission-content">

                                <h4>
                                    Pelayanan Kesehatan Bermutu
                                </h4>

                                <p>
                                    Memberikan pelayanan kesehatan paripurna
                                    yang bermutu dan mengutamakan keselamatan
                                    pasien.
                                </p>

                            </div>

                        </div>


                        {{-- Misi 3 --}}

                        <div class="ppid-mission-item">

                            <div class="ppid-mission-number">
                                03
                            </div>

                            <div class="ppid-mission-content">

                                <h4>
                                    Kepuasan Pelanggan
                                </h4>

                                <p>
                                    Membangun kepuasan pelanggan dengan
                                    mewujudkan pelayanan prima secara konsisten.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- =====================================================
     STRUKTUR ORGANISASI - IMAGE
    ====================================================== --}}

    <section class="ppid-section ppid-structure-image" id="struktur-organisasi">

        <div class="ppid-container">

            <div class="ppid-section-header">

                <div class="ppid-eyebrow">
                    <i class="bi bi-diagram-3-fill"></i>
                    Struktur Organisasi
                </div>

                <h2 class="ppid-section-title">
                    Struktur Organisasi PPID
                </h2>

                <p class="ppid-section-description">
                    Susunan jabatan pengelola informasi dan dokumentasi
                    pelaksana UOBK RSUD Ar Rozy Kota Probolinggo.
                </p>

            </div>


            {{-- IMAGE CARD --}}

            <div class="ppid-structure-image-card">

                <div class="ppid-structure-image-frame">

                    <img
                        src="{{ asset('img/ppid/struktur-organisasi.jpg') }}"
                        alt="Struktur Organisasi PPID RSUD Ar Rozy Kota Probolinggo"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    {{-- =====================================================
     KONTAK KAMI
    ====================================================== --}}

    <section class="ppid-section ppid-contact-section" id="kontak-ppid">

        <div class="ppid-container">

            {{-- HEADER --}}

            <div class="ppid-section-header">

                <div class="ppid-eyebrow">
                    <i class="bi bi-headset"></i>
                    Hubungi Kami
                </div>

                <h2 class="ppid-section-title">
                    Kontak Kami
                </h2>

                <p class="ppid-section-description">
                    Silakan hubungi RSUD Ar Rozy Kota Probolinggo
                    untuk mendapatkan informasi, layanan, maupun
                    menyampaikan pengaduan.
                </p>

            </div>


            {{-- CONTACT GRID --}}

            <div class="ppid-contact-grid">


                {{-- =================================================
                 SOCIAL MEDIA
                ================================================== --}}

                <div class="ppid-contact-card ppid-contact-social">

                    <div class="ppid-contact-icon">
                        <i class="bi bi-share-fill"></i>
                    </div>

                    <div class="ppid-contact-content">

                        <span class="ppid-contact-label">
                            MEDIA SOSIAL
                        </span>

                        <h3>
                            Ikuti Kami
                        </h3>

                        <p>
                            Dapatkan informasi terbaru seputar
                            kegiatan dan layanan RSUD Ar Rozy.
                        </p>

                    </div>

                    <div class="ppid-social-links">

                        <a
                            href="{{ config('ppid.instagram', '#') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ppid-social-link">

                            <i class="bi bi-instagram"></i>

                            <span>
                                Instagram
                            </span>

                            <i class="bi bi-arrow-up-right"></i>

                        </a>


                        <a
                            href="{{ config('ppid.facebook', '#') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ppid-social-link">

                            <i class="bi bi-facebook"></i>

                            <span>
                                Facebook
                            </span>

                            <i class="bi bi-arrow-up-right"></i>

                        </a>

                    </div>

                </div>


                {{-- =================================================
                 CONTACT INFORMATION
                ================================================== --}}

                <div class="ppid-contact-card">

                    <div class="ppid-contact-icon orange">
                        <i class="bi bi-telephone-fill"></i>
                    </div>

                    <div class="ppid-contact-content">

                        <span class="ppid-contact-label">
                            INFORMASI KONTAK
                        </span>

                        <h3>
                            Hubungi RSUD
                        </h3>

                    </div>


                    <div class="ppid-contact-list">

                        {{-- TELEPON --}}

                        <a
                            href="tel:03354490009"
                            class="ppid-contact-row">

                            <div class="ppid-contact-row-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>

                            <div class="ppid-contact-row-text">

                                <span>
                                    No. Telepon
                                </span>

                                <strong>
                                    (0335) 4490009
                                </strong>

                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>


                        {{-- EMAIL --}}

                        <a
                            href="mailto:rsudarrozy@probolinggokota.go.id"
                            class="ppid-contact-row">

                            <div class="ppid-contact-row-icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>

                            <div class="ppid-contact-row-text">

                                <span>
                                    Email
                                </span>

                                <strong>
                                    rsudarrozy@probolinggokota.go.id
                                </strong>

                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>


                        {{-- PENGADUAN --}}

                        <a
                            href="tel:+6281131196002"
                            class="ppid-contact-row ppid-contact-complaint">

                            <div class="ppid-contact-row-icon">
                                <i class="bi bi-megaphone-fill"></i>
                            </div>

                            <div class="ppid-contact-row-text">

                                <span>
                                    No. Pengaduan
                                </span>

                                <strong>
                                    +62 811-3119-6002
                                </strong>

                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- =================================================
             TAGLINE
            ================================================== --}}

            <div class="ppid-contact-tagline">

                <div class="ppid-contact-tagline-line"></div>

                <div class="ppid-contact-tagline-content">

                    <i class="bi bi-heart-fill"></i>

                    <span>
                        Melayani sepenuh hati untuk kesehatan masyarakat
                    </span>

                </div>

                <div class="ppid-contact-tagline-line"></div>

            </div>

        </div>

    </section>

    {{-- =====================================================
     MAKLUMAT PELAYANAN
    ====================================================== --}}

    <section
        class="ppid-section ppid-service-statement"
        id="maklumat-pelayanan">

        <div class="ppid-container">

            {{-- SECTION HEADER --}}

            <div class="ppid-section-header">

                <div class="ppid-eyebrow">
                    <i class="bi bi-file-earmark-check-fill"></i>
                    Komitmen Pelayanan
                </div>

                <h2 class="ppid-section-title">
                    Maklumat Pelayanan
                </h2>

                <p class="ppid-section-description">
                    Komitmen RSUD Ar Rozy Kota Probolinggo dalam
                    memberikan pelayanan terbaik kepada masyarakat.
                </p>

            </div>


            {{-- DOCUMENT CARD --}}

            <div class="ppid-service-document">

                <div class="ppid-service-document-inner">

                    <img
                        src="{{ asset('img/ppid/maklumat-pelayanan.jpg') }}"
                        alt="Maklumat Pelayanan RSUD Ar Rozy Kota Probolinggo"
                        loading="eager">

                </div>


                {{-- DOCUMENT FOOTER --}}

                <div class="ppid-service-document-footer">

                    <div class="ppid-service-document-status">

                        <div class="ppid-service-status-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <div>

                            <strong>
                                Komitmen Pelayanan Publik
                            </strong>

                            <span>
                                RSUD Ar Rozy Kota Probolinggo
                            </span>

                        </div>

                    </div>

                    <div class="ppid-service-document-badge">
                        <i class="bi bi-patch-check-fill"></i>
                        Maklumat Pelayanan
                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- =====================================================
     UNIT KERJA
    ====================================================== --}}

    <section
        id="unit-kerja"
        class="ppid-unit-section">

        <div class="ppid-unit-container">

            {{-- =====================================================
             HEADING
            ====================================================== --}}

            <div class="ppid-unit-heading">

                <span class="ppid-unit-label">

                    <i class="fas fa-building"></i>

                    UNIT KERJA

                </span>

                <h2>
                    Unit Kerja RSUD Ar Rozy Kota Probolinggo
                </h2>

                <p>
                    Unit Kerja RSUD Ar Rozy Kota Probolinggo adalah
                    unsur organisasi yang mendukung penyelenggaraan
                    pelayanan kesehatan, administrasi, pengelolaan,
                    serta fungsi penunjang rumah sakit.
                </p>

            </div>


            {{-- =====================================================
             UNIT LIST
            ====================================================== --}}

            <div class="ppid-unit-list">


                {{-- =================================================
                 A. DIREKTUR
                ================================================== --}}

                <div class="ppid-unit-card director">

                    <div class="ppid-unit-card-header">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-user-tie"></i>

                        </div>

                        <div class="ppid-unit-card-content">

                            <span class="ppid-unit-number">
                                Unit Kerja
                            </span>

                            <h3>
                                Direktur
                            </h3>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                 B. BAGIAN UMUM DAN KEUANGAN
                ================================================== --}}

                <div class="ppid-unit-card">

                    <div class="ppid-unit-card-header">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-briefcase"></i>

                        </div>

                        <div class="ppid-unit-card-content">

                            <span class="ppid-unit-number">
                                Bagian
                            </span>

                            <h3>
                                Bagian Umum dan Keuangan
                            </h3>

                        </div>

                    </div>


                    <div class="ppid-unit-sublist">

                        <div class="ppid-unit-subitem">

                            <i class="fas fa-circle"></i>

                            <span>
                                Subbagian Umum
                            </span>

                        </div>

                        <div class="ppid-unit-subitem">

                            <i class="fas fa-circle"></i>

                            <span>
                                Subbagian Keuangan
                            </span>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                 C. PENELITIAN & PENGEMBANGAN
                ================================================== --}}

                <div class="ppid-unit-card">

                    <div class="ppid-unit-card-header">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-flask"></i>

                        </div>

                        <div class="ppid-unit-card-content">

                            <span class="ppid-unit-number">
                                Subbagian
                            </span>

                            <h3>
                                Subbagian Penelitian dan Pengembangan,
                                Sumber Daya Manusia, serta Pendidikan
                                dan Pelatihan
                            </h3>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                 D. BIDANG PELAYANAN MEDIK
                ================================================== --}}

                <div class="ppid-unit-card">

                    <div class="ppid-unit-card-header">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-user-md"></i>

                        </div>

                        <div class="ppid-unit-card-content">

                            <span class="ppid-unit-number">
                                Bidang
                            </span>

                            <h3>
                                Bidang Pelayanan Medik,
                                Penunjang Medik, dan
                                Pelayanan Kefarmasian
                            </h3>

                        </div>

                    </div>


                    <div class="ppid-unit-sublist">

                        <div class="ppid-unit-subitem">

                            <i class="fas fa-circle"></i>

                            <span>
                                Seksi Pelayanan Medik dan
                                Penunjang Medik
                            </span>

                        </div>

                        <div class="ppid-unit-subitem">

                            <i class="fas fa-circle"></i>

                            <span>
                                Seksi Kefarmasian
                            </span>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                 E. BIDANG KEPERAWATAN
                ================================================== --}}

                <div class="ppid-unit-card">

                    <div class="ppid-unit-card-header">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-user-nurse"></i>

                        </div>

                        <div class="ppid-unit-card-content">

                            <span class="ppid-unit-number">
                                Bidang
                            </span>

                            <h3>
                                Bidang Pelayanan Keperawatan,
                                Kebidanan, dan Pelayanan Penunjang
                            </h3>

                        </div>

                    </div>


                    <div class="ppid-unit-sublist">

                        <div class="ppid-unit-subitem">

                            <i class="fas fa-circle"></i>

                            <span>
                                Seksi Pelayanan Keperawatan
                                dan Kebidanan
                            </span>

                        </div>

                        <div class="ppid-unit-subitem">

                            <i class="fas fa-circle"></i>

                            <span>
                                Seksi Pelayanan Penunjang
                            </span>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                 F - J
                ================================================== --}}

                <div class="ppid-unit-functional">


                    {{-- KELOMPOK STAF MEDIS --}}

                    <div class="ppid-unit-small-card">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-user-doctor"></i>

                        </div>

                        <h3>
                            Kelompok Staf Medis
                        </h3>

                    </div>


                    {{-- KOMITE RUMAH SAKIT --}}

                    <div class="ppid-unit-small-card">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-users"></i>

                        </div>

                        <h3>
                            Komite Rumah Sakit
                        </h3>

                    </div>


                    {{-- SATUAN PEMERIKSAAN INTERNAL --}}

                    <div class="ppid-unit-small-card">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-clipboard-check"></i>

                        </div>

                        <h3>
                            Satuan Pemeriksaan Internal
                        </h3>

                    </div>


                    {{-- INSTALASI --}}

                    <div class="ppid-unit-small-card">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-hospital"></i>

                        </div>

                        <h3>
                            Instalasi
                        </h3>

                    </div>


                </div>


                {{-- =================================================
                 KELOMPOK JABATAN FUNGSIONAL
                ================================================== --}}

                <div class="ppid-unit-card">

                    <div class="ppid-unit-card-header">

                        <div class="ppid-unit-icon">

                            <i class="fas fa-sitemap"></i>

                        </div>

                        <div class="ppid-unit-card-content">

                            <span class="ppid-unit-number">
                                Unsur Organisasi
                            </span>

                            <h3>
                                Kelompok Jabatan Fungsional
                            </h3>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>

    <!-- =========================================================
     DASAR HUKUM
    ========================================================== -->

    <section
        id="dasar-hukum"
        class="ppid-legal-section"
        style="padding: 70px 24px 100px;">

        <div class="max-w-6xl mx-auto">

            <!-- =====================================================
             HEADER
            ====================================================== -->

            <div class="text-center mb-12">

                <span class="ppid-unit-label">
                    <i class="fas fa-scale-balanced"></i>
                    DASAR HUKUM
                </span>

                <h2
                    style="
                    margin: 8px 0 12px;
                    color: #1e293b;
                    font-size: clamp(1.8rem, 3vw, 2.5rem);
                    font-weight: 900;
                    letter-spacing: -.03em;
                ">

                    Landasan Hukum PPID

                </h2>

                <p
                    style="
                    max-width: 720px;
                    margin: 0 auto;
                    color: #64748b;
                    font-size: .95rem;
                    line-height: 1.8;
                ">

                    Peraturan perundang-undangan yang menjadi dasar
                    pelaksanaan keterbukaan informasi publik dan
                    penyelenggaraan pelayanan publik di RSUD Ar Rozy
                    Kota Probolinggo.

                </p>

            </div>


            <!-- =====================================================
             GRID
            ====================================================== -->

            <div class="ppid-legal-grid">


                <!-- =================================================
                 UNDANG-UNDANG
                ================================================== -->

                <div class="ppid-legal-card">

                    <div class="ppid-legal-card-header">

                        <div class="ppid-legal-icon">
                            <i class="fas fa-scale-balanced"></i>
                        </div>

                        <div>
                            <span>
                                PERATURAN PERUNDANG-UNDANGAN
                            </span>

                            <h3>
                                Undang-Undang
                            </h3>
                        </div>

                    </div>


                    <div class="ppid-legal-list">


                        <!-- UU 14 -->

                        <div class="ppid-legal-item">

                            <div class="ppid-legal-number">
                                01
                            </div>

                            <div class="ppid-legal-content">

                                <h4>
                                    UU Nomor 14 Tahun 2008
                                </h4>

                                <p>
                                    Tentang Keterbukaan Informasi Publik
                                </p>

                                <a
                                    href="https://peraturan.bpk.go.id/Details/39047/uu-no-14-tahun-2008"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="ppid-legal-link">

                                    <i class="fas fa-arrow-up-right-from-square"></i>

                                    Lihat Peraturan

                                </a>

                            </div>

                        </div>


                        <!-- UU 25 -->

                        <div class="ppid-legal-item">

                            <div class="ppid-legal-number">
                                02
                            </div>

                            <div class="ppid-legal-content">

                                <h4>
                                    UU Nomor 25 Tahun 2009
                                </h4>

                                <p>
                                    Tentang Pelayanan Publik
                                </p>

                                <a
                                    href="https://peraturan.bpk.go.id/Details/38748/uu-no-25-tahun-2009"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="ppid-legal-link">

                                    <i class="fas fa-arrow-up-right-from-square"></i>

                                    Lihat Peraturan

                                </a>

                            </div>

                        </div>


                        <!-- UU 23 -->

                        <div class="ppid-legal-item">

                            <div class="ppid-legal-number">
                                03
                            </div>

                            <div class="ppid-legal-content">

                                <h4>
                                    UU Nomor 23 Tahun 2014
                                </h4>

                                <p>
                                    Tentang Pemerintahan Daerah
                                </p>

                                <a
                                    href="https://peraturan.bpk.go.id/Details/38685/uu-no-23-tahun-2014"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="ppid-legal-link">

                                    <i class="fas fa-arrow-up-right-from-square"></i>

                                    Lihat Peraturan

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                 PERATURAN WALIKOTA
                ================================================== -->

                <div class="ppid-legal-card">

                    <div class="ppid-legal-card-header">

                        <div class="ppid-legal-icon orange">
                            <i class="fas fa-landmark"></i>
                        </div>

                        <div>
                            <span>
                                PERATURAN DAERAH
                            </span>

                            <h3>
                                Peraturan Walikota
                            </h3>
                        </div>

                    </div>


                    <div class="ppid-legal-list">


                        <!-- PERWALI 88 -->

                        <div class="ppid-legal-item">

                            <div class="ppid-legal-number">
                                01
                            </div>

                            <div class="ppid-legal-content">

                                <h4>
                                    Perwali Nomor 88 Tahun 2021
                                </h4>

                                <p>
                                    Tentang Pembentukan Unit Organisasi
                                    Bersifat Khusus RSUD Ar Rozy
                                    Kota Probolinggo
                                </p>

                                <!--
                                LINK DIKOSONGKAN DULU
                            -->

                                <span class="ppid-legal-link disabled">

                                    <i class="fas fa-link-slash"></i>

                                    Dokumen belum tersedia

                                </span>

                            </div>

                        </div>


                        <!-- PERWALI 2 -->

                        <div class="ppid-legal-item">

                            <div class="ppid-legal-number">
                                02
                            </div>

                            <div class="ppid-legal-content">

                                <h4>
                                    Perwali Nomor 2 Tahun 2024
                                </h4>

                                <p>
                                    Tentang Peraturan Internal Unit Organisasi
                                    Bersifat Khusus Rumah Sakit Umum Daerah
                                    Ar Rozy Kota Probolinggo
                                </p>

                                <a
                                    href="https://jdih.probolinggokota.go.id/app/unggah/2024/01/SALINAN_RSUD%20AR%20ROZY_%20PERWALI_NO_%202%20TAHUN%202024%20ttg%20PERATURAN%20INTERNAL%20RSUD%20AR%20ROZY.pdf"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="ppid-legal-link">

                                    <i class="fas fa-arrow-up-right-from-square"></i>

                                    Lihat Peraturan

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     TATA CARA PERMOHONAN INFORMASI
    ========================================================== -->

    <section
        id="tata-cara-permohonan"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
             HEADER
             ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">
                    <i class="fas fa-clipboard-check"></i>
                    STANDAR PELAYANAN
                </span>

                <h2>
                    Tata Cara Permohonan Informasi
                </h2>

                <p>
                    Informasi mengenai alur dan tahapan permohonan
                    informasi publik pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
             FLOW IMAGE
            ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/alur-permohonan.jpeg') }}"
                        alt="Tata Cara Permohonan Informasi PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     TATA CARA PENGAJUAN KEBERATAN
    ========================================================== -->

    <section
        id="tata-cara-pengajuan-keberatan"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
         ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">
                    <i class="fas fa-clipboard-check"></i>
                    STANDAR PELAYANAN
                </span>

                <h2>
                    Tatacara Pengajuan Keberatan
                </h2>

                <p>
                    Informasi mengenai tata cara pengajuan keberatan
                    atas pelayanan informasi publik PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         FLOW IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/alur-pengajuan.jpeg') }}"
                        alt="Tatacara Pengajuan Keberatan PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     JAM LAYANAN
    ========================================================== -->

    <section
        id="jam-layanan"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                 HEADER
            ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">
                    <i class="fas fa-clipboard-check"></i>
                    STANDAR PELAYANAN
                </span>

                <h2>
                    Jam Layanan
                </h2>

                <p>
                    Informasi mengenai jam layanan pelayanan informasi
                    publik pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
                JAM LAYANAN IMAGE
             ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/jam-layanan.jpeg') }}"
                        alt="Jam Layanan PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     FORMULIR PERMOHONAN INFORMASI
    ========================================================== -->

    <section
        id="formulir-permohonan-informasi"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                 HEADER
             ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">
                    <i class="fas fa-clipboard-check"></i>
                    STANDAR PELAYANAN
                </span>

                <h2>
                    Formulir Permohonan Informasi
                </h2>

                <p>
                    Formulir yang digunakan untuk mengajukan
                    permohonan informasi publik pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
            FORMULIR IMAGE
             ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/formulir-permohonan-informasi.jpeg') }}"
                        alt="Formulir Permohonan Informasi PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     FORMULIR PERMOHONAN INFORMASI
    ========================================================== -->

    <section
        id="formulir-pemberitahuan-tertulis"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
         ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">
                    <i class="fas fa-clipboard-check"></i>
                    STANDAR PELAYANAN
                </span>

                <h2>
                    Formulir Pemberitahuan Tertulis
                </h2>

                <p>
                    Formulir pemberitahuan tertulis terkait layanan
                    informasi publik pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         FORMULIR IMAGE
         ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/formulir-pemberitahuan-tertulis.jpeg') }}"
                        alt="Formulir Pemberitahuan Tertulis PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
     FORMULIR PENOLAKAN INFORMASI
    ========================================================== -->

    <section
        id="formulir-penolakan-informasi"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
         ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">
                    <i class="fas fa-clipboard-check"></i>
                    STANDAR PELAYANAN
                </span>

                <h2>
                    Formulir Penolakan Informasi
                </h2>

                <p>
                    Formulir yang digunakan dalam pemberitahuan
                    penolakan informasi publik pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         FORMULIR IMAGE
         ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/formulir-penolakan-informasi.jpeg') }}"
                        alt="Formulir Penolakan Informasi PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     FORMULIR PENOLAKAN INFORMASI
    ========================================================== -->

    <section
        id="formulir-keberatan"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
         ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">
                    <i class="fas fa-clipboard-check"></i>
                    STANDAR PELAYANAN
                </span>

                <h2>
                    Formulir Keberatan
                </h2>

                <p>
                    Formulir yang digunakan untuk mengajukan keberatan
                    atas pelayanan informasi publik pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         FORMULIR IMAGE
         ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/formulir-keberatam.jpeg') }}"
                        alt="Formulir Keberatan PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     INFORMASI YANG TERSEDIA SETIAP SAAT
    ========================================================== -->

    <section
        id="informasi-tersedia-setiap-saat"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
        ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-list-check"></i>

                    DAFTAR INFORMASI PUBLIK

                </span>

                <h2>
                    Informasi yang tersedia setiap saat
                </h2>

                <p>
                    Informasi publik yang tersedia setiap saat
                    dan dapat diakses melalui PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         INFORMATION IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/ketersediaan-informasi.jpeg') }}"
                        alt="Informasi yang tersedia setiap saat PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     INFORMASI YANG DIUMUMKAN SECARA BERKALA
    ========================================================== -->

    <section
        id="informasi-diumumkan-secara-berkala"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
        ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-list-check"></i>

                    DAFTAR INFORMASI PUBLIK

                </span>

                <h2>
                    Informasi yang diumumkan secara berkala
                </h2>

                <p>
                    Informasi publik yang diumumkan secara berkala
                    oleh PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         INFORMATION IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/informasi-berkala.jpeg') }}"
                        alt="Informasi yang diumumkan secara berkala PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     INFORMASI SERTA MERTA
    ========================================================== -->

    <section
        id="informasi-serta-merta"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
        ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-list-check"></i>

                    DAFTAR INFORMASI PUBLIK

                </span>

                <h2>
                    Informasi yang serta merta
                </h2>

                <p>
                    Informasi publik yang wajib diumumkan secara
                    serta merta oleh PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         INFORMATION IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/informasi-serta-merta.jpeg') }}"
                        alt="Informasi yang serta merta PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     DAFTAR INFORMASI DIKECUALIKAN
    ========================================================== -->

    <section
        id="daftar-informasi-dikecualikan"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
        ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-list-check"></i>

                    DAFTAR INFORMASI PUBLIK

                </span>

                <h2>
                    Daftar Informasi Dikecualikan
                </h2>

                <p>
                    Daftar informasi publik yang dikecualikan
                    dari akses informasi pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         INFORMATION IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/daftar-dikecualikan.jpeg') }}"
                        alt="Daftar Informasi Dikecualikan PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     DOKUMEN PERENCANAAN
    ========================================================== -->

    <section
        id="dokumen-perencanaan"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
        ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-list-check"></i>

                    DOKUMEN PERENCANAAN

                </span>

                <h2>
                    Dokumen Perencanaan
                </h2>

                <p>
                    Informasi mengenai dokumen perencanaan
                    PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         DOCUMENT IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/dokumen-perencanaan.jpeg') }}"
                        alt="Dokumen Perencanaan PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     SOP PENGADUAN
    ========================================================== -->

    <section
        id="sop-pengaduan"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
         HEADER
        ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-headset"></i>

                    SOP PENGADUAN

                </span>

                <h2>
                    SOP Pengaduan
                </h2>

                <p>
                    Informasi mengenai standar operasional prosedur
                    pengaduan pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
         SOP IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-pengaduan.jpeg') }}"
                        alt="SOP Pengaduan PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     REKAP PENGELOLAAN SAPAN LAPOR!
    ========================================================== -->

    <section
        id="rekap-sp4n-lapor"
        class="ppid-section ppid-sp4n-section">

        <div class="container">

            {{-- =============================================
             SECTION HEADER
        ============================================== --}}

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-chart-column"></i>

                    REKAP PENGELOLAAN

                </span>

                <h2>
                    Rekap Pengelolaan SP4N LAPOR! 2025
                </h2>

                <p>
                    Rekapitulasi pengelolaan pengaduan dan aspirasi
                    melalui berbagai sumber laporan pada RSUD Ar Rozy
                    Kota Probolinggo tahun 2025.
                </p>

            </div>


            {{-- =============================================
             TABLE CARD
        ============================================== --}}

            <div class="ppid-sp4n-card">

                <div class="ppid-sp4n-heading">

                    <h3>
                        Rekap Pengelolaan Sp4n Lapor! 2025
                    </h3>

                    <p>
                        RSUD Ar Rozy Kota Probolinggo
                    </p>

                </div>


                {{-- =============================================
                 RESPONSIVE TABLE
            ============================================== --}}

                <div class="ppid-sp4n-table-wrapper">

                    <table class="ppid-sp4n-table">

                        <thead>

                            <tr>

                                <th scope="col" class="ppid-sp4n-no">
                                    No
                                </th>

                                <th scope="col" class="ppid-sp4n-source">
                                    Sumber Laporan
                                </th>

                                <th scope="col">
                                    Jumlah<br>
                                    Pengaduan
                                </th>

                                <th scope="col">
                                    Jumlah<br>
                                    Aspirasi
                                </th>

                                <th scope="col" class="ppid-sp4n-total-column">
                                    Jumlah yang<br>
                                    di Input di<br>
                                    Sp4n Lapor!
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Sp4n Lapor!</td>
                                <td>43</td>
                                <td>7</td>
                                <td>50</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Website</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Tatap Muka</td>
                                <td>3</td>
                                <td>1</td>
                                <td>4</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Instagram</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Call Center</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Email Instansi</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>WA</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>SMS</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>9</td>
                                <td>Surat Kabar</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>10</td>
                                <td>Telepon</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>11</td>
                                <td>Radio</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>12</td>
                                <td>Surat</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                        </tbody>


                        <tfoot>

                            <tr>

                                <th
                                    colspan="2"
                                    scope="row"
                                    class="ppid-sp4n-grand-total">

                                    TOTAL

                                </th>

                                <th>
                                    46
                                </th>

                                <th>
                                    8
                                </th>

                                <th>
                                    54
                                </th>

                            </tr>

                        </tfoot>

                    </table>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
     SOP PPID
    ====================================================== -->

    <section
        id="sop-1"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                 HEADER
            ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-file-contract"></i>

                    SOP PPID

                </span>

                <h2>
                    SOP PELAYANAN PERMOHONAN INFORMASI PUBLIK
                </h2>

                <p>
                    Standar Operasional Prosedur pelayanan
                    informasi publik pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
                SOP IMAGE
             ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-1.jpeg') }}"
                        alt="SOP 1 PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
        SOP PPID — SOP 2
    ====================================================== -->

    <section
        id="sop-2"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
             HEADER
        ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-file-circle-exclamation"></i>

                    SOP PPID

                </span>

                <h2>
                    SOP Penanganan Keberatan Informasi
                </h2>

                <p>
                    Standar Operasional Prosedur penanganan
                    keberatan informasi publik pada PPID
                    RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
             SOP IMAGE
        ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-2.jpeg') }}"
                        alt="SOP Penanganan Keberatan Informasi PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
    SOP PPID — SOP 3
    ====================================================== -->

    <section
        id="sop-3"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                HEADER
            ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-file-circle-exclamation"></i>

                    SOP PPID

                </span>

                <h2>
                    SOP Pendokumentasian Informasi Publik
                </h2>

                <p>
                    Standar Operasional Prosedur pendokumentasian
                    informasi publik pada PPID
                    RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
            SOP IMAGE
            ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-3.jpeg') }}"
                        alt="SOP Pendokumentasian Informasi Publik PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
     SOP PPID — SOP 4
    ====================================================== -->

    <section
        id="sop-4"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                HEADER
            ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-file-circle-exclamation"></i>

                    SOP PPID

                </span>

                <h2>
                    SOP Penetapan dan Pemutakhiran DIP
                </h2>

                <p>
                    Standar Operasional Prosedur penetapan dan
                    pemutakhiran Daftar Informasi Publik (DIP)
                    pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
                SOP IMAGE
            ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-4.jpeg') }}"
                        alt="SOP Penetapan dan Pemutakhiran DIP PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
        SOP PPID — SOP 5
    ====================================================== -->

    <section
        id="sop-5"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                HEADER
            ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-file-circle-exclamation"></i>

                    SOP PPID

                </span>

                <h2>
                    SOP Penyusunan DIP
                </h2>

                <p>
                    Standar Operasional Prosedur penyusunan
                    Daftar Informasi Publik (DIP)
                    pada PPID RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
                SOP IMAGE
            ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-5.jpeg') }}"
                        alt="SOP Penyusunan DIP PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
     SOP PPID — SOP 6
    ====================================================== -->

    <section
        id="sop-6"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                 HEADER
            ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-file-circle-exclamation"></i>

                    SOP PPID

                </span>

                <h2>
                    SOP Konsekuensi Informasi Publik
                </h2>

                <p>
                    Standar Operasional Prosedur penetapan
                    konsekuensi informasi publik pada PPID
                    RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
                SOP IMAGE
            ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-6.jpeg') }}"
                        alt="SOP Konsekuensi Informasi Publik PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
    SOP PPID — SOP 7
    ====================================================== -->

    <section
        id="sop-7"
        class="ppid-section ppid-permohonan-section">

        <div class="container">

            <!-- =============================================
                HEADER
             ============================================== -->

            <div class="ppid-section-header">

                <span class="ppid-unit-label">

                    <i class="fas fa-file-circle-exclamation"></i>

                    SOP PPID

                </span>

                <h2>
                    SOP Fasilitasi Sengketa Informasi Publik
                </h2>

                <p>
                    Standar Operasional Prosedur fasilitasi
                    sengketa informasi publik pada PPID
                    RSUD Ar Rozy.
                </p>

            </div>


            <!-- =============================================
                 SOP IMAGE
            ============================================== -->

            <div class="ppid-permohonan-card">

                <div class="ppid-permohonan-image">

                    <img
                        src="{{ asset('img/ppid/sop-7.jpeg') }}"
                        alt="SOP Fasilitasi Sengketa Informasi Publik PPID RSUD Ar Rozy"
                        loading="eager">

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
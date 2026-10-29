<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/logo-pin-edit.png') }}" type="image/x-icon">
    <title>{{ $title }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/signin.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/mainadmin.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @if (
    request()->is('news') ||
    request()->is('news/*') ||
    request()->is('pkrs') ||
    request()->is('pkrs/*')
    )
    @vite('resources/css/pkrs.css')
    @endif

    @if (
    request()->is('ppid') ||
    request()->is('ppid#*')
    )
    @vite('resources/css/ppid.css')
    @endif

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        /* Prevent small horizontal overflow on mobile by hiding x-axis overflow on root elements */
        html,
        body {
            overflow-x: hidden;
        }

        /* Smooth global */
        header {
            transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1),
                opacity 0.35s ease;
            will-change: transform;
        }

        /* Body content wrapper */
        .page-wrapper {
            transition: margin-top 0.45s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Hidden state */
        .navbar-hidden header {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }

        /* Saat navbar hidden → content naik */
        .navbar-hidden .page-wrapper {
            margin-top: -70px;
            /* sesuaikan tinggi navbar */
        }
    </style>
</head>

<body class="bg-white text-gray-800 font-sans overflow-x-hidden">

    {{-- =====================================================
        NAVBAR UTAMA
    ====================================================== --}}
    @include('frontend.partials.mainmenu.navbar')

    {{-- =====================================================
        SUBNAVBAR BERITA & PKRS
    ====================================================== --}}

    @if (
    request()->is('news') ||
    request()->is('news/*') ||
    request()->is('pkrs') ||
    request()->is('pkrs/*')
    )

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

        #newsPkrsSubnav,
        #newsPkrsSubnav *,
        #newsPkrsSubnav *::before,
        #newsPkrsSubnav *::after {
            box-sizing: border-box;
        }

        #newsPkrsSubnav {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #eef1f4;
        }

        #newsPkrsSubnav .news-pkrs-subnav-inner {
            max-width: 1240px;
            margin: 0 auto;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* wadah segmented-control bulat, satu kesatuan */
        #newsPkrsSubnav .news-pkrs-group {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px;
            border-radius: 999px;
            background: #f1f5f9;
            border: 1px solid #e9edf1;
        }

        #newsPkrsSubnav .news-pkrs-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 22px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
            text-decoration: none;
            transition: background .25s ease, color .25s ease, box-shadow .25s ease, transform .2s ease;
        }

        #newsPkrsSubnav .news-pkrs-link i {
            font-size: 12.5px;
            opacity: .8;
        }

        #newsPkrsSubnav .news-pkrs-link:hover {
            color: #0D9488;
        }

        #newsPkrsSubnav .news-pkrs-link.active {
            background: #0D9488;
            color: #ffffff;
            box-shadow: 0 8px 18px rgba(13, 148, 136, .32);
        }

        #newsPkrsSubnav .news-pkrs-link.active i {
            opacity: 1;
        }

        #newsPkrsSubnav .news-pkrs-link.active:hover {
            transform: translateY(-1px);
        }

        @media (max-width: 480px) {
            #newsPkrsSubnav .news-pkrs-link {
                padding: 8px 16px;
                font-size: 13px;
            }
        }
    </style>

    <nav id="newsPkrsSubnav"
        class="news-pkrs-subnav">

        <div class="news-pkrs-subnav-inner">

            <div class="news-pkrs-group">

                {{-- BERITA --}}
                <a href="{{ route('news') }}"
                    data-news-pkrs-link
                    class="news-pkrs-link
                   {{ request()->is('news') || request()->is('news/*') ? 'active' : '' }}">

                    <i class="fa-solid fa-newspaper"></i>
                    <span>Berita</span>

                </a>


                {{-- PKRS --}}
                <a href="{{ url('/pkrs') }}"
                    data-news-pkrs-link
                    class="news-pkrs-link
                   {{ request()->is('pkrs') || request()->is('pkrs/*') ? 'active' : '' }}">

                    <i class="fa-solid fa-hand-holding-medical"></i>
                    <span>PKRS</span>

                </a>

            </div>

        </div>

    </nav>

    @endif

    {{-- =====================================================
        CONTENT
    ====================================================== --}}
    <div class="page-wrapper">

        @if (
        request()->is('news') ||
        request()->is('news/*') ||
        request()->is('pkrs') ||
        request()->is('pkrs/*')
        )

        <div id="newsPkrsContent">
            @yield('content')
        </div>

        @else

        @yield('content')

        @endif

    </div>

    <section class="rz-links-scope py-20 bg-white">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

            .rz-links-scope,
            .rz-links-scope *,
            .rz-links-scope *::before,
            .rz-links-scope *::after {
                box-sizing: border-box;
            }

            .rz-links-scope {
                font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
            }

            .rz-links-scope .rz-links-title {
                color: #0f172a;
                border-color: #0D9488;
            }

            .rz-links-scope .rz-links-label {
                color: #334155;
            }
        </style>

        <div class="max-w-6xl mx-auto px-4">

            <!-- Title -->
            <div class="text-center mb-12">
                <h2 class="rz-links-title text-3xl font-bold">
                    <span class="border-b-4 pb-2">
                        <span class="font-extrabold">LINK</span> TERKAIT
                    </span>
                </h2>
            </div>

            <!-- Grid Links -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">

                <!-- Item -->
                <a href="https://probolinggokota.go.id" target="_blank"
                    class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center 
                   hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <img src="{{ asset('img/link_terkait/pemkot.png') }}" class="h-16 object-contain mb-3" alt="Pemkot">

                    <p class="rz-links-label text-sm font-semibold">
                        Website Resmi Pemerintah Kota Probolinggo
                    </p>
                </a>

                <!-- Item -->
                <a href="https://lapor.go.id" target="_blank"
                    class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center 
                   hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <img src="{{ asset('img/link_terkait/laporgoid.png') }}" class="h-16 object-contain mb-3" alt="Lapor">

                    <p class="rz-links-label text-sm font-semibold">
                        LAPOR.GO.ID
                    </p>
                </a>

                <!-- Item -->
                <a href="https://diskominfo.probolinggokota.go.id" target="_blank"
                    class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center 
                   hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <img src="{{ asset('img/link_terkait/diskominfo.png') }}" class="h-16 object-contain mb-3" alt="Diskominfo">

                    <p class="rz-links-label text-sm font-semibold">
                        Diskominfo Kota Probolinggo
                    </p>
                </a>

                <a href="https://www.kemendagri.go.id/" target="_blank"
                    class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center 
                   hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <img src="{{ asset('img/link_terkait/kemendagri.png') }}" class="h-16 object-contain mb-3" alt="Diskominfo">

                    <p class="rz-links-label text-sm font-semibold">
                        Kemendagri
                    </p>
                </a>

                <a href="https://satudata.probolinggokota.go.id/" target="_blank"
                    class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center 
                   hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <img src="{{ asset('img/link_terkait/satudata.png') }}" class="h-16 object-contain mb-3" alt="Diskominfo">

                    <p class="rz-links-label text-sm font-semibold">
                        Satu Data
                    </p>
                </a>
                <a href="https://probolinggokota.go.id/" target="_blank"
                    class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center 
                   hover:shadow-xl hover:-translate-y-1 transition duration-300">

                    <img src="{{ asset('img/link_terkait/112.png') }}" class="h-16 object-contain mb-3" alt="Diskominfo">

                    <p class="rz-links-label text-sm font-semibold">
                        Portal Probolinggo
                    </p>
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* =========================================================
               PKRS INITIALIZER
               ========================================================= */

            function initPKRS(root = document) {

                initCarousels(root);
                initDetailTouch(root);

            }


            /* =========================================================
               1. POST CAROUSEL
               ========================================================= */

            function initCarousels(root) {

                root.querySelectorAll('[data-carousel]').forEach(function(carousel) {

                    /*
                     * Jangan init carousel yang sama dua kali
                     */
                    if (carousel.dataset.pkrsCarouselInitialized === 'true') {
                        return;
                    }

                    carousel.dataset.pkrsCarouselInitialized = 'true';


                    const track =
                        carousel.querySelector('[data-carousel-track]');

                    const slides =
                        carousel.querySelectorAll('.pkrs-carousel-slide');

                    const prevButton =
                        carousel.querySelector('[data-carousel-prev]');

                    const nextButton =
                        carousel.querySelector('[data-carousel-next]');

                    const currentCounter =
                        carousel.querySelector('[data-carousel-current]');

                    const dots =
                        carousel.querySelectorAll('[data-carousel-dot]');


                    if (!track || slides.length <= 1) {
                        return;
                    }


                    let currentIndex = 0;

                    let startX = 0;
                    let startY = 0;

                    let currentX = 0;
                    let currentY = 0;

                    let isDragging = false;
                    let isVerticalMovement = false;

                    let mouseDown = false;
                    let mouseStartX = 0;

                    const swipeThreshold = 50;


                    /* =====================================================
                       UPDATE
                    ====================================================== */

                    function updateCarousel() {

                        track.style.transform =
                            `translateX(-${currentIndex * 100}%)`;


                        if (currentCounter) {

                            currentCounter.textContent =
                                currentIndex + 1;

                        }


                        dots.forEach(function(dot, index) {

                            dot.classList.toggle(
                                'active',
                                index === currentIndex
                            );

                        });

                    }


                    /* =====================================================
                       NEXT
                    ====================================================== */

                    function nextSlide() {

                        currentIndex++;

                        if (currentIndex >= slides.length) {
                            currentIndex = 0;
                        }

                        updateCarousel();

                    }


                    /* =====================================================
                       PREVIOUS
                    ====================================================== */

                    function prevSlide() {

                        currentIndex--;

                        if (currentIndex < 0) {
                            currentIndex = slides.length - 1;
                        }

                        updateCarousel();

                    }


                    /* =====================================================
                       BUTTON NEXT
                    ====================================================== */

                    if (nextButton) {

                        nextButton.addEventListener(
                            'click',
                            function(event) {

                                event.preventDefault();
                                event.stopPropagation();

                                nextSlide();

                            }
                        );

                    }


                    /* =====================================================
                       BUTTON PREVIOUS
                    ====================================================== */

                    if (prevButton) {

                        prevButton.addEventListener(
                            'click',
                            function(event) {

                                event.preventDefault();
                                event.stopPropagation();

                                prevSlide();

                            }
                        );

                    }


                    /* =====================================================
                       DOTS
                    ====================================================== */

                    dots.forEach(function(dot) {

                        dot.addEventListener(
                            'click',
                            function(event) {

                                event.preventDefault();
                                event.stopPropagation();


                                const index =
                                    Number(this.dataset.carouselDot);


                                if (
                                    Number.isNaN(index) ||
                                    index < 0 ||
                                    index >= slides.length
                                ) {
                                    return;
                                }


                                currentIndex = index;

                                updateCarousel();

                            }
                        );

                    });


                    /* =====================================================
                       TOUCH START
                    ====================================================== */

                    carousel.addEventListener(
                        'touchstart',
                        function(event) {

                            if (!event.touches.length) {
                                return;
                            }


                            if (
                                event.target.closest(
                                    '[data-carousel-prev], [data-carousel-next], [data-carousel-dot]'
                                )
                            ) {
                                return;
                            }


                            const touch =
                                event.touches[0];


                            startX = touch.clientX;
                            startY = touch.clientY;

                            currentX = touch.clientX;
                            currentY = touch.clientY;

                            isDragging = true;
                            isVerticalMovement = false;

                        }, {
                            passive: true
                        }
                    );


                    /* =====================================================
                       TOUCH MOVE
                    ====================================================== */

                    carousel.addEventListener(
                        'touchmove',
                        function(event) {

                            if (
                                !isDragging ||
                                !event.touches.length
                            ) {
                                return;
                            }


                            const touch =
                                event.touches[0];


                            currentX = touch.clientX;
                            currentY = touch.clientY;


                            const deltaX =
                                currentX - startX;

                            const deltaY =
                                currentY - startY;


                            if (
                                Math.abs(deltaY) >
                                Math.abs(deltaX)
                            ) {

                                isVerticalMovement = true;
                                isDragging = false;

                            }

                        }, {
                            passive: true
                        }
                    );


                    /* =====================================================
                       TOUCH END
                    ====================================================== */

                    carousel.addEventListener(
                        'touchend',
                        function() {

                            if (!isDragging) {
                                return;
                            }


                            isDragging = false;


                            if (isVerticalMovement) {
                                return;
                            }


                            const deltaX =
                                currentX - startX;

                            const deltaY =
                                currentY - startY;


                            if (
                                Math.abs(deltaX) <
                                swipeThreshold
                            ) {
                                return;
                            }


                            if (
                                Math.abs(deltaY) >
                                Math.abs(deltaX)
                            ) {
                                return;
                            }


                            if (deltaX < 0) {
                                nextSlide();
                            } else {
                                prevSlide();
                            }

                        }, {
                            passive: true
                        }
                    );


                    /* =====================================================
                       TOUCH CANCEL
                    ====================================================== */

                    carousel.addEventListener(
                        'touchcancel',
                        function() {

                            isDragging = false;
                            isVerticalMovement = false;

                        }, {
                            passive: true
                        }
                    );


                    /* =====================================================
                       MOUSE DOWN
                    ====================================================== */

                    carousel.addEventListener(
                        'mousedown',
                        function(event) {

                            if (event.button !== 0) {
                                return;
                            }


                            if (
                                event.target.closest(
                                    '[data-carousel-prev], [data-carousel-next], [data-carousel-dot]'
                                )
                            ) {
                                return;
                            }


                            mouseDown = true;
                            mouseStartX = event.clientX;

                        }
                    );


                    /* =====================================================
                       MOUSE UP
                    ====================================================== */

                    carousel.addEventListener(
                        'mouseup',
                        function(event) {

                            if (!mouseDown) {
                                return;
                            }


                            mouseDown = false;


                            const deltaX =
                                event.clientX -
                                mouseStartX;


                            if (
                                Math.abs(deltaX) <
                                swipeThreshold
                            ) {
                                return;
                            }


                            if (deltaX < 0) {
                                nextSlide();
                            } else {
                                prevSlide();
                            }

                        }
                    );


                    /* =====================================================
                       MOUSE LEAVE
                    ====================================================== */

                    carousel.addEventListener(
                        'mouseleave',
                        function() {

                            mouseDown = false;

                        }
                    );


                    updateCarousel();

                });

            }



            /* =========================================================
               2. DETAIL POPUP
               ========================================================= */

            let activeDetailPost = null;
            let lastFocusedElement = null;


            /* =========================================================
               GET DETAIL ELEMENTS
               ========================================================= */

            function getDetailElements() {

                const overlay =
                    document.getElementById('pkrsDetailOverlay');


                if (!overlay) {
                    return null;
                }


                const modal =
                    overlay.querySelector('.pkrs-detail-modal');


                return {

                    overlay: overlay,

                    modal: modal,

                    closeButton: document.getElementById('pkrsDetailClose'),

                    detailMedia: document.getElementById('pkrsDetailMedia'),

                    detailTitle: document.getElementById('pkrsDetailTitle'),

                    detailExcerpt: document.getElementById('pkrsDetailExcerpt'),

                    detailCategory: document.getElementById('pkrsDetailCategory'),

                    detailCategoryBadge: document.getElementById('pkrsDetailCategoryBadge'),

                    detailViews: document.getElementById('pkrsDetailViews'),

                    detailDate: document.getElementById('pkrsDetailDate'),

                    detailBody: modal ?
                        modal.querySelector('.pkrs-detail-body') : null

                };

            }



            /* =========================================================
               OPEN DETAIL
               ========================================================= */

            function openDetail(post) {

                if (!post) {
                    return;
                }


                const elements =
                    getDetailElements();


                if (!elements) {

                    console.error(
                        'PKRS: #pkrsDetailOverlay tidak ditemukan.'
                    );

                    return;

                }


                const {
                    overlay,
                    modal,
                    closeButton,
                    detailMedia,
                    detailTitle,
                    detailExcerpt,
                    detailCategory,
                    detailCategoryBadge,
                    detailViews,
                    detailDate,
                    detailBody
                } = elements;


                activeDetailPost =
                    post;


                lastFocusedElement =
                    document.activeElement;


                /* =====================================================
                   DATA POST
                ====================================================== */

                const title =
                    post.dataset.title || '';

                const excerpt =
                    post.dataset.excerpt || '';

                const category =
                    post.dataset.category || 'PKRS';

                const date =
                    post.dataset.date || '';

                const views =
                    post.dataset.views || '0';

                const type =
                    post.dataset.type || 'image';


                /* =====================================================
                   CONTENT
                ====================================================== */

                if (detailTitle) {

                    detailTitle.textContent =
                        title;

                }


                if (detailExcerpt) {

                    detailExcerpt.textContent =
                        excerpt.trim() !== '' ?
                        excerpt :
                        'Informasi kesehatan dari RSUD Ar Rozy.';

                }


                if (detailCategory) {

                    detailCategory.textContent =
                        category;

                }


                if (detailCategoryBadge) {

                    detailCategoryBadge.textContent =
                        '#' + category;

                }


                if (detailViews) {

                    detailViews.textContent =
                        views;

                }


                if (detailDate) {

                    detailDate.textContent =
                        date;

                }


                /* =====================================================
                   MEDIA
                ====================================================== */

                if (detailMedia) {

                    detailMedia.innerHTML = '';


                    /* =================================================
                       GALLERY
                    ================================================== */

                    if (type === 'gallery') {

                        const carousel =
                            post.querySelector('[data-carousel]');


                        if (carousel) {

                            const slides =
                                carousel.querySelectorAll(
                                    '.pkrs-carousel-slide img'
                                );


                            if (slides.length) {

                                const detailCarousel =
                                    document.createElement('div');

                                detailCarousel.className =
                                    'pkrs-detail-carousel';


                                const track =
                                    document.createElement('div');

                                track.className =
                                    'pkrs-detail-track';


                                slides.forEach(function(image) {

                                    const slide =
                                        document.createElement('div');

                                    slide.className =
                                        'pkrs-detail-slide';


                                    const img =
                                        document.createElement('img');


                                    img.src =
                                        image.currentSrc ||
                                        image.src;


                                    img.alt =
                                        image.alt ||
                                        title;


                                    slide.appendChild(img);

                                    track.appendChild(slide);

                                });


                                detailCarousel.appendChild(track);


                                /* =====================================
                                   GALLERY NAV
                                ====================================== */

                                if (slides.length > 1) {

                                    const prev =
                                        document.createElement('button');

                                    prev.type =
                                        'button';

                                    prev.className =
                                        'pkrs-detail-nav pkrs-detail-prev';

                                    prev.innerHTML =
                                        '‹';


                                    const next =
                                        document.createElement('button');

                                    next.type =
                                        'button';

                                    next.className =
                                        'pkrs-detail-nav pkrs-detail-next';

                                    next.innerHTML =
                                        '›';


                                    const counter =
                                        document.createElement('div');

                                    counter.className =
                                        'pkrs-detail-counter';

                                    counter.textContent =
                                        `1 / ${slides.length}`;


                                    detailCarousel.appendChild(prev);

                                    detailCarousel.appendChild(next);

                                    detailCarousel.appendChild(counter);


                                    let detailIndex = 0;


                                    function updateDetailGallery() {

                                        track.style.transform =
                                            `translateX(-${detailIndex * 100}%)`;


                                        counter.textContent =
                                            `${detailIndex + 1} / ${slides.length}`;

                                    }


                                    prev.addEventListener(
                                        'click',
                                        function(event) {

                                            event.preventDefault();
                                            event.stopPropagation();


                                            detailIndex--;


                                            if (
                                                detailIndex < 0
                                            ) {

                                                detailIndex =
                                                    slides.length - 1;

                                            }


                                            updateDetailGallery();

                                        }
                                    );


                                    next.addEventListener(
                                        'click',
                                        function(event) {

                                            event.preventDefault();
                                            event.stopPropagation();


                                            detailIndex++;


                                            if (
                                                detailIndex >=
                                                slides.length
                                            ) {

                                                detailIndex = 0;

                                            }


                                            updateDetailGallery();

                                        }
                                    );


                                    /* =================================
                                       SWIPE GALLERY
                                    ================================== */

                                    let galleryStartX = 0;
                                    let galleryCurrentX = 0;
                                    let galleryDragging = false;


                                    detailCarousel.addEventListener(
                                        'touchstart',
                                        function(event) {

                                            if (
                                                event.touches.length !== 1
                                            ) {
                                                return;
                                            }


                                            galleryStartX =
                                                event.touches[0].clientX;

                                            galleryCurrentX =
                                                galleryStartX;

                                            galleryDragging =
                                                true;

                                        }, {
                                            passive: true
                                        }
                                    );


                                    detailCarousel.addEventListener(
                                        'touchmove',
                                        function(event) {

                                            if (
                                                !galleryDragging ||
                                                !event.touches.length
                                            ) {
                                                return;
                                            }


                                            galleryCurrentX =
                                                event.touches[0].clientX;

                                        }, {
                                            passive: true
                                        }
                                    );


                                    detailCarousel.addEventListener(
                                        'touchend',
                                        function() {

                                            if (!galleryDragging) {
                                                return;
                                            }


                                            galleryDragging =
                                                false;


                                            const deltaX =
                                                galleryCurrentX -
                                                galleryStartX;


                                            if (
                                                Math.abs(deltaX) < 50
                                            ) {
                                                return;
                                            }


                                            if (deltaX < 0) {
                                                next.click();
                                            } else {
                                                prev.click();
                                            }

                                        }, {
                                            passive: true
                                        }
                                    );

                                }


                                detailMedia.appendChild(
                                    detailCarousel
                                );

                            }

                        }

                    }


                    /* =================================================
                       VIDEO
                    ================================================== */
                    else if (type === 'video') {

                        const video =
                            post.querySelector('video');


                        if (video) {

                            const newVideo =
                                document.createElement('video');


                            newVideo.controls =
                                true;

                            newVideo.preload =
                                'metadata';

                            newVideo.playsInline =
                                true;


                            newVideo.src =
                                video.currentSrc ||
                                video.querySelector('source')?.src ||
                                video.src ||
                                '';


                            if (video.poster) {

                                newVideo.poster =
                                    video.poster;

                            }


                            newVideo.style.width =
                                '100%';

                            newVideo.style.height =
                                '100%';

                            newVideo.style.objectFit =
                                'contain';


                            detailMedia.appendChild(
                                newVideo
                            );

                        }

                    }


                    /* =================================================
                       IMAGE
                    ================================================== */
                    else {

                        const img =
                            post.querySelector('.pkrs-media > img') ||
                            post.querySelector('img');


                        if (img) {

                            const newImg =
                                document.createElement('img');


                            newImg.src =
                                img.currentSrc ||
                                img.src;


                            newImg.alt =
                                img.alt ||
                                title;


                            detailMedia.appendChild(
                                newImg
                            );

                        }

                    }

                }


                /* =====================================================
                   RESET MODAL
                ====================================================== */

                if (modal) {

                    modal.classList.remove(
                        'is-dragging'
                    );

                    modal.style.transition =
                        '';

                    modal.style.transform =
                        '';

                }


                if (detailBody) {

                    detailBody.scrollTop =
                        0;

                }


                /* =====================================================
                   SHOW
                ====================================================== */

                overlay.classList.add(
                    'active'
                );


                document.body.style.overflow =
                    'hidden';


                requestAnimationFrame(function() {

                    if (
                        closeButton &&
                        overlay.classList.contains('active')
                    ) {

                        closeButton.focus();

                    }

                });

            }



            /* =========================================================
               CLOSE DETAIL
               ========================================================= */

            function closeDetail() {

                const elements =
                    getDetailElements();


                if (!elements) {
                    return;
                }


                const {
                    overlay,
                    modal,
                    detailMedia
                } = elements;


                const elementToRestore =
                    lastFocusedElement;


                /* =====================================================
                   STOP VIDEO
                ====================================================== */

                if (detailMedia) {

                    const video =
                        detailMedia.querySelector('video');


                    if (video) {

                        video.pause();

                        video.currentTime =
                            0;

                    }

                }


                /* =====================================================
                   REMOVE FOCUS
                ====================================================== */

                if (
                    document.activeElement &&
                    overlay.contains(
                        document.activeElement
                    )
                ) {

                    document.activeElement.blur();

                }


                /* =====================================================
                   CLOSE
                ====================================================== */

                overlay.classList.remove(
                    'active'
                );


                document.body.style.overflow =
                    '';


                /* =====================================================
                   RESET
                ====================================================== */

                if (modal) {

                    modal.classList.remove(
                        'is-dragging'
                    );

                    modal.style.transition =
                        '';

                    modal.style.transform =
                        '';

                }


                /* =====================================================
                   RESTORE FOCUS
                ====================================================== */

                if (
                    elementToRestore &&
                    document.contains(elementToRestore) &&
                    typeof elementToRestore.focus === 'function'
                ) {

                    requestAnimationFrame(function() {

                        try {

                            elementToRestore.focus();

                        } catch (error) {

                            console.warn(
                                'PKRS: gagal restore focus.',
                                error
                            );

                        }

                    });

                }


                activeDetailPost =
                    null;

                lastFocusedElement =
                    null;

            }



            /* =========================================================
               3. MOBILE BOTTOM SHEET
               ========================================================= */

            function initDetailTouch(root) {

                const modal =
                    root.querySelector(
                        '.pkrs-detail-modal:not([data-pkrs-touch-initialized])'
                    );


                if (!modal) {
                    return;
                }


                modal.dataset.pkrsTouchInitialized =
                    'true';


                const detailBody =
                    modal.querySelector(
                        '.pkrs-detail-body'
                    );


                let touchStartY = 0;
                let touchCurrentY = 0;

                let touchStartX = 0;
                let touchCurrentX = 0;

                let isDraggingPopup = false;
                let gestureStarted = false;
                let isHorizontalSwipe = false;

                let startTarget = null;

                const closeThreshold = 100;
                const directionThreshold = 8;


                function isBodyAtTop() {

                    if (!detailBody) {
                        return true;
                    }

                    return detailBody.scrollTop <= 0;

                }


                function isInsideDetailCarousel(target) {

                    if (!target) {
                        return false;
                    }

                    return !!target.closest(
                        '.pkrs-detail-carousel'
                    );

                }


                /* =====================================================
                   TOUCH START
                ====================================================== */

                modal.addEventListener(
                    'touchstart',
                    function(event) {

                        if (
                            window.innerWidth > 767
                        ) {
                            return;
                        }


                        if (
                            event.touches.length !== 1
                        ) {
                            return;
                        }


                        const touch =
                            event.touches[0];


                        touchStartX =
                            touch.clientX;

                        touchStartY =
                            touch.clientY;

                        touchCurrentX =
                            touch.clientX;

                        touchCurrentY =
                            touch.clientY;


                        gestureStarted =
                            true;

                        isDraggingPopup =
                            false;

                        isHorizontalSwipe =
                            false;

                        startTarget =
                            event.target;


                        /* =============================================
                           DETAIL CAROUSEL
                        ============================================== */

                        if (
                            isInsideDetailCarousel(
                                startTarget
                            )
                        ) {

                            gestureStarted =
                                false;

                            return;

                        }


                        /* =============================================
                           BODY
                        ============================================== */

                        if (
                            startTarget.closest(
                                '.pkrs-detail-body'
                            )
                        ) {

                            if (
                                !isBodyAtTop()
                            ) {

                                gestureStarted =
                                    false;

                                return;

                            }

                        }

                    }, {
                        passive: true
                    }
                );


                /* =====================================================
                   TOUCH MOVE
                ====================================================== */

                modal.addEventListener(
                    'touchmove',
                    function(event) {

                        if (
                            !gestureStarted ||
                            !event.touches.length
                        ) {
                            return;
                        }


                        const touch =
                            event.touches[0];


                        touchCurrentX =
                            touch.clientX;

                        touchCurrentY =
                            touch.clientY;


                        const deltaX =
                            touchCurrentX -
                            touchStartX;

                        const deltaY =
                            touchCurrentY -
                            touchStartY;


                        /* =============================================
                           BELUM CUKUP
                        ============================================== */

                        if (
                            Math.abs(deltaX) <
                            directionThreshold &&
                            Math.abs(deltaY) <
                            directionThreshold
                        ) {
                            return;
                        }


                        /* =============================================
                           HORIZONTAL
                        ============================================== */

                        if (
                            Math.abs(deltaX) >
                            Math.abs(deltaY)
                        ) {

                            isHorizontalSwipe =
                                true;

                            gestureStarted =
                                false;

                            isDraggingPopup =
                                false;


                            modal.classList.remove(
                                'is-dragging'
                            );


                            modal.style.transform =
                                '';


                            return;

                        }


                        /* =============================================
                           KE ATAS
                        ============================================== */

                        if (deltaY <= 0) {

                            isDraggingPopup =
                                false;


                            modal.classList.remove(
                                'is-dragging'
                            );


                            modal.style.transform =
                                '';


                            return;

                        }


                        /* =============================================
                           BODY BELUM TOP
                        ============================================== */

                        if (
                            startTarget.closest(
                                '.pkrs-detail-body'
                            ) &&
                            !isBodyAtTop()
                        ) {

                            gestureStarted =
                                false;

                            isDraggingPopup =
                                false;

                            return;

                        }


                        /* =============================================
                           DRAG
                        ============================================== */

                        isDraggingPopup =
                            true;


                        event.preventDefault();


                        modal.classList.add(
                            'is-dragging'
                        );


                        const translateY =
                            Math.min(
                                deltaY * 0.82,
                                window.innerHeight * 0.90
                            );


                        modal.style.transition =
                            'none';


                        modal.style.transform =
                            `translateY(${translateY}px)`;

                    }, {
                        passive: false
                    }
                );


                /* =====================================================
                   TOUCH END
                ====================================================== */

                modal.addEventListener(
                    'touchend',
                    function() {

                        if (!gestureStarted) {
                            return;
                        }


                        gestureStarted =
                            false;


                        if (isHorizontalSwipe) {

                            isHorizontalSwipe =
                                false;

                            return;

                        }


                        if (!isDraggingPopup) {
                            return;
                        }


                        isDraggingPopup =
                            false;


                        const deltaY =
                            touchCurrentY -
                            touchStartY;


                        modal.classList.remove(
                            'is-dragging'
                        );


                        /* =============================================
                           CLOSE
                        ============================================== */

                        if (
                            deltaY >= closeThreshold
                        ) {

                            modal.style.transition =
                                'transform .22s ease';


                            modal.style.transform =
                                'translateY(100%)';


                            setTimeout(function() {

                                closeDetail();

                            }, 220);


                            return;

                        }


                        /* =============================================
                           SNAP BACK
                        ============================================== */

                        modal.style.transition =
                            'transform .22s cubic-bezier(.22,.61,.36,1)';

                        modal.style.transform =
                            'translateY(0)';


                        setTimeout(function() {

                            modal.style.transition =
                                '';

                            modal.style.transform =
                                '';

                        }, 230);

                    }, {
                        passive: true
                    }
                );


                /* =====================================================
                   TOUCH CANCEL
                ====================================================== */

                modal.addEventListener(
                    'touchcancel',
                    function() {

                        gestureStarted =
                            false;

                        isDraggingPopup =
                            false;

                        isHorizontalSwipe =
                            false;


                        modal.classList.remove(
                            'is-dragging'
                        );


                        modal.style.transition =
                            'transform .2s ease';


                        modal.style.transform =
                            'translateY(0)';


                        setTimeout(function() {

                            modal.style.transition =
                                '';

                            modal.style.transform =
                                '';

                        }, 200);

                    }, {
                        passive: true
                    }
                );

            }



            /* =========================================================
               4. CLICK HANDLER
               =========================================================
               
               PENTING:
               Menggunakan EVENT DELEGATION.
               
               Jadi walaupun #newsPkrsContent diganti AJAX,
               event tetap bekerja.
               ========================================================= */

            document.addEventListener(
                'click',
                async function(event) {

                    const target =
                        event.target;


                    /* =================================================
                       OPEN DETAIL
                    ================================================== */

                    const openButton =
                        target.closest(
                            '[data-open-detail]'
                        );


                    if (openButton) {

                        if (
                            target.closest(
                                '[data-carousel-prev], [data-carousel-next], [data-carousel-dot]'
                            )
                        ) {
                            return;
                        }


                        event.preventDefault();


                        const post =
                            openButton.closest(
                                '[data-pkrs-post]'
                            );


                        if (!post) {

                            console.warn(
                                'PKRS: [data-pkrs-post] tidak ditemukan.'
                            );

                            return;

                        }


                        openDetail(post);

                        return;

                    }


                    /* =================================================
                       CLOSE BUTTON
                    ================================================== */

                    const closeButton =
                        target.closest(
                            '#pkrsDetailClose'
                        );


                    if (closeButton) {

                        event.preventDefault();
                        event.stopPropagation();

                        closeDetail();

                        return;

                    }


                    /* =================================================
                       BACKDROP
                    ================================================== */

                    const overlay =
                        document.getElementById(
                            'pkrsDetailOverlay'
                        );


                    if (
                        overlay &&
                        target === overlay
                    ) {

                        closeDetail();

                        return;

                    }


                    /* =================================================
                       SHARE DARI DETAIL
                    ================================================== */

                    const detailShare =
                        target.closest(
                            '[data-pkrs-share]'
                        );


                    if (detailShare) {

                        event.preventDefault();
                        event.stopPropagation();


                        if (!activeDetailPost) {

                            showPkrsToast(
                                'Post tidak ditemukan.'
                            );

                            return;

                        }


                        await sharePkrsPost(
                            activeDetailPost
                        );

                        return;

                    }


                    /* =================================================
                       SHARE CARD
                    ================================================== */

                    const shareButton =
                        target.closest(
                            '.pkrs-actions .pkrs-action'
                        );


                    if (
                        shareButton &&
                        shareButton.getAttribute('aria-label') === 'Bagikan'
                    ) {

                        event.preventDefault();
                        event.stopPropagation();


                        const post =
                            shareButton.closest(
                                '[data-pkrs-post]'
                            );


                        if (post) {

                            await sharePkrsPost(
                                post
                            );

                        }

                        return;

                    }


                    /* =================================================
                       MENU
                    ================================================== */

                    const menuButton =
                        target.closest(
                            '[data-pkrs-menu]'
                        );


                    if (menuButton) {

                        event.preventDefault();
                        event.stopPropagation();


                        const wrapper =
                            menuButton.closest(
                                '.pkrs-menu-wrapper'
                            );


                        if (!wrapper) {
                            return;
                        }


                        const dropdown =
                            wrapper.querySelector(
                                '[data-pkrs-dropdown]'
                            );


                        if (!dropdown) {
                            return;
                        }


                        document.querySelectorAll(
                            '[data-pkrs-dropdown].active'
                        ).forEach(function(other) {

                            if (
                                other !== dropdown
                            ) {

                                other.classList.remove(
                                    'active'
                                );

                            }

                        });


                        dropdown.classList.toggle(
                            'active'
                        );


                        return;

                    }


                    /* =================================================
                       COPY LINK
                    ================================================== */

                    const copyButton =
                        target.closest(
                            '[data-pkrs-copy-link]'
                        );


                    if (copyButton) {

                        event.preventDefault();
                        event.stopPropagation();


                        const post =
                            copyButton.closest(
                                '[data-pkrs-post]'
                            );


                        if (!post) {
                            return;
                        }


                        const postId =
                            post.dataset.postId;


                        if (!postId) {

                            showPkrsToast(
                                'ID post tidak ditemukan.'
                            );

                            return;

                        }


                        const url =
                            window.location.origin +
                            '/pkrs/' +
                            postId;


                        try {

                            await navigator.clipboard.writeText(
                                url
                            );


                            showPkrsToast(
                                'Link berhasil disalin.'
                            );

                        } catch (error) {

                            const input =
                                document.createElement('input');


                            input.value =
                                url;


                            document.body.appendChild(
                                input
                            );


                            input.select();


                            document.execCommand(
                                'copy'
                            );


                            input.remove();


                            showPkrsToast(
                                'Link berhasil disalin.'
                            );

                        }


                        const dropdown =
                            copyButton.closest(
                                '[data-pkrs-dropdown]'
                            );


                        if (dropdown) {

                            dropdown.classList.remove(
                                'active'
                            );

                        }

                        return;

                    }


                    /* =================================================
                       CLOSE MENU DI LUAR
                    ================================================== */

                    if (
                        !target.closest(
                            '.pkrs-menu-wrapper'
                        )
                    ) {

                        document.querySelectorAll(
                            '[data-pkrs-dropdown].active'
                        ).forEach(function(dropdown) {

                            dropdown.classList.remove(
                                'active'
                            );

                        });

                    }

                }
            );



            /* =========================================================
               5. SHARE FUNCTION
               ========================================================= */

            async function sharePkrsPost(post) {

                if (!post) {

                    console.warn(
                        'PKRS: sharePkrsPost tanpa post.'
                    );

                    return;

                }


                const postId =
                    post.dataset.postId;


                if (!postId) {

                    showPkrsToast(
                        'ID post tidak ditemukan.'
                    );

                    return;

                }


                const title =
                    post.dataset.title ||
                    'PKRS RSUD Ar Rozy';


                const url =
                    window.location.origin +
                    '/pkrs/' +
                    postId;


                /* =====================================================
                   NATIVE SHARE
                ====================================================== */

                if (
                    navigator.share &&
                    typeof navigator.share === 'function'
                ) {

                    try {

                        await navigator.share({

                            title: title,

                            text: title,

                            url: url

                        });


                        const dropdown =
                            post.querySelector(
                                '[data-pkrs-dropdown]'
                            );


                        if (dropdown) {

                            dropdown.classList.remove(
                                'active'
                            );

                        }


                        return;

                    } catch (error) {

                        if (
                            error &&
                            error.name === 'AbortError'
                        ) {

                            return;

                        }

                    }

                }


                /* =====================================================
                   CLIPBOARD
                ====================================================== */

                try {

                    await navigator.clipboard.writeText(
                        url
                    );


                    showPkrsToast(
                        'Link berhasil disalin.'
                    );

                } catch (error) {

                    const input =
                        document.createElement('input');


                    input.value =
                        url;


                    document.body.appendChild(
                        input
                    );


                    input.select();


                    document.execCommand(
                        'copy'
                    );


                    input.remove();


                    showPkrsToast(
                        'Link berhasil disalin.'
                    );

                }


                const dropdown =
                    post.querySelector(
                        '[data-pkrs-dropdown]'
                    );


                if (dropdown) {

                    dropdown.classList.remove(
                        'active'
                    );

                }

            }



            /* =========================================================
               6. TOAST
               ========================================================= */

            function showPkrsToast(message) {

                let toast =
                    document.getElementById(
                        'pkrsToast'
                    );


                if (!toast) {

                    toast =
                        document.createElement('div');


                    toast.id =
                        'pkrsToast';


                    toast.style.position =
                        'fixed';

                    toast.style.left =
                        '50%';

                    toast.style.bottom =
                        '30px';

                    toast.style.transform =
                        'translateX(-50%) translateY(10px)';

                    toast.style.zIndex =
                        '999999';

                    toast.style.padding =
                        '10px 16px';

                    toast.style.borderRadius =
                        '12px';

                    toast.style.background =
                        'rgba(15, 23, 42, 0.95)';

                    toast.style.color =
                        '#fff';

                    toast.style.fontSize =
                        '14px';

                    toast.style.fontWeight =
                        '600';

                    toast.style.boxShadow =
                        '0 10px 30px rgba(0, 0, 0, .20)';

                    toast.style.opacity =
                        '0';

                    toast.style.pointerEvents =
                        'none';

                    toast.style.transition =
                        'opacity .2s ease, transform .2s ease';


                    document.body.appendChild(
                        toast
                    );

                }


                toast.textContent =
                    message;


                requestAnimationFrame(function() {

                    toast.style.opacity =
                        '1';

                    toast.style.transform =
                        'translateX(-50%) translateY(0)';

                });


                clearTimeout(
                    toast._timeout
                );


                toast._timeout =
                    setTimeout(function() {

                        toast.style.opacity =
                            '0';

                        toast.style.transform =
                            'translateX(-50%) translateY(10px)';

                    }, 2200);

            }



            /* =========================================================
               7. ESC
               ========================================================= */

            document.addEventListener(
                'keydown',
                function(event) {

                    if (
                        event.key !== 'Escape'
                    ) {
                        return;
                    }


                    const overlay =
                        document.getElementById(
                            'pkrsDetailOverlay'
                        );


                    if (
                        overlay &&
                        overlay.classList.contains('active')
                    ) {

                        closeDetail();

                    }

                }
            );



            /* =========================================================
               8. AUTO OPEN
               ========================================================= */

            function checkAutoOpen() {

                const page =
                    document.querySelector(
                        '.pkrs-page'
                    );


                if (!page) {
                    return;
                }


                const autoOpenId =
                    page.dataset.autoOpenPost;


                if (!autoOpenId) {
                    return;
                }


                const post =
                    document.querySelector(
                        `[data-pkrs-post][data-post-id="${autoOpenId}"]`
                    );


                if (post) {

                    setTimeout(function() {

                        openDetail(post);

                    }, 150);

                }

            }



            /* =========================================================
               9. OBSERVER
               
               INI YANG MEMBUAT PKRS TETAP HIDUP SETELAH AJAX.
               ========================================================= */

            const content =
                document.getElementById(
                    'newsPkrsContent'
                );


            if (content) {

                const observer =
                    new MutationObserver(function() {

                        initPKRS(content);

                        checkAutoOpen();

                    });


                observer.observe(
                    content, {
                        childList: true,
                        subtree: true
                    }
                );

            }


            /* =========================================================
               INITIAL LOAD
               ========================================================= */

            initPKRS(document);

            checkAutoOpen();

        });
    </script>


    {{-- =====================================================
        FOOTER
    ====================================================== --}}
    @include('frontend.partials.mainmenu.footer')


    {{-- =====================================================
        GLOBAL JS
    ====================================================== --}}

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    {{-- Alpine --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- ApexCharts --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>


    {{-- =====================================================
        SIDEBAR
    ====================================================== --}}
    <script>
        const sidebar = document.getElementById("sidebar");
        const toggle = document.getElementById("sidebarToggle");
        const overlay = document.getElementById("sidebarOverlay");

        toggle?.addEventListener("click", () => {
            sidebar?.classList.toggle("active");
            overlay?.classList.toggle("active");
        });

        overlay?.addEventListener("click", () => {
            sidebar?.classList.remove("active");
            overlay?.classList.remove("active");
        });
    </script>


    {{-- =====================================================
        NAVBAR HIDE / SHOW
    ====================================================== --}}
    <script>
        document.addEventListener("keydown", function(e) {

            const activeTag =
                document.activeElement.tagName.toLowerCase();

            if (
                activeTag === "input" ||
                activeTag === "textarea"
            ) {
                return;
            }

            // CTRL + SHIFT + H → Hide
            if (
                e.ctrlKey &&
                e.shiftKey &&
                e.key.toLowerCase() === "h"
            ) {
                document.body.classList.add("navbar-hidden");
            }

            // CTRL + SHIFT + S → Show
            if (
                e.ctrlKey &&
                e.shiftKey &&
                e.key.toLowerCase() === "s"
            ) {
                document.body.classList.remove("navbar-hidden");
            }

            // Double ESC → Toggle
            if (e.key === "Escape") {

                const now = Date.now();

                if (!window.lastEsc) {
                    window.lastEsc = 0;
                }

                if (now - window.lastEsc < 400) {

                    document.body.classList.toggle(
                        "navbar-hidden"
                    );

                }

                window.lastEsc = now;
            }

        });
    </script>


    {{-- =====================================================
        REALTIME CLOCK
    ====================================================== --}}
    <script>
        function el(id) {
            return document.getElementById(id);
        }

        function realtimeClock() {

            const now = new Date(
                new Date().toLocaleString("en-US", {
                    timeZone: "Asia/Jakarta"
                })
            );

            if (el("rt-jam")) {

                el("rt-jam").textContent =
                    now.toLocaleTimeString("id-ID", {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: false
                    }) + " WIB";

            }

        }

        realtimeClock();

        setInterval(
            realtimeClock,
            1000
        );
    </script>


    {{-- =====================================================
        SWIPER
    ====================================================== --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        new Swiper('.heroNewsSwiper', {

            loop: true,

            speed: 900,

            effect: 'fade',

            fadeEffect: {
                crossFade: true
            },

            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>


    @if (
    request()->is('news') ||
    request()->is('news/*') ||
    request()->is('pkrs') ||
    request()->is('pkrs/*')
    )

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const content = document.getElementById('newsPkrsContent');

            if (!content) {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | LOAD BERITA / PKRS
            |--------------------------------------------------------------------------
            */

            async function loadNewsPkrs(url, push = true) {

                try {

                    content.style.opacity = '0.5';


                    const response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'text/html'
                        }
                    });


                    if (!response.ok) {
                        throw new Error(
                            'HTTP ' + response.status
                        );
                    }


                    const html = await response.text();

                    const parser = new DOMParser();

                    const doc = parser.parseFromString(
                        html,
                        'text/html'
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Ambil content dari halaman tujuan
                    |--------------------------------------------------------------------------
                    */

                    const newContent =
                        doc.querySelector('#newsPkrsContent');


                    if (!newContent) {

                        console.error(
                            'newsPkrsContent tidak ditemukan'
                        );

                        window.location.href = url;

                        return;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | GANTI BODY SAJA
                    |--------------------------------------------------------------------------
                    */

                    content.innerHTML =
                        newContent.innerHTML;


                    /*
                    |--------------------------------------------------------------------------
                    | UPDATE URL TANPA RELOAD
                    |--------------------------------------------------------------------------
                    */

                    if (push) {

                        history.pushState({},
                            '',
                            url
                        );

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | UPDATE ACTIVE SUBNAV
                    |--------------------------------------------------------------------------
                    */

                    updateActiveNav(url);


                    /*
                    |--------------------------------------------------------------------------
                    | SCROLL TOP
                    |--------------------------------------------------------------------------
                    */

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });


                } catch (error) {

                    console.error(
                        'Gagal memuat News/PKRS:',
                        error
                    );


                    /*
                    | Kalau AJAX gagal → baru full reload
                    */

                    window.location.href = url;


                } finally {

                    content.style.opacity = '1';

                }

            }


            /*
            |--------------------------------------------------------------------------
            | ACTIVE NAV
            |--------------------------------------------------------------------------
            */

            function updateActiveNav(url) {

                const currentPath =
                    new URL(
                        url,
                        window.location.origin
                    ).pathname;


                document
                    .querySelectorAll('[data-news-pkrs-link]')
                    .forEach(function(link) {

                        const linkPath =
                            new URL(
                                link.href,
                                window.location.origin
                            ).pathname;


                        let active = false;


                        if (
                            linkPath === '/news' &&
                            (
                                currentPath === '/news' ||
                                currentPath.startsWith('/news/')
                            )
                        ) {

                            active = true;

                        }


                        if (
                            linkPath === '/pkrs' &&
                            (
                                currentPath === '/pkrs' ||
                                currentPath.startsWith('/pkrs/')
                            )
                        ) {

                            active = true;

                        }


                        link.classList.toggle(
                            'active',
                            active
                        );

                    });

            }


            /*
            |--------------------------------------------------------------------------
            | KLIK BERITA / PKRS
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                function(event) {

                    const link =
                        event.target.closest(
                            '[data-news-pkrs-link]'
                        );


                    if (!link) {
                        return;
                    }


                    event.preventDefault();

                    event.stopPropagation();


                    loadNewsPkrs(
                        link.href
                    );

                },
                true
            );


            /*
            |--------------------------------------------------------------------------
            | BACK / FORWARD
            |--------------------------------------------------------------------------
            */

            window.addEventListener(
                'popstate',
                function() {

                    loadNewsPkrs(
                        window.location.href,
                        false
                    );

                }
            );

        });
    </script>

    @endif


    {{-- =====================================================
        PAGE SCRIPT
    ====================================================== --}}
    @yield('scripts')

    @stack('scripts')

    <script>
        window.initPkrsPopups = function() {

            /*
            |--------------------------------------------------------------------------
            | JANGAN INIT EVENT BERULANG
            |--------------------------------------------------------------------------
            */

            if (window.__pkrsPopupInitialized) {
                return;
            }

            window.__pkrsPopupInitialized = true;


            /*
            |--------------------------------------------------------------------------
            | GET CURRENT ELEMENT
            |--------------------------------------------------------------------------
            | Selalu ambil DOM terbaru.
            | Penting karena #newsPkrsContent bisa diganti AJAX.
            |--------------------------------------------------------------------------
            */

            function getGroupElements() {
                return {
                    overlay: document.getElementById('pkrsGroupOverlay'),
                    close: document.getElementById('pkrsGroupClose'),
                    title: document.getElementById('pkrsGroupTitle'),
                    subtitle: document.getElementById('pkrsGroupSubtitle'),
                    postList: document.getElementById('pkrsPostList')
                };
            }


            function getDetailElements() {
                return {
                    overlay: document.getElementById('pkrsDetailOverlay'),
                    close: document.getElementById('pkrsDetailClose'),
                    media: document.getElementById('pkrsDetailMedia'),
                    category: document.getElementById('pkrsDetailCategory'),
                    categoryBadge: document.getElementById('pkrsDetailCategoryBadge'),
                    title: document.getElementById('pkrsDetailTitle'),
                    excerpt: document.getElementById('pkrsDetailExcerpt'),
                    content: document.getElementById('pkrsDetailContent'),
                    views: document.getElementById('pkrsDetailViews'),
                    date: document.getElementById('pkrsDetailDate'),
                    like: document.getElementById('pkrsDetailLike'),
                    share: document.getElementById('pkrsDetailShare')
                };
            }


            /*
            |--------------------------------------------------------------------------
            | POST DATA — SELALU AMBIL DATA TERBARU
            |--------------------------------------------------------------------------
            */

            function getAllPosts() {

                const data =
                    document.getElementById('pkrsData');

                if (!data) {
                    return [];
                }

                try {

                    const posts =
                        JSON.parse(
                            data.getAttribute('data-posts') || '[]'
                        );

                    return Array.isArray(posts) ?
                        posts : [];

                } catch (error) {

                    return [];

                }
            }


            /*
            |--------------------------------------------------------------------------
            | BODY SCROLL
            |--------------------------------------------------------------------------
            */

            function lockBody() {
                document.body.style.overflow = 'hidden';
            }


            function unlockBody() {

                const group = getGroupElements();
                const detail = getDetailElements();

                const groupOpen =
                    group.overlay &&
                    group.overlay.classList.contains('is-open');

                const detailOpen =
                    detail.overlay &&
                    detail.overlay.classList.contains('is-open');

                if (!groupOpen && !detailOpen) {
                    document.body.style.overflow = '';
                }
            }


            /*
            |--------------------------------------------------------------------------
            | OPEN GROUP
            |--------------------------------------------------------------------------
            */

            function openGroup(groupName) {

                const group = getGroupElements();
                const allPosts = getAllPosts();

                if (
                    !group.overlay ||
                    !group.title ||
                    !group.subtitle ||
                    !group.postList
                ) {
                    console.warn(
                        'PKRS: Group popup element tidak ditemukan.'
                    );
                    return;
                }


                const posts = allPosts.filter(function(post) {
                    return post.group === groupName;
                });


                group.title.textContent = groupName;

                group.subtitle.textContent =
                    posts.length +
                    ' informasi dalam kategori ini';


                group.postList.innerHTML = '';


                if (!posts.length) {

                    group.postList.innerHTML = `
                <div
                    class="pkrs-empty"
                    style="grid-column:1/-1;"
                >
                    <div class="pkrs-empty-icon">
                        ✦
                    </div>

                    <h3>
                        Belum Ada Informasi
                    </h3>

                    <p>
                        Tidak ada post dalam kategori ini.
                    </p>
                </div>
            `;

                } else {

                    posts.forEach(function(post) {

                        const card =
                            document.createElement('article');

                        card.className =
                            'pkrs-post-card';

                        card.dataset.postId =
                            post.id;


                        let image =
                            post.thumbnail;


                        if (
                            post.type === 'video' &&
                            post.video_cover
                        ) {
                            image = post.video_cover;
                        }


                        let mediaHtml = '';


                        if (image) {

                            mediaHtml = `
                        <img
                            src="${escapeHtml(image)}"
                            alt="${escapeHtml(post.title)}"
                            loading="lazy"
                        >
                    `;

                        } else {

                            mediaHtml = `
                        <div
                            style="
                                width:100%;
                                height:100%;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                color:#0D9488;
                                font-size:32px;
                                font-weight:800;
                            "
                        >
                            +
                        </div>
                    `;

                        }


                        const typeLabel =
                            post.type === 'gallery' ?
                            'Gallery' :
                            post.type === 'video' ?
                            'Video' :
                            'Foto';


                        card.innerHTML = `

                    <div class="pkrs-post-card-media">

                        ${mediaHtml}

                        <span class="pkrs-post-card-type">
                            ${typeLabel}
                        </span>

                    </div>

                    <div class="pkrs-post-card-content">

                        <div class="pkrs-post-card-category">
                            #${escapeHtml(post.category)}
                        </div>

                        <div class="pkrs-post-card-title">
                            ${escapeHtml(post.title)}
                        </div>

                        <div class="pkrs-post-card-date">
                            ${escapeHtml(post.date)}
                        </div>

                    </div>

                `;


                        group.postList.appendChild(card);

                    });

                }


                group.overlay.classList.add('is-open');

                group.overlay.setAttribute(
                    'aria-hidden',
                    'false'
                );

                lockBody();
            }


            /*
            |--------------------------------------------------------------------------
            | CLOSE GROUP
            |--------------------------------------------------------------------------
            */

            function closeGroup() {

                const group = getGroupElements();

                if (!group.overlay) {
                    return;
                }


                if (
                    document.activeElement &&
                    typeof document.activeElement.blur === 'function'
                ) {
                    document.activeElement.blur();
                }


                group.overlay.classList.remove('is-open');

                group.overlay.setAttribute(
                    'aria-hidden',
                    'true'
                );


                unlockBody();
            }


            /*
            |--------------------------------------------------------------------------
            | DETAIL GALLERY
            |--------------------------------------------------------------------------
            */

            let detailGalleryImages = [];
            let detailGalleryIndex = 0;


            /*
            |--------------------------------------------------------------------------
            | OPEN DETAIL
            |--------------------------------------------------------------------------
            */

            function openDetail(post) {

                if (!post) {
                    return;
                }


                const detail =
                    getDetailElements();


                if (
                    !detail.overlay ||
                    !detail.media
                ) {
                    console.warn(
                        'PKRS: Detail popup element tidak ditemukan.'
                    );
                    return;
                }


                detail.category.textContent =
                    post.category || 'PKRS';


                detail.categoryBadge.textContent =
                    '#' + (post.category || 'PKRS');


                detail.title.textContent =
                    post.title || '';


                detail.excerpt.textContent =
                    post.excerpt || '';


                if (detail.content) {
                    detail.content.innerHTML =
                        post.content || '';
                }


                detail.views.textContent =
                    post.views || '0';


                detail.date.textContent =
                    post.date || '';


                if (detail.like) {
                    detail.like.textContent = '♡';
                }


                renderDetailMedia(post);


                detail.overlay.classList.add('is-open');

                detail.overlay.setAttribute(
                    'aria-hidden',
                    'false'
                );


                lockBody();
            }


            /*
            |--------------------------------------------------------------------------
            | RENDER DETAIL MEDIA
            |--------------------------------------------------------------------------
            */

            function renderDetailMedia(post) {

                const detail =
                    getDetailElements();


                if (!detail.media) {
                    return;
                }


                detail.media.innerHTML = '';

                detailGalleryImages = [];
                detailGalleryIndex = 0;


                /*
                | GALLERY
                */

                if (
                    post.type === 'gallery' &&
                    Array.isArray(post.gallery) &&
                    post.gallery.length
                ) {

                    detailGalleryImages =
                        post.gallery;


                    const gallery =
                        document.createElement('div');

                    gallery.className =
                        'pkrs-detail-gallery';


                    const image =
                        document.createElement('img');

                    image.id =
                        'pkrsDetailGalleryImage';

                    image.src =
                        detailGalleryImages[0];

                    image.alt =
                        post.title || '';


                    gallery.appendChild(image);


                    if (detailGalleryImages.length > 1) {

                        const navigation =
                            document.createElement('div');

                        navigation.className =
                            'pkrs-detail-gallery-nav';


                        const prev =
                            document.createElement('button');

                        prev.type = 'button';

                        prev.className =
                            'pkrs-detail-gallery-btn';

                        prev.innerHTML = '‹';

                        prev.setAttribute(
                            'aria-label',
                            'Foto sebelumnya'
                        );


                        const next =
                            document.createElement('button');

                        next.type = 'button';

                        next.className =
                            'pkrs-detail-gallery-btn';

                        next.innerHTML = '›';

                        next.setAttribute(
                            'aria-label',
                            'Foto berikutnya'
                        );


                        prev.addEventListener(
                            'click',
                            function(event) {

                                event.stopPropagation();

                                changeGallery(-1);
                            }
                        );


                        next.addEventListener(
                            'click',
                            function(event) {

                                event.stopPropagation();

                                changeGallery(1);
                            }
                        );


                        navigation.appendChild(prev);

                        navigation.appendChild(next);

                        gallery.appendChild(navigation);


                        const counter =
                            document.createElement('div');

                        counter.className =
                            'pkrs-detail-gallery-counter';

                        counter.id =
                            'pkrsDetailGalleryCounter';

                        counter.textContent =
                            '1 / ' +
                            detailGalleryImages.length;


                        gallery.appendChild(counter);
                    }


                    detail.media.appendChild(gallery);

                    return;
                }


                /*
                | VIDEO
                */

                if (
                    post.type === 'video' &&
                    post.video
                ) {

                    const video =
                        document.createElement('video');

                    video.controls = true;

                    video.preload = 'metadata';

                    video.playsInline = true;


                    if (post.video_cover) {

                        video.poster =
                            post.video_cover;
                    }


                    const source =
                        document.createElement('source');

                    const extension = (
                        post.video
                            .split('?')[0]
                            .split('.')
                            .pop() || ''
                    ).toLowerCase();

                    const videoTypes = {
                        webm: 'video/webm',
                        ogg: 'video/ogg',
                        ogv: 'video/ogg',
                        mov: 'video/quicktime',
                    };

                    source.src =
                        post.video;

                    source.type =
                        videoTypes[extension] || 'video/mp4';


                    video.appendChild(source);


                    video.appendChild(
                        document.createTextNode(
                            'Browser Anda tidak mendukung video.'
                        )
                    );


                    detail.media.appendChild(video);

                    return;
                }


                /*
                | SINGLE IMAGE
                */

                if (post.thumbnail) {

                    const image =
                        document.createElement('img');

                    image.src =
                        post.thumbnail;

                    image.alt =
                        post.title || '';


                    detail.media.appendChild(image);
                }
            }


            /*
            |--------------------------------------------------------------------------
            | CHANGE GALLERY
            |--------------------------------------------------------------------------
            */

            function changeGallery(direction) {

                if (!detailGalleryImages.length) {
                    return;
                }


                detailGalleryIndex += direction;


                if (detailGalleryIndex < 0) {

                    detailGalleryIndex =
                        detailGalleryImages.length - 1;
                }


                if (
                    detailGalleryIndex >=
                    detailGalleryImages.length
                ) {

                    detailGalleryIndex = 0;
                }


                const image =
                    document.getElementById(
                        'pkrsDetailGalleryImage'
                    );


                if (image) {

                    image.src =
                        detailGalleryImages[
                            detailGalleryIndex
                        ];
                }


                const counter =
                    document.getElementById(
                        'pkrsDetailGalleryCounter'
                    );


                if (counter) {

                    counter.textContent =
                        (
                            detailGalleryIndex + 1
                        ) +
                        ' / ' +
                        detailGalleryImages.length;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | CLOSE DETAIL
            |--------------------------------------------------------------------------
            */

            function closeDetail() {

                const detail =
                    getDetailElements();


                if (!detail.overlay) {
                    return;
                }


                detail.overlay.classList.remove(
                    'is-open'
                );


                detail.overlay.setAttribute(
                    'aria-hidden',
                    'true'
                );


                if (detail.media) {
                    detail.media.innerHTML = '';
                }


                if (detail.content) {
                    detail.content.innerHTML = '';
                }


                detailGalleryImages = [];

                detailGalleryIndex = 0;


                unlockBody();
            }


            /*
            |--------------------------------------------------------------------------
            | GROUP CARD — DOCUMENT DELEGATION
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                function(event) {

                    const groupCard =
                        event.target.closest(
                            '[data-pkrs-group]'
                        );


                    if (!groupCard) {
                        return;
                    }


                    /*
                    | Jangan ikut menangkap elemen group card
                    | ketika popup sedang terbuka.
                    */

                    if (
                        event.target.closest(
                            '#pkrsGroupOverlay'
                        )
                    ) {
                        return;
                    }


                    event.preventDefault();

                    event.stopPropagation();


                    const groupName =
                        groupCard.dataset.groupName;


                    if (!groupName) {
                        return;
                    }


                    openGroup(groupName);
                },
                true
            );


            /*
            |--------------------------------------------------------------------------
            | POST CARD — DOCUMENT DELEGATION
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                function(event) {

                    const card =
                        event.target.closest(
                            '.pkrs-post-card'
                        );


                    if (!card) {
                        return;
                    }


                    event.preventDefault();

                    event.stopPropagation();


                    const postId =
                        String(card.dataset.postId);


                    const post =
                        getAllPosts().find(function(item) {

                            return String(item.id) === postId;

                        });


                    if (!post) {
                        return;
                    }


                    openDetail(post);
                },
                true
            );


            /*
            |--------------------------------------------------------------------------
            | CLOSE / BACKDROP
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                function(event) {

                    /*
                    | Group close
                    */

                    if (
                        event.target.closest(
                            '#pkrsGroupClose'
                        )
                    ) {

                        event.preventDefault();

                        closeGroup();

                        return;
                    }


                    /*
                    | Detail close
                    */

                    if (
                        event.target.closest(
                            '#pkrsDetailClose'
                        )
                    ) {

                        event.preventDefault();

                        closeDetail();

                        return;
                    }


                    /*
                    | Group backdrop
                    */

                    const groupOverlay =
                        document.getElementById(
                            'pkrsGroupOverlay'
                        );


                    if (
                        groupOverlay &&
                        event.target === groupOverlay
                    ) {

                        closeGroup();

                        return;
                    }


                    /*
                    | Detail backdrop
                    */

                    const detailOverlay =
                        document.getElementById(
                            'pkrsDetailOverlay'
                        );


                    if (
                        detailOverlay &&
                        event.target === detailOverlay
                    ) {

                        closeDetail();
                    }
                },
                true
            );


            /*
            |--------------------------------------------------------------------------
            | ESC
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'keydown',
                function(event) {

                    if (event.key !== 'Escape') {
                        return;
                    }


                    const detail =
                        getDetailElements();

                    const group =
                        getGroupElements();


                    if (
                        detail.overlay &&
                        detail.overlay.classList.contains(
                            'is-open'
                        )
                    ) {

                        closeDetail();

                        return;
                    }


                    if (
                        group.overlay &&
                        group.overlay.classList.contains(
                            'is-open'
                        )
                    ) {

                        closeGroup();
                    }
                }
            );


            /*
            |--------------------------------------------------------------------------
            | LIKE
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                function(event) {

                    const like =
                        event.target.closest(
                            '#pkrsDetailLike'
                        );


                    if (!like) {
                        return;
                    }


                    event.preventDefault();

                    event.stopPropagation();


                    like.textContent =
                        like.textContent.trim() === '♡' ?
                        '♥' :
                        '♡';
                },
                true
            );


            /*
            |--------------------------------------------------------------------------
            | SHARE
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                async function(event) {

                        const share =
                            event.target.closest(
                                '#pkrsDetailShare'
                            );


                        if (!share) {
                            return;
                        }


                        event.preventDefault();

                        event.stopPropagation();


                        const detail =
                            getDetailElements();


                        const title =
                            detail.title ?
                            detail.title.textContent.trim() :
                            '';


                        try {

                            if (navigator.share) {

                                await navigator.share({
                                    title: title,
                                    text: title,
                                    url: window.location.href
                                });

                                return;
                            }


                            if (navigator.clipboard) {

                                await navigator.clipboard.writeText(
                                    window.location.href
                                );

                                alert(
                                    'Link berhasil disalin.'
                                );
                            }

                        } catch (error) {
                            // Share dibatalkan.
                        }
                    },
                    true
            );


            /*
            |--------------------------------------------------------------------------
            | AUTO OPEN POST
            |--------------------------------------------------------------------------
            */

            function checkAutoOpen() {

                const pkrsPage =
                    document.querySelector(
                        '.pkrs-page'
                    );


                if (
                    !pkrsPage ||
                    !pkrsPage.dataset.autoOpenPost
                ) {
                    return;
                }


                const autoPostId =
                    String(
                        pkrsPage.dataset.autoOpenPost
                    );


                const autoPost =
                    getAllPosts().find(function(post) {

                        return String(post.id) === autoPostId;

                    });


                if (autoPost) {

                    setTimeout(
                        function() {

                            openDetail(autoPost);

                        },
                        150
                    );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | ESCAPE HTML
            |--------------------------------------------------------------------------
            */

            function escapeHtml(value) {

                if (
                    value === null ||
                    value === undefined
                ) {
                    return '';
                }


                return String(value)
                    .replaceAll('&', '&amp;')
                    .replaceAll('<', '&lt;')
                    .replaceAll('>', '&gt;')
                    .replaceAll('"', '&quot;')
                    .replaceAll("'", '&#039;');
            }


            /*
            |--------------------------------------------------------------------------
            | AUTO OPEN
            |--------------------------------------------------------------------------
            */

            checkAutoOpen();
        }


        /*
        |--------------------------------------------------------------------------
        | BOOT
        |--------------------------------------------------------------------------
        */

        function bootPkrsPopups() {
            initPkrsPopups();
        }

        if (document.readyState === 'loading') {

            document.addEventListener(
                'DOMContentLoaded',
                bootPkrsPopups, {
                    once: true
                }
            );

        } else {

            bootPkrsPopups();
        }
    </script>

</body>

</html>
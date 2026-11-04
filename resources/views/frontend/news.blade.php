@extends('frontend.layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

    .rz-news-scope,
    .rz-news-scope *,
    .rz-news-scope *::before,
    .rz-news-scope *::after {
        box-sizing: border-box;
    }

    .rz-news-scope .font-display,
    .rz-news-scope .font-body {
        font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
    }
</style>

<div class="rz-news-scope font-body" style="background:#F4F8F7;">

    <!-- FEATURED -->
    @if ($featured)
    <section
        class="pt-6 pb-8 sm:pt-8 sm:pb-12 md:pt-14 md:pb-24"
        style="background:#FFFFFF !important;">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-16 items-center">
                <div class="mt-4 order-2 lg:order-1">

                    <div class="flex items-center gap-3 mb-7">
                        <span class="w-8 h-px" style="background:#0D9488;"></span>
                        <span class="text-xs tracking-[0.25em] uppercase font-semibold" style="color:#0D9488;">
                            Berita Utama
                        </span>
                    </div>

                    <h2 class="font-display text-4xl lg:text-[2.75rem] leading-[1.15] font-medium"
                        style="color:#0f172a;">
                        {{ $featured->title }}
                    </h2>

                    <p class="mt-6 leading-8 text-[15px]" style="color:#475569;">
                        {{ $featured->excerpt }}
                    </p>

                    <!-- signature: EKG pulse divider -->
                    <div class="mt-8 mb-8">
                        <svg viewBox="0 0 300 24" class="w-40 h-6" fill="none">
                            <path d="M0 12 H90 L100 12 L108 2 L118 22 L128 12 H150 L158 4 L166 20 L174 12 H300"
                                stroke="#0D9488" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="flex items-center gap-6">

                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-full flex items-center justify-center"
                                style="background:#0D9488;">
                                <span class="text-white text-sm font-semibold font-display">
                                    {{ optional($featured->published_at)->format('d') ?? '-' }}
                                </span>
                            </div>
                            <div>
                                <p class="font-semibold text-sm" style="color:#0f172a;">
                                    {{ optional($featured->published_at)->translatedFormat('d F Y') ?? 'Tanggal belum tersedia' }}
                                </p>
                                <p class="text-xs" style="color:#64748b;">{{ $featured->author }}</p>
                            </div>
                        </div>

                        <a href="{{ route('news.show', $featured->slug) }}"
                            class="group inline-flex items-center gap-2 px-7 py-3.5 rounded-full text-white text-sm font-semibold transition"
                            style="background:#0D9488;">
                            Baca Selengkapnya
                            <span class="transition group-hover:translate-x-1">→</span>
                        </a>

                    </div>

                </div>

                <div class="mt-8 lg:mt-4 order-1 lg:order-2 mx-auto lg:ml-auto lg:mr-0"
                    style="position:relative; max-width:260px; margin-left:auto; margin-right:auto;">
                    <div
                        style="position:absolute;
                                top:-10px;
                                left:-10px;
                                right:-10px;
                                bottom:-10px;
                                z-index:1;
                                border-radius:1.25rem;
                                background:transparent;">
                    </div>
                    <img src="{{ $featured->thumbnail_url ?? asset('img/news/clinical.jpg') }}" alt="{{ $featured->title }}"
                        style="position:relative; z-index:2; width:100%; height:350px; object-fit:cover; border-radius:0.75rem; box-shadow:0 16px 32px -14px rgba(13,148,136,0.35); display:block;">
                    <div class="hidden md:block"
                        style="position:absolute; z-index:3; bottom:-14px; left:-14px; background:#FFFFFF; border-radius:0.5rem; padding:10px 14px; box-shadow:0 10px 25px -8px rgba(13,148,136,0.25); border:1px solid #eef1f4;">
                        <p class="uppercase font-semibold"
                            style="font-size:9px; letter-spacing:0.1em; color:#0D9488;">
                            Kategori</p>
                        <p class="font-display font-medium" style="font-size:12px; color:#0f172a;">
                            {{ $featured->category }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @endif



    <!-- LIST BERITA -->
    <section class="rz-newslist-scope py-24" style="background:#FFFFFF;">

        <style>
            .rz-newslist-scope .rz-news-card {
                border-radius: 20px;
                overflow: hidden;
                background: #fff;
                border: 1px solid #eef1f4;
                box-shadow: 0 6px 18px rgba(15, 23, 42, .05);
                transition: transform .35s ease, box-shadow .35s ease;
            }

            .rz-newslist-scope .rz-news-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 36px rgba(15, 23, 42, .12);
            }

            .rz-newslist-scope .rz-news-thumb {
                position: relative;
                aspect-ratio: 4 / 3;
                background: #f1f5f9;
                overflow: hidden;
            }

            .rz-newslist-scope .rz-news-thumb img {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform .6s ease;
            }

            .rz-newslist-scope .rz-news-card:hover .rz-news-thumb img {
                transform: scale(1.06);
            }

            .rz-newslist-scope .rz-news-badge {
                position: absolute;
                top: 14px;
                left: 14px;
                z-index: 5;
                padding: 5px 12px;
                border-radius: 999px;
                background: rgba(255, 255, 255, .95);
                backdrop-filter: blur(4px);
                color: #0D9488;
                font-size: 11px;
                font-weight: 700;
                box-shadow: 0 4px 10px rgba(15, 23, 42, .1);
            }

            .rz-newslist-scope .rz-news-body {
                padding: 20px;
            }

            .rz-newslist-scope .rz-news-meta {
                display: flex;
                align-items: center;
                gap: 10px;
                font-size: 11.5px;
                color: #94a3b8;
                font-weight: 600;
            }

            .rz-newslist-scope .rz-news-meta .rz-dot {
                width: 3px;
                height: 3px;
                border-radius: 999px;
                background: #cbd5e1;
            }

            .rz-newslist-scope .rz-news-title {
                margin-top: 10px;
                font-size: 17px;
                font-weight: 700;
                line-height: 1.4;
                color: #0f172a;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .rz-newslist-scope .rz-news-excerpt {
                margin-top: 8px;
                font-size: 13.5px;
                line-height: 1.6;
                color: #64748b;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .rz-newslist-scope .rz-news-cta {
                margin-top: 14px;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                font-size: 13px;
                font-weight: 700;
                color: #0D9488;
            }

            .rz-newslist-scope .rz-news-card:hover .rz-news-cta span {
                transform: translateX(3px);
            }
        </style>

        <div class="max-w-6xl mx-auto px-6 mb-8">

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">

                <div>
                    <div class="flex items-center gap-3 mb-2 mt-4">
                        <span class="w-8 h-px" style="background:#0D9488;"></span>
                        <span class="text-xs tracking-[0.25em] uppercase font-semibold" style="color:#0D9488;">
                            Kabar RSUD Ar Rozy
                        </span>
                    </div>
                    <h2 class="font-display text-4xl font-medium" style="color:#0f172a;">
                        Berita Terbaru
                    </h2>
                </div>

                {{-- <p class="text-sm max-w-xs" style="color:#8A9992;">
                        Update kegiatan, layanan, dan capaian mutu RSUD Ar Rozy Kota Probolinggo.
                    </p> --}}

            </div>

            @if ($newsList->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">

                @foreach ($newsList as $news)
                <article class="rz-news-card group">

                    <a href="{{ route('news.show', $news->slug) }}" class="block">

                        <!-- <div class="rz-news-thumb">
                            <img src="{{ $news->thumbnail_url ?? asset('img/news/clinical.jpg') }}"
                                alt="{{ $news->title }}">
                            <span class="rz-news-badge">{{ $news->category }}</span>
                        </div> -->

                        <div class="rz-news-body">

                            <div class="rz-news-meta">
                                <span>{{ optional($news->published_at)->translatedFormat('d M Y') ?? '-' }}</span>
                                <span class="rz-dot"></span>
                                <span>{{ number_format($news->views) }} Dilihat</span>
                            </div>

                            <h3 class="rz-news-title">{{ $news->title }}</h3>

                            <p class="rz-news-excerpt">{{ $news->excerpt }}</p>

                            <div class="rz-news-cta">
                                Baca Selengkapnya
                                <span class="transition-transform">→</span>
                            </div>

                        </div>

                    </a>

                </article>
                @endforeach

            </div>

            @if ($newsList->hasMorePages())
            <div class="text-center mt-16">

                <a href="{{ $newsList->nextPageUrl() }}"
                    class="inline-flex items-center gap-2 px-8 py-3 rounded-full
                                        border border-[#0D9488]
                                        text-[#0D9488]
                                        hover:bg-[#0D9488]
                                        hover:text-white
                                        transition-all duration-300">

                    Muat Berita Lainnya

                    <span class="transition group-hover:translate-x-1">→</span>

                </a>

            </div>
            @endif
            @else
            <p class="text-center py-20 text-slate-500">
                Belum ada berita yang dipublikasikan.
            </p>
            @endif

        </div>

    </section>

</div>
@endsection
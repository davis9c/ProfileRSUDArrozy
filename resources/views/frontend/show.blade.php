@extends('frontend.layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .rz-news-detail-scope,
    .rz-news-detail-scope * {
        box-sizing: border-box;
    }

    .rz-news-detail-scope {
        font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
    }

    .rz-news-detail-scope .font-display,
    .rz-news-detail-scope .font-body {
        font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
    }

    .rz-news-detail-scope .news-content p {
        margin-bottom: 1.25rem;
        line-height: 1.9;
        color: #475569;
    }

    .rz-news-detail-scope .news-content h1,
    .rz-news-detail-scope .news-content h2,
    .rz-news-detail-scope .news-content h3,
    .rz-news-detail-scope .news-content h4,
    .rz-news-detail-scope .news-content h5,
    .rz-news-detail-scope .news-content h6 {
        font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
        color: #0f172a;
        margin: 1.75rem 0 0.75rem;
        font-weight: 700;
        line-height: 1.35;
    }

    .rz-news-detail-scope .news-content ul,
    .rz-news-detail-scope .news-content ol {
        margin: 0 0 1.25rem;
        padding-left: 1.5rem;
        color: #475569;
        line-height: 1.9;
    }

    .rz-news-detail-scope .news-content ul {
        list-style: disc outside;
    }

    .rz-news-detail-scope .news-content ol {
        list-style: decimal outside;
    }

    .rz-news-detail-scope .news-content li {
        margin-bottom: 0.35rem;
        padding-left: 0.15rem;
    }

    .rz-news-detail-scope .news-content ul ul {
        list-style-type: circle;
    }

    .rz-news-detail-scope .news-content ol ol {
        list-style-type: lower-alpha;
    }

    .rz-news-detail-scope .news-content li > ul,
    .rz-news-detail-scope .news-content li > ol {
        margin-top: 0.35rem;
        margin-bottom: 0;
    }
</style>

<div class="rz-news-detail-scope font-body" style="background:#F4F8F7;">

    <!-- HEADER -->
    <section class="pt-10 pb-6" style="background:#FFFFFF;">
        <div class="max-w-3xl mx-auto px-6">

            <a href="{{ route('news') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold transition mt-10"
                style="color:#0D9488;">
                ← Kembali ke Berita
            </a>

            <div class="flex items-center gap-3 mt-8 mb-5 text-xs"
                style="color:#94a3b8;">

                <span class="inline-flex items-center gap-1.5 font-semibold uppercase tracking-wide"
                    style="color:#0D9488;">

                    <!-- Aksen kuning dihapus -->
                    <span class="w-1.5 h-1.5 rounded-full"
                        style="background:#FFFFFF; border:1px solid #0D9488;">
                    </span>

                    {{ $news->category }}
                </span>

                <span>·</span>

                <span>
                    {{ optional($news->published_at)->translatedFormat('d F Y') ?? 'Tanggal belum tersedia' }}
                </span>

                <span>·</span>

                <span>
                    {{ $news->views }} dilihat
                </span>
            </div>

            <h1 class="font-display text-3xl md:text-[2.5rem] leading-[1.2] font-medium"
                style="color:#0f172a;">
                {{ $news->title }}
            </h1>

            <div class="flex items-center gap-3 mt-6">

                <img src="/img/logo-pin-edit.png"
                    class="w-10 h-10 rounded-full object-cover"
                    alt="{{ $news->author }}">

                <div>
                    <p class="text-sm font-semibold"
                        style="color:#0f172a;">
                        {{ $news->author }}
                    </p>

                    <p class="text-xs"
                        style="color:#94a3b8;">
                        RSUD Ar Rozy Kota Probolinggo
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- THUMBNAIL -->
    @if ($news->thumbnail_url)

    <section class="pb-0"
        style="background:#FFFFFF !important;">

        <div class="max-w-3xl mx-auto px-6"
            style="background:#FFFFFF !important;">

            <img src="{{ $news->thumbnail_url }}"
                alt="{{ $news->title }}"
                class="block mx-auto object-cover"
                style="
                    width:400px;
                    height:400px;
                    border:1px solid #eef1f4;
                    border-radius:0.75rem;
                    box-shadow:0 10px 25px -10px rgba(15,23,42,.12);
                ">

            <p class="mt-2 mb-0 text-xs italic text-center"
                style="color:#94a3b8;">
                {{ $news->title }} — Dokumentasi RSUD Ar Rozy
            </p>

        </div>

    </section>

    @endif


    <!-- CONTENT -->
    <section class="pt-4 pb-14"
        style="background:#FFFFFF;">

        <div class="max-w-3xl mx-auto px-6">

            <div class="news-content text-[15px]">

                @foreach ($contentBlocks as $block)

                @if ($block['type'] === 'html')

                {!! $block['value'] !!}

                @else

                <figure class="my-10">

                    <img src="{{ $block['value']->image_url }}"
                        alt="{{ $block['value']->caption ?? $news->title }}"
                        class="w-full object-cover"
                        style="
                                    height:280px;
                                    border:1px solid #eef1f4;
                                    border-radius:0.75rem;
                                ">

                    @if ($block['value']->caption)

                    <figcaption class="mt-2 text-xs italic text-center"
                        style="color:#94a3b8;">
                        {{ $block['value']->caption }}
                    </figcaption>

                    @endif

                </figure>

                @endif

                @endforeach

            </div>


            <!-- EKG DIVIDER -->
            <div class="mt-4 mb-8">

                <svg viewBox="0 0 300 24"
                    class="w-40 h-6"
                    fill="none">

                    <path
                        d="M0 12 H90 L100 12 L108 2 L118 22 L128 12 H150 L158 4 L166 20 L174 12 H300"
                        stroke="#0D9488"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round" />

                </svg>

            </div>


            <!-- SHARE -->
            <div class="pt-6 flex flex-wrap items-center gap-3"
                style="border-top:1px solid #eef1f4;">

                <span class="text-xs font-semibold uppercase tracking-wide"
                    style="color:#94a3b8;">
                    Bagikan:
                </span>

                <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . request()->url()) }}"
                    target="_blank"
                    class="px-4 py-2 rounded-full text-xs font-semibold transition"
                    style="
                        border:1px solid #eef1f4;
                        color:#0f172a;
                    ">
                    WhatsApp
                </a>

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                    target="_blank"
                    class="px-4 py-2 rounded-full text-xs font-semibold transition"
                    style="
                        border:1px solid #eef1f4;
                        color:#0f172a;
                    ">
                    Facebook
                </a>

            </div>

        </div>

    </section>


    <!-- BERITA TERKAIT -->
    @if ($related->count())

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


        <div class="max-w-6xl mx-auto px-6">

            <!-- HEADER -->
            <div class="flex items-center gap-3 mb-10">

                <span class="w-8 h-px"
                    style="background:#0D9488;">
                </span>

                <span class="text-xs tracking-[0.25em] uppercase font-semibold"
                    style="color:#0D9488;">
                    Baca Juga
                </span>

            </div>


            <!-- RELATED NEWS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">

                @foreach ($related as $item)

                <article class="rz-news-card group">

                    <a href="{{ route('news.show', $item->slug) }}"
                        class="block">

                        <!-- THUMBNAIL -->
                        <!-- <div class="rz-news-thumb">

                            <img src="{{ $item->thumbnail_url ?? asset('img/news/clinical.jpg') }}"
                                alt="{{ $item->title }}">

                            <span class="rz-news-badge">
                                {{ $item->category }}
                            </span>

                        </div> -->


                        <!-- CONTENT -->
                        <div class="rz-news-body">

                            <!-- META -->
                            <div class="rz-news-meta">

                                <span>
                                    {{ optional($item->published_at)->translatedFormat('d M Y') ?? '-' }}
                                </span>

                                <span class="rz-dot"></span>

                                <span>
                                    {{ number_format($item->views) }} Dilihat
                                </span>

                            </div>


                            <!-- TITLE -->
                            <h3 class="rz-news-title">
                                {{ $item->title }}
                            </h3>


                            <!-- EXCERPT -->
                            @if ($item->excerpt)
                            <p class="rz-news-excerpt">
                                {{ $item->excerpt }}
                            </p>
                            @endif


                            <!-- CTA -->
                            <div class="rz-news-cta">

                                Baca Selengkapnya

                                <span class="transition-transform">
                                    →
                                </span>

                            </div>

                        </div>

                    </a>

                </article>

                @endforeach

            </div>

        </div>

    </section>

    @endif


</div>
@endsection
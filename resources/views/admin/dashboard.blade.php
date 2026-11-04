@extends('admin.layouts.app')


@section('title', 'Dashboard')
@section('subtitle', 'Welcome back, ' . auth()->user()->name)


@section('content')

{{-- =========================================================
        STATS GRID
    ========================================================== --}}

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    {{-- =========================
            TOTAL DOKTER
        ========================== --}}

    <div class="stat-card">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-white/50 text-sm">
                    Total Dokter
                </p>

                <p class="text-3xl font-bold text-white mt-1">
                    {{ $stats['doctors'] }}
                </p>

                <p class="text-xs text-green-400 mt-2">
                    {{ $stats['active_doctors'] }} Aktif
                </p>

            </div>


            <div
                class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">

                <svg
                    class="w-6 h-6 text-blue-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />

                </svg>

            </div>

        </div>

    </div>


    {{-- =========================
            TOTAL BERITA
        ========================== --}}

    <div class="stat-card">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-white/50 text-sm">
                    Total Berita
                </p>

                <p class="text-3xl font-bold text-white mt-1">
                    {{ $stats['news'] }}
                </p>

                <p class="text-xs text-green-400 mt-2">
                    {{ $stats['published_news'] }}
                    Published
                    •
                    {{ $stats['draft_news'] }}
                    Draft
                </p>

            </div>


            <div
                class="w-12 h-12 rounded-xl bg-pink-500/20 flex items-center justify-center">

                <svg
                    class="w-6 h-6 text-pink-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h3l2-2h4l2 2h3a2 2 0 012 2v12a2 2 0 01-2 2z" />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 8h10M7 12h10M7 16h6" />

                </svg>

            </div>

        </div>

    </div>


    {{-- =========================
            TOTAL PKRS POST
        ========================== --}}

    <div class="stat-card">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-white/50 text-sm">
                    Total Post PKRS
                </p>

                <p class="text-3xl font-bold text-white mt-1">
                    {{ $stats['pkrs_posts'] ?? 0 }}
                </p>

                <p class="text-xs text-cyan-400 mt-2">
                    Konten PKRS
                </p>

            </div>


            <div
                class="w-12 h-12 rounded-xl bg-cyan-500/20 flex items-center justify-center">

                <i
                    class="fa-solid fa-file-lines text-cyan-400 text-xl">
                </i>

            </div>

        </div>

    </div>


    {{-- =========================
            TOTAL KATEGORI PKRS
        ========================== --}}

    <div class="stat-card">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-white/50 text-sm">
                    Kategori PKRS
                </p>

                <p class="text-3xl font-bold text-white mt-1">
                    {{ $stats['pkrs_categories'] ?? 0 }}
                </p>

                <p class="text-xs text-amber-400 mt-2">
                    Kategori tersedia
                </p>

            </div>


            <div
                class="w-12 h-12 rounded-xl bg-amber-500/20 flex items-center justify-center">

                <i
                    class="fa-solid fa-tags text-amber-400 text-xl">
                </i>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
        QUICK ACTIONS
    ========================================================== --}}

<div class="grid grid-cols-1 gap-6">


    {{-- =====================================================
            QUICK ACTIONS
        ====================================================== --}}

    <div class="admin-card p-6">

        <h2 class="text-lg font-semibold text-white mb-4">
            Quick Actions
        </h2>


        <div class="grid grid-cols-2 gap-4">


            {{-- =========================
                    DOKTER
                ========================== --}}

            <a
                href="{{ route('admin.doctors.index') }}"
                class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition group">

                <div
                    class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">

                    <i
                        class="fa-solid fa-user-doctor text-blue-400">
                    </i>

                </div>

                <span class="text-white/80 text-sm">
                    Kelola Dokter
                </span>

            </a>


            {{-- =========================
                    TAMBAH BERITA
                ========================== --}}

            <a
                href="{{ route('admin.news.create') }}"
                class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition group">

                <div
                    class="w-10 h-10 rounded-lg bg-pink-500/20 flex items-center justify-center">

                    <i
                        class="fa-solid fa-newspaper text-pink-400">
                    </i>

                </div>

                <span class="text-white/80 text-sm">
                    Tambah Berita
                </span>

            </a>


            {{-- =========================
                    DAFTAR BERITA
                ========================== --}}

            <a
                href="{{ route('admin.news.index') }}"
                class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition group">

                <div
                    class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center">

                    <i
                        class="fa-solid fa-list text-amber-400">
                    </i>

                </div>

                <span class="text-white/80 text-sm">
                    Daftar Berita
                </span>

            </a>


            {{-- =========================
                    TAMBAH POST PKRS
                ========================== --}}

            <a
                href="{{ route('admin.pkrs-posts.create') }}"
                class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition group">

                <div
                    class="w-10 h-10 rounded-lg bg-cyan-500/20 flex items-center justify-center">

                    <i
                        class="fa-solid fa-file-circle-plus text-cyan-400">
                    </i>

                </div>

                <span class="text-white/80 text-sm">
                    Tambah Post PKRS
                </span>

            </a>


            {{-- =========================
                    DAFTAR POST PKRS
                ========================== --}}

            <a
                href="{{ route('admin.pkrs-posts.index') }}"
                class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition group">

                <div
                    class="w-10 h-10 rounded-lg bg-violet-500/20 flex items-center justify-center">

                    <i
                        class="fa-solid fa-images text-violet-400">
                    </i>

                </div>

                <span class="text-white/80 text-sm">
                    Kelola Post PKRS
                </span>

            </a>


            {{-- =========================
                    KATEGORI PKRS
                ========================== --}}

            <a
                href="{{ route('admin.pkrs-categories.index') }}"
                class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition group">

                <div
                    class="w-10 h-10 rounded-lg bg-orange-500/20 flex items-center justify-center">

                    <i
                        class="fa-solid fa-tags text-orange-400">
                    </i>

                </div>

                <span class="text-white/80 text-sm">
                    Kategori PKRS
                </span>

            </a>


            {{-- =========================
                    GALLERY PKRS
                ========================== --}}

            <a
                href="{{ route('admin.pkrs-posts.index') }}"
                class="flex items-center gap-3 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition group">

                <div
                    class="w-10 h-10 rounded-lg bg-rose-500/20 flex items-center justify-center">

                    <i
                        class="fa-solid fa-photo-film text-rose-400">
                    </i>

                </div>

                <span class="text-white/80 text-sm">
                    Gallery PKRS
                </span>

            </a>

        </div>

    </div>

</div>

@endsection
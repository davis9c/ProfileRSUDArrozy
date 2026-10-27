<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/ARION-ICON.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        /* Admin-specific styles */
        .admin-sidebar {
            background: linear-gradient(180deg, #1a1a2e 0%, #0f0f23 100%);
        }

        .sidebar-link {
            transition: all 0.3s ease;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(99, 102, 241, 0.2);
            border-left: 3px solid #6366f1;
        }

        /* Sidebar */
        .sidebar-scroll {
            overflow-y: hidden;
            height: 100vh;
        }

        .sidebar-scroll:hover {
            overflow-y: auto;
        }

        /* Hide scrollbar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 0;
            transition: width .2s;
        }

        /* Show scrollbar when hover */
        .sidebar-scroll:hover::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-scroll:hover::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-scroll:hover::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .25);
            border-radius: 10px;
        }

        .sidebar-scroll:hover::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, .45);
        }

        /* Firefox */
        .sidebar-scroll {
            scrollbar-width: none;
        }

        .sidebar-scroll:hover {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, .25) transparent;
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #ec4899 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
        }

        .form-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        /* Dropdown option */
        .form-input option {
            background: #1e293b;
            /* warna background dropdown */
            color: #ffffff;
            /* warna teks */
        }

        .form-input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-input::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 1.5rem;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        .table-header {
            background: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body class="min-h-screen" style="background-color: #0f0f23;">
    <div class="flex min-h-screen" x-data="{ sidebarOpen: false }">

        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-cloak>
        </div>

        <!-- Sidebar -->
        <aside
            class="admin-sidebar fixed inset-y-0 left-0 w-64 z-50
           transform transition-transform duration-200
           lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
            x-cloak>

            <div class="sidebar-scroll h-screen flex flex-col">

                <!-- =========================
                    LOGO
                ========================== -->

                <div class="p-6 border-b border-white/10">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur
                           flex items-center justify-center shadow-lg">

                            <img
                                src="{{ asset('img/ARION-ICON.png') }}"
                                alt="ARION"
                                class="w-7 h-7 object-contain">

                        </div>

                        <div class="flex flex-col">

                            <span
                                class="text-white font-bold text-xl tracking-wide">
                                ARION
                            </span>

                            <div
                                class="w-12 h-0.5 bg-primary-500 rounded-full my-1">
                            </div>

                            <span
                                class="text-white/60 text-xs uppercase tracking-[0.3em]">
                                Admin Panel
                            </span>

                        </div>

                    </a>

                </div>


                <!-- =========================
                    NAVIGATION
                ========================== -->

                <nav class="flex-1 p-4 space-y-1 overflow-y-auto">

                    <!-- =========================
                        DASHBOARD
                    ========================== -->

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg
                       text-white/80 hover:text-white
                       {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />

                        </svg>

                        <span>
                            Dashboard
                        </span>

                    </a>


                    <!-- =========================
                        DOKTER
                    ========================== -->

                    <a
                        href="{{ route('admin.doctors.index') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg
                       text-white/80 hover:text-white
                       {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8 3v5a4 4 0 008 0V3M8 8a4 4 0 01-4 4v1a5 5 0 0010 0v-1a4 4 0 01-4-4m4 8a3 3 0 106 0v-1" />

                        </svg>

                        <span>
                            Dokter
                        </span>

                    </a>


                    <!-- =========================
                         BERITA
                    ========================== -->

                    <a
                        href="{{ route('admin.news.index') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg
                       text-white/80 hover:text-white
                       {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />

                        </svg>

                        <span>
                            Berita
                        </span>

                    </a>


                    <!-- =====================================================
                        PKRS
            =       ===================================================== -->

                    <div
                        x-data="{
                                open: {{ request()->routeIs('admin.pkrs-*') ? 'true' : 'false' }}
                            }"
                        class="space-y-1">


                        <!-- PKRS PARENT -->

                        <button
                            type="button"
                            @click="open = !open"
                            class="sidebar-link w-full flex items-center gap-3
                           px-4 py-3 rounded-lg
                           text-white/80 hover:text-white
                           transition-colors">

                            <!-- Icon -->

                            <svg
                                class="w-5 h-5 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2M9 8h4m-4 4h4m-4 4h2" />

                            </svg>


                            <!-- Text -->

                            <span class="flex-1 text-left">
                                PKRS
                            </span>


                            <!-- Arrow -->

                            <svg
                                class="w-4 h-4 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7" />

                            </svg>

                        </button>


                        <!-- PKRS CHILDREN -->

                        <div
                            x-show="open"
                            x-collapse
                            class="ml-4 pl-4 border-l border-white/10 space-y-1">


                            <!-- KATEGORI -->

                            <a
                                href="{{ route('admin.pkrs-categories.index') }}"
                                class="flex items-center gap-3
                               px-4 py-2.5 rounded-lg
                               text-sm
                               text-white/60
                               hover:text-white
                               hover:bg-white/5
                               transition-colors
                               {{ request()->routeIs('admin.pkrs-categories.*') ? 'bg-white/10 text-white' : '' }}">

                                <svg
                                    class="w-4 h-4 shrink-0"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 7h.01M3 11l8.586 8.586a2 2 0 002.828 0l6.172-6.172a2 2 0 000-2.828L12 3H5a2 2 0 00-2 2v7z" />

                                </svg>

                                <span>
                                    Kategori
                                </span>

                            </a>


                            <!-- POST -->

                            <a
                                href="{{ route('admin.pkrs-posts.index') }}"
                                class="flex items-center gap-3
                               px-4 py-2.5 rounded-lg
                               text-sm
                               text-white/60
                               hover:text-white
                               hover:bg-white/5
                               transition-colors
                               {{ request()->routeIs('admin.pkrs-posts.*') ? 'bg-white/10 text-white' : '' }}">

                                <svg
                                    class="w-4 h-4 shrink-0"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />

                                </svg>

                                <span>
                                    Post PKRS
                                </span>

                            </a>

                        </div>

                    </div>


                    <!-- =========================
                        SETTINGS
                    ========================== -->

                    <a
                        href="{{ route('admin.settings.edit') }}"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg
                       text-white/80 hover:text-white
                       {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 001.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31.826-2.37-2.37a1.724 1.724 0 001.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        </svg>

                        <span>
                            Settings
                        </span>

                    </a>

                </nav>


                <!-- =========================
                USER MENU
                ========================== -->

                <div class="p-4 border-t border-white/10">

                    <div class="flex items-center gap-3 px-4 py-3">

                        <div
                            class="w-10 h-10 rounded-full
                           bg-gradient-to-br from-primary-500 to-accent-500
                           flex items-center justify-center">

                            <span class="text-white font-semibold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </span>

                        </div>


                        <div class="flex-1 min-w-0">

                            <p class="text-white font-medium text-sm truncate">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-white/50 text-xs truncate">
                                {{ auth()->user()->email }}
                            </p>

                        </div>

                    </div>


                    <!-- LOGOUT -->

                    <form
                        method="POST"
                        action="{{ route('admin.logout') }}"
                        class="mt-2">

                        @csrf

                        <button
                            type="submit"
                            class="w-full flex items-center gap-3
                           px-4 py-2 rounded-lg
                           text-red-400
                           hover:bg-red-500/10
                           transition-colors">

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />

                            </svg>

                            <span>
                                Logout
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden lg:ml-64">
            <!-- Top Bar -->
            <header class="glass-dark sticky top-0 z-10 px-4 lg:px-6 py-4">
                <div class="flex items-center justify-between gap-4">
                    <!-- Mobile Menu Button -->
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 -ml-2 text-white/70 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="flex-1 min-w-0">
                        <h1 class="text-xl font-semibold text-white truncate">@yield('title', 'Dashboard')</h1>
                        <p class="text-white/50 text-sm hidden sm:block">@yield('subtitle', '')</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('home') }}" target="_blank"
                            class="flex items-center gap-2 text-white/70 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            View Site
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6">
                @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-500/20 border border-green-500/30 text-green-400"
                    x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-500/20 border border-red-500/30 text-red-400">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @stack('scripts')
</body>

</html>
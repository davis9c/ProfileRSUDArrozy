@extends('admin.layouts.app')

@section('title', 'Kategori PKRS')

@section('content')

<div class="container-fluid">

    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .page-subtitle {
            margin-top: .4rem;
            color: #9ca3af;
            font-size: .95rem;
        }

        .stats-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 28px;
            border-radius: 20px;
            background: linear-gradient(135deg, #3b82f6 0%, #4f7df5 45%, #6366f1 100%);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .18);
            color: #fff;
        }

        .stats-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .15);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            flex-shrink: 0;
        }

        .stats-card small {
            display: block;
            color: rgba(255, 255, 255, .8);
            font-size: .9rem;
        }

        .stats-card h2 {
            margin: 4px 0 0;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
        }

        .modern-card {
            background: #2b2d42;
            border-radius: 22px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .05);
            box-shadow: 0 12px 28px rgba(0, 0, 0, .18);
        }

        .modern-card-header {
            padding: 22px 28px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
        }

        .modern-card-header h5 {
            margin: 0;
            color: #fff;
            font-size: 1.35rem;
            font-weight: 600;
        }

        .modern-card-header small {
            color: #9ca3af;
        }

        .modern-card-body {
            padding: 22px;
        }

        .modern-card-footer {
            padding: 18px 24px;
            border-top: 1px solid rgba(255, 255, 255, .06);
        }

        .category-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 18px 20px;
            border-radius: 16px;
            transition: .25s ease;
        }

        .category-item:not(:last-child) {
            margin-bottom: 14px;
        }

        .category-item:hover {
            background: rgba(255, 255, 255, .04);
        }

        .category-left {
            display: flex;
            align-items: center;
            gap: 16px;
            min-width: 0;
        }

        .category-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            background: rgba(59, 130, 246, .12);
            color: #60a5fa;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .category-content h6 {
            margin: 0;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
        }

        .category-content span {
            display: block;
            margin-top: 4px;
            color: #9ca3af;
            font-size: .85rem;
        }

        .category-right {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-shrink: 0;
        }

        .slug-badge {
            padding: 7px 16px;
            border-radius: 999px;
            background: #384153;
            color: #7dd3fc;
            font-size: .85rem;
            font-weight: 500;
            letter-spacing: .3px;
        }

        .category-action {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: .25s;
            text-decoration: none;
            cursor: pointer;
        }

        .warning {
            background: rgba(245, 158, 11, .15);
            color: #fbbf24;
        }

        .warning:hover {
            background: #f59e0b;
            color: #fff;
            transform: translateY(-2px);
        }

        .danger {
            background: rgba(239, 68, 68, .15);
            color: #ef4444;
        }

        .danger:hover {
            background: #ef4444;
            color: #fff;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 70px 20px;
        }

        .empty-icon {
            width: 90px;
            height: 90px;
            margin: auto;
            border-radius: 50%;
            background: rgba(255, 255, 255, .04);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 38px;
            color: #60a5fa;
            margin-bottom: 22px;
        }

        .empty-state h4 {
            color: #fff;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #9ca3af;
            margin-bottom: 25px;
        }

        @media(max-width:768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .stats-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .category-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .category-right {
                width: 100%;
                justify-content: space-between;
            }
        }

        .btn-add-category {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            padding: .75rem 1.2rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #4f7df5, #6366f1);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(79, 125, 245, .25);
        }

        .btn-add-category:hover {
            transform: translateY(-2px);
            color: #fff;
            box-shadow: 0 12px 24px rgba(79, 125, 245, .35);
        }
    </style>

    <!-- <div class="page-header mb-4">

        <div>
            <h2 class="page-title">
                Kategori PKRS
            </h2>

            <p class="page-subtitle">
                Kelola kategori untuk mengelompokkan postingan edukasi kesehatan.
            </p>
        </div>

        <a href="{{ route('admin.pkrs-categories.create') }}"
            class="btn btn-success btn-lg shadow-sm">

            <i class="bi bi-plus-circle me-2"></i>

            Tambah Kategori

        </a>

    </div> -->

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle-fill me-2"></i>

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert">
        </button>

    </div>
    @endif

    <!-- <div class="row mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div class="stats-card">

                            <div class="stats-icon">

                                <i class="bi bi-folder2-open"></i>

                            </div>

                            <div>

                                <span>Total Kategori</span>

                                <h2>{{ $categories->total() }}</h2>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> -->

    <div class="modern-card">

        <div class="modern-card-header">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h5 class="mb-1 d-flex align-items-center">
                        <i class="bi bi-grid-1x2-fill text-primary me-2"></i>
                        Daftar Kategori
                    </h5>

                    <small class="text-muted">
                        {{ $categories->total() }} kategori tersedia
                    </small>

                </div>

                <a href="{{ route('admin.pkrs-categories.create') }}"
                    class="btn-add-category">

                    <i class="bi bi-plus-lg"></i>

                    <span>Tambah Kategori</span>

                </a>

            </div>

        </div>

        <div class="modern-card-body">

            @forelse($categories as $category)

            <div class="category-item">

                <div class="category-left">

                    <div class="category-icon">

                        <i class="bi bi-folder-fill"></i>

                    </div>

                    <div class="category-content">

                        <h6>

                            {{ $category->name }}

                        </h6>

                        <span>

                            Kategori Edukasi PKRS

                        </span>

                    </div>

                </div>

                <div class="category-right">

                    <div class="slug-badge">

                        {{ $category->slug }}

                    </div>

                    <div class="category-action">

                        <a href="{{ route('admin.pkrs-categories.edit',$category) }}"
                            class="action-btn warning">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form
                            action="{{ route('admin.pkrs-categories.destroy',$category) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="action-btn danger">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @empty

            <div class="empty-state">

                <div class="empty-icon">

                    <i class="bi bi-folder2-open"></i>

                </div>

                <h4>

                    Belum Ada Kategori

                </h4>

                <p>

                    Tambahkan kategori pertama untuk mengelompokkan konten PKRS.

                </p>

                <a href="{{ route('admin.pkrs-categories.create') }}"
                    class="btn btn-primary">

                    <i class="bi bi-plus-circle me-2"></i>

                    Tambah Kategori

                </a>

            </div>

            @endforelse

        </div>

        @if($categories->hasPages())

        <div class="modern-card-footer">

            {{ $categories->links() }}

        </div>

        @endif

    </div>

    <div class="mt-4">

        {{ $categories->links() }}

    </div>

</div>

@endsection
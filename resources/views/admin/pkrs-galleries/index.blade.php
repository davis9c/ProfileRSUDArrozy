@extends('admin.layouts.app')

@section('title', 'Gallery Post PKRS')

@push('styles')
<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --border: #dbe2ea;
        --text: #334155;
        --muted: #64748b;
        --white: #ffffff;
    }

    .gallery-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .gallery-header h3 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .gallery-header p {
        color: #94a3b8;
        margin: 0;
    }

    .gallery-actions {
        display: flex;
        gap: 10px;
    }

    .btn-gallery {
        border-radius: 12px;
        padding: 11px 18px;
        font-weight: 600;
    }

    .modern-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        margin-bottom: 28px;
    }

    .card-header-modern {
        background: linear-gradient(135deg,
                var(--primary),
                var(--primary-dark));
        color: #fff;
        padding: 24px 28px;
    }

    .card-header-modern h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
    }

    .card-header-modern p {
        margin: 7px 0 0;
        color: rgba(255, 255, 255, .9);
    }

    .card-body-modern {
        padding: 28px;
    }

    /* =========================
       POST INFO
    ========================= */

    .post-info {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .post-thumbnail {
        width: 100px;
        height: 75px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid var(--border);
    }

    .post-info h5 {
        margin: 0 0 5px;
        color: var(--text);
        font-weight: 700;
    }

    .post-info p {
        margin: 0;
        color: var(--muted);
    }

    /* =========================
       GALLERY GRID
    ========================= */

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill,
                minmax(220px, 1fr));
        gap: 20px;
    }

    .gallery-item {
        position: relative;
        background: #f8fafc;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        transition: all .2s ease;
    }

    .gallery-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(15, 23, 42, .10);
    }

    .gallery-image-wrapper {
        position: relative;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: #f1f5f9;
    }

    .gallery-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .gallery-number {
        position: absolute;
        top: 10px;
        left: 10px;

        width: 32px;
        height: 32px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: rgba(15, 23, 42, .75);
        color: #fff;

        font-size: 13px;
        font-weight: 700;
    }

    .gallery-item-body {
        padding: 14px;
    }

    .gallery-item-actions {
        display: flex;
        justify-content: flex-end;
        gap: 7px;
    }

    .gallery-action {
        width: 36px;
        height: 36px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0;

        border-radius: 9px;
        text-decoration: none;

        border: 1px solid transparent;
    }

    .gallery-action i {
        font-size: 15px;
    }

    .gallery-edit {
        background: #fef3c7;
        color: #d97706;
        border-color: #fde68a;
    }

    .gallery-edit i {
        color: #d97706;
    }

    .gallery-delete {
        background: #fef2f2;
        color: #dc2626;
        border-color: #fecaca;
    }

    .gallery-delete i {
        color: #dc2626;
    }

    .gallery-action:hover {
        transform: translateY(-1px);
    }

    /* =========================
       EMPTY STATE
    ========================= */

    .empty-gallery {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-gallery i {
        font-size: 64px;
        color: #cbd5e1;
    }

    .empty-gallery h5 {
        margin-top: 18px;
        color: var(--text);
        font-weight: 700;
    }

    .empty-gallery p {
        color: var(--muted);
        margin-bottom: 22px;
    }

    @media (max-width: 768px) {
        .gallery-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .gallery-actions {
            width: 100%;
        }

        .gallery-actions .btn {
            flex: 1;
        }

        .card-body-modern {
            padding: 20px;
        }

        .gallery-grid {
            grid-template-columns: repeat(auto-fill,
                    minmax(160px, 1fr));
        }
    }
</style>
@endpush


@section('content')

<div class="container-fluid">

    {{-- =========================
        HEADER
    ========================== --}}

    <div class="gallery-header">

        <div>

            <h3>
                <i class="bi bi-images me-2"></i>
                Gallery Post PKRS
            </h3>

            <p>
                Kelola gambar gallery untuk post:
                <strong>{{ $post->title }}</strong>
            </p>

        </div>


        <div class="gallery-actions">

            <a
                href="{{ route('admin.pkrs-posts.edit', $post) }}"
                class="btn btn-light btn-gallery">

                <i class="bi bi-pencil me-2"></i>
                Edit Post

            </a>


            <a
                href="{{ route('admin.pkrs-posts.galleries.create', $post) }}"
                class="btn btn-primary btn-gallery">

                <i class="bi bi-plus-lg me-2"></i>
                Tambah Gallery

            </a>

        </div>

    </div>


    {{-- =========================
        ALERT
    ========================== --}}

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show mb-4">

        <i class="bi bi-check-circle-fill me-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    @endif


    @if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show mb-4">

        <i class="bi bi-exclamation-triangle-fill me-2"></i>

        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    @endif


    {{-- =========================
        POST INFO
    ========================== --}}

    <div class="modern-card">

        <div class="card-header-modern">

            <h4>
                <i class="bi bi-file-earmark-text-fill me-2"></i>
                Informasi Post
            </h4>

            <p>
                Post yang memiliki gallery.
            </p>

        </div>


        <div class="card-body-modern">

            <div class="post-info">

                @if($post->thumbnail)

                <img
                    src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="{{ $post->title }}"
                    class="post-thumbnail">

                @else

                <div
                    class="post-thumbnail d-flex align-items-center justify-content-center">

                    <i class="bi bi-image text-muted fs-3"></i>

                </div>

                @endif


                <div>

                    <h5>
                        {{ $post->title }}
                    </h5>

                    <p>

                        {{ $post->galleries->count() }}
                        gambar gallery

                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        GALLERY
    ========================== --}}

    <div class="modern-card">

        <div class="card-header-modern">

            <h4>
                <i class="bi bi-images me-2"></i>
                Daftar Gallery
            </h4>

            <p>
                Semua gambar yang terkait dengan post ini.
            </p>

        </div>


        <div class="card-body-modern">

            @if($post->galleries->count())

            <div class="gallery-grid">

                @foreach($post->galleries as $gallery)

                <div class="gallery-item">

                    <div class="gallery-image-wrapper">

                        <img
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="Gallery {{ $loop->iteration }}"
                            class="gallery-image">

                        <div class="gallery-number">

                            {{ $loop->iteration }}

                        </div>

                    </div>


                    <div class="gallery-item-body">

                        <div class="gallery-item-actions">

                            {{-- Edit --}}

                            <a
                                href="{{ route(
                                            'admin.pkrs-posts.galleries.edit',
                                            [
                                                'post' => $post->id,
                                                'gallery' => $gallery->id
                                            ]
                                        ) }}"
                                class="gallery-action gallery-edit"
                                title="Edit Gallery">

                                <i class="bi bi-pencil-fill"></i>

                            </a>


                            {{-- Delete --}}

                            <form
                                action="{{ route(
                                            'admin.pkrs-posts.galleries.destroy',
                                            [
                                                'post' => $post->id,
                                                'gallery' => $gallery->id
                                            ]
                                        ) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Hapus gambar gallery ini?')">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="gallery-action gallery-delete"
                                    title="Hapus Gallery">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

            @else

            <div class="empty-gallery">

                <i class="bi bi-images"></i>

                <h5>
                    Belum ada gallery
                </h5>

                <p>
                    Post ini belum memiliki gambar gallery.
                </p>

                <a
                    href="{{ route(
                            'admin.pkrs-posts.galleries.create',
                            $post
                        ) }}"
                    class="btn btn-primary btn-gallery">

                    <i class="bi bi-plus-lg me-2"></i>

                    Tambah Gallery

                </a>

            </div>

            @endif

        </div>

    </div>


    {{-- =========================
        BACK
    ========================== --}}

    <div class="mb-5">

        <a
            href="{{ route('admin.pkrs-posts.index') }}"
            class="btn btn-light btn-gallery">

            <i class="bi bi-arrow-left me-2"></i>

            Kembali ke Post

        </a>

    </div>

</div>

@endsection
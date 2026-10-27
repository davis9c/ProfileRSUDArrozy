@extends('admin.layouts.app')

@section('title', 'Edit Gallery PKRS')

@push('styles')
<style>
    .gallery-edit-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        margin-bottom: 28px;
    }

    .gallery-edit-header {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        padding: 26px 30px;
    }

    .gallery-edit-header h4 {
        margin: 0;
        font-size: 21px;
        font-weight: 700;
    }

    .gallery-edit-header p {
        margin: 7px 0 0;
        color: rgba(255, 255, 255, .9);
    }

    .gallery-edit-body {
        padding: 30px;
    }

    .gallery-form-label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-weight: 600;
    }

    .gallery-form-control {
        width: 100%;
        min-height: 48px;
        padding: 10px 14px;

        background: #fff !important;
        color: #111827 !important;

        border: 1px solid #dbe2ea;
        border-radius: 12px;

        outline: none;
        transition: .2s ease;
    }

    .gallery-form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 .18rem rgba(37, 99, 235, .15);
    }

    .gallery-current-image {
        margin-top: 12px;
        width: 100%;
        max-width: 500px;
        max-height: 320px;
        object-fit: cover;

        border-radius: 16px;
        border: 1px solid #dbe2ea;

        display: block;
    }

    .gallery-preview {
        display: none;
        margin-top: 18px;
    }

    .gallery-preview img {
        width: 100%;
        max-width: 500px;
        max-height: 320px;
        object-fit: cover;

        border-radius: 16px;
        border: 1px solid #dbe2ea;
    }

    .gallery-info {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 16px 18px;
        margin-bottom: 24px;
    }

    .gallery-info-title {
        color: #334155;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .gallery-info-text {
        color: #64748b;
        margin: 0;
    }

    .gallery-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-top: 28px;
    }

    .gallery-btn {
        border-radius: 12px;
        padding: 11px 20px;
        font-weight: 600;
        text-decoration: none;
        border: 0;
    }

    .gallery-btn-back {
        background: #f1f5f9;
        color: #334155;
    }

    .gallery-btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .gallery-btn-save {
        background: #2563eb;
        color: #fff;
    }

    .gallery-btn-save:hover {
        background: #1d4ed8;
        color: #fff;
    }

    .gallery-required {
        color: #dc2626;
    }

    .gallery-error {
        color: #dc2626;
        font-size: .875rem;
        margin-top: 6px;
    }

    @media (max-width: 768px) {
        .gallery-edit-body {
            padding: 20px;
        }

        .gallery-edit-header {
            padding: 22px;
        }

        .gallery-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .gallery-actions .gallery-btn {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush


@section('content')

<div class="container-fluid">

    {{-- =========================
        HEADER
    ========================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold text-white mb-1">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Gallery
            </h3>

            <p class="text-muted mb-0">
                Perbarui gambar gallery untuk post PKRS.
            </p>

        </div>

        <a
            href="{{ route('admin.pkrs-posts.galleries.index', $post) }}"
            class="gallery-btn gallery-btn-back">

            <i class="bi bi-arrow-left me-2"></i>
            Kembali

        </a>

    </div>


    {{-- =========================
        ALERT
    ========================== --}}

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
        VALIDATION
    ========================== --}}

    @if($errors->any())

    <div class="alert alert-danger mb-4">

        <div class="fw-bold mb-2">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Terdapat kesalahan:
        </div>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif


    {{-- =========================
        POST INFO
    ========================== --}}

    <div class="gallery-edit-card">

        <div class="gallery-edit-header">

            <h4>
                <i class="bi bi-file-earmark-text-fill me-2"></i>
                {{ $post->title }}
            </h4>

            <p>
                Edit gambar gallery yang terkait dengan post ini.
            </p>

        </div>

        <div class="gallery-edit-body">

            <div class="gallery-info">

                <div class="gallery-info-title">
                    Post PKRS
                </div>

                <p class="gallery-info-text">
                    {{ $post->title }}
                </p>

            </div>


            {{-- =========================
                FORM
            ========================== --}}

            <form
                action="{{ route(
                    'admin.pkrs-posts.galleries.update',
                    [
                        'post' => $post->id,
                        'gallery' => $gallery->id
                    ]
                ) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- =========================
                    CURRENT IMAGE
                ========================== --}}

                <div class="mb-4">

                    <label class="gallery-form-label">
                        Gambar Saat Ini
                    </label>

                    @if($gallery->image)

                    <img
                        src="{{ asset('storage/' . $gallery->image) }}"
                        alt="Gallery"
                        class="gallery-current-image">

                    @else

                    <div class="text-muted">
                        Tidak ada gambar.
                    </div>

                    @endif

                </div>


                {{-- =========================
                    NEW IMAGE
                ========================== --}}

                <div class="mb-4">

                    <label
                        for="image"
                        class="gallery-form-label">

                        Ganti Gambar

                    </label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="gallery-form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp">

                    <div class="text-muted small mt-2">

                        JPG, JPEG, PNG, atau WEBP.
                        Maksimal 2 MB.
                        Kosongkan jika tidak ingin mengganti gambar.

                    </div>

                    @error('image')

                    <div class="gallery-error">
                        {{ $message }}
                    </div>

                    @enderror


                    {{-- Preview gambar baru --}}

                    <div
                        id="galleryPreview"
                        class="gallery-preview">

                        <div class="fw-semibold text-dark mb-2">
                            Preview gambar baru:
                        </div>

                        <img
                            id="galleryPreviewImage"
                            src=""
                            alt="Preview">

                    </div>

                </div>


                {{-- =========================
                    SORT ORDER
                ========================== --}}

                <div class="mb-4">

                    <label
                        for="sort_order"
                        class="gallery-form-label">

                        Urutan Gallery

                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        id="sort_order"
                        min="0"
                        value="{{ old('sort_order', $gallery->sort_order) }}"
                        class="gallery-form-control @error('sort_order') is-invalid @enderror">

                    <div class="text-muted small mt-2">
                        Semakin kecil angka, semakin awal gambar ditampilkan.
                    </div>

                    @error('sort_order')

                    <div class="gallery-error">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- =========================
                    ACTION
                ========================== --}}

                <div class="gallery-actions">

                    <a
                        href="{{ route(
                            'admin.pkrs-posts.galleries.index',
                            $post
                        ) }}"
                        class="gallery-btn gallery-btn-back">

                        <i class="bi bi-arrow-left me-2"></i>
                        Batal

                    </a>


                    <button
                        type="submit"
                        class="gallery-btn gallery-btn-save">

                        <i class="bi bi-check-circle-fill me-2"></i>
                        Update Gallery

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const imageInput = document.getElementById('image');
        const preview = document.getElementById('galleryPreview');
        const previewImage = document.getElementById('galleryPreviewImage');

        if (!imageInput) {
            return;
        }

        imageInput.addEventListener('change', function() {

            const file = this.files[0];

            if (!file) {
                preview.style.display = 'none';
                previewImage.src = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {

                previewImage.src = e.target.result;
                preview.style.display = 'block';

            };

            reader.readAsDataURL(file);

        });

    });
</script>

@endpush
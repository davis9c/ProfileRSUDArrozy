@extends('admin.layouts.app')

@section('title', 'Tambah Gallery PKRS')

@push('styles')
<style>
    /* =========================================================
       GALLERY CREATE
    ========================================================= */

    .gallery-create-page {
        --gallery-primary: #2563eb;
        --gallery-primary-dark: #1d4ed8;
        --gallery-border: #dbe2ea;
        --gallery-text: #334155;
        --gallery-muted: #64748b;
        --gallery-white: #ffffff;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .gallery-create-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .gallery-create-header h3 {
        color: #ffffff;
        font-weight: 700;
        margin: 0 0 6px;
    }

    .gallery-create-header p {
        color: #94a3b8;
        margin: 0;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .gallery-create-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        border-radius: 12px;
        padding: 11px 20px;

        font-weight: 600;
        text-decoration: none;

        transition: all .2s ease;
    }

    .gallery-create-btn:hover {
        transform: translateY(-1px);
    }


    .gallery-create-btn-back {
        background: #ffffff;
        color: #334155 !important;
        border: 1px solid #e2e8f0;
    }

    .gallery-create-btn-back:hover {
        background: #f8fafc;
        color: #1e293b !important;
    }


    .gallery-create-btn-primary {
        background: #2563eb;
        color: #ffffff !important;
        border: 1px solid #2563eb;
    }

    .gallery-create-btn-primary:hover {
        background: #1d4ed8;
        color: #ffffff !important;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .gallery-create-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;

        border: 0;

        box-shadow:
            0 10px 30px rgba(15, 23, 42, .08);

        margin-bottom: 28px;
    }


    .gallery-create-card-header {
        padding: 25px 30px;

        background:
            linear-gradient(135deg,
                #2563eb,
                #1d4ed8);

        color: #ffffff;
    }

    .gallery-create-card-header h4 {
        margin: 0;

        font-size: 21px;
        font-weight: 700;

        color: #ffffff;
    }

    .gallery-create-card-header p {
        margin: 7px 0 0;

        color: rgba(255, 255, 255, .9);
    }


    .gallery-create-card-body {
        padding: 30px;
    }


    /* =========================================================
       POST INFO
    ========================================================= */

    .gallery-post-info {
        display: flex;
        align-items: center;
        gap: 16px;

        padding: 16px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

        border-radius: 14px;

        margin-bottom: 30px;
    }


    .gallery-post-thumbnail {
        width: 90px;
        height: 68px;

        flex-shrink: 0;

        object-fit: cover;

        border-radius: 10px;

        border: 1px solid #dbe2ea;
    }


    .gallery-post-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        color: #94a3b8;
    }


    .gallery-post-info h5 {
        margin: 0 0 5px;

        color: #334155;

        font-size: 17px;
        font-weight: 700;
    }


    .gallery-post-info p {
        margin: 0;

        color: #64748b;

        font-size: 14px;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .gallery-create-label {
        display: block;

        margin-bottom: 8px;

        color: #334155;

        font-size: 14px;
        font-weight: 600;
    }


    .gallery-required {
        color: #ef4444;
    }


    /* =========================================================
       UPLOAD AREA
    ========================================================= */

    .gallery-upload-area {
        position: relative;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        min-height: 280px;

        padding: 35px;

        background: #f8fafc;

        border: 2px dashed #cbd5e1;

        border-radius: 18px;

        text-align: center;

        cursor: pointer;

        transition:
            background .2s ease,
            border-color .2s ease,
            transform .2s ease;
    }


    .gallery-upload-area:hover {
        background: #eff6ff;

        border-color: #2563eb;

        transform: translateY(-1px);
    }


    .gallery-upload-area.has-file {
        background: #eff6ff;

        border-color: #2563eb;
    }


    .gallery-upload-icon {
        display: flex;

        align-items: center;
        justify-content: center;

        width: 72px;
        height: 72px;

        margin-bottom: 16px;

        border-radius: 18px;

        background: #dbeafe;

        color: #2563eb;

        font-size: 34px;
    }


    .gallery-upload-area h5 {
        margin: 0 0 7px;

        color: #334155;

        font-weight: 700;
    }


    .gallery-upload-area p {
        margin: 0;

        color: #64748b;

        font-size: 14px;

        line-height: 1.6;
    }


    .gallery-upload-area input[type="file"] {
        display: none;
    }


    /* =========================================================
       PREVIEW
    ========================================================= */

    .gallery-preview {
        display: none;

        margin-top: 20px;

        padding: 15px;

        background: #f8fafc;

        border: 1px solid #dbe2ea;

        border-radius: 16px;
    }


    .gallery-preview.show {
        display: block;
    }


    .gallery-preview-image-wrapper {
        position: relative;

        overflow: hidden;

        background: #f1f5f9;

        border-radius: 12px;
    }


    .gallery-preview-image {
        display: block;

        width: 100%;

        max-height: 420px;

        object-fit: contain;
    }


    .gallery-preview-info {
        display: flex;

        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-top: 12px;
    }


    .gallery-preview-name {
        color: #334155;

        font-size: 14px;

        font-weight: 600;

        word-break: break-word;
    }


    .gallery-preview-size {
        flex-shrink: 0;

        color: #64748b;

        font-size: 13px;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .gallery-create-input {
        width: 100%;

        min-height: 48px;

        padding: 10px 14px;

        background: #ffffff;

        color: #111827;

        border: 1px solid #dbe2ea;

        border-radius: 12px;

        outline: none;

        box-shadow: none;

        transition: all .2s ease;
    }


    .gallery-create-input:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 .18rem rgba(37, 99, 235, .15);
    }


    .gallery-help {
        margin-top: 7px;

        color: #64748b;

        font-size: 13px;
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .gallery-field-error {
        margin-top: 7px;

        color: #dc2626;

        font-size: 13px;
    }


    .gallery-create-input.is-invalid {
        border-color: #dc2626;
    }


    /* =========================================================
       ACTION
    ========================================================= */

    .gallery-create-actions {
        display: flex;

        justify-content: space-between;
        align-items: center;

        gap: 12px;

        margin-top: 30px;

        padding-top: 25px;

        border-top: 1px solid #e2e8f0;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .gallery-create-header {
            flex-direction: column;
            align-items: flex-start;
        }


        .gallery-create-header .gallery-create-btn {
            width: 100%;
        }


        .gallery-create-card-body {
            padding: 20px;
        }


        .gallery-create-card-header {
            padding: 22px;
        }


        .gallery-upload-area {
            min-height: 240px;
        }


        .gallery-create-actions {
            flex-direction: column-reverse;
        }


        .gallery-create-actions .gallery-create-btn {
            width: 100%;
        }

    }
</style>
@endpush


@section('content')

<div class="container-fluid gallery-create-page">

    {{-- =====================================================
        HEADER
    ====================================================== --}}

    <div class="gallery-create-header">

        <div>

            <h3>
                <i class="bi bi-plus-square me-2"></i>
                Tambah Gallery PKRS
            </h3>

            <p>
                Tambahkan gambar baru ke gallery post.
            </p>

        </div>


        <a
            href="{{ route(
                'admin.pkrs-posts.galleries.index',
                ['post' => $post->id]
            ) }}"
            class="gallery-create-btn gallery-create-btn-back">

            <i class="bi bi-arrow-left"></i>

            Kembali ke Gallery

        </a>

    </div>


    {{-- =====================================================
        ALERT ERROR
    ====================================================== --}}

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


    @if($errors->any())

    <div class="alert alert-danger mb-4">

        <div class="fw-bold mb-2">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            Terdapat kesalahan pada form:

        </div>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

            @endforeach

        </ul>

    </div>

    @endif


    {{-- =====================================================
        FORM
    ====================================================== --}}

    <form
        action="{{ route(
            'admin.pkrs-posts.galleries.store',
            ['post' => $post->id]
        ) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf


        <div class="gallery-create-card">

            {{-- =================================================
                CARD HEADER
            ================================================== --}}

            <div class="gallery-create-card-header">

                <h4>

                    <i class="bi bi-images me-2"></i>

                    Tambah Gambar Gallery

                </h4>

                <p>
                    Gambar akan disimpan sebagai bagian dari post ini.
                </p>

            </div>


            <div class="gallery-create-card-body">


                {{-- =================================================
                    POST INFO
                ================================================== --}}

                <div class="gallery-post-info">

                    @if($post->thumbnail)

                    <img
                        src="{{ asset(
                                'storage/' . $post->thumbnail
                            ) }}"
                        alt="{{ $post->title }}"
                        class="gallery-post-thumbnail">

                    @else

                    <div
                        class="gallery-post-thumbnail
                                   gallery-post-placeholder">

                        <i class="bi bi-image fs-3"></i>

                    </div>

                    @endif


                    <div>

                        <h5>
                            {{ $post->title }}
                        </h5>

                        <p>

                            {{ $post->galleries()->count() }}

                            gambar sudah terdaftar di gallery.

                        </p>

                    </div>

                </div>


                {{-- =================================================
                    IMAGE
                ================================================== --}}

                <div class="mb-4">

                    <label
                        for="image"
                        class="gallery-create-label">

                        Gambar Gallery

                        <span class="gallery-required">*</span>

                    </label>


                    <label
                        for="image"
                        class="gallery-upload-area"
                        id="galleryUploadArea">

                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            required>


                        <div class="gallery-upload-icon">

                            <i class="bi bi-cloud-arrow-up-fill"></i>

                        </div>


                        <h5>
                            Pilih Gambar
                        </h5>


                        <p>

                            Klik area ini untuk memilih gambar

                            <br>

                            JPG, JPEG, PNG, WEBP — maksimal 2 MB

                        </p>

                    </label>


                    @error('image')

                    <div class="gallery-field-error">

                        {{ $message }}

                    </div>

                    @enderror


                    {{-- =================================================
                        PREVIEW
                    ================================================== --}}

                    <div
                        class="gallery-preview"
                        id="galleryPreview">

                        <div class="gallery-preview-image-wrapper">

                            <img
                                src=""
                                alt="Preview Gallery"
                                class="gallery-preview-image"
                                id="galleryPreviewImage">

                        </div>


                        <div class="gallery-preview-info">

                            <div
                                class="gallery-preview-name"
                                id="galleryPreviewName">
                            </div>


                            <div
                                class="gallery-preview-size"
                                id="galleryPreviewSize">
                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    SORT ORDER
                ================================================== --}}

                <div>

                    <label
                        for="sort_order"
                        class="gallery-create-label">

                        Urutan Gallery

                    </label>


                    <input
                        type="number"
                        name="sort_order"
                        id="sort_order"
                        min="0"
                        value="{{ old(
                            'sort_order',
                            ($post->galleries()->max('sort_order') ?? 0) + 1
                        ) }}"
                        class="gallery-create-input
                               @error('sort_order') is-invalid @enderror">


                    <div class="gallery-help">

                        Menentukan posisi gambar dalam gallery.
                        Jika tidak diubah, gambar baru akan berada
                        di urutan terakhir.

                    </div>


                    @error('sort_order')

                    <div class="gallery-field-error">

                        {{ $message }}

                    </div>

                    @enderror

                </div>


                {{-- =================================================
                    ACTION
                ================================================== --}}

                <div class="gallery-create-actions">

                    <a
                        href="{{ route(
                            'admin.pkrs-posts.galleries.index',
                            ['post' => $post->id]
                        ) }}"
                        class="gallery-create-btn
                               gallery-create-btn-back">

                        <i class="bi bi-x-circle"></i>

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="gallery-create-btn
                               gallery-create-btn-primary">

                        <i class="bi bi-check-circle-fill"></i>

                        Simpan Gallery

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection


@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const imageInput =
            document.getElementById('image');

        const uploadArea =
            document.getElementById('galleryUploadArea');

        const preview =
            document.getElementById('galleryPreview');

        const previewImage =
            document.getElementById('galleryPreviewImage');

        const previewName =
            document.getElementById('galleryPreviewName');

        const previewSize =
            document.getElementById('galleryPreviewSize');


        if (!imageInput) {
            return;
        }


        imageInput.addEventListener('change', function() {

            const file = this.files[0];


            if (!file) {

                preview.classList.remove('show');

                uploadArea.classList.remove('has-file');

                previewImage.src = '';

                previewName.textContent = '';

                previewSize.textContent = '';

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Preview
            |--------------------------------------------------------------------------
            */

            const reader = new FileReader();


            reader.onload = function(event) {

                previewImage.src =
                    event.target.result;

                preview.classList.add('show');

                uploadArea.classList.add('has-file');


                /*
                |--------------------------------------------------------------------------
                | File Name
                |--------------------------------------------------------------------------
                */

                previewName.textContent =
                    file.name;


                /*
                |--------------------------------------------------------------------------
                | File Size
                |--------------------------------------------------------------------------
                */

                const sizeInMB =
                    file.size / (1024 * 1024);


                previewSize.textContent =
                    sizeInMB.toFixed(2) + ' MB';

            };


            reader.readAsDataURL(file);

        });

    });
</script>

@endpush
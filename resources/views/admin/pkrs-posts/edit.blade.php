@extends('admin.layouts.app')

@section('title', 'Edit Post PKRS')

@push('styles')
@include('admin.pkrs-posts.partials._styles')
@endpush

@section('content')

<div class="container-fluid">

    {{-- ===================== HEADER ===================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold text-white mb-1">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Post PKRS
            </h3>

            <p class="text-muted mb-0">
                Perbarui konten edukasi kesehatan.
            </p>
        </div>

        <a
            href="{{ route('admin.pkrs-posts.index') }}"
            class="btn btn-light btn-back">

            <i class="bi bi-arrow-left me-2"></i>

            Kembali

        </a>

    </div>


    {{-- ===================== ALERT ===================== --}}

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show mb-4"
        role="alert">

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

    <div class="alert alert-danger alert-dismissible fade show mb-4"
        role="alert">

        <i class="bi bi-exclamation-triangle-fill me-2"></i>

        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    @endif


    {{-- ===================== VALIDATION ===================== --}}

    @if($errors->any())

    <div class="alert alert-danger mb-4">

        <div class="fw-bold mb-2">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            Terdapat kesalahan pada form:

        </div>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif


    {{-- ===================== FORM ===================== --}}

    <form
        action="{{ route('admin.pkrs-posts.update', $post) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @method('PUT')


        {{-- =====================================================
            INFORMASI POST
        ====================================================== --}}

        <div class="modern-card">

            <div class="card-header-modern">

                <h4>

                    <i class="bi bi-file-earmark-text-fill me-2"></i>

                    Informasi Post

                </h4>

                <p>

                    Perbarui informasi dasar post PKRS.

                </p>

            </div>


            <div class="card-body-modern">

                <div class="row">

                    {{-- ===================== JUDUL ===================== --}}

                    <div class="col-lg-8 mb-3">

                        <label class="form-label">

                            Judul

                            <span class="required">*</span>

                        </label>

                        <input
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title"
                            id="title"
                            value="{{ old('title', $post->title) }}"
                            placeholder="Masukkan judul post...">

                        @error('title')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>


                    {{-- ===================== KATEGORI ===================== --}}

                    <div class="col-lg-4 mb-3">

                        <label class="form-label">

                            Kategori

                            <span class="required">*</span>

                        </label>

                        <select
                            name="pkrs_category_id"
                            class="form-select @error('pkrs_category_id') is-invalid @enderror">

                            <option value="">

                                -- Pilih Kategori --

                            </option>

                            @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(
                                old( 'pkrs_category_id' ,
                                $post->pkrs_category_id
                                ) == $category->id
                                )>

                                {{ $category->name }}

                            </option>

                            @endforeach

                        </select>

                        @error('pkrs_category_id')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>


                    {{-- ===================== SLUG ===================== --}}

                    <div class="col-lg-12 mb-3">

                        <label class="form-label">
                            Slug
                        </label>

                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            value="{{ old('slug', $post->slug) }}"
                            class="form-control @error('slug') is-invalid @enderror"
                            readonly>

                        <small class="text-muted">
                            Slug dibuat otomatis berdasarkan judul.
                        </small>

                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- ===================== EXCERPT ===================== --}}

                    <div class="col-12">

                        <label class="form-label">

                            Ringkasan

                            <span class="required">*</span>

                        </label>

                        <textarea
                            name="excerpt"
                            rows="4"
                            class="form-control @error('excerpt') is-invalid @enderror"
                            placeholder="Tuliskan ringkasan singkat...">{{ old('excerpt', $post->excerpt) }}</textarea>

                        @error('excerpt')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            ISI ARTIKEL
        ====================================================== --}}

        <div class="modern-card">

            <div class="card-header-modern">

                <h4>

                    <i class="bi bi-journal-richtext me-2"></i>

                    Isi Artikel

                </h4>

                <p>

                    Perbarui isi artikel edukasi kesehatan.

                </p>

            </div>


            <div class="card-body-modern">

                <textarea
                    id="content"
                    name="content"
                    class="form-control @error('content') is-invalid @enderror"
                    rows="15">{{ old('content', $post->content) }}</textarea>

                @error('content')

                <div class="invalid-feedback d-block">

                    {{ $message }}

                </div>

                @enderror

            </div>

        </div>


        {{-- =====================================================
            MEDIA
        ====================================================== --}}

        <div class="modern-card">

            <div class="card-header-modern">

                <h4>

                    <i class="bi bi-image-fill me-2"></i>

                    Media

                </h4>

                <p>

                    Perbarui thumbnail dan jenis post.

                </p>

            </div>


            <div class="card-body-modern">

                <div class="row">

                    {{-- ===================== THUMBNAIL ===================== --}}

                    <div class="col-lg-6">

                        <label class="form-label">

                            Thumbnail

                        </label>


                        <label class="thumbnail-upload">

                            <input
                                type="file"
                                hidden
                                id="thumbnail"
                                name="thumbnail"
                                accept=".jpg,.jpeg,.png,.webp">


                            <i class="bi bi-cloud-arrow-up-fill"></i>


                            <h5 class="mt-3">

                                Ganti Thumbnail

                            </h5>


                            <small class="text-muted">

                                JPG, PNG, WEBP maksimal 2 MB

                            </small>

                        </label>


                        {{-- ===================== CURRENT THUMBNAIL ===================== --}}

                        <div
                            class="thumbnail-preview"
                            id="thumbnailPreview"
                            style="{{ $post->thumbnail ? 'display:block;' : 'display:none;' }}">

                            <img
                                id="previewImage"
                                src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : '' }}"
                                alt="Thumbnail">

                        </div>

                    </div>


                    {{-- ===================== TYPE ===================== --}}

                    <div class="col-lg-6">

                        <label class="form-label">

                            Jenis Post

                            <span class="required">*</span>

                        </label>


                        <select
                            id="type"
                            name="type"
                            class="form-select @error('type') is-invalid @enderror">

                            <option
                                value="image"
                                @selected(old('type', $post->type) === 'image')>

                                Artikel

                            </option>

                            <option
                                value="gallery"
                                @selected(old('type', $post->type) === 'gallery')>

                                Gallery

                            </option>

                            <option
                                value="video"
                                @selected(old('type', $post->type) === 'video')>

                                Video

                            </option>

                        </select>


                        @error('type')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            VIDEO
        ====================================================== --}}

        <div
            class="modern-card video-section"
            id="videoSection">

            <div class="card-header-modern">

                <h4>

                    <i class="bi bi-camera-video-fill me-2"></i>

                    Informasi Video

                </h4>

                <p>

                    Isi data berikut apabila jenis post adalah Video.

                </p>

            </div>


            <div class="card-body-modern">

                <div class="row">

                    {{-- ===================== VIDEO URL ===================== --}}

                    <div class="col-lg-12 mb-4">

                        <label class="form-label">

                            URL Video

                        </label>


                        <input
                            type="url"
                            name="video"
                            id="video"
                            value="{{ old('video', $post->video) }}"
                            class="form-control @error('video') is-invalid @enderror"
                            placeholder="https://youtube.com/watch?v=...">


                        @error('video')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>


                    {{-- ===================== VIDEO COVER ===================== --}}

                    <div class="col-lg-12">

                        <label class="form-label">

                            Cover Video

                        </label>


                        <input
                            type="file"
                            name="video_cover"
                            id="video_cover"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="form-control @error('video_cover') is-invalid @enderror">


                        @error('video_cover')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror


                        {{-- ===================== CURRENT COVER ===================== --}}

                        @if($post->video_cover)

                        <div class="mt-3">

                            <p class="mb-2 fw-semibold">

                                Cover saat ini:

                            </p>

                            <img
                                src="{{ asset('storage/' . $post->video_cover) }}"
                                alt="Video Cover"
                                style="
                                        width:100%;
                                        max-height:320px;
                                        object-fit:cover;
                                        border-radius:16px;
                                        border:1px solid #e5e7eb;
                                    ">

                        </div>

                        @endif

                    </div>


                    {{-- ===================== VIDEO PREVIEW ===================== --}}

                    <div
                        id="video-preview"
                        class="mt-4 {{ $post->video ? '' : 'd-none' }}">

                        <iframe
                            id="video-frame"
                            width="100%"
                            height="350"
                            src=""
                            title="Video Preview"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            PUBLIKASI
        ====================================================== --}}

        <div class="modern-card">

            <div class="card-header-modern">

                <h4>

                    <i class="bi bi-send-check-fill me-2"></i>

                    Publikasi

                </h4>

                <p>

                    Atur status publikasi post.

                </p>

            </div>


            <div class="card-body-modern">

                <div class="row">

                    {{-- ===================== FEATURED ===================== --}}

                    <div class="col-lg-4">

                        <div class="form-check form-switch mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="featured"
                                name="featured"
                                value="1"
                                @checked(old('featured', $post->featured))>


                            <label
                                class="form-check-label ms-2"
                                for="featured">

                                Featured Post

                            </label>

                        </div>

                    </div>


                    {{-- ===================== PUBLISH ===================== --}}

                    <div class="col-lg-4">

                        <div class="form-check form-switch mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="is_published"
                                name="is_published"
                                value="1"
                                @checked(old('is_published', $post->is_published))>


                            <label
                                class="form-check-label ms-2"
                                for="is_published">

                                Publish Sekarang

                            </label>

                        </div>

                    </div>


                    {{-- ===================== PUBLISHED AT ===================== --}}

                    <div class="col-lg-4">

                        <label class="form-label">

                            Publish At

                        </label>


                        <input
                            type="datetime-local"
                            name="published_at"
                            value="{{ old(
                                'published_at',
                                $post->published_at
                                    ? $post->published_at->format('Y-m-d\TH:i')
                                    : ''
                            ) }}"
                            class="form-control @error('published_at') is-invalid @enderror">


                        @error('published_at')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            ACTION
        ====================================================== --}}

        <div class="d-flex justify-content-between align-items-center mt-4 mb-5">

            <a
                href="{{ route('admin.pkrs-posts.index') }}"
                class="btn btn-light btn-back">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>


            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-primary btn-save">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    Update Post

                </button>

            </div>

        </div>

    </form>

</div>

@endsection


@push('scripts')

@include('admin.pkrs-posts.partials._scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {

        /*
        |--------------------------------------------------------------------------
        | Thumbnail Preview
        |--------------------------------------------------------------------------
        */

        const thumbnailInput =
            document.getElementById('thumbnail');

        const previewImage =
            document.getElementById('previewImage');

        const thumbnailPreview =
            document.getElementById('thumbnailPreview');


        if (thumbnailInput) {

            thumbnailInput.addEventListener('change', function () {

                const file = this.files[0];

                if (!file) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (e) {

                    if (previewImage) {
                        previewImage.src = e.target.result;
                    }

                    if (thumbnailPreview) {
                        thumbnailPreview.style.display = 'block';
                    }

                };

                reader.readAsDataURL(file);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Slug Otomatis dari Judul
        |--------------------------------------------------------------------------
        */

        const titleInput =
            document.getElementById('title');

        const slugInput =
            document.getElementById('slug');


        function generateSlug(text) {

            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

        }


        if (titleInput && slugInput) {

            titleInput.addEventListener('input', function () {

                slugInput.value =
                    generateSlug(this.value);

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Type
        |--------------------------------------------------------------------------
        */

        const typeSelect =
            document.getElementById('type');

        const videoSection =
            document.getElementById('videoSection');


        function toggleVideoSection() {

            if (!typeSelect || !videoSection) {
                return;
            }


            if (typeSelect.value === 'video') {

                videoSection.style.display = 'block';

            } else {

                videoSection.style.display = 'none';

            }

        }


        if (typeSelect) {

            typeSelect.addEventListener(
                'change',
                toggleVideoSection
            );

            /*
            |--------------------------------------------------------------------------
            | Jalankan saat pertama kali halaman dibuka
            |--------------------------------------------------------------------------
            */

            toggleVideoSection();

        }


        /*
        |--------------------------------------------------------------------------
        | YouTube Preview
        |--------------------------------------------------------------------------
        */

        const videoInput =
            document.getElementById('video');

        const videoPreview =
            document.getElementById('video-preview');

        const videoFrame =
            document.getElementById('video-frame');


        function getYoutubeId(url) {

            if (!url) {
                return null;
            }


            try {

                const parsed =
                    new URL(url);


                /*
                |--------------------------------------------------------------------------
                | youtube.com/watch?v=xxxxx
                |--------------------------------------------------------------------------
                */

                if (
                    parsed.hostname.includes('youtube.com')
                ) {

                    const videoId =
                        parsed.searchParams.get('v');

                    if (videoId) {
                        return videoId;
                    }

                }


                /*
                |--------------------------------------------------------------------------
                | youtu.be/xxxxx
                |--------------------------------------------------------------------------
                */

                if (
                    parsed.hostname.includes('youtu.be')
                ) {

                    return parsed.pathname
                        .replace('/', '')
                        .split('/')[0];

                }


                /*
                |--------------------------------------------------------------------------
                | youtube.com/embed/xxxxx
                |--------------------------------------------------------------------------
                */

                if (
                    parsed.pathname.includes('/embed/')
                ) {

                    return parsed.pathname
                        .split('/embed/')[1]
                        .split('/')[0];

                }


                /*
                |--------------------------------------------------------------------------
                | youtube.com/shorts/xxxxx
                |--------------------------------------------------------------------------
                */

                if (
                    parsed.pathname.includes('/shorts/')
                ) {

                    return parsed.pathname
                        .split('/shorts/')[1]
                        .split('/')[0];

                }

            } catch (error) {

                return null;

            }


            return null;

        }


        function updateVideoPreview() {

            if (!videoInput) {
                return;
            }


            const url =
                videoInput.value.trim();


            const youtubeId =
                getYoutubeId(url);


            if (
                youtubeId &&
                videoPreview &&
                videoFrame
            ) {

                videoFrame.src =
                    'https://www.youtube.com/embed/' +
                    youtubeId;


                videoPreview.classList.remove(
                    'd-none'
                );

            } else {

                if (videoPreview) {

                    videoPreview.classList.add(
                        'd-none'
                    );

                }

                if (videoFrame) {

                    videoFrame.src = '';

                }

            }

        }


        if (videoInput) {

            videoInput.addEventListener(
                'input',
                updateVideoPreview
            );


            /*
            |--------------------------------------------------------------------------
            | Preview video lama saat halaman edit dibuka
            |--------------------------------------------------------------------------
            */

            updateVideoPreview();

        }

    });
</script>

@endpush
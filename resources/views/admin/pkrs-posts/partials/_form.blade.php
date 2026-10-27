{{-- ===================== INFORMASI POST ===================== --}}
<div class="modern-card">

    <div class="card-header-modern">
        <h4>
            <i class="bi bi-file-earmark-text-fill me-2"></i>
            Informasi Post
        </h4>

        <p>
            Lengkapi informasi dasar post PKRS.
        </p>
    </div>

    <div class="card-body-modern">

        <div class="row">

            {{-- Judul --}}
            <div class="col-lg-8 mb-3">

                <label class="form-label">
                    Judul
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="Masukkan judul post...">

                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            {{-- Kategori --}}
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
                        @selected(old('pkrs_category_id')==$category->id)>

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

            {{-- Slug --}}
            <div class="col-12 mb-3">

                <label class="form-label">
                    Slug
                </label>

                <input
                    type="text"
                    id="slug"
                    name="slug"
                    value="{{ old('slug') }}"
                    class="form-control @error('slug') is-invalid @enderror"
                    placeholder="slug-akan-otomatis-dibuat">

                <small class="text-muted">
                    Slug dibuat otomatis berdasarkan judul.
                </small>

                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            {{-- Ringkasan --}}
            <div class="col-12">

                <label class="form-label">
                    Ringkasan
                    <span class="required">*</span>
                </label>

                <textarea
                    name="excerpt"
                    rows="4"
                    class="form-control @error('excerpt') is-invalid @enderror"
                    placeholder="Tuliskan ringkasan singkat...">{{ old('excerpt') }}</textarea>

                @error('excerpt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

        </div>

    </div>

</div>

{{-- ===================== ISI ARTIKEL ===================== --}}

<div class="modern-card">

    <div class="card-header-modern">

        <h4>
            <i class="bi bi-journal-richtext me-2"></i>
            Isi Artikel
        </h4>

        <p>
            Tulis isi artikel edukasi kesehatan.
        </p>

    </div>

    <div class="card-body-modern">

        <textarea
            id="content"
            name="content"
            rows="15"
            class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>

        @error('content')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
        @enderror

    </div>

</div>

{{-- ===================== MEDIA ===================== --}}

<div class="modern-card">

    <div class="card-header-modern">

        <h4>
            <i class="bi bi-image-fill me-2"></i>
            Media
        </h4>

        <p>
            Upload thumbnail dan pilih jenis post.
        </p>

    </div>

    <div class="card-body-modern">

        <div class="row">

            {{-- Thumbnail --}}
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
                        Upload Thumbnail
                    </h5>

                    <small class="text-muted">
                        JPG, PNG, WEBP maksimal 2 MB
                    </small>

                </label>

                <div class="thumbnail-preview">

                    <img
                        id="previewImage"
                        src=""
                        alt="Preview Thumbnail">

                </div>

                @error('thumbnail')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror

            </div>

            {{-- Jenis Post --}}
            <div class="col-lg-6">

                <div class="col-lg-6">

                    <label for="type" class="form-label">
                        Jenis Post
                        <span class="required">*</span>
                    </label>

                    <select
                        id="type"
                        name="type"
                        class="form-select @error('type') is-invalid @enderror">

                        <option value="image" @selected(old('type', 'image' )==='image' )>
                            Artikel
                        </option>

                        <option value="gallery" @selected(old('type')==='gallery' )>
                            Gallery
                        </option>

                        <option value="video" @selected(old('type')==='video' )>
                            Video
                        </option>

                    </select>

                    @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            {{-- ===================== VIDEO ===================== --}}

            <!-- <div
                id="video-section"
                class="col-12 mt-4 {{ old('type') == 'video' ? '' : 'd-none' }}">

                <div class="card border-0 bg-light rounded-4">

                    <div class="card-body">

                        <h5 class="fw-bold mb-3">

                            <i class="bi bi-camera-video-fill me-2"></i>

                            Informasi Video

                        </h5>

                        <div class="mb-3">

                            <label class="form-label">

                                URL Video Youtube

                            </label>

                            <input
                                type="url"
                                id="video"
                                name="video"
                                value="{{ old('video') }}"
                                class="form-control @error('video') is-invalid @enderror"
                                placeholder="https://www.youtube.com/watch?v=xxxx">

                            @error('video')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Cover Video

                            </label>

                            <input
                                type="file"
                                id="video_cover"
                                name="video_cover"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="form-control @error('video_cover') is-invalid @enderror">

                            @error('video_cover')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div
                            id="video-preview"
                            class="mt-3 d-none">

                            <iframe
                                width="100%"
                                height="360"
                                frameborder="0"
                                allowfullscreen>
                            </iframe>

                        </div>

                    </div>

                </div>

            </div> -->

        </div>

    </div>

</div>

{{-- ===================== PUBLIKASI ===================== --}}

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

            <div class="col-lg-4">

                <div class="form-check form-switch mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="featured"
                        name="featured"
                        value="1"
                        @checked(old('featured'))>

                    <label
                        class="form-check-label ms-2"
                        for="featured">

                        Featured Post

                    </label>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="form-check form-switch mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="is_published"
                        name="is_published"
                        value="1"
                        @checked(old('is_published'))>

                    <label
                        class="form-check-label ms-2"
                        for="is_published">

                        Publish Sekarang

                    </label>

                </div>

            </div>

            <div class="col-lg-4">

                <label class="form-label">

                    Publish At

                </label>

                <input
                    type="datetime-local"
                    name="published_at"
                    value="{{ old('published_at') }}"
                    class="form-control">

            </div>

        </div>

    </div>

</div>

{{-- ===================== ACTION ===================== --}}

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

            Simpan Post

        </button>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        /* =========================================================
           ELEMENT
        ========================================================= */

        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        const typeSelect = document.getElementById('type');
        const videoSection = document.getElementById('video-section');

        const videoInput = document.getElementById('video');
        const preview = document.getElementById('video-preview');
        const iframe = preview ?
            preview.querySelector('iframe') :
            null;

        const thumbnailInput =
            document.getElementById('thumbnail');

        const previewImage =
            document.getElementById('previewImage');

        const thumbnailPreview =
            document.querySelector('.thumbnail-preview');


        /* =========================================================
           SLUG
        ========================================================= */

        let slugManuallyEdited = false;


        /**
         * Generate slug dari text
         */
        function generateSlug(text) {

            return text
                .toString()
                .toLowerCase()
                .trim()

                // Hilangkan karakter khusus
                .replace(/[^\w\s-]/g, '')

                // Spasi menjadi -
                .replace(/\s+/g, '-')

                // Gabungan --- menjadi -
                .replace(/-+/g, '-');
        }


        /**
         * Judul -> Slug
         */
        if (titleInput && slugInput) {

            titleInput.addEventListener('input', function() {

                /*
                 * Jangan timpa slug jika user sudah
                 * mengubah slug secara manual.
                 */
                if (slugManuallyEdited) {
                    return;
                }

                slugInput.value =
                    generateSlug(this.value);

            });


            /**
             * Deteksi jika slug diedit manual
             */
            slugInput.addEventListener('input', function() {

                const generatedSlug =
                    generateSlug(titleInput.value);

                /*
                 * Jika isi slug berbeda dari hasil
                 * otomatis, berarti user mengedit manual.
                 */
                if (this.value !== generatedSlug) {

                    slugManuallyEdited = true;

                }

            });

        }


        /* =========================================================
           TOGGLE VIDEO SECTION
        ========================================================= */

        function toggleVideoSection() {

            if (!typeSelect || !videoSection) {
                return;
            }


            if (typeSelect.value === 'video') {

                videoSection.classList.remove('d-none');

            } else {

                videoSection.classList.add('d-none');


                if (iframe) {
                    iframe.src = '';
                }


                if (preview) {
                    preview.classList.add('d-none');
                }

            }

        }


        /* =========================================================
           THUMBNAIL PREVIEW
        ========================================================= */

        if (thumbnailInput) {

            thumbnailInput.addEventListener('change', function() {

                if (!this.files.length) {
                    return;
                }


                const file = this.files[0];


                if (previewImage) {

                    previewImage.src =
                        URL.createObjectURL(file);

                }


                if (thumbnailPreview) {

                    thumbnailPreview.style.display =
                        'block';

                }

            });

        }


        /* =========================================================
           YOUTUBE ID
        ========================================================= */

        function getYoutubeId(url) {

            if (!url) {
                return null;
            }


            try {

                const parsed = new URL(url);


                /*
                 * youtu.be/xxxxx
                 */
                if (
                    parsed.hostname.includes('youtu.be')
                ) {

                    return parsed.pathname
                        .replace(/^\/+/, '')
                        .split('/')[0];

                }


                /*
                 * youtube.com/watch?v=xxxxx
                 */
                if (parsed.searchParams.get('v')) {

                    return parsed.searchParams.get('v');

                }


                /*
                 * youtube.com/embed/xxxxx
                 */
                if (
                    parsed.pathname.includes('/embed/')
                ) {

                    return parsed.pathname
                        .split('/embed/')[1]
                        .split('/')[0];

                }


                /*
                 * youtube.com/shorts/xxxxx
                 */
                if (
                    parsed.pathname.includes('/shorts/')
                ) {

                    return parsed.pathname
                        .split('/shorts/')[1]
                        .split('/')[0];

                }

            } catch (e) {

                return null;

            }


            return null;

        }


        /* =========================================================
           YOUTUBE PREVIEW
        ========================================================= */

        function renderYoutube() {

            if (!videoInput) {
                return;
            }


            const id =
                getYoutubeId(
                    videoInput.value.trim()
                );


            /*
             * URL tidak valid / kosong
             */
            if (!id) {

                if (preview) {

                    preview.classList.add('d-none');

                }


                if (iframe) {

                    iframe.src = '';

                }


                return;

            }


            /*
             * URL valid
             */
            if (preview) {

                preview.classList.remove('d-none');

            }


            if (iframe) {

                iframe.src =
                    'https://www.youtube.com/embed/' + id;

            }

        }


        /* =========================================================
           EVENT
        ========================================================= */

        if (videoInput) {

            videoInput.addEventListener(
                'input',
                renderYoutube
            );

        }


        if (typeSelect) {

            typeSelect.addEventListener(
                'change',
                toggleVideoSection
            );

        }


        /* =========================================================
           INITIAL LOAD
        ========================================================= */

        toggleVideoSection();

        renderYoutube();

    });
</script>
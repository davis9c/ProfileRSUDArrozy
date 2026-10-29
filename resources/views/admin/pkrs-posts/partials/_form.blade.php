@php
    $post = $post ?? null;
    $currentType = old('type', $post->type ?? 'image');
    $currentThumbnail = $post?->thumbnail_url;
    $currentVideo = $post?->video_url;
    $currentVideoCover = $post?->video_cover_url;
@endphp

{{-- ===================== INFORMASI POST ===================== --}}
<div class="admin-card p-6 space-y-5">

    <p class="text-white/60 text-sm font-medium">Informasi Post</p>

    <div>
        <label class="form-label" for="title">
            Judul <span class="text-red-400">*</span>
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $post->title ?? '') }}"
            class="form-input"
            placeholder="Masukkan judul post..."
            required>

        @error('title')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid md:grid-cols-2 gap-5">

        <div>
            <label class="form-label" for="pkrs_category_id">
                Kategori <span class="text-red-400">*</span>
            </label>

            <select
                id="pkrs_category_id"
                name="pkrs_category_id"
                class="form-input"
                required>

                <option value="">-- Pilih Kategori --</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('pkrs_category_id', $post->pkrs_category_id ?? null) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            @error('pkrs_category_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="form-label" for="type">
                Jenis Post <span class="text-red-400">*</span>
            </label>

            <select
                id="type"
                name="type"
                class="form-input"
                required>

                <option value="image" @selected($currentType === 'image')>Artikel</option>
                <option value="gallery" @selected($currentType === 'gallery')>Gallery</option>
                <option value="video" @selected($currentType === 'video')>Video</option>

            </select>

            @error('type')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div>
        <label class="form-label" for="excerpt">Ringkasan</label>

        <textarea
            id="excerpt"
            name="excerpt"
            rows="3"
            class="form-input"
            placeholder="Kosongkan untuk digenerate otomatis dari konten">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>

        <p class="text-xs text-white/50 mt-1">
            Opsional. Jika kosong, ringkasan dibuat otomatis dari isi artikel.
        </p>

        @error('excerpt')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>

{{-- ===================== ISI ARTIKEL ===================== --}}
<div class="admin-card p-6 space-y-5">

    <p class="text-white/60 text-sm font-medium">
        Isi Artikel <span class="text-red-400">*</span>
    </p>

    <style>
        #editor {
            height: 320px;
            background: #fff;
        }

        #editor .ql-editor {
            color: #000;
        }

        #editor .ql-editor p,
        #editor .ql-editor h1,
        #editor .ql-editor h2,
        #editor .ql-editor h3,
        #editor .ql-editor h4,
        #editor .ql-editor h5,
        #editor .ql-editor h6,
        #editor .ql-editor li,
        #editor .ql-editor span {
            color: #000;
        }
    </style>

    <div id="editor"></div>

    <textarea
        name="content"
        id="content-input"
        class="hidden">{{ old('content', $post->content ?? '') }}</textarea>

    @error('content')
        <p class="text-red-400 text-sm">{{ $message }}</p>
    @enderror

</div>

{{-- ===================== MEDIA ===================== --}}
<div class="admin-card p-6 space-y-5">

    <p class="text-white/60 text-sm font-medium">Media</p>

    <div class="grid md:grid-cols-2 gap-5">

        <div>
            <label class="form-label" for="thumbnail">
                Thumbnail <span class="text-red-400">*</span>
            </label>

            <input
                type="file"
                id="thumbnail"
                name="thumbnail"
                accept="image/jpeg,image/png,image/webp"
                class="form-input"
                data-max-size="20480"
                {{ $post ? '' : 'required' }}>

            <p class="text-xs text-white/50 mt-1">JPG, PNG, WEBP maksimal 20 MB.</p>

            <p id="thumbnail-error" class="hidden text-sm text-red-400 mt-2" role="alert"></p>

            @error('thumbnail')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror

            <img
                id="thumbnail-preview"
                src="{{ $currentThumbnail ?? '' }}"
                alt="Preview thumbnail"
                class="{{ $currentThumbnail ? '' : 'hidden' }} mt-3 w-full max-h-64 object-cover rounded-xl border border-white/10">
        </div>

        <div id="video-fields" class="space-y-4 {{ $currentType === 'video' ? '' : 'hidden' }}">

            <div>
                <label class="form-label" for="video">
                    File Video <span class="text-red-400">*</span>
                </label>

                <input
                    type="file"
                    id="video"
                    name="video"
                    accept="video/mp4,video/webm,video/ogg,video/quicktime"
                    class="form-input"
                    data-max-size="51200"
                    data-existing-video="{{ $currentVideo ? '1' : '0' }}"
                    @if($currentType === 'video' && ! $currentVideo) required @endif>

                <p class="text-xs text-white/50 mt-1">MP4, WEBM, OGG, MOV maksimal 50 MB.</p>

                <p id="video-error" class="hidden text-sm text-red-400 mt-2" role="alert"></p>

                @error('video')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                <video id="video-preview" controls class="hidden mt-3 w-full max-h-56 rounded-lg bg-black"></video>
            </div>

            @if ($currentVideo)
                <div class="rounded-lg border border-white/10 p-3 space-y-2">
                    <p class="text-xs text-white/50">Video saat ini</p>

                    <video controls preload="metadata" class="w-full max-h-56 rounded-lg bg-black">
                        <source src="{{ $currentVideo }}">
                    </video>

                    <p class="text-xs text-white/40">Biarkan kosong jika tidak ingin mengganti video.</p>
                </div>
            @endif

            <div>
                <label class="form-label" for="video_cover">Cover Video</label>

                <input
                    type="file"
                    id="video_cover"
                    name="video_cover"
                    accept="image/jpeg,image/png,image/webp"
                    class="form-input"
                    data-max-size="20480">

                <p class="text-xs text-white/50 mt-1">Opsional. JPG, PNG, WEBP maksimal 20 MB.</p>

                <p id="video-cover-error" class="hidden text-sm text-red-400 mt-2" role="alert"></p>

                @error('video_cover')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                <img
                    id="video-cover-preview"
                    src="{{ $currentVideoCover ?? '' }}"
                    alt="Preview cover video"
                    class="{{ $currentVideoCover ? '' : 'hidden' }} mt-3 w-full max-h-48 object-cover rounded-xl border border-white/10">
            </div>

        </div>

        <div id="video-hint" class="{{ $currentType === 'video' ? 'hidden' : '' }} text-sm text-white/40">
            Pilih jenis post Video untuk mengaktifkan upload video dan cover.
        </div>

    </div>

    <p id="gallery-hint" class="hidden text-sm text-white/50">
        Post bertipe Gallery akan diarahkan ke halaman kelola gallery setelah disimpan.
    </p>

</div>

{{-- ===================== PUBLIKASI ===================== --}}
<div class="admin-card p-6 space-y-5">

    <p class="text-white/60 text-sm font-medium">Publikasi</p>

    <div class="grid md:grid-cols-2 gap-5">

        <label class="flex items-center gap-3">
            <input
                type="checkbox"
                name="featured"
                value="1"
                class="w-4 h-4"
                @checked(old('featured', $post->featured ?? false))>

            <span class="text-white/80 text-sm">Jadikan post utama (featured)</span>
        </label>

        <label class="flex items-center gap-3">
            <input
                type="checkbox"
                name="is_published"
                value="1"
                class="w-4 h-4"
                @checked(old('is_published', $post->is_published ?? false))>

            <span class="text-white/80 text-sm">Publish sekarang</span>
        </label>

    </div>

    <div>
        <label class="form-label" for="published_at">Tanggal Publikasi</label>

        <input
            type="datetime-local"
            id="published_at"
            name="published_at"
            value="{{ old('published_at', $post && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
            class="form-input">

        <p class="text-xs text-white/50 mt-1">
            Jika publish sekarang dicentang dan tanggal kosong, tanggal akan diisi otomatis.
        </p>

        @error('published_at')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>

{{-- ===================== ACTION ===================== --}}
<div class="flex justify-end gap-3">

    <a href="{{ route('admin.pkrs-posts.index') }}"
        class="px-5 py-2.5 rounded-lg text-white/70 border border-white/20 text-sm">
        Batal
    </a>

    <button type="submit"
        class="btn-primary text-white px-6 py-2.5 rounded-lg font-semibold text-sm">
        Simpan Post
    </button>

</div>

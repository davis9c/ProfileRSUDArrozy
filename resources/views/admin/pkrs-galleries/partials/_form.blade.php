@php
    $gallery = $gallery ?? null;

    $currentImage = $gallery?->image_url;
@endphp

<div class="admin-card p-6 space-y-5">

    <p class="text-white/60 text-sm font-medium">Detail Gallery</p>

    <div class="flex items-center gap-4 rounded-xl border border-white/10 p-4">
        <img
            src="{{ $post->thumbnail_url ?? asset('img/news/clinical-news1.jpg') }}"
            alt="{{ $post->title }}"
            class="w-16 h-16 rounded-lg object-cover">

        <div class="min-w-0">
            <p class="text-white font-medium truncate">{{ $post->title }}</p>
            <p class="text-xs text-white/50">
                {{ $post->galleries()->count() }} gambar terdaftar di gallery.
            </p>
        </div>
    </div>

    <div>
        <label class="form-label" for="image">
            Gambar Gallery @if (! $gallery)<span class="text-red-400">*</span>@endif
        </label>

        @if ($currentImage)
            <div class="mb-3">
                <p class="text-xs text-white/50 mb-2">Gambar saat ini</p>
                <img src="{{ $currentImage }}" alt="Gallery"
                    class="w-full max-h-72 object-cover rounded-xl border border-white/10">
            </div>
        @endif

        <input
            type="file"
            id="image"
            name="image"
            accept="image/jpeg,image/png,image/webp"
            class="form-input"
            data-max-size="20480"
            {{ $gallery ? '' : 'required' }}>

        <p class="text-xs text-white/50 mt-1">
            JPG, JPEG, PNG, atau WEBP maksimal 20 MB.
            @if ($gallery) Kosongkan jika tidak ingin mengganti gambar. @endif
        </p>

        <p id="image-error" class="hidden text-sm text-red-400 mt-2" role="alert"></p>

        @error('image')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror

        <img id="image-preview" src="" alt="Preview gallery"
            class="hidden mt-3 w-full max-h-72 object-cover rounded-xl border border-white/10">
    </div>

    <div>
        <label class="form-label" for="sort_order">Urutan Gallery</label>

        <input
            type="number"
            id="sort_order"
            name="sort_order"
            min="0"
            value="{{ old('sort_order', $gallery?->sort_order ?? (($post->galleries()->max('sort_order') ?? 0) + 1)) }}"
            class="form-input">

        <p class="text-xs text-white/50 mt-1">
            Semakin kecil angka, semakin awal gambar ditampilkan.
        </p>

        @error('sort_order')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('admin.pkrs-posts.galleries.index', ['post' => $post->id]) }}"
        class="px-5 py-2.5 rounded-lg text-white/70 border border-white/20 text-sm">
        Batal
    </a>

    <button type="submit"
        class="btn-primary text-white px-6 py-2.5 rounded-lg font-semibold text-sm">
        {{ $gallery ? 'Update Gallery' : 'Simpan Gallery' }}
    </button>
</div>

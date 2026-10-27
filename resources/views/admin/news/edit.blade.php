@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data" class="space-y-6"
    x-data="newsImageForm()">
    @csrf
    @method('PUT')

    <div class="admin-card p-6 space-y-5">
        <div>
            <label class="form-label">Judul Berita</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-input" required>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="form-label">Kategori</label>
                <input type="text" name="category" value="{{ old('category', $news->category) }}" class="form-input"
                    required>
            </div>
            <div>
                <label class="form-label">Penulis</label>
                <input type="text" name="author" value="{{ old('author', $news->author) }}" class="form-input"
                    required>
            </div>
        </div>

        <div>
            <label class="form-label">Ringkasan (Excerpt)</label>
            <textarea name="excerpt" rows="2" class="form-input">{{ old('excerpt', $news->excerpt) }}</textarea>
        </div>

        <style>
            #editor {
                height: 180px;
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
        <div>
            <label class="form-label">Konten Berita</label>

            <div id="editor"></div>

            <textarea name="content" id="content-input" class="hidden">
            {{ old('content', $news->content) }}
            </textarea>
        </div>
    </div>

    <div class="admin-card p-6 space-y-5">
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="form-label">Status</label>
                <select name="status" class="form-input" required>
                    <option value="draft" {{ old('status', $news->status) === 'draft' ? 'selected' : '' }}>Draft
                    </option>
                    <option value="published" {{ old('status', $news->status) === 'published' ? 'selected' : '' }}>
                        Published</option>
                </select>
            </div>
            <div>
                <label class="form-label">Tanggal Publikasi</label>
                <input type="datetime-local" name="published_at"
                    value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}" class="form-input">
            </div>
        </div>

        <div class="flex items-center gap-3">
            <input type="checkbox" name="featured" id="featured" value="1"
                {{ old('featured', $news->featured) ? 'checked' : '' }} class="w-4 h-4">
            <label for="featured" class="text-white/80 text-sm">Jadikan berita utama (featured)</label>
        </div>

        <div>
            <label class="form-label">Thumbnail Saat Ini</label>
            @if ($news->thumbnail_url)
            <img src="{{ $news->thumbnail_url }}" class="w-32 h-32 rounded-lg object-cover mb-3">
            @endif
            <input type="file" name="thumbnail" accept="image/*" class="form-input">
            <p class="text-xs text-white/40 mt-1">Kosongkan jika tidak ingin mengganti thumbnail.</p>
        </div>
    </div>

    <!-- FOTO TAMBAHAN EXISTING -->
    <div class="admin-card p-6 space-y-4">
        <label class="form-label mb-0">Foto Tambahan Saat Ini</label>

        @forelse ($news->images as $image)
        <div class="flex items-center gap-4 p-3 rounded-lg border border-white/10">
            <img src="{{ $image->image_url }}" class="w-16 h-16 rounded-lg object-cover">
            <p class="text-white/70 text-sm flex-1">{{ $image->caption ?? '(tanpa caption)' }}</p>
            <button type="button"
                class="text-red-400 text-xs border border-red-500/30 px-3 py-1.5 rounded-lg hover:bg-red-500/10"
                onclick="deleteImage({{ $image->id }})">
                Hapus
            </button>
        </div>
        @empty
        <p class="text-xs text-white/40">Belum ada foto tambahan.</p>
        @endforelse
    </div>

    <!-- TAMBAH FOTO BARU -->
    <div class="admin-card p-6 space-y-4">
        <div class="flex items-center justify-between">
            <label class="form-label mb-0">Tambah Foto Baru</label>
            <button type="button" @click="addRow()"
                class="text-sm text-white/70 border border-white/20 px-3 py-1.5 rounded-lg hover:bg-white/10">
                + Tambah Foto
            </button>
        </div>

        <!-- <div x-text="JSON.stringify(rows)"></div> -->

        <template x-for="(row, index) in rows" :key="row.id">
            <div class="grid md:grid-cols-2 gap-4 p-4 rounded-lg border border-white/10">
                <div>
                    <label class="form-label">File Gambar</label>
                    <input type="file" :name="'images[' + index + ']'" accept="image/*" class="form-input">
                </div>
                <div class="flex gap-3">
                    <div class="flex-1">
                        <label class="form-label">Caption (opsional)</label>
                        <input type="text" :name="'image_captions[' + index + ']'" class="form-input">
                    </div>
                    <button type="button" @click="removeRow(index)" class="self-end mb-1 text-red-400 text-sm px-3">
                        Hapus
                    </button>
                </div>
            </div>
        </template>
    </div>

    <div class="admin-card p-6 space-y-5">
        <p class="text-white/60 text-sm font-medium">SEO (opsional)</p>
        <div>
            <label class="form-label">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $news->meta_title) }}"
                class="form-input">
        </div>
        <div>
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description" rows="2" class="form-input">{{ old('meta_description', $news->meta_description) }}</textarea>
        </div>
        <div>
            <label class="form-label">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $news->meta_keywords) }}"
                class="form-input">
        </div>
    </div>

    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.news.index') }}"
            class="px-5 py-2.5 rounded-lg text-white/70 border border-white/20 text-sm">
            Batal
        </a>
        <button type="submit" class="btn-primary text-white px-6 py-2.5 rounded-lg font-semibold text-sm">
            Update Berita
        </button>
    </div>
</form>
@endsection
<form id="delete-image-form" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.6/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.6/dist/quill.js"></script>
<script>
    function newsImageForm() {
        return {
            rows: [],
            addRow() {
                this.rows.push({
                    id: Date.now()
                });
            },
            removeRow(index) {
                this.rows.splice(index, 1);
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        const hiddenInput = document.getElementById('content-input');

        quill.root.innerHTML = hiddenInput.value;

        quill.on('text-change', function() {
            hiddenInput.value = quill.root.innerHTML;
        });

        document.querySelector('form').addEventListener('submit', function() {
            hiddenInput.value = quill.root.innerHTML;
        });
    });
</script>
@endpush
@push('scripts')
<script>
    function deleteImage(id) {
        if (!confirm('Hapus foto ini?')) return;

        const form = document.getElementById('delete-image-form');
        form.action = `/admin/news/image/${id}`;
        form.submit();
    }
</script>
@endpush
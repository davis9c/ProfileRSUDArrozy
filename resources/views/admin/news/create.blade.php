@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="space-y-6"
        x-data="newsImageForm()">

        @if ($errors->any())
            <div
                class="rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-red-300"
                role="alert"
            >
                <p class="font-semibold mb-2">
                    Berita belum dapat disimpan.
                </p>

                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf

        <div class="admin-card p-6 space-y-5">
            <div>
                <label class="form-label">Judul Berita</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-input" required>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="form-label">Kategori</label>
                    <input type="text" name="category" value="{{ old('category') }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Penulis</label>
                    <input type="text" name="author" value="{{ old('author', auth()->user()->name) }}"
                        class="form-input" required>
                </div>
            </div>

            <div>
                <label class="form-label">Ringkasan (Excerpt)</label>
                <textarea name="excerpt" rows="2" class="form-input"
                    placeholder="Kosongkan untuk digenerate otomatis dari konten">{{ old('excerpt') }}</textarea>
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

                <textarea name="content" id="content-input" class="hidden">{{ old('content') }}
                </textarea>
            </div>


        </div>

        <div class="admin-card p-6 space-y-5">
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="form-label">Status</label>
                    <select name="status" class="form-input" required>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Tanggal Publikasi</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="form-input">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                    class="w-4 h-4">
                <label for="featured" class="text-white/80 text-sm">Jadikan berita utama (featured)</label>
            </div>

            
            <div>
                <label class="form-label">Thumbnail</label>
                <input
                    type="file"
                    name="thumbnail"
                    accept="image/*"
                    class="form-input"
                    data-max-size="20000"
                    required
                >

                <p class="text-xs text-white/50 mt-1">
                    Maksimal ukuran foto 20 MB.
                </p>

                <p
                    data-file-error="thumbnail"
                    class="hidden text-sm text-red-400 mt-2"
                    role="alert"
                ></p>
            </div>
        </div>

        <!-- FOTO TAMBAHAN DI DALAM ARTIKEL -->
        <div class="admin-card p-6 space-y-4">
            <div class="flex items-center justify-between">
                <label class="form-label mb-0">Foto Tambahan (disisip di dalam artikel)</label>
                <button type="button" @click="addRow()"
                    class="text-sm text-white/70 border border-white/20 px-3 py-1.5 rounded-lg hover:bg-white/10">
                    + Tambah Foto
                </button>
            </div>

            <template x-for="(row, index) in rows" :key="row.id">
                <div class="grid md:grid-cols-2 gap-4 p-4 rounded-lg border border-white/10">
                    <div>
                        <label class="form-label">File Gambar</label>
                        
                        <input
                            type="file"
                            :name="'images[' + index + ']'"
                            accept="image/*"
                            class="form-input"
                            data-max-size="20000"
                        >

                        <p
                            class="hidden text-sm text-red-400 mt-2"
                            data-file-error
                            role="alert"
                        ></p>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-1">
                            <label class="form-label">Caption (opsional)</label>
                            <input type="text" :name="'image_captions[' + index + ']'" class="form-input"
                                placeholder="Keterangan foto">
                        </div>
                        <button type="button" @click="removeRow(index)" class="self-end mb-1 text-red-400 text-sm px-3">
                            Hapus
                        </button>
                    </div>
                </div>
            </template>

            <p class="text-xs text-white/40" x-show="rows.length === 0">Belum ada foto tambahan. Foto akan otomatis disebar
                di antara paragraf artikel.</p>
        </div>

        <div class="admin-card p-6 space-y-5">
            <p class="text-white/60 text-sm font-medium">SEO (opsional)</p>
            <div>
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-input">
            </div>
            <div>
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" rows="2" class="form-input">{{ old('meta_description') }}</textarea>
            </div>
            <div>
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="form-input"
                    placeholder="pisahkan dengan koma">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.news.index') }}"
                class="px-5 py-2.5 rounded-lg text-white/70 border border-white/20 text-sm">
                Batal
            </a>
            <button type="submit" class="btn-primary text-white px-6 py-2.5 rounded-lg font-semibold text-sm">
                Simpan Berita
            </button>
        </div>
    </form>
@endsection

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


        document.addEventListener('change', function (event) {
            const input = event.target;

            if (!(input instanceof HTMLInputElement) || input.type !== 'file') {
                return;
            }

            const container = input.parentElement;
            const errorElement = container.querySelector('[data-file-error]');

            if (!errorElement) return;

            const file = input.files[0];
            const maxSize = Number(input.dataset.maxSize || 20000) * 1024;

            errorElement.textContent = '';
            errorElement.classList.add('hidden');

            if (!file) return;

            if (file.size > maxSize) {
                errorElement.textContent =
                    'Ukuran foto terlalu besar! Maksimal 20 MB. Silakan pilih foto lain.';

                errorElement.classList.remove('hidden');

                input.value = '';
            }
        });

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

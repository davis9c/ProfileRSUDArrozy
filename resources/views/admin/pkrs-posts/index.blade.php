@extends('admin.layouts.app')

@section('title', 'Post PKRS')

@section('content')

<style>
    .pkrs-preview-content p {
        margin-bottom: .75rem;
    }

    .pkrs-preview-content h1,
    .pkrs-preview-content h2,
    .pkrs-preview-content h3,
    .pkrs-preview-content h4 {
        color: #fff;
        font-weight: 700;
        margin: 1rem 0 .5rem;
    }

    .pkrs-preview-content ul,
    .pkrs-preview-content ol {
        margin: 0 0 .75rem 1.25rem;
    }

    .pkrs-preview-content ul {
        list-style: disc;
    }

    .pkrs-preview-content ol {
        list-style: decimal;
    }

    .pkrs-preview-content a {
        color: #818cf8;
        text-decoration: underline;
    }
</style>

<div x-data="pkrsPostIndex()">

    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="text-white/50 text-sm">Kelola semua post PKRS, termasuk draft.</p>
        </div>

        <a href="{{ route('admin.pkrs-posts.create') }}"
            class="btn-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm">
            + Tambah Post
        </a>
    </div>

    <form method="GET" class="flex flex-wrap gap-3 mb-6">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul post..."
            class="form-input max-w-xs">

        <select name="type" class="form-input max-w-[180px]">
            <option value="">Semua Tipe</option>
            <option value="image" @selected(request('type') === 'image')>Artikel</option>
            <option value="gallery" @selected(request('type') === 'gallery')>Gallery</option>
            <option value="video" @selected(request('type') === 'video')>Video</option>
        </select>

        <select name="status" class="form-input max-w-[170px]">
            <option value="">Semua Status</option>
            <option value="published" @selected(request('status') === 'published')>Tayang</option>
            <option value="draft" @selected(request('status') === 'draft')>Draft</option>
        </select>

        <button type="submit" class="px-5 py-2.5 rounded-lg text-white/80 border border-white/20 text-sm">
            Filter
        </button>

        @if (request()->filled('search') || request()->filled('type') || request()->filled('status'))
            <a href="{{ route('admin.pkrs-posts.index') }}"
                class="px-5 py-2.5 rounded-lg text-white/60 border border-white/10 text-sm">
                Reset
            </a>
        @endif
    </form>

    <div class="table-container overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="table-header">
                <tr class="text-white/60 text-left">
                    <th class="px-5 py-3">Thumbnail</th>
                    <th class="px-5 py-3">Judul</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Tipe</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3">Dilihat</th>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10">
                @forelse ($posts as $post)
                    <tr class="text-white/80">
                        <td class="px-5 py-3">
                            <img src="{{ $post->thumbnail_url ?? asset('img/news/clinical-news1.jpg') }}"
                                alt="{{ $post->title }}"
                                class="w-14 h-14 rounded-lg object-cover">
                        </td>

                        <td class="px-5 py-3 max-w-xs">
                            <p class="font-medium text-white line-clamp-1">{{ $post->title }}</p>
                            <p class="text-xs text-white/40 line-clamp-1">{{ $post->excerpt }}</p>
                        </td>

                        <td class="px-5 py-3">{{ $post->category?->name ?? '-' }}</td>

                        <td class="px-5 py-3">
                            @if ($post->type === 'gallery')
                                <span class="px-2.5 py-1 rounded-full text-xs bg-green-500/20 text-green-400">Gallery</span>
                            @elseif ($post->type === 'video')
                                <span class="px-2.5 py-1 rounded-full text-xs bg-red-500/20 text-red-400">Video</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs bg-indigo-500/20 text-indigo-300">Artikel</span>
                            @endif
                        </td>

                        <td class="px-5 py-3">
                            @if ($post->is_published)
                                <span class="px-2.5 py-1 rounded-full text-xs bg-green-500/20 text-green-400">Tayang</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs bg-yellow-500/20 text-yellow-400">Draft</span>
                            @endif

                            <form method="POST"
                                action="{{ route('admin.pkrs-posts.toggle-publish', ['pkrsPost' => $post->id]) }}"
                                class="mt-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-xs text-indigo-300 hover:text-indigo-200">
                                    {{ $post->is_published ? 'Sembunyikan' : 'Tayangkan' }}
                                </button>
                            </form>
                        </td>

                        <td class="px-5 py-3">{{ number_format($post->views ?? 0) }}</td>

                        <td class="px-5 py-3">
                            {{ $post->published_at?->format('d M Y') ?? $post->created_at?->format('d M Y') ?? '-' }}
                        </td>

                        <td class="px-5 py-3 text-right">
                            <div class="flex justify-end gap-2 flex-wrap">
                                <button type="button"
                                    @click="openPreview({{ $post->id }})"
                                    class="px-3 py-1.5 rounded-lg text-xs text-white/80 border border-white/20 hover:bg-white/10">
                                    Preview
                                </button>

                                <a href="{{ route('admin.pkrs-posts.edit', ['pkrs_post' => $post->id]) }}"
                                    class="px-3 py-1.5 rounded-lg text-xs text-white/80 border border-white/20 hover:bg-white/10">
                                    Edit
                                </a>

                                @if ($post->type === 'gallery')
                                    <a href="{{ route('admin.pkrs-posts.galleries.index', ['post' => $post->id]) }}"
                                        class="px-3 py-1.5 rounded-lg text-xs text-white/80 border border-white/20 hover:bg-white/10">
                                        Gallery
                                    </a>
                                @endif

                                <form method="POST"
                                    action="{{ route('admin.pkrs-posts.destroy', ['pkrs_post' => $post->id]) }}"
                                    onsubmit="return confirm('Yakin hapus post ini? Thumbnail, video, cover, dan seluruh gallery akan ikut terhapus.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 rounded-lg text-xs text-red-400 border border-red-500/30 hover:bg-red-500/10">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-5 py-10 text-center text-white/50">
                            Belum ada post PKRS.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    {{-- ===================== PREVIEW MODAL ===================== --}}
    <div
        x-show="previewOpen"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-50 bg-black/70 p-4 overflow-y-auto"
        @click.self="closePreview()">

        <div class="max-w-5xl mx-auto my-8 admin-card overflow-hidden">

            <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
                <h3 class="text-white font-semibold">Preview Post PKRS</h3>

                <button type="button" @click="closePreview()"
                    class="text-white/60 hover:text-white text-2xl leading-none">
                    &times;
                </button>
            </div>

            <div class="p-6">
                <div x-show="loading" class="py-16 text-center text-white/50">
                    Memuat preview...
                </div>

                <div x-show="!loading && preview" class="grid lg:grid-cols-2 gap-6">
                    <div>
                        <img :src="preview && preview.thumbnail ? preview.thumbnail : '{{ asset('img/news/clinical-news1.jpg') }}'"
                            alt="Thumbnail"
                            class="w-full max-h-96 object-cover rounded-xl border border-white/10">

                        <template x-if="preview && preview.video">
                            <video :src="preview.video" controls preload="metadata"
                                class="mt-4 w-full max-h-72 rounded-xl bg-black"></video>
                        </template>

                        <template x-if="preview && preview.galleries && preview.galleries.length">
                            <div class="mt-4 grid grid-cols-3 gap-2">
                                <template x-for="image in preview.galleries" :key="image">
                                    <img :src="image" alt="Gallery"
                                        class="w-full h-24 object-cover rounded-lg border border-white/10">
                                </template>
                            </div>
                        </template>
                    </div>

                    <div>
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            <span class="px-2.5 py-1 rounded-full text-xs bg-indigo-500/20 text-indigo-300"
                                x-text="preview ? preview.type : ''"></span>

                            <span class="px-2.5 py-1 rounded-full text-xs"
                                :class="preview && preview.published ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400'"
                                x-text="preview && preview.published ? 'Tayang' : 'Draft'"></span>

                            <span class="px-2.5 py-1 rounded-full text-xs bg-white/10 text-white/70"
                                x-text="preview && preview.category ? preview.category : 'Tanpa kategori'"></span>

                            <template x-if="preview && preview.featured">
                                <span class="px-2.5 py-1 rounded-full text-xs bg-pink-500/20 text-pink-300">Featured</span>
                            </template>
                        </div>

                        <h2 class="text-2xl font-bold text-white mb-2" x-text="preview ? preview.title : ''"></h2>

                        <p class="text-sm text-white/60 mb-4" x-text="preview && preview.excerpt ? preview.excerpt : ''"></p>

                        <p class="text-xs text-white/40 mb-4">
                            <span x-text="preview && preview.published_at ? 'Publish: ' + preview.published_at : 'Belum dipublikasikan'"></span>
                        </p>

                        <div class="pkrs-preview-content text-sm text-white/70 leading-relaxed"
                            x-html="preview && preview.content ? preview.content : ''"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    function pkrsPostIndex() {
        return {
            previewOpen: false,
            loading: false,
            preview: null,

            async openPreview(id) {
                this.previewOpen = true;
                this.loading = true;
                this.preview = null;

                try {
                    const response = await fetch(
                        '{{ url('/admin/pkrs-posts') }}/' + id,
                        {
                            headers: {
                                'Accept': 'application/json',
                            },
                        }
                    );

                    if (!response.ok) {
                        throw new Error('Gagal memuat preview.');
                    }

                    this.preview = await response.json();
                } catch (error) {
                    this.preview = {
                        title: 'Preview tidak tersedia',
                        excerpt: error.message,
                        content: '',
                    };
                } finally {
                    this.loading = false;
                }
            },

            closePreview() {
                this.previewOpen = false;
                this.preview = null;
            },
        };
    }
</script>
@endpush

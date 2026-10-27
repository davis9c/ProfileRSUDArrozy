@extends('admin.layouts.app')

@section('title','Post PKRS')

@section('content')

<style>
    .pkrs-page {
        /* background: #f6f7fb; */
        min-height: 100vh;
        padding: 30px;
    }

    .pkrs-container {
        max-width: 1280px;
        margin: auto;
    }

    .pkrs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .pkrs-header h3 {
        font-weight: 700;
        color: #ffffff;
    }

    .pkrs-header p {
        color: #6b7280;
    }

    .pkrs-grid {

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 25px;

    }

    .btn-preview {

        background: #f1f5f9;

        color: #334155;

        border: 1px solid #e2e8f0;

        transition: all .25s ease;

    }


    .btn-preview:hover {

        background: #111827;

        color: white;

        border-color: #111827;

        transform: translateY(-2px);

    }

    .pkrs-post-card {

        background: white;

        border-radius: 22px;

        overflow: hidden;

        border: 1px solid #edf0f5;

        box-shadow: 0 10px 25px rgba(0, 0, 0, .06);

        transition: .25s;

    }

    .pkrs-post-card:hover {

        transform: translateY(-5px);

        box-shadow: 0 18px 40px rgba(0, 0, 0, .1);

    }

    .pkrs-image {

        width: 100%;

        aspect-ratio: 4/5;

        background: #eee;

    }

    .pkrs-image img {

        width: 100%;

        height: 100%;

        object-fit: cover;

    }

    .pkrs-body {

        padding: 18px;

    }

    .pkrs-category {

        font-size: 13px;

        color: #6366f1;

        font-weight: 600;

    }

    .pkrs-title {

        font-size: 18px;

        font-weight: 700;

        color: #111827;

        margin-top: 8px;

        line-height: 1.4;

    }

    .pkrs-excerpt {

        color: #6b7280;

        font-size: 14px;

        margin-top: 8px;

    }

    .pkrs-footer {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-top: 15px;

    }

    .pkrs-actions {

        display: flex;

        gap: 8px;

    }

    .action-btn {

        width: 36px;
        height: 36px;

        border-radius: 12px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0;

    }

    @media(max-width:992px) {

        .pkrs-grid {

            grid-template-columns: repeat(2, 1fr);

        }
    }

    @media(max-width:576px) {

        .pkrs-grid {

            grid-template-columns: 1fr;

        }

    }
</style>

<div class="pkrs-page">
    <div class="pkrs-container">

        <!-- HEADER -->
        <div class="pkrs-header">
            <div>
                <h3 class="text-white fw-bold">
                    <i class="bi bi-instagram me-2"></i>
                    Post PKRS
                </h3>
                <p>
                    Kelola konten edukasi kesehatan PKRS.
                </p>
            </div>
            <a href="{{ route('admin.pkrs-posts.create') }}"
                class="btn btn-primary p-2">
                <i class="bi bi-plus-lg"></i>
                Tambah Post
            </a>
        </div>
        <div class="pkrs-grid">
            @forelse($posts as $post)
            <div class="pkrs-post-card">
                <div class="pkrs-image">
                    @if($post->thumbnail)
                    <img src="{{ asset('storage/'.$post->thumbnail) }}"
                        alt="{{ $post->title }}">
                    @else
                    <div class="d-flex h-100 align-items-center justify-content-center">
                        <i class="bi bi-image fs-1 text-muted"></i>
                    </div>
                    @endif
                </div>
                <div class="pkrs-body">
                    <div class="pkrs-category">
                        {{ $post->category?->name ?? 'Tanpa kategori' }}
                    </div>
                    <h5 class="pkrs-title">
                        {{ $post->title }}
                    </h5>
                    <p class="pkrs-excerpt">
                        {{ Str::limit($post->excerpt,80) }}
                    </p>
                    <div class="pkrs-footer">
                        <div>
                            @if($post->type=='gallery')
                            <span class="badge bg-success">
                                <i class="bi bi-images"></i>
                                Gallery
                            </span>
                            @elseif($post->type=='video')
                            <span class="badge bg-danger">
                                <i class="bi bi-play"></i>
                                Video
                            </span>
                            @else
                            <span class="badge bg-primary text-black">
                                <i class="bi bi-image"></i>
                                Image
                            </span>
                            @endif
                        </div>
                        <div class="pkrs-actions">

                            {{-- Preview --}}
                            <button
                                type="button"
                                class="action-btn btn-preview"
                                data-id="{{ $post->id }}"
                                title="Preview">
                                <i class="bi bi-eye"></i>
                            </button>

                            {{-- Edit --}}
                            <a
                                href="{{ route('admin.pkrs-posts.edit', ['pkrs_post' => $post->id]) }}"
                                title="Edit"
                                style="
                                        width:38px;
                                        height:38px;
                                        display:inline-flex;
                                        align-items:center;
                                        justify-content:center;
                                        padding:0;
                                        border-radius:10px;
                                        background:#fef3c7;
                                        border:1px solid #fde68a;
                                        color:#d97706;
                                        text-decoration:none;
                                    ">

                                <i
                                    class="bi bi-pencil-fill"
                                    style="
                                            color:#d97706;
                                            font-size:16px;
                                            line-height:1;
                                        ">
                                </i>

                            </a>

                            {{-- Gallery --}}
                            @if($post->type === 'gallery')

                            <a
                                href="{{ route('admin.pkrs-posts.galleries.index', ['post' => $post->id]) }}"
                                title="Kelola Gallery"
                                style="
                                        width: 38px;
                                        height: 38px;
                                        display: inline-flex;
                                        align-items: center;
                                        justify-content: center;
                                        padding: 0;
                                        border-radius: 10px;
                                        background: #ecfdf5 !important;
                                        color: #059669 !important;
                                        border: 1px solid #a7f3d0 !important;
                                        text-decoration: none !important;
                                        box-sizing: border-box;
                                        transition: .2s ease;
                                    "
                                onmouseover="this.style.background='#d1fae5'"
                                onmouseout="this.style.background='#ecfdf5'">
                                <i
                                    class="bi bi-images"
                                    style="
                                            color: #059669 !important;
                                            font-size: 16px !important;
                                            line-height: 1 !important;
                                            display: inline-block !important;
                                        "></i>
                            </a>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <h5>
                    Belum ada post PKRS
                </h5>
            </div>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>

<!-- ================= PREVIEW POPUP ================= -->

<div id="previewOverlay" class="preview-overlay">
    <div class="preview-card">
        <button class="preview-close" id="closePreview">
            <i class="bi bi-x-lg"></i>
        </button>
        <div class="preview-left">
            <img id="previewImage">
        </div>
        <div class="preview-right">
            <span class="preview-category" id="previewCategory"></span>
            <h2 class="text-black" id="previewTitle"></h2>
            <p class="preview-excerpt" id="previewExcerpt"></p>
            <hr>
            <div class="preview-content" id="previewContent"></div>
            <div class="preview-info text-white">
                <div>
                    <small>Status</small>
                    <strong class="text-black" id="previewStatus"></strong>
                </div>
                <div>
                    <small>Tipe</small>
                    <strong class="text-black" id="previewType"></strong>
                </div>
                <div>
                    <small>Featured</small>
                    <strong class="text-black" id="previewFeatured"></strong>
                </div>
                <div>
                    <small>Publish</small>
                    <strong class="text-black" id="previewPublished"></strong>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .preview-overlay {

        position: fixed;

        inset: 0;

        background: rgba(15, 23, 42, .75);

        backdrop-filter: blur(8px);

        display: flex;

        align-items: center;

        justify-content: center;

        opacity: 0;

        visibility: hidden;

        transition: .25s;

        z-index: 999999;

    }

    .preview-overlay.show {

        opacity: 1;

        visibility: visible;

    }

    .preview-card {

        width: min(1200px, 92vw);

        max-height: 90vh;

        background: white;

        border-radius: 24px;

        overflow: hidden;

        display: grid;

        grid-template-columns: 1fr 1fr;

        transform: scale(.9);

        transition: .25s;

        box-shadow: 0 40px 80px rgba(0, 0, 0, .3);

    }

    .preview-overlay.show .preview-card {

        transform: scale(1);

    }

    .preview-left {

        background: #f3f4f6;

        aspect-ratio: 4/5;

    }

    .preview-left img {

        width: 100%;

        height: 100%;

        object-fit: cover;

    }

    .preview-right {

        padding: 35px;

        overflow: auto;

    }

    .preview-category {

        color: #6366f1;

        font-weight: 700;

        text-transform: uppercase;

        font-size: 13px;

    }

    .preview-right h2 {

        margin-top: 10px;

        margin-bottom: 15px;

        font-size: 30px;

        font-weight: 700;

    }

    .preview-excerpt {

        color: #6b7280;

    }

    .preview-content {

        margin-top: 20px;

        line-height: 1.8;

        color: #374151;

    }

    .preview-info {

        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 15px;

        margin-top: 30px;

    }

    .preview-info div {

        background: #f8fafc;

        border-radius: 14px;

        padding: 15px;

    }

    .preview-info small {

        display: block;

        color: #94a3b8;

        margin-bottom: 6px;

    }

    .preview-close {

        position: absolute;

        top: 20px;

        right: 20px;

        width: 44px;

        height: 44px;

        border: none;

        border-radius: 50%;

        background: white;

        box-shadow: 0 10px 25px rgba(0, 0, 0, .2);

        cursor: pointer;

        z-index: 5;

    }

    @media(max-width:992px) {

        .preview-card {

            grid-template-columns: 1fr;

            width: 95vw;

            max-height: 95vh;

        }

    }
</style>

<script>
    const overlay = document.getElementById('previewOverlay');
    const closeBtn = document.getElementById('closePreview');

    document.querySelectorAll('.btn-preview').forEach(btn => {

        btn.addEventListener('click', async function() {

            try {

                const id = this.dataset.id;

                const response = await fetch(`/admin/pkrs-posts/${id}`);

                if (!response.ok) {
                    throw new Error('Gagal mengambil data post');
                }

                const post = await response.json();

                console.log(post);

                // Thumbnail
                const img = document.getElementById('previewImage');

                if (post.thumbnail && post.thumbnail !== "null") {
                    img.src = post.thumbnail;
                    img.style.display = 'block';
                } else {
                    img.src = '';
                    img.style.display = 'none';
                }

                document.getElementById('previewCategory').textContent =
                    post.category ?? '-';

                document.getElementById('previewTitle').textContent =
                    post.title ?? '-';

                document.getElementById('previewExcerpt').textContent =
                    post.excerpt ?? '';

                document.getElementById('previewContent').innerHTML =
                    post.content ?? '';

                document.getElementById('previewStatus').textContent =
                    post.published ? 'Published' : 'Draft';

                document.getElementById('previewType').textContent =
                    post.type ?? '-';

                document.getElementById('previewFeatured').textContent =
                    post.featured ? 'Ya' : 'Tidak';

                document.getElementById('previewPublished').textContent =
                    post.published_at ?? '-';

                overlay.classList.add('show');

            } catch (err) {

                console.error(err);

            }

        });

    });

    closeBtn.addEventListener('click', function() {
        overlay.classList.remove('show');
    });

    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            overlay.classList.remove('show');
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            overlay.classList.remove('show');
        }
    });
</script>


@endsection
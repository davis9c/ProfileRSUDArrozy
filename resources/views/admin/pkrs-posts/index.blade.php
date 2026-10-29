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

    .pkrs-category-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        flex-shrink: 0;

        padding: 5px 10px;

        border-radius: 999px;

        font-size: 11px;
        font-weight: 700;
        line-height: 1;
    }

    .status-badge.is-published {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #059669;
    }

    .status-badge.is-hidden {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #64748b;
    }

    .publish-switch {
        position: relative;
        display: inline-flex;
        align-items: center;
        margin: 0;
        cursor: pointer;
        flex-shrink: 0;
    }

    .publish-switch input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    .publish-switch .switch-track {
        position: relative;

        width: 42px;
        height: 24px;

        border-radius: 999px;
        background: #cbd5e1;

        transition: background .25s ease;
    }

    .publish-switch .switch-track::after {
        content: '';

        position: absolute;
        top: 3px;
        left: 3px;

        width: 18px;
        height: 18px;

        border-radius: 50%;
        background: white;

        box-shadow: 0 1px 3px rgba(0, 0, 0, .25);

        transition: transform .25s ease;
    }

    .publish-switch input:checked+.switch-track {
        background: #10b981;
    }

    .publish-switch input:checked+.switch-track::after {
        transform: translateX(18px);
    }

    .publish-switch input:focus-visible+.switch-track {
        box-shadow: 0 0 0 3px rgba(16, 185, 129, .25);
    }

    .publish-switch.is-loading {
        opacity: .55;
        pointer-events: none;
    }

    .action-btn-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #dc2626;
        transition: all .2s ease;
    }

    .action-btn-danger:hover {
        background: #fee2e2;
        border-color: #fca5a5;
        color: #b91c1c;
        transform: translateY(-2px);
    }

    .pkrs-post-card.is-hidden-post .pkrs-image {
        opacity: .55;
        filter: grayscale(.6);
    }

    .pkrs-post-card.is-hidden-post .pkrs-title {
        color: #94a3b8;
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
            <div @class([
                'pkrs-post-card',
                'is-hidden-post' => ! $post->is_published,
            ])>
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
                    <div class="pkrs-category-row">
                        <div class="pkrs-category">
                            {{ $post->category?->name ?? 'Tanpa kategori' }}
                        </div>
                        <span @class([
                            'status-badge',
                            'is-published' => $post->is_published,
                            'is-hidden' => ! $post->is_published,
                        ])>
                            <i @class([
                                'bi',
                                'bi-check-circle-fill' => $post->is_published,
                                'bi-eye-slash-fill' => ! $post->is_published,
                            ])></i>
                            <span>{{ $post->is_published ? 'Tayang' : 'Disembunyikan' }}</span>
                        </span>
                    </div>
                    <h5 class="pkrs-title">
                        {{ $post->title }}
                    </h5>
                    <p class="pkrs-excerpt">
                        {{ Str::limit($post->excerpt,80) }}
                    </p>
                    <div class="pkrs-footer">
                        <div style="display:flex;align-items:center;gap:10px;">
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

                            <label class="publish-switch"
                                title="{{ $post->is_published ? 'Sembunyikan post' : 'Tayangkan post' }}">
                                <input
                                    type="checkbox"
                                    class="toggle-publish"
                                    role="switch"
                                    data-url="{{ route('admin.pkrs-posts.toggle-publish', ['pkrsPost' => $post->id]) }}"
                                    aria-label="{{ $post->is_published ? 'Sembunyikan post' : 'Tayangkan post' }}"
                                    @checked($post->is_published)>
                                <span class="switch-track"></span>
                            </label>
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

                            {{-- Delete --}}
                            <button
                                type="button"
                                class="action-btn action-btn-danger btn-delete"
                                data-title="{{ $post->title }}"
                                data-action="{{ route('admin.pkrs-posts.destroy', ['pkrs_post' => $post->id]) }}"
                                title="Hapus">
                                <i class="bi bi-trash3"></i>
                            </button>

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

<!-- ================= DELETE CONFIRMATION ================= -->

<div id="deleteOverlay" class="delete-overlay">
    <div class="delete-modal" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle">
        <div class="delete-icon">
            <i class="bi bi-trash3"></i>
        </div>
        <h5 id="deleteModalTitle">Hapus Post PKRS?</h5>
        <p>Post berikut akan dihapus permanen beserta thumbnail, video cover, dan seluruh gambar gallery-nya.</p>
        <strong class="delete-post-title" id="deletePostTitle">-</strong>
        <p class="delete-warning">
            <i class="bi bi-exclamation-triangle-fill me-1"></i>
            Tindakan ini tidak dapat dibatalkan.
        </p>
        <form id="deleteForm" method="POST" action="#">
            @csrf
            @method('DELETE')
            <div class="delete-actions">
                <button type="button" class="btn-cancel" id="cancelDelete">Batal</button>
                <button type="submit" class="btn-confirm" id="confirmDelete">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>

<div id="pkrsToast" class="toast-notice" role="status" aria-live="polite">
    <i class="bi bi-check-circle-fill" id="pkrsToastIcon"></i>
    <span id="pkrsToastMessage"></span>
</div>

<style>
    .delete-overlay {
        position: fixed;
        inset: 0;
        z-index: 999999;
        padding: 20px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: rgba(15, 23, 42, .75);
        backdrop-filter: blur(8px);

        opacity: 0;
        visibility: hidden;
        transition: .25s ease;
    }

    .delete-overlay.show {
        opacity: 1;
        visibility: visible;
    }

    .delete-modal {
        width: min(460px, 100%);
        padding: 30px;

        background: white;
        border-radius: 22px;

        transform: scale(.92);
        transition: .25s ease;
        box-shadow: 0 40px 80px rgba(0, 0, 0, .3);
    }

    .delete-overlay.show .delete-modal {
        transform: scale(1);
    }

    .delete-icon {
        width: 62px;
        height: 62px;
        margin: 0 auto 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #fef2f2;
        color: #dc2626;
        font-size: 26px;
    }

    .delete-modal h5 {
        margin: 0;
        text-align: center;

        color: #111827;
        font-size: 21px;
        font-weight: 700;
    }

    .delete-modal p {
        margin: 10px 0 0;

        text-align: center;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
    }

    .delete-post-title {
        display: block;
        margin: 16px 0;

        padding: 11px 14px;

        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;

        text-align: center;
        color: #111827;
        font-size: 14px;
        word-break: break-word;
    }

    .delete-modal .delete-warning {
        margin-bottom: 22px;
        color: #dc2626;
        font-size: 12px;
        font-weight: 600;
    }

    .delete-actions {
        display: flex;
        gap: 10px;
    }

    .delete-actions .btn-cancel,
    .delete-actions .btn-confirm {
        flex: 1;

        padding: 11px 16px;

        border-radius: 12px;

        font-size: 14px;
        font-weight: 600;

        transition: .2s ease;
    }

    .delete-actions .btn-cancel {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #475569;
    }

    .delete-actions .btn-cancel:hover {
        background: #f1f5f9;
    }

    .delete-actions .btn-confirm {
        background: #dc2626;
        border: 1px solid #dc2626;
        color: white;
    }

    .delete-actions .btn-confirm:hover {
        background: #b91c1c;
        border-color: #b91c1c;
    }

    .delete-actions .btn-confirm:disabled {
        opacity: .65;
        cursor: not-allowed;
    }

    .toast-notice {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 1000000;

        display: flex;
        align-items: center;
        gap: 10px;

        max-width: min(380px, calc(100vw - 48px));
        padding: 14px 18px;

        border-radius: 14px;

        background: #065f46;
        color: white;
        font-size: 14px;
        font-weight: 500;

        box-shadow: 0 20px 40px rgba(0, 0, 0, .25);

        opacity: 0;
        visibility: hidden;
        transform: translateY(14px);
        transition: .25s ease;
    }

    .toast-notice.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .toast-notice.is-error {
        background: #991b1b;
    }
</style>

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

        overflow-wrap: anywhere;

    }

    .preview-content p {
        margin: 0 0 1rem;
    }

    .preview-content h1,
    .preview-content h2,
    .preview-content h3,
    .preview-content h4,
    .preview-content h5,
    .preview-content h6 {
        margin: 1.35rem 0 0.65rem;

        color: #111827;
        font-weight: 700;
        line-height: 1.35;
    }

    .preview-content ul,
    .preview-content ol {
        margin: 0 0 1rem;
        padding-left: 1.5rem;
    }

    .preview-content ul {
        list-style: disc outside;
    }

    .preview-content ol {
        list-style: decimal outside;
    }

    .preview-content li {
        margin-bottom: 0.35rem;
        padding-left: 0.15rem;
    }

    .preview-content ul ul {
        list-style-type: circle;
    }

    .preview-content ol ol {
        list-style-type: lower-alpha;
    }

    .preview-content li > ul,
    .preview-content li > ol {
        margin-top: 0.35rem;
        margin-bottom: 0;
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

    /*
    |--------------------------------------------------------------------------
    | Delete confirmation
    |--------------------------------------------------------------------------
    */

    const deleteOverlay = document.getElementById('deleteOverlay');
    const deleteForm = document.getElementById('deleteForm');
    const deletePostTitle = document.getElementById('deletePostTitle');
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');

    let deleteTrigger = null;

    function closeDeleteModal() {
        deleteOverlay.classList.remove('show');

        confirmDelete.disabled = false;
        confirmDelete.textContent = 'Ya, Hapus';

        if (deleteTrigger) {
            deleteTrigger.focus();
            deleteTrigger = null;
        }
    }

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            deleteTrigger = this;
            deleteForm.action = this.dataset.action;
            deletePostTitle.textContent = this.dataset.title;
            deleteOverlay.classList.add('show');
            cancelDelete.focus();
        });
    });

    cancelDelete.addEventListener('click', closeDeleteModal);

    deleteOverlay.addEventListener('click', function(e) {
        if (e.target === deleteOverlay) {
            closeDeleteModal();
        }
    });

    deleteForm.addEventListener('submit', function() {
        confirmDelete.disabled = true;
        confirmDelete.textContent = 'Menghapus...';
    });

    /*
    |--------------------------------------------------------------------------
    | Publish toggle
    |--------------------------------------------------------------------------
    */

    const toast = document.getElementById('pkrsToast');
    const toastMessage = document.getElementById('pkrsToastMessage');
    const toastIcon = document.getElementById('pkrsToastIcon');

    let toastTimer = null;

    function showToast(message, type = 'success') {
        clearTimeout(toastTimer);

        toast.classList.toggle('is-error', type === 'error');

        toastIcon.className = type === 'error'
            ? 'bi bi-exclamation-circle-fill'
            : 'bi bi-check-circle-fill';

        toastMessage.textContent = message;
        toast.classList.add('show');

        toastTimer = setTimeout(function() {
            toast.classList.remove('show');
        }, 3500);
    }

    function updatePublishUi(card, isPublished) {
        const wrapper = card.querySelector('.publish-switch');
        const badge = card.querySelector('.status-badge');
        const toggle = card.querySelector('.toggle-publish');

        card.classList.toggle('is-hidden-post', !isPublished);

        if (toggle) {
            toggle.checked = isPublished;
            toggle.setAttribute(
                'aria-label',
                isPublished ? 'Sembunyikan post' : 'Tayangkan post'
            );
        }

        if (wrapper) {
            wrapper.title = isPublished ? 'Sembunyikan post' : 'Tayangkan post';
        }

        if (badge) {
            badge.classList.toggle('is-published', isPublished);
            badge.classList.toggle('is-hidden', !isPublished);

            badge.innerHTML = `
                <i class="bi ${isPublished ? 'bi-check-circle-fill' : 'bi-eye-slash-fill'}"></i>
                <span>${isPublished ? 'Tayang' : 'Disembunyikan'}</span>
            `;
        }
    }

    document.querySelectorAll('.toggle-publish').forEach(toggle => {
        toggle.addEventListener('change', async function() {
            const card = this.closest('.pkrs-post-card');
            const wrapper = this.closest('.publish-switch');
            const previousState = !this.checked;

            wrapper.classList.add('is-loading');
            this.disabled = true;

            try {
                const response = await fetch(this.dataset.url, {
                    method: 'PATCH',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({}),
                });

                let data = {};

                try {
                    data = await response.json();
                } catch (error) {
                    data = {};
                }

                if (!response.ok || !data.success) {
                    throw new Error(data.message || 'Gagal mengubah status post.');
                }

                updatePublishUi(card, data.is_published);
                showToast(data.message, 'success');
            } catch (error) {
                this.checked = previousState;
                showToast(error.message, 'error');
            } finally {
                this.disabled = false;
                wrapper.classList.remove('is-loading');
            }
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            overlay.classList.remove('show');
            closeDeleteModal();
        }
    });
</script>


@endsection
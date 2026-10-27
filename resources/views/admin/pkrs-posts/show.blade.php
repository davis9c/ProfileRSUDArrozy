<style>
    .preview-modal .modal-dialog {
        max-width: 1100px;
    }

    .preview-modal .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 25px 70px rgba(0, 0, 0, .25);
    }

    .preview-left {
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 650px;
    }

    .preview-left img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        border-radius: 18px;
    }

    .preview-right {
        padding: 40px;
    }

    .preview-category {
        color: #6366f1;
        font-weight: 700;
        letter-spacing: .5px;
        text-transform: uppercase;
        font-size: .85rem;
    }

    .preview-title {
        font-size: 2rem;
        font-weight: 700;
        color: #111827;
    }

    .preview-excerpt {
        color: #6b7280;
        line-height: 1.8;
    }

    .preview-meta {
        margin-top: 25px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .preview-box {
        background: #f8fafc;
        border-radius: 14px;
        padding: 15px;
    }

    .preview-box small {
        color: #94a3b8;
        display: block;
    }

    .preview-box strong {
        color: #111827;
    }

    .preview-close {
        margin-top: 35px;
    }
</style>
<div class="modal fade preview-modal"
    id="previewModal"
    tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="row g-0">

                <div class="col-lg-6 preview-left">

                    <img id="previewImage">

                </div>

                <div class="col-lg-6 preview-right">

                    <div class="preview-category"
                        id="previewCategory"></div>

                    <h2 class="preview-title"
                        id="previewTitle"></h2>

                    <p class="preview-excerpt"
                        id="previewExcerpt"></p>

                    <div class="preview-meta">

                        <div class="preview-box">
                            <small>Status</small>
                            <strong id="previewStatus"></strong>
                        </div>

                        <div class="preview-box">
                            <small>Tipe</small>
                            <strong id="previewType"></strong>
                        </div>

                        <div class="preview-box">
                            <small>Featured</small>
                            <strong id="previewFeatured"></strong>
                        </div>

                        <div class="preview-box">
                            <small>Publish</small>
                            <strong id="previewPublish"></strong>
                        </div>

                    </div>

                    <button
                        class="btn btn-dark preview-close"
                        data-bs-dismiss="modal">

                        Tutup Preview

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>
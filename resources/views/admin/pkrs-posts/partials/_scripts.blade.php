<link href="https://cdn.jsdelivr.net/npm/quill@1.3.6/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.6/dist/quill.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* =========================================================
           QUILL EDITOR
        ========================================================= */

        const editorElement = document.getElementById('editor');
        const contentInput = document.getElementById('content-input');

        if (editorElement && contentInput && typeof Quill !== 'undefined') {
            const quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['blockquote', 'link'],
                        [{ align: [] }],
                        ['clean'],
                    ],
                },
            });

            quill.root.innerHTML = contentInput.value;

            quill.on('text-change', function () {
                contentInput.value = quill.root.innerHTML;
            });

            const form = document.getElementById('pkrs-post-form');

            if (form) {
                form.addEventListener('submit', function () {
                    contentInput.value = quill.root.innerHTML;
                });
            }
        }

        /* =========================================================
           JENIS POST
        ========================================================= */

        const typeSelect = document.getElementById('type');
        const videoFields = document.getElementById('video-fields');
        const videoHint = document.getElementById('video-hint');
        const galleryHint = document.getElementById('gallery-hint');
        const videoInput = document.getElementById('video');

        function syncTypeFields() {
            if (!typeSelect) return;

            const isVideo = typeSelect.value === 'video';
            const isGallery = typeSelect.value === 'gallery';

            if (videoFields) {
                videoFields.classList.toggle('hidden', !isVideo);
            }

            if (videoHint) {
                videoHint.classList.toggle('hidden', isVideo);
            }

            if (galleryHint) {
                galleryHint.classList.toggle('hidden', !isGallery);
            }

            if (videoInput) {
                const hasExistingVideo = videoInput.dataset.existingVideo === '1';
                videoInput.required = isVideo && !hasExistingVideo;
            }
        }

        if (typeSelect) {
            typeSelect.addEventListener('change', syncTypeFields);
            syncTypeFields();
        }

        /* =========================================================
           PREVIEW & UKURAN FILE
        ========================================================= */

        function humanFileSize(kilobytes) {
            return kilobytes >= 1024
                ? (kilobytes / 1024).toFixed(0) + ' MB'
                : kilobytes + ' KB';
        }

        function setupFileInput(inputId, previewId, errorId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const error = document.getElementById(errorId);

            if (!input) return;

            input.addEventListener('change', function () {
                if (error) {
                    error.textContent = '';
                    error.classList.add('hidden');
                }

                if (!this.files.length) {
                    return;
                }

                const file = this.files[0];
                const maxSize = Number(this.dataset.maxSize || 0);

                if (maxSize && file.size > maxSize * 1024) {
                    if (error) {
                        error.textContent =
                            'Ukuran file terlalu besar. Maksimal ' +
                            humanFileSize(maxSize) + '.';
                        error.classList.remove('hidden');
                    }

                    this.value = '';
                    return;
                }

                if (preview) {
                    if (preview.tagName === 'VIDEO') {
                        preview.src = URL.createObjectURL(file);
                    } else {
                        preview.src = URL.createObjectURL(file);
                    }

                    preview.classList.remove('hidden');
                }
            });
        }

        setupFileInput('thumbnail', 'thumbnail-preview', 'thumbnail-error');
        setupFileInput('video', 'video-preview', 'video-error');
        setupFileInput('video_cover', 'video-cover-preview', 'video-cover-error');
    });
</script>

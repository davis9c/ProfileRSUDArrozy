<div class="modern-card">

    <div class="card-header-modern flex flex-col gap-4 md:flex-row md:items-start md:justify-between mb-6">

        <!-- Judul -->
        <div>
            <h4 class="flex items-center text-2xl font-bold text-white">
                <i class="bi bi-grid-1x2-fill mr-2 text-white"></i>
                Informasi Kategori
            </h4>

            <p class="mt-1 text-sm text-white">
                Lengkapi informasi kategori PKRS di bawah ini.
            </p>
        </div>

        <a href="{{ route('admin.pkrs-categories.index') }}"
            class="inline-flex items-center gap-3 rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md px-5 py-3 text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:bg-white hover:text-slate-800 hover:shadow-xl">

            <!-- Icon -->
            <div
                class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/20 transition-colors duration-300 group-hover:bg-emerald-100">
                <i class="bi bi-arrow-left-short text-2xl leading-none"></i>
            </div>

            <!-- Text -->
            <div class="leading-tight">
                <p class="m-0 text-xs text-white/70">
                    Kembali ke
                </p>
                <p class="m-0 font-semibold">
                    Daftar Kategori
                </p>
            </div>

        </a>

    </div>

    <!-- Body -->
    <div class="card-body p-4">

        <div class="row">

            <!-- Nama -->
            <div class="col-lg-8 mb-4">
                <label class="form-label" for="name">
                    Nama Kategori
                    <span class="text-danger">*</span>
                </label>

                <input type="text" id="name" name="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Contoh : Kesehatan Ibu & Anak"
                    value="{{ old('name', $category->name ?? '') }}" required>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Slug -->
            <div class="col-lg-4 mb-4">
                <label class="form-label" for="slug">
                    Slug
                </label>

                <input type="text" id="slug" name="slug" readonly class="form-control form-control-slug"
                    value="{{ old('slug', $category->slug ?? '') }}">

                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>Dibuat otomatis.
                </small>
            </div>

        </div>

        <!-- Deskripsi -->
        <div class="mb-2">
            <label class="form-label" for="description">
                Deskripsi
            </label>

            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="4" placeholder="Deskripsi singkat kategori PKRS...">{{ old('description', $category->description ?? '') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <hr class="section-divider">

        <!-- ICON -->
        <div class="mb-3">
            <h5 class="section-title">
                <i class="bi bi-images me-2"></i>
                Icon Kategori
            </h5>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="icon-type-card" for="templateIcon">
                        <input class="form-check-input" type="radio" name="icon_type" id="templateIcon"
                            value="template" checked>
                        <div class="icon-type-card-icon">
                            <i class="bi bi-palette2"></i>
                        </div>
                        <div>
                            <div class="icon-type-title">Gunakan Icon Template</div>
                            <div class="icon-type-desc">Pilih salah satu icon bawaan sistem.</div>
                        </div>
                    </label>
                </div>

                <div class="col-md-6">
                    <label class="icon-type-card" for="uploadIcon">
                        <input class="form-check-input" type="radio" name="icon_type" id="uploadIcon" value="upload">
                        <div class="icon-type-card-icon">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>
                        <div>
                            <div class="icon-type-title">Upload Icon Sendiri</div>
                            <div class="icon-type-desc">Upload PNG, SVG atau JPG.</div>
                        </div>
                    </label>
                </div>

            </div>
        </div>

        <!-- ========================= -->
        <!-- TEMPLATE ICON -->
        <!-- ========================= -->
        <div class="position-relative d-inline-block">

            <div class="icon-picker-wrapper">

                <button type="button" id="btnIconPicker" class="btn btn-primary rounded-pill">

                    <i class="bi bi-emoji-smile me-2"></i>
                    Pilih Icon

                </button>

                <div id="iconPicker" class="icon-picker">

                    <!-- search -->

                    <div class="p-3 border-bottom">

                        <input id="searchModalIcon" class="form-control form-control-sm rounded-pill"
                            placeholder="Cari icon...">

                    </div>

                    <!-- daftar icon -->

                    <div class="icon-grid">
                        @php
                            $icons = [
                                ['heart', '❤️', 'Jantung'],
                                ['brain', '🧠', 'Stroke'],
                                ['lungs', '🫁', 'Paru'],
                                ['baby', '👶', 'Anak'],
                                ['pregnant', '🤰', 'Ibu Hamil'],
                                ['eye', '👁️', 'Mata'],
                                ['tooth', '🦷', 'Gigi'],
                                ['pill', '💊', 'Obat'],
                                ['hospital', '🏥', 'Rumah Sakit'],
                                ['apple', '🍎', 'Gizi'],
                                ['exercise', '🏃', 'Olahraga'],
                                ['family', '👨‍👩‍👧', 'Keluarga'],
                                ['book', '📖', 'Edukasi'],
                                ['virus', '🦠', 'Virus'],
                                ['vaccine', '💉', 'Vaksin'],
                                ['blood', '🩸', 'Darah'],
                                ['mask', '😷', 'Masker'],
                                ['elderly', '👵', 'Lansia'],
                                ['health', '🩺', 'Kesehatan'],
                            ];
                        @endphp

                        @foreach ($icons as $icon)
                            <button type="button" class="picker-icon" data-icon="{{ $icon[0] }}"
                                data-title="{{ $icon[2] }}" data-emoji="{{ $icon[1] }}">

                                {{ $icon[1] }}

                            </button>
                        @endforeach

                    </div>

                </div>
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Icon PKRS Terpilih
                    </label>

                    <div class="selected-icon-box d-flex align-items-center gap-3">

                        <div id="selectedIconPreview" class="selected-icon-preview">
                            😊
                        </div>

                        <div>
                            <div id="selectedTitle" class="fw-bold">
                                Belum memilih icon
                            </div>

                            <small class="text-muted">
                                Pilih icon sesuai kategori
                            </small>
                        </div>

                    </div>


                    <input type="hidden" name="icon" id="selectedIconValue">


                </div>

            </div>

            <!-- ========================= -->
            <!-- UPLOAD -->
            <!-- ========================= -->
            <div id="uploadArea" style="display:none">
                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Upload Icon</h6>
                        <p class="text-muted mb-4">Upload PNG, SVG atau JPG.</p>

                        <label class="upload-box">
                            <input type="file" id="iconUpload" name="icon_upload" accept=".png,.jpg,.jpeg,.svg"
                                hidden>

                            <div id="uploadPreview">
                                <div class="upload-cloud-icon">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                </div>
                                <h6 class="mt-3 mb-1">Drag & Drop</h6>
                                <small class="text-muted">atau klik untuk memilih gambar</small>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <hr class="section-divider mt-5">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.pkrs-categories.index') }}" class="btn btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn btn-save">
                    <i class="bi bi-check-circle me-2"></i>
                    Simpan Kategori
                </button>
            </div>

        </div>

    </div>

    <style>
        :root {
            --pkrs-primary: #2563eb;
            --pkrs-primary-light: #60a5fa;
            --pkrs-primary-bg: #eff6ff;
            --pkrs-border: #e5e9f0;
            --pkrs-text: #1e293b;
            --pkrs-text-muted: #64748b;
            --pkrs-danger: #dc2626;
            --pkrs-success: #16a34a;
        }

        /* ===========================================
       Layout
         =========================================== */
        .modern-card {
            border: none;
            border-radius: 22px;
            overflow: visible;
            background: #fff;
            box-shadow: 0 15px 40px rgba(15, 23, 42, .08);
            color: var(--pkrs-text);
        }

        .card-header-modern {
            padding: 28px 32px;
            background: linear-gradient(135deg, var(--pkrs-primary), var(--pkrs-primary-light));
            color: #fff;
        }

        .card-header-modern h4 {
            font-weight: 700;
            margin-bottom: 4px;
        }

        .card-header-modern p {
            margin-bottom: 0;
            opacity: .9;
            font-size: .925rem;
        }

        /* ===========================================
       Form controls
            =========================================== */
        .modern-card .form-label {
            font-weight: 600;
            color: var(--pkrs-text);
            margin-bottom: 8px;
        }

        .modern-card .form-control,
        .modern-card textarea.form-control {
            border: 1.5px solid var(--pkrs-border);
            border-radius: 12px;
            padding: .65rem .9rem;
            color: var(--pkrs-text);
            background-color: #fff;
            transition: border-color .2s, box-shadow .2s;
        }

        .modern-card .form-control::placeholder {
            color: #a3aebc;
        }

        .modern-card .form-control:focus {
            border-color: var(--pkrs-primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
        }

        .form-control-slug {
            background: #f8fafc !important;
            color: var(--pkrs-text-muted) !important;
            font-family: 'Courier New', monospace;
        }

        .modern-card .invalid-feedback {
            color: var(--pkrs-danger);
        }

        .section-divider {
            border-top: 1.5px solid var(--pkrs-border);
            opacity: 1;
        }

        .section-title {
            font-weight: 700;
            color: var(--pkrs-text);
            display: flex;
            align-items: center;
        }

        .section-title i {
            color: var(--pkrs-primary);
        }

        /* ===========================================
       Icon type selector cards
         =========================================== */
        .icon-type-card {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            border: 2px solid var(--pkrs-border);
            border-radius: 16px;
            padding: 18px;
            cursor: pointer;
            background: #fff;
            transition: .2s ease;
            height: 100%;
        }

        .icon-type-card:hover {
            transform: translateY(-3px);
            border-color: var(--pkrs-primary-light);
            box-shadow: 0 10px 25px rgba(37, 99, 235, .1);
        }

        .icon-type-card input {
            margin-top: 4px;
            accent-color: var(--pkrs-primary);
            flex-shrink: 0;
        }

        .icon-type-card:has(input:checked) {
            border-color: var(--pkrs-primary);
            background: var(--pkrs-primary-bg);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .08);
        }

        .icon-type-card-icon {
            display: none;
        }

        .icon-type-title {
            font-weight: 600;
            color: var(--pkrs-text);
        }

        .icon-type-desc {
            font-size: .85rem;
            color: var(--pkrs-text-muted);
            margin-top: 2px;
        }

        .selected-icon-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 15px;
        }


        .selected-icon-preview {

            width: 70px;
            height: 70px;

            border-radius: 20px;

            background: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 40px;

            box-shadow:
                0 5px 15px rgba(0, 0, 0, .08);

        }

        /* ===========================================
       Selected icon preview
        =========================================== */
        .selected-icon-card {
            background: #f8fafc;
            border: 1.5px dashed var(--pkrs-border) !important;
        }

        .selected-icon-preview {
            width: 80px;
            height: 80px;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--pkrs-primary-bg);
            font-size: 40px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, .12);
        }

        /* ===========================================
       Upload box
        =========================================== */
        .upload-box {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            height: 240px;
            cursor: pointer;
            transition: .25s;
            background: #fafbfc;
        }

        .upload-box:hover {
            border-color: var(--pkrs-primary);
            background: var(--pkrs-primary-bg);
        }

        .upload-cloud-icon {
            font-size: 42px;
            color: var(--pkrs-primary-light);
        }

        #uploadPreview {
            text-align: center;
            color: var(--pkrs-text);
        }

        .dragging {
            background: #dbeafe !important;
            border-color: var(--pkrs-primary) !important;
            transform: scale(1.02);
        }

        /* ===========================================
       Icon picker modal
        =========================================== */
        .search-wrapper {
            position: relative;
        }

        .search-wrapper .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--pkrs-text-muted);
        }

        .search-wrapper .form-control {
            border-radius: 12px;
        }

        .icon-modal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 16px;
        }

        .modal-icon {
            border: 2px solid var(--pkrs-border);
            border-radius: 16px;
            padding: 18px 10px;
            text-align: center;
            cursor: pointer;
            transition: .2s ease;
            color: var(--pkrs-text);
            transition: .2s ease;
            background: #fff;
        }

        .modal-icon:hover {
            box-shadow: 0 12px 28px rgba(37, 99, 235, .12);
            transform: translateY(-3px);
            border-color: #198754 !important;
            background: #ecfdf3;
        }

        .modal-icon.active {
            background: #d1fae5;
            border-color: #198754 !important;
            box-shadow: 0 0 0 2px rgba(25, 135, 84, .15);
        }

        #iconGrid::-webkit-scrollbar {
            width: 6px;
        }

        #iconGrid::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 20px;
        }

        .modal-icon .emoji {
            font-size: 38px;
            margin-bottom: 8px;
        }

        /* ===========================================
       Buttons
        =========================================== */
        .btn-save {
            background: linear-gradient(135deg, var(--pkrs-primary), var(--pkrs-primary-light));
            color: #fff;
            border: none;
            border-radius: 999px;
            padding: .65rem 1.75rem;
            font-weight: 600;
            box-shadow: 0 10px 20px rgba(37, 99, 235, .25);
            transition: .2s ease;
        }

        .btn-save:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(37, 99, 235, .3);
        }

        .btn-cancel {
            border: 1.5px solid var(--pkrs-border);
            color: var(--pkrs-text-muted);
            border-radius: 999px;
            padding: .65rem 1.75rem;
            font-weight: 600;
            background: #fff;
            transition: .2s ease;
        }

        .btn-cancel:hover {
            background: #f8fafc;
            color: var(--pkrs-text);
            border-color: #cbd5e1;
        }

        .icon-picker-wrapper {
            position: relative;
            display: inline-block;
        }

        .icon-picker {

            position: absolute;

            top: calc(100% + 12px);

            left: 0;

            width: 380px;

            background: #fff;

            border-radius: 18px;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 15px 40px rgba(15, 23, 42, .15);

            display: none;

            z-index: 99999;

            overflow: hidden;

            animation: fadeIn .18s ease;

        }

        .icon-picker::before {

            content: "";

            position: absolute;

            top: -8px;

            left: 30px;

            width: 16px;

            height: 16px;

            background: white;

            transform: rotate(45deg);

            border-left: 1px solid #e5e7eb;

            border-top: 1px solid #e5e7eb;

        }

        .icon-grid {

            display: grid;

            grid-template-columns: repeat(6, 1fr);

            gap: 10px;

            padding: 15px;

            max-height: 280px;

            overflow-y: auto;

        }

        .icon-picker input {

            border: none;

            background: #f8fafc;

            border-radius: 12px;

        }

        .icon-picker input:focus {

            box-shadow: none;

            background: #fff;

        }

        @keyframes fadeIn {

            from {

                opacity: 0;

                transform: translateY(-8px);

            }

            to {

                opacity: 1;

                transform: translateY(0);

            }

        }

        .picker-icon {

            border: none;

            background: transparent;

            font-size: 28px;

            border-radius: 12px;

            padding: 10px;

            transition: .2s;

        }

        .picker-icon:hover {

            background: #e8f8ef;

            transform: scale(1.08);

        }

        .picker-icon.active {

            background: #0d6efd !important;
            color: white;

            transform: scale(1.1);

        }
    </style>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                /*
                |--------------------------------------------------------------------------
                | AUTO SLUG
                |--------------------------------------------------------------------------
                */
                const nameInput = document.getElementById('name');
                const slugInput = document.getElementById('slug');

                if (nameInput) {
                    nameInput.addEventListener('keyup', function() {
                        let slug = this.value
                            .toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9]+/g, '-')
                            .replace(/^-|-$/g, '');

                        slugInput.value = slug;
                    });
                }

                /*
                |--------------------------------------------------------------------------
                | TEMPLATE / UPLOAD SWITCH
                |--------------------------------------------------------------------------
                */
                const templateRadio = document.getElementById('templateIcon');
                const uploadRadio = document.getElementById('uploadIcon');

                const templateArea = document.getElementById('templateArea');
                const uploadArea = document.getElementById('uploadArea');

                function toggleMode() {
                    if (templateRadio.checked) {
                        templateArea.style.display = 'block';
                        uploadArea.style.display = 'none';
                    } else {
                        templateArea.style.display = 'none';
                        uploadArea.style.display = 'block';
                    }
                }

                toggleMode();

                templateRadio.addEventListener('change', toggleMode);
                uploadRadio.addEventListener('change', toggleMode);

                /*
                |--------------------------------------------------------------------------
                | SEARCH ICON (modal)
                |--------------------------------------------------------------------------
                */
                const searchModal = document.getElementById('searchModalIcon');

                if (searchModal) {
                    searchModal.addEventListener('keyup', function() {
                        let keyword = this.value.toLowerCase();

                        document.querySelectorAll('.modal-icon').forEach(function(item) {
                            let title = item.dataset.title.toLowerCase();

                            item.style.display = title.includes(keyword) ? 'block' : 'none';
                        });
                    });
                }

                /*
                |--------------------------------------------------------------------------
                | UPLOAD PREVIEW
                |--------------------------------------------------------------------------
                */
                const upload = document.getElementById('iconUpload');

                if (upload) {
                    upload.addEventListener('change', function(e) {
                        let file = e.target.files[0];

                        if (!file) return;

                        let reader = new FileReader();

                        reader.onload = function(ev) {
                            document.getElementById('uploadPreview').innerHTML = `
                            <img src="${ev.target.result}"
                                class="img-fluid rounded-4 shadow"
                                style="max-height:170px">
                            <div class="mt-3 fw-semibold">${file.name}</div>
                            <small class="text-success">Gambar berhasil dipilih</small>
                        `;
                        }

                        reader.readAsDataURL(file);
                    });
                }

                /*
                |--------------------------------------------------------------------------
                | DRAG DROP
                |--------------------------------------------------------------------------
                */
                const uploadBox = document.querySelector('.upload-box');

                if (uploadBox) {
                    uploadBox.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        uploadBox.classList.add('dragging');
                    });

                    uploadBox.addEventListener('dragleave', function() {
                        uploadBox.classList.remove('dragging');
                    });

                    uploadBox.addEventListener('drop', function(e) {
                        e.preventDefault();
                        uploadBox.classList.remove('dragging');
                        upload.files = e.dataTransfer.files;
                        upload.dispatchEvent(new Event('change'));
                    });
                }
            });
            const picker = document.getElementById('iconPicker');

            document.getElementById('btnIconPicker').onclick = function(e) {

                e.stopPropagation();

                picker.style.display =
                    picker.style.display === 'block' ?
                    'none' :
                    'block';

            }

            document.addEventListener('click', function() {

                picker.style.display = 'none';

            });

            picker.addEventListener('click', function(e) {

                e.stopPropagation();

            });

            document.querySelectorAll('.picker-icon').forEach(item => {

                item.onclick = function() {


                    // hapus aktif sebelumnya
                    document.querySelectorAll('.picker-icon')
                        .forEach(i => i.classList.remove('active'));


                    // aktifkan pilihan
                    this.classList.add('active');


                    // tampilkan preview
                    document.getElementById('selectedIconPreview').innerHTML =
                        this.dataset.emoji;


                    document.getElementById('selectedTitle').innerHTML =
                        this.dataset.title;


                    document.getElementById('selectedIconValue').value =
                        this.dataset.icon;


                    picker.style.display = 'none';

                }

            });
        </script>
    @endpush

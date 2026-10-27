<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --border: #dbe2ea;
        --text: #334155;
        --muted: #64748b;
        --white: #ffffff;
    }

    .modern-card {
        background: var(--white) !important;
        border: 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        margin-bottom: 28px;
    }

    .card-header-modern {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: #fff !important;
        padding: 26px 30px;
    }

    .card-header-modern h4 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #fff !important;
    }

    .card-header-modern p {
        margin: 8px 0 0;
        color: rgba(255, 255, 255, .9) !important;
    }

    .card-body-modern {
        padding: 30px;
        background: #fff !important;
    }

    /* ===============================
        Typography
    =============================== */

    .modern-card label,
    .modern-card .form-label {
        color: var(--text) !important;
        font-weight: 600;
        margin-bottom: .5rem;
    }

    .modern-card h1,
    .modern-card h2,
    .modern-card h3,
    .modern-card h4,
    .modern-card h5,
    .modern-card h6 {
        color: var(--text);
    }

    .modern-card p,
    .modern-card small,
    .modern-card span:not(.required) {
        color: var(--muted);
    }

    /* ===============================
        Input
    =============================== */

    .modern-card input,
    .modern-card textarea,
    .modern-card select,
    .modern-card .form-control,
    .modern-card .form-select {

        background: #fff !important;
        color: #111827 !important;

        border: 1px solid var(--border) !important;

        border-radius: 14px;

        min-height: 48px;

        box-shadow: none !important;

        transition: all .25s ease;
    }

    .modern-card textarea {
        min-height: 120px;
        padding-top: 12px;
    }

    .modern-card input::placeholder,
    .modern-card textarea::placeholder {

        color: #94a3b8 !important;

    }

    .modern-card input:focus,
    .modern-card textarea:focus,
    .modern-card select:focus,
    .modern-card .form-control:focus,
    .modern-card .form-select:focus {

        border-color: var(--primary) !important;

        box-shadow: 0 0 0 .18rem rgba(37, 99, 235, .15) !important;

        background: #fff !important;

        color: #111827 !important;

    }

    /* ===============================
        Checkbox / Switch
    =============================== */

    .modern-card .form-check-label {

        color: var(--text) !important;

        font-weight: 500;

    }

    /* ===============================
        Upload
    =============================== */

    .thumbnail-upload {

        display: block;

        border: 2px dashed #cbd5e1;

        border-radius: 18px;

        padding: 40px;

        background: #f8fafc;

        text-align: center;

        cursor: pointer;

        transition: .25s;

    }

    .thumbnail-upload:hover {

        background: #eff6ff;

        border-color: var(--primary);

    }

    .thumbnail-upload i {

        font-size: 48px;

        color: var(--primary);

    }

    .thumbnail-upload h5 {

        color: var(--text);

        margin-top: 15px;

        margin-bottom: 6px;

    }

    .thumbnail-upload small {

        color: var(--muted);

    }

    .thumbnail-preview {

        display: none;

        margin-top: 20px;

    }

    .thumbnail-preview img {

        width: 100%;

        max-height: 320px;

        object-fit: cover;

        border-radius: 16px;

        border: 1px solid #e5e7eb;

    }

    /* ===============================
        Buttons
    =============================== */

    .btn-back {

        border-radius: 12px;

        padding: 12px 22px;

        font-weight: 600;

    }

    .btn-save {

        border-radius: 12px;

        padding: 12px 26px;

        font-weight: 600;

    }

    /* ===============================
        Validation
    =============================== */

    .required {

        color: #ef4444;

    }

    .modern-card .invalid-feedback {

        display: block;

        color: #dc2626;

        font-size: .875rem;

    }

    /* ===============================
        Video
    =============================== */

    .video-section {

        display: none;

    }

    /* ===============================
        Responsive
    =============================== */

    @media (max-width:768px) {

        .card-header-modern {

            padding: 22px;

        }

        .card-body-modern {

            padding: 22px;

        }

    }
</style>
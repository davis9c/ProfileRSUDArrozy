@extends('frontend.layouts.app')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    /* =========================================================
       PKRS — GLOBAL
    ========================================================= */

    .pkrs-page,
    .pkrs-page * {
        box-sizing: border-box;
    }

    .pkrs-page {
        --pkrs-primary: #0D9488;
        --pkrs-primary-dark: #0f766e;

        --pkrs-heading: #0f172a;
        --pkrs-text: #475569;
        --pkrs-muted: #94a3b8;

        --pkrs-white: #FFFFFF;
        --pkrs-border: #eef1f4;
        --pkrs-soft: #f8fafc;

        font-family:
            'Plus Jakarta Sans',
            'Inter',
            system-ui,
            -apple-system,
            sans-serif;

        background: #FFFFFF;
        color: var(--pkrs-heading);
        min-height: 100vh;
    }

    .pkrs-page h1,
    .pkrs-page h2,
    .pkrs-page h3,
    .pkrs-page h4,
    .pkrs-page button,
    .pkrs-page a {
        font-family:
            'Plus Jakarta Sans',
            'Inter',
            system-ui,
            -apple-system,
            sans-serif;
    }


    /* =========================================================
       FEATURED
    ========================================================= */

    .pkrs-featured {
        background: #FFFFFF;
        padding: 40px 20px 20px;
    }

    .pkrs-featured-card {
        max-width: 1180px;
        margin: 0 auto;
        background: #FFFFFF;
        border: 1px solid var(--pkrs-border);
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(15, 23, 42, 0.06);
    }

    .pkrs-featured-inner {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
        min-height: 420px;
    }

    .pkrs-featured-image {
        position: relative;
        min-height: 420px;
        background: #f1f5f9;
        overflow: hidden;
    }

    .pkrs-featured-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    .pkrs-featured-badge {
        position: absolute;
        z-index: 2;
        top: 20px;
        left: 20px;

        display: inline-flex;
        align-items: center;

        padding: 8px 14px;
        border-radius: 999px;

        background: rgba(255, 255, 255, 0.95);
        color: var(--pkrs-primary);

        border: 1px solid rgba(255, 255, 255, 0.8);

        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.02em;
    }

    .pkrs-featured-inner>div:last-child {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 48px;
    }

    .pkrs-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 16px;
    }

    .pkrs-label-line {
        width: 32px;
        height: 3px;
        border-radius: 999px;
        background: var(--pkrs-primary);
    }

    .pkrs-label-text {
        color: var(--pkrs-primary);
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .pkrs-featured-title {
        margin: 0;
        color: var(--pkrs-heading);
        font-size: clamp(28px, 3vw, 42px);
        line-height: 1.15;
        font-weight: 800;
        letter-spacing: -0.03em;
    }

    .pkrs-featured-excerpt {
        margin: 20px 0 0;
        color: var(--pkrs-text);
        font-size: 15px;
        line-height: 1.8;
    }

    .pkrs-featured-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 28px;
    }

    .pkrs-featured-avatar {
        width: 44px;
        height: 44px;
        flex: 0 0 44px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        background: var(--pkrs-primary);
        color: #FFFFFF;

        font-size: 12px;
        font-weight: 800;
    }

    .pkrs-featured-date {
        color: #64748b;
        font-size: 13px;
        font-weight: 700;
    }

    .pkrs-featured-author {
        margin-top: 2px;
        color: var(--pkrs-muted);
        font-size: 12px;
    }


    /* =========================================================
       FEED / GROUP
    ========================================================= */

    .pkrs-feed-section {
        background: #FFFFFF;
        padding: 60px 20px 80px;
    }

    .pkrs-feed-container {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        background: #FFFFFF;
    }

    .pkrs-section-heading {
        margin-bottom: 32px;
    }

    .pkrs-section-heading .pkrs-label {
        margin-bottom: 10px;
    }

    .pkrs-section-heading h2 {
        margin: 0;
        color: var(--pkrs-heading);
        font-size: clamp(28px, 3vw, 38px);
        line-height: 1.2;
        font-weight: 800;
        letter-spacing: -0.03em;
    }

    .pkrs-section-heading p {
        margin: 10px 0 0;
        color: #64748b;
        font-size: 15px;
        line-height: 1.7;
    }


    /* =========================================================
       GROUP GRID
    ========================================================= */

    .pkrs-groups {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
    }

    .pkrs-group-card {
        position: relative;

        display: flex;
        flex-direction: column;

        background: #FFFFFF;
        border: 1px solid var(--pkrs-border);
        border-radius: 24px;
        overflow: hidden;

        cursor: pointer;

        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease,
            border-color 0.25s ease;
    }

    .pkrs-group-card:hover {
        transform: translateY(-5px);
        border-color: rgba(13, 148, 136, 0.28);
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.09);
    }

    .pkrs-group-cover {
        position: relative;
        aspect-ratio: 16 / 10;
        background: #f1f5f9;
        overflow: hidden;
    }

    .pkrs-group-cover img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;

        transition: transform 0.4s ease;
    }

    .pkrs-group-card:hover .pkrs-group-cover img {
        transform: scale(1.04);
    }

    .pkrs-group-count {
        position: absolute;
        top: 16px;
        right: 16px;

        display: inline-flex;
        align-items: center;

        padding: 7px 11px;
        border-radius: 999px;

        background: rgba(15, 23, 42, 0.72);
        color: #FFFFFF;

        font-size: 11px;
        font-weight: 700;
    }

    .pkrs-group-content {
        padding: 22px;
    }

    .pkrs-group-category {
        color: var(--pkrs-primary);
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .pkrs-group-title {
        margin: 7px 0 0;

        color: var(--pkrs-heading);
        font-size: 21px;
        line-height: 1.3;
        font-weight: 800;
        letter-spacing: -0.02em;
    }

    .pkrs-group-description {
        margin: 8px 0 0;

        color: #64748b;
        font-size: 13px;
        line-height: 1.6;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .pkrs-group-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-top: 18px;
        padding-top: 16px;

        border-top: 1px solid var(--pkrs-border);
    }

    .pkrs-group-total {
        color: var(--pkrs-muted);
        font-size: 12px;
        font-weight: 600;
    }

    .pkrs-group-arrow {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        background: #f8fafc;
        color: var(--pkrs-primary);

        font-size: 18px;
        font-weight: 700;

        transition:
            background 0.2s ease,
            color 0.2s ease;
    }

    .pkrs-group-card:hover .pkrs-group-arrow {
        background: var(--pkrs-primary);
        color: #FFFFFF;
    }


    /* =========================================================
       POPUP BASE
    ========================================================= */

    .pkrs-popup-overlay {
        position: fixed;
        inset: 0;
        z-index: 99990;

        display: none;
        align-items: center;
        justify-content: center;

        padding: 20px;

        background: rgba(15, 23, 42, 0.68);
        backdrop-filter: blur(5px);

        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .pkrs-popup-overlay.is-open {
        display: flex;
        opacity: 1;
    }

    .pkrs-popup {
        position: relative;

        width: 100%;
        max-width: 1050px;
        max-height: min(88vh, 850px);

        background: #FFFFFF;
        border-radius: 26px;

        overflow: hidden;

        box-shadow:
            0 30px 80px rgba(15, 23, 42, 0.22);

        transform: translateY(12px) scale(0.98);
        transition: transform 0.25s ease;
    }

    .pkrs-popup-overlay.is-open .pkrs-popup {
        transform: translateY(0) scale(1);
    }

    .pkrs-popup-close {
        position: absolute;
        z-index: 20;
        top: 16px;
        right: 16px;

        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid var(--pkrs-border);
        border-radius: 50%;

        background: rgba(255, 255, 255, 0.96);
        color: var(--pkrs-heading);

        font-size: 25px;
        line-height: 1;

        cursor: pointer;

        transition:
            background 0.2s ease,
            color 0.2s ease;
    }

    .pkrs-popup-close:hover {
        background: var(--pkrs-primary);
        color: #FFFFFF;
    }

    .pkrs-popup-header {
        position: relative;

        padding: 28px 70px 24px 30px;

        border-bottom: 1px solid var(--pkrs-border);
        background: #FFFFFF;
    }

    .pkrs-popup-back {
        display: none;

        align-items: center;
        gap: 7px;

        margin-bottom: 10px;
        padding: 0;

        border: 0;
        background: transparent;

        color: var(--pkrs-primary);

        font-size: 12px;
        font-weight: 800;

        cursor: pointer;
    }

    .pkrs-popup-header-label {
        display: flex;
        align-items: center;
        gap: 9px;

        color: var(--pkrs-primary);

        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .pkrs-popup-header-label::before {
        content: "";
        width: 24px;
        height: 3px;
        border-radius: 999px;
        background: var(--pkrs-primary);
    }

    .pkrs-popup-title {
        margin: 7px 0 0;

        color: var(--pkrs-heading);
        font-size: 27px;
        line-height: 1.25;
        font-weight: 800;
        letter-spacing: -0.025em;
    }

    .pkrs-popup-subtitle {
        margin: 7px 0 0;

        color: #64748b;
        font-size: 13px;
    }


    /* =========================================================
       POST LIST POPUP
    ========================================================= */

    .pkrs-list-popup {
        display: flex;
        flex-direction: column;
    }

    .pkrs-popup-list {
        padding: 26px 30px 30px;

        overflow-y: auto;
        max-height: calc(min(88vh, 850px) - 130px);

        background: #FFFFFF;
    }

    .pkrs-post-list {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .pkrs-post-card {
        background: #FFFFFF;
        border: 1px solid var(--pkrs-border);
        border-radius: 19px;
        overflow: hidden;

        cursor: pointer;

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease,
            border-color 0.2s ease;
    }

    .pkrs-post-card:hover {
        transform: translateY(-3px);
        border-color: rgba(13, 148, 136, 0.28);
        box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
    }

    .pkrs-post-card-media {
        position: relative;
        aspect-ratio: 4 / 3;
        background: #f1f5f9;
        overflow: hidden;
    }

    .pkrs-post-card-media img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;

        transition: transform 0.35s ease;
    }

    .pkrs-post-card:hover .pkrs-post-card-media img {
        transform: scale(1.04);
    }

    .pkrs-post-card-type {
        position: absolute;
        top: 12px;
        left: 12px;

        padding: 6px 9px;
        border-radius: 999px;

        background: rgba(15, 23, 42, 0.72);
        color: #FFFFFF;

        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .pkrs-post-card-content {
        padding: 17px;
    }

    .pkrs-post-card-category {
        color: var(--pkrs-primary);
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .pkrs-post-card-title {
        margin: 7px 0 0;

        color: var(--pkrs-heading);
        font-size: 15px;
        line-height: 1.45;
        font-weight: 800;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .pkrs-post-card-date {
        margin-top: 11px;
        color: var(--pkrs-muted);
        font-size: 11px;
        font-weight: 600;
    }


    /* =========================================================
       DETAIL POPUP
    ========================================================= */

    .pkrs-detail-overlay {
        position: fixed;
        inset: 0;
        z-index: 100000;

        display: none;
        align-items: center;
        justify-content: center;

        padding: 20px;

        background: rgba(15, 23, 42, 0.72);
        backdrop-filter: blur(6px);

        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .pkrs-detail-overlay.is-open {
        display: flex;
        opacity: 1;
    }

    .pkrs-detail-modal {
        position: relative;

        width: 100%;
        max-width: 1050px;
        max-height: 90vh;

        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(360px, 0.95fr);

        background: #FFFFFF;
        border-radius: 26px;

        overflow: hidden;

        box-shadow:
            0 30px 80px rgba(15, 23, 42, 0.25);

        transform: translateY(12px) scale(0.98);
        transition: transform 0.25s ease;
    }

    .pkrs-detail-overlay.is-open .pkrs-detail-modal {
        transform: translateY(0) scale(1);
    }

    .pkrs-detail-close {
        position: absolute;
        z-index: 30;
        top: 16px;
        right: 16px;

        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid var(--pkrs-border);
        border-radius: 50%;

        background: rgba(255, 255, 255, 0.96);
        color: var(--pkrs-heading);

        font-size: 25px;
        line-height: 1;

        cursor: pointer;

        transition:
            background 0.2s ease,
            color 0.2s ease;
    }

    .pkrs-detail-close:hover {
        background: var(--pkrs-primary);
        color: #FFFFFF;
    }

    .pkrs-detail-media {
        min-height: 500px;
        background: #0f172a;
        overflow: hidden;
    }

    .pkrs-detail-media img,
    .pkrs-detail-media video {
        width: 100%;
        height: 100%;
        display: block;

        object-fit: contain;
    }

    .pkrs-detail-gallery {
        position: relative;
        width: 100%;
        height: 100%;
        min-height: 500px;
        background: #0f172a;
    }

    .pkrs-detail-gallery img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .pkrs-detail-gallery-nav {
        position: absolute;
        inset: 0;

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 0 14px;

        pointer-events: none;
    }

    .pkrs-detail-gallery-btn {
        pointer-events: auto;

        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 0;
        border-radius: 50%;

        background: rgba(255, 255, 255, 0.94);
        color: #0f172a;

        font-size: 24px;
        cursor: pointer;
    }

    .pkrs-detail-gallery-btn:hover {
        background: var(--pkrs-primary);
        color: #FFFFFF;
    }

    .pkrs-detail-gallery-counter {
        position: absolute;
        right: 18px;
        bottom: 18px;

        padding: 7px 11px;
        border-radius: 999px;

        background: rgba(15, 23, 42, 0.72);
        color: #FFFFFF;

        font-size: 11px;
        font-weight: 700;
    }

    .pkrs-detail-content {
        min-height: 500px;

        display: flex;
        flex-direction: column;

        overflow-y: auto;
        background: #FFFFFF;
    }

    .pkrs-detail-header {
        padding: 24px 60px 20px 28px;

        border-bottom: 1px solid var(--pkrs-border);
        background: #FFFFFF;
    }

    .pkrs-detail-user {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .pkrs-detail-avatar {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        background: #0D9488;
        color: #FFFFFF;

        font-size: 11px;
        font-weight: 800;
    }

    .pkrs-detail-user-info strong {
        display: block;
        color: var(--pkrs-heading);
        font-size: 13px;
        font-weight: 800;
    }

    .pkrs-detail-user-info span {
        display: block;
        margin-top: 2px;

        color: var(--pkrs-muted);
        font-size: 11px;
    }

    .pkrs-detail-body {
        padding: 28px;
        background: #FFFFFF;
    }

    .pkrs-detail-category {
        color: var(--pkrs-primary);
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.07em;
    }

    .pkrs-detail-title {
        margin: 10px 0 0;

        color: var(--pkrs-heading);
        font-size: 27px;
        line-height: 1.25;
        font-weight: 800;
        letter-spacing: -0.025em;
    }

    .pkrs-detail-excerpt {
        margin-top: 18px;

        color: var(--pkrs-text);
        font-size: 14px;
        line-height: 1.8;

        white-space: pre-line;
    }

    .pkrs-detail-meta {
        display: flex;
        align-items: center;
        gap: 18px;

        margin-top: 25px;
        padding-top: 18px;

        border-top: 1px solid var(--pkrs-border);

        color: var(--pkrs-muted);
        font-size: 11px;
    }

    .pkrs-detail-meta-item strong {
        color: var(--pkrs-heading);
        font-weight: 800;
    }

    .pkrs-detail-actions {
        margin-top: auto;

        display: flex;
        align-items: center;
        gap: 7px;

        padding: 16px 28px;

        border-top: 1px solid var(--pkrs-border);
        background: #FFFFFF;
    }

    .pkrs-detail-action {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 0;
        border-radius: 50%;

        background: #FFFFFF;
        color: var(--pkrs-text);

        font-size: 19px;
        cursor: pointer;

        transition:
            background 0.2s ease,
            color 0.2s ease;
    }

    .pkrs-detail-action:hover {
        background: #f8fafc;
        color: var(--pkrs-primary);
    }

    .pkrs-detail-date {
        margin-left: auto;
        color: var(--pkrs-muted);
        font-size: 11px;
        font-weight: 600;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .pkrs-empty {
        padding: 70px 20px;

        text-align: center;

        background: #FFFFFF;
        border: 1px solid var(--pkrs-border);
        border-radius: 24px;
    }

    .pkrs-empty-icon {
        color: var(--pkrs-primary);
        font-size: 30px;
    }

    .pkrs-empty h3 {
        margin: 10px 0 0;

        color: var(--pkrs-heading);
        font-size: 20px;
        font-weight: 800;
    }

    .pkrs-empty p {
        margin: 7px 0 0;

        color: var(--pkrs-muted);
        font-size: 13px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pkrs-pagination {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .pkrs-pagination a {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 11px 22px;

        border: 1px solid var(--pkrs-primary);
        border-radius: 999px;

        background: #FFFFFF;
        color: var(--pkrs-primary);

        font-size: 13px;
        font-weight: 700;
        text-decoration: none;

        transition:
            background 0.2s ease,
            color 0.2s ease;
    }

    .pkrs-pagination a:hover {
        background: var(--pkrs-primary);
        color: #FFFFFF;
    }


    /* =========================================================
       SCROLLBAR
    ========================================================= */

    .pkrs-popup-list::-webkit-scrollbar,
    .pkrs-detail-content::-webkit-scrollbar {
        width: 7px;
    }

    .pkrs-popup-list::-webkit-scrollbar-track,
    .pkrs-detail-content::-webkit-scrollbar-track {
        background: #FFFFFF;
    }

    .pkrs-popup-list::-webkit-scrollbar-thumb,
    .pkrs-detail-content::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 999px;
    }


    /* =========================================================
       ACCESSIBILITY
    ========================================================= */

    .pkrs-page button:focus-visible,
    .pkrs-page a:focus-visible,
    .pkrs-popup button:focus-visible,
    .pkrs-detail-modal button:focus-visible {
        outline: 2px solid var(--pkrs-primary);
        outline-offset: 3px;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 900px) {

        .pkrs-featured-inner {
            grid-template-columns: 1fr;
        }

        .pkrs-featured-image {
            min-height: 330px;
        }

        .pkrs-featured-inner>div:last-child {
            padding: 32px;
        }

        .pkrs-groups {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .pkrs-post-list {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .pkrs-detail-modal {
            grid-template-columns: 1fr;
            max-height: 92vh;
        }

        .pkrs-detail-media {
            min-height: 350px;
            max-height: 48vh;
        }

        .pkrs-detail-gallery {
            min-height: 350px;
        }

        .pkrs-detail-content {
            min-height: auto;
            max-height: 48vh;
        }
    }


    @media (max-width: 640px) {

        .pkrs-featured {
            padding: 20px 14px 10px;
        }

        .pkrs-featured-card {
            border-radius: 20px;
        }

        .pkrs-featured-image {
            min-height: 260px;
        }

        .pkrs-featured-inner>div:last-child {
            padding: 25px 22px;
        }

        .pkrs-featured-title {
            font-size: 27px;
        }

        .pkrs-feed-section {
            padding: 40px 14px 60px;
        }

        .pkrs-section-heading {
            margin-bottom: 24px;
        }

        .pkrs-groups {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .pkrs-popup-overlay,
        .pkrs-detail-overlay {
            padding: 0;
            align-items: flex-end;
        }

        .pkrs-popup {
            max-height: 92vh;
            border-radius: 24px 24px 0 0;
        }

        .pkrs-popup-header {
            padding: 24px 60px 20px 20px;
        }

        .pkrs-popup-title {
            font-size: 23px;
        }

        .pkrs-popup-list {
            padding: 18px;
            max-height: calc(92vh - 120px);
        }

        .pkrs-post-list {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .pkrs-post-card {
            display: grid;
            grid-template-columns: 120px minmax(0, 1fr);
        }

        .pkrs-post-card-media {
            aspect-ratio: 1 / 1;
        }

        .pkrs-post-card-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 14px;
        }

        .pkrs-post-card-title {
            font-size: 14px;
        }

        .pkrs-detail-modal {
            width: 100%;
            max-height: 94vh;
            border-radius: 24px 24px 0 0;
        }

        .pkrs-detail-media {
            min-height: 280px;
            max-height: 38vh;
        }

        .pkrs-detail-gallery {
            min-height: 280px;
        }

        .pkrs-detail-header {
            padding: 18px 55px 16px 20px;
        }

        .pkrs-detail-body {
            padding: 22px 20px;
        }

        .pkrs-detail-title {
            font-size: 23px;
        }

        .pkrs-detail-actions {
            padding: 13px 20px;
        }
    }

    /* =====================================================
   PKRS DETAIL OVERLAY
    ===================================================== */

    #pkrsDetailOverlay {
        position: fixed !important;
        inset: 0 !important;
        z-index: 999999 !important;

        display: none !important;

        visibility: hidden;
        opacity: 0;
        pointer-events: none;

        transition:
            opacity .25s ease,
            visibility .25s ease;
    }

    #pkrsDetailOverlay.is-open {
        display: flex !important;

        visibility: visible;
        opacity: 1;
        pointer-events: auto;
    }

    #pkrsGroupOverlay {
        pointer-events: none;
    }

    #pkrsGroupOverlay.is-open {
        pointer-events: auto;
    }

    /* =====================================================
    PKRS GROUP POPUP — FORCE OPEN STATE
    ===================================================== */

    #pkrsGroupOverlay {
        position: fixed !important;
        inset: 0 !important;
        z-index: 999998 !important;

        display: none !important;

        visibility: hidden;
        opacity: 0;
        pointer-events: none;
    }

    #pkrsGroupOverlay.is-open {
        display: flex !important;

        visibility: visible;
        opacity: 1;
        pointer-events: auto;
    }
</style>

@php
$pkrsGroups = $allPosts->groupBy(function ($post) {
return $post->category?->name ?? 'PKRS';
});
@endphp

<div
    class="pkrs-page"
    @if(isset($post) && $post)
    data-auto-open-post="{{ $post->id }}"
    @endif>


    {{-- =====================================================
     FEATURED
    ====================================================== --}}

    @if ($featured)

    <section class="pkrs-featured">

        <div class="pkrs-featured-card">

            <div class="pkrs-featured-inner">

                <div class="pkrs-featured-image">

                    <span class="pkrs-featured-badge">
                        PKRS Pilihan
                    </span>

                    <img
                        src="{{ asset('storage/' . $featured->thumbnail) }}"
                        alt="{{ $featured->title }}">

                </div>

                <div>

                    <div class="pkrs-label">

                        <span class="pkrs-label-line"></span>

                        <span class="pkrs-label-text">
                            Edukasi & Informasi
                        </span>

                    </div>

                    <h1 class="pkrs-featured-title">
                        {{ $featured->title }}
                    </h1>

                    @if ($featured->excerpt)

                    <p class="pkrs-featured-excerpt">
                        {{ $featured->excerpt }}
                    </p>

                    @endif

                    <div class="pkrs-featured-meta">

                        <div class="pkrs-featured-avatar">
                            RS
                        </div>

                        <div>

                            <div class="pkrs-featured-date">
                                {{ optional($featured->published_at)->translatedFormat('d F Y') }}
                            </div>

                            <div class="pkrs-featured-author">
                                RSUD Ar Rozy
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @endif


    {{-- =====================================================
     GROUP SECTION
====================================================== --}}

    <section class="pkrs-feed-section">

        <div class="pkrs-feed-container">

            <div class="pkrs-section-heading">

                <div class="pkrs-label">

                    <span class="pkrs-label-line"></span>

                    <span class="pkrs-label-text">
                        PKRS RSUD Ar Rozy
                    </span>

                </div>

                <h2>
                    Informasi Kesehatan
                </h2>

                <p>
                    Pilih kategori informasi untuk melihat kumpulan konten PKRS.
                </p>

            </div>


            @if ($pkrsGroups->count())

            <div class="pkrs-groups">

                @foreach ($pkrsGroups as $categoryName => $groupPosts)

                @php
                $groupFirstPost = $groupPosts->first();

                $groupThumbnail = $groupFirstPost?->thumbnail;

                if (
                !$groupThumbnail &&
                $groupFirstPost?->type === 'video' &&
                $groupFirstPost?->video_cover
                ) {
                $groupThumbnail = $groupFirstPost->video_cover;
                }
                @endphp

                <article
                    class="pkrs-group-card"
                    data-pkrs-group
                    data-group-name="{{ e($categoryName) }}">

                    <div class="pkrs-group-cover">

                        @if ($groupThumbnail)

                        <img
                            src="{{ asset('storage/' . $groupThumbnail) }}"
                            alt="{{ $categoryName }}"
                            loading="lazy">

                        @else

                        <div
                            style="
                                        width:100%;
                                        height:100%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        color:#0D9488;
                                        font-size:42px;
                                        font-weight:800;
                                    ">
                            +
                        </div>

                        @endif

                        <span class="pkrs-group-count">
                            {{ $groupPosts->count() }} post
                        </span>

                    </div>


                    <div class="pkrs-group-content">

                        <div class="pkrs-group-category">
                            PKRS
                        </div>

                        <h3 class="pkrs-group-title">
                            {{ $categoryName }}
                        </h3>

                        <p class="pkrs-group-description">
                            Kumpulan informasi dan edukasi kesehatan
                            dari RSUD Ar Rozy.
                        </p>

                        <div class="pkrs-group-footer">

                            <span class="pkrs-group-total">
                                {{ $groupPosts->count() }}
                                informasi tersedia
                            </span>

                            <span class="pkrs-group-arrow">
                                →
                            </span>

                        </div>

                    </div>

                </article>

                @endforeach

            </div>

            @else

            <div class="pkrs-empty">

                <div class="pkrs-empty-icon">
                    ✦
                </div>

                <h3>
                    Belum Ada Informasi
                </h3>

                <p>
                    Konten PKRS belum tersedia.
                </p>

            </div>

            @endif


            {{-- =================================================
             PAGINATION
            ================================================== --}}

            @if ($posts->hasMorePages())

            <div class="pkrs-pagination">

                <a href="{{ $posts->nextPageUrl() }}">

                    Muat Post Berikutnya

                    <span>
                        →
                    </span>

                </a>

            </div>

            @endif

        </div>

    </section>


</div>

{{-- =========================================================
POPUP LIST POST DALAM GROUP
========================================================= --}}

<div
    class="pkrs-popup-overlay"
    id="pkrsGroupOverlay"
    aria-hidden="true">


    <div
        class="pkrs-popup pkrs-list-popup"
        role="dialog"
        aria-modal="true"
        aria-label="Daftar post PKRS">

        <button
            type="button"
            class="pkrs-popup-close"
            id="pkrsGroupClose"
            aria-label="Tutup">
            ×
        </button>


        <div class="pkrs-popup-header">

            <div class="pkrs-popup-header-label">
                PKRS RSUD Ar Rozy
            </div>

            <h2
                class="pkrs-popup-title"
                id="pkrsGroupTitle">
                Informasi
            </h2>

            <p
                class="pkrs-popup-subtitle"
                id="pkrsGroupSubtitle">
                Kumpulan informasi PKRS
            </p>

        </div>


        <div class="pkrs-popup-list">

            <div
                class="pkrs-post-list"
                id="pkrsPostList">
            </div>

        </div>

    </div>


</div>


{{-- =========================================================
DATA POST UNTUK JAVASCRIPT
========================================================= --}}

@php
$pkrsJavascriptPosts = $allPosts->map(function ($post) {

/*
|--------------------------------------------------------------------------
| GALLERY IMAGES
|--------------------------------------------------------------------------
*/

$galleryImages = [];

/*
|--------------------------------------------------------------------------
| THUMBNAIL — FOTO UTAMA
|--------------------------------------------------------------------------
*/

if (!empty($post->thumbnail)) {

$galleryImages[] = asset(
'storage/' . $post->thumbnail
);

}

/*
|--------------------------------------------------------------------------
| FOTO TAMBAHAN GALLERY
|--------------------------------------------------------------------------
*/

if (
$post->type === 'gallery' &&
$post->galleries &&
$post->galleries->count()
) {

foreach ($post->galleries as $gallery) {

if (!empty($gallery->image)) {

$galleryImages[] = asset(
'storage/' . $gallery->image
);

}

}

}

/*
|--------------------------------------------------------------------------
| DATA POST
|--------------------------------------------------------------------------
*/

return [

'id' => $post->id,

'title' => $post->title,

'excerpt' => $post->excerpt ?? '',

'category' => $post->category?->name ?? 'PKRS',

'group' => $post->category?->name ?? 'PKRS',

'date' => optional($post->published_at)
->translatedFormat('d F Y'),

'views' => number_format(
$post->views ?? 0
),

'type' => $post->type,

'thumbnail' => $post->thumbnail
? asset('storage/' . $post->thumbnail)
: null,

'video' => $post->video
? asset('storage/' . $post->video)
: null,

'video_cover' => $post->video_cover
? asset('storage/' . $post->video_cover)
: (
$post->thumbnail
? asset('storage/' . $post->thumbnail)
: null
),

/*
|--------------------------------------------------------------------------
| THUMBNAIL + FOTO TAMBAHAN
|--------------------------------------------------------------------------
*/

'gallery' => array_values(
array_unique($galleryImages)
),

];

})->values();
@endphp

<!-- =====================================================
     PKRS DATA
====================================================== -->

<div
    id="pkrsData"
    data-posts='@json($pkrsJavascriptPosts)'
    hidden>
</div>



{{-- =========================================================
DETAIL POPUP
========================================================= --}}

<div
    class="pkrs-detail-overlay"
    id="pkrsDetailOverlay"
    aria-hidden="true">


    <div
        class="pkrs-detail-modal"
        role="dialog"
        aria-modal="true"
        aria-label="Detail informasi PKRS">

        <button
            type="button"
            class="pkrs-detail-close"
            id="pkrsDetailClose"
            aria-label="Tutup">
            ×
        </button>


        {{-- MEDIA --}}

        <div
            class="pkrs-detail-media"
            id="pkrsDetailMedia">
        </div>


        {{-- CONTENT --}}

        <div class="pkrs-detail-content">

            <div class="pkrs-detail-header">

                <div class="pkrs-detail-user">

                    <div class="pkrs-detail-avatar">
                        RS
                    </div>

                    <div class="pkrs-detail-user-info">

                        <strong>
                            RSUD Ar Rozy
                        </strong>

                        <span id="pkrsDetailCategory">
                            PKRS
                        </span>

                    </div>

                </div>

            </div>


            <div class="pkrs-detail-body">

                <span
                    class="pkrs-detail-category"
                    id="pkrsDetailCategoryBadge">
                    #PKRS
                </span>


                <h2
                    class="pkrs-detail-title"
                    id="pkrsDetailTitle">
                </h2>


                <div
                    class="pkrs-detail-excerpt"
                    id="pkrsDetailExcerpt">
                </div>


                <div class="pkrs-detail-meta">

                    <div class="pkrs-detail-meta-item">

                        <strong id="pkrsDetailViews">
                            0
                        </strong>

                        dilihat

                    </div>


                    <div class="pkrs-detail-meta-item">

                        <strong>
                            RSUD Ar Rozy
                        </strong>

                    </div>

                </div>

            </div>


            <div class="pkrs-detail-actions">

                <button
                    type="button"
                    class="pkrs-detail-action"
                    id="pkrsDetailLike"
                    aria-label="Suka">
                    ♡
                </button>


                <button
                    type="button"
                    class="pkrs-detail-action"
                    aria-label="Komentar">
                    💬
                </button>


                <button
                    type="button"
                    class="pkrs-detail-action"
                    aria-label="Bagikan"
                    id="pkrsDetailShare">
                    ↗
                </button>


                <div
                    class="pkrs-detail-date"
                    id="pkrsDetailDate">
                </div>

            </div>

        </div>

    </div>


</div>



@endsection
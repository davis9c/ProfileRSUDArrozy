@extends('admin.layouts.app')

@section('title', 'Tambah Kategori PKRS')

@section('content')
    <style>
        .btn-back-modern {
            display: inline-flex;
            align-items: center;
            gap: 14px;

            padding: 12px 22px;

            text-decoration: none;

            background: rgba(255, 255, 255, .12);

            border: 1px solid rgba(255, 255, 255, .18);

            border-radius: 18px;

            backdrop-filter: blur(16px);

            transition: .35s;

            color: #fff;

            min-width: 220px;
        }

        .btn-back-modern:hover {

            transform: translateY(-3px);

            color: #fff;

            background: rgba(255, 255, 255, .18);

            border-color: rgba(255, 255, 255, .35);

            box-shadow:
                0 14px 35px rgba(0, 0, 0, .18);

            text-decoration: none;
        }

        .btn-back-icon {

            width: 44px;

            height: 44px;

            border-radius: 14px;

            background: rgba(255, 255, 255, .18);

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 18px;

            flex-shrink: 0;

            transition: .3s;
        }

        .btn-back-modern:hover .btn-back-icon {

            transform: translateX(-4px);

            background: #fff;

            color: #2563eb;

        }

        .btn-back-text {

            display: flex;

            flex-direction: column;

            line-height: 1.2;
        }

        .btn-back-text small {

            font-size: 11px;

            color: rgba(255, 255, 255, .75);

            letter-spacing: .5px;

            text-transform: uppercase;
        }

        .btn-back-text strong {

            font-size: 15px;

            color: #fff;

            font-weight: 700;
        }
    </style>

    <div class="container-fluid py-4">

        <div class="row justify-content-center">

            <div class="col-12 col-xl-11">

                <!-- FORM -->
                <form action="{{ route('admin.pkrs-categories.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @include('admin.pkrs-categories.form')

                </form>

            </div>

        </div>

    </div>

@endsection


@push('styles')
    <style>
        .container-fluid {
            max-width: 1500px;
        }

        /* ===========================
                   HEADER
                =========================== */

        .pkrs-header {

            padding: 30px 34px;

            border-radius: 24px;

            background:
                linear-gradient(135deg, #2563eb, #3b82f6);

            color: white;

            box-shadow:
                0 20px 45px rgba(37, 99, 235, .30);

        }

        .header-icon {

            width: 68px;

            height: 68px;

            border-radius: 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: rgba(255, 255, 255, .18);

            backdrop-filter: blur(10px);

            font-size: 30px;

            color: white;

        }

        .pkrs-header h2 {

            font-size: 30px;

            font-weight: 700;

            margin: 0;

        }

        .pkrs-header p {

            color: rgba(255, 255, 255, .85);

            margin-top: 6px;

            font-size: 15px;

        }

        .btn-back {

            border-radius: 999px;

            padding: 12px 22px;

            font-weight: 600;

            border: none;

            transition: .25s;

        }

        .btn-back:hover {

            transform: translateY(-2px);

            box-shadow: 0 12px 24px rgba(0, 0, 0, .12);

        }

        /* ===========================
                   FORM CARD
                =========================== */

        .modern-card {

            margin-top: -30px;

            position: relative;

            z-index: 20;

        }

        @media(max-width:992px) {

            .modern-card {

                margin-top: 20px;

            }

        }

        @media(max-width:768px) {

            .pkrs-header {

                padding: 24px;

            }

            .header-icon {

                width: 56px;
                height: 56px;
                font-size: 24px;

            }

            .pkrs-header h2 {

                font-size: 24px;

            }

        }
    </style>
@endpush

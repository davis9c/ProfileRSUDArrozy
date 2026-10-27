@extends('admin.layouts.app')

@section('title', 'Edit Kategori PKRS')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold mb-1">
                    Edit Kategori PKRS
                </h3>

                <p class="text-muted mb-0">
                    Perbarui data kategori.
                </p>

            </div>

            <a href="{{ route('admin.pkrs-categories.index') }}" class="btn btn-outline-secondary">

                Kembali

            </a>

        </div>

        <form action="{{ route('admin.pkrs-categories.update', $category) }}" method="POST">

            @csrf
            @method('PUT')

            @include('admin.pkrs-categories.form')

        </form>

    </div>

@endsection

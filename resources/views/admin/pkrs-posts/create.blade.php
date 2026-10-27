@extends('admin.layouts.app')

@section('title', 'Tambah Post PKRS')

@push('styles')
@include('admin.pkrs-posts.partials._styles')
@endpush

@section('content')

<div class="container-fluid">

    @include('admin.pkrs-posts.partials._header')

    <form action="{{ route('admin.pkrs-posts.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('admin.pkrs-posts.partials._form')

    </form>

</div>

@endsection

@push('scripts')
@include('admin.pkrs-posts.partials._scripts')
@endpush
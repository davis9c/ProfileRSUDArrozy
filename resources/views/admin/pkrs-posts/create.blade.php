@extends('admin.layouts.app')

@section('title', 'Tambah Post PKRS')

@section('content')

<form
    id="pkrs-post-form"
    method="POST"
    action="{{ route('admin.pkrs-posts.store') }}"
    enctype="multipart/form-data"
    class="space-y-6">

    @csrf

    @include('admin.pkrs-posts.partials._form', ['post' => null])

</form>

@endsection

@push('scripts')
@include('admin.pkrs-posts.partials._scripts')
@endpush

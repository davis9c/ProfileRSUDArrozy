@extends('admin.layouts.app')

@section('title', 'Tambah Gallery PKRS')

@section('content')

<form
    method="POST"
    action="{{ route('admin.pkrs-posts.galleries.store', ['post' => $post->id]) }}"
    enctype="multipart/form-data"
    class="space-y-6">

    @csrf

    @include('admin.pkrs-galleries.partials._form', ['gallery' => null])

</form>

@endsection

@push('scripts')
@include('admin.pkrs-galleries.partials._scripts')
@endpush

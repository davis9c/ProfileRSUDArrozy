@extends('admin.layouts.app')

@section('title', 'Edit Gallery PKRS')

@section('content')

<form
    method="POST"
    action="{{ route('admin.pkrs-posts.galleries.update', ['post' => $post->id, 'gallery' => $gallery->id]) }}"
    enctype="multipart/form-data"
    class="space-y-6">

    @csrf
    @method('PUT')

    @include('admin.pkrs-galleries.partials._form', ['gallery' => $gallery])

</form>

@endsection

@push('scripts')
@include('admin.pkrs-galleries.partials._scripts')
@endpush

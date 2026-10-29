@extends('admin.layouts.app')

@section('title', 'Edit Post PKRS')

@section('content')

<form
    id="pkrs-post-form"
    method="POST"
    action="{{ route('admin.pkrs-posts.update', $post) }}"
    enctype="multipart/form-data"
    class="space-y-6">

    @csrf
    @method('PUT')

    @include('admin.pkrs-posts.partials._form', ['post' => $post])

</form>

@endsection

@push('scripts')
@include('admin.pkrs-posts.partials._scripts')
@endpush

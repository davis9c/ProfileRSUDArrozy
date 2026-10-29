@extends('admin.layouts.app')

@section('title', 'Edit Kategori PKRS')

@section('content')

<form
    method="POST"
    action="{{ route('admin.pkrs-categories.update', $category) }}"
    class="space-y-6">

    @csrf
    @method('PUT')

    @include('admin.pkrs-categories.form', ['category' => $category])

</form>

@endsection

@push('scripts')
@include('admin.pkrs-categories.partials._scripts')
@endpush

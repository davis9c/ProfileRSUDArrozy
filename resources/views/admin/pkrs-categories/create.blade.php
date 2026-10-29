@extends('admin.layouts.app')

@section('title', 'Tambah Kategori PKRS')

@section('content')

<form
    method="POST"
    action="{{ route('admin.pkrs-categories.store') }}"
    class="space-y-6">

    @csrf

    @include('admin.pkrs-categories.form', ['category' => null])

</form>

@endsection

@push('scripts')
@include('admin.pkrs-categories.partials._scripts')
@endpush

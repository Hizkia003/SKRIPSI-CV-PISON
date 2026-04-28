@extends('admin.layouts.app')
@section('title', 'Edit Layanan')
@section('page-title', 'Edit Layanan')

@section('content')
<form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.services._form', ['service' => $service])
</form>
@endsection
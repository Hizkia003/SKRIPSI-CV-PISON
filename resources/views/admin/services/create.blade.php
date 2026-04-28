@extends('admin.layouts.app')
@section('title', 'Tambah Layanan')
@section('page-title', 'Tambah Layanan')

@section('content')
<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.services._form')
</form>
@endsection
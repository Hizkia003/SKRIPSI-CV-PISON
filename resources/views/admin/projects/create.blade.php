@extends('admin.layouts.app')
@section('title', 'Tambah Proyek')
@section('page-title', 'Tambah Proyek')

@section('content')
<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.projects._form')
</form>
@endsection
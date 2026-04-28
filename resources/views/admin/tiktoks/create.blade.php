@extends('admin.layouts.app')
@section('title', 'Tambah Konten TikTok')
@section('page-title', 'Tambah Konten TikTok')

@section('content')
<form action="{{ route('admin.tiktoks.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.tiktoks._form')
</form>
@endsection
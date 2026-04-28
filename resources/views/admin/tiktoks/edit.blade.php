@extends('admin.layouts.app')
@section('title', 'Edit Konten TikTok')
@section('page-title', 'Edit Konten TikTok')

@section('content')
<form action="{{ route('admin.tiktoks.update', $tiktok) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.tiktoks._form', ['tiktok' => $tiktok])
</form>
@endsection
@extends('admin.layouts.app')
@section('title', 'Edit Proyek')
@section('page-title', 'Edit Proyek')

@section('content')
<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.projects._form', ['project' => $project])
</form>
@endsection
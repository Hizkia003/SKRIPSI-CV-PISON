@extends('admin.layouts.app')
@section('title', 'Tambah Layanan')
@section('page-title', 'Tambah Jasa Konstruksi')
@section('content')
<form action="{{ route('admin.jasa-konstruksi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.jasa-konstruksi._form')
</form>
@endsection

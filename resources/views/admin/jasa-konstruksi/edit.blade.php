@extends('admin.layouts.app')
@section('title', 'Edit Layanan')
@section('page-title', 'Edit Jasa Konstruksi')
@section('content')
<form action="{{ route('admin.jasa-konstruksi.update', $jasa_konstruksi) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.jasa-konstruksi._form', ['item' => $jasa_konstruksi])
</form>
@endsection

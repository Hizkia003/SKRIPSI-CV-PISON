@extends('admin.layouts.app')
@section('title', 'Tambah Material')
@section('page-title', 'Tambah Supply Material')
@section('content')
<form action="{{ route('admin.supply-materials.store') }}" method="POST">
    @csrf
    @include('admin.supply-materials._form')
</form>
@endsection

@extends('admin.layouts.app')
@section('title', 'Edit Material')
@section('page-title', 'Edit Supply Material')
@section('content')
    <form action="{{ route('admin.supply-materials.update', $supply_material) }}" method="POST"
        enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.supply-materials._form', ['material' => $supply_material])
    </form>
@endsection
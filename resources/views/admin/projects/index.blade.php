@extends('admin.layouts.app')
@section('title', 'Proyek')
@section('page-title', 'Manajemen Proyek')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Proyek</h5>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-warning"><i class="bi bi-plus-lg"></i> Tambah
            Proyek</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th width="90">Gambar</th>
                        <th>Nama Proyek</th>
                        <th>Kategori</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($p->thumbnail)
                            <img src="{{ asset('storage/'.$p->thumbnail) }}" class="table-img">
                            @else
                            <div class="table-img bg-light d-flex align-items-center justify-content-center"><i
                                    class="bi bi-image text-muted"></i></div>
                            @endif
                        </td>
                        <td><strong>{{ $p->title }}</strong></td>
                        <td><span class="badge badge-approved">{{ $p->category_label }}</span></td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $p) }}" class="btn btn-sm btn-warning btn-icon"><i
                                    class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger btn-icon btn-delete"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
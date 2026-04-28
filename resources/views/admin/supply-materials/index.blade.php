@extends('admin.layouts.app')
@section('title', 'Supply Material')
@section('page-title', 'Manajemen Supply Material')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Material</h5>
        <a href="{{ route('admin.supply-materials.create') }}" class="btn btn-warning"><i class="bi bi-plus-lg"></i> Tambah Material</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Nama Material</th>
                        <th>Deskripsi</th>
                        <th width="100">Status</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materials as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $m->title }}</strong></td>
                        <td class="text-muted small">{{ Str::limit($m->description, 80) }}</td>
                        <td>
                            @if($m->is_active)<span class="badge badge-approved">Aktif</span>
                            @else<span class="badge badge-rejected">Nonaktif</span>@endif
                        </td>
                        <td>
                            <a href="{{ route('admin.supply-materials.edit', $m) }}" class="btn btn-sm btn-warning btn-icon"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.supply-materials.destroy', $m) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger btn-icon btn-delete"><i class="bi bi-trash"></i></button>
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

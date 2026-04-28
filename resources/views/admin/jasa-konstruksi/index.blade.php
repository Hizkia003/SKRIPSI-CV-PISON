@extends('admin.layouts.app')
@section('title', 'Jasa Konstruksi')
@section('page-title', 'Manajemen Jasa Konstruksi')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Jasa Konstruksi</h5>
        <a href="{{ route('admin.jasa-konstruksi.create') }}" class="btn btn-warning"><i class="bi bi-plus-lg"></i> Tambah Layanan</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Nama Layanan</th>
                        <th>Deskripsi</th>
                        <th width="120">Foto</th>
                        <th width="100">Status</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jasas as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $j->title }}</strong></td>
                        <td class="text-muted small">{{ Str::limit($j->description, 60) }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                @foreach($j->images->take(3) as $img)
                                <img src="{{ asset('storage/'.$img->image) }}" style="width:35px;height:35px;object-fit:cover;border-radius:6px;">
                                @endforeach
                                @if($j->images->count() > 3)
                                <span class="badge bg-dark align-self-center">+{{ $j->images->count() - 3 }}</span>
                                @endif
                                @if($j->images->count() == 0)
                                <span class="text-muted small">-</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($j->is_active)<span class="badge badge-approved">Aktif</span>
                            @else<span class="badge badge-rejected">Nonaktif</span>@endif
                        </td>
                        <td>
                            <a href="{{ route('admin.jasa-konstruksi.edit', $j) }}" class="btn btn-sm btn-warning btn-icon"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.jasa-konstruksi.destroy', $j) }}" method="POST" class="d-inline">
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

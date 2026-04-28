@extends('admin.layouts.app')
@section('title', 'Layanan')
@section('page-title', 'Manajemen Layanan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Layanan</h5>
        <a href="{{ route('admin.services.create') }}" class="btn btn-warning"><i class="bi bi-plus-lg"></i> Tambah
            Layanan</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th width="80">Icon</th>
                        <th>Judul</th>
                        <th>Bahan / Lingkup</th>
                        <th width="100">Status</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $i => $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><i class="bi {{ $s->icon }}" style="font-size: 1.8rem; color: #FFC107;"></i></td>
                        <td><strong>{{ $s->title }}</strong></td>
                        <td>
                            @if($s->materials)
                                @foreach(explode(',', $s->materials) as $mat)
                                <span class="badge" style="background:#FFF8E1; color:#92400E; font-weight:500; margin:2px 0;">{{ trim($mat) }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($s->is_active)
                            <span class="badge badge-approved">Aktif</span>
                            @else
                            <span class="badge badge-rejected">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.services.edit', $s) }}" class="btn btn-sm btn-warning btn-icon"><i
                                    class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.services.destroy', $s) }}" method="POST" class="d-inline">
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
@extends('admin.layouts.app')
@section('title', 'Sertifikat')
@section('page-title', 'Manajemen Sertifikat')
@section('page-subtitle', 'Kelola sertifikat perusahaan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><i class="bi bi-patch-check-fill"></i>Daftar Sertifikat</h5>
            <a href="{{ route('admin.certificates.create') }}" class="btn btn-warning">
                <i class="bi bi-plus-lg"></i> Tambah Sertifikat
            </a>
        </div>
        <div class="card-body p-0">
            @if($certificates->count() > 0)
                <div class="table-responsive">
                    <table class="table datatable mb-0">
                        <thead>
                            <tr>
                                <th width="60">#</th>
                                <th>Nama Sertifikat</th>
                                <th>Nomor/ID</th>
                                <th>Kategori</th>
                                <th>File</th>
                                <th width="80">Urutan</th>
                                <th width="100">Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($certificates as $i => $cert)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td><strong>{{ $cert->name }}</strong></td>
                                    <td>{{ $cert->number ?? '-' }}</td>
                                    <td>
                                        @if($cert->category === 'company_legalitas')
                                            <span class="badge badge-info">Legalitas Perusahaan</span>
                                        @else
                                            <span class="badge badge-success">Sertifikat Pekerja</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($cert->file)
                                            <a href="{{ asset('storage/' . $cert->file) }}" target="_blank"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-file-pdf"></i> Lihat PDF
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $cert->order }}</td>
                                    <td>
                                        @if($cert->is_active)
                                            <span class="badge badge-approved"><i class="bi bi-check-circle"></i> Aktif</span>
                                        @else
                                            <span class="badge badge-rejected"><i class="bi bi-x-circle"></i> Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.certificates.edit', $cert->id) }}"
                                                class="btn btn-warning btn-icon btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon btn-sm btn-delete"
                                                    title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-patch-check"></i>
                    <h5>Belum Ada Sertifikat</h5>
                    <p>Mulai tambahkan sertifikat perusahaan Anda</p>
                    <a href="{{ route('admin.certificates.create') }}" class="btn btn-warning">
                        <i class="bi bi-plus-lg"></i> Tambah Sertifikat Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
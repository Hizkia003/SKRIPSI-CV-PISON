@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Pesan</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $c)
                    <tr style="{{ !$c->is_read ? 'background:#fffbea;' : '' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $c->name }}</strong>
                            @if(!$c->is_read)<span class="badge bg-warning ms-1">BARU</span>@endif
                        </td>
                        <td><small>{{ $c->contact }}</small></td>
                        <td>{{ $c->subject ?: '-' }}</td>
                        <td class="text-muted small">{{ Str::limit($c->message, 60) }}</td>
                        <td><small>{{ $c->created_at->format('d M Y') }}</small></td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $c->id) }}"
                                class="btn btn-sm btn-warning btn-icon"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.contacts.destroy', $c->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger btn-icon btn-delete"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada pesan masuk</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $contacts->links() }}</div>
    </div>
</div>
@endsection
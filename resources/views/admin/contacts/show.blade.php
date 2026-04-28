@extends('admin.layouts.app')
@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Pesan dari {{ $contact->name }}</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-dark"><i
                        class="bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="150"><strong>Nama</strong></td>
                        <td>: {{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>No. Telp / Email</strong></td>
                        <td>: {{ $contact->contact }}</td>
                    </tr>
                    <tr>
                        <td><strong>Subjek</strong></td>
                        <td>: {{ $contact->subject ?: '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal</strong></td>
                        <td>: {{ $contact->created_at->format('d F Y, H:i') }}</td>
                    </tr>
                </table>
                <hr>
                <h6>Isi Pesan:</h6>
                <div class="p-3 rounded" style="background:#f8f9fa; white-space: pre-wrap;">{{ $contact->message }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5>Aksi Cepat</h5>
            </div>
            <div class="card-body d-grid gap-2">
                @if(filter_var($contact->contact, FILTER_VALIDATE_EMAIL))
                <a href="mailto:{{ $contact->contact }}" class="btn btn-warning"><i
                        class="bi bi-envelope-fill me-1"></i> Balas via Email</a>
                @else
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->contact) }}" target="_blank"
                    class="btn btn-success"><i class="bi bi-whatsapp me-1"></i> Balas via WhatsApp</a>
                @endif
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger w-100 btn-delete"><i class="bi bi-trash me-1"></i> Hapus
                        Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
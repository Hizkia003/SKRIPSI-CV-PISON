@extends('admin.layouts.app')
@section('title', 'Edit Tentang Kami')
@section('page-title', 'Tentang Kami')

@section('content')
    {{-- Form Profil Perusahaan --}}
    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf @method('PUT')
        <div class="row g-3 mb-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Informasi Perusahaan</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Perusahaan *</label>
                            <input type="text" name="company_name" class="form-control"
                                value="{{ old('company_name', $about->company_name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea name="description" rows="5" class="form-control"
                                required>{{ old('description', $about->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-warning w-100 btn-lg">
                            <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Manajemen Visi, Misi, Keunggulan --}}
    <div class="card">
        <div class="card-header">
            <h5><i class="bi bi-gear-fill"></i> Visi, Misi & Keunggulan</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="visionTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="visi-tab" data-bs-toggle="pill" data-bs-target="#visi-panel"
                        type="button" role="tab">Visi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="misi-tab" data-bs-toggle="pill" data-bs-target="#misi-panel" type="button"
                        role="tab">Misi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="keunggulan-tab" data-bs-toggle="pill" data-bs-target="#keunggulan-panel"
                        type="button" role="tab">Keunggulan</button>
                </li>
            </ul>

            <div class="tab-content" id="visionTabContent">
                {{-- Panel Visi --}}
                <div class="tab-pane fade show active" id="visi-panel" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-semibold">Daftar Visi</span>
                        <button class="btn btn-warning btn-sm btn-add" data-type="vision">
                            <i class="bi bi-plus-lg"></i> Tambah
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="tbl-vision">
                            <thead>
                                <tr>
                                    <th width="60">#</th>
                                    <th>Isi</th>
                                    <th width="100">Status</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                {{-- Panel Misi --}}
                <div class="tab-pane fade" id="misi-panel" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-semibold">Daftar Misi</span>
                        <button class="btn btn-warning btn-sm btn-add" data-type="mission">
                            <i class="bi bi-plus-lg"></i> Tambah
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="tbl-mission">
                            <thead>
                                <tr>
                                    <th width="60">#</th>
                                    <th>Isi</th>
                                    <th width="100">Status</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                {{-- Panel Keunggulan --}}
                <div class="tab-pane fade" id="keunggulan-panel" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-semibold">Daftar Keunggulan</span>
                        <button class="btn btn-warning btn-sm btn-add" data-type="advantage">
                            <i class="bi bi-plus-lg"></i> Tambah
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="tbl-advantage">
                            <thead>
                                <tr>
                                    <th width="60">#</th>
                                    <th>Nama</th>
                                    <th>Penjelasan</th>
                                    <th width="100">Status</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah/Edit --}}
    <div class="modal fade" id="modalItem" tabindex="-1">
        <div class="modal-dialog">
            <form id="formItem" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="type">
                    <div class="mb-3">
                        <label class="form-label">Nama Keunggulan <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penjelasan <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-control" value="0" min="0">
                    </div>
                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" value="1" checked>
                        <label class="form-check-label" for="isActive">Aktif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(function () {
            // Tipe yang sesuai dengan route resource & data
            const types = ['vision', 'mission', 'advantage'];

            // Load data untuk semua tipe saat halaman dibuka
            types.forEach(type => loadData(type));

            // Saat tab berpindah, reload data
            $('button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
                let tabId = $(e.target).attr('id'); // visi-tab, misi-tab, keunggulan-tab
                let typeMap = {
                    'visi-tab': 'vision',
                    'misi-tab': 'mission',
                    'keunggulan-tab': 'advantage'
                };
                let type = typeMap[tabId];
                loadData(type);
            });

            // Fungsi memuat data dari server
            function loadData(type) {
                let tableId = '#tbl-' + type; // tbl-vision, tbl-mission, tbl-advantage
                let url = '/admin/' + type + 's/data'; // /admin/visions/data, dsb.
                $.get(url, function (data) {
                    let tbody = $(tableId + ' tbody').empty();
                    if (!data || data.length === 0) {
                        tbody.append('<tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>');
                        return;
                    }
                    data.forEach((item, i) => {
                        let statusBadge = item.is_active ? '<span class="badge badge-approved">Aktif</span>' : '<span class="badge badge-rejected">Nonaktif</span>';
                        let row = `<tr>
                                    <td>${i + 1}</td>
                                    <td>${item.name}</td>
                                    <td>${item.content ? item.content.substring(0, 50) + '...' : '-'}</td>
                                    <td>${statusBadge}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-edit me-1" data-id="${item.id}" data-type="${type}"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm btn-delete" data-id="${item.id}" data-type="${type}"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>`;
                        tbody.append(row);
                    });
                });
            }

            // Tombol Tambah
            $('.btn-add').click(function () {
                let type = $(this).data('type'); // vision, mission, advantage
                $('#formItem')[0].reset();
                $('#formItem input[name=id]').val('');
                $('#formItem input[name=type]').val(type);
                $('#formItem input[name=order]').val(0);
                $('#formItem input[name=is_active]').prop('checked', true);
                // Modal title
                let label = type.charAt(0).toUpperCase() + type.slice(1);
                $('#modalItem .modal-title').text('Tambah ' + label);
                $('#modalItem').modal('show');
            });

            // Tombol Edit
            $(document).on('click', '.btn-edit', function () {
                let id = $(this).data('id');
                let type = $(this).data('type');
                $.get('/admin/' + type + 's/data', function (allData) {
                    let item = allData.find(d => d.id == id);
                    if (item) {
                        $('#formItem input[name=id]').val(item.id);
                        $('#formItem input[name=type]').val(type);
                        $('#formItem textarea[name=content]').val(item.content);
                        $('#formItem input[name=order]').val(item.order || 0);
                        $('#formItem input[name=is_active]').prop('checked', item.is_active ? true : false);
                        let label = type.charAt(0).toUpperCase() + type.slice(1);
                        $('#modalItem .modal-title').text('Edit ' + label);
                        $('#modalItem').modal('show');
                    }
                });
            });

            // Submit form Tambah/Edit
            $('#formItem').submit(function (e) {
                e.preventDefault();
                let id = $('#formItem input[name=id]').val();
                let type = $('#formItem input[name=type]').val();
                let formData = {
                    name: $('#formItem input[name=name]').val(),
                    content: $('#formItem textarea[name=content]').val(),
                    order: $('#formItem input[name=order]').val(),
                    is_active: $('#formItem input[name=is_active]').is(':checked') ? 1 : 0,
                    _token: $('input[name=_token]').val()
                };
                let url = '/admin/' + type + 's';
                let method = 'POST';
                if (id) {
                    url += '/' + id;
                    formData._method = 'PUT';
                }
                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    headers: { 'Accept': 'application/json' },
                    success: function () {
                        $('#modalItem').modal('hide');
                        loadData(type);
                        alert('Data berhasil disimpan');
                    },
                    error: function (xhr) {
                        let errMsg = 'Terjadi kesalahan.';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let firstError = Object.values(xhr.responseJSON.errors)[0][0];
                            errMsg = firstError;
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errMsg = xhr.responseJSON.message;
                        }
                        alert(errMsg);
                    }
                });
            });

            // Hapus data
            $(document).on('click', '.btn-delete', function () {
                if (!confirm('Yakin ingin menghapus data ini?')) return;
                let id = $(this).data('id');
                let type = $(this).data('type');
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/' + type + 's/' + id,
                    data: { _token: $('input[name=_token]').val() },
                    headers: { 'Accept': 'application/json' },
                    success: function () {
                        loadData(type);
                        alert('Data berhasil dihapus');
                    },
                    error: function (xhr) {
                        let errMsg = 'Gagal menghapus';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errMsg = xhr.responseJSON.message;
                        }
                        alert(errMsg);
                    }
                });
            });
        });
    </script>
@endsection
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Pison Teknik Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>

<body>

    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <div class="admin-wrapper">
        <aside class="admin-sidebar" id="sidebar">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-brand-link">
                    <img src="{{ asset('images/logo-no-bg-(admin).png') }}" alt="PISON TEKNIK" class="sidebar-logo">
                    <div class="sidebar-brand-text">
                        <h5>CV. PISON TEKNIK INDONESIA</h5>
                        <small>Admin Panel</small>
                    </div>
                </a>
            </div>

            <nav class="sidebar-nav">
                <div class="sidebar-group">
                    <span class="sidebar-group-label">Main</span>
                    <ul>
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="bi bi-speedometer2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-group">
                    <span class="sidebar-group-label">Konten Website</span>
                    <ul>
                        {{-- SUPPLY MATERIAL --}}
                        <li>
                            <a href="{{ route('admin.supply-materials.index') }}"
                                class="{{ request()->routeIs('admin.supply-materials*') ? 'active' : '' }}">
                                <i class="bi bi-box-seam-fill"></i>
                                <span>Supply Material</span>
                            </a>
                        </li>

                        {{-- JASA KONSTRUKSI --}}
                        <li>
                            <a href="{{ route('admin.jasa-konstruksi.index') }}"
                                class="{{ request()->routeIs('admin.jasa-konstruksi*') ? 'active' : '' }}">
                                <i class="bi bi-building-fill-gear"></i>
                                <span>Jasa Konstruksi</span>
                            </a>
                        </li>

                        {{-- PROJECTS --}}
                        <li>
                            <a href="{{ route('admin.projects.index') }}"
                                class="{{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                                <i class="bi bi-building-check"></i>
                                <span>Projects</span>
                            </a>
                        </li>

                        {{-- CERTIFICATES --}}
                        <li>
                            <a href="{{ route('admin.certificates.index') }}"
                                class="{{ request()->routeIs('admin.certificates*') ? 'active' : '' }}">
                                <i class="bi bi-patch-check-fill"></i>
                                <span>Sertifikat</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Group Pengaturan (Info Kontak) --}}
                <div class="sidebar-group">
                    <span class="sidebar-group-label">Pengaturan</span>
                    <ul>
                        <li>
                            <a href="{{ route('admin.contact-info.edit') }}"
                                class="{{ request()->is('admin/contact-info') ? 'active' : '' }}">
                                <i class="bi bi-building"></i> Info Kontak
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <div class="admin-main">
            <header class="admin-topbar">
                <button class="sidebar-toggle" id="sidebarToggle" type="button"><i class="bi bi-list"></i></button>
                <div class="topbar-breadcrumb">
                    <h5>@yield('page-title', 'Dashboard')</h5>
                    <small>@yield('page-subtitle', 'Selamat datang di dashboard admin')</small>
                </div>
                <div class="topbar-right">
                    {{-- Ikon pesan masuk di topbar telah dihapus --}}
                    <div class="dropdown">
                        <button class="btn user-btn dropdown-toggle" data-bs-toggle="dropdown">
                            @php $user = auth()->user(); @endphp
                            @if($user && $user->avatar)
                                <img src="{{ $user->avatar }}" class="user-avatar-img" alt="Avatar">
                            @else
                                <div class="user-avatar">{{ strtoupper(substr($user?->name ?? 'A', 0, 1)) }}</div>
                            @endif
                            <span class="d-none d-md-inline">{{ $user?->name ?? 'Admin' }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><span class="dropdown-item-text small text-muted">{{ $user?->email ?? '' }}</span></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <main class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible"><i class="bi bi-check-circle-fill"></i><span>{{ session('success') }}</span><button class="btn-close" onclick="this.parentElement.remove()">×</button></div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible"><i class="bi bi-x-circle-fill"></i><span>{{ session('error') }}</span><button class="btn-close" onclick="this.parentElement.remove()">×</button></div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <div><strong>Ada {{ $errors->count() }} kesalahan:</strong>
                            <ul class="mb-0 mt-1 ps-3">@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul>
                        </div>
                        <button class="btn-close" onclick="this.parentElement.remove()">×</button>
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="admin-footer">
                <div class="admin-footer-container">
                    <div class="admin-footer-left">
                        <p class="mb-0">&copy; {{ date('Y') }} <strong>PISON TEKNIK INDONESIA</strong>. All Rights Reserved.</p>
                    </div>
                    <div class="admin-footer-right">
                        <span class="admin-footer-version"><i class="bi bi-code-slash"></i> Admin Panel v1.0</span>
                        <span class="admin-footer-divider">|</span>
                        <a href="{{ url('/') }}" target="_blank" class="admin-footer-link"><i class="bi bi-globe"></i> Lihat Website</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
</body>

</html>
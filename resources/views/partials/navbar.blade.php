<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            {{-- Ganti icon dengan logo --}}
            <img src="{{ asset('images/logo-no-bg.png') }}" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                        href="{{ url('/about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('supply-material') ? 'active' : '' }}"
                        href="{{ url('/supply-material') }}">Supply Material</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('jasa-konstruksi') ? 'active' : '' }}"
                        href="{{ url('/jasa-konstruksi') }}">Jasa Konstruksi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}"
                        href="{{ url('/projects') }}">Projects</a></li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('certificates') ? 'active' : '' }}"
                        href="{{ url('/certificates') }}">
                        Sertifikat
                    </a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-warning btn-cta" href="{{ url('/contact') }}">
                        <i class="bi bi-telephone-fill me-1"></i> Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
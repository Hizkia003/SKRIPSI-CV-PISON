<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Pison Teknik</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
    .btn-google {
        background: white;
        color: #3c4043;
        border: 2px solid #dadce0;
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 500;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        transition: all 0.3s;
        width: 100%;
    }

    .btn-google:hover {
        background: #f8f9fa;
        border-color: #FFC107;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
        color: #3c4043;
    }

    .google-icon {
        width: 20px;
        height: 20px;
    }

    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #999;
        font-size: 0.85rem;
        margin: 25px 0;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e0e0e0;
    }

    .divider::before {
        margin-right: 15px;
    }

    .divider::after {
        margin-left: 15px;
    }

    .info-box {
        background: #fff8e1;
        border-left: 4px solid #FFC107;
        padding: 15px;
        border-radius: 8px;
        font-size: 0.85rem;
        color: #6d4c00;
    }
    </style>
</head>

<body class="login-page">
    <div class="login-card">
        <div class="login-logo">
            <div class="icon"><i class="bi bi-building-gear"></i></div>
            <h3>PISON <span class="text-warning">ADMIN</span></h3>
            <p>Login menggunakan akun Google Anda</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
        </div>
        @endif

        <!-- Google Login Button -->
        <a href="{{ route('admin.google.redirect') }}" class="btn-google">
            <svg class="google-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <path fill="#FFC107"
                    d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z" />
                <path fill="#FF3D00"
                    d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691z" />
                <path fill="#4CAF50"
                    d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z" />
                <path fill="#1976D2"
                    d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z" />
            </svg>
            <span>Lanjutkan dengan Google</span>
        </a>

        <div class="divider">ATAU</div>

        <div class="info-box">
            <i class="bi bi-info-circle-fill me-1"></i>
            <strong>Info:</strong> Hanya email yang terdaftar sebagai admin yang dapat login. Hubungi administrator jika
            Anda membutuhkan akses.
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="text-muted small">
                <i class="bi bi-arrow-left"></i> Kembali ke Website
            </a>
        </div>
    </div>
</body>

</html>
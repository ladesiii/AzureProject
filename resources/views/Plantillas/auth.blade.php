<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | MiApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

<div class="auth-container d-flex flex-column flex-md-row min-vh-100">
    {{-- Sección color/logo --}}
    <div class="auth-side d-flex justify-content-center align-items-center text-white @yield('side-position')">
        <div class="text-center p-5 side-inner">
            <h2 class="logo-text">@yield('side-title')</h2>
            <div class="logo-container mt-5">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid logo-img">
            </div>
        </div>
    </div>

    {{-- Sección formulario --}}
    <div class="auth-form d-flex flex-column flex-fill p-4">
        <div class="form-header d-flex align-items-center mb-4 ps-3">
            <a href="{{ route('landing') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="form-logo me-2">
                <span class="form-title">AzureProject</span>
            </a>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-grow-1">
            <div class="w-100" style="max-width: 400px;">
                @yield('form-content')
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


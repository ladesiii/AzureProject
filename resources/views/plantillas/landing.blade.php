<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzureProject</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column vh-100">
        <header class="nav-landing">
            <nav class="navbar d-flex align-items-center">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('landing') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="70" height="70" class="d-inline-block">
                        <span class="ms-2 fw-bold align-middle titulo-header">AzureProject</span>
                    </a>
                    <div class="ms-auto">
                        <a class="btn-auth me-3">INICIAR SESIÓN</a>
                        <a class="btn-auth me-3">REGISTRARSE</a>
                    </div>
                </div>
            </nav>
        </header>
        <main class="flex-grow-1 d-flex align-items-center overflow-auto">
            @yield('content')
        </main>
    </div>

</body>

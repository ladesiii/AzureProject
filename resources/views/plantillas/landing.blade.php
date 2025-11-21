<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzureProject</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                    <div class="ms-auto d-flex align-items-center">
                        @auth
                            <div class="dropdown">
                                <button class="btn-auth dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-2" aria-hidden="true"></i>
                                    {{ auth()->user()->name ?? auth()->user()->nombre ?? auth()->user()->email }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('proyecto.index') }}">Mis proyectos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('tareas.index') }}">Mis tareas</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <!-- Visible on large and up: regular buttons -->
                            <a href="{{ route('login') }}" class="btn-auth me-3 d-none d-lg-inline-block">INICIAR SESIÓN</a>
                            <a href="{{ route('registro') }}" class="btn-auth me-3 d-none d-lg-inline-block">REGISTRARSE</a>

                            <!-- Visible on tablet and smaller (< lg): dropdown -->
                            <div class="dropdown d-block d-lg-none">
                                <button class="btn-auth dropdown-toggle" type="button" id="authDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-list" aria-hidden="true"></i>
                                    <span class="visually-hidden">Menú</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="authDropdown">
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar sesión</a></li>
                                    <li><a class="dropdown-item" href="{{ route('registro') }}">Registrarse</a></li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>
        <main class="flex-grow-1 d-flex align-items-center overflow-auto">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS (bundle includes Popper) for dropdowns to work -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

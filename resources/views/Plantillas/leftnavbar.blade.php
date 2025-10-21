<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex">
    <header>
        <nav class="main-section">
            <ul class="sidebar nav flex-column min-vh-100">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="110" height="110" class="d-inline-block">
                <li class="nav-item">
                    <h1>AzureProject</h1>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/') }}" class="btn-base btn-primary">INICIO</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('proyecto') }}" class="btn-base btn-primary">PROYECTOS</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/index') }}" class="btn-base btn-primary">TAREAS</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn-base btn-outline">Cerrar sesión</a>
                </li>
            </ul>
        </nav>
    </header>



    <main class="MainContent w-100 pe-4">
        @yield('contenido')
    </main>

</body>

</html>

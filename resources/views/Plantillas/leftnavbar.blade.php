<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <title>AzureProjec</title>
</head>

<body class="d-flex">
    <header>
        <nav class="main-section">
            <ul class="sidebar nav flex-column min-vh-100">
                <div class="h33 sideblock">
                <div class="h33 row logoBlock">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 200px"
                        class="d-inline-block">
                    <li class="nav-item">
                        <h2>AzureProject</h2>
                    </li>
                </div>


                <div class="h33 sideblock">
                <div class="h33 row">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="btn-base btn-primary">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('proyecto') }}" class="btn-base btn-primary">PROYECTOS</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('tareas') }}" class="btn-base btn-primary">TAREAS</a>
                    </li>

                </div>

                <div class="h33 sideblock">
                <div class="h33 row">
                    <li class="nav-item bottonCerrar">
                        <a href="#" class="btn-base btn-outline">Cerrar sesión</a>
                    </li>
                </div>

            </ul>
        </nav>
    </header>


    <main class="MainContent w-100 pe-4">
        @yield('contenido')
    </main>

</body>

</html>

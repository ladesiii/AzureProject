<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzureProject</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('titulo')</title>
</head>

<body>

    <section class="main-section">
        <ul class="sidebar nav flex-column">
            <li class="nav-item">
                <h1>AzureProject</h1>
            </li>

            <li class="nav-item">
                <a href="{{ url('/') }}" class="btn-nav">INICIO</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('proyecto') }}" class="btn-nav">PROYECTOS</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/index') }}" class="btn-nav">TAREAS</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/index') }}" class="btn-nav-outline">Buscar</a>
            </li>

            <li class="nav-item">
                <button class="btn-nav" type="button">Cerrar sesión</button>
            </li>
        </ul>

        <div class="content">
            <h2>TAREAS DE NOMBRE PROYECTO</h2>
            <div></div>
        </div>
    </section>

    <div class="container">
        @yield('contenido')
    </div>


</body>

</html>

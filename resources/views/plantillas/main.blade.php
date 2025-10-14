<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <title>@yield('titulo')</title>

</head>

<body>

    <section style="display: flex">
        <ul class="nav flex-column"
            style="background-color:#0993AE; padding: 40px; width:25%; display:flex; align-items:center;">

            <li class="nav-item">
                <h1 style="color:white">AzureProject</h1>
            </li>

            <p style="padding: 25px 0px 25px 0px"></p>


            <li class="nav-item">
                <button
                    style="background-color: #2AD3F4; color:white; border:none; border-radius:25%; padding:10px 30px 10px 30px; margin:10px;"
                    type="button">INICIO
                </button>
            </li>
            <li class="nav-item">
                <button
                    style="background-color: #2AD3F4; color:white; border:none; border-radius:25%; padding:10px 30px 10px 30px; margin:10px;"
                    type="button">PROYECTOS
                </button>
            </li>
            <li class="nav-item">
                <button
                    style="background-color: #2AD3F4; color:white; border:none; border-radius:25%; padding:10px 30px 10px 30px; margin:10px;"
                    type="button">TAREAS
                </button>
            </li>
            <p style="padding: 25px 0px 25px 0px"></p>
            <li class="nav-item">
                <button
                    style="background-color: #2AD3F4; color:white; border:none; border-radius:25%; padding:10px 30px 10px 30px; margin:10px;"
                    type="button">Cerrar sesión
                </button>
            </li>
        </ul>

        <div style="background-color: white; width:60%; align-items:center; border:solid #8BE7F9 30px; ">
            <h2 style="margin: 10px">TAREAS DE NOMBRE PROYECTO</h2>
            
        </div>
    </section>


    <div class="container">
        @yield('contenido')
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <title>Registro</title>
</head>
{{-- el css es el de la carpeta public --}}
<body>
<div id="divIzquierdo">
    <div class="contenedor-registro">
        <h2>Te damos la bienvenida a <h2 id="azpInicio">AzureProject</h2></h2>
        
        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="formRegistro" method="POST" action="{{ route('registro.store') }}">
            @csrf
            <div class="mb-3">{{-- mb-3 es estilo de bootstrap --}}
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
            <p class="text-center mt-3">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
    </div>
</div>
<div id="divDerecho">
    <div class="textoDerecho">
        <h2>COMIENZA A GESTIONAR</h2>
        <h2>TUS PROYECTOS</h2>
    </div>
    <img class="imagenRegistro" src="{{ asset('img/logo.png') }}" alt="Imagen de registro">
</div>
</body>

</html>

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
    <script>
        // Refrescar token CSRF cada 10 minutos para evitar "Page Expired"
        setInterval(function() {
            fetch('/registro')
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newToken = doc.querySelector('input[name="_token"]').value;
                    document.querySelector('input[name="_token"]').value = newToken;
                });
        }, 600000); // 10 minutos
    </script>
    <title>Registro</title>
</head>
{{-- el css es el de la carpeta public --}}
<body>
<div id="divIzquierdo">
    <div class="contenedor-registro">
        <h2>Te damos la bienvenida a <h2 id="azpInicio">AzureProject</h2></h2>

        @if ($errors->any())
            <div class="alert alert-danger" style="margin: 20px auto; max-width: 400px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="formRegistro" method="POST" action="{{ route('registro.store') }}">
            @csrf
            <div class="mb-3">{{-- mb-3 es estilo de bootstrap --}}
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email') }}"
                       aria-describedby="emailHelp" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control"
                       id="password_confirmation" name="password_confirmation" required>
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

@extends('Plantillas.auth')

@section('title', 'Iniciar Sesión')

@section('side-position', 'right')
@section('side-title', 'Sigue gestionando tus proyectos')

@section('form-content')
<h3 class="mb-4 text-center">Iniciar sesión</h3>

<form method="POST" action="{{ route('login')}}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Entrar</button>
</form>

<p class="text-center mt-3">
    ¿No tienes cuenta?
    <a href="" class="text-primary">Regístrate</a>
</p>
@endsection


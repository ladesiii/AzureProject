@extends('Plantillas.auth')

@section('title', 'Hola de nuevo')

@section('side-position', 'right')
@section('side-title', 'Sigue gestionando tus proyectos')

@section('form-content')
<h3 class="mb-4 text-center auth-title">
    Hola de nuevo a
    <span class="color-letra d-block mt-2">AzureProject</span>
</h3>

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

    <button type="submit" class="btn-auth w-100">INICIAR SESIÓN</button>
</form>

<p class="text-center mt-3">
    ¿No tienes cuenta?
    <a href="{{ route('registro') }}" class="color-letra">Regístrate</a>
</p>
@endsection


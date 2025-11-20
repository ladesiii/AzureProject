@extends('Plantillas.auth')

@section('title', 'Hola de nuevo')

@section('side-position', 'right')
@section('side-title', 'Sigue gestionando tus proyectos')

@section('form-content')
<h3 class="mb-4 text-center auth-title">
    Hola de nuevo a
    <span class="color-letra d-block mt-2">AzureProject</span>
</h3>

@if(session('error_type') === 'email_not_found')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>¡Error!</strong> Este correo no está registrado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error_type') === 'password_incorrect')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>¡Error!</strong> La contraseña no coincide.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form method="POST" action="{{ route('login.submit')}}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <div class="password-toggle-wrapper">
            <input type="password" name="password" id="password" class="form-control" required>
            <button type="button" class="password-toggle-btn" onclick="togglePassword()">
                <i class="bi bi-eye" id="toggleIcon"></i>
            </button>
        </div>
    </div>

    <button type="submit" class="btn-auth w-100">INICIAR SESIÓN</button>
</form>

<script src="{{ asset('resources/js/login.js') }}"></script>

<p class="text-center mt-3">
    ¿No tienes cuenta?
    <a href="{{ route('registro') }}" class="color-letra">Regístrate</a>
</p>
@endsection


@extends('Plantillas.auth')

@section('title', 'Registro')

@section('side-position', 'right')
@section('side-title', 'Comienza a gestionar tus proyectos')

@section('form-content')
<h3 class="mb-4 text-center auth-title">
    Bienvenido a
    <span class="color-letra d-block mt-2">AzureProject</span>
</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('registro.submit') }}">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>


    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <div class="password-toggle-wrapper">
            <input type="password" name="password" id="password" class="form-control" required>
            <button type="button" class="password-toggle-btn" aria-label="Mostrar u ocultar contraseña">
                <i class="bi bi-eye password-toggle-icon" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
        <div class="password-toggle-wrapper">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            <button type="button" class="password-toggle-btn" aria-label="Mostrar u ocultar contraseña">
                <i class="bi bi-eye password-toggle-icon" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <button type="submit" class="btn-auth w-100">REGISTRARSE</button>
</form>

<p class="text-center mt-3">
    ¿Ya tienes cuenta?
    <a href="{{ route('login') }}" class="color-letra">Inicia sesión</a>
</p>
<script src="{{ asset('js/login.js') }}"></script>
@endsection

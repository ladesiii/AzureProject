@extends('plantillas.landing')

@section('content')
    <div class=" container ms-5">
        <h1 >
            Un espacio pensado para que estudiantes como tú transformen ideas
            en grandes logros.
        </h1>
        <h4>
            Crea proyectos únicos: desde investigaciones hasta emprendimientos,
            todo comienza con una idea.
            Comparte y colabora: construir, aprender y
            crezcan juntos.
Organiza tu trabajo: todo en un mismo lugar, accesible siempre que lo necesites.</h4>
        <button type="button" class="btn-auth">CREAR PROYECTO</button>
    </div>
    <div class=" container ms-5">
         <img src="{{ asset('img/landing.png') }}" alt="Logo" class="d-inline-block img-landing">
    </div>
@endsection


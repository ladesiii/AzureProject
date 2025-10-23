@extends('plantillas.landing')

@section('content')
    <div class="container ms-5 ctn-landing">
        <h1 class="mb-5 me-5">
            Un espacio pensado para que estudiantes como tú transformen ideas
            en grandes logros.
        </h1>
        <h4 class="">
            <span class="color-letra">Crea proyectos únicos:</span> desde investigaciones hasta emprendimientos, todo comienza con una idea.
        </h4>
        <h4 class="">
           <span class="color-letra"> Comparte y colabora:</span> construir, aprender y crecer juntos.
        </h4>
        <h4 class="mb-5">
            <span class="color-letra">Organiza tu trabajo:</span> todo en un mismo lugar, accesible siempre que lo necesites.
        </h4>
        <button type="button" class="btn-auth">CREAR PROYECTO</button>
    </div>
    <div class=" container mb-5 me-5">
         <img src="{{ asset('img/landing.png') }}" alt="Logo" class="d-inline-block img-landing">
    </div>
@endsection


@extends('plantillas.landing')

@section('content')
    <div class="container-fluid px-4 px-md-5 py-3">
        <div class="row justify-content-center align-items-center g-4">
            <div class="col-12 col-lg-5">
                <h1 class="mb-5">
                    Un espacio pensado para que estudiantes como tú transformen ideas
                    en grandes logros.
                </h1>
                <div class="d-flex flex-column gap-4">
                    <h4>
                        <span class="color-letra">Crea proyectos únicos:</span> desde investigaciones hasta emprendimientos, todo comienza con una idea.
                    </h4>
                    <h4>
                       <span class="color-letra">Comparte y colabora:</span> construir, aprender y crecer juntos.
                    </h4>
                    <h4>
                        <span class="color-letra">Organiza tu trabajo:</span> todo en un mismo lugar, accesible siempre que lo necesites.
                    </h4>
                </div>
                <div class="mt-5">
                    <a href="{{ route('proyecto') }}?openModal=true" class="btn-auth text-decoration-none d-inline-block text-center">CREAR PROYECTO</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img src="{{ asset('img/landing.png') }}" alt="Logo" class="img-fluid img-landing">
            </div>
        </div>
    </div>
@endsection


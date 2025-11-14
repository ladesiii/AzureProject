@extends('Plantillas.leftnavbar')
@extends('proyecto.cardProyecto')

@section('contenido')

    <head>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <title>Proyecto</title>
    </head>
    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">PROYECTOS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn-auth btn-lg" data-bs-toggle="modal" data-bs-target="#modalCrearProyecto">CREAR
                    PROYECTO</button>
            </div>
        </div>

        <div class="card-proyecto" id="contenedor-proyectos">
            @foreach ($proyectos as $proyecto)
                @include('proyecto.cardProyecto', [
                    'titulo' => $proyecto->titulo,
                    'tareas' => $proyecto->tareas,
                    'proyectoId' => $proyecto->id,
                    'usuarios' => $proyecto->usuarios
                ])
            @endforeach
        </div>
    </div>
    </div>
    <script src="{{ asset('js/proyecto.js') }}"></script>
@endsection
@include('modals.crearProyecto')
@include('modals.editarProyecto')
@include('modals.eliminarProyecto')
@include('modals.gestionarUsuarios')

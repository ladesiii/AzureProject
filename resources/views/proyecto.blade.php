@extends('Plantillas.leftnavbar')

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

            {{--
                Cambio sencillo: por cada proyecto se muestra una tarjeta (.card-body.card-body-proyecto).
                - Mostrar el título del proyecto
                - Mostrar hasta 3 tareas asociadas (si las hay), cada una en su propio bloque (sin repetir)
                - Mostrar 3 iconos (editar, borrar, usuarios) una sola vez por tarjeta
            --}}

            @foreach ($proyectos as $proyecto)
                <div class="card-body card-body-proyecto">
                    <h5 class="card-title">{{ $proyecto->nombre }}</h5>
                    <hr>

                    {{-- Mostrar hasta 3 tareas --}}
                    @if ($proyecto->tareas && $proyecto->tareas->count() > 0)
                        <div class="tasks-list">
                            @foreach ($proyecto->tareas->take(3) as $tarea)
                                <div class="task-item mb-2">
                                    <strong class="d-block">{{ $tarea->nombre }}</strong>
                                    @if (!empty($tarea->descripcion))
                                        <div class="lista-tareas">
                                            <li class="text-muted small">{{ $tarea->descripcion }}</li>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No hay tareas para este proyecto.</p>
                    @endif

                    {{-- Iconos de acciones (una sola vez por tarjeta) --}}
                    <div class="project-actions mt-3">
                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto">
                            <img src="{{ asset('img/edit.png') }}" alt="edit" class="d-inline-block"
                                style="width:20px;height:20px;">
                        </a>
                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto">
                            <img src="{{ asset('img/trash.png') }}" alt="trash" class="d-inline-block"
                                style="width:20px;height:20px;">
                        </a>
                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios">
                            <img src="{{ asset('img/user.png') }}" alt="user" class="d-inline-block"
                                style="width:20px;height:20px;">
                        </a>
                    </div>

                </div>
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

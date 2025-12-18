@extends('plantillas.leftnavbar')

@section('contenido')

    <head>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <title>Proyecto</title>
    </head>
    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">PROYECTOS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button"
                class="btn-auth btn-lg"
                data-bs-toggle="modal"
                data-bs-target="#modalCrearProyecto">
                CREAR PROYECTO
            </button>

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
                    <a href="{{ route('tareas.proyecto', ['proyecto' => $proyecto->id_proyecto]) }}" style="text-decoration: none; color: inherit;">
                        <h5 class="card-title">{{ $proyecto->nombre }}</h5>
                    </a>
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
                    {{-- ACCIONES --}}
                     {{-- EDITAR --}}
                    <div class="project-actions mt-3">
                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto" data-id="{{ $proyecto->id_proyecto }}" data-nombre="{{ $proyecto->nombre }}">
                            <img src="{{ asset('img/edit.png') }}" alt="edit" class="d-inline-block"
                                style="width:20px;height:20px;">
                        </a>
                    {{-- ELIMINAR --}}
                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto-{{ $proyecto->id_proyecto }}">
                            <img src="{{ asset('img/trash.png') }}" alt="trash" class="d-inline-block"
                                style="width:20px;height:20px;">
                        </a>
                    {{-- GESTIONAR USUARIOS --}}
                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios">
                            <img src="{{ asset('img/user.png') }}" alt="user" class="d-inline-block"
                                style="width:20px;height:20px;">
                        </a>
                    </div>
                    {{-- Modal eliminar específico de este proyecto --}}
                    @include('modals.eliminarProyecto', ['proyecto' => $proyecto])
                </div>
            @endforeach
        </div>
    </div>
@endsection
@include('modals.crearProyecto')
@include('modals.editarProyecto')
@include('modals.gestionarUsuarios')

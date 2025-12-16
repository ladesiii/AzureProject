@extends('plantillas.leftnavbar')

@section('contenido')

    <head>

        <title>Tareas</title>
        <script src="{{ asset('js/tareas.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    </head>
    <div class="sobrefondo-tareas">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">TAREAS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button href="" type="button" class="btn-auth btn-lg" data-bs-toggle="modal" data-bs-target="#modalCrearTarea">
                    CREAR TAREA
                </button>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div id="container-tareas">
            @php
                $tareas = collect($tareas ?? []);
                $porEmpezar = $tareas->filter(fn ($tarea) => (int) ($tarea->id_estado ?? 0) === 1);
                $enProceso = $tareas->filter(fn ($tarea) => (int) ($tarea->id_estado ?? 0) === 2);
                $acabadas = $tareas->filter(fn ($tarea) => (int) ($tarea->id_estado ?? 0) === 3);

                if ($tareas->isNotEmpty() && $porEmpezar->isEmpty() && $enProceso->isEmpty() && $acabadas->isEmpty()) {
                    $enProceso = $tareas;
                }

                $columnas = [
                    ['id' => 'empezar', 'titulo' => 'POR EMPEZAR', 'tareas' => $porEmpezar],
                    ['id' => 'haciendo', 'titulo' => 'EN PROCESO', 'tareas' => $enProceso],
                    ['id' => 'acabado', 'titulo' => 'ACABADO', 'tareas' => $acabadas],
                ];
            @endphp

            @foreach ($columnas as $columna)
                <div id="{{ $columna['id'] }}" class="bloque">
                    <h3>{{ $columna['titulo'] }}</h3>

                    <div class="pizarra">
                        @forelse ($columna['tareas'] as $tarea)
                            <div class="card card-tareas" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tarea->nombre }}</h5>
                                    <hr>
                                    <li class="list-group-item">{{ $tarea->descripcion }}</li>
                                    <hr>
                                    <li class="list-group-item">{{ optional($tarea->tipoTarea)->nombre ?? 'Sin etiqueta' }}</li>
                                    <hr>
                                    <li class="list-group-item">{{ optional($tarea->usuario)->nombre ?? 'Sin asignar' }}</li>
                                    <hr>
                                    <li class="list-group-item">{{ optional($tarea->fecha_final)->format('d/m/Y') ?: 'Sin fecha' }}</li>
                                    <hr>
                                    <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarTarea{{ $tarea->id_tarea }}">
                                        <img src="{{ asset('img/edit.png') }}" alt="edit" class="d-inline-block">
                                    </a>
                                    <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarTarea{{ $tarea->id_tarea }}">
                                        <img src="{{ asset('img/trash.png') }}" alt="trash" class="d-inline-block">
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No hay tareas en esta columna.</p>
                        @endforelse
                    </div>
                </div>

                @if (!$loop->last)
                    <div class="separador"></div>
                @endif
            @endforeach

        </div>

    </div>
@endsection

@include('modals.crearTarea')

@foreach($tareas as $tarea)
    @include('modals.editarTarea', ['tarea' => $tarea])
    @include('modals.eliminarTarea', ['tarea' => $tarea])
@endforeach

<!-- PLANTILLA CARD ---
<div class="card card-tareas" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">CARD TITLE</h5>
        <hr>
        <li class="list-group-item">descripció</li>
        <hr>
        <li class="list-group-item">etiqueta</li>
        <hr>
        <li class="list-group-item">usuaris</li>
        <hr>
        <li class="list-group-item">data d'entrega</li>
        <hr>
        <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                class="d-inline-block"></a>
        <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                class="d-inline-block"></a>
    </div>
</div>
<-- IGNORE -->

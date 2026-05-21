@extends('plantillas.leftnavbar')

@section('contenido')

    <head>

        <title>Tareas</title>
        @vite(['resources/css/styles.css', 'resources/js/tareas.js'])

    </head>
    <div class="sobrefondo-tareas">
        <div class="Encabezado">
            {{-- Título dinámico: muestra el nombre del proyecto si existe contexto --}}
            <h1 class="Pagina-titulo">{{ isset($proyectoActual) ? 'TAREAS DE ' . strtoupper($proyectoActual->nombre) : 'TAREAS' }}</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                {{-- Botón que abre el modal para crear nueva tarea --}}
                <button href="" type="button" class="btn-auth btn-lg" data-bs-toggle="modal" data-bs-target="#modalCrearTarea">
                    CREAR TAREA
                </button>
            </div>
        </div>
        {{-- Alertas de validación y mensajes de éxito --}}
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
            {{-- Prepara colecciones y columnas por estado (1: Por empezar, 2: En proceso, 3: Acabado) --}}
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
                                    {{-- Descripción o fallback "Sin descripción" en cursiva --}}
                                    <li class="list-group-item">
                                        @php
                                            $desc = trim((string) ($tarea->descripcion ?? ''));
                                        @endphp
                                        {!! $desc !== '' ? e($desc) : '<em class="text-muted">Sin descripción</em>' !!}
                                    </li>
                                    <hr>
                                    {{-- Etiqueta de tipo de tarea con badge estilizado --}}
                                    <li class="list-group-item">
                                        <span class="tipo-badge tipo-{{ (int) ($tarea->id_tipo ?? 0) }}">
                                            {{ optional($tarea->tipoTarea)->nombre ?? 'Sin etiqueta' }}
                                        </span>
                                    </li>
                                    <hr>
                                    {{-- Usuario asignado o "Sin asignar" --}}
                                    <li class="list-group-item">{{ optional($tarea->usuario)->nombre ?? 'Sin asignar' }}</li>
                                    <hr>
                                    {{-- Rango de fechas formateadas (inicio - fin) o "Sin fecha" --}}
                                    <li class="list-group-item">
                                        @php
                                            $fi = $tarea->fecha_inicio ?? null;
                                            $ff = $tarea->fecha_final ?? null;
                                            $fiFmt = $fi ? \Carbon\Carbon::parse($fi)->format('d/m/Y') : null;
                                            $ffFmt = $ff ? \Carbon\Carbon::parse($ff)->format('d/m/Y') : null;
                                        @endphp
                                        @if ($fiFmt && $ffFmt)
                                            {{ $fiFmt }} - {{ $ffFmt }}
                                        @elseif ($fiFmt)
                                            {{ $fiFmt }}
                                        @elseif ($ffFmt)
                                            {{ $ffFmt }}
                                        @else
                                            Sin fecha
                                        @endif
                                    </li>
                                    <hr>
                                    {{-- Footer de la card: nombre del proyecto (en vista general) e iconos de editar/eliminar --}}
                                    <div class="task-footer">
                                        @if (!isset($proyectoActual))
                                            <span class="text-muted small">{{ optional($tarea->proyectos)->nombre ?? '' }}</span>
                                        @else
                                            <span></span>
                                        @endif
                                        <div class="task-actions">
                                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarTarea{{ $tarea->id_tarea }}">
                                                <img src="{{ asset('img/edit.png') }}" alt="edit" class="d-inline-block">
                                            </a>
                                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarTarea{{ $tarea->id_tarea }}">
                                                <img src="{{ asset('img/trash.png') }}" alt="trash" class="d-inline-block">
                                            </a>
                                        </div>
                                    </div>
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

{{-- Inclusión del modal para crear tarea --}}
@include('modals.crearTarea')

@foreach($tareas as $tarea)
    {{-- Inclusión de modales por tarea: editar y eliminar --}}
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

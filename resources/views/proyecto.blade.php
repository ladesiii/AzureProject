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
                        <a href="#" class="card-link btn-editar-proyecto" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto" data-proyecto-id="{{ $proyecto->id_proyecto }}" data-proyecto-nombre="{{ $proyecto->nombre }}">
                            <img src="{{ asset('img/edit.png') }}" alt="edit" class="d-inline-block"
                                style="width:20px;height:20px;">
                        </a>
                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto" data-proyecto-id="{{ $proyecto->id_proyecto }}" data-proyecto-nombre="{{ $proyecto->nombre }}" data-action="{{ route('proyecto.destroy', $proyecto->id_proyecto) }}">
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
    <script>
        // CAMBIO: Listener único para rellenar modales dinámicamente con datos del proyecto
        document.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            if (!button) return;
            var proyectoId = button.getAttribute('data-proyecto-id');
            var proyectoNombre = button.getAttribute('data-proyecto-nombre');
            var actionUrl = button.getAttribute('data-action');
            
            // CAMBIO: Rellenar modal de edición
            if (event.target.id === 'modalEditarProyecto' && proyectoId) {
                document.getElementById('formEditarProyecto').action = '/proyecto/' + proyectoId;
                document.getElementById('nombreProyectoEdit').value = proyectoNombre || '';
                // CAMBIO: Cargar usuarios asignados al proyecto (para el dropdown de remover)
                fetch('/proyecto/' + proyectoId + '/usuarios')
                    .then(response => response.json())
                    .then(data => {
                        var selectRemove = document.getElementById('usuarioQuitarEdit');
                        selectRemove.innerHTML = '<option selected disabled>Selecciona un usuario</option>';
                        if (data.usuarios && data.usuarios.length > 0) {
                            data.usuarios.forEach(function(usuario) {
                                var option = document.createElement('option');
                                option.value = usuario.id_usuario;
                                option.textContent = usuario.nombre || usuario.name || usuario.email;
                                selectRemove.appendChild(option);
                            });
                        }
                    })
                    .catch(error => console.error('Error cargando usuarios:', error));
            }
            // CAMBIO: Rellenar modal de eliminación
            if (event.target.id === 'modalEliminarProyecto' && actionUrl) {
                document.getElementById('formEliminarProyecto').action = actionUrl;
                document.getElementById('nombreProyectoEliminar').textContent = proyectoNombre ? ' ' + proyectoNombre : '';
            }
        });
    </script>
@include('modals.crearProyecto')
@include('modals.editarProyecto')
@include('modals.eliminarProyecto')
@include('modals.gestionarUsuarios')

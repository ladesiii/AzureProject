@extends('Plantillas.leftnavbar')

@section('contenido')


    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">PROYECTOS</h1>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn-auth btn-lg" data-bs-toggle="modal" data-bs-target="#modalCrearProyecto">CREAR PROYECTO</button>
                        </div>
        </div>


        <div class="card-proyecto">
            <div class="card-body card-body-proyecto">
                <h5 class="card-title">Card title</h5>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>

                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto"><img src="{{ asset('img/edit.png') }}" alt="edit"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto"><img src="{{ asset('img/trash.png') }}" alt="trash"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
                        class="d-inline-block" style="width: 24px; height: 24px;"></a>
            </div>

            <div class="card-body card-body-proyecto">
                <h5 class="card-title">Card title</h5>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto"><img src="{{ asset('img/edit.png') }}" alt="edit"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto"><img src="{{ asset('img/trash.png') }}" alt="trash"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
                        class="d-inline-block" style="width: 24px; height: 24px;"></a>
            </div>

            <div class="card-body card-body-proyecto">
                <h5 class="card-title">Card title</h5>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto"><img src="{{ asset('img/edit.png') }}" alt="edit"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto"><img src="{{ asset('img/trash.png') }}" alt="trash"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
                        class="d-inline-block" style="width: 24px; height: 24px;"></a>
            </div>

            <div class="card-body card-body-proyecto">
                <h5 class="card-title">Card title</h5>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto"><img src="{{ asset('img/edit.png') }}" alt="edit"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto"><img src="{{ asset('img/trash.png') }}" alt="trash"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
                        class="d-inline-block" style="width: 24px; height: 24px;"></a>
            </div>

            <div class="card-body card-body-proyecto">
                <h5 class="card-title">Card title</h5>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <hr>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto"><img src="{{ asset('img/edit.png') }}" alt="edit"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto"><img src="{{ asset('img/trash.png') }}" alt="trash"
                        class="d-inline-block"></a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
                        class="d-inline-block" style="width: 24px; height: 24px;"></a>
            </div>
        </div>


    </div>
@endsection
        @include('modals.crearProyecto')
        @include('modals.editarProyecto')
        @include('modals.eliminarProyecto')
        @include('modals.gestionarUsuarios')

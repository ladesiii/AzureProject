<div class="card-body card-body-proyecto">
    <h5 class="card-title">Card title</h5>
    <hr>
    @foreach ($tareas as $tarea)
        <li class="list-group-item">{{ $tarea->nombre }}</li>
    @endforeach
    <li class="list-group-item">Proxima Tarea para finalizar</li>
    <li class="list-group-item">Proxima Tarea para finalizar</li>
    <li class="list-group-item">Proxima Tarea para finalizar</li>

    <div class="project-actions">
        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto"><img
                src="{{ asset('img/edit.png') }}" alt="edit" class="d-inline-block"></a>
        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto"><img
                src="{{ asset('img/trash.png') }}" alt="trash" class="d-inline-block"></a>
        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios"><img
                src="{{ asset('img/user.png') }}" alt="bloq-user" class="d-inline-block"
                style="width: 24px; height: 24px;"></a>
    </div>
</div>

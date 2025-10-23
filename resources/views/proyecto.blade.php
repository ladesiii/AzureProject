@extends('Plantillas.leftnavbar')

@section('contenido')
    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">PROYECTOS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary btn-lg">Crear Proyectos</button>
            </div>
        </div>


        <div class="card card-proyecto" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>


    </div>
@endsection

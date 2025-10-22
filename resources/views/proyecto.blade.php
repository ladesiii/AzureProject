@extends('Plantillas.leftnavbar')

@section('contenido')
    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">PROYECTOS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary btn-lg">Crear Proyectos</button>
            </div>
        </div>


        <div class="card card-proyecto">
            <div class="card-body ">
                <h4 class="card-title">Nombre Proyecto</h4>
                <ul class="list-group">
                    <li class="list-group-item">Proxima Tarea para finalizar</li>
                    <li class="list-group-item">Proxima Tarea para finalizar</li>
                    <li class="list-group-item">Proxima Tarea para finalizar</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

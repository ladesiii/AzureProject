@extends('Plantillas.leftnavbar')

@section('Titulo')
    Proyecto
@endsection

@section('contenido')
    <h1>Proyecto</h1>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary me-md-2" type="button">Button</button>
        <button class="btn btn-primary" type="button">Button</button>
    </div>
    <br><br>

    <div class="card" style="width: 18rem;">
        <div class="card-body ">
            <h4 class="card-title">Nombre Proyecto</h4>
            <ul class="list-group">
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
            </ul>
        </div>
    </div>

@endsection

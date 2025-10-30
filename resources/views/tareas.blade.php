@extends('Plantillas.leftnavbar')

@section('contenido')
    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">TAREAS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary btn-lg">Crear Proyectos</button>
            </div>
        </div>

<<<<<<< Updated upstream
        <div id="container">

            <div id="empezar" class="bloque">
                <h3>POR EMPEZAR</h3>

                <div class="pizarra">
                    <div class="card card-tareas" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                                    class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                                    class="d-inline-block"></a>
                        </div>
                    </div>

                    <div class="card card-tareas" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                                    class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                                    class="d-inline-block"></a>
                        </div>
                    </div>

                    <div class="card card-tareas" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                                    class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                                    class="d-inline-block"></a>
                        </div>
                    </div>

                </div>



            </div>

            <div class="separador"></div>

            <div id="haciendo" class="bloque">
                <h3>EN PROCESO</h3>

                <div class="pizarra">
                    <div class="card card-tareas" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                                    class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                                    class="d-inline-block"></a>
                        </div>
                    </div>

                    <div class="card card-tareas" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                                    class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                                    class="d-inline-block"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separador"></div>

            <div id="acabado" class="bloque">
                <h3>ACABADO</h3>

                <div class="pizarra">
                    <div class="card card-tareas" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                                    class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                                    class="d-inline-block"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>






        <!--
                    <div class="card card-proyecto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <li class="list-group-item">Proxima Tarea para finalizar</li>
                            <hr>
                            <a href="#" class="card-link" ><img src="{{ asset('img/edit.png') }}" alt="edit" class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash" class="d-inline-block"></a>
                        </div>
                    </div>
                    -->

    </div>
@endsection


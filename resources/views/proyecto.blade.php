@extends('Plantillas.leftnavbar')

@section('contenido')
    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">PROYECTOS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary btn-lg">Crear Proyectos</button>
            </div>
        </div>


        <div class="card-proyecto">

            <div class="card-body card-body-proyecto">
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
                <a href="#" class="card-link"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
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
                <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                        class="d-inline-block"></a>
                <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                        class="d-inline-block"></a>
                <a href="#" class="card-link"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
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
                <a href="#" class="card-link"><img src="{{ asset('img/edit.png') }}" alt="edit"
                        class="d-inline-block"></a>
                <a href="#" class="card-link"><img src="{{ asset('img/trash.png') }}" alt="trash"
                        class="d-inline-block"></a>
                <a href="#" class="card-link"><img src="{{ asset('img/user.png') }}" alt="bloq-user"
                        class="d-inline-block" style="width: 24px; height: 24px;"></a>
            </div>
        </div>


    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Find the "Crear Proyectos" button by its text
            const buttons = Array.from(document.querySelectorAll('button'));
            const createBtn = buttons.find(b => b.textContent.trim().toLowerCase().includes('crear proyectos'));
            const container = document.querySelector('.card-proyecto');

            if (!createBtn || !container) return;

            createBtn.addEventListener('click', function(e) {
                e.preventDefault();

                // Asset URLs rendered by Blade
                const editUrl = "{{ asset('img/edit.png') }}";
                const trashUrl = "{{ asset('img/trash.png') }}";
                const userUrl = "{{ asset('img/user.png') }}";

                const card = document.createElement('div');
                card.className = 'card-body card-body-proyecto';

                card.innerHTML = `
                                <h5 class="card-title">PROYECTO NUEVO</h5>
                                <hr>
                                <li class="list-group-item">Proyecto totalmente nuevo</li>
                                <hr>
                                <li class="list-group-item">nose k poner aki</li>
                                <hr>
                                <li class="list-group-item">Negro</li>
                                <hr>
                                <a href="#" class="card-link"><img src="${editUrl}" alt="edit" class="d-inline-block"></a>
                                <a href="#" class="card-link"><img src="${trashUrl}" alt="trash" class="d-inline-block"></a>
                                <a href="#" class="card-link"><img src="${userUrl}" alt="bloq-user" class="d-inline-block" style="width: 24px; height: 24px;"></a>
                                `;

                container.appendChild(card);
            });
        });
    </script>
@endsection

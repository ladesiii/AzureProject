@extends('Plantillas.leftnavbar')

@section('contenido')


    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">TAREAS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary btn-lg">Crear Proyectos</button>
            </div>
        </div>
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

    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select cards and columns
            const cards = document.querySelectorAll('.card-tareas');
            const columns = document.querySelectorAll('.pizarra');

            // Make cards draggable and set ids if missing
            cards.forEach((card, index) => {
                if (!card.id) card.id = `card-${Date.now()}-${index}`;
                card.setAttribute('draggable', 'true');

                card.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', card.id);
                    e.dataTransfer.effectAllowed = 'move';
                    card.classList.add('dragging');
                });

                card.addEventListener('dragend', () => {
                    card.classList.remove('dragging');
                    document.querySelectorAll('.pizarra').forEach(p => p.classList.remove('dragover'));
                });
            });

            // Helper to find insertion point
            function getDragAfterElement(container, y) {
                const draggableElements = [...container.querySelectorAll('.card-tareas:not(.dragging)')];

                return draggableElements.reduce((closest, child) => {
                    const box = child.getBoundingClientRect();
                    const offset = y - box.top - box.height / 2;
                    if (offset < 0 && offset > closest.offset) {
                        return { offset: offset, element: child };
                    } else {
                        return closest;
                    }
                }, { offset: Number.NEGATIVE_INFINITY }).element;
            }

            // Setup drop targets
            columns.forEach(col => {
                col.addEventListener('dragover', (e) => {
                    e.preventDefault(); // allow drop
                    col.classList.add('dragover');
                    const dragging = document.querySelector('.dragging');
                    const afterElement = getDragAfterElement(col, e.clientY);
                    if (!dragging) return;
                    if (afterElement == null) {
                        col.appendChild(dragging);
                    } else {
                        col.insertBefore(dragging, afterElement);
                    }
                });

                col.addEventListener('dragleave', () => {
                    col.classList.remove('dragover');
                });

                col.addEventListener('drop', (e) => {
                    e.preventDefault();
                    col.classList.remove('dragover');
                    const id = e.dataTransfer.getData('text/plain');
                    const card = document.getElementById(id);
                    if (card) col.appendChild(card);
                });
            });
        });
    </script>

@endsection



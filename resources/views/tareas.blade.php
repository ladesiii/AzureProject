@extends('Plantillas.leftnavbar')

@section('contenido')


    <div class="sobrefondo">
        <div class="Encabezado">
            <h1 class="Pagina-titulo">TAREAS</h1>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary btn-lg">Crear tarea</button>
            </div>
        </div>
        <div id="container">
            <div id="empezar" class="bloque">
                <h3>POR EMPEZAR</h3>

                <div class="pizarra">



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


            //
            //      MOVER TAREAS ENTRE COLUMNAS
            //


            //Seleccionamos todas las tarjetas y columnas
            const cards = document.querySelectorAll('.card-tareas');
            const columns = document.querySelectorAll('.pizarra');

            //Hace que las tarjetas sean arrastrables
            cards.forEach((card, index) => {
                if (!card.id) card.id = `card-${Date.now()}-${index}`;
                card.setAttribute('draggable', 'true');

                //Mientras se arrastra la tarjeta
                card.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', card.id); //se guarda el id de la tarjeta
                    e.dataTransfer.effectAllowed = 'move'; // Indica que se va a mover
                    card.classList.add('dragging'); // Estilo visual al arrastrar
                });

                //Cuando se suelta la tarjeta
                card.addEventListener('dragend', () => {
                    card.classList.remove('dragging'); // Quita el estilo visual
                    document.querySelectorAll('.pizarra').forEach(p => p.classList.remove('dragover')); // Quita el estilo de las columnas
                });
            });

            // Función para obtener el elemento después del cual se debe insertar la tarjeta arrastrada
            function getDragAfterElement(container, y) {
                const draggableElements = [...container.querySelectorAll('.card-tareas:not(.dragging)')];
                //Guarda todos los elementos arrastrables excepto el que se está arrastrando

                // Encontrar el elemento más cercano del raton
                return draggableElements.reduce((closest, child) => {
                    const box = child.getBoundingClientRect(); // Obtiene las dimensiones del elemento
                    const offset = y - box.top - box.height / 2; // Calcula el tamaño del elemento

                    if (offset < 0 && offset > closest.offset) { //Si el raton está encima del elemento
                        return { offset: offset, element: child }; //Devuelve el elemento más cercano
                    }
                    else {
                        return closest; //Sino, devuelve el más cercano encontrado hasta ahora
                    }
                }, { offset: Number.NEGATIVE_INFINITY }).element;
            }

            // Configura los eventos de las columnas para permitir soltar las tarjetas
            columns.forEach(col => { //Cada columna
                col.addEventListener('dragover', (e) => { //Mientras se arrastra sobre la columna
                    e.preventDefault();
                    col.classList.add('dragover'); // Estilo visual de la columna al arrastrar sobre ella
                    const dragging = document.querySelector('.dragging'); // Obtiene la tarjeta que se está arrastrando
                    const afterElement = getDragAfterElement(col, e.clientY); // Obtiene el elemento después del cual se debe insertar
                    if (!dragging) return; // Si no hay tarjeta arrastrándose, salir
                    if (afterElement == null) { //Si no hay elemento después del cual insertar
                        col.appendChild(dragging); //Añade al final
                    } else { //Si hay un elemento después del cual insertar
                        col.insertBefore(dragging, afterElement); //Inserta antes de ese elemento
                    }
                });

                //Quita el estilo cuando se sale de la columna
                col.addEventListener('dragleave', () => { //Cuando se sale de la columna
                    col.classList.remove('dragover'); //Quita el estilo de la columna
                });

                //Cuando se suelta la tarjeta
                col.addEventListener('drop', (e) => { //Cuando se suelta en la columna
                    e.preventDefault(); // Evita el comportamiento por defecto
                    col.classList.remove('dragover'); //Quita el estilo de la columna
                    const id = e.dataTransfer.getData('text/plain'); //Obtiene el id de la tarjeta
                    const card = document.getElementById(id); //Obtiene la tarjeta por su id
                    if (card) col.appendChild(card); //Añade la tarjeta a la columna
                });
            });

        });
    </script>



@endsection



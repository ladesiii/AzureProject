document.addEventListener('DOMContentLoaded', function () {


            //
            //      MOVER TAREAS ENTRE COLUMNAS
            //


            //Seleccionamos todas las tarjetas y columnas
            const cards = document.querySelectorAll('.card-tareas');
            const columns = document.querySelectorAll('.pizarra');

            //Función para hacer una tarjeta arrastrable y añadir funcionalidad de eliminar
            function makeCardDraggable(card, index) {
                if (!card.id) card.id = `card-${Date.now()}-${index}`;
                card.setAttribute('draggable', 'true');

                //Mientras se arrastra la tarjeta
                card.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', card.id); //se guarda el id de la tarjeta
                    e.dataTransfer.effectAllowed = 'move'; // Indica que se va a mover
                    card.classList.add('moviendo'); // Estilo visual al arrastrar
                });

                //Cuando se suelta la tarjeta
                card.addEventListener('dragend', () => {
                    card.classList.remove('moviendo'); // Quita el estilo visual
                    document.querySelectorAll('.pizarra').forEach(p => p.classList.remove('dragover')); // Quita el estilo de las columnas
                });


                //
                // BORRAR TARJETA
                //

                //Buscar el botón de eliminar (imagen con alt="trash") y añadir evento
                const borrar = card.querySelector('img[alt="trash"]');
                if (borrar) {
                    borrar.style.cursor = 'pointer'; // Cambiar cursor para indicar que es clickeable
                    borrar.addEventListener('click', (e) => {
                        e.preventDefault(); // Evitar comportamiento por defecto del link
                        card.remove(); // Eliminar la tarjeta del DOM
                    });
                }
            }

            //Hace que las tarjetas sean arrastrables
            cards.forEach((card, index) => {
                makeCardDraggable(card, index);
            });

            // Función para obtener el elemento después del cual se debe insertar la tarjeta arrastrada
            function getDragAfterElement(container, y) {
                const draggableElements = [...container.querySelectorAll('.card-tareas:not(.moviendo)')]; 
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
                    const moviendo = document.querySelector('.moviendo'); // Obtiene la tarjeta que se está arrastrando
                    const afterElement = getDragAfterElement(col, e.clientY); // Obtiene el elemento después del cual se debe insertar
                    if (!moviendo) return; // Si no hay tarjeta arrastrándose, salir
                    if (afterElement == null) { //Si no hay elemento después del cual insertar
                        col.appendChild(moviendo); //Añade al final
                    } else { //Si hay un elemento después del cual insertar
                        col.insertBefore(moviendo, afterElement); //Inserta antes de ese elemento
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

                        // Cambiar color del h5.card-title según la columna
                        let color = '';
                        if (col.parentElement && col.parentElement.id === 'empezar') {
                            color = '#DC3545';
                        } else if (col.parentElement && col.parentElement.id === 'haciendo') {
                            color = '#F4F42A';
                        } else if (col.parentElement && col.parentElement.id === 'acabado') {
                            color = '#2AF456';
                            // Hacer que la tarjeta no sea arrastrable si está en acabado
                            if (card) {
                                card.setAttribute('draggable', 'false');
                            }
                        }
                        if (color) {
                            const h5 = card.querySelector('h5.card-title');
                            if (h5) {
                                h5.style.backgroundColor = color;
                            }
                        }
                });
            });

        });


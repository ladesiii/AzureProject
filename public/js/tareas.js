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

    //
    // CREAR NUEVAS TARJETAS
    //



});

// Código adicional: manejar creación desde botón/modal
document.addEventListener('DOMContentLoaded', function () {
    const crearBtn = document.querySelector('.Encabezado .btn-auth.btn-lg');
    const empezarPizarra = document.querySelector('#empezar .pizarra');

    if (crearBtn && empezarPizarra) {
        crearBtn.addEventListener('click', (e) => {
            if (document.querySelector('#modalCrearTarea')) return; // Usa modal si existe

            const anyCard = document.querySelector('.card-tareas');
            let newCard;
            if (anyCard) {
                newCard = anyCard.cloneNode(true);
                newCard.id = `card-${Date.now()}`;
            } else {
                newCard = document.createElement('div');
                newCard.className = 'card card-tareas';
                newCard.style.width = '18rem';
                newCard.id = `card-${Date.now()}`;
                newCard.innerHTML = `
                    <div class="card-body">
                        <h5 class="card-title">Nueva tarea</h5>
                        <hr>
                        <li class="list-group-item">Descripción</li>
                        <hr>
                        <li class="list-group-item">Etiqueta</li>
                        <hr>
                        <li class="list-group-item">Usuarios</li>
                        <hr>
                        <li class="list-group-item">Fecha</li>
                        <hr>
                        <a href="#" class="card-link"><img src="/img/edit.png" alt="edit" class="d-inline-block"></a>
                        <a href="#" class="card-link"><img src="/img/trash.png" alt="trash" class="d-inline-block"></a>
                    </div>
                `;
            }

            empezarPizarra.appendChild(newCard);
            try { makeCardDraggable(newCard, document.querySelectorAll('.card-tareas').length - 1); } catch (e) { }
            const h5 = newCard.querySelector('h5.card-title'); if (h5) h5.style.backgroundColor = '#DC3545';
        });
    }

    const modalCrear = document.querySelector('#modalCrearTarea');
    if (modalCrear && empezarPizarra) {
        const form = modalCrear.querySelector('form');
        if (form) {
            form.addEventListener('submit', (ev) => {
                ev.preventDefault();
                const getField = (names) => {
                    for (const n of names) {
                        const el = form.querySelector(`[name="${n}"]`) || form.querySelector(`#${n}`);
                        if (el) return (el.value || el.textContent || '').trim();
                    }
                    return '';
                };

                const title = getField(['title', 'titulo', 'name', 'nombre']) || 'Nueva tarea';
                const desc = getField(['description', 'descripcion', 'desc']) || 'Descripción';
                const tag = getField(['etiqueta', 'tag']) || 'Etiqueta';
                const users = getField(['usuarios', 'users']) || 'Usuarios';
                const fecha = getField(['fecha', 'due_date', 'date']) || 'Fecha';

                const tpl = document.querySelector('.card-tareas');
                let card;
                if (tpl) {
                    card = tpl.cloneNode(true);
                    card.id = `card-${Date.now()}`;
                    const h5 = card.querySelector('h5.card-title'); if (h5) h5.textContent = title;
                    const lis = card.querySelectorAll('.list-group-item');
                    if (lis && lis.length >= 4) {
                        lis[0].textContent = desc;
                        lis[1].textContent = tag;
                        lis[2].textContent = users;
                        lis[3].textContent = fecha;
                    }
                } else {
                    card = document.createElement('div');
                    card.className = 'card card-tareas';
                    card.style.width = '18rem';
                    card.id = `card-${Date.now()}`;
                    card.innerHTML = `
                        <div class="card-body">
                            <h5 class="card-title">${title}</h5>
                            <hr>
                            <li class="list-group-item">${desc}</li>
                            <hr>
                            <li class="list-group-item">${tag}</li>
                            <hr>
                            <li class="list-group-item">${users}</li>
                            <hr>
                            <li class="list-group-item">${fecha}</li>
                            <hr>
                            <a href="#" class="card-link"><img src="/img/edit.png" alt="edit" class="d-inline-block"></a>
                            <a href="#" class="card-link"><img src="/img/trash.png" alt="trash" class="d-inline-block"></a>
                        </div>
                    `;
                }

                empezarPizarra.appendChild(card);
                try { makeCardDraggable(card, document.querySelectorAll('.card-tareas').length - 1); } catch (e) { }
                const hh = card.querySelector('h5.card-title'); if (hh) hh.style.backgroundColor = '#DC3545';

                // Cerrar modal
                try {
                    if (window.bootstrap && bootstrap.Modal) {
                        (bootstrap.Modal.getInstance(modalCrear) || new bootstrap.Modal(modalCrear)).hide();
                    } else {
                        modalCrear.classList.remove('show'); modalCrear.style.display = 'none';
                        const bd = document.querySelector('.modal-backdrop'); if (bd) bd.remove();
                    }
                } catch (err) { console.warn(err); }

                try { form.reset(); } catch (e) { }
            });
        }
    }



    //
    //  ELIMINAR TARJETAS
    //

    
});


document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById("formCrearProyecto");
    const contenedor = document.getElementById("contenedor-proyectos");

    // Evento para crear un nuevo proyecto dinámicamente en la vista
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita que se recargue la página

        const nombreProyecto = document.getElementById("nombreProyecto").value.trim();

        if (!nombreProyecto) {
            alert("Por favor ingresa un nombre de proyecto.");
            return;
        }

        // Crear un nuevo div para el proyecto
        const nuevoDiv = document.createElement("div");
        nuevoDiv.classList.add("card-body", "card-body-proyecto");

        // Usar interpolación correcta para el nombre del proyecto
        nuevoDiv.innerHTML = `
            <h5 class="card-title">${nombreProyecto}</h5>
            <hr>
            <li class="list-group-item">Proxima Tarea para finalizar</li>
            <li class="list-group-item">Proxima Tarea para finalizar</li>
            <li class="list-group-item">Proxima Tarea para finalizar</li>
            <div class="project-actions">
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto">
                    <img src="/img/edit.png" alt="edit" class="d-inline-block" style="cursor:pointer;">
                </a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto">
                    <img src="/img/trash.png" alt="trash" class="d-inline-block" style="cursor:pointer;">
                </a>
                <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios">
                    <img src="/img/user.png" alt="user" class="d-inline-block" style="width: 24px; height: 24px; cursor:pointer;">
                </a>
            </div>
        `;

        // Agregar el nuevo card-body al contenedor de proyectos
        contenedor.appendChild(nuevoDiv);

        // Cerrar el popup usando Bootstrap
        const modalElement = document.getElementById('modalCrearProyecto');
        const modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) {
            modal.hide();
        }

        // Limpiar el formulario
        form.reset();
    });

    // Comentario: Este script permite crear dinámicamente una nueva tarjeta de proyecto en la vista de proyectos
    // cuando el usuario rellena el formulario y pulsa "CREAR" en el modal. Corrige la interpolación de variables y rutas de imágenes.



});

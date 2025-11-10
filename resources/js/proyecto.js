document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById("formCrearProyecto");
    const contenedor = document.getElementById("contenedor-proyectos");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // evita que se recargue la página

        const nombreProyecto = document.getElementById("nombreProyecto").value.trim();

        if (!nombreProyecto) {
            alert("Por favor ingresa un nombre de proyecto.");
            return;
        }

        // Crear un nuevo card-body
        const nuevoDiv = document.createElement("div");
        nuevoDiv.classList.add("card-body", "card-body-proyecto");

        nuevoDiv.innerHTML = `
                <h5 class="card-title">${{nombreProyecto}}</h5>
                <hr>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <li class="list-group-item">Proxima Tarea para finalizar</li>
                <div class="project-actions">
                    <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEditarProyecto">
                        <img src="/AzureProject/public/img/edit.png" alt="edit" class="d-inline-block" style="cursor:pointer;">
                    </a>

                    <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalEliminarProyecto">
                        <img src="/AzureProject/public/img/trash.png" alt="edit" class="d-inline-block" style="cursor:pointer;">
                    </a>


                    <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#modalGestionarUsuarios">
                        <img src="/AzureProject/public/img/landing.png" alt="edit" class="d-inline-block" style="cursor:pointer;">
                    </a>
                </div>
        `;

        // Agregar el nuevo card-body al contenedor
        contenedor.appendChild(nuevoDiv);

        // Cerra el popup usando Bootstrap
        const modalElment = document.getElementById('modalCrearProyecto');
        const modal = bootstrap.Modal.getInstance(modalElment);
        modal.hide();

        // Limpiar el formulario
        form.reset();

    });



});

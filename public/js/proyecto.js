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

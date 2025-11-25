// document.addEventListener('DOMContentLoaded', function () {
//     const form = document.getElementById("formCrearProyecto");
//     const contenedor = document.getElementById("contenedor-proyectos");

//     // Verificar si hay un parámetro en la URL para abrir el modal
//     const urlParams = new URLSearchParams(window.location.search);
//     if (urlParams.get('openModal') === 'true') {
//         const modalElement = document.getElementById('modalCrearProyecto');
//         const modal = new bootstrap.Modal(modalElement);
//         modal.show();
//         // Limpiar el parámetro de la URL sin recargar la página
//         window.history.replaceState({}, document.title, window.location.pathname);
//     }

//     // Evento para crear un nuevo proyecto dinámicamente en la vista
//     form.addEventListener("submit", function (event) {
//         event.preventDefault(); // Evita que se recargue la página

//         const nombreProyecto = document.getElementById("nombreProyecto").value.trim();

//         if (!nombreProyecto) {
//             alert("Por favor ingresa un nombre de proyecto.");
//             return;
//         }

//         // Crear un nuevo div para el proyecto
//         const nuevoDiv = document.createElement("div");
//         nuevoDiv.classList.add("card-body", "card-body-proyecto");

//         // Agregar el nuevo card-body al contenedor de proyectos
//         contenedor.appendChild(nuevoDiv);

//         // Cerrar el popup usando Bootstrap
//         const modalElement = document.getElementById('modalCrearProyecto');
//         const modal = bootstrap.Modal.getInstance(modalElement);
//         if (modal) {
//             modal.hide();
//         }

//         // Limpiar el formulario
//         form.reset();
//     });



// });

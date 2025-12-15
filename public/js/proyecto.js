document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modalEditarProyecto');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const proyectoId = button.getAttribute('data-id');
        const nombre = button.getAttribute('data-nombre');

        const form = document.getElementById('formEditarProyecto');
        form.action = `/proyecto/${proyectoId}`;

        document.getElementById('nombreProyectoEdit').value = nombre;
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const modalEliminar = document.getElementById('modalEliminarProyecto');

    modalEliminar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const proyectoId = button.getAttribute('data-id');
        const nombre = button.getAttribute('data-nombre');

        // Formulario
        const form = document.getElementById('formEliminarProyecto');
        form.action = `/proyecto/${proyectoId}`; // <-- action correcto

        // Mostrar nombre en el modal
        document.getElementById('nombreProyectoEliminar').textContent = nombre;
    });
});




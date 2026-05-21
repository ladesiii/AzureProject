// Script de login: gestiona el toggle de visibilidad de la contraseña
// Escucha el DOM cargado y añade listeners a los botones con clase
// .password-toggle-btn para alternar entre 'password' y 'text'.
document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.password-toggle-btn');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            // El input de contraseña está justo antes del botón
            const input = this.previousElementSibling;
            const icon = this.querySelector('i');

            // Alterna el tipo de input y el icono
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.password-toggle-btn');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const input = this.previousElementSibling;
            const icon = this.querySelector('i');

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

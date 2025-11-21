document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('passwordToggleBtn');
    const toggleIcon = document.getElementById('toggleIcon');
    if (!passwordInput || !toggleBtn || !toggleIcon) return;

    toggleBtn.addEventListener('click', () => {
        const isHidden = passwordInput.type === 'password';
        passwordInput.type = isHidden ? 'text' : 'password';
        toggleIcon.classList.toggle('bi-eye', !isHidden);
        toggleIcon.classList.toggle('bi-eye-slash', isHidden);
        toggleBtn.setAttribute('aria-pressed', isHidden ? 'true' : 'false');
    });
});

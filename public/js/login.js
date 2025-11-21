document.addEventListener('DOMContentLoaded', () => {
    const wrappers = document.querySelectorAll('.password-toggle-wrapper');
    if (wrappers.length > 0) {
        wrappers.forEach(wrapper => {
            const input = wrapper.querySelector('input[type="password"], input[type="text"]');
            const toggleBtn = wrapper.querySelector('.password-toggle-btn');
            const toggleIcon = wrapper.querySelector('.password-toggle-icon');
            if (!input || !toggleBtn || !toggleIcon) return;

            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                toggleIcon.classList.toggle('bi-eye', !isHidden);
                toggleIcon.classList.toggle('bi-eye-slash', isHidden);
                toggleBtn.setAttribute('aria-pressed', isHidden ? 'true' : 'false');
            });
        });
        console.debug('password-toggle: attached to', wrappers.length, 'wrappers');
        return;
    }

    // Fallback: look for standalone toggle buttons and try to find a nearby input
    const buttons = document.querySelectorAll('.password-toggle-btn');
    if (buttons.length > 0) {
        buttons.forEach(btn => {
            const findInput = (el) => {
                if (!el) return null;
                // search up a few levels for an input in the same group
                let p = el.parentElement;
                for (let i = 0; i < 4 && p; i++, p = p.parentElement) {
                    const candidate = p.querySelector('input[type="password"], input[type="text"]');
                    if (candidate) return candidate;
                }
                // try previous sibling
                if (el.previousElementSibling && (el.previousElementSibling.tagName === 'INPUT')) return el.previousElementSibling;
                return null;
            };

            const input = findInput(btn);
            const toggleIcon = btn.querySelector('.password-toggle-icon') || btn.querySelector('i');
            if (!input || !toggleIcon) return;

            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                toggleIcon.classList.toggle('bi-eye', !isHidden);
                toggleIcon.classList.toggle('bi-eye-slash', isHidden);
                btn.setAttribute('aria-pressed', isHidden ? 'true' : 'false');
            });
        });
        console.debug('password-toggle: fallback attached to', buttons.length, 'buttons');
    } else {
        console.debug('password-toggle: no toggle elements found');
    }
});

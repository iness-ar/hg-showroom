document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    const form = document.getElementById('loginForm'); 

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye-fill');
            togglePassword.classList.toggle('bi-eye-slash-fill');
        });
    }

    if (form && btnText && btnSpinner) {
        form.addEventListener('submit', function() {
            btnText.classList.add('d-none');
            btnSpinner.classList.remove('d-none');
        });
    }
});

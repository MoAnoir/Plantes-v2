document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggleAction');
    const switchOption = document.getElementById('switchOption');
    const formContainer = document.getElementById('formContainer');
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');

    // Afficher le formulaire d'inscription par défaut
    toggleButton.addEventListener('click', () => {
        formContainer.classList.remove('hidden');
        registerForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
    });

    // Basculer vers le formulaire de connexion
    switchOption.addEventListener('click', (e) => {
        e.preventDefault();
        formContainer.classList.remove('hidden');
        registerForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        toggleButton.textContent = 'Se connecter';
        switchOption.innerHTML = 'Pas encore abonné ? <span class="underline">Inscrivez-vous</span>';
        switchOption.onclick = () => {
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
            toggleButton.textContent = 'S\'abonner';
            switchOption.innerHTML = 'Déjà abonné ? <span class="underline">Connectez-vous</span>';
            switchOption.onclick = arguments.callee;
        };
    });
});
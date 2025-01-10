let forgottenPassword = document.querySelector('form a:not(.btn)');

forgottenPassword.addEventListener('click', ()=> {
    // En attendant le back-end 
    let email = prompt('Si vous avez oublié votre mot de passe, veuillez entrez votre pseudo:');
    // forgottenPassword.href = `mailto:${email}?subject=Réinitialisation du mot de passe&body=Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe: https://www.genshin.com/reset-password`;
});

const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const password = document.querySelector('input[name="password"]').value;
    const login = document.querySelector('input[name="pseudo"]').value;

    // Simuler la vérification avec la base de données en attendant le back-end
    // Si les identifiants correspondent à admin et Password80 on se connecte en admin
    // Sinon tout autres identifiants valides (selon les patterns) connectent en membre standard
    if (login === 'admin' && password === 'Password80') {
        isAdmin = 'true';
        localStorage.setItem('isConnected', 'true');
    } else {
        isAdmin = 'false';
        localStorage.setItem('isConnected', 'true');
    }
    localStorage.setItem('isAdmin', isAdmin);
    window.location.href = isAdmin === 'true' ? '/admin-menu.html' : '/member.html';
});

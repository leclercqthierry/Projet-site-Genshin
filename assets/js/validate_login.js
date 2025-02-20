// The purpose of this script is to validate the login form on the front side

const nickname = document.getElementById('nickname');
const password = document.getElementById('password');
const form = document.querySelector('form');

// Regex patterns for validation
const regexNickname = /^[\w\d]{4,}$/;
const regexPassword = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

// Error messages display
const errorNickname = document.createElement('p');
const errorPassword = document.createElement('p');
const errorForm = document.createElement('p');

// Add error messages to the form
nickname.insertAdjacentElement('afterend', errorNickname);
password.insertAdjacentElement('afterend', errorPassword);
form.insertAdjacentElement('afterbegin', errorForm);

// nickname field control
nickname.addEventListener('input', () => {
    errorNickname.textContent = 'Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!';
    errorNickname.style.display = !regexNickname.test(nickname.value) ? 'block' : 'none';
});

// password field control
password.addEventListener('input', () => {
    errorPassword.textContent = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';
    errorPassword.style.display =!regexPassword.test(password.value)? 'block' : 'none';
});

// form submission control
form.addEventListener('submit', (e) => {
    if (!regexNickname.test(nickname.value) || !regexPassword.test(password.value)) {
        e.preventDefault();
        errorForm.textContent = 'Veuillez corriger les erreurs dans le formulaire!';
        setTimeout(() => {errorForm.textContent = '';}, 2000);
    } else {
        form.submit();
    }
});



















const forgottenPassword = document.querySelector('form a:not(.btn)');

forgottenPassword.addEventListener('click', ()=> {
    // En attendant le back-end 
    let email = prompt('Si vous avez oublié votre mot de passe, veuillez entrez votre pseudo:');
    // forgottenPassword.href = `mailto:${email}?subject=Réinitialisation du mot de passe&body=Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe: https://www.genshin.com/reset-password`;
});
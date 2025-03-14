// The purpose of this script is to validate the login form on the front side

const nickname = document.getElementById('nickname');
const password = document.getElementById('password');
const form = document.querySelector('form');

// Regex patterns for validation
const regexNickname = /^[\w\d]{4,}$/;
const regexPassword = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

// Error messages display
const errorForm = document.createElement('p');
errorForm.classList.add('error');

const errorN = 'Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!';
const errorP = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';

// Add error messages to the form
form.insertAdjacentElement('afterbegin', errorForm);

const errorNickname = addErrorMessage(nickname, errorN);
const errorPassword = addErrorMessage(password, errorP);

validateTextField(nickname, regexNickname, errorNickname);
validateTextField(password, regexPassword, errorPassword);


// form submission control
form.addEventListener('submit', (e) => {
    if (!regexNickname.test(nickname.value) || !regexPassword.test(password.value)) {
        e.preventDefault();
        errorForm.textContent = 'Veuillez corriger les erreurs dans le formulaire !';
        errorNickname.style.display = !regexNickname.test(nickname.value) ? 'block' : 'none';
        errorPassword.style.display =!regexPassword.test(password.value)? 'block' : 'none';
        setTimeout(() => {errorForm.textContent = '';}, 2000);
    } else {
        form.submit();
    }
});

// const forgottenPassword = document.querySelector('form a:not(.btn)');

// forgottenPassword.addEventListener('click', ()=> {
     // En attendant le back-end 
//     let email = prompt('Si vous avez oublié votre mot de passe, veuillez entrez votre pseudo:');
     // forgottenPassword.href = `mailto:${email}?subject=Réinitialisation du mot de passe&body=Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe: https://www.genshin.com/reset-password`;
// });
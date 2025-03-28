// The purpose of this script is to validate the login form on the front side

const nickname = document.getElementById('nickname');
const password = document.getElementById('password');
const form = document.querySelector('form');

// Regex patterns for validation
const regexNickname = /^[\w\d]{4,}$/;
const regexPassword = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

// Error messages display

const errorN = 'Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!';
const errorP = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';

// Add error messages to the form and aria-properties
const errorForm = document.createElement('p');
errorForm.classList.add('error');
errorForm.id = 'errorForm';
errorForm.setAttribute('aria-live', 'off');
form.insertAdjacentElement('afterbegin', errorForm);
form.setAttribute('aria-errormessage', 'errorForm');
form.setAttribute('aria-invalid', 'false');

const errorNickname = addErrorMessage(nickname, errorN);
errorNickname.id = 'errorNickname';
errorNickname.setAttribute('aria-live', 'off');
nickname.setAttribute('aria-errormessage', 'errorNickname');

const errorPassword = addErrorMessage(password, errorP);
errorPassword.id = 'errorPassword';
errorNickname.setAttribute('aria-live', 'off');
password.setAttribute('aria-errormessage', 'errorPassword');

validateTextField(nickname, regexNickname, errorNickname);
validateTextField(password, regexPassword, errorPassword);


// form submission control
form.addEventListener('submit', (e) => {
    if (!regexNickname.test(nickname.value) || !regexPassword.test(password.value)) {

        e.preventDefault();
        errorForm.textContent = 'Veuillez corriger les erreurs dans le formulaire !';
        errorForm.setAttribute('aria-live', 'polite');

        form.setAttribute('aria-invalid', 'true');

        errorNickname.setAttribute('aria-live', 'polite');
        errorNickname.style.display = !regexNickname.test(nickname.value) ? 'block' : 'none';

        errorPassword.setAttribute('aria-live', 'polite');
        errorPassword.style.display =!regexPassword.test(password.value)? 'block' : 'none';
        
        setTimeout(() => {errorForm.textContent = '';}, 2000);
    } else {
        form.submit();
    }
});
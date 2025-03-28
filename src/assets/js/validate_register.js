// The purpose of this script is to validate the registration form on the front side

const nickname = document.getElementById('nickname');
const email = document.getElementById('email');
const confirmPassword = document.getElementById('confirm-password');
const password = document.getElementById('password');
const form = document.getElementsByTagName('form')[0];

// Regex patterns for validation
const regexNickname = /^[\w\d]{4,}$/;
const regexEmail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
const regexPassword = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

// Error messages display
const errorN = 'Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!';
const errorE = 'Ceci n\'est pas une adresse email valide !';
const errorP = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';

// Add error messages to the form and aria-properties
const errorForm = document.createElement('p');
errorForm.classList.add('error');
errorForm.id = 'errorForm';
errorForm.setAttribute('aria-live', 'false');
form.insertAdjacentElement('afterbegin', errorForm);
form.setAttribute('aria-errormessage', 'errorForm');
form.setAttribute('aria-invalid', 'false');

const errorNickname = addErrorMessage(nickname, errorN);
errorNickname.id = 'errorNickname';
errorNickname.setAttribute('aria-live', 'off');
nickname.setAttribute('aria-errormessage', 'errorNickname');

const errorEmail = addErrorMessage(email, errorE);
errorEmail.id = 'errorEmail';
errorEmail.setAttribute('aria-live', 'off');
email.setAttribute('aria-errormessage', 'errorEmail');

const errorPassword = addErrorMessage(password, errorP);
errorPassword.id = 'errorPassword';
errorNickname.setAttribute('aria-live', 'off');
password.setAttribute('aria-errormessage', 'errorPassword');

const errorConfirmPassword = addErrorMessage(confirmPassword, errorP);
errorConfirmPassword.id = 'errorConfirmPassword';
errorConfirmPassword.setAttribute('aria-live', 'off');
confirmPassword.setAttribute('aria-errormessage', 'errorConfirmPassword');

validateTextField(nickname, regexNickname, errorNickname);
validateTextField(email, regexEmail, errorEmail);
validateTextField(password, regexPassword, errorPassword);

// confirm password field control
confirmPassword.addEventListener('input', () => {
    errorConfirmPassword.style.display = 'block';
    errorConfirmPassword.setAttribute('aria-live', 'assertive');
    if (!regexPassword.test(confirmPassword.value)){
        confirmPassword.setAttribute('aria-invalid', 'true');
        errorConfirmPassword.textContent = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';
    } else if (confirmPassword.value !== password.value){
        confirmPassword.setAttribute('aria-invalid', 'true');
        errorConfirmPassword.textContent = 'Les mots de passe ne sont pas identiques!';
    } else {
        confirmPassword.setAttribute('aria-invalid', 'false');
        errorConfirmPassword.style.display = 'none';
    }
});

// form submission control
form.addEventListener('submit', (e) => {
    if (!regexNickname.test(nickname.value) || !regexEmail.test(email.value) || !regexPassword.test(password.value) || confirmPassword.value !== password.value) {
        e.preventDefault();
        errorForm.textContent = 'Veuillez corriger les erreurs dans le formulaire!';
        errorForm.setAttribute('aria-live', 'polite');
        form.setAttribute('aria-invalid', 'true');
        errorNickname.style.display = !regexNickname.test(nickname.value) ? 'block' : 'none';
        errorEmail.style.display =!regexEmail.test(email.value)? 'block' : 'none';
        errorPassword.style.display = !regexPassword.test(password.value) ? 'block' : 'none'; 
        setTimeout(() => {errorForm.textContent = '';}, 2000);
    } else {
        form.submit();
    }
});
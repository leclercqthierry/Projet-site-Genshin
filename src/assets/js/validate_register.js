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
const errorForm = document.createElement('p');
errorForm.classList.add('error');

const errorN = 'Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!';
const errorE = 'Ceci n\'est pas une adresse email valide !';
const errorP = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';

// Add error messages to the form
form.insertAdjacentElement('afterbegin', errorForm);

const errorNickname = addErrorMessage(nickname, errorN);
const errorEmail = addErrorMessage(email, errorE);
const errorPassword = addErrorMessage(password, errorP);
const errorConfirmPassword = addErrorMessage(confirmPassword, errorP);

validateTextField(nickname, regexNickname, errorNickname);
validateTextField(email, regexEmail, errorEmail);
validateTextField(password, regexPassword, errorPassword);

// confirm password field control
confirmPassword.addEventListener('input', () => {
    errorConfirmPassword.style.display = 'block';
    if (!regexPassword.test(confirmPassword.value)){
        errorConfirmPassword.textContent = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';
    } else if (confirmPassword.value !== password.value){
        errorConfirmPassword.textContent = 'Les mots de passe ne sont pas identiques!';
    } else {
        errorConfirmPassword.style.display = 'none';
    }
});

// form submission control
form.addEventListener('submit', (e) => {
    if (!regexNickname.test(nickname.value) || !regexEmail.test(email.value) || !regexPassword.test(password.value) || confirmPassword.value !== password.value) {
        e.preventDefault();
        errorForm.textContent = 'Veuillez corriger les erreurs dans le formulaire!';
        errorNickname.style.display = !regexNickname.test(nickname.value) ? 'block' : 'none';
        errorEmail.style.display =!regexEmail.test(email.value)? 'block' : 'none';
        errorPassword.style.display = !regexPassword.test(password.value) ? 'block' : 'none'; 
        setTimeout(() => {errorForm.textContent = '';}, 2000);
    } else {
        form.submit();
    }
});
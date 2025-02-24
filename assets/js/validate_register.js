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
const errorNickname = document.createElement('p');
const errorEmail = document.createElement('p');
const errorPassword = document.createElement('p');
const errorConfirmPassword = document.createElement('p');
const errorForm = document.createElement('p');

errorNickname.textContent = 'Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!';
errorEmail.textContent = 'Ceci n\'est pas une adresse email valide !';
errorPassword.textContent = 'Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères';

errorNickname.style.display = 'none';
errorEmail.style.display = 'none';
errorPassword.style.display = 'none';

// Add error messages to the form
nickname.insertAdjacentElement('afterend', errorNickname);
email.insertAdjacentElement('afterend', errorEmail);
password.insertAdjacentElement('afterend', errorPassword);
confirmPassword.insertAdjacentElement('afterend', errorConfirmPassword);
form.insertAdjacentElement('afterbegin', errorForm);

// nickname field control
nickname.addEventListener('input', () => {
    errorNickname.style.display = !regexNickname.test(nickname.value) ? 'block' : 'none';
});

// email field control
email.addEventListener('input', () => {
    errorEmail.style.display = !regexEmail.test(email.value) ? 'block' : 'none';
});

// password field control
password.addEventListener('input', () => {
    errorPassword.style.display =!regexPassword.test(password.value)? 'block' : 'none';
});

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
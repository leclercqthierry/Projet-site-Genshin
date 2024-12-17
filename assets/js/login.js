let forgottenPassword = document.querySelector('form a:not(.btn)');
console.log(forgottenPassword);

forgottenPassword.addEventListener('click', function (event) {
    let email = prompt('Si vous avez oublié votre mot de passe, veuillez entrez votre adresse email:');
});
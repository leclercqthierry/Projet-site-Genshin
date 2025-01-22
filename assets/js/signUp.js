let confirmPassword = document.getElementById('confirm-password');
let password = document.getElementById('password');
let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (confirmPassword.value != password.value) {
        alert('Attention! les mots de passe et sa confirmation doivent être identique.');
    }
    else{
        form.submit();
    }
});

// The purpose of this script is to validate the add character form on the front side

// Retrieving form elements
const forms = document.querySelectorAll('form');
const regexName = /^[a-zA-Z]{2}[a-zA-Z ]{1,98}$/;

function showError(message, errorForm){
    errorForm.textContent = message;
    errorForm.style.display = 'block';
    setTimeout(() => {errorForm.textContent = '';}, 2000);
}

forms.forEach(form => {
    const names = form.querySelectorAll("input[type=text]");
    const images = form.querySelectorAll("input[type='file']");
    const errorForm = document.createElement('p');
    form.insertAdjacentElement('afterbegin', errorForm);

    names.forEach(name => {
        const errorName = document.createElement('p');
        name.insertAdjacentElement('afterend', errorName);
        name.addEventListener('input',()=> {
            errorName.textContent = 'Le nom doit avoir entre 2 et 100 lettres uniquement (espaces inclus) mais ne pas comporter d\'espaces dans les 2 premiers caractères.';
            errorName.style.display = !(regexName.test(name.value)) ? 'block' : 'none';
        });
    });

    form.addEventListener('submit',(e)=> {
        e.preventDefault();
        images.forEach(image => {
            if (image.files.length === 0) {
                showError('Vous n\'avez pas chargé d\'image.', errorForm);
            } else if (image.files[0].size > 1048576) {
                showError('Votre image ne doit pas dépasser 1MB.', errorForm)
            } else if (!(image.value.match(/\.(jpg|jpeg|png|gif|webp)$/))){
                showError('Votre image doit être au format jpg, jpeg, png, gif ou webp.', errorForm);
            } else {
                errorForm.style.display = 'none';
            }
        });
        names.forEach(name => {
            if (!(regexName.test(name.value))){
                showError('Le nom doit avoir entre 2 et 100 lettres uniquement (espaces inclus) mais ne pas comporter d\'espaces dans les 2 premiers caractères.', errorForm);
            }
        });

        // if at least one duplicate
        if (names.length > new Set(names).size){
            showError('Vous ne pouvez pas ajouter deux ressources avec le même nom.', errorForm);
        }
        if (errorForm.textContent === '') {
            form.submit();
        }
    });
});
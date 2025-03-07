// The purpose of this script is to validate the edit resources form on the front side

const form = document.querySelector('form[name="edit-resource-form"]');

const regexName = /^[a-zéèê][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/;
const errorN = "Le nom ne commence pas par un espace ni une majuscule (caractères -éèêëàûô' autorisés à l'intérieur).";

if(form !== null){
    const names = form.querySelectorAll("input[type=text]");
    const images = form.querySelectorAll("input[type='file']");
    const errorForm = addErrorMessage(form, '');

    names.forEach(name => {
        const errorName = addErrorMessage(name, errorN);
        validateTextField(name, regexName, errorName);
    });
    
    form.addEventListener('submit',(e)=> {
        e.preventDefault();
        images.forEach(image => {
            if (image.files[0] !== undefined && image.files[0].size > 1048576) {
                showError('Votre image ne doit pas dépasser 1MB.', errorForm)
            } else if (image.files[0] !== undefined && !(image.value.match(/\.(jpg|jpeg|png|gif|webp)$/))){
                showError('Votre image doit être au format jpg, jpeg, png, gif ou webp.', errorForm);
            } else {
                errorForm.style.display = 'none';
            }
        });
        names.forEach(name => {
            if (!(regexName.test(name.value)) || name.value === '') {
                showError(errorN, errorForm);
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
}
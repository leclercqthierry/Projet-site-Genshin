// The purpose of this script is to validate the add character form on the front side

function showError(message, errorForm){
    errorForm.textContent = message;
    errorForm.style.display = 'block';
    setTimeout(() => {errorForm.textContent = '';}, 2000);
}

// Retrieving form elements
const form = document.querySelector('form');
const charName = document.getElementById('name');
const rarities = document.getElementsByName('rarity');

// Regex pattern for validation
const regexName = /^[A-Z][a-zA-Z -éèêë]+\S$/;

// Error messages display
const errorName = document.createElement('p');
const errorForm = document.createElement('p');

// Add error messages to the form
charName.insertAdjacentElement('afterend', errorName);
form.insertAdjacentElement('afterbegin', errorForm);

// nickname field control
charName.addEventListener('input', () => {
    errorName.textContent = 'Le nom du personnage doit commencer par une majuscule et ne pas comporter de chiffres ni de caractères spéciaux (seuls é, è, ê ou ë sont autorisés) et avoir au moins 3 lettres.';
    errorName.style.display = !regexName.test(charName.value) ? 'block' : 'none';
});


form.addEventListener('submit', (e) =>{
    e.preventDefault();
    const thumbnail = document.getElementById('thumbnail');
    const card = document.getElementById('card');
    if (thumbnail.files.length === 0 || card.files.length === 0) {
        showError('Vous n\'avez pas chargé d\'image.', errorForm);
    } else if (thumbnail.files[0].size > 1048576 || card.files[0].size > 1048576) {
        showError('Votre image ne doit pas dépasser 1MB.', errorForm)
    } else if (!(thumbnail.value.match(/\.(jpg|jpeg|png|gif|webp)$/)) || !(card.value.match(/\.(jpg|jpeg|png|gif|webp)$/))){
        showError('Votre image doit être au format jpg, jpeg, png, gif ou webp.', errorForm);
    } else {
        errorForm.style.display = 'none';
    }

    if (!regexName.test(charName.value) || charName.value===''){
        showError('Veuillez entrer un nom valide pour votre personnage.', errorForm);
    }
    if (!rarities[0].checked && !rarities[1].checked){
        showError('Veuillez selectionner une rareté pour votre personnage.', errorForm);
    };
    
    if (errorForm.textContent === '') {
        form.submit();
    }
});
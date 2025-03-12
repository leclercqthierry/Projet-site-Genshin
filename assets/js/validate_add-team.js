// The purpose of this script is to validate the add team form on the front side

const form1 = document.querySelector('#first-form form');
const form2 = document.querySelector('#second-form form');

if(form1 !== null){
    const teamName = form1.querySelector('#team-name');
    const regexName = /^[A-Z][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/;
    const errorN = "Le nom doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";

    const errorName = addErrorMessage(teamName, errorN);
    const errorForm = addErrorMessage(form1, '');

    validateTextField(teamName, regexName, errorName);

    form1.addEventListener('submit', (e) =>{
        e.preventDefault();
    
        if (!regexName.test(teamName.value) || teamName.value===''){
            showError('Veuillez entrer un nom valide pour votre équipe.', errorForm);
        }

        if (errorForm.textContent === '') {
            form1.submit();
        }
    });
}

if(form2 !== null){
    const selects = form2.querySelectorAll('select');
    const errorForm = addErrorMessage(form2, '');

    form2.addEventListener('submit', (e) => {
        e.preventDefault();

        // We must verify that all characters are different
        let teamChars = [];
        selects.forEach(select => {
            teamChars.push(select.value);
        });
        if (!checkAllDifferent(teamChars)) {
            showError('Tous les personnages doivent être différents.', errorForm);
        }else{
            form2.submit();
        }
    });
}
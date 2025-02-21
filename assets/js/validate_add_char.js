// The purpose of this script is to validate the add character form on the front side

// Retrieving form elements
const form = document.querySelector('form');
const charName = document.getElementById('name');
const element = document.getElementById('element');
const weapon = document.getElementById('weapon');
const rarities = document.getElementsByName('rarity');
const bonus = document.getElementById('bonus');
const farmDays = document.getElementById('farm-days');
const thumbnail = document.getElementById('thumbnail');
const card = document.getElementById('card');
const bossMat = document.getElementById('boss-mat');
const localMat = document.getElementById('local-mat');
const wbMat = document.getElementById('wb-mat');
const mobMatR1 = document.getElementById('mob-mat-r1');
const mobMatR2 = document.getElementById('mob-mat-r2');
const mobMatR3 = document.getElementById('mob-mat-r3');
const djMatR2 = document.getElementById('dj-mat-r2');
const djMatR3 = document.getElementById('dj-mat-r3');
const djMatR4 = document.getElementById('dj-mat-r4');

// Regex pattern for validation
const regexName = /^[A-Z][a-zA-Z -éèê]+\S$/;

// Error messages display
const errorName = document.createElement('p');
const errorForm = document.createElement('p');

// Add error messages to the form
charName.insertAdjacentElement('afterend', errorName);
form.insertAdjacentElement('afterbegin', errorForm);

// nickname field control
charName.addEventListener('input', () => {
    errorName.textContent = 'Le nom du personnage doit commencer par une majuscule et ne pas comporter de chiffres ni de caractères spéciaux (seuls é, è ou ê sont autorisés) et avoir au moins 2 lettres.';
    errorName.style.display = !regexName.test(charName.value) ? 'block' : 'none';
});


form.addEventListener('submit', (e) =>{
    e.preventDefault();
    let test1 = regexName.test(charName.value);

    let elements = ['anemo','geo','electro','dendro','hydro','pyro','cryo'];
    let test2 = elements.includes(element.value);
    
    let weapons = ['sword','claymore','bow','polearm','catalyst'];
    let test3 = weapons.includes(weapon.value);
    
    let test4 = rarities[0].checked || rarities[1].checked;

    let bonusArray = ['atq','def','pv','dgt-anemo','dgt-geo','dgt-electro','dgt-dendro','dgt-hydro','dgt-pyro','dgt-cryo','dgt-phy','crit-rate','crit-dgt', 're', 'me', 'heal'];
    let test5 = bonusArray.includes(bonus.value);

    let farmDaysArray = ['mo-th-su','tu-fr-su','we-sa-su'];
    let test6 = farmDaysArray.includes(farmDays.value);

    let test7 = (thumbnail.files.length > 0) && (card.files.length > 0) && (bossMat.files.length > 0) && (localMat.files.length > 0) && (wbMat.files.length > 0) && (mobMatR1.files.length > 0) && (mobMatR2.files.length > 0) && (mobMatR3.files.length > 0) && (djMatR2.files.length > 0) && (djMatR3.files.length > 0) && (djMatR4.files.length > 0);
    
    if(test1 && test2 && test3 && test4 && test5 && test6 && test7){
        form.submit();
    }else{
        errorForm.textContent = "Le formulaire n'a pas été rempli correctement.";
        setTimeout(() => {errorForm.textContent = '';}, 2000);
    }
});
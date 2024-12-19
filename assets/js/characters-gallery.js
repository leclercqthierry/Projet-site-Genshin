const weapons = document.getElementsByName('weapon');
const rarities = document.querySelectorAll('main input[type=checkbox]');
const elements = document.getElementsByName('element');
const select = document.querySelector('select');
const cards = document.querySelectorAll('.card');

// the function checks the radio weapons and returns the id of the one that is checked
function checkWeapons(){
    let id;
    weapons.forEach((weapon) => {
        if (weapon.checked) {
            id = weapon.id;
        }
    });
    return id; 
}
// the function checks the radio elements and returns the id of the one that is checked
function checkElements(){
    let id;
    elements.forEach((element) => {
        if (element.checked) {
            id = element.id;
        }
    });
    return id;
}

// the function checks the checkbox rarity and returns the values of the ones that are checked
function checkRarity(){
    let values = [];
    rarities.forEach((rarity) => {
        if (rarity.checked) {
            values.push(rarity.value);
        }
    });
    return values;
}

// We group the inputs in an array
let sortArray = [];
weapons.forEach((weapon) => sortArray.push(weapon));
rarities.forEach((rarity) => sortArray.push(rarity));
elements.forEach((element) =>sortArray.push(element));

sortArray.forEach((sort) => {
    sort.addEventListener('change', (event) => {
        let weaponChoise = checkWeapons();
        let elementChoise = checkElements();
        let raritiesChoise = checkRarity();
        cards.forEach((card) => {
            // Reveal all cards by default
            card.style.display = 'block';
            let test1 = weaponChoise == 'all-weapons' ? true : card.dataset.weapon == weaponChoise;
            let test2 = raritiesChoise.length == 0? false : raritiesChoise.includes(String(card.dataset.rarity));
            let test3 = elementChoise == 'all-elements' ? true : card.dataset.element == elementChoise;
            if (!test2){
                card.style.display = 'none';
            }
            else{
                if (!test1 ||!test3){
                    card.style.display = 'none';
                }
            }
        });
    });
});

// alphabetic, rarity and element filter
select.addEventListener('change', () => {
    switch(select.value){
        case "rarity": {
            cards.forEach(card => {
                if (card.dataset.rarity == 4){
                    card.style.order = 2;
                }
                else {
                    card.style.order = 1;
                }
            });break;
        }
        case "element": {
            cards.forEach(card => {
                switch(card.dataset.element){
                    case "anemo": card.style.order = 1;break;
                    case "geo": card.style.order = 2;break;
                    case "electro": card.style.order = 3;break;
                    case "dendro": card.style.order = 4;break;
                    case "hydro": card.style.order = 5;break;
                    case "pyro": card.style.order = 6;break;
                    case "cryo": card.style.order = 7;break;
                }
            }); break;
        }
        case "alphabetic-order": {
            cards.forEach(card => {
                card.style.order = 1;
            });
        }
    }
});
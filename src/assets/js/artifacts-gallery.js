// The purpose of the script is to process in javascript the sorting and filters of the artifacts-gallery page

const artifact = document.getElementsByName('artifact');
const rarities = document.querySelectorAll('main input[type=checkbox]');
const select = document.querySelector('select');
const cards = document.querySelectorAll('.card');


// paragraph that will host a message if no artifact is to be displayed
const p = document.createElement('p');
p.textContent = "Aucuns set d'artéfacts ne correspond à vos critères.";
document.querySelector('.gallery').appendChild(p);
p.style.display = 'none';

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

rarities.forEach((rarity) => {
    rarity.addEventListener('change', (event) => {
        let raritiesChoise = checkRarity();
        cards.forEach((card) => {
            // Reveal all cards by default
            card.parentElement.style.display = 'block';
            let test = raritiesChoise.length == 0? false : raritiesChoise.includes(String(card.dataset.rarity));
            if (!test){
                card.parentElement.style.display = 'none';
            }
        });
        p.style.display = raritiesChoise.length === 0 ? "block" : "none";
    });
});

// alphabetic, rarity and element filter
select.addEventListener('change', () => {
    switch(select.value){
        case "rarity": {
            cards.forEach(card => {
                switch(card.dataset.rarity){
                    case '3': card.parentElement.style.order = 3; break;
                    case '4': card.parentElement.style.order = 2; break;
                    case '5': card.parentElement.style.order = 1; break;
                }
            });break;
        }
        case "alphabetic-order": {
            cards.forEach(card => {
                card.parentElement.style.order = 1;
            });
        }
    }
});
const artifact = document.getElementsByName('artifact');
const rarities = document.querySelectorAll('main input[type=checkbox]');
const select = document.querySelector('select');
const cards = document.querySelectorAll('.card');


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
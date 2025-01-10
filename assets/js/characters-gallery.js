// A modifier quand on fera le back (BDD)
// Simulation d'une BDD avec 18 personnages variés (suffisant pour utiliser les tri et filtres)
let charactersArray = 
[
    {
        rarity: '5',
        weapon: 'sword',
        element: 'geo',
        character_image: '/assets/img/gallery/Characters/Albedo.webp',
        name: 'Albedo',
        element_image: '/assets/img/icons/Geo.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'dendro',
        character_image: '/assets/img/gallery/Characters/Alhaitham.webp',
        name: 'Alhaitam',
        element_image: '/assets/img/icons/Dendro.png'
    },
    {
        rarity: '4',
        weapon: 'bow',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Amber.webp',
        name: 'Amber',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '5',
        weapon: 'polearm',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Arlecchino.webp',
        name: 'Arlecchino',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'cryo',
        character_image: '/assets/img/gallery/Characters/Kamisato_Ayaka.webp',
        name: 'Ayaka',
        element_image: '/assets/img/icons/Cryo.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'hydro',
        character_image: '/assets/img/gallery/Characters/Kamisato_Ayato.webp',
        name: 'Ayato',
        element_image: '/assets/img/icons/Hydro.png'
    },
    {
        rarity: '5',
        weapon: 'catalyst',
        element: 'dendro',
        character_image: '/assets/img/gallery/Characters/Baizhu.webp',
        name: 'Baizhu',
        element_image: '/assets/img/icons/Dendro.png'
    },
    {
        rarity: '4',
        weapon: 'catalyst',
        element: 'hydro',
        character_image: '/assets/img/gallery/Characters/Barbara.webp',
        name: 'Barbara',
        element_image: '/assets/img/icons/Hydro.png'
    },
    {
        rarity: '4',
        weapon: 'claymore',
        element: 'electro',
        character_image: '/assets/img/gallery/Characters/Beidou.webp',
        name: 'Beidou',
        element_image: '/assets/img/icons/Electro.png'
    },
    {
        rarity: '4',
        weapon: 'sword',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Bennett.webp',
        name: 'Bennett',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '4',
        weapon: 'polearm',
        element: 'hydro',
        character_image: '/assets/img/gallery/Characters/Candace.webp',
        name: 'Candace',
        element_image: '/assets/img/icons/Hydro.png'
    },
    {
        rarity: '4',
        weapon: 'catalyst',
        element: 'cryo',
        character_image: '/assets/img/gallery/Characters/Charlotte.webp',
        name: 'Charlotte',
        element_image: '/assets/img/icons/Cryo.png'
    },
    {
        rarity: '4',
        weapon: 'polearm',
        element: 'pyro',
        character_image: '/assets/img/gallery/Characters/Chevreuse.webp',
        name: 'Chevreuse',
        element_image: '/assets/img/icons/Pyro.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'geo',
        character_image: '/assets/img/gallery/Characters/Chiori.webp',
        name: 'Chiori',
        element_image: '/assets/img/icons/Geo.png'
    },
    {
        rarity: '4',
        weapon: 'claymore',
        element: 'cryo',
        character_image: '/assets/img/gallery/Characters/Chongyun.webp',
        name: 'Chongyun',
        element_image: '/assets/img/icons/Cryo.png'
    },
    {
        rarity: '5',
        weapon: 'sword',
        element: 'electro',
        character_image: '/assets/img/gallery/Characters/Clorinde.webp',
        name: 'Clorinde',
        element_image: '/assets/img/icons/Electro.png'
    },
    {
        rarity: '4',
        weapon: 'bow',
        element: 'dendro',
        character_image: '/assets/img/gallery/Characters/Collei.webp',
        name: 'Collei',
        element_image: '/assets/img/icons/Dendro.png'
    },
    {
        rarity: '5',
        weapon: 'polearm',
        element: 'electro',
        character_image: '/assets/img/gallery/Characters/Cyno.webp',
        name: 'Cyno',
        element_image: '/assets/img/icons/Electro.png'
    }
];

// Create the gallery 
const gallery = document.querySelector('div.gallery');
let HTML = '';
let item = '';

// Modifier peut être quand on fera le back (pour l'instant redirection vers la fiche character ayant le même contenu pour tous)
charactersArray.forEach((character) => {
    item = `
    <a href="/character.html">
        <div class="card" data-rarity="${character.rarity}" data-weapon="${character.weapon}" data-element="${character.element}">
            <div class="img-container">
                <img src="${character.character_image}" alt="${character.name}" class="rarity${character.rarity} character" width="100">
                <img src="${character.element_image}" class="img-element">
            </div>
            <strong>${character.name}</strong>
        </div>
    </a>`;
    HTML += item;
});
gallery.innerHTML = HTML;

// Radio, checkbox, sort and filters
const weapons = document.getElementsByName('weapon');
const rarities = document.querySelectorAll('main input[type=checkbox]');
const elements = document.getElementsByName('element');
const select = document.querySelector('select');
const cards = document.querySelectorAll('.card');

// Checks the radio weapons and returns the id of the one that is checked
function checkWeapons(){
    let id;
    weapons.forEach((weapon) => {
        if (weapon.checked) {
            id = weapon.id;
        }
    });
    return id; 
}
// Checks the radio elements and returns the id of the one that is checked
function checkElements(){
    let id;
    elements.forEach((element) => {
        if (element.checked) {
            id = element.id;
        }
    });
    return id;
}

// Checks the checkbox rarity and returns the values of the ones that are checked
function checkRarity(){
    let values = [];
    rarities.forEach((rarity) => {
        if (rarity.checked) {
            values.push(rarity.value);
        }
    });
    return values;
}

// We group the inputs in a same array
let sortArray = [];
weapons.forEach((weapon) => sortArray.push(weapon));
rarities.forEach((rarity) => sortArray.push(rarity));
elements.forEach((element) =>sortArray.push(element));

sortArray.forEach((sort) => {
    sort.addEventListener('change', () => {
        let weaponChoise = checkWeapons();
        let elementChoise = checkElements();
        let raritiesChoise = checkRarity();
        cards.forEach((card) => {
            // Reveal all cards by default
            card.parentElement.style.display = 'block';
            let test1 = weaponChoise == 'all-weapons' ? true : card.dataset.weapon == weaponChoise;
            let test2 = raritiesChoise.length == 0? false : raritiesChoise.includes(String(card.dataset.rarity));
            let test3 = elementChoise == 'all-elements' ? true : card.dataset.element == elementChoise;
            if (!test2){
                card.parentElement.style.display = 'none';
            }
            else{
                if (!test1 || !test3){
                    card.parentElement.style.display = 'none';
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
                    card.parentElement.style.order = 2;
                }
                else {
                    card.parentElement.style.order = 1;
                }
            });break;
        }
        case "element": {
            cards.forEach(card => {
                switch(card.dataset.element){
                    case "anemo": card.parentElement.style.order = 1;break;
                    case "geo": card.parentElement.style.order = 2;break;
                    case "electro": card.parentElement.style.order = 3;break;
                    case "dendro": card.parentElement.style.order = 4;break;
                    case "hydro": card.parentElement.style.order = 5;break;
                    case "pyro": card.parentElement.style.order = 6;break;
                    case "cryo": card.parentElement.style.order = 7;break;
                }
            }); break;
        }
        case "alphabetic-order": {
            cards.forEach(card => {
                card.parentElement.style.order = 1;
            });
        }
    }
});
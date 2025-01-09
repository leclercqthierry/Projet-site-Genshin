// A modifier quand on fera le back (BDD)
let weaponsArray = [
    {
        rarity: '5',
        type: 'sword',
        name: 'Absolution',
        image: '/assets/img/gallery/Weapons/absolution.webp'
    },
    {
        rarity: '4',
        type: 'catalyst',
        name: 'Agathe de Rochenoire',
        image: '/assets/img/gallery/Weapons/agate_de_rochenoire.webp'
    },
    {
        rarity: '5',
        type: 'claymore',
        name: 'Akuoumaru',
        image: 'assets/img/gallery/Weapons/akuoumaru.webp'
    },
    {
        rarity: '5',
        type: 'bow',
        name: "Arc d'Amos",
        image: '/assets/img/gallery/Weapons/arc_d_amos.webp'
    },
    {
        rarity: '4',
        type: 'bow',
        name: 'Arc de guerre de Rochenoire',
        image: '/assets/img/gallery/Weapons/arc_de_guerre_de_rochenoire.webp'
    },
    {
        rarity: '5',
        type: 'claymore',
        name: 'Balise de la mer de roseaux',
        image: '/assets/img/gallery/Weapons/balise_de_la_mer_de_roseaux.webp'
    },
    {
        rarity: '4',
        type: 'catalyst',
        name: "Ballade d'un azur infini",
        image: '/assets/img/gallery/Weapons/ballade_d_un_azur_infini.webp'
    },
    {
        rarity: '4',
        type: 'polearm',
        name: 'Ballade des fjords',
        image: '/assets/img/gallery/Weapons/ballade_des_fjords.webp'
    },
    {
        rarity: '4',
        type: 'catalyst',
        name: 'Corne à boire cendrée',
        image: '/assets/img/gallery/Weapons/corne_a_boire_cendree.webp'
    },
    {
        rarity: '5',
        type: 'sword',
        name: 'Epée du faucon',
        image: '/assets/img/gallery/Weapons/epee_du_faucon.webp'
    },
    {
        rarity: '4',
        type: 'sword',
        name: 'Epée longue de Rochenoire',
        image: '/assets/img/gallery/Weapons/epee_longue_de_rochenoire.webp'
    },
    {
        rarity: '4',
        type: 'sword',
        name: "Lame kageuchi d'Amenoma",
        image: '/assets/img/gallery/Weapons/lame_kageuchi_d_amenoma.webp'
    },
    {
        rarity: '4',
        type: 'polearm',
        name: 'Lance de Rochenoire',
        image: '/assets/img/gallery/Weapons/lance_de_rochenoire.webp'
    },
    {
        rarity: '5',
        type: 'catalyst',
        name: 'Mille rêves flottant',
        image: '/assets/img/gallery/Weapons/mille_reves_flottants.webp'
    },
    {
        rarity: '3',
        type: 'polearm',
        name: 'Pampille noire',
        image: '/assets/img/gallery/Weapons/pampille_noire.webp'
    },
    {
        rarity: '5',
        type: 'bow',
        name: "Simulacre d'eau",
        image: '/assets/img/gallery/Weapons/simulacre_d_eau.webp'
    },
    {
        rarity: '4',
        type: 'claymore',
        name: 'Trancheuse de Rochenoire',
        image: '/assets/img/gallery/Weapons/trancheuse_de_rochenoire.webp'
    },
    {
        rarity: '4',
        type: 'bow',
        name: 'Traqueur des impasses',
        image: '/assets/img/gallery/Weapons/traqueur_des_impasses.webp'
    }
];

// Create the gallery 
const gallery = document.querySelector('div.gallery');
let HTML = '';
let item = '';

// Modifier le lien quand on fera le back (pour l'instant redirection vers la fiche Arc de guerre de Rochenoire  pour tous)
weaponsArray.forEach((weapon) => {
    item = `
    <a href="/weapon.html">
        <div class="card" data-rarity="${weapon.rarity}" data-weapon="${weapon.type}">
            <img src="${weapon.image}" alt="${weapon.name}" class="rarity${weapon.rarity} weapon">
            <strong>${weapon.name}</strong>
        </div>
    </a>`;
    HTML += item;
});
gallery.innerHTML = HTML;

const weapons = document.getElementsByName('weapon');
const rarities = document.querySelectorAll('main input[type=checkbox]');
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

// We group the inputs in an array
let sortArray = [];
weapons.forEach((weapon) => sortArray.push(weapon));
rarities.forEach((rarity) => sortArray.push(rarity));

sortArray.forEach((sort) => {
    sort.addEventListener('change', (event) => {
        let weaponChoise = checkWeapons();
        let raritiesChoise = checkRarity();
        cards.forEach((card) => {
            // Reveal all cards by default
            card.parentElement.style.display = 'block';
            let test1 = weaponChoise == 'all-weapons' ? true : card.dataset.weapon == weaponChoise;
            let test2 = raritiesChoise.length == 0? false : raritiesChoise.includes(String(card.dataset.rarity));
            if (!test2){
                card.parentElement.style.display = 'none';
            }
            else{
                if (!test1){
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
                switch(card.dataset.rarity){
                    case '3': card.parentElement.style.order = 3; break;
                    case '4': card.parentElement.style.order = 2; break;
                    case '5': card.parentElement.style.order = 1; break;
                }
            });break;
        }
        case "type": {
            cards.forEach(card => {
                switch(card.dataset.weapon){
                    case "sword": card.parentElement.style.order = 1;break;
                    case "claymore": card.parentElement.style.order = 2;break;
                    case "bow": card.parentElement.style.order = 3;break;
                    case "polearm": card.parentElement.style.order = 4;break;
                    case "catalyst": card.parentElement.style.order = 5;break;
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
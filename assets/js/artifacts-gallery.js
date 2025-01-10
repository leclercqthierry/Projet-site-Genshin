// A modifier quand on fera le back (BDD)
let artefactsArray = [
    {
        rarity: '3',
        image: '/assets/img/gallery/Artefacts_set/aventurier.webp',
        name: 'Aventurier'
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/berserker.webp',
        name: 'Berserker'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/briseur_de_glace.webp',
        name: 'Briseur de glace'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/Chevalerie_ensanglantee.webp',
        name: 'Chevalerie ensanglantée'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/chronique_du_pavillon_du_desert.webp',
        name: 'Chronique du pavillon du désert'
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/coeur_du_brave.webp',
        name: 'Coeur du brave'
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/coeur_du_gardien.webp',
        name: 'Coeur du gardien'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/echos_d_une_offrande.webp',
        name: "Echo d'une offrande"
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/embleme_du_destin_brise.webp',
        name: 'Emblême du destin brisé'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/fleur_du_paradis_perdu.webp',
        name: 'Fleur du paradis perdu'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/fragment_d_harmonie_divergente.webp',
        name: "Fragment d'harmonie divergente"
    },
    {
        rarity: '4',
        image: '/assets/img/gallery/Artefacts_set/parieur.webp',
        name: 'Parieur'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/rideau_du_gladiateur.webp',
        name: 'Rideau du gladiateur'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/roche_ancienne.webp',
        name: 'Roche ancienne'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/reve_dore.webp',
        name: 'Rêve doré'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/sorciere_des_flammes_ardentes.webp',
        name: 'Sorcière des flammes ardentes'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/souvenir_de_foret.webp',
        name: 'Souvenir de forêt'
    },
    {
        rarity: '5',
        image: '/assets/img/gallery/Artefacts_set/troupe_doree.webp',
        name: 'Troupe dorée'
    }
];

// Create the gallery 
const gallery = document.querySelector('div.gallery');
let HTML = '';
let item = '';

// Modifier le lien quand on fera back (pour l'instant redirection vers la fiche berserker pour tous)
artefactsArray.forEach((artefact) => {
    item = `
    <a href="/artifact.html">
        <div class="card" data-rarity="${artefact.rarity}">
            <img src="${artefact.image}" alt="${artefact.name}" class="rarity${artefact.rarity} artifact">
            <strong>${artefact.name}</strong>
        </div>
    </a>`;
    HTML += item;
});
gallery.innerHTML = HTML;

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
// A modifier quand on fera le back (BDD)
let teamsArray = [
    {
        name: 'Meilleur équipe pour Emilie',
        author: 'user887',
        character1:
        {
            name: 'Alhaitham',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Alhaitham.webp',
            element_image: '/assets/img/icons/Dendro.png',
        },
        character2:
        {
            name: 'Emilie',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Emilie.webp',
            element_image: '/assets/img/icons/Dendro.png',
        },
        character3:
        {
            name: 'Xiangling',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Xiangling.webp',
            element_image: '/assets/img/icons/Pyro.png',
        },
        character4:
        {
            name: 'Bennett',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Bennett.webp',
            element_image: '/assets/img/icons/Pyro.png',
        }
    },
    {
        name: 'Meilleur équipe pour Kachina',
        author: 'user887',
        character1:
        {
            name: 'Mualani',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Mualani.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character2:
        {
            name: 'Kachina',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Kachina.webp',
            element_image: '/assets/img/icons/Geo.png',
        },
        character3:
        {
            name: 'Xiangling',
            rarity: '4',
            image: '/assets/img/gallery/Characters/Xiangling.webp',
            element_image: '/assets/img/icons/Pyro.png',
        },
        character4:
        {
            name: 'Zhongli',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Zhongli.webp',
            element_image: '/assets/img/icons/Geo.png',
        }
    },
    {
        name: 'Meilleur équipe pour Sigewinne',
        author: 'user887',
        character1:
        {
            name: 'Yelan',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Yelan.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character2:
        {
            name: 'Kazuha',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Kaedehara_Kazuha.webp',
            element_image: '/assets/img/icons/Anemo.png',
        },
        character3:
        {
            name: 'Furina',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Furina.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character4:
        {
            name: 'Sigewinne',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Sigewinne.webp',
            element_image: '/assets/img/icons/Hydro.png',
        }
    },
    {
        name: 'Meilleur équipe pour Clorinde',
        author: 'user887',
        character1:
        {
            name: 'Clorinde',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Clorinde.webp',
            element_image: '/assets/img/icons/Electro.png',
        },
        character2:
        {
            name: 'Nahida',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Nahida.webp',
            element_image: '/assets/img/icons/Dendro.png',
        },
        character3:
        {
            name: 'Furina',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Furina.webp',
            element_image: '/assets/img/icons/Hydro.png',
        },
        character4:
        {
            name: 'Baizhu',
            rarity: '5',
            image: '/assets/img/gallery/Characters/Baizhu.webp',
            element_image: '/assets/img/icons/Dendro.png',
        }
    }
]

// Create the gallery 
const gallery = document.querySelector('div.gallery');
let HTML = '';
let item = '';

// Modifier le lien quand on fera le back (pour l'instant redirection vers la fiche Meilleure équipe pour Emilie pour tous)
teamsArray.forEach((team) => {
    item = `
    <a href="/team.html">
        <div class="team-container">
            <h2>${team.name} de ${team.author}</h2>
            <div class="team">
                <div class="card" data-rarity="${team.character1.rarity}">
                    <div class="img-container">
                        <img src="${team.character1.image}" alt="${team.character1.name}" class="rarity${team.character1.rarity} character">
                        <img src="${team.character1.element_image}" class="img-element">
                    </div>
                    <p>${team.character1.name}</p>
                </div>
                <div class="card" data-rarity="${team.character2.rarity}">
                    <div class="img-container">
                        <img src="${team.character2.image}" alt="${team.character2.name}" class="rarity${team.character2.rarity} character">
                        <img src="${team.character2.element_image}" class="img-element">
                    </div>
                    <p>${team.character2.name}</p>
                </div>
                <div class="card" data-rarity="${team.character3.rarity}">
                    <div class="img-container">
                        <img src="${team.character3.image}" alt="${team.character3.name}" class="rarity${team.character3.rarity} character">
                        <img src="${team.character3.element_image}" class="img-element">
                    </div>
                    <p>${team.character3.name}</p>
                </div>
                <div class="card" data-rarity="${team.character4.rarity}">
                    <div class="img-container">
                        <img src="${team.character4.image}" alt="${team.character4.name}" class="rarity${team.character4.rarity} character">
                        <img src="${team.character4.element_image}" class="img-element">
                    </div>
                    <p>${team.character4.name}</p>
                </div>
            </div>
        </div>
    </a>`;
    HTML += item;
});
gallery.innerHTML = HTML;

const teamLinks = document.querySelectorAll('.gallery a');
const characterArray = document.querySelectorAll('.gallery a p');
let teamCharacters = [];

for(let i = 0; i < teamLinks.length; i++) {
    let tempArray = [];
    for(let j = 0; j < 4; j++) {
        tempArray.push(characterArray[4*i+j].textContent);
    }
    teamCharacters.push(tempArray);
}

const search = document.querySelector('input[type="search"]');

search.addEventListener('input', function(event) {
    let searchValue = event.target.value.toLowerCase();
    if (searchValue === ''){
        teamLinks.forEach(link => {
            link.style.display = 'block';
        });
        return;
    }
    else {
        teamCharacters.forEach(team => {
            let characters = team.join(' ');
                if(characters.toLowerCase().includes(searchValue)) {
                    teamLinks[teamCharacters.indexOf(team)].style.display = 'block';
                } else {
                    teamLinks[teamCharacters.indexOf(team)].style.display = 'none';
                }
        });
    }
 });
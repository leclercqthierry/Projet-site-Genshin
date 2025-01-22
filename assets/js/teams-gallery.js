// Create the gallery 
const gallery = document.querySelector('div.gallery');
let HTML = '';
let item = '';

// Modifier le lien quand on fera le back (pour l'instant redirection vers la fiche Meilleure équipe pour Emilie pour tous)
teamsArray.forEach((team) => {
    let characters = [], characters_element_image = [];
    for (let i = 0; i < 4; i++) {
        characters[i] = charactersArray.find(character => character.name === team.slot[i].character);
        characters_element_image[i] = elementArray.find(element => element.name === characters[i].element).element_image;
    }
    item = `
    <a href="team.html">
        <div class="team-container">
            <h2>${team.name} de ${team.author}</h2>
            <div class="team">
                <div class="card" data-rarity="${characters[0].rarity}">
                    <div class="img-container">
                        <img src="${characters[0].image}" alt="${characters[0].name}" class="rarity${characters[0].rarity} character">
                        <img src="${characters_element_image[0]}" class="img-element">
                    </div>
                    <p>${characters[0].name}</p>
                </div>
                <div class="card" data-rarity="${characters[1].rarity}">
                    <div class="img-container">
                        <img src="${characters[1].image}" alt="${characters[1].name}" class="rarity${characters[1].rarity} character">
                        <img src="${characters_element_image[1]}" class="img-element">
                    </div>
                    <p>${characters[1].name}</p>
                </div>
                <div class="card" data-rarity="${characters[2].rarity}">
                    <div class="img-container">
                        <img src="${characters[2].image}" alt="${characters[2].name}" class="rarity${characters[2].rarity} character">
                        <img src="${characters_element_image[2]}" class="img-element">
                    </div>
                    <p>${characters[2].name}</p>
                </div>
                <div class="card" data-rarity="${characters[3].rarity}">
                    <div class="img-container">
                        <img src="${characters[3].image}" alt="${characters[3].name}" class="rarity${characters[3].rarity} character">
                        <img src="${characters_element_image[3]}" class="img-element">
                    </div>
                    <p>${characters[3].name}</p>
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
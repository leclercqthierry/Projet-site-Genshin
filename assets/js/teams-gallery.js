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
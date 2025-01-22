const charSelect = document.querySelectorAll('select[name="char"]');
const weaponSelect = document.querySelectorAll('select[name="weapon"]');
const artifactSelect = document.querySelectorAll('select[name="artifact"]');

// Add characters to select
charSelect.forEach(select => {
    charactersArray.forEach(character =>{
        select.innerHTML += `<option value="${character.name}">${character.name}</option>`;
    });
});

// A character cannot equip a weapon of a type different from his own
let matchingWeapons = [];
let formLabelWeapon = document.querySelectorAll('.form-label:nth-child(3)');
for(let i = 0; i < charSelect.length; i++) {
    charSelect[i].addEventListener('change', () => {
        let selectedChar = charactersArray.find(char => char.name === charSelect[i].value);

        // we will recover all the weapons of the same type as the character's weapon type
        matchingWeapons = weaponsArray.filter(weapon => weapon.type === selectedChar.weapon)

        // Clear options
        weaponSelect[i].innerHTML = '';

        // Add matchingweapons to select
        matchingWeapons.forEach(weapon =>{
            weaponSelect[i].innerHTML += `<option value="${weapon.name}">${weapon.name}</option>`;
        });
        formLabelWeapon[i].style.display = 'flex';
    });
}

// Add artifacts to select
artifactSelect.forEach(select => {
    artifactsArray.forEach(artifact =>{
        select.innerHTML += `<option value="${artifact.name}">${artifact.name}</option>`;
    });
});

const form = document.querySelector('form');

function checkAllDifferent(array){
    let n = array.length;
    for (let i = 0; i < n; i++){
        for (let j = i + 1; j < n; j++){
            if (array[i] === array[j]) {
                return false; // At least two identical values
            }
        }
    }
    return true; // All values are differents
}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    // All characters must be differents
    let teamChars = [];
    charSelect.forEach(select => {
        teamChars.push(select.value);
    });
    if (!checkAllDifferent(teamChars)) {
        alert('Tous les personnages doivent être différents!');
        return;
    } else {
        form.submit(); // Submit the form if all conditions are met.
    }
});
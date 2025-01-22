const selectCharToEdit = document.querySelector('form[name="select-character-form"]');
const characterToEditForm = document.querySelector('form[name="edit-character-form"]');
const charSelect = document.querySelector('select[name="character"]');
const characterName = document.getElementById('name');
const elementOptions = document.querySelectorAll('#element option');
const weaponOptions = document.querySelectorAll('#weapon option');
const rarityRadios = document.querySelectorAll('.rarity input[type="radio"]');
const bonusOptions = document.querySelectorAll('#bonus option');
const farmDaysOptions = document.querySelectorAll('#farm-days option');
const inputsFile = document.querySelectorAll('input[type="file"]');


// Add characters to select in selection form
charactersArray.forEach(character =>{
    charSelect.innerHTML += `<option value="${character.name}">${character.name}</option>`;
});

// we hide the selection form and display the edition form
selectCharToEdit.addEventListener('submit',(e)=>{
    e.preventDefault();
    characterToEditForm.style.display = 'flex';
    characterToEditForm.style.flexDirection = 'column';
    selectCharToEdit.style.display = 'none';
});

// pre-filling of fields based on the select value
charSelect.addEventListener('change',(e)=>{
    characterName.value = e.target.value;
    elementOptions.forEach(option => {
        if(option.value === charactersArray.find(character => character.name === e.target.value).element){
            option.selected = true;
        }
    });
    weaponOptions.forEach(option => {
        if(option.value === charactersArray.find(character => character.name === e.target.value).weapon){
            option.selected = true;
        }
    });
    rarityRadios.forEach(radio => {
        if(radio.value === charactersArray.find(character => character.name === e.target.value).rarity){
            radio.checked = true;
        }
    });
    bonusOptions.forEach(option => {
        if(option.value === charactersArray.find(character => character.name === e.target.value).bonus_elevation){
            option.selected = true;
        }
    });
    farmDaysOptions.forEach(option => {
        if(option.value === charactersArray.find(character => character.name === e.target.value).aptitude_farm_days){
            option.selected = true;
        }
    });

    // creating and populating an image path array
    let imgPathArray = [];
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).image);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).card);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).boss_drop);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).local_material);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).world_boss_drop);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).mob_drop[0]);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).mob_drop[1]);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).mob_drop[2]);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).dungeon_drop[0]);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).dungeon_drop[1]);
    imgPathArray.push(charactersArray.find(character => character.name === e.target.value).dungeon_drop[2]);

    // we display all the images corresponding to the fieldset and the character with the input file
    for (let i = 0; i < imgPathArray.length; i++){
        let img = document.createElement('img');
        img.style.width = i===1 ? '20px': '60px'; // because not same ratio
        img.style.height = '60px';
        img.src = imgPathArray[i];
        img.style.margin = 'auto';
        inputsFile[i].parentElement.appendChild(img);
    }
});

// when an image is selected, it changes dynamically
for (let i = 0; i < inputsFile.length; i++) {
    inputsFile[i].addEventListener('change', (e) => {
        let img = inputsFile[i].parentElement.children[2];
        img.style.width = i===1 ? '20px' : '60px';
        img.style.height = '60px';
        img.style.margin = 'auto';
        img.src = URL.createObjectURL(e.target.files[0]);
    });
}
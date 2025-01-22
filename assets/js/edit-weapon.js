const weaponSelect = document.getElementById('weapon');
const selectWeaponToEdit = document.querySelector('form[name="select-weapon-form"]');
const weaponToEditForm = document.querySelector('form[name="edit-weapon-form"]');
const weaponName = document.getElementById('name');
const typeOptions = document.querySelectorAll('#type option');
const rarityRadios = document.querySelectorAll('.rarity input[type="radio"]');
const bonusOptions = document.querySelectorAll('#bonus option');
const obtainingOptions = document.querySelectorAll('#obtaining option');
const farmDaysOptions = document.querySelectorAll('#farm-days option');
const description = document.getElementById('description');
const inputsFile = document.querySelectorAll('input[type="file"]');

// Add weapons to select in selection form
weaponsArray.forEach(weapon =>{
    weaponSelect.innerHTML += `<option value="${weapon.name}">${weapon.name}</option>`;
});

// we hide the selection form and display the edition form
selectWeaponToEdit.addEventListener('submit',(e)=>{
    e.preventDefault();
    weaponToEditForm.style.display = 'flex';
    weaponToEditForm.style.flexDirection = 'column';
    selectWeaponToEdit.style.display = 'none';
});

// pre-filling of fields based on the select value
weaponSelect.addEventListener('change',(e)=>{
    weaponName.value = e.target.value;
    typeOptions.forEach(option => {
        if(option.value === weaponsArray.find(weapon => weapon.name === e.target.value).type){
            option.selected = true;
        }
    });
    rarityRadios.forEach(radio => {
        if(radio.value === weaponsArray.find(weapon => weapon.name === e.target.value).rarity){
            radio.checked = true;
        }
    });
    bonusOptions.forEach(option => {
        if(option.value === weaponsArray.find(weapon => weapon.name === e.target.value).sub_stat){
            option.selected = true;
        }
    });
    obtainingOptions.forEach(option => {
        if(option.value === weaponsArray.find(weapon => weapon.name === e.target.value).obtaining){
            option.selected = true;
        }
    });
    farmDaysOptions.forEach(option => {
        if(option.value === weaponsArray.find(weapon => weapon.name === e.target.value).aptitude_farm_days){
            option.selected = true;
        }
    });
    description.value = weaponsArray.find(weapon => weapon.name === e.target.value).description;

    // creating and populating an image path array
    let imgPathArray = [];
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).image);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).card);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).mob_drop[0]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).mob_drop[1]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).mob_drop[2]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).elevation_weapon_drop[0]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).elevation_weapon_drop[1]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).elevation_weapon_drop[2]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).dungeon_weapon[0]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).dungeon_weapon[1]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).dungeon_weapon[2]);
    imgPathArray.push(weaponsArray.find(weapon => weapon.name === e.target.value).dungeon_weapon[3]);

    // we display all the images corresponding to the fieldset and the weapon with the input file
    for (let i = 0; i < imgPathArray.length; i++){
        let img = document.createElement('img');
        img.style.width = i===1 ? '20px': '60px'; // because not same ratio
        img.style.height = '60px';
        img.src = imgPathArray[i];
        img.style.margin = 'auto';
        console.log(inputsFile[i].parentElement);
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
const teamSelect = document.getElementById('team');
const selectTeamToEdit = document.querySelector('form[name="select-team-form"]');
const teamToEditForm = document.querySelector('form[name="edit-team-form"]');
const teamName = document.getElementById('name');
let charSelects = [], weaponSelects = [], artifactSelects = [], descriptions = [];

for (let i = 0; i < 4; i++){
    charSelects.push(document.getElementById(`char${i+1}`));
    weaponSelects.push(document.getElementById(`weapon${i+1}`));
    artifactSelects.push(document.getElementById(`set${i+1}`));
    descriptions.push(document.getElementById(`note${i+1}`));
}

// Add teams to select in selection form
teamsArray.forEach(team =>{
    teamSelect.innerHTML += `<option value="${team.name}">${team.name}</option>`;
});

// we hide the selection form and display the edition form
selectTeamToEdit.addEventListener('submit',(e)=>{
    e.preventDefault();
    teamToEditForm.style.display = 'flex';
    teamToEditForm.style.flexDirection = 'column';
    selectTeamToEdit.style.display = 'none';
});

// pre-filling of fields based on the select value
teamSelect.addEventListener('change',(e)=>{
    let teamToEdit = teamsArray.find(team => team.name === e.target.value);
    console.log(teamToEdit.slot[0].weapon);

    // Add characters , weapons and artifacts to the select
    for (let i = 0; i < 4; i++) {
        // Clear options
        charSelects[i].innerHTML = '';
        weaponSelects[i].innerHTML = '';
        artifactSelects[i].innerHTML = '';
        descriptions[i].textContent = '';
        
        // Add characters to select with the correct option selected
        charactersArray.forEach(char => {
            if (char.name === teamToEdit.slot[i].character){
                charSelects[i].innerHTML += `<option value="${char.name}" selected>${char.name}</option>`;
            } else {
                charSelects[i].innerHTML += `<option value="${char.name}">${char.name}</option>`;
            }
        });

        //TODO ajouter les bonnes armes et artéfact à base.js et vérifier que le code fonctionne

        // Add weapons to select with the correct option selected
        weaponsArray.forEach(wpn => {
            if (wpn.name === teamToEdit.slot[i].weapon){
                weaponSelects[i].innerHTML += `<option value="${wpn.name}" selected>${wpn.name}</option>`;
            } else {
                weaponSelects[i].innerHTML += `<option value="${wpn.name}">${wpn.name}</option>`;
            }
        });
        
        // Add artifacts to select with the correct option selected
        artifactsArray.forEach(art => {
            if (art.name === teamToEdit.slot[i].artifact){
                weaponSelects[i].innerHTML += `<option value="${art.name}" selected>${art.name}</option>`;
            } else {
                weaponSelects[i].innerHTML += `<option value="${art.name}">${art.name}</option>`;
            }
        });
    }
});
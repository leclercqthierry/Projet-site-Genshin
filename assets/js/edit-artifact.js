const artifactSelect = document.getElementById('artifact');
const selectArtifactToEdit = document.querySelector('form[name="select-artifact-form"]');
const artifactToEditForm = document.querySelector('form[name="edit-artifact-form"]');
const artifactName = document.getElementById('name');
const rarityRadios = document.querySelectorAll('.rarity input[type="radio"]');
const description = document.getElementById('description');
const inputFile = document.querySelector('input[type="file"]');

// Add artifacts to select in selection form
artifactsArray.forEach(artifact =>{
    artifactSelect.innerHTML += `<option value="${artifact.name}">${artifact.name}</option>`;
});

// we hide the selection form and display the edition form
selectArtifactToEdit.addEventListener('submit',(e)=>{
    e.preventDefault();
    artifactToEditForm.style.display = 'flex';
    artifactToEditForm.style.flexDirection = 'column';
    selectArtifactToEdit.style.display = 'none';
});

// pre-filling of fields based on the select value
artifactSelect.addEventListener('change',(e)=>{
    artifactName.value = e.target.value;
    rarityRadios.forEach(radio => {
        if(radio.value === artifactsArray.find(artifact => artifact.name === e.target.value).rarity){
            radio.checked = true;
        }
    });
    description.value = artifactsArray.find(artifact => artifact.name === e.target.value).description;

    // creating and populating an image path array
    let img = document.createElement('img');
    img.style.width = '60px'; 
    img.style.height = '60px';
    img.src = artifactsArray.find(artifact => artifact.name === e.target.value).image;
    img.style.margin = 'auto';
    inputFile.parentElement.appendChild(img);
});

// when an image is selected, it changes dynamically
inputFile.addEventListener('change', (e) => {
    let img = inputFile.parentElement.children[2];
    img.style.width = '60px';
    img.style.height = '60px';
    img.style.margin = 'auto';
    img.src = URL.createObjectURL(e.target.files[0]);
});
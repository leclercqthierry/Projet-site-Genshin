const artifactSelect = document.querySelectorAll('select[name="artifact"]');

// Add artifact to select
artifactSelect.forEach(select => {
    artifactsArray.forEach(artifact =>{
        select.innerHTML += `<option value="${artifact.name}">${artifact.name}</option>`;
    });
});

const form = document.querySelector('form');
const confirmDialog = document.getElementById('confirm-dialog');
const confirmBtn = document.querySelector('button[type="submit"]');
const cancelBtn = document.getElementById('cancel');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    confirmDialog.style.display = 'block';
});

cancelBtn.addEventListener('click', () => {
    confirmDialog.style.display = 'none';
});

confirmBtn.addEventListener('click', () => {
    confirmDialog.style.display = 'none';
    form.submit();
});
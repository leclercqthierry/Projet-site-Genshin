const charSelect = document.querySelectorAll('select[name="character"]');

// Add characters to select
charSelect.forEach(select => {
    charactersArray.forEach(character =>{
        select.innerHTML += `<option value="${character.name}">${character.name}</option>`;
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
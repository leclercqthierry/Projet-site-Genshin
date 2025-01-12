const teamSelect = document.querySelectorAll('select[name="team"]');

// Add team to select
// Determine whether user or admin
let availableTeam;
if (isAdmin){
    availableTeam = teamsArray;
} else {
    availableTeam = teamsArray.filter(team => team.author === currentUser);
}
teamSelect.forEach(select => {
    teamsArray.forEach(team =>{
        select.innerHTML += `<option value="${team.name}">${team.name}</option>`;
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
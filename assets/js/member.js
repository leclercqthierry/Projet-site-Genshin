let myteams = teamsArray.filter(team => team.author === currentUser);

// Add myteams to my page
const gallery = document.querySelector('div.gallery');
let HTML = '';
let item = '';

// changer le lien quand back-end sera vu
if (myteams.length > 0){
    myteams.forEach((team) => {
        item = `
        <div class="team-container">
            <h2>${team.name} de ${team.author}</h2>
            <div class="team">
                <div class="card">
                    <img src="${team.character1.image}" alt="${team.character1.name}" class="rarity${team.character1.rarity} character">
                    <img src="${team.character1.element_image}" class="img-element">
                    <p>${team.character1.name}</p>
                </div>
                <div class="card">
                    <img src="${team.character2.image}" alt="${team.character2.name}" class="rarity${team.character2.rarity} character">
                    <img src="${team.character2.element_image}" class="img-element">
                    <p>${team.character2.name}</p>
                </div>
                <div class="card">
                    <img src="${team.character3.image}" alt="${team.character3.name}" class="rarity${team.character3.rarity} character">
                    <img src="${team.character3.element_image}" class="img-element">
                    <p>${team.character3.name}</p>
                </div>
                <div class="card">
                    <img src="${team.character4.image}" alt="${team.character4.name}" class="rarity${team.character4.rarity} character">
                    <img src="${team.character4.element_image}" class="img-element">
                    <p>${team.character4.name}</p>
                </div>
            </div>
            <div class="btn-container1">
                <button class="btn">Editer</button>
                <button class="btn">Supprimer</button>
            </div>
        </div>`;
        HTML += item;
    });
} else {
    HTML = "<p>Vous n'avez créer aucune équipe.</p>";
}
gallery.innerHTML = HTML;

const deleteBtns = document.querySelectorAll('.btn-container1 .btn:last-child');
const editBtns = document.querySelectorAll('.btn-container1 .btn:first-child');
const deleteAccountBtn = document.querySelector('.btn-container2 .btn:last-child');


deleteBtns.forEach(btn => {
    btn.addEventListener('click', () =>{
        btn.parentElement.parentElement.remove();
    });
});

editBtns.forEach(btn => {
    //TODO:
});

deleteAccountBtn.addEventListener('click', () => {
    //TODO:
    confirm("Etes vous sûr de supprimer votre compte? Cette action est irreversible vous ne pourrez plus le récupérer ensuite !");
    // effacer l'user de la BDD (à voir s'il n'y a pas un temps de conservation des données fixé par la réglementation)
});
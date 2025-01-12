let isConnected = localStorage.getItem('isConnected') != null ? localStorage.getItem('isConnected') : 'false';
let isAdmin = localStorage.getItem('isAdmin') != null ? localStorage.getItem('isAdmin') : 'false';
currentUser = localStorage.getItem('currentUser');
console.log(currentUser);

/* Si je ne suis pas connecté on fait rien sinon:
    - on change le lien Se connecter pour mes teams si membre et panneau admin si admin
    - on ajoute un lien de déconnexion
    - on écoute le click sur le lien de déconnexion pour déconnecter l'utilisateur
*/

const link = document.querySelector('header .menu li:last-child').children[0];
const ul = document.querySelector('header ul');

// creation of the future disconnection link
let li = document.createElement('li');
let a = document.createElement('a');
a.textContent = 'Se déconnecter';
li.appendChild(a);

changeLinkConnect(isConnected, isAdmin);

/* Change link in the menu if connected
** @param {Boolean} isConnected
** @param {Boolean} isAdmin */
function changeLinkConnect(isConnected, isAdmin) {
    if (isConnected === 'true' && link.textContent === 'Se connecter'){
        link.href = isAdmin === 'true' ? '/admin-menu.html' : '/member.html';
        link.textContent = isAdmin === 'true' ? 'Panneau Admin' : 'Mes teams';
    
        // Add the deconnexion link
        ul.appendChild(li);
    }
}

/* Change link in the menu to initial state if disconnected */
function changeLinkDisconnect(){
    // Remove the deconnexion link
    ul.removeChild(li);
    // Change link to initial state
    link.textContent = 'Se connecter';
    link.href = '/login.html';
    // Clear local storage items
    localStorage.removeItem('isConnected');
    localStorage.removeItem('isAdmin');
    localStorage.removeItem('currentUser');
    // Return to index.html
    window.location.href = '/index.html';
}


a.addEventListener('click', () =>{
    isConnected = 'false';
    isAdmin = 'false';
    changeLinkDisconnect();
});
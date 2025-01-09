// A initialiser quand on fera le back
let isConnected;
let isAdmin;

const link = document.querySelector('header .menu li:last-child').children[0];
const ul = document.querySelector('header ul');

// creation of the future disconnection link
let li = document.createElement('li');
let a = document.createElement('a');
a.textContent = 'Se déconnecter';
li.appendChild(a);

/* Si je ne suis pas connecté on fait rien sinon:
    - on change le lien Se connecter pour mes teams si membre et admin si admin
    - on ajoute un lien de déconnexion
    - on écoute le click sur le lien de déconnexion pour déconnecter l'utilisateur
*/

/* Change link in the menu if connected
** @param {Boolean} isConnected
** @param {Boolean} isAdmin */
function changeLinkConnect(isConnected, isAdmin) {
    if (isConnected && link.textContent === 'Se connecter'){
        link.href = isAdmin ? '/admin.html' : '/member.html';
        link.textContent = isAdmin ? 'Admin' : 'Mes teams';
    
        // Add the deconnexion link
        ul.appendChild(li);
    }
}

/* Change link in the menu to initial state if disconnected */
function changeLinkDisconnect(){
    // Remove the deconnexion link
    ul.removeChild(li);
    link.textContent = 'Se connecter';
    link.href = '/login.html';
}

a.addEventListener('click', () =>{
    isConnected = false;
    isAdmin = false;
    changeLinkDisconnect();
});

changeLinkConnect(false, true);
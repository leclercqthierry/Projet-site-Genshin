<header>
    <!--Navigation-->
    <nav>
        <!--Logo-->
        <a href="index">
            <img src="assets/img/Logo.webp" alt="Accueil" id="logo">
        </a>
        <!--Menu toggle-->
        <input type="checkbox" id="menu_toggle">
        <label for="menu_toggle" id="burger">☰</label>
        <!--Menu-->
        <ul class="menu">
            <li>
                <a href="characters-gallery">Galerie personnages</a>
            </li>
            <li>
                <a href="weapons-gallery">Galerie armes</a>
            </li>
            <li>
                <a href="artifacts-gallery">Galerie artéfacts</a>
            </li> 
            <li>
                <a href="teams-gallery">Galerie teams</a>
            </li>
        <?php if (isset($_SESSION['role'])): ?>
            <li>
                <a <?= $_SESSION['role'] === 'Member' ? "href='Member'>Mes Teams" : "href='admin-menu'>Admin Menu" ?>></a>
            </li>
            <li>
                <a href="deconnect">Déconnexion</a>
            </li>                  
        <?php else: ?>
            <li>
                <a href="login">Se connecter</a>
            </li>
        <?php endif; ?>
        </ul>
        <label for="menu_toggle" id="cross">X</label>
    </nav>
</header>
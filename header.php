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
            <?php
                if (isset($_SESSION['role'])){
                    $link = ($_SESSION['role'] === 2) ? '<li><a href="member">Mes Teams</a></li>' : '<li><a href="admin-menu">Admin Menu</a></li>';
                    $link .= '<li><a href="deconnect">Déconnexion</a></li>';
                    echo $link;                    
                }else {
                    echo '<li><a href="login">Se connecter</a></li>';
                }
            ?>
        </ul>
        <label for="menu_toggle" id="cross">X</label>
    </nav>
</header>
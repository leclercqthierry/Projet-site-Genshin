<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Common gallery style-->
    <link rel="stylesheet" href="assets/css/gallery-common-style.css">
    <!--Weapons gallery style-->
    <link rel="stylesheet" href="assets/css/weapons-gallery.css">
    <title>Gallerie d'armes</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Gallerie d'armes</h1>
        <!--Filter/Sort Elements-->
        <div class="filters-container">
            <div class="weapons-rarity-container">
                <fieldset class="rarity-container">
                    <legend>Rareté</legend>
                    <div class="rarity">
                        <div>
                            <label for="rarity3">3<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="checkbox" name="rarity3" id="rarity3" value="3" checked>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="checkbox" name="rarity4" id="rarity4" value="4" checked>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="checkbox" name="rarity5" id="rarity5" value="5" checked>
                    </div>
                </fieldset>
                <fieldset class="weapons">
                    <legend>Armes</legend>
                    <div class="weapon-container">
                        <label for="sword">
                            <img src="assets/img/icons/Sword.png" alt="épée à une main">
                        </label>
                        <input type="radio" name="weapon" id="sword">
                    </div>
                    <div class="weapon-container">
                        <label for="claymore">
                            <img src="assets/img/icons/Claymore.png" alt="épée à deux mains">
                        </label>
                        <input type="radio" name="weapon" id="claymore">
                    </div>
                    <div class="weapon-container">
                        <label for="bow">
                            <img src="assets/img/icons/Bow.png" alt="arc">
                        </label>
                        <input type="radio" name="weapon" id="bow">
                    </div>
                    <div class="weapon-container">
                        <label for="polearm">
                            <img src="assets/img/icons/Polearm.png" alt="arme d'hast">
                        </label>
                        <input type="radio" name="weapon" id="polearm">
                    </div>
                    <div class="weapon-container">
                        <label for="catalyst">
                            <img src="assets/img/icons/Catalyst.png" alt="catalyseur">
                        </label>
                        <input type="radio" name="weapon" id="catalyst">
                    </div>
                    <div class="weapon-container">
                        <label for="all-weapons">Toutes</label>
                        <input type="radio" name="weapon" id="all-weapons" checked>
                    </div>
                </fieldset>
            </div>
            <select name="sort" id="sort">
                <option value="alphabetic-order">Ordre alphabétique</option>
                <option value="rarity">Rareté</option>
                <option value="type">Type</option>
            </select>
        </div>
        <!--Weapons gallery-->
        <div class="gallery">
            <!--Generated in php-->
            <?php
            include "base.php";
            foreach($weapons as $weapon) {
                $item = "
                <a href='weapon.php'>
                    <div class='card' data-rarity=".$weapon['rarity']." data-weapon=".$weapon['type'].">
                        <img src=".$weapon['image']." alt=".$weapon['name']." class='rarity".$weapon['rarity']." weapon'>
                        <strong>".$weapon['name']."</strong>
                    </div>
                </a>";
                echo $item;
            };
            ?>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
    <script src="assets/js/weapons-gallery.js"></script>
</body>
</html>
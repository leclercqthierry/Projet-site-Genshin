<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="preload" as="style" href="assets/css/style.css">
    <link rel="preload" as="style" href="assets/css/gallery-common-style.css">
    <link rel="preload" as="style" href="assets/css/characters-gallery.css"> -->
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Common gallery style-->
    <link rel="stylesheet" href="assets/css/gallery-common-style.css">
    <!--characters gallery style-->
    <link rel="stylesheet" href="assets/css/characters-gallery.css">
    <title>Gallerie de personnages</title>
</head>
<body>
    <?php include "header.php";?>
    <main>
        <h1>Gallerie de personnages</h1>
        <!--Filter/Sort Elements-->
        <div class="filters-container">
            <div class="weapons-rarity-container">
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
                <fieldset class="rarity-container">
                    <legend>Rareté</legend>
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
            </div>
            <fieldset class="elements">
                <legend>Eléments</legend>
                <div class="element">
                    <label for="anemo">
                        <img src="assets/img/icons/Anemo.png" alt="anemo">
                    </label>
                    <input type="radio" name="element" id="anemo">
                </div>
                <div class="element">
                    <label for="geo">
                        <img src="assets/img/icons/Geo.png" alt="geo">
                    </label>
                    <input type="radio" name="element" id="geo">
                </div>
                <div class="element">
                    <label for="electro">
                        <img src="assets/img/icons/Electro.png" alt="electro">
                    </label>
                    <input type="radio" name="element" id="electro">
                </div>
                <div class="element">
                    <label for="dendro">
                        <img src="assets/img/icons/Dendro.png" alt="dendro">
                    </label>
                    <input type="radio" name="element" id="dendro">
                </div>
                <div class="element">
                    <label for="hydro">
                        <img src="assets/img/icons/Hydro.png" alt="hydro">
                    </label>
                    <input type="radio" name="element" id="hydro">
                </div>
                <div class="element">
                    <label for="pyro">
                        <img src="assets/img/icons/Pyro.png" alt="pyro">
                    </label>
                    <input type="radio" name="element" id="pyro">
                </div>
                <div class="element">
                    <label for="cryo">
                        <img src="assets/img/icons/Cryo.png" alt="cryo">
                    </label>
                    <input type="radio" name="element" id="cryo">
                </div>
                <div class="element">
                    <label for="all-elements">Tous</label>
                    <input type="radio" name="element" id="all-elements" checked>
                </div>
            </fieldset>
            <select name="sort" id="sort">
                <option value="alphabetic-order">Ordre alphabétique</option>
                <option value="rarity">Rareté</option>
                <option value="element">Elément</option>
            </select>
        </div>
        <!--Characters gallery-->
        <div class="gallery">
            <!--Generate the gallery-->
            <?php
            include "base.php";
            foreach ($characters as $character){
                foreach ($elements as $element){
                    if ($element['name'] === $character['element']){
                        $character_element_image = $element['element_image'];
                    }
                }
                $HTML='';
                $item ="
                <a href='character.php'>
                    <div class='card' data-rarity=$character[rarity] data-weapon=$character[weapon] data-element=$character[element]>
                        <div class='img-container'>
                            <img src=$character[image] alt=$character[name] class='rarity$character[rarity] character' width='100'>
                            <img src=$character_element_image class='img-element'>
                        </div>
                        <strong>$character[name]</strong>
                    </div>
                </a>";
                $HTML .= $item;
                echo $HTML;
            }
            ?>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
    <script src="assets/js/characters-gallery.js"></script>
</body>
</html>
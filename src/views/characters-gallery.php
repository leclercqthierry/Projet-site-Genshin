<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Common gallery style ?>
    <link rel="stylesheet" href="assets/css/gallery-common-style.css">
    <?php // characters gallery style ?>
    <link rel="stylesheet" href="assets/css/characters-gallery.css">
    <meta name="description" content="Galerie présentant les <?= $number ?> personnages actuellement en jeu et pour laquelle une fiche individuelle est proposée. ">
    <meta name="keywords" content="galerie, personnage, personnages">
    <title>Galerie de personnages</title>
</head>
<body>
    <?php include "templates/header.php";?>
    <main>
        <h1>Galerie de personnages</h1>
        <p>Ici est centralisé l'ensemble des personnages disponibles pour créer des équipes/teams. Il y a actuellement un total de <span><?= $number ?></span> personnages dans la galerie, chacun donnant accès à une fiche individuelle décrivant les ressources nécessaires à la montée du personnage ainsi qu'un accès à une page de builds créés par les membres du site. </p>
        <?php // Filter/Sort Elements ?>
        <div class="filters-container">
            <div class="weapons-rarity-container">
                <fieldset class="weapons">
                    <legend>Armes</legend>
                    <?php foreach($weaponTypes as $weaponType): ?>
                        <div class="weapon-container">
                            <label for="<?= $weaponType['type'] ?>">
                                <img src="<?= $weaponType['image'] ?>" alt="<?= $weaponType['name'] ?>">
                            </label>
                            <input type="radio" name="weapon" id="<?= $weaponType['type'] ?>">
                        </div>
                    <?php endforeach;?>
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
                    <?php foreach ($elements as $element): ?>
                    <div class="element">
                        <label for="<?= $element['name'] ?>">
                            <img src="<?= $element['image'] ?>" alt="<?= $element['name'] ?>">
                        </label>
                        <input type="radio" name="element" id="<?= $element['name'] ?>" value="<?= $element['element_id'] ?>">
                    </div>
                    <?php endforeach;?>
                <div class="element">
                    <label for="all-elements">Tous</label>
                    <input type="radio" name="element" id="all-elements" checked>
                </div>
            </fieldset>
            <select name="sort" id="sort" aria-label="Triez par:">
                <option value="alphabetic-order">Ordre alphabétique</option>
                <option value="rarity">Rareté</option>
                <option value="element">Elément</option>
            </select>
        </div>
        <?php // Characters gallery ?>
        <div class="gallery">
            <?php // Generate the gallery
            foreach ($characters as $character):
                foreach ($elements as $element){
                    if ($element['element_id'] === $character['element_id']){
                        $character_element_image = $element['image'];
                        $alt_element = $element['name'];
                    }
                }
            ?>
                <a href='character.php?id=<?= $character['character_id'] ?>'>
                    <div class='card' data-rarity="<?= $character['rarity'] ?>" data-weapon="<?= getWeaponTypeById($character['weapon_type_id'])['type'] ?>" data-element="<?= getElementById($character['element_id'])['name'] ?>">
                        <div class='img-container'>
                            <img src="<?= $character['image'] ?>" alt="Personnage <?= $character['name'] ?>" class='rarity<?=$character['rarity'] ?> character' width="100" height="100">
                            <img src="<?= $character_element_image ?>" class='img-element' alt="<?= $alt_element ?>">
                        </div>
                        <strong><?= $character['name'] ?></strong>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/characters-gallery.js"></script>
</body>
</html>
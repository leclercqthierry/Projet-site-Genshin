<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Common gallery style ?>
    <link rel="stylesheet" href="assets/css/gallery-common-style.css">
    <?php // Weapons gallery style ?>
    <link rel="stylesheet" href="assets/css/weapons-gallery.css">
    <meta name="description" content="Galerie présentant les <?= $number ?> armes actuellement en jeu et pour laquelle une fiche individuelle est proposée pour chacune d'elles.">
    <meta name="keywords" content="galerie, armes">
    <title>Galerie d'armes</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Galerie d'armes</h1>
        <p>Ici est centralisé l'ensemble des armes disponibles pour créer des équipes/teams. Il y a actuellement un total de <span><?= $number ?></span> armes dans la galerie, chacune donnant accès à une fiche individuelle décrivant les ressources nécessaires à la montée de l'arme. </p>
        <?php // Filter/Sort Elements ?>
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
                    <?php foreach($weaponTypes as $weaponType): ?>
                        <div class="weapon-container">
                            <label for="<?= $weaponType['type'] ?>">
                                <img src="<?= $weaponType['image'] ?>" alt="<?= $weaponType['name'] ?>">
                            </label>
                            <input type="radio" name="weapon" id="<?= $weaponType['type'] ?>">
                        </div>
                    <?php endforeach; ?>
                    <div class="weapon-container">
                        <label for="all-weapons">Toutes</label>
                        <input type="radio" name="weapon" id="all-weapons" checked>
                    </div>
                </fieldset>
            </div>
            <select name="sort" id="sort" aria-label="Triez par:">
                <option value="alphabetic-order">Ordre alphabétique</option>
                <option value="rarity">Rareté</option>
                <option value="type">Type</option>
            </select>
        </div>
        <?php // Weapons gallery ?>
        <div class="gallery">
            <?php // Generated in php
            foreach($weapons as $weapon): ?>
                <a href='weapon.php?id=<?= $weapon['weapon_id'] ?>'>
                    <div class='card' data-rarity="<?= $weapon['rarity'] ?>" data-weapon="<?= getWeaponTypeById($weapon['weapon_type_id'])['type'] ?>">
                        <img src="<?= $weapon['image'] ?>" alt="L'arme <?= $weapon['name'] ?>" class='rarity<?= $weapon['rarity'] ?> weapon'>
                        <strong><?= $weapon['name'] ?></strong>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/weapons-gallery.js"></script>
</body>
</html>
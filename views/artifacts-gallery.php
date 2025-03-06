<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Artifact gallery style ?>
    <link rel="stylesheet" href="assets/css/artifacts-gallery.css">
    <title>Gallerie d'artefacts</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Gallerie d'artéfacts</h1>
        <?php // Filter/Sort Elements ?>
        <div class="filters-container">
            <fieldset class="rarity-container">
                <legend>Rareté max</legend>
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
            <select name="sort" id="sort">
                <option value="alphabetic-order">Ordre alphabétique</option>
                <option value="rarity">Rareté</option>
            </select>
        </div>
        <?php // Artefacts gallery ?>
        <div class="gallery">
            <?php // Generated in php
            foreach($artifacts as $artifact): ?>
                <a href='artifact.php?id=<?= $artifact['artifact_id'] ?>'>
                    <div class='card' data-rarity="<?= $artifact['rarity'] ?>">
                        <img src="<?= $artifact['image'] ?>" alt="<?= $artifact['name'] ?>" class='rarity<?= $artifact['rarity'] ?> artifact'>
                        <strong><?= $artifact['name'] ?></strong>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/artifacts-gallery.js"></script>
</body>
</html>
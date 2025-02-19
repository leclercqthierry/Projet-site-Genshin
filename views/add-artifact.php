<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/add-character.css">
    <!-- add-artifacts style-->
     <link rel="stylesheet" href="assets/css/add-artifact.css">
    <title>Panneau Admin - Ajout d'un set d'artéfacts</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Ajout d'un set d'artéfact</h1>
        <div class="container">
            <form action="#" method="post" name="add-artifact-form">
                <div class="form-label">
                    <label for="name">Nom du set</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div id="group2">
                    <span>Rareté max</span>
                    <div class="rarity">
                        <div>
                            <label for="rarity3">3<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity3" value="3">
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity4" value="4">
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity5" value="5">
                    </div>
                </div>
                <div class="form-label">
                    <label for="description">Bonus de set</label>
                    <textarea name="description" id="description" rows="5" required></textarea>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required>
                        </fieldset>
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- add-artifacts style-->
     <link rel="stylesheet" href="assets/css/edit-character.css">
     <link rel="stylesheet" href="assets/css/edit-artifact.css">
    <title>Panneau Admin - Edition d'un set d'artéfacts</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Edition d'un set d'artéfact</h1>
        <div class="container">
            <form action="#" method="post" name="select-artifact-form">
                <div class="form-label">
                    <label for="artifact">Set d'artéfacts à éditer</label>
                    <select name="artifact" id="artifact">
                        <option value=""></option>
                        <!--generated in js-->
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
            <form action="#" method="post" name="edit-artifact-form">
                <div class="form-label">
                    <label for="name">Nom du set</label>
                    <input type="text" id="name" name="name">
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
                    <textarea name="description" id="description" rows="5"></textarea>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                        </fieldset>
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
    <script src="assets/js/base.js"></script>
    <script src="assets/js/edit-artifact.js"></script>
</body>
</html>
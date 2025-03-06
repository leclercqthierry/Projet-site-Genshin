<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php //Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php //add-character style ?>
    <link rel="stylesheet" href="assets/css/add-build.css">
    <title>Panneau Admin - Ajout de build de personnage</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Création d'un build de personnage</h1>
        <div class="container">
        <?php
        // If no form has been submitted yet, the character and artifact set selection form is displayed.
        if(!isset($_POST['form'])): 
        ?>
            <form action="add-build" method="post" name="add-char_art-form">
                <div class="form-label">
                    <label for="character">Choix du personnage</label>
                    <select name="character" id="character">
                    <?php foreach ($characters as $character) : ?>
                        <option value='<?= $character['character_id'] ?>'><?= $character['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-label">
                    <label for="artifact">Choix du set d'artéfacts</label>
                    <select name="artifact" id="artifact">
                    <?php foreach ($artifacts as $artifact) :?>
                        <option value='<?= $artifact['artifact_id']?>'><?= $artifact['name']?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <input type="hidden" name="form" value="add-char_art">
                <input type="submit" class='btn'></input>
            </form>
        <?php else: ?>
            <form action="add-build" method="post" name="add-weapon-form">
                <div class="form-label">
                    <label for="weapon">Choix de l'arme pour <?= $chosenChar['name'] ?></label>
                    <select name="weapon" id="weapon">
                    <?php foreach ($weapons as $weapon) : ?>
                        <option value='<?= $weapon['weapon_id'] ?>'><?= $weapon['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="form" value="add-weapon">
                <input type="submit" class='btn'></input>
            </form>
        <?php endif;?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/validate.js"></script>
    <!-- <script src="assets/js/validate_add-build.js"></script> -->
</body>
</html>
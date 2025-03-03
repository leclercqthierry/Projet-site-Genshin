<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // delete-character style ?>
    <link rel="stylesheet" href="assets/css/delete-form.css">
    <title>Panneau Admin - Suppression de personnage</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Suppression d'un personnage</h1>
        <div class="container">
            <form action="delete-character" method="post" name="delete-character-form">
                <div class="form-label">
                    <label for="character">Personnage à supprimer</label>
                    <select name="character" id="character">
                        <option value=""></option>
    <?php
        foreach ($characters as $character){
            echo '
                        <option value="'.$character['character_id'].'">'.$character['name'].'</option>';
        }
    ?>
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
        <div id="confirm-dialog">
            <div class="container form-label">
                <label>Veuillez confirmer la suppression du personnage</label>
                <div class="btn-container">
                    <button type="submit" class="btn">Confirmer</button>
                    <button id="cancel" type="reset" class="btn">Annuler</button>
                </div>
            </div>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/delete-character.js"></script>
</body>
</html>
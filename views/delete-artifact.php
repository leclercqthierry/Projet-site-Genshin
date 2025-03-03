<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // delete-character style ?>
    <link rel="stylesheet" href="assets/css/delete-form.css">
    <title>Panneau Admin - Suppression d'un set d'artéfacts</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Suppression d'un set d'artéfacts</h1>
        <div class="container">
            <form action="delete-artifact" method="post" name="delete-artifact-form">
                <div class="form-label">
                    <label for="artifact">Set d'artéfacts à supprimer</label>
                    <select name="artifact" id="artifact">
                        <option value=""></option>
    <?php
        foreach ($artifacts as $artifact){
            echo '
                        <option value="'.$artifact['artifact_id'].'">'.$artifact['name'].'</option>';
        }
    ?>
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
        <div id="confirm-dialog">
            <div class="container form-label">
                <label>Veuillez confirmer la suppression du set d'artéfact</label>
                <div class="btn-container">
                    <button type="submit" class="btn">Confirmer</button>
                    <button id="cancel" type="reset" class="btn">Annuler</button>
                </div>
            </div>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/delete-artifact.js"></script>
</body>
</html>
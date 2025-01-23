<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--delete-character style-->
    <link rel="stylesheet" href="assets/css/delete-form.css">
    <title>Suppression de team</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Suppression d'une team</h1>
        <div class="container">
            <form action="#" method="post" name="delete-team-form">
                <div class="form-label">
                    <label for="team">Team à supprimer</label>
                    <select name="team" id="team">
                        <option value=""></option>
                        <!--generated in js-->
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
        <div id="confirm-dialog">
            <div class="container form-label">
                <label>Veuillez confirmer la suppression de la team</label>
                <div class="btn-container">
                    <button type="submit" class="btn">Confirmer</button>
                    <button id="cancel" type="reset" class="btn">Annuler</button>
                </div>
            </div>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
    <script src="assets/js/base.js"></script>
    <script src="assets/js/delete-team.js"></script>
</body>
</html>
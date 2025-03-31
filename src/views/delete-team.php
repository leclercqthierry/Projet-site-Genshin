<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // delete-form style ?>
    <link rel="stylesheet" href="assets/css/delete-form.css">
    <meta name="robots" content="noindex,nofollow">
    <title>Suppression de team</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Suppression d'une team</h1>
        <div class="container">
            <form action="delete-team" method="post" name="delete-team-form">
                <div class="form-label">
                    <label for="team">Team à supprimer</label>
                    <select name="team" id="team">
                    <?php foreach ($teams as $team):?>
                        <option value="<?= $team['team_id']?>"><?= $team['name']?></option>
                    <?php endforeach;?>
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
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/delete-form.js"></script>
</body>
</html>
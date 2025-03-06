<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // delete-character style ?>
    <link rel="stylesheet" href="assets/css/delete-form.css">
    <title>Panneau Admin - Suppression d'arme</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Suppression d'une arme</h1>
        <div class="container">
            <form action="delete-weapon" method="post" name="delete-weapon-form">
                <div class="form-label">
                    <label for="weapon">Arme à supprimer</label>
                    <select name="weapon" id="weapon">
                    <?php foreach ($weapons as $weapon): ?>
                        <option value="<?= $weapon['weapon_id'] ?>"><?= $weapon['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
        <div id="confirm-dialog">
            <div class="container form-label">
                <label>Veuillez confirmer la suppression de l'arme</label>
                <div class="btn-container">
                    <button type="submit" class="btn">Confirmer</button>
                    <button id="cancel" type="reset" class="btn">Annuler</button>
                </div>
            </div>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/delete-weapon.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/admin-menu.css">
    <title>Panneau Admin - Menu</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <h1>Menu Admin</h1>
        <div class="main-container">
            <div class="container">
                <h2>Ajouter</h2>
                <div class="link-container">
                    <a href="add-resources">Ressources</a>
                    <a href="add-character">Personnage</a>
                    <a href="add-weapon">Arme</a>
                    <a href="add-artifact">Artefact</a>
                    <a href="add-team">Team</a>
                </div>
            </div>
            <div class="container">
                <h2>Editer</h2>
                <div class="link-container">
                    <a href="edit-resources">Ressources</a>
                    <a href="edit-character">Personnage</a>
                    <a href="edit-weapon">Arme</a>
                    <a href="edit-artifact">Artefact</a>
                    <a href="edit-team">Team</a>
                </div>
            </div>
            <div class="container">
                <h2>Supprimer</h2>
                <div class="link-container">
                    <a href="delete-resources">Ressources</a>
                    <a href="delete-character">Personnage</a>
                    <a href="delete-weapon">Arme</a>
                    <a href="delete-artifact">Artefact</a>
                    <a href="delete-team">Team</a>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "templates/footer.php"; ?>
</body>
</html>
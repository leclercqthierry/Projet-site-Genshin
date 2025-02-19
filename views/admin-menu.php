<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Common style-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--admin style-->
        <link rel="stylesheet" href="assets/css/admin-menu.css">
    <title>Panneau Admin - Menu</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Menu Admin</h1>
        <div class="main-container">
            <div class="container">
                <h2>Ajouter</h2>
                <div class="link-container">
                    <a href="add-character.php">Personnage</a>
                    <a href="add-weapon.php">Arme</a>
                    <a href="add-artifact.php">Artefact</a>
                    <a href="add-team.php">Team</a>
                </div>
            </div>
            <div class="container">
                <h2>Editer</h2>
                <div class="link-container">
                    <a href="edit-character.php">Personnage</a>
                    <a href="edit-weapon.php">Arme</a>
                    <a href="edit-artifact.php">Artefact</a>
                    <a href="edit-team.php">Team</a>
                </div>
            </div>
            <div class="container">
                <h2>Supprimer</h2>
                <div class="link-container">
                    <a href="delete-character.php">Personnage</a>
                    <a href="delete-weapon.php">Arme</a>
                    <a href="delete-artifact.php">Artefact</a>
                    <a href="delete-team.php">Team</a>
                </div>
            </div>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
</body>
</html>
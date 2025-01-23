<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Common style-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--Index style-->
        <link rel="stylesheet" href="assets/css/member.css">
    <title>Mon profil</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Mes teams</h1>
        <div class="gallery">
            <!--generated in js-->
        </div>
        <div class="btn-container2">
            <a href="add-team.html" class="btn">Créer une nouvelle team</a>
            <button class="btn">Supprimer mon compte</button>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
    <script src="assets/js/base.js"></script>
    <script src="assets/js/member.js"></script>
</body>
</html>
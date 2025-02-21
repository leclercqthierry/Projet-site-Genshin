<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/member.css">
    <title>Mon profil</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <h1>Mes teams</h1>
        <div class="gallery">
            <?php // generated in php ?>
        </div>
        <div class="btn-container2">
            <a href="add-team.php" class="btn">Créer une nouvelle team</a>
            <button class="btn">Supprimer mon compte</button>
        </div>
    </main>
    <?php include_once "templates/footer.php"; ?>
    <script src="assets/js/member.js"></script>
</body>
</html>
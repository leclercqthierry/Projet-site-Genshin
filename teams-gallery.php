<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- teams gallery style-->
    <link rel="stylesheet" href="assets/css/teams-gallery.css">
    <title>Gallerie de teams</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>
        <h1>Gallerie de teams</h1>
        <div class="search">
            <input type="search" placeholder="Par personnage">
            <img src="assets/img/icons/chercher.png" class="search-icon" alt="chercher">
        </div>
        <div class="gallery">
            <!--Generated in javascript-->
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="assets/js/connexion.js"></script>
    <script src="assets/js/base.js"></script>
    <script src="assets/js/teams-gallery.js"></script>
</body>
</html>
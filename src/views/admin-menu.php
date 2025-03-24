<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/admin-menu.css">
    <meta name="robots" content="noindex,nofollow">
    <title>Panneau Admin - Menu</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <h1>Menu Admin</h1>
        <div class="main-container">
            <?= subMenu('Ajouter','add')?>
            <?= subMenu('Editer','edit')?>
            <?= subMenu('Supprimer','delete')?>
        </div>
    </main>
    <?php include_once "templates/footer.php"; ?>
    <script src="assets/js/chevron_menu.js"></script>
</body>
</html>
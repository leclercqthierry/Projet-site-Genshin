<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Page Erreur</title>
</head>
<body>
    <?php include_once "templates/header.php"?>
    <main>
        <h1>Erreur</h1>
        <div class="container">
            <p><?= $error?></p>
        </div>
    </main>
    <?php include_once "templates/footer.php"?>
</body>
</html>
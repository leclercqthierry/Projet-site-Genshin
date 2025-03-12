<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // artefact style ?>
    <link rel="stylesheet" href="assets/css/artifact.css">
    <title><?= $name ?></title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Fiche de set d'artefact</h1>
        <div class="container">
            <div>
                <img src='<?= $image ?>' alt='<?= $name ?>' class="rarity<?= $rarity ?>">
                <h2><?= $name ?></h2>
            </div>
            <p><?php echo nl2br($description); ?></p>  
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
</body>
</html>
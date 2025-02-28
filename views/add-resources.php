<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/add-resources.css">
    <title>Ajout de ressources</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <h1>Ajout de ressources</h1>
        <div class="main-container">
            <?= addSimpleResourceForm('Boss drop', 'bd_name', 'bd_image')?>
            <?= addSimpleResourceForm('Matériel local', 'lc_name', 'lc_image')?>
            <?= addSimpleResourceForm('World boss drop', 'wbd_name', 'wbd_image')?>
            <?= addMultiplesResourcesForm('Mob drops', ['md_name1', 'md_name2', 'md_name3'], ['md_image1', 'md_image2', 'md_image3'])?>
            <?= addMultiplesResourcesForm('Donjon drops', ['djd_name1', 'djd_name2', 'djd_name3'], ['djd_image1', 'djd_image2', 'djd_image3'])?>
            <?= addMultiplesResourcesForm('Drop pour élévation d\'arme', ['ewd_name1', 'ewd_name2', 'ewd_name3'], ['ewd_image1', 'ewd_image2', 'ewd_image3'])?>
            <?= addMultiplesResourcesForm('Drop de donjon d\'arme', ['dwd_name1', 'dwd_name2', 'dwd_name3', 'dwd_name4'], ['dwd_image1', 'dwd_image2', 'dwd_image3', 'dwd_image4'])?>
        </div>
    </main>
    <?php include_once "templates/footer.php"; ?>
    <script src="assets/js/chevron_form.js"></script>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_add-resources.js"></script>
</body>
</html>
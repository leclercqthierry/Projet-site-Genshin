<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/edit-resources.css">
    <meta name="robots" content="noindex,nofollow">
    <title>Edition de ressources</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <h1>Edition de ressources</h1>
        <div class="container">
            <?php if(!isset($_POST['resource-type']) && !isset($_POST['resource']) && !isset($_POST['type'])): ?>
            <form action="edit-resources" method="post" name="select-resources-type-form" enctype="multipart/form-data">
                <div class="form-label">
                    <label for="resource-type">Type de Ressources à éditer</label>
                    <select name="resource-type" id="resource-type">
                    <?php for($i = 0; $i < count($resourceTypes); $i++): ?>
                        <option value="<?= $i ?>"><?= $resourceTypes[$i] ?></option>
                    <?php endfor; ?>
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
            <?php endif;
            if(isset($_POST['resource-type']) && !isset($_POST['resource']) && !isset($_POST['type'])): ?>
            <form action="edit-resources" method="post" name="select-resources-form" enctype="multipart/form-data">
                <div class="form-label">
                    <label for="resource">Choix de la Ressource à éditer</label>
                    <select name="resource" id="resource">
                    <?php for($i = 0; $i < count($resources); $i++): ?>
                        <option value="<?= $resources[$i][$resource_id] ?>"><?= $resources[$i][$type] ?></option>
                    <?php endfor; ?>
                    </select>
                    <input type="hidden" name="type" value="<?= $res_key ?>">
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
            <?php endif;
            if (isset($_POST['resource']) && isset($_POST['type'])): ?>
                <?= $form ?>
            <?php endif; ?>
    </main>
    <?php include_once "templates/footer.php"; ?>
    <script src="assets/js/preview-img.js"></script>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_edit-resources.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // Specific style ?>
    <link rel="stylesheet" href="assets/css/delete-resources.css">
    <title>Suppression de ressources</title>
</head>
<body>
    <?php include_once "templates/header.php"; ?>
    <main>
        <h1>Suppression de ressources</h1>
            <div class="container">
            <?php if(!isset($_POST['resource-type']) && !isset($_POST['resource']) && !isset($_POST['type'])): ?>
                <form action="delete-resources" method="post" name="select-resource-type-form" enctype="multipart/form-data">
                    <div class="form-label">
                        <label for="resource-type">Type de la ressources à supprimer</label>
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
                <form action="delete-resources" method="post" name="select-resource-form" enctype="multipart/form-data">
                    <div class="form-label">
                        <label for="resource">Choix de la Ressource à supprimer</label>
                        <select name="resource" id="resource">
                        <?php for($i = 0; $i < count($resources); $i++): ?>
                            <option value="<?= $resources[$i][$resource_id] ?>"><?= $resources[$i][$type] ?></option>
                        <?php endfor;?>
                        </select>
                        <input type="hidden" name="type" value="<?= $res_key ?>">
                    </div>
                    <input type="submit" value="Valider" class="btn">
                </form>
            <?php endif;?>
            </div>
    </main>
    <?php include_once "templates/footer.php"; ?>
</body>
</html>
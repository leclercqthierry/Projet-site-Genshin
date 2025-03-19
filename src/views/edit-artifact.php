<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // add-artifacts style ?>
     <link rel="stylesheet" href="assets/css/edit-character.css">
     <link rel="stylesheet" href="assets/css/edit-artifact.css">
    <title>Panneau Admin - Edition d'un set d'artéfacts</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Edition d'un set d'artéfact</h1>
        <?php if (!isset($artifact)): ?>
        <div class="container" id="first-form">
            <form action="edit-artifact" method="post" name="select-artifact-form">
                <div class="form-label">
                    <label for="artifact">Set d'artéfacts à éditer</label>
                    <select name="artifact" id="artifact">
                    <?php foreach ($artifacts as $artifact): ?>
                        <option value="<?= $artifact['artifact_id'] ?>"><?= $artifact['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
        <?php else:?>
        <div class="container">
            <form action="edit-artifact" method="post" name="edit-artifact-form" enctype="multipart/form-data" >
                <div class="form-label">
                    <label for="name">Nom du set</label>
                    <input type="text" id="name" name="name" value="<?= $artifact['name'] ?>">
                    <input type="hidden" name="id" value="<?= $artifact['artifact_id']?>">
                </div>
                <div id="group2">
                    <span>Rareté max</span>
                    <div class="rarity">
                        <div>
                            <label for="rarity3">3<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php $chk = $artifact['rarity'] === 3 ? 'checked' : '';?>
                        <input type="radio" name="rarity" id="rarity3" value="3" <?= $chk ?>>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php $chk = $artifact['rarity'] === 4 ? 'checked' : '';?>
                        <input type="radio" name="rarity" id="rarity4" value="4" <?= $chk ?>>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php $chk = $artifact['rarity'] === 5 ? 'checked' : '';?>
                        <input type="radio" name="rarity" id="rarity5" value="5" <?= $chk ?>>
                    </div>
                </div>
                <div class="form-label">
                    <label for="description">Bonus de set</label>
                    <textarea name="description" id="description" rows="5"><?= $artifact['description'];?>
                    </textarea>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                            <img src="<?= $artifact['image']?>" alt="<?= $artifact['name']?>">
                        </fieldset>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" value="Valider" class="btn">
                </div>
            </form>
        </div>
        <?php endif; ?>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/preview-img.js"></script>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_edit-artifact.js"></script>
</body>
</html>
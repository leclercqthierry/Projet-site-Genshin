<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php //Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php //add-character style ?>
    <link rel="stylesheet" href="assets/css/edit-build.css">
    <title>Panneau Admin - Edition d'un build de personnage</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Edition d'un build de personnage</h1>
        <div class="container">
        <?php
        // If no form has been submitted, we choose the character whose build we want to edit
        if(!isset($_POST['form'])): 
        ?>
            <form action="edit-build" method="post" name="edit-build-char-form">
                <div class="form-label">
                    <label for="character">Choix du personnage dont on veut éditer le build</label>
                    <select name="character" id="character">
                    <?php foreach ($characters as $character) : ?>
                        <option value='<?= $character['character_id'] ?>'><?= $character['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="form" value="edit-build-char">
                <input type="submit" class='btn'></input>
            </form>

        <?php else: 
        // We offer all the weapon/artifact pairs corresponding to the character in the list of builds 
            if($_POST['form'] === 'edit-build-char' && count($builds) > 0): ?>
            <form action="edit-build" method="post">
                <p> Choisissez le complément du build à éditer </p>
                <ul>
                <?php for($i = 0; $i < count($weapons); $i++): ?>
                    <li>
                        <input type="radio" name="build" id="wa<?= $i ?>" value="<?= $weapons[$i]['weapon_id'] ?>_<?= $artifacts[$i]['artifact_id'] ?>">
                        <label for="wa<?= $i ?>">
                            <div class="card">
                                <img src="<?= $weapons[$i]['image'] ?>" alt="<?= $weapons[$i]['name'] ?>" class='rarity<?= $weapons[$i]['rarity'] ?> weapon'>
                                <p><?= $weapons[$i]['name'] ?></p>
                            </div>
                            <div class="card">
                                <img src="<?= $artifacts[$i]['image'] ?>" alt="<?= $artifacts[$i]['name'] ?>" class='rarity<?= $artifacts[$i]['rarity'] ?> weapon'>
                                <p><?= $artifacts[$i]['name'] ?></p>
                            </div>
                        </label>
                    </li>
                <?php endfor; ?>
                </ul>
                <input type="hidden" name="form" value="choose-weapon/artifact">
                <input type="submit" class="btn" value="Valider">
            </form>
            <?php endif;?>
            <?php if($_POST['form'] === 'edit-build-char' && count($builds) === 0):?>
                <p>Aucun build disponible pour ce personnage.</p>
            <?php endif;?>
            <?php if($_POST['form'] === 'choose-weapon/artifact'): ?>
            <form action="edit-build" method="post">
                <p> Faites les changements nécessaires: </p>
                <div class="form-label">
                    <label for="weapon">Arme</label>
                    <select name="weapon" id="weapon">
                <?php foreach($allowedWeapons as $weapon): 
                    $selected = $weapon['weapon_id'] === $weaponId ? ' selected="selected"' : ''; ?>
                        <option value="<?= $weapon['weapon_id'] ?>" <?= $selected ?>><?= $weapon['name'] ?></option>
                <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-label">
                    <label for="artifact">Set d'artéfacts</label>
                    <select name="artifact" id="artifact">
                <?php foreach($artifacts as $artifact): 
                    $selected = $artifact['artifact_id'] === $artifactId ? ' selected="selected"' : ''; ?>
                        <option value="<?= $artifact['artifact_id'] ?>" <?= $selected ?>><?= $artifact['name'] ?></option>
                <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="form" value="weapon/artifact-chosen">
                <input type="submit" class="btn" value="Valider">
            </form>
            <?php endif; ?>
        <?php endif; ?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/validate.js"></script>
</body>
</html>
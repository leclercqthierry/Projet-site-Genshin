<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php //Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php //add-character style ?>
    <link rel="stylesheet" href="assets/css/delete-build.css">
    <title>Panneau Admin - Suppression d'un build de personnage</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Suppression d'un build de personnage</h1>
        <?php
        // If no form has been submitted, we choose the character whose build we want to delete
        if(!isset($_POST['form'])): 
        ?>
        <div class="container">
            <form action="delete-build" method="post" name="delete-build-char-form">
                <div class="form-label">
                    <label for="character">Choix du personnage dont on veut supprimer le build</label>
                    <select name="character" id="character">
                    <?php foreach ($characters as $character) : ?>
                        <option value='<?= $character['character_id'] ?>'><?= $character['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="form" value="delete-build-char">
                <input type="submit" class='btn'></input>
            </form>
        </div>
        <?php else: 
        // We offer all the weapon/artifact pairs corresponding to the character in the list of builds 
            if($_POST['form'] === 'delete-build-char' && count($builds) > 0): ?>
        <div class="container">
            <form action="delete-build" method="post" name="delete-build-form">
                <p> Choisissez le complément du build à supprimer: </p>
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
        </div>
        <div id="confirm-dialog">
            <div class="container form-label">
                <label>Veuillez confirmer la suppression:</label>
                <div class="btn-container">
                    <button type="submit" class="btn">Confirmer</button>
                    <button id="cancel" type="reset" class="btn">Annuler</button>
                </div>
            </div>
        </div>
            <?php endif;?>
            <?php if($_POST['form'] === 'delete-build-char' && count($builds) === 0): ?>
        <div class="container">
            <p>Aucun build disponible pour ce personnage.</p>
        </div>
            <?php endif;?>
        <?php endif; ?>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/delete-build.js"></script>
</body>
</html>
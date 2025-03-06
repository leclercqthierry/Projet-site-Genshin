<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // add-team style ?>
    <link rel="stylesheet" href="assets/css/add-team.css">
    <title>Panneau Admin - Ajout d'une team</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Création d'une team</h1>
        <div class="container">
        <?php
        // If no form has been submitted yet, the team name selection form is displayed.
        if(!isset($_POST['form-name'])): 
        ?>
            <form action="add-team" method="post" name="add-team-name-form">
                <div class="form-label">
                    <label for="team-name">Nom de la team</label>
                    <input type="text" id="team-name" name="team-name">
                    <input type="hidden" name="form-name" value="add-team-name">
                </div>
                <input type="submit" class='btn'></input>
            </form>
        <?php else:

            // If none of the character, weapon or artifact addition forms have been submitted
            if($_POST['form-name'] !== 'add-chars' && $_POST['form-name'] !== 'add-weapons' && $_POST['form-name'] !== 'add-artifacts'):?>
            <form action="add-team" method="post" name="add-characters-form">
                <h2>Choix des personnages</h2>
                <p>Attention les 4 personnages doivent être différents !!!</p>
                <?php for($i = 1; $i <= 4; $i++):?>
                <fieldset id="field"<?= $i ?>>
                    <legend>Personnage <?= $i ?></legend>
                    <div class="form-label">
                        <label for="char<?= $i ?>">Choix du personnage</label>
                        <select name="char<?= $i ?>" id="char<?= $i ?>">
                    <?php foreach($characters as $character):?>
                            <option value="<?= $character['character_id'] ?>"><?= $character['name'] ?></option>
                    <?php endforeach;?>
                   </select>
                    </div>
                </fieldset>
                <?php endfor;?>
                <input type="hidden" name="form-name" value="add-chars">
                <input type="submit" class="btn"></input>
            </form>
            <?php endif;

            // If the characters addition form has been submitted
            if($_POST['form-name'] === 'add-chars') :?>
            <form action="add-team" method="post" name="add-weapons-form">
                <h2>Choix des armes</h2>
                <p>Cette fois les armes identiques sont autorisées !!!</p>
                <?php 
                for($i = 0; $i < 4; $i++):
                    $j = $i + 1;
                ?>
                <fieldset id="field"<?= $j ?>>
                    <legend>Arme <?= $j ?></legend>
                    <div class="form-label">
                        <label for="weapon<?= $j ?>">Choix de l'arme pour <?= $charNames[$i] ?></label>
                        <input type="hidden" name="char-name<?= $j ?>" value="<?= $charNames[$i] ?>">
                        <select name="weapon<?= $j ?>" id="weapon<?= $j ?>">
                        <?php foreach($allowedWeaponsByChar[$i] as $weapon):?>
                            <option value="<?= $weapon['weapon_id'] ?>"><?= $weapon['name'] ?></option>
                        <?php endforeach;?>
                   </select>
                    </div>
                </fieldset>
                <?php endfor;?>
                <input type="hidden" name="form-name" value="add-weapons">
                <input type="submit" class="btn"></input>
            </form>
            <?php endif;

            // If the weapons addition form has been submitted
            if($_POST['form-name'] === 'add-weapons') :?>
            <form action="add-team" method="post" name="add-artifacts-form">
                <h2>Choix des artéfacts</h2>
                <p>Cette fois encore les sets identiques sont autorisés (mais c'est moins intéressant)!</p>
                <?php 
                for($i = 0; $i < 4; $i++):
                    $j = $i + 1;
                ?>
                <fieldset id="field"<?= $j ?>>
                    <legend>Arme <?= $j ?></legend>
                    <div class="form-label">
                        <label for="artifact<?= $j ?>">Choix du set pour <?= $charNames[$i] ?></label>
                        <select name="artifact<?= $j ?>" id="artifact<?= $j ?>">
                        <?php foreach($artifacts as $artifact):?>
                            <option value="<?= $artifact['artifact_id'] ?>"><?= $artifact['name'] ?></option>
                        <?php endforeach;?>
                   </select>
                    </div>
                </fieldset>
                <?php endfor;?>
                <input type="hidden" name="form-name" value="add-artifacts">
                <input type="submit" class="btn"></input>
            </form>
            <?php endif;?>
        <?php endif;?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <!-- <script src="assets/js/add-team.js"></script> -->
</body>
</html>
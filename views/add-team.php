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

        <p>Attention ! Vous ne pouvez créer de teams qu'à partir de builds existant, s'ils n'existent pas il faudra les créer avant la team ! </p> 
        <?php
        // If no form has been submitted yet, the team name selection form is displayed.
        if(!isset($_POST['form-name'])): 
        ?>
        <div class="container" id="first-form">
            <form action="add-team" method="post" name="add-team-name-form">
                <div class="form-label">
                    <label for="team-name">Nom de la team</label>
                    <input type="text" id="team-name" name="team-name">
                    <input type="hidden" name="form-name" value="add-team-name">
                </div>
                <input type="submit" class='btn'></input>
            </form>
        </div>
        <?php else:

            // If none of the character, weapon or artifact addition forms have been submitted
            if($_POST['form-name'] !== 'add-chars' && $_POST['form-name'] !== 'add-weapons' && $_POST['form-name'] !== 'add-artifacts'):?>
        <div class="container" id="second-form">
            <form action="add-team" method="post" name="add-characters-form">
                <h2>Choix des personnages</h2>
                <p>Attention les 4 personnages doivent être différents !!!</p>
                <div class="fieldset-container">
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
                </div>
                <input type="hidden" name="form-name" value="add-chars">
                <input type="submit" class="btn"></input>
            </form>
        </div>
            <?php endif;

            // If the characters addition form has been submitted
            if($_POST['form-name'] === 'add-chars') :?>
        <div class="container">
            <form action="add-team" method="post" name="add-equipment-form">
                <h2>Choix de leur équipement: </h2>
                <?php for($j = 0; $j < 4; $j++): ?>
                <div class="build-container">
                    <p>Build(s) de <?= getCharacterById($ids[$j])['name'] ?> :</p>
                    <ul>
                        <?php for($i = 0; $i < count($weaponsTeam[$j]); $i++): ?>
                        <li>
                            <input type="radio" name="build<?= $j ?>" id="wa-<?= $j ?>-<?= $i ?>" value="<?= $weaponsTeam[$j][$i]['weapon_id'] ?>_<?= $artifactsTeam[$j][$i]['artifact_id'] ?>">
                            <label for="wa-<?= $j ?>-<?= $i ?>">
                                <div class="card">
                                    <img src="<?= $weaponsTeam[$j][$i]['image'] ?>" alt="<?= $weaponsTeam[$j][$i]['name'] ?>" class='rarity<?= $weaponsTeam[$j][$i]['rarity'] ?> weapon'>
                                    <p><?= $weaponsTeam[$j][$i]['name'] ?></p>
                                </div>
                                <div class="card">
                                    <img src="<?= $artifactsTeam[$j][$i]['image'] ?>" alt="<?= $artifactsTeam[$j][$i]['name'] ?>" class='rarity<?= $artifactsTeam[$j][$i]['rarity'] ?> weapon'>
                                    <p><?= $artifactsTeam[$j][$i]['name'] ?></p>
                                </div>
                            </label>
                        </li>
                        <?php endfor; ?>
                    </ul>
                    <hr>
                </div>
                <?php endfor;?>
                <input type="hidden" name="form-name" value="add-build">
                <input type="submit" class="btn"></input>
            </form>
        </div>
            <?php endif; ?>
        <?php endif;?>
    </main>
    <?php include "templates/footer.php"; ?>
    <!-- <script src="assets/js/add-team.js"></script> -->
</body>
</html>
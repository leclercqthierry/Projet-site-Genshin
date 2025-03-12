<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // add-team common style ?>
    <link rel="stylesheet" href="assets/css/add-team.css">
    <link rel="stylesheet" href="assets/css/edit-team.css">
    <title>Panneau Admin - Edition d'une team</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Edition d'une team</h1>
        <?php if (count($_POST) === 0 || isset($_POST['edit-team'])): ?>
        <div class="container">
            <form action="edit-team" method="post" name="select-team-form">
                <div class="form-label">
                    <label for="team">Team à éditer</label>
                    <select name="team" id="team">
                    <?php foreach ($teams as $team): ?>
                        <option value="<?= $team['team_id']?>"><?= $team['name']?></option>
                    <?php endforeach;?>
                    </select>
                </div>
                <input type="hidden" name="form-name" value="select-team-form">
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
        <?php else: 
            if(isset($_POST['form-name']) && $_POST['form-name'] === 'select-team-form'): ?>
        <div class="container">
            <form action="edit-team" method="post" name="edit-team-name-form">
                <div class="form-label">
                    <label for="team-name">Nouveau nom de la team</label>
                    <input type="text" id="team-name" name="team-name" value="<?= $teamName ?>">
                    <input type="hidden" name="form-name" value="edit-team-name">
                </div>
                <input type="submit" class='btn' value="Valider">
            </form>
        </div>
            <?php endif;
            if(isset($_POST['form-name']) && $_POST['form-name'] === 'edit-team-name'): ?>
        <div class="container" id="second-form">
            <form action="edit-team" method="post" name="edit-characters-form">
                <h2>Choix des personnages</h2>
                <p>Attention les 4 personnages doivent être différents !!!</p>
                <div class="fieldset-container">
                <?php for($i = 1; $i <= 4; $i++):?>
                    <fieldset id="field"<?= $i ?>>
                        <legend>Personnage <?= $i ?></legend>
                        <div class="form-label">
                            <label for="char<?= $i ?>">Choix du personnage</label>
                            <select name="char<?= $i ?>" id="char<?= $i ?>">
                            <?php $j = $i - 1;
                            foreach($characters as $character):
                                $selected = $character['character_id'] === $teamBuilds[$j]['character_id'] ? ' selected="selected"' : ''; ?>
                                <option value="<?= $character['character_id'] ?>" <?= $selected ?>><?= $character['name'] ?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </fieldset>
                <?php endfor;?>
                </div>
                <input type="hidden" name="form-name" value="edit-chars">
                <input type="submit" class="btn"></input>
            </form>
        </div>
            <?php endif;
            if($_POST['form-name'] === 'edit-chars') :?>
        <div class="container">
            <form action="edit-team" method="post" name="edit-equipment-form">
                <h2>Choix de leur équipement: </h2>
                <?php for($j = 0; $j < 4; $j++): ?>
                <div class="build-container">
                    <p>Build(s) de <?= getCharacterById($ids[$j])['name'] ?> :</p>
                    <ul>
                        <?php for($i = 0; $i < count($weaponsTeam[$j]); $i++): ?>
                        <li>
                            <input type="radio" name="build<?= $j ?>" id="wa-<?= $j ?>-<?= $i ?>" value="<?= $weaponsTeam[$j][$i]['weapon_id'] ?>_<?= $artifactsTeam[$j][$i]['artifact_id'] ?>" <?= $checkedTeam[$j][$i] ?>>
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
                <input type="hidden" name="form-name" value="edit-build">
                <input type="submit" class="btn"></input>
            </form>
        </div>
            <?php endif; ?>
        <?php endif; ?>
    </main>
    <?php include "templates/footer.php" ?>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_edit-team.js"></script>
</body>
</html>
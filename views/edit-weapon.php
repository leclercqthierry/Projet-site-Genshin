<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // add-character style (same style) ?>
    <link rel="stylesheet" href="assets/css/edit-character.css">
    <?php // add-weapon style ?>
    <link rel="stylesheet" href="assets/css/edit-weapon.css">
    <title>Panneau Admin - Edition d'une arme</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Edition d'une arme</h1>
        <div class="container">
    <?php 
    if(!isset($weapon)): 
    ?>
            <form action="edit-weapon" method="post" name="select-weapon-form">
                <div class="form-label">
                    <label for="weapon">Arme à éditer</label>
                    <select name="weapon" id="weapon">
    <?php
        foreach($weapons as $weapon){
            echo '
                        <option value="'.$weapon['weapon_id'].'">'.$weapon['name'].'</option>';
        }
    ?>
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
    <?php else:?>
            <form action="edit-weapon" method="post" name="edit-weapon-form" enctype="multipart/form-data">
            <div id="group1">
                    <div class="form-label">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" value="<?= $weapon['name']?>">
                        <input type="hidden" name="id" value="<?= $weapon['weapon_id']?>">
                    </div>
                    <div class="form-label">
                        <label for="type">Type</label>
                        <select name="type" id="type">
                        <?php
                        foreach($weaponTypes as $weaponType){
                            $selected = $weaponType['weapon_type_id'] === $weapon['weapon_type_id'] ? ' selected="selected"' : '';
                            echo '<option value="'. $weaponType['weapon_type_id']. '"' .$selected.'>'. $weaponType['name']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div id="group2">
                    <span>Rareté</span>
                    <div class="rarity">
                        <div>
                            <label for="rarity3">3<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php  $chk = $weapon['rarity'] === 3 ? 'checked' : ''; ?>
                        <input type="radio" name="rarity" id="rarity3" value="3" <?= $chk ?>>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php  $chk = $weapon['rarity'] === 4 ? 'checked' : ''; ?>
                        <input type="radio" name="rarity" id="rarity4" value="4" <?= $chk ?>>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php  $chk = $weapon['rarity'] === 5 ? 'checked' : ''; ?>
                        <input type="radio" name="rarity" id="rarity5" value="5" <?= $chk ?>>
                    </div>
                    <div class="form-label">
                        <label for="bonus">Sous-stat</label>
                        <select name="bonus" id="bonus">
                        <?php
                        foreach($subStats as $subStat){
                            $selected = $subStat['stat_id'] === $weapon['stat_id'] ? ' selected="selected"' : '';
                            echo '<option value="'.$subStat['stat_id'].'"'.$selected.'>'.$subStat['nameFr']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="obtaining">Obtention</label>
                        <select name="obtaining" id="obtaining">
                        <?php
                        foreach($obtainings as $obtaining){
                            $selected = $obtaining['obtaining_id'] === $weapon['obtaining'] ? ' selected="selected"' : '';
                            echo '<option value="'.$obtaining['obtaining_id'].'"'.$selected.'>'.$obtaining['name']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div id="group3">
                    <div class="form-label">
                        <label for="farm-days">Jours de farm élévation</label>
                        <select name="farm-days" id="farm-days">
                        <?php
                        foreach($days as $day){
                            $selected = $day['farm_day_id'] === $weapon['farm_day_id'] ? ' selected="selected"' : '';
                            echo '<option value="'.$day['farm_day_id'].'"'.$selected.'>'.$day['daysFr']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5"><?= $weapon['description'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <img src="<?= $weapon['image']?>" alt="<?= $weapon['name']?>">
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Card</legend>
                            <img src="<?= $weapon['card']?>" alt="<?= $weapon['name']?>">
                            <input type="file" name="card" id="card" accept="image/*">
                        </fieldset>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <label for="mob-drop-category">Mob drop catégorie</label>
                        <select name="mob-drop-category" id="mob-drop-category">
                        <?php
                        foreach($mobMats as $mobMat){
                            $selected = $mobMat['mob_drop_id'] === $weapon['mob_drop_id'] ? ' selected="selected"' : '';
                            echo '<option value="'.$mobMat['mob_drop_id'].'"'.$selected.'>'.$mobMat['category']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="elevation-drop-category">Elévation drop catégorie</label>
                        <select name="elevation-drop-category" id="elevation-drop-category">
                        <?php
                        foreach($elevationMats as $elevationMat){
                            $selected = $elevationMat['elevation_weapon_drop_id'] === $weapon['elevation_weapon_drop_id'] ? ' selected="selected"' : '';
                            echo '<option value="'.$elevationMat['elevation_weapon_drop_id'].'"'.$selected.'>'.$elevationMat['category']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="dj-drop-category">Donjon drop catégorie</label>
                        <select name="dj-drop-category" id="dj-drop-category">
                        <?php
                        foreach($djElevationMats as $djElevationMat){
                            $selected = $djElevationMat['dungeon_drop_id'] === $weapon['dungeon_drop_id'] ? ' selected="selected"' : '';
                            echo '<option value="'.$djElevationMat['dungeon_drop_id'].'"'.$selected.'>'.$djElevationMat['category']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
    <?php endif;?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_edit-weapon.js"></script>
</body>
</html>
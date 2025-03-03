<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // add-character style (same style) ?>
    <link rel="stylesheet" href="assets/css/add-character.css">
    <?php // add-weapon style ?>
    <link rel="stylesheet" href="assets/css/add-weapon.css">
    <title>Panneau Admin - Ajout d'une arme</title>
</head>
<body>
    <?php include "templates/header.php"; ?>    
    <main>
        <h1>Ajout d'une arme</h1>
        <div class="container">
            <form action="add-weapon" method="post" name="add-weapon-form" enctype="multipart/form-data">
                <div id="group1">
                    <div class="form-label">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-label">
                        <label for="type">Type</label>
                        <select name="type" id="type">
                        <?php
                        foreach($weaponTypes as $weaponType){
                            echo '<option value="'. $weaponType['weapon_type_id']. '">'. $weaponType['name']. '</option>';
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
                        <input type="radio" name="rarity" id="rarity3" value="3">
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity4" value="4">
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity5" value="5">
                    </div>
                    <div class="form-label">
                        <label for="bonus">Sous-stat</label>
                        <select name="bonus" id="bonus">
                        <?php
                        foreach($subStats as $subStat){
                            echo '<option value="'.$subStat['stat_id'].'">'.$subStat['nameFr']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="obtaining">Obtention</label>
                        <select name="obtaining" id="obtaining">
                        <?php
                        foreach($obtainings as $obtaining){
                            echo '<option value="'.$obtaining['obtaining_id'].'">'.$obtaining['name']. '</option>';
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
                            echo '<option value="'.$day['farm_day_id'].'">'.$day['daysFr']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Card</legend>
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
                            echo '<option value="'.$mobMat['mob_drop_id'].'">'.$mobMat['category']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="elevation-drop-category">Elévation drop catégorie</label>
                        <select name="elevation-drop-category" id="elevation-drop-category">
                        <?php
                        foreach($elevationMats as $elevationMat){
                            echo '<option value="'.$elevationMat['elevation_weapon_drop_id'].'">'.$elevationMat['category']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="dj-drop-category">Donjon drop catégorie</label>
                        <select name="dj-drop-category" id="dj-drop-category">
                        <?php
                        foreach($djElevationMats as $djElevationMat){
                            echo '<option value="'.$djElevationMat['dungeon_drop_id'].'">'.$djElevationMat['category']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_add_weapon.js"></script>
</body>
</html>
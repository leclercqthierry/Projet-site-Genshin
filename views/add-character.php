<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--add-character style-->
    <link rel="stylesheet" href="assets/css/add-character.css">
    <title>Panneau Admin - Ajout de personnage</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Ajout de personnage</h1>
        <div class="container">
            <form action="add-character" method="post" name="add-character-form" enctype="multipart/form-data">
                <div id="group1">
                    <div class="form-label">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-label">
                        <label for="element">Elément</label>
                        <select name="element" id="element">
                        <?php
                        foreach($elements as $element){
                            echo '<option value="' . $element['element_id'] . '">' . $element['name'] . '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="weapon">Arme</label>
                        <select name="weapon" id="weapon">
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
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity4" value="4" checked>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <input type="radio" name="rarity" id="rarity5" value="5">
                    </div>
                    <div class="form-label">
                        <label for="bonus">Bonus type</label>
                        <select name="bonus" id="bonus">
                        <?php
                        foreach($stats as $stat){
                            echo '<option value="'.$stat['stat_id'].'">'.$stat['nameFr']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="farm-days">Jours de farm aptitudes</label>
                        <select name="farm-days" id="farm-days">
                        <?php
                        foreach($days as $day){
                            echo '<option value="'.$day['farm_day_id'].'">'.$day['daysFr']. '</option>';
                        }
                        ?>
                        </select>
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
                        <label for="boss-drop">Boss matériel</label>
                        <select name="boss-drop" id="boss-drop">
                        <?php
                        foreach($bossDrops as $bossDrop){
                            echo '<option value="' . $bossDrop['boss_drop_id'] . '">' . $bossDrop['name'] . '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="local-mat">Local matériel</label>
                        <select name="local-mat" id="local-mat">
                        <?php
                        foreach($localMaterials as $localMaterial){
                            echo '<option value="' . $localMaterial['local_material_id'] . '">' . $localMaterial['name'] . '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="wb-drop">World Boss matériel</label>
                        <select name="wb-drop" id="wb-drop">
                        <?php
                        foreach($wbDrops as $wbDrop){
                            echo '<option value="' . $wbDrop['world_boss_drop_id'] . '">' . $wbDrop['name'] . '</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <label for="mob-drop-category">Mob drop catégorie</label>
                        <select name="mob-drop-category" id="mob-drop-category">
                        <?php
                        foreach($MobMaterialCategories as $Category){
                            echo '<option value="'.$Category['mob_drop_id'].'">'.$Category['category']. '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="dj-drop-category">Dj drop catégorie</label>
                        <select name="dj-drop-category" id="dj-drop-category">
                        <?php
                        foreach($djMaterialCategories as $Category){
                            echo '<option value="'.$Category['dungeon_drop_id'].'">'.$Category['category']. '</option>';
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
    <!-- <script src="assets/js/validate_add_char.js"></script> -->
</body>
</html>
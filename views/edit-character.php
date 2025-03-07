<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // add-character style ?>
    <link rel="stylesheet" href="assets/css/edit-character.css">
    <title>Panneau Admin - Edition d'un personnage</title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Edition d'un personnage</h1>
    <?php if(!isset($character)): ?>
        <div class="container" id="first-form">
            <form action="edit-character" method="post" name="select-character-form">
                <div class="form-label">
                    <label for="character">Personnage à éditer</label>
                    <select name="character" id="character">
                    <?php foreach ($characters as $character): ?>
                        <option value="<?= $character['character_id'] ?>"><?= $character['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="Valider" class="btn">
            </form>
        </div>
    <?php else:?>
        <div class="container">
            <form action="edit-character" method="post" name="edit-character-form" enctype="multipart/form-data">
            <div id="group1">
                    <div class="form-label">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" value="<?= $character['name']?>">
                        <input type="hidden" name="id" value="<?= $character['character_id']?>">
                    </div>
                    <div class="form-label">
                        <label for="element">Elément</label>
                        <select name="element" id="element">
                        <?php foreach($elements as $element):
                            $selected = $element['element_id'] === $character['element_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $element['element_id'] ?>" <?= $selected ?>><?= $element['name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="weapon">Arme</label>
                        <select name="weapon" id="weapon">
                        <?php foreach($weaponTypes as $weaponType):
                            $selected = $weaponType['weapon_type_id'] === $character['weapon_type_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $weaponType['weapon_type_id'] ?>" <?= $selected ?>><?= $weaponType['name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div id="group2">
                    <span>Rareté</span>
                    <div class="rarity">
                        <div>
                            <label for="rarity4">4<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php  $chk = $character['rarity'] === 4 ? 'checked' : ''; ?>
                        <input type="radio" name="rarity" id="rarity4" value="4" <?= $chk ?>>
                    </div>
                    <div class="rarity">
                        <div>
                            <label for="rarity5">5<sup><img src="assets/img/icons/1_star.png" alt="étoile"></sup></label>
                        </div>
                        <?php  $chk = $character['rarity'] === 5 ? 'checked' : ''; ?>
                        <input type="radio" name="rarity" id="rarity5" value="5" <?= $chk ?>>
                    </div>
                    <div class="form-label">
                        <label for="bonus">Bonus type</label>
                        <select name="bonus" id="bonus">
                        <?php foreach($stats as $stat):
                            $selected = $stat['stat_id'] === $character['stat_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $stat['stat_id'] ?>" <?= $selected ?>><?= $stat['nameFr'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="farm-days">Jours de farm aptitudes</label>
                        <select name="farm-days" id="farm-days">
                        <?php foreach($days as $day):
                            $selected = $day['farm_day_id'] === $character['farm_day_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $day['farm_day_id'] ?>" <?= $selected ?>><?= $day['daysFr'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-label-groups" id="the-first">
                    <div class="form-label">
                        <fieldset>
                            <legend>Miniature</legend>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                            <img src="<?= $character['image']?>" alt="<?= $character['name']?>">
                        </fieldset>
                    </div>
                    <div class="form-label">
                        <fieldset>
                            <legend>Card</legend>
                            <input type="file" name="card" id="card" accept="image/*">
                            <img src="<?= $character['card']?>" alt="<?= $character['card']?>">
                        </fieldset>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <label for="boss-drop">Boss matériel</label>
                        <select name="boss-drop" id="boss-drop">
                        <?php foreach($bossDrops as $bossDrop):
                            $selected = $bossDrop['boss_drop_id'] === $character['boss_drop_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $bossDrop['boss_drop_id'] ?>" <?= $selected ?>><?= $bossDrop['name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="local-mat">Local matériel</label>
                        <select name="local-mat" id="local-mat">
                        <?php foreach($localMaterials as $localMaterial):
                            $selected = $localMaterial['local_material_id'] === $character['local_material_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $localMaterial['local_material_id'] ?>" <?= $selected ?>><?= $localMaterial['name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="wb-drop">World Boss matériel</label>
                        <select name="wb-drop" id="wb-drop">
                        <?php foreach($wbDrops as $wbDrop):
                            $selected = $wbDrop['world_boss_drop_id'] === $character['world_boss_drop_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $wbDrop['world_boss_drop_id'] ?>" <?= $selected ?>><?= $wbDrop['name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-label-groups">
                    <div class="form-label">
                        <label for="mob-drop-category">Mob drop catégorie</label>
                        <select name="mob-drop-category" id="mob-drop-category">
                        <?php foreach($mobMaterials as $mobMaterial):
                            $selected = $mobMaterial['mob_drop_id'] === $character['mob_drop_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $mobMaterial['mob_drop_id'] ?>" <?= $selected ?>><?= $mobMaterial['category'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-label">
                        <label for="dj-drop-category">Dj drop catégorie</label>
                        <select name="dj-drop-category" id="dj-drop-category">
                        <?php foreach($djMaterials as $djMaterial):
                            $selected = $djMaterial['dungeon_drop_id'] === $character['dungeon_drop_id'] ? ' selected="selected"' : ''; ?>
                            <option value="<?= $djMaterial['dungeon_drop_id'] ?>" <?= $selected ?>><?= $djMaterial['category'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" value="Valider" class="btn">
                </div>
            </form>
    <?php endif; ?>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
    <script src="assets/js/preview-img.js"></script>
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/validate_edit-char.js"></script>
</body>
</html>
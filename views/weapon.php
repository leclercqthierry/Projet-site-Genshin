<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php // Common style ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php // weapon style ?>
    <link rel="stylesheet" href="assets/css/weapon.css">
    <title><?= $name ?></title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Fiche Arme</h1>
        <div class="container">
            <div class="img-description">
                <img src='<?= $card ?>' alt='<?= $name ?>' class="rarity<?= $rarity ?>">
                <div class="description">
                    <p><b>Nom:</b> <span><?= $name ?></span></p>
                    <p><b>Rareté:</b> <span><?= $rarity ?></span></p>
                    <p><b>Type:</b> <span><?= $type ?></span></p>
                    <p><b>Sous-stat:</b> <span><?= $subStat ?></span></p>
                    <p><b>Obtention: </b> <span><?= $obtaining ?></span></p>
                    <p><b>Jours de farm élévation:</b> <span><?= $days ?></span></p>
                </div>
            </div>
            <div class="sub-container p1">
                <p><?= $description ?></p>
            </div>
            <div class="sub-container">
                <h2>Coût d'élévation de l'arme</h2>
                <table>
                    <tr>
                        <th>Seuil</th>
                        <th>Ressource de donjon</th>
                        <th>Ressources de mobs 1</th>
                        <th>Ressources de mobs 2</th>
                        <th><img class="rarity1" src="assets/img/other/mora.webp" alt="moras"></th>
                    </tr>
                    <tr>
                        <td>Niveau 20</td>
                        <td><img src='<?= $dungeonWeapon['image1'] ?>' alt='<?= $dungeonWeapon['name1'] ?>' class="rarity2"><br>X3</td>
                        <td><img src='<?= $elevationWeaponDrop['image1'] ?>' alt='<?= $elevationWeaponDrop['name1'] ?>' class="rarity2"><br>X3</td>
                        <td><img src='<?= $mobDrop['image1'] ?>' alt='<?= $mobDrop['name1'] ?>' class="rarity1"><br>X2</td>
                        <td>5 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 40</td>
                        <td><img src='<?= $dungeonWeapon['image2'] ?>' alt='<?= $dungeonWeapon['name2'] ?>' class="rarity3"><br>X3</td>
                        <td><img src='<?= $elevationWeaponDrop['image1'] ?>' alt='<?= $elevationWeaponDrop['name1'] ?>' class="rarity2"><br>X12</td>
                        <td><img src='<?= $mobDrop['image1'] ?>' alt='<?= $mobDrop['name1'] ?>' class="rarity1"><br>X8</td>
                        <td>15 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 50</td>
                        <td><img src='<?= $dungeonWeapon['image2'] ?>' alt='<?= $dungeonWeapon['name2'] ?>' class="rarity3"><br>X6</td>
                        <td><img src='<?= $elevationWeaponDrop['image2'] ?>' alt='<?= $elevationWeaponDrop['name2'] ?>' class="rarity3"><br>X6</td>
                        <td><img src='<?= $mobDrop['image2'] ?>' alt='<?= $mobDrop['name2'] ?>' class="rarity2"><br>X6</td>
                        <td>20 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 60</td>
                        <td><img src='<?= $dungeonWeapon['image3'] ?>' alt='<?= $dungeonWeapon['name3'] ?>' class="rarity4"><br>X3</td>
                        <td><img src='<?= $elevationWeaponDrop['image2'] ?>' alt='<?= $elevationWeaponDrop['name2'] ?>' class="rarity3"><br>X12</td>
                        <td><img src='<?= $mobDrop['image2'] ?>' alt='<?= $mobDrop['name2'] ?>' class="rarity2"><br>X9</td>
                        <td>30 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 70</td>
                        <td><img src='<?= $dungeonWeapon['image3'] ?>' alt='<?= $dungeonWeapon['name3'] ?>' class="rarity4"><br>X6</td>
                        <td><img src='<?= $elevationWeaponDrop['image3'] ?>' alt='<?= $elevationWeaponDrop['name3'] ?>' class="rarity4"><br>X9</td>
                        <td><img src='<?= $mobDrop['image3'] ?>' alt='<?= $mobDrop['name3'] ?>' class="rarity3"><br>X9</td>
                        <td>35 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 80</td>
                        <td><img src='<?= $dungeonWeapon['image4'] ?>' alt='<?= $dungeonWeapon['name4'] ?>' class="rarity5"><br>X4</td>
                        <td><img src='<?= $elevationWeaponDrop['image3'] ?>' alt='<?= $elevationWeaponDrop['name3'] ?>' class="rarity4"><br>X18</td>
                        <td><img src='<?= $mobDrop['image3'] ?>' alt='<?= $mobDrop['name3'] ?>' class="rarity3"><br>X12</td>
                        <td>45 000</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
    <?php include "templates/footer.php"; ?>
</body>
</html>
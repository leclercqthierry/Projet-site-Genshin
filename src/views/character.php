<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?php // Common style ?>
    <link rel='stylesheet' href='assets/css/style.css'>
    <?php // character style ?>
    <link rel='stylesheet' href='assets/css/character.css'>
    <title><?= $name ?></title>
</head>
<body>
    <?php include "templates/header.php"; ?>
    <main>
        <h1>Fiche Personnage</h1>
        <div class='container'>
            <div class='img-description'>
                <img src="<?= $card ?>" alt="<?= $name ?>" class="rarity<?= $rarity ?>">
                <div class='description'>
                    <p><b>Nom:</b> <span><?= $name ?></span></p>
                    <p><b>Element:</b> <span><?= $element ?></span></p>
                    <p><b>Rareté:</b> <span><?= $rarity ?></span></p>
                    <p><b>Type arme:</b> <span><?= $weapon ?></span></p>
                    <p><b>Bonus Elévation:</b> <span><?= $bonus ?></span></p>
                    <p><b>Jours de farm aptitudes:</b> <span><?= $days ?></span></p>
                </div>
            </div>
            <div class='sub-container'>
                <h2>Coût de montée de niveau</h2>
                <table>
                    <tr>
                        <th>Tranche</th>
                        <th><img class="rarity4" src='assets/img/other/lecons_du_hero.webp' alt='leçon du héros'></th>
                        <th><img class="rarity3" src='assets/img/other/conseils_de_l_aventurier.webp' alt="conseils de l'aventurier"></th>
                        <th><img class="rarity2" src='assets/img/other/astuce_du_voyageur.webp' alt='astuce du voyageur'></th>
                        <th><img class="rarity1" src='assets/img/other/mora.webp' alt='moras'></th>
                    </tr>
                    <tr>
                        <td>1-20</td>
                        <td>6</td>
                        <td></td>
                        <td></td>
                        <td>24 000</td>
                    </tr>
                    <tr>
                        <td>20-40</td>
                        <td>28</td>
                        <td>3</td>
                        <td>3</td>
                        <td>115 600</td>
                    </tr>
                    <tr>
                        <td>40-50</td>
                        <td>28</td>
                        <td>3</td>
                        <td>4</td>
                        <td>115 800</td>
                    </tr>
                    <tr>
                        <td>50-60</td>
                        <td>42</td>
                        <td>2</td>
                        <td>4</td>
                        <td>170 800</td>
                    </tr>
                    <tr>
                        <td>60-70</td>
                        <td>59</td>
                        <td>3</td>
                        <td></td>
                        <td>239 000</td>
                    </tr>
                    <tr>
                        <td>70-80</td>
                        <td>80</td>
                        <td>2</td>
                        <td>1</td>
                        <td>322 200</td>
                    </tr>
                    <tr>
                        <td>80-90</td>
                        <td>171</td>
                        <td></td>
                        <td>3</td>
                        <td>684 600</td>
                    </tr>
                </table>
            </div>
            <div class='sub-container'>
                <h2>Coût d'élévation de personnage</h2>
                <table>
                    <tr>
                        <th>Seuil</th>
                        <th>Joyaux de personnage</th>
                        <th>Matériaux de boss</th>
                        <th>Ressource locale</th>
                        <th>Ressources de mobs</th>
                        <th><img class="rarity1" src='assets/img/other/mora.webp' alt='moras'></th>
                    </tr>
                    <tr>
                        <td>Niveau 20</td>
                        <td><img src="<?= $charJewel['image1'] ?>" alt="<?= $charJewel['name1'] ?>" class='rarity2'><br>X1</td>
                        <td></td>
                        <td><img src=<?= $localMaterial['image'] ?> alt=<?= $localMaterial['name'] ?> class='rarity1'><br>X3</td>
                        <td><img src=<?= $mobDrop['image1'] ?> alt=<?= $mobDrop['name1'] ?> class='rarity1'><br>X3</td>
                        <td>20 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 40</td>
                        <td><img src=<?= $charJewel['image2'] ?> alt=<?= $charJewel['name2'] ?> class='rarity3'><br>X3</td>
                        <td><img src=<?= $bossDrop['image'] ?> alt=<?= $bossDrop['name'] ?> class='rarity4'><br>X2</td>
                        <td><img src=<?= $localMaterial['image'] ?> alt=<?= $localMaterial['name'] ?> class='rarity1'><br>X10</td>
                        <td><img src=<?= $mobDrop['image1'] ?> alt=<?= $mobDrop['name1'] ?> class='rarity1'><br>X15</td>
                        <td>40 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 50</td>
                        <td><img src=<?= $charJewel['image2'] ?> alt=<?= $charJewel['name2'] ?> class='rarity3'><br>X6</td>
                        <td><img src=<?= $bossDrop['image'] ?> alt=<?= $bossDrop['name'] ?> class='rarity4'><br>X4</td>
                        <td><img src=<?= $localMaterial['image'] ?> alt=<?= $localMaterial['name'] ?> class='rarity1'><br>X20</td>
                        <td><img src=<?= $mobDrop['image2'] ?> alt=<?= $mobDrop['name2'] ?> class='rarity2'><br>X12</td>
                        <td>60 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 60</td>
                        <td><img src=<?= $charJewel['image3'] ?> alt=<?= $charJewel['name3'] ?> class='rarity4'><br>X3</td>
                        <td><img src=<?= $bossDrop['image'] ?> alt=<?= $bossDrop['name'] ?> class='rarity4'><br>X8</td>
                        <td><img src=<?= $localMaterial['image'] ?> alt=<?= $localMaterial['name'] ?> class='rarity1'><br>X30</td>
                        <td><img src=<?= $mobDrop['image2'] ?> alt=<?= $mobDrop['name2'] ?> class='rarity2'><br>X18</td>
                        <td>80 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 70</td>
                        <td><img src=<?= $charJewel['image3'] ?> alt=<?= $charJewel['name3'] ?> class='rarity4'><br>X6</td>
                        <td><img src=<?= $bossDrop['image'] ?> alt=<?= $bossDrop['name'] ?> class='rarity4'><br>X12</td>
                        <td><img src=<?= $localMaterial['image'] ?> alt=<?= $localMaterial['name'] ?> class='rarity1'><br>X45</td>
                        <td><img src=<?= $mobDrop['image3'] ?> alt=<?= $mobDrop['name3'] ?> class='rarity3'><br>X12</td>
                        <td>100 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 80</td>
                        <td><img src=<?= $charJewel['image4'] ?> alt=<?= $charJewel['name4'] ?> class='rarity5'><br>X6</td>
                        <td><img src=<?= $bossDrop['image'] ?> alt=<?= $bossDrop['name'] ?> class='rarity4'><br>X20</td>
                        <td><img src=<?= $localMaterial['image'] ?> alt=<?= $localMaterial['name'] ?> class='rarity1'><br>X60</td>
                        <td><img src=<?= $mobDrop['image3'] ?> alt=<?= $mobDrop['name3'] ?> class='rarity3'><br>X18</td>
                        <td>120 000</td>
                    </tr>
                </table>
            </div>
            <div class='sub-container'>
                <h2>Coût d'élévation d'une aptitude</h2>
                <table>
                    <tr>
                        <th>Niveau</th>
                        <th>Ressource de donjon</th>
                        <th>Ressources de mobs</th>
                        <th>Matériaux de boss de monde</th>
                        <th>Ressource d'event</th>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src=<?= $dungeonDrop['image1'] ?> alt=<?= $dungeonDrop['name1'] ?> class='rarity2'><br>X3</td>
                        <td><img src=<?= $mobDrop['image1'] ?> alt=<?= $mobDrop['name1'] ?> class='rarity1'><br>X6</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src=<?= $dungeonDrop['image2'] ?> alt=<?= $dungeonDrop['name2'] ?> class='rarity3'><br>X2</td>
                        <td><img src=<?= $mobDrop['image2'] ?> alt=<?= $mobDrop['name2'] ?> class='rarity2'><br>X3</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><img src=<?= $dungeonDrop['image2'] ?> alt=<?= $dungeonDrop['name2'] ?> class='rarity3'><br>X4</td>
                        <td><img src=<?= $mobDrop['image2'] ?> alt=<?= $mobDrop['name2'] ?> class='rarity2'><br>X4</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><img src=<?= $dungeonDrop['image2'] ?> alt=<?= $dungeonDrop['name2'] ?> class='rarity3'><br>X6</td>
                        <td><img src=<?= $mobDrop['image2'] ?> alt=<?= $mobDrop['name2'] ?> class='rarity2'><br>X6</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><img src=<?= $dungeonDrop['image2'] ?> alt=<?= $dungeonDrop['name2'] ?> class='rarity3'><br>X9</td>
                        <td><img src=<?= $mobDrop['image2'] ?> alt=<?= $mobDrop['name2'] ?> class='rarity2'><br>X9</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><img src=<?= $dungeonDrop['image3'] ?> alt=<?= $dungeonDrop['name3'] ?> class='rarity4'><br>X3</td>
                        <td><img src=<?= $mobDrop['image3'] ?> alt=<?= $mobDrop['name3'] ?> class='rarity3'><br>X4</td>
                        <td><img src=<?=  $worldBossDrop['image'] ?> alt=<?=  $worldBossDrop['name'] ?> class='rarity5'><br>X1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><img src=<?= $dungeonDrop['image3'] ?> alt=<?= $dungeonDrop['name3'] ?> class='rarity4'><br>X4</td>
                        <td><img src=<?= $mobDrop['image3'] ?> alt=<?= $mobDrop['name3'] ?> class='rarity3'><br>X6</td>
                        <td><img src=<?=  $worldBossDrop['image'] ?> alt=<?=  $worldBossDrop['name'] ?> class='rarity5'><br>X1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td><img src=<?= $dungeonDrop['image3'] ?> alt=<?= $dungeonDrop['name3'] ?> class='rarity4'><br>X6</td>
                        <td><img src=<?= $mobDrop['image3'] ?> alt=<?= $mobDrop['name3'] ?> class='rarity3'><br>X9</td>
                        <td><img src=<?=  $worldBossDrop['image'] ?> alt=<?=  $worldBossDrop['name'] ?> class='rarity5'><br>X2</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><img src=<?= $dungeonDrop['image3'] ?> alt=<?= $dungeonDrop['name3'] ?> class='rarity4'><br>X9</td>
                        <td><img src=<?= $mobDrop['image3'] ?> alt=<?= $mobDrop['name3'] ?> class='rarity3'><br>X12</td>
                        <td><img src=<?=  $worldBossDrop['image'] ?> alt=<?=  $worldBossDrop['name'] ?> class='rarity5'><br>X2</td>
                        <td><img src='assets/img/other/couronne_de_la_sagesse.webp' alt='Couronne de la sagesse' class='rarity5'><br>X1</td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="builds.php?id=<?= $id ?>" class="btn">Ses builds</a>
    </main>
    <?php include "templates/footer.php"; ?>
</body>
</html>
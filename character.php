<?php 
    include "header.php";
    include "base.php";
    $currentCharacter = [];
    foreach ($characters as $character) {
        if ($character['name'] === $_GET['name']){
            $currentCharacter = $character;
        }
    }
    $card = $currentCharacter['card'];
    $name = $currentCharacter['name'];
    $rarity = $currentCharacter['rarity'];
    $element = $currentCharacter['element'];
    switch($currentCharacter['weapon']){
        case 'sword': $weapon = 'Epée à 1 main'; break;
        case 'claymore' : $weapon = 'Epée à 2 mains'; break;
        case 'bow' : $weapon = 'Arc'; break;
        case 'catalyst' : $weapon = 'Catalyseur'; break;
        case 'polearm' : $weapon = 'Arme d\'hast';
    };
    switch($currentCharacter['bonus_elevation']){
        case 'atq': $bonus = 'ATQ%'; break;
        case 'def': $bonus = 'DEF%'; break;
        case 'pv': $bonus = 'PV%'; break;
        case 'dgt-anemo': $bonus = 'DTG% Anemo'; break;
        case 'dgt-geo': $bonus = 'DTG% Geo'; break;
        case 'dgt-electro': $bonus = 'DTG% Electro'; break;
        case 'dgt-dendro': $bonus = 'DTG% Dendro'; break;
        case 'dgt-hydro': $bonus = 'DTG% Hydro'; break;
        case 'dgt-pyro': $bonus = 'DTG% Pyro'; break;
        case 'dgt-cryo': $bonus = 'DTG% Cryo'; break;
        case 'dgt-phy': $bonus = 'DTG% Physiques'; break;
        case 'crit-rate': $bonus = 'TC'; break;
        case 'crit-dgt': $bonus = 'DC'; break;
        case 're': $bonus = 'RE'; break;
        case 'me': $bonus = 'ME'; break;
        case 'heal': $bonus = '%Soins';
    }
    switch($currentCharacter['aptitude_farm_days']){
        case 'mo-th-su': $days = 'Lundi / Jeudi / Dimanche'; break;
        case 'tu-fr-su': $days = 'Mardi / Vendredi / Dimanche'; break;
        case 'we-sa-su': $days = 'Mercredi / Samedi / Dimanche';
    }
    foreach($elements as $el){
        if ($element === $el['name']){
            $charJewel = $el['char_jewel'];
        }
    };
    $localMaterial = $currentCharacter['local_material'];
    $mobDrop = $currentCharacter['mob_drop'];
    $dungeonDrop = $currentCharacter['dungeon_drop'];
    $bossDrop = $currentCharacter['boss_drop'];
    $worldBossDrop = $currentCharacter['world_boss_drop'];
    function extractNameFile($fileName){
        // on extrait les sous-chaines délimitées par /, on inverse le tableau obtenu et prend le premier élément (on obtient le fichier avec l'extension))
        $tmp = array_reverse(explode('/', $fileName))[0];
        // on extrait cette fois les sous-chaines délimitées par . 
        return explode('.', $tmp)[0];
    }
    $HTML="
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!--Common style-->
    <link rel='stylesheet' href='assets/css/style.css'>
    <!--character style-->
    <link rel='stylesheet' href='assets/css/character.css'>
    <title>".$name."</title>
</head>
<body>
    <main>
        <h1>Fiche Personnage</h1>
        <div class='container'>
            <div class='img-description'>
                <img src=".$card." alt=".$name." class=rarity".$rarity.">
                <div class='description'>
                    <p><b>Nom:</b> <span>".$name."</span></p>
                    <p><b>Element:</b> <span>".$element."</span></p>
                    <p><b>Rareté:</b> <span>".$rarity."</span></p>
                    <p><b>Type arme:</b> <span>".$weapon."</span></p>
                    <p><b>Bonus Elévation:</b> <span>".$bonus."</span></p>
                    <p><b>Jours de farm aptitudes:</b> <span>".$days."</span></p>
                </div>
            </div>
            <div class='sub-container'>
                <h2>Coût de montée de niveaux</h2>
                <table>
                    <tr>
                        <th>Tranche</th>
                        <th><img src='assets/img/other/lecons_du_hero.webp' alt='leçon du héros' title='leçon du héros'></th>
                        <th><img src='assets/img/other/conseils_de_l_aventurier.webp' alt='conseils de l\'aventurier' title='conseils de l\'aventurier'></th>
                        <th><img src='assets/img/other/astuce_du_voyageur.webp' alt='astuce du voyageur' title='astuce du voyageur'></th>
                        <th><img src='assets/img/other/mora.webp' alt='moras' title='moras'></th>
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
                        <th><img src='assets/img/other/mora.webp' alt='moras' title='moras'></th>
                    </tr>
                    <tr>
                        <td>Niveau 20</td>
                        <td><img src=".$charJewel[0]." alt=".extractNameFile($charJewel[0])." title=".extractNameFile($charJewel[0])." class='rarity2'>x1</td>
                        <td></td>
                        <td><img src=".$localMaterial." alt=".extractNameFile($localMaterial)." title=".extractNameFile($localMaterial)." class='rarity1'>x3</td>
                        <td><img src=".$mobDrop[0]." alt=".extractNameFile($mobDrop[0])." title=".extractNameFile($mobDrop[0])." class='rarity1'>x3</td>
                        <td>20 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 40</td>
                        <td><img src=".$charJewel[1]." alt=".extractNameFile($charJewel[1])." title=".extractNameFile($charJewel[1])." class='rarity3'>x3</td>
                        <td><img src=".$bossDrop." alt=".extractNameFile($bossDrop)." title=".extractNameFile($bossDrop)." class='rarity4'>x2</td>
                        <td><img src=".$localMaterial." alt=".extractNameFile($localMaterial)." title=".extractNameFile($localMaterial)." class='rarity1'>x10</td>
                        <td><img src=".$mobDrop[0]." alt=".extractNameFile($mobDrop[0])." title=".extractNameFile($mobDrop[0])." class='rarity1'>x15</td>
                        <td>40 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 50</td>
                        <td><img src=".$charJewel[1]." alt=".extractNameFile($charJewel[1])." title=".extractNameFile($charJewel[1])." class='rarity3'>x6</td>
                        <td><img src=".$bossDrop." alt=".extractNameFile($bossDrop)." title=".extractNameFile($bossDrop)." class='rarity4'>x4</td>
                        <td><img src=".$localMaterial." alt=".extractNameFile($localMaterial)." title=".extractNameFile($localMaterial)." class='rarity1'>x20</td>
                        <td><img src=".$mobDrop[1]." alt=".extractNameFile($mobDrop[1])." title=".extractNameFile($mobDrop[1])." class='rarity2'>x12</td>
                        <td>60 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 60</td>
                        <td><img src=".$charJewel[2]." alt=".extractNameFile($charJewel[2])." title=".extractNameFile($charJewel[2])." class='rarity4'>x3</td>
                        <td><img src=".$bossDrop." alt=".extractNameFile($bossDrop)." title=".extractNameFile($bossDrop)." class='rarity4'>x8</td>
                        <td><img src=".$localMaterial." alt=".extractNameFile($localMaterial)." title=".extractNameFile($localMaterial)." class='rarity1'>x30</td>
                        <td><img src=".$mobDrop[1]." alt=".extractNameFile($mobDrop[1])." title=".extractNameFile($mobDrop[1])." class='rarity2'>x18</td>
                        <td>80 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 70</td>
                        <td><img src=".$charJewel[2]." alt=".extractNameFile($charJewel[2])." title=".extractNameFile($charJewel[2])." class='rarity4'>x6</td>
                        <td><img src=".$bossDrop." alt=".extractNameFile($bossDrop)." title=".extractNameFile($bossDrop)." class='rarity4'>x12</td>
                        <td><img src=".$localMaterial." alt=".extractNameFile($localMaterial)." title=".extractNameFile($localMaterial)." class='rarity1'>x45</td>
                        <td><img src=".$mobDrop[2]." alt=".extractNameFile($mobDrop[2])." title=".extractNameFile($mobDrop[2])." class='rarity3'>x12</td>
                        <td>100 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 80</td>
                        <td><img src=".$charJewel[3]." alt=".extractNameFile($charJewel[3])." title=".extractNameFile($charJewel[3])." class='rarity5'>x6</td>
                        <td><img src=".$bossDrop." alt=".extractNameFile($bossDrop)." title=".extractNameFile($bossDrop)." class='rarity4'>x20</td>
                        <td><img src=".$localMaterial." alt=".extractNameFile($localMaterial)." title=".extractNameFile($localMaterial)." class='rarity1'>x60</td>
                        <td><img src=".$mobDrop[2]." alt=".extractNameFile($mobDrop[2])." title=".extractNameFile($mobDrop[2])." class='rarity3'>x18</td>
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
                        <td><img src=".$dungeonDrop[0]." alt=".extractNameFile($dungeonDrop[0])." title=".extractNameFile($dungeonDrop[0])." class='rarity2'>x3</td>
                        <td><img src=".$mobDrop[0]." alt=".extractNameFile($mobDrop[0])." title=".extractNameFile($mobDrop[0])." class='rarity1'>x6</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src=".$dungeonDrop[1]." alt=".extractNameFile($dungeonDrop[1])." title=".extractNameFile($dungeonDrop[1])." class='rarity3'>x2</td>
                        <td><img src=".$mobDrop[1]." alt=".extractNameFile($mobDrop[1])." title=".extractNameFile($mobDrop[1])." class='rarity2'>x3</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><img src=".$dungeonDrop[1]." alt=".extractNameFile($dungeonDrop[1])." title=".extractNameFile($dungeonDrop[1])." class='rarity3'>x4</td>
                        <td><img src=".$mobDrop[1]." alt=".extractNameFile($mobDrop[1])." title=".extractNameFile($mobDrop[1])." class='rarity2'>x4</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><img src=".$dungeonDrop[1]." alt=".extractNameFile($dungeonDrop[1])." title=".extractNameFile($dungeonDrop[1])." class='rarity3'>x6</td>
                        <td><img src=".$mobDrop[1]." alt=".extractNameFile($mobDrop[1])." title=".extractNameFile($mobDrop[1])." class='rarity2'>x6</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><img src=".$dungeonDrop[1]." alt=".extractNameFile($dungeonDrop[1])." title=".extractNameFile($dungeonDrop[1])." class='rarity3'>x9</td>
                        <td><img src=".$mobDrop[1]." alt=".extractNameFile($mobDrop[1])." title=".extractNameFile($mobDrop[1])." class='rarity2'>x9</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><img src=".$dungeonDrop[2]." alt=".extractNameFile($dungeonDrop[2])." title=".extractNameFile($dungeonDrop[2])." class='rarity4'>x3</td>
                        <td><img src=".$mobDrop[2]." alt=".extractNameFile($mobDrop[2])." title=".extractNameFile($mobDrop[2])." class='rarity3'>x4</td>
                        <td><img src=".$worldBossDrop." alt=".extractNameFile($worldBossDrop)." title=".extractNameFile($worldBossDrop)." class='rarity5'>x1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><img src=".$dungeonDrop[2]." alt=".extractNameFile($dungeonDrop[2])." title=".extractNameFile($dungeonDrop[2])." class='rarity4'>x4</td>
                        <td><img src=".$mobDrop[2]." alt=".extractNameFile($mobDrop[2])." title=".extractNameFile($mobDrop[2])." class='rarity3'>x6</td>
                        <td><img src=".$worldBossDrop." alt=".extractNameFile($worldBossDrop)." title=".extractNameFile($worldBossDrop)." class='rarity5'>x1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td><img src=".$dungeonDrop[2]." alt=".extractNameFile($dungeonDrop[2])." title=".extractNameFile($dungeonDrop[2])." class='rarity4'>x6</td>
                        <td><img src=".$mobDrop[2]." alt=".extractNameFile($mobDrop[2])." title=".extractNameFile($mobDrop[2])." class='rarity3'>x9</td>
                        <td><img src=".$worldBossDrop." alt=".extractNameFile($worldBossDrop)." title=".extractNameFile($worldBossDrop)." class='rarity5'>x2</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><img src=".$dungeonDrop[2]." alt=".extractNameFile($dungeonDrop[2])." title=".extractNameFile($dungeonDrop[2])." class='rarity4'>x9</td>
                        <td><img src=".$mobDrop[2]." alt=".extractNameFile($mobDrop[2])." title=".extractNameFile($mobDrop[2])." class='rarity3'>x12</td>
                        <td><img src=".$worldBossDrop." alt=".extractNameFile($worldBossDrop)." title=".extractNameFile($worldBossDrop)." class='rarity5'>x2</td>
                        <td><img src='assets/img/other/couronne_de_la_sagesse.webp' alt='Couronne de la sagesse' title='Couronne de la sagesse' class='rarity5'>x1</td><!--Ressource fixe-->
                    </tr>
                </table>
            </div>
        </div>
    </main>";
    echo $HTML;
    include "footer.php"; 
    ?>
    <script src="assets/js/connexion.js"></script>
</body>
</html>
<?php
include "base.php";
include "functions.php";
$currentWeapon = [];

// We retrieve the weapon through the link
foreach ($weapons as $weapon) {
    if ($weapon['name'] === htmlspecialchars($_GET['name'])){
        $currentWeapon = $weapon;
        break;
    }
}


################ En attendant une page 404 ################
// If the weapon is not found, we redirect to the weapons gallery
if (empty($currentWeapon)) {
    header("Location: weapons-gallery.php");
    exit;
}

// Weapon was found
$name = $currentWeapon['name'];
$rarity = $currentWeapon['rarity'];
$card = $currentWeapon['card'];
$description = $currentWeapon['description'];

switch($currentWeapon['type']){
    case 'sword': $type = 'Epée à 1 main'; break;
    case 'claymore' : $type = 'Epée à 2 mains'; break;
    case 'bow' : $type = 'Arc'; break;
    case 'catalyst' : $type = 'Catalyseur'; break;
    case 'polearm' : $type = "Arme d'hast";
};

switch($currentWeapon['farm_days']){
    case 'mo-th-su': $days = 'Lundi / Jeudi / Dimanche'; break;
    case 'tu-fr-su': $days = 'Mardi / Vendredi / Dimanche'; break;
    case 'we-sa-su': $days = 'Mercredi / Samedi / Dimanche';
}

switch($currentWeapon['sub_stat']){
    case 'atq': $subStat = 'ATQ%'; break;
    case 'def': $subStat = 'DEF%'; break;
    case 'pv': $subStat = 'PV%'; break;
    case 'dgt-phy': $subStat = 'DTG% Physiques'; break;
    case 'crit-rate': $subStat = 'TC'; break;
    case 'crit-dgt': $subStat = 'DC'; break;
    case 're': $subStat = 'RE'; break;
    case 'me': $subStat = 'ME';
}

switch($currentWeapon['obtaining']){
    case 'wish': $obtaining = 'Voeux'; break;
    case 'shop': $obtaining = 'Boutique'; break;
    case 'event': $obtaining = 'Evènement temporaire'; break;
    case 'craft': $obtaining = 'Forge'; break;
    case 'quest': $obtaining = 'Quète'; break;
    case 'ps': $obtaining = 'Playstation'; break;
    case 'drop': $obtaining = 'Drop'; break;
    case 'dialog': $obtaining = 'Dialogue'; break;
    case 'pass': $obtaining = 'Battle Pass';
}

$dungeonWeaponPath = $currentWeapon['dungeon_weapon'];
$dungeonWeapon = extractNameArray($dungeonWeaponPath);

$elevationWeaponDropPath = $currentWeapon['elevation_weapon_drop'];
$elevationWeaponDrop = extractNameArray($elevationWeaponDropPath);

$mobDropPath = $currentWeapon['mob_drop'];
$mobDrop = extractNameArray($mobDropPath);


// Display the weapon's page
echo'
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Common style-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--weapon style-->
    <link rel="stylesheet" href="assets/css/weapon.css">
    <title>'.$name.'</title>
</head>
<body>';
    include "header.php";
    echo '
    <main>
        <h1>Fiche Arme</h1>
        <div class="container">
            <div class="img-description">
                <img src='.$card.' alt='.$name.' class="rarity'.$rarity.'">
                <div class="description">
                    <p><b>Nom:</b> <span>'.$name.'</span></p>
                    <p><b>Rareté:</b> <span>'.$rarity.'</span></p>
                    <p><b>Type:</b> <span>'.$type.'</span></p>
                    <p><b>Sous-stat:</b> <span>'.$subStat.'</span></p>
                    <p><b>Obtention: </b> <span>'.$obtaining.'</span></p>
                    <p><b>Jours de farm élévation:</b> <span>'.$days.'</span></p>
                </div>
            </div>
            <div class="sub-container p1">
                <p>'.$description.'</p>
            </div>
            <div class="sub-container">
                <h2>Coût d\'élévation de l\'arme</h2>
                <table>
                    <tr>
                        <th>Seuil</th>
                        <th>Ressource de donjon</th>
                        <th>Ressources de mobs 1</th>
                        <th>Ressources de mobs 2</th>
                        <th><img src="assets/img/other/mora.webp" alt="moras" title="moras"></th>
                    </tr>
                    <tr>
                        <td>Niveau 20</td>
                        <td><img src='.$dungeonWeaponPath[0].' alt='.$dungeonWeapon[0].' title='.$dungeonWeapon[0].' class="rarity2">x3</td>
                        <td><img src='.$elevationWeaponDropPath[0].' alt='.$elevationWeaponDrop[0].' title='.$elevationWeaponDrop[0].' class="rarity2">x3</td>
                        <td><img src='.$mobDropPath[0].' alt='.$mobDrop[0].' title='.$mobDrop[0].' class="rarity1">x2</td>
                        <td>5 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 40</td>
                        <td><img src='.$dungeonWeaponPath[1].' alt='.$dungeonWeapon[1].' title='.$dungeonWeapon[1].' class="rarity3">x3</td>
                        <td><img src='.$elevationWeaponDropPath[0].' alt='.$elevationWeaponDrop[0].' title='.$elevationWeaponDrop[0].' class="rarity2">x12</td>
                        <td><img src='.$mobDropPath[0].' alt='.$mobDrop[0].' title='.$mobDrop[0].' class="rarity1">x8</td>
                        <td>15 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 50</td>
                        <td><img src='.$dungeonWeaponPath[1].' alt='.$dungeonWeapon[1].' title='.$dungeonWeapon[1].' class="rarity3">x6</td>
                        <td><img src='.$elevationWeaponDropPath[1].' alt='.$elevationWeaponDrop[1].' title='.$elevationWeaponDrop[1].' class="rarity3">x6</td>
                        <td><img src='.$mobDropPath[1].' alt='.$mobDrop[1].' title='.$mobDrop[1].' class="rarity2">x6</td>
                        <td>20 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 60</td>
                        <td><img src='.$dungeonWeaponPath[2].' alt='.$dungeonWeapon[2].' title='.$dungeonWeapon[2].' class="rarity4">x3</td>
                        <td><img src='.$elevationWeaponDropPath[1].' alt='.$elevationWeaponDrop[1].' title='.$elevationWeaponDrop[1].' class="rarity3">x12</td>
                        <td><img src='.$mobDropPath[1].' alt='.$mobDrop[1].' title='.$mobDrop[1].' class="rarity2">x9</td>
                        <td>30 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 70</td>
                        <td><img src='.$dungeonWeaponPath[2].' alt='.$dungeonWeapon[2].' title='.$dungeonWeapon[2].' class="rarity4">x6</td>
                        <td><img src='.$elevationWeaponDropPath[2].' alt='.$elevationWeaponDrop[2].' title='.$elevationWeaponDrop[2].' class="rarity4">x9</td>
                        <td><img src='.$mobDropPath[2].' alt='.$mobDrop[2].' title='.$mobDrop[2].' class="rarity3">x9</td>
                        <td>35 000</td>
                    </tr>
                    <tr>
                        <td>Niveau 80</td>
                        <td><img src='.$dungeonWeaponPath[3].' alt='.$dungeonWeapon[3].' title='.$dungeonWeapon[3].' class="rarity5">x4</td>
                        <td><img src='.$elevationWeaponDropPath[2].' alt='.$elevationWeaponDrop[2].' title='.$elevationWeaponDrop[2].' class="rarity4">x18</td>
                        <td><img src='.$mobDropPath[2].' alt='.$mobDrop[2].' title='.$mobDrop[2].' class="rarity3">x12</td>
                        <td>45 000</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>';
    include "footer.php";
    echo '
    <script src="assets/js/connexion.js"></script>
</body>
</html>';
?>
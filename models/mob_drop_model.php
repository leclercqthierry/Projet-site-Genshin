<?php

require_once "models/database.php";

// check if the objects already exist
for ($i = 0; $i < count($images); $i++) {
    $j = $i + 1;
    if (checkExist("zell_mob_drops", "name".$j, $names[$i]) || checkExist("zell_mob_drops", "image".$j, $images[$i])){
        $error = "L'objet existe déjà.";
        require_once "views/error.php";
        exit;
    }
}

// insert the new objets into the table zell_mob_drops
$pdo = getConnexion();
try{
    $stmt = $pdo->prepare("INSERT INTO zell_mob_drops (category, name1, image1, name2, image2, name3, image3) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$category, $names[0], $imagePaths[0], $names[1], $imagePaths[1], $names[2], $imagePaths[2]]);
} catch(PDOException $e){
    $error = "Erreur lors de la tentative d'insertion des drop de mobs dans la base de données: ".$e->getMessage();
    require_once "views/error.php";
    exit;
}
<?php

require_once "models/database.php";

// check if the objects already exist
for ($i = 0; $i < count($images); $i++) {
    $j = $i + 1;
    if (checkExist("zell_mob_drops", "name".$j, $names[$i]) || checkExist("zell_mob_drops", "image".$j, $images[$i])){
        echo "L'objet existe déjà.";
        exit;
    }
}

// insert the new objets into the table zell_mob_drops
$pdo = getConnexion();
try{
    $stmt = $pdo->prepare("INSERT INTO zell_mob_drops (name1, image1, name2, image2, name3, image3) VALUES (?,?,?,?,?,?)");
    $stmt->execute([$names[0], $imagePaths[0], $names[1], $imagePaths[1], $names[2], $imagePaths[2]]);
} catch(PDOException $e){
    echo $e->getMessage();
    exit;
}
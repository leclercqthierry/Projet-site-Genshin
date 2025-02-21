<?php

require_once "models/database.php";

// check if the object already exist
if (checkExist("zell_boss_drops", "name", $name) || checkExist("zell_boss_drops", "image", $imagePath)){
    echo "L'objet existe déjà.";
    exit;
}

function createBossDrop($name, $imagePath){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_boss_drops (`name`, `image`) VALUES (?,?)");
        $stmt->execute([$name, $imagePath]);
    } catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
}

// insert the new objet into the table zell_boss_drops
createBossDrop($name, $imagePath);
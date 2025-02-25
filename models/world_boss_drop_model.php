<?php

require_once "models/database.php";

// check if the object already exist
if (checkExist("zell_world_boss_drops", "name", $name) || checkExist("zell_world_boss_drops", "image", $imagePath)){
    $error = "L'objet existe déjà.";
    require_once "views/error.php";
    exit;
}

/**
 * @param string $name, $imagePath
 */
function createWorldBossDrop($name, $imagePath){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_world_boss_drops (`name`, `image`) VALUES (?,?)");
        $stmt->execute([$name, $imagePath]);
    } catch(PDOException $e){
        $error = "Echec lors de la création d'un drop de world boss: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

// insert the new objet into the table zell_boss_drops
createWorldBossDrop($name, $imagePath);
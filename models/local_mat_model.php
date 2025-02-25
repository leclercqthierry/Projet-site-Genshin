<?php

require_once "models/database.php";

// check if the object already exist
if (checkExist("zell_local_materials", "name", $name) || checkExist("zell_local_materials", "image", $imagePath)){
    $error = "L'objet existe déjà.";
    require_once "views/error.php";
    exit;
}

/**
 * @param string $name, $imagePath
 */
function createLocalMaterial($name, $imagePath){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_local_materials (`name`, `image`) VALUES (?,?)");
        $stmt->execute([$name, $imagePath]);
    } catch(PDOException $e){
        $error = "Erreur de création d'un matériel local: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

// insert the new objet into the table zell_boss_drops
createLocalMaterial($name, $imagePath);
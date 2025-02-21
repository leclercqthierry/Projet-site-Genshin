<?php

require_once "models/database.php";

// check if the object already exist
if (checkExist("zell_local_materials", "name", $name) || checkExist("zell_local_materials", "image", $imagePath)){
    echo "L'objet existe déjà.";
    exit;
}

function createLocalMaterial($name, $imagePath){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_local_materials (`name`, `image`) VALUES (?,?)");
        $stmt->execute([$name, $imagePath]);
    } catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
}

// insert the new objet into the table zell_boss_drops
createLocalMaterial($name, $imagePath);
<?php

require_once "models/database.php";

function createArtifact($name, $rarity, $description, $thumbnailPath){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_artifacts (`name`, `rarity`, `image`, `description`) VALUES (?,?,?,?)");
        $stmt->execute([$name, $rarity, $thumbnailPath, $description]);

    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un set d'artefacts: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
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

function getAllArtifacts(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_artifacts ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de tous les sets d'artefacts: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
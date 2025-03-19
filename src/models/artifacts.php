<?php

require_once "models/database.php";

/**
 * @param string $name
 * @param string $rarity
 * @param string $description
 * @param string $thumbnailPath
 */
function createArtifact($name, $rarity, $description, $thumbnailPath){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_artifacts (`name`, `rarity`, `image`, `description`) VALUES (?,?,?,?)");
        $stmt->execute([$name, $rarity, $thumbnailPath, $description]);

    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un set d'artefacts: ".$e->getMessage();
        include_once "views/error.php";
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
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param string $id
 */
function getArtifactById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_artifacts WHERE `artifact_id` = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération d'un artéfact par l'ID: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @param string $name
 * @param string $rarity
 * @param string $description
 * @param string $thumbnailPath
 */
function editArtifact($id, $name, $rarity, $description, $thumbnailPath){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_artifacts SET `name` =?, `rarity` =?, `image` =?, `description` =? WHERE `artifact_id` =?");
        $stmt->execute([$name, $rarity, $thumbnailPath, $description, $id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un artéfact: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 */
function deleteArtifact($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_artifacts WHERE `artifact_id` =?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression d'un artéfact: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
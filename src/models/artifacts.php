<?php

require_once "models/database.php";

/**
 * Create a new artifact set
 * @param string $name The name of the artifact set
 * @param string $rarity The maximum rarity of the artifact set
 * @param string $description The description of the artifact set
 * @param string $thumbnailPath The path of the artifact set thumbnail file
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

/**
 * Get all artifact sets
 * @return array the list of artifact sets
 */
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
 * Get the artifact with the given id
 * @param string $id The artifact id
 * @return array the corresponding artifact set
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
 * Edit an artifact set with the given id
 * @param int $id the artifact set id
 * @param string $name the name of the artifact set
 * @param string $rarity the rarity of the artifact set
 * @param string $description  the description of the artifact set
 * @param string $thumbnailPath the thumbnail path of the artifact set
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
 * Delete the artifact set with the given id
 * @param int $id the artifact set id
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
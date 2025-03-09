<?php

require_once "models/database.php";

/**
 * @param int $charId
 * @param int $weaponId
 * @param int $artifactId
 * @return array
 */
function getBuild($charId, $weaponId, $artifactId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_builds WHERE artifact_id =? AND weapon_id =? AND character_id =?");
        $stmt->execute([$artifactId, $weaponId, $charId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $error = "Erreur lors de la récupération du build: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $charId
 * @param int $weaponId
 * @param int $artifactId
 */
function createBuild($charId, $weaponId, $artifactId, $userId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_builds (`artifact_id`, `weapon_id`, `character_id`, `user_id`) VALUES (?,?,?,?)");
        $stmt->execute([$artifactId, $weaponId, $charId, $userId]);
    }catch(PDOException $e){
        $error = "Erreur lors de la création d'un build: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $characterId
 * @return array
 */
function getAllBuildsByCharacterId($characterId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_builds WHERE character_id =?");
        $stmt->execute([$characterId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $error = "Erreur lors de la récupération des builds par personnage: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $characterId
 * @param int $weaponId
 * @param int $artifactId
 * @param int $buildId
 */
function editBuild($characterId, $weaponId, $artifactId, $buildId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_builds SET artifact_id =?, weapon_id =? WHERE build_id =? AND character_id =?");
        $stmt->execute([$artifactId, $weaponId, $buildId, $characterId]);
    }catch(PDOException $e){
        $error = "Erreur lors de la modification du build: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $buildId
 */
 function deleteBuild($buildId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_builds WHERE `build_id`=?");
        $stmt->execute([$buildId]);
    }catch(PDOException $e){
        $error = "Erreur lors de la suppression du build: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
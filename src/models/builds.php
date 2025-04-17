<?php
/**
 * This file contains all the functions related to the builds
 * It includes functions to get a build, get all builds of a team, create a build, get all builds by character id, edit a build and delete a build
 */

require_once "models/database.php";

/**
 * Get a specific build from the database
 * @param int $charId the character id
 * @param int $weaponId the weapon id
 * @param int $artifactId the artifact id
 * @return array the corresponding build
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
 * get all builds of a team with the given team id
 * @param int $teamId the team id
 * @return array all corresponding builds (4)
 */
function getBuildsByTeamId($teamId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_builds JOIN zell_team_builds ON zell_team_builds.build_id = zell_builds.build_id WHERE zell_team_builds.team_id = ?");
        $stmt->execute([$teamId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $error = "Erreur lors de la récupération des builds par équipe: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * create a new build
 * @param int $charId The character id
 * @param int $weaponId the weapon id
 * @param int $artifactId the artifact id
 * @param int $userId the user id of the creator
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
 * Get all builds by a character id
 * @param int $characterId the character id
 * @return array all corresponding builds
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
 * Edit the build with the given build id
 * @param int $characterId the new character id
 * @param int $weaponId the new weapon id
 * @param int $artifactId the new artifact id
 * @param int $buildId the given build id
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
 * Delete the build with the given id
 * @param int $buildId the build id
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
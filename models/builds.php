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
        require_once "views/error.php";
        exit;
    }
}

function createBuild($charId, $weaponId, $artifactId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_builds (`artifact_id`, `weapon_id`, `character_id`) VALUES (?,?,?)");
        $stmt->execute([$artifactId, $weaponId, $charId]);
    }catch(PDOException $e){
        $error = "Erreur lors de la création d'un build: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
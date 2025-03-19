<?php

require_once "models/database.php";

/**
 * @param string $teamName
 * @param $array $buildIds
 * @param int $userId
 */
function createTeam($teamName, $buildIds, $userId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_teams (`name`, `user_id`) VALUES (?,?)");
        $stmt->execute([$teamName, $userId]);
        $teamId = $pdo->lastInsertId();
        foreach ($buildIds as $buildId) {
            $stmt = $pdo->prepare("INSERT INTO zell_team_builds (`team_id`, `build_id`) VALUES (?,?)");
            $stmt->execute([$teamId, $buildId]);
        }
    }catch(PDOException $e){
        $error = "Erreur lors de la création d'une équipe: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @return array
 */
function getAllTeams(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_teams");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $error = "Erreur lors de la récupération de toutes les équipes: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $teamId
 * @return array
 */
function getTeamById($teamId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_teams WHERE team_id = ?");
        $stmt->execute([$teamId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $error = "Erreur lors de la récupération de l'équipe d'id: $teamId".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $userId
 * @return array
 */
function getAllUserTeams($userId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_teams WHERE user_id =?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $error = "Erreur lors de la récupération des équipes de l'utilisateur d'id: $userId".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param string $teamName
 * @param array $oldBuildIds
 * @param array $newBuildIds
 * @param int $teamId
 */
function editTeam($teamName, $oldBuildIds, $newBuildIds, $teamId){
    $pdo = getConnexion();
    try{

        // If necessary, edit the team name in the zell_teams table.
        $stmt = $pdo->prepare("UPDATE zell_teams SET `name`=? WHERE `team_id`=?");
        $stmt->execute([$teamName, $teamId]);

        // Then we edit the builds in the team_builds table
        for ($i = 0; $i < 4; $i++){
            $stmt = $pdo->prepare("UPDATE zell_team_builds tb SET tb.build_id=? WHERE tb.build_id=? AND tb.team_id=?");
            $stmt->execute([$newBuildIds[$i], $oldBuildIds[$i], $teamId]);
        }
    }catch(PDOException $e) {
        $error = "Erreur lors de la modification de l'équipe: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $teamId
 */
 function deleteTeam($teamId){
    $pdo = getConnexion();
    try{

        // Delete the team from the team_builds table first to avoid foreign key constraint issues.
        $stmt = $pdo->prepare("DELETE FROM zell_team_builds WHERE team_id=?");
        $stmt->execute([$teamId]);

        // Finally, delete the team from the teams table.
        $stmt = $pdo->prepare("DELETE FROM zell_teams WHERE team_id=?");
        $stmt->execute([$teamId]);
    }catch(PDOException $e) {
        $error = "Erreur lors de la suppression de l'équipe: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
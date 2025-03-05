<?php

require_once "models/database.php";

/**
 * @param string $teamName
 * @param array $teamChars
 * @param array $teamWeapons
 * @param array $teamWartifacts
 */
function createTeam($teamName, $teamChars, $teamWeapons, $teamArtifacts, $userId){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_teams (`name`, `score`, `user_id`) VALUES (?,?,?)");
        $stmt->execute([$teamName, NULL, $userId]);

        // I retrieve the index of the created team
        $teamId = $pdo->lastInsertId();

        // Then, I insert each character, weapon, and artifact in the respective tables team_characters, team_weapons and team_artifacts
        for ($i = 0; $i < 4; $i++) {
            insertTeamCharacter($pdo, $teamId, $teamChars[$i]);
            insertTeamWeapon($pdo, $teamId, $teamWeapons[$i]);
            insertTeamArtifact($pdo, $teamId, $teamArtifacts[$i]);
        }
    }catch(PDOException $e){
        $error = "Erreur lors de la création d'une équipe: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function insertTeamCharacter($pdo, $teamId, $charId){
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_team_characters (`team_id`, `character_id`) VALUES (?,?)");
        $stmt->execute([$teamId, $charId]);
    } catch(PDOException $e){
        $error = "Erreur lors de l'insertion d'un personnage dans une équipe: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function insertTeamWeapon($pdo, $teamId, $weaponId){
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_team_weapons (`team_id`, `weapon_id`) VALUES (?,?)");
        $stmt->execute([$teamId, $weaponId]);
    } catch(PDOException $e){
        $error = "Erreur lors de l'insertion d'une arme dans une équipe: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function insertTeamArtifact($pdo, $teamId, $artifactId){
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_team_artifacts (`team_id`, `artifact_id`) VALUES (?,?)");
        $stmt->execute([$teamId, $artifactId]);
    } catch(PDOException $e){
        $error = "Erreur lors de l'insertion d'un artéfact dans une équipe: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
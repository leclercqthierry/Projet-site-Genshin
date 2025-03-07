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
        include_once "views/error.php";
        exit;
    }
}

function insertTeamCharacter($pdo, $teamId, $charId){
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_team_characters (`team_id`, `character_id`) VALUES (?,?)");
        $stmt->execute([$teamId, $charId]);
    } catch(PDOException $e){
        $error = "Erreur lors de l'insertion d'un personnage dans une équipe: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

function insertTeamWeapon($pdo, $teamId, $weaponId){
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_team_weapons (`team_id`, `weapon_id`) VALUES (?,?)");
        $stmt->execute([$teamId, $weaponId]);
    } catch(PDOException $e){
        $error = "Erreur lors de l'insertion d'une arme dans une équipe: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

function insertTeamArtifact($pdo, $teamId, $artifactId){
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_team_artifacts (`team_id`, `artifact_id`) VALUES (?,?)");
        $stmt->execute([$teamId, $artifactId]);
    } catch(PDOException $e){
        $error = "Erreur lors de l'insertion d'un artéfact dans une équipe: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

function getAllteams(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT
        t.name,
        c.name,
        c.rarity,
        c.image,
        w.name,
        w.rarity,
        w.image,
        a.name,
        a.rarity,
        a.image
        FROM zell_teams AS t
        JOIN zell_team_characters AS tc
            ON t.team_id = tc.team_id
        JOIN zell_characters AS c 
            ON tc.character_id = c.character_id
        JOIN zell_team_weapons AS tw
            ON t.team_id = tw.team_id
        JOIN zell_weapons AS w
            ON tw.weapon_id = w.weapon_id
        JOIN zell_team_artifacts AS ta
            ON t.team_id = ta.team_id
        JOIN zell_artifacts AS a 
            ON ta.artifact_id = a.artifact_id;
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
        $error = "Erreur lors de récupération des équipes: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
<?php
session_start();

require_once "models/teams.php";
require_once "models/users.php";
require_once "models/builds.php";
require_once "models/characters.php";
require_once "models/weapons.php";
require_once "models/artifacts.php";
require_once "models/common.php";

$teams = getAllTeams();
foreach ($teams as $team){
    $names[] = $team['name'];
    $authors[] = getUserById($team['user_id'])['nickname'];
    $teamBuilds[] = getBuildsByTeamId($team['team_id']); // 4 per team
    foreach ($teamBuilds as $teamBuild){
        foreach ($teamBuild as $build){
        $teamCharacters[] = getCharacterById($build['character_id']);
        $teamElement[] = getElementById(getCharacterById($build['character_id'])['element_id']);
        $teamWeapons[] = getWeaponById($build['weapon_id']);
        $teamArtifacts[] = getArtifactById($build['artifact_id']);
        }
    }
    $characters[] = $teamCharacters;
    $elements[] = $teamElement;
    $weapons[] = $teamWeapons;
    $artifacts[] = $teamArtifacts;
}

include_once "views/teams-gallery.php";
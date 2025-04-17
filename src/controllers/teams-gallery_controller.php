<?php
/**
 * This file is the controller for the teams gallery page.
 * It retrieves all teams and their builds from the database and passes them to the view.
 */
session_start();

require_once "models/teams.php";
require_once "models/users.php";
require_once "models/builds.php";
require_once "models/characters.php";
require_once "models/common.php";

$teams = getAllTeams();
for ($i = 0; $i < count($teams); $i++){
    $names[$i] = $teams[$i]['name'];
    $authors[$i] = getUserById($teams[$i]['user_id'])['nickname'];
    $teamBuilds[$i] = getBuildsByTeamId($teams[$i]['team_id']); // 4 per team
    for($j = 0; $j < 4; $j++){
        $teamCharacters[$j] = getCharacterById($teamBuilds[$i][$j]['character_id']);
        $teamElement[$j] = getElementById(getCharacterById($teamBuilds[$i][$j]['character_id'])['element_id']);
    }
    $characters[$i] = $teamCharacters;
    $elements[$i] = $teamElement;
}

include_once "views/teams-gallery.php";
<?php
session_start();

if (isset($_GET['id']) && isset($_GET['author'])){

    $teamId = $_GET['id'];
    $author = htmlspecialchars($_GET['author']);
    if (!is_numeric($teamId)){
        header('Location: 404');
        exit;
    }

    require_once "models/teams.php";
    require_once "models/builds.php";
    require_once "models/characters.php";
    require_once "models/weapons.php";
    require_once "models/artifacts.php";
    require_once "models/common.php";

    // We start by getting the team and builds using the id
    $team = getTeamById($teamId);
    $builds = getBuildsByTeamId($teamId);


    // From the builds we get the characters, weapons and artifacts
    foreach($builds as $build){
        $characters[] = getCharacterById($build['character_id']);
        $elements[] = getElementById(getCharacterById($build['character_id'])['element_id']);
        $weapons[] = getWeaponById($build['weapon_id']);
        $artifacts[] = getArtifactById($build['artifact_id']);
    }

    include_once "views/team.php";

}else{
    header("location: 404");
}
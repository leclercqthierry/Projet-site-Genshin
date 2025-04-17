<?php
/**
 * This file is the controller for the builds page.
 * It handles the logic for displaying the builds for a specific character.
 * It retrieves the builds from the database and categorizes them into F2P, hybrid, and premium builds
 */

session_start();

if (isset($_GET['id'])){

    $id = $_GET['id'];
    if (!is_numeric($id)){
        header('Location: 404');
        exit;
    }

    require_once "models/characters.php";
    require_once "models/weapons.php";
    require_once "models/artifacts.php";
    require_once "models/builds.php";

    $builds = getAllBuildsByCharacterId($id);
    $charName = getCharacterById($id)['name'];

    // Now we look at whether it is a F2P, hybrid or premium weapon.
    foreach ($builds as $build){
        $weapon = getWeaponById($build['weapon_id']);
        $artifact = getArtifactById($build['artifact_id']);
        if ($weapon['rarity'] === 5 || $weapon['obtaining_id'] === 9){
            $premiumBuilds[] = $build;
            $premiumWeapons[] = $weapon;
            $premiumArtifacts[] = $artifact;
        }else if ($weapon['rarity'] === 4 && ($weapon['obtaining_id'] === 1 || $weapon['obtaining_id'] === 2)) {
            $hybridBuilds[] = $build;
            $hybridWeapons[] = $weapon;
            $hybridArtifacts[] = $artifact;
        }else {
            $f2pBuilds[] = $build;
            $f2pWeapons[] = $weapon;
            $f2pArtifacts[] = $artifact;
        }
    }

    include_once "views/builds.php";

}else{
    header('Location: 404');
    exit;
}
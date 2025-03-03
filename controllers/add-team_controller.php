<?php
session_start();

if($_SESSION['role'] === 'Administrator'){

    require_once "templates/build_field.php";
    require_once "models/characters.php";
    require_once "models/weapons.php";
    require_once "models/artifacts.php";

    $characters = getAllCharacters();
    $weapons = getAllWeapons();
    $artifacts = getAllArtifacts();

    require_once 'views/add-team.php';

}else{
    $error = "Accès interdit!!";
    require_once "views/error.php";
    exit;
}

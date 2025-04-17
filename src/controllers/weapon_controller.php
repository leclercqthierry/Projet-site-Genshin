<?php
/**
 * This file is the controller for the weapon page.
 * It handles the request and response for the weapon page.
 * It retrieves the weapon data from the database and passes it to the view.
 */
session_start();

if (isset($_GET['id'])){

    $id = $_GET['id'];
    if (!is_numeric($id)){
        header('Location: 404');
        exit;
    }

    require_once "models/weapons.php";
    require_once "models/common.php";
    require_once "models/resources.php";

    $weapon = getWeaponById($id);
    $name = $weapon['name'];
    $card = $weapon['card'];
    $rarity = $weapon['rarity'];
    $description = $weapon['description'];
    $type = getWeaponTypeById($weapon['weapon_type_id'])['name'];
    $days = getFarmDaysById($weapon['farm_day_id'])['daysFr'];
    $subStat = getStatById($weapon['stat_id'])['nameFr'];
    $obtaining = howToGetById($weapon['obtaining_id'])['name'];
    $dungeonWeapon = getDjElevationMaterialsById($weapon['dungeon_drop_id']);
    $elevationWeaponDrop = getElevationMaterialsById($weapon['elevation_weapon_drop_id']);
    $mobDrop = getMobMaterialsById($weapon['mob_drop_id']);

    include_once "views/weapon.php";
}else{
    header("location: 404");
}
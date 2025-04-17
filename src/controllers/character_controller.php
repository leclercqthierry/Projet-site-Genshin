<?php
/**
 * This file is the controller for the character page.
 * It handles the request and response for the character page.
 * It retrieves the character data from the database and displays it on the page.
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
    require_once "models/common.php";
    require_once "models/resources.php";

    // All datas needed to display the character characteristics
    $character = getCharacterById($id);
    $card = substr($character['card'],0,strlen($character['card'])-5);
    $name = $character['name'];
    $rarity = $character['rarity'];
    $element = getElementById($character['element_id'])['name'];
    $charJewel = getCharJewelById($character['element_id']);
    $bonus = getStatById($character['stat_id'])['nameFr'];
    $days = getFarmDaysById($character['farm_day_id'])['daysFr'];
    $weapon = getWeaponTypeById($character['weapon_type_id'])['name'];
    $localMaterial = getlocalMaterialById($character['local_material_id']);
    $mobDrop = getMobMaterialsById($character['mob_drop_id']);
    $dungeonDrop = getDjMaterialsById($character['dungeon_drop_id']);
    $bossDrop = getBossDropById($character['boss_drop_id']);
    $worldBossDrop = getWorldBossDropById($character['world_boss_drop_id']);

    include_once "views/character.php";

}else{
    header('Location: 404');
}
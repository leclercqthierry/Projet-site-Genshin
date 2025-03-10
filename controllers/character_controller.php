<?php
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

    $character = getCharacterById($id);
    $card = $character['card'];
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
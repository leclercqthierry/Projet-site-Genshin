<?php
session_start();

if ($_SESSION['role'] === 1){

    require_once "models/add-character_model.php";

    $elements = getAllElementNames();
    $weaponTypes = getWeaponTypes();
    $stats = getStats();
    $days = getFarmDays();
    $bossDrops = getBossDropNames();
    $localMaterials = getLocalMaterialNames();
    $wbDrops = getWorldBossDropNames();
    $MobMaterialCategories = getMobMaterialCategory();
    $djMaterialCategories = getDjMaterialCategory();

    require_once "views/add-character.php";
} else {
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
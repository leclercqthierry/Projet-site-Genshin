<?php

require_once "models/database.php";
require_once "models/common.php";

function getAllElementNames(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `element_id`, `name` FROM zell_elements ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des éléments: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getBossDropNames(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `boss_drop_id`, `name` FROM zell_boss_drops ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération des noms de drop des boss: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getLocalMaterialNames() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT `local_material_id`,`name` FROM zell_local_materials ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms des matériaux locaux: " . $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getWorldBossDropNames() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT `world_boss_drop_id`, `name` FROM zell_world_boss_drops ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de drop des world boss: " . $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getDjMaterialCategory() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT `dungeon_drop_id`, `category` FROM zell_dungeon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de matériel de donjon: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    } 
}

function createCharacter($name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_characters (`name`, `element_id`, `char_jewels_id`, `rarity`, `card`, `image`, `weapon_type_id`, `stat_id`, `farm_day_id`, `boss_drop_id`, `local_material_id`, `world_boss_drop_id`, `mob_drop_id`, `dungeon_drop_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $datas = array_merge([$name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath], $ids);
        $stmt->execute($datas);

    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un personnage: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
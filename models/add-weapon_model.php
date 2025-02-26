<?php

require_once "models/database.php";
require_once "models/common.php";

function howToGet(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `obtaining_id`, `name` FROM zell_obtainings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du moyen d'obtention: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getElevationMaterialCategory(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `elevation_weapon_drop_id`, `category` FROM zell_elevation_weapon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e){
        $error = "Erreur lors de la récupération des matériaux d'élévation: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getDjElevationMaterialCategory(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `dungeon_drop_id`, `category` FROM zell_dungeon_weapon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $e){
        $error = "Erreur lors de la récupération des matériaux de DJ d'élévation: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function createWeapon($name, $rarity, $cardPath, $thumbnailPath, $description, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_weapons (`name`, `rarity`, `card`, `image`, `description`, `weapon_type_id`, `stat_id`, `farm_day_id`, `obtaining`, `mob_drop_id`, `dungeon_drop_id`, `elevation_weapon_drop_id` ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $datas = array_merge([$name, $rarity, $cardPath, $thumbnailPath, $description], $ids);
        $stmt->execute($datas);
        
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un personnage: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
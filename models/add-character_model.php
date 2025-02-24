<?php

require_once "models/database.php";

function getAllElementNames(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `id`, `name` FROM zell_elements ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des éléments: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getWeaponTypes(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `weapon_type_id`, `name` FROM zell_weapon_types ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des types d'armes: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getStats(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `stat_id`, `nameFr` FROM zell_stats ORDER BY `stat_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération des statistiques: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getFarmDays(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `farm_day_id`, `daysFr` FROM zell_farm_days ORDER BY `farm_day_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération des jours de farm: ".$e->getMessage();
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

function getMobMaterialCategory() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT `mob_drop_id`, `category` FROM zell_mob_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de drops de monstres: ". $e->getMessage();
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
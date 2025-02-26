<?php

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
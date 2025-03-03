<?php

require_once "models/database.php";

function getAllWeaponTypesOrderedByName(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_weapon_types ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des types d'armes: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllWeaponTypesOrderedById(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_weapon_types ORDER BY `weapon_type_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des types d'armes: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getWeaponTypeById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_weapon_types WHERE `weapon_type_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération du type d'arme avec l'ID ".$id.": ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllWeapons(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_weapons ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération de tous les armes: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getWeaponById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_weapons WHERE `weapon_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération de l'arme avec l'ID ".$id.": ".$e->getMessage();
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
        $error = "Erreur lors de la création d'une arme: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function editWeapon($id, $name, $rarity, $cardPath, $thumbnailPath, $description, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_weapons SET `name` =?, `rarity` =?, `card` =?, `image` =?, `description` =?, `weapon_type_id` =?, `stat_id` =?, `farm_day_id` =?, `obtaining` =?, `mob_drop_id` =?, `dungeon_drop_id` =?, `elevation_weapon_drop_id` =? WHERE `weapon_id` =?");
        $datas = array_merge([$name, $rarity, $cardPath, $thumbnailPath, $description], $ids, [$id]);
        $stmt->execute($datas);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'une arme: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function deleteWeapon($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_weapons WHERE `weapon_id` =?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression d'une arme: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
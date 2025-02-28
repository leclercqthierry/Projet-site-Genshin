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
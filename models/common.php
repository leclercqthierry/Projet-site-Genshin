<?php

require_once "models/database.php";

function getStats(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `stat_id`, `nameFr` FROM zell_stats ORDER BY `stat_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération des statistiques: ".$e->getMessage();
        include_once "views/error.php";
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
        include_once "views/error.php";
        exit;
    }
}

function getAllElementsOrderedByName(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_elements ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des éléments ordonnés par nom: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

function getAllElementsOrderedById(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_elements ORDER BY `element_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des éléments ordonnés par Id: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

function getElementById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_elements WHERE `element_id` = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération de l'élément par son Id: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

function howToGet(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `obtaining_id`, `name` FROM zell_obtainings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du moyen d'obtention: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
<?php

require_once "models/database.php";


/**
 * @return array
 */
function getAllStats(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `stat_id`, `nameFr` FROM zell_stats ORDER BY `stat_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération des statistiques: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @return array
 */
function getStatById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_stats WHERE `stat_id` = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        $error = "Erreur lors de la récupération d'une statistique par son Id: ".$id.": ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @return array
 */
function getAllFarmDays(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `farm_day_id`, `daysFr` FROM zell_farm_days ORDER BY `farm_day_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération des jours de farm: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @return array
 */
function getFarmDaysById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT `farm_day_id`, `daysFr` FROM zell_farm_days WHERE `farm_day_id` = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        $error = "Erreur lors de la récupération d'un jour de farm par son Id: ".$id.": ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @return array
 */
function getAllElementsOrderedByName(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_elements ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error =  "Erreur lors de la récupération des éléments ordonnés par nom: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @return array
 */
function getAllElementsOrderedById(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_elements ORDER BY `element_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error =  "Erreur lors de la récupération des éléments ordonnés par Id: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @return array
 */
function getElementById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_elements WHERE `element_id` = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error =  "Erreur lors de la récupération de l'élément par son Id: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @return array
 */
function howToGet(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `obtaining_id`, `name` FROM zell_obtainings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération du moyen d'obtention: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @return array
 */
function getCharJewelById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_char_jewels WHERE `char_jewels_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $error = "Erreur lors de la récupération des joyaux de personnages: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
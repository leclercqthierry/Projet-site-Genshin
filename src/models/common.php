<?php

require_once "models/database.php";


/**
 * Get all stats from database
 * @return array the list of stats
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
 * get the stat with the given id
 * @param int $id the stat id
 * @return array the corresponding stat
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
 * get all farm days from database
 * @return array the list of farm days
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
 * get the farm days with the given id
 * @param int $id the farm days id
 * @return array the corresponding farm days
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
 * get all elements from the database ordered by name
 * @return array list of elements ordered by name
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
 * get all elements from database ordered by id
 * @return array the list of elements ordered by id
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
 * get the element with the given id
 * @param int $id the element id
 * @return array the corresponding element
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
 * get all obtaining means from the database
 * @return array the list of obtaining means
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
 * get the obtaining mean with the given id
 * @param int $id the obtaining mean id
 * @return array the corresponding obtaining mean
 */
 function howToGetById($id) {
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_obtainings WHERE `obtaining_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération du moyen d'obtention par son Id: ".$id.": ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
 }

/**
 * Get the character jewel from the database with the given id
 * @param int $id the character jewel id
 * @return array the corresponding character jewel
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
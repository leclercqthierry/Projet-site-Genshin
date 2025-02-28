<?php

require_once "models/database.php";

################# GET #################

function getBossDrops(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_boss_drops ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération des noms de drop des boss: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getLocalMaterials() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_local_materials ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms des matériaux locaux: " . $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getWorldBossDrops() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_world_boss_drops ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de drop des world boss: " . $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getDjMaterials() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_dungeon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de matériel de donjon: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    } 
}

function getMobMaterials() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_mob_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de drops de monstres: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

################# CREATE #################

/**
 * @param array $data
 */
function createDjDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_dungeon_drops (category, name1, name2, name3, image1, image2, image3) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création du jeu de drops de donjon: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param array $data
 */
function createBossDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_boss_drops (`name`, `image`) VALUES (?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un drop de boss: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param array $data
 */
function createDjWeaponDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_dungeon_weapon_drops (category, name1, name2, name3, name4, image1, image2, image3, image4) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un jeu de drops de donjon d'armes: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param array $data
 */
function createElevationDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_elevation_weapon_drops (category, name1, name2, name3, image1, image2, image3) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un jeu de drops d'élévation: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param array $data
 */
function createLocalMaterial($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_local_materials (`name`, `image`) VALUES (?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur de création d'un matériel local: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param array $data
 */
function createMobDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_mob_drops (category, name1, name2, name3, image1, image2, image3) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un jeu de drop de mobs: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param array $data
 */
function createWorldBossDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_world_boss_drops (`name`, `image`) VALUES (?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Echec lors de la création d'un drop de world boss: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
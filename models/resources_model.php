<?php

require_once "models/database.php";

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
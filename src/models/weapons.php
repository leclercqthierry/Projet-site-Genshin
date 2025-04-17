<?php
/**
 * this file contains all the functions to manage the weapons in the database
 * it contains functions to get all weapons, get a weapon by its id, create a new weapon, edit a weapon and delete a weapon
 * it also contains functions to get all weapon types, get a weapon type by its id and get all weapons of the same type
 */

require_once "models/database.php";

/**
 * Get all weapon types ordered by name in the database
 */
function getAllWeaponTypesOrderedByName(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_weapon_types ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des types d'armes: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all weapon types ordered by id in the database
 */
function getAllWeaponTypesOrderedById(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_weapon_types ORDER BY `weapon_type_id`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des types d'armes: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get weapon type by its id in the database
 * @param int $id
 * @return array the weapon type
 */
function getWeaponTypeById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_weapon_types WHERE `weapon_type_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération du type d'arme avec l'ID ".$id.": ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all weapons ordered by name in the database
 */
function getAllWeapons(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `weapon_id`, `weapon_type_id`, `rarity`, `name`, `image` FROM zell_weapons ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération de tous les armes: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all weapons of the same type
 * @param int $id
 * @return array list of weapons of the same type
 */
function getAllWeaponsOfType($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_weapons WHERE `weapon_type_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération des armes du type dont l'ID est: ".$id.": ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get weapon by its id in the database
 * @param int $id
 * @return array the weapon
 */
function getWeaponById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_weapons WHERE `weapon_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error =  "Erreur lors de la récupération de l'arme avec l'ID ".$id.": ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new weapon in the database
 * @param string $name name of the new weapon
 * @param int $rarity rarity of the new weapon
 * @param string $cardPath path to the new weapon card
 * @param string $thumbnailPath path to the new weapon thumbnail
 * @param string $description description of the new weapon
 * @param array $ids array of all ids needed to create the new weapon
 */
function createWeapon($name, $rarity, $cardPath, $thumbnailPath, $description, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_weapons (`name`, `rarity`, `card`, `image`, `description`, `weapon_type_id`, `stat_id`, `farm_day_id`, `obtaining_id`, `mob_drop_id`, `dungeon_drop_id`, `elevation_weapon_drop_id` ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $datas = array_merge([$name, $rarity, $cardPath, $thumbnailPath, $description], $ids);
        $stmt->execute($datas);
        
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'une arme: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit a weapon in the database
 * @param int $id id of the weapon to edit
 * @param string $name name of the new weapon
 * @param int $rarity rarity of the new weapon
 * @param string $cardPath path to the new weapon card
 * @param string $thumbnailPath path to the new weapon thumbnail
 * @param string $description description of the new weapon
 * @param array $ids array of all ids needed to create the new weapon
 */
function editWeapon($id, $name, $rarity, $cardPath, $thumbnailPath, $description, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_weapons SET `name` =?, `rarity` =?, `card` =?, `image` =?, `description` =?, `weapon_type_id` =?, `stat_id` =?, `farm_day_id` =?, `obtaining_id` =?, `mob_drop_id` =?, `dungeon_drop_id` =?, `elevation_weapon_drop_id` =? WHERE `weapon_id` =?");
        $datas = array_merge([$name, $rarity, $cardPath, $thumbnailPath, $description], $ids, [$id]);
        $stmt->execute($datas);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'une arme: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete a weapon from the database
 * @param int $id id of the weapon to delete
 */
function deleteWeapon($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_weapons WHERE `weapon_id` =?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression d'une arme: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
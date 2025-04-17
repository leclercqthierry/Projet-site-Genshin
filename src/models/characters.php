<?php
/**
 * This file contains the character model functions.
 * It includes functions to create, read, update and delete characters from the database.
 */

require_once "models/database.php";

/**
 * Create a new character
 * @param string $name Name of the character
 * @param int $element_id ID of the character element
 * @param int $char_jewels_id ID of the character jewel
 * @param int $rarity Rarity of the character
 * @param string $cardPath Path to the character card
 * @param string $thumbnailPath Path to the character thumbnail
 * @param array $ids array of needed ids for the character
 */
function createCharacter($name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_characters (`name`, `element_id`, `char_jewels_id`, `rarity`, `card`, `image`, `weapon_type_id`, `stat_id`, `farm_day_id`, `boss_drop_id`, `local_material_id`, `world_boss_drop_id`, `mob_drop_id`, `dungeon_drop_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $datas = array_merge([$name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath], $ids);
        $stmt->execute($datas);

    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un personnage: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all characters
 * @return array the list of characters
 */
function getAllCharacters(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT `element_id`, `character_id`, `rarity`, `name`, `image`, `weapon_type_id` FROM zell_characters ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de tous les personnages: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get a character by its id
 * @param int $id ID of the character
 * @return array the corresponding character
 */
function getCharacterById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_characters WHERE `character_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération du personnage: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit a character by its id
 * @param int $id ID of the character to edit
 * @param string $name Name of the character
 * @param int $element_id ID of the character element
 * @param int $char_jewels_id ID of the character jewel
 * @param int $rarity Rarity of the character
 * @param string $cardPath Path to the character card
 * @param string $thumbnailPath Path to the character thumbnail
 * @param array $ids array of needed ids for the character
 */
function editCharacter($id, $name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_characters SET `name`=?, `element_id`=?, `char_jewels_id`=?, `rarity`=?, `card`=?, `image`=?, `weapon_type_id`=?, `stat_id`=?, `farm_day_id`=?, `boss_drop_id`=?, `local_material_id`=?, `world_boss_drop_id`=?, `mob_drop_id`=?, `dungeon_drop_id`=? WHERE `character_id`=?");
        $datas = array_merge([$name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath], $ids, [$id]);
        $stmt->execute($datas);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification du personnage: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete a character by its id
 * @param int $id ID of the character to delete
 */
function deleteCharacter($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_characters WHERE `character_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression du personnage: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
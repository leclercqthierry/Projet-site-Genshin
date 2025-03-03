<?php

require_once "models/database.php";

function createCharacter($name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_characters (`name`, `element_id`, `char_jewels_id`, `rarity`, `card`, `image`, `weapon_type_id`, `stat_id`, `farm_day_id`, `boss_drop_id`, `local_material_id`, `world_boss_drop_id`, `mob_drop_id`, `dungeon_drop_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $datas = array_merge([$name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath], $ids);
        $stmt->execute($datas);

    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un personnage: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllCharacters(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_characters ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de tous les personnages: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getCharacterById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_characters WHERE `character_id` =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération du personnage: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function editCharacter($id, $name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath, $ids){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_characters SET `name`=?, `element_id`=?, `char_jewels_id`=?, `rarity`=?, `card`=?, `image`=?, `weapon_type_id`=?, `stat_id`=?, `farm_day_id`=?, `boss_drop_id`=?, `local_material_id`=?, `world_boss_drop_id`=?, `mob_drop_id`=?, `dungeon_drop_id`=? WHERE `character_id`=?");
        $datas = array_merge([$name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath], $ids, [$id]);
        $stmt->execute($datas);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification du personnage: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function deleteCharacter($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_characters WHERE `character_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression du personnage: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
<?php

require_once "models/database.php";

################# GET #################

function getAllBossDrops(){
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

function getBossDropById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_boss_drops WHERE `boss_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération du drop du boss avec l'id: $id".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllLocalMaterials() {
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

function getLocalMaterialById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_local_materials WHERE `local_material_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du matériau local avec l'id: $id".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllWorldBossDrops() {
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

function getWorldBossDropById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_world_boss_drops WHERE `world_boss_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du drop du world boss avec l'id: $id".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllDjMaterials() {
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

function getDjMaterialsById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_dungeon_drops WHERE `dungeon_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du jeu de drop de donjon d'id: $id".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllMobMaterials() {
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

function getMobMaterialsById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_mob_drops WHERE `mob_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du jeu de drop d'id: $id".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllElevationMaterials(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_elevation_weapon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e){
        $error = "Erreur lors de la récupération des matériaux d'élévation: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getElevationMaterialsById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_elevation_weapon_drops WHERE `elevation_weapon_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (Exception $e){
        $error = "Erreur lors de la récupération du jeu de drop d'id: $id".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getAllDjElevationMaterials(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_dungeon_weapon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $e){
        $error = "Erreur lors de la récupération des matériaux de DJ d'élévation: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

function getDjElevationMaterialsById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_dungeon_weapon_drops WHERE `dungeon_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (Exception $e){
        $error = "Erreur lors de la récupération du jeu de drop d'id: $id".$e->getMessage();
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
function createMobMaterials($data){
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

################# UPDATE #################

/**
 * @param int $id
 * @param array $data
 */
function editBossDrop($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_boss_drops SET `name` =?, `image` =? WHERE `boss_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un drop de boss: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @param array $data
 */
function editLocalMaterial($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_local_materials SET `name` =?, `image` =? WHERE `local_material_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un matériel local: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @param array $data
 */
function editWorldBossDrop($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_world_boss_drops SET `name` =?, `image` =? WHERE `world_boss_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un drop de world boss: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @param array $data
 */
function editMobMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_mob_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `image1` =?, `image2` =?, `image3` =? WHERE `mob_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de matériel de mob: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @param array $data
 */
function editDjMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_dungeon_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `image1` =?, `image2` =?, `image3` =? WHERE `dungeon_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de drops de donjon: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @param array $data
 */
function editElevationMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_elevation_weapon_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `image1` =?, `image2` =?, `image3` =? WHERE `elevation_weapon_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de drops d'élévation: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 * @param array $data
 */
function editDjElevationMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_dungeon_weapon_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `name4` =?, `image1` =?, `image2` =?, `image3` =?, `image4` =? WHERE `dungeon_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de drops d'élévation de donjon: ". $e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

################# DELETE #################

/**
 * @param int $id
 */
function deleteBossDrop($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_boss_drops WHERE `boss_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 */
function deleteLocalMaterial($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_local_materials WHERE `local_material_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 */
function deleteWorldBossDrop($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_world_boss_drops WHERE `world_boss_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 */
function deleteMobMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_mob_drops WHERE `mob_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 */
function deleteDjMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_dungeon_drops WHERE `dungeon_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 */
function deleteElevationMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_elevation_weapon_drops WHERE `elevation_weapon_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

/**
 * @param int $id
 */
function deleteDjElevationMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_dungeon_weapon_drops WHERE `dungeon_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}
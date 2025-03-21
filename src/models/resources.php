<?php

require_once "models/database.php";

################# GET #################

/**
 * Get all boss drops from the database
 * @return array the list of boss drops
 */
function getAllBossDrops(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_boss_drops ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération des noms de drop des boss: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the boss drop with the given id
 * @return array the corresponding boss drop
 */
function getBossDropById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_boss_drops WHERE `boss_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e){
        $error = "Erreur lors de la récupération du drop du boss avec l'id: $id".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all Local Materials from the database
 * @return array the list of local materials
 */
function getAllLocalMaterials() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_local_materials ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms des matériaux locaux: " . $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the local material with the given id
 * @return array the corresponding local material
 */
function getLocalMaterialById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_local_materials WHERE `local_material_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du matériau local avec l'id: $id".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all World boss drops from the database
 * @return array the list of the world boss drops
 */
function getAllWorldBossDrops() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_world_boss_drops ORDER BY `name`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de drop des world boss: " . $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the world boss drop with the given id
 * @return array the corresponding world boss drop
 */
function getWorldBossDropById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_world_boss_drops WHERE `world_boss_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du drop du world boss avec l'id: $id".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all Dungeon materials from the database
 * @return array the list of the dungeon materials
 */
function getAllDjMaterials() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_dungeon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de matériel de donjon: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    } 
}

/**
 * Get the dungeon material with the given id
 * @return array the corresponding dungeon material
 */
function getDjMaterialsById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_dungeon_drops WHERE `dungeon_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du jeu de drop de donjon d'id: $id".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all Mob materials from the database
 * @return array the list of the mob materials
 */
function getAllMobMaterials() {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->query("SELECT * FROM zell_mob_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération des noms de drops de monstres: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the mob material with the given id
 * @return array the corresponding mob material
 */
function getMobMaterialsById($id) {
    $pdo = getConnexion();
    try {
        $stmt = $pdo->prepare("SELECT * FROM zell_mob_drops WHERE `mob_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Erreur lors de la récupération du jeu de drop d'id: $id".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all elevation materials from the database
 * @return array the list of elevation materials
 */
function getAllElevationMaterials(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_elevation_weapon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e){
        $error = "Erreur lors de la récupération des matériaux d'élévation: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the elevation material with the given id
 * @return array the corresponding elevation material
 */
function getElevationMaterialsById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_elevation_weapon_drops WHERE `elevation_weapon_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (Exception $e){
        $error = "Erreur lors de la récupération du jeu de drop d'id: $id".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get all Dungeon elevation materials from the database
 * @return array the list of Dungeon elevation materials
 */
function getAllDjElevationMaterials(){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->query("SELECT * FROM zell_dungeon_weapon_drops ORDER BY `category`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $e){
        $error = "Erreur lors de la récupération des matériaux de DJ d'élévation: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the Dungeon elevation material with the given id
 * @return array the corresponding Dungeon elevation material
 */
function getDjElevationMaterialsById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_dungeon_weapon_drops WHERE `dungeon_drop_id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (Exception $e){
        $error = "Erreur lors de la récupération du jeu de drop d'id: $id".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

################# CREATE #################

/**
 * Create a new Dungeon drop
 * @param array $data the data to create the new dungeon drop
 */
function createDjDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_dungeon_drops (category, name1, name2, name3, image1, image2, image3) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création du jeu de drops de donjon: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new boss drop
 * @param array $data the data to create the new boss drop
 */
function createBossDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_boss_drops (`name`, `image`) VALUES (?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un drop de boss: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new dungeon weapon drop
 * @param array $data the data to create the new dungeon weapon drop
 */
function createDjWeaponDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_dungeon_weapon_drops (category, name1, name2, name3, name4, image1, image2, image3, image4) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un jeu de drops de donjon d'armes: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new elevation drop
 * @param array $data the data to create the new elevation drop
 */
function createElevationDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_elevation_weapon_drops (category, name1, name2, name3, image1, image2, image3) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un jeu de drops d'élévation: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new local material
 * @param array $data the data to create the new local material
 */
function createLocalMaterial($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_local_materials (`name`, `image`) VALUES (?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur de création d'un matériel local: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new mob material
 * @param array $data the data to create the new mob materials
 */
function createMobMaterials($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_mob_drops (category, name1, name2, name3, image1, image2, image3) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la création d'un jeu de drop de mobs: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new World boss drop
 * @param array $data the data to create the new world boss drop
 */
function createWorldBossDrop($data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_world_boss_drops (`name`, `image`) VALUES (?,?)");
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Echec lors de la création d'un drop de world boss: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

################# UPDATE #################

/**
 * Edit the boss drop with the id
 * @param int $id the boss drop id
 * @param array $data the new boss drop data
 */
function editBossDrop($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_boss_drops SET `name` =?, `image` =? WHERE `boss_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un drop de boss: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit the local material with the given id
 * @param int $id the local material id
 * @param array $data the new local material data
 */
function editLocalMaterial($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_local_materials SET `name` =?, `image` =? WHERE `local_material_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un matériel local: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit the world boss drop with the given id
 * @param int $id the boss drop id
 * @param array $data the new boss drop data
 */
function editWorldBossDrop($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_world_boss_drops SET `name` =?, `image` =? WHERE `world_boss_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un drop de world boss: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit the Mob material with the given id
 * @param int $id the mob material id
 * @param array $data the new mob material data
 */
function editMobMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_mob_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `image1` =?, `image2` =?, `image3` =? WHERE `mob_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de matériel de mob: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit the dungeon materials with the given id
 * @param int $id the dungeon materials id
 * @param array $data the new dungeon materials data
 */
function editDjMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_dungeon_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `image1` =?, `image2` =?, `image3` =? WHERE `dungeon_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de drops de donjon: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit the elevation materials with the given id
 * @param int $id the elevation  materials id
 * @param array $data the new elevation materials data
 */
function editElevationMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_elevation_weapon_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `image1` =?, `image2` =?, `image3` =? WHERE `elevation_weapon_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de drops d'élévation: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Edit a dungeon elevation materials with the given id
 * @param int $id the dungeon elevation materials id
 * @param array $data the new dungeon elevation materials data
 */
function editDjElevationMaterials($id, $data){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_dungeon_weapon_drops SET `category` =?, `name1` =?, `name2` =?, `name3` =?, `name4` =?, `image1` =?, `image2` =?, `image3` =?, `image4` =? WHERE `dungeon_drop_id` =?");
        array_push($data, $id);
        $stmt->execute($data);
    } catch(PDOException $e){
        $error = "Erreur lors de la modification d'un jeu de drops d'élévation de donjon: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

################# DELETE #################

/**
 * Delete the boss drop from the database with the given id 
 * @param int $id the boss drop id
 */
function deleteBossDrop($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_boss_drops WHERE `boss_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete the local material from the database with the given id 
 * @param int $id the local material id
 */
function deleteLocalMaterial($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_local_materials WHERE `local_material_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete the world boss drop from the database with the given id 
 * @param int $id the world boss drop id
 */
function deleteWorldBossDrop($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_world_boss_drops WHERE `world_boss_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete the mob materials from the database with the given id 
 * @param int $id the mob materials id
 */
function deleteMobMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_mob_drops WHERE `mob_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete the dungeon materials from the database with the given id 
 * @param int $id the dungeon material id
 */
function deleteDjMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_dungeon_drops WHERE `dungeon_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete the elevation materials from the database with the given id 
 * @param int $id the elevation materials id
 */
function deleteElevationMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_elevation_weapon_drops WHERE `elevation_weapon_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete the dungeon elevation materials from the database with the given id 
 * @param int $id the dungeon elevation materials id
 */
function deleteDjElevationMaterials($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_dungeon_weapon_drops WHERE `dungeon_drop_id`=?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de la ressource: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
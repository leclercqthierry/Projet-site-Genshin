<?php
session_start();

if($_SESSION['role'] === 'Administrator'){

    $resourceTypes = ['Boss drop', 'Matériel local', 'World boss drop', 'Mob drops', 'Donjon drops', 'Drop pour élévation d\'armes', 'Donjon de drop d\'armes'];
    
    // No forms have been submitted.
    if(count($_POST) ===0){

        // We will display the first form
        require_once "views/delete-resources.php";
    }else{

        // First Form submitted
        if (isset($_POST['resource-type'])){
            $res_key = $_POST['resource-type'];

            require_once "models/resources.php";

            switch ($res_key){
                case 0:
                    $resources = getAllBossDrops();
                    $resource_id = 'boss_drop_id';
                    break;
                case 1:
                    $resources = getAllLocalMaterials();
                    $resource_id = 'local_material_id';
                    break;
                case 2:
                    $resources = getAllWorldBossDrops();
                    $resource_id = 'world_boss_drop_id';
                    break;
                case 3:
                    $resources = getAllMobMaterials();
                    $resource_id ='mob_drop_id';
                    break;
                case 4:
                    $resources = getAllDjMaterials();
                    $resource_id ='dungeon_drop_id';
                    break;
                case 5:
                    $resources = getAllElevationMaterials();
                    $resource_id ='elevation_weapon_drop_id';
                    break;
                case 6:
                    $resources = getAllDjElevationMaterials();
                    $resource_id ='dungeon_drop_id';
                    break;
                default:
                    $error = "Type de ressources inconnu";
                    require_once "views/error.php";
                    exit;
            }
            $type = ($res_key < 3) ? 'name' : 'category';
        }

        // Second form submitted
        // We receive the id of the resource to edit
        if (isset($_POST['resource']) && isset($_POST['type'])){

            require_once "models/resources.php";
            $id = htmlspecialchars($_POST['resource']);

            // We delete the corresponding image(s) then the resource from the database
            switch ($_POST['type']){
                case 0:
                    $resource = getBossDropById($id);
                    unlink($resource['image']);
                    deleteBossDrop($id);
                    header("location: admin-menu");
                    break;
                case 1:
                    $resource = getLocalMaterialById($id);
                    unlink($resource['image']);
                    deleteLocalMaterial($id);
                    header("location: admin-menu");
                    break;
                case 2:
                    $resource = getWorldBossDropById($id);
                    unlink($resource['image']);
                    deleteWorldBossDrop($id);
                    header("location: admin-menu");
                    break;
                case 3:
                    $resource = getMobMaterialsById($id);
                    unlink($resource['image1']);
                    unlink($resource['image2']);
                    unlink($resource['image3']);
                    deleteMobMaterials($id);
                    header("location: admin-menu");
                    break;
                case 4:
                    $resource = getDjMaterialsById($id);
                    unlink($resource['image1']);
                    unlink($resource['image2']);
                    unlink($resource['image3']);
                    deleteDjMaterials($id);
                    header("location: admin-menu");
                    break;
                case 5:
                    $resource = getElevationMaterialsById($id);
                    unlink($resource['image1']);
                    unlink($resource['image2']);
                    unlink($resource['image3']);
                    deleteElevationMaterials($id);
                    header("location: admin-menu");
                    break;
                case 6:
                    $resource = getDjElevationMaterialsById($id);
                    unlink($resource['image1']);
                    unlink($resource['image2']);
                    unlink($resource['image3']);
                    unlink($resource['image4']);
                    deleteDjElevationMaterials($id);
                    header("location: admin-menu");
                    break;
                default:
                    $error = "Type de ressources inconnu";
                    require_once "views/error.php";
                    exit;
            }
        }
        require_once "views/delete-resources.php";
    }
}else{
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
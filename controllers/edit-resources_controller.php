<?php
session_start();

if ($_SESSION['role'] === 'Administrator'){

    $resourceTypes = ['Boss drop', 'Matériel local', 'World boss drop', 'Mob drops', 'Donjon drops', 'Drop pour élévation d\'armes', 'Donjon de drop d\'armes'];
    
    // No forms have been submitted.
    if(count($_POST) ===0){

        // We will display the first form
        require_once "views/edit-resources.php";
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

            require_once "templates/edit-resources.php";
            require_once "models/resources.php";

            // Simple Resource Edit Form
            switch ($_POST['type']){
                case 0:
                    $resource = getBossDropById($_POST['resource']);
                    $form = editSimpleResourceForm($resourceTypes[0], 'bd_name', 'bd_image', $resource, $_POST['resource']);
                    break;
                case 1:
                    $resource = getLocalMaterialById($_POST['resource']);
                    $form = editSimpleResourceForm($resourceTypes[1], 'lc_name', 'lc_image', $resource, $_POST['resource']);
                    break;
                case 2:
                    $resource = getWorldBossDropById($_POST['resource']);
                    $form = editSimpleResourceForm($resourceTypes[2], 'wbd_name', 'wbd_image', $resource, $_POST['resource']);
                    break;
                case 3:
                    $resource = getMobMaterialsById($_POST['resource']);
                    $form = editMultiplesResourcesForm($resourceTypes[3], ['md_name1', 'md_name2', 'md_name3'], ['md_image1', 'md_image2', 'md_image3'], $resource, $_POST['resource']);
                    break;
                case 4:
                    $resource = getDjMaterialsById($_POST['resource']);
                    $form = editMultiplesResourcesForm($resourceTypes[4], ['djd_name1', 'djd_name2', 'djd_name3'], ['djd_image1', 'djd_image2', 'djd_image3'], $resource, $_POST['resource']);
                    break;
                case 5:
                    $resource = getElevationMaterialsById($_POST['resource']);
                    $form = editMultiplesResourcesForm($resourceTypes[5], ['ewd_name1', 'ewd_name2', 'ewd_name3'], ['ewd_image1', 'ewd_image2', 'ewd_image3'], $resource, $_POST['resource']);
                    break;
                case 6:
                    $resource = getDjElevationMaterialsById($_POST['resource']);
                    $form = editMultiplesResourcesForm($resourceTypes[6], ['dwd_name1', 'dwd_name2', 'dwd_name3', 'dwd_name4'], ['dwd_image1', 'dwd_image2', 'dwd_image3', 'dwd_image4'], $resource, $_POST['resource']);
                    break;
            }
        }

        // Third form submitted
        require_once "utilities/validate.php";
        require_once "models/resources.php";

        if (isset($_POST['bd_name']) && isset($_FILES['bd_image']) && $_POST['id']){

            $id = htmlspecialchars($_POST['id']);
            $resource = getBossDropById($id);
            $data = validateEditSimpleResource('bd_name', 'bd_image', 'boss_drop', $resource);
            $resource = editBossDrop($id, $data);

            header("location: admin-menu");
        } else if (isset($_POST['lc_name']) && isset($_FILES['lc_image']) && $_POST['id']){

            $id = htmlspecialchars($_POST['id']);
            $resource = getLocalMaterialById($id);
            $data = validateEditSimpleResource('lc_name', 'lc_image', 'local_material', $resource);
            $resource = editLocalMaterial($id, $data);

            header("location: admin-menu");
        }else if (isset($_POST['wbd_name']) && isset($_FILES['wbd_image']) && $_POST['id']){

            $id = htmlspecialchars($_POST['id']);
            $resource = getWorldBossDropById($id);
            $data = validateEditSimpleResource('wbd_name', 'wbd_image', 'world_boss_drop', $resource);
            $resource = editWorldBossDrop($id, $data);

            header("location: admin-menu");
        }else if (isset($_POST['category']) && isset($_POST['md_name1']) && isset($_POST['md_name2']) && isset($_POST['md_name3']) && isset($_FILES['md_image1']) && isset($_FILES['md_image2']) && isset($_FILES['md_image3']) && isset($_POST['id'])){

            $names = [$_POST['category'], $_POST['md_name1'], $_POST['md_name2'], $_POST['md_name3']];
            $images = ['md_image1', 'md_image2', 'md_image3'];
            $files = [$_FILES['md_image1']['name'], $_FILES['md_image2']['name'], $_FILES['md_image3']['name']];
            $strNames = ['category', 'md_name1', 'md_name2', 'md_name3'];
            $id = htmlspecialchars($_POST['id']);
            $resource = getMobMaterialsById($id);
            $data = validateEditMultipleResources($names, $images , $files, $strNames, 'mob_drop', $resource);
            $resource = editMobMaterials($id, $data);

            header("location: admin-menu");
        }else if(isset($_POST['category']) && isset($_POST['djd_name1']) && isset($_POST['djd_name2']) && isset($_POST['djd_name3']) && isset($_FILES['djd_image1']) && isset($_FILES['djd_image2']) && isset($_FILES['djd_image3']) && isset($_POST['id'])) {

            $names = [$_POST['category'], $_POST['djd_name1'], $_POST['djd_name2'], $_POST['djd_name3']];
            $images = ['djd_image1', 'djd_image2', 'djd_image3'];
            $files = [$_FILES['djd_image1']['name'], $_FILES['djd_image2']['name'], $_FILES['djd_image3']['name']];
            $strNames = ['category', 'djd_name1', 'djd_name2', 'djd_name3'];
            $id = htmlspecialchars($_POST['id']);
            $resource = getDjMaterialsById($id);
            $data = validateEditMultipleResources($names, $images , $files, $strNames, 'dungeon_drop', $resource);
            $resource = editDjMaterials($id, $data);

            header("location: admin-menu");
        }else if (isset($_POST['category']) && isset($_POST['ewd_name1']) && isset($_POST['ewd_name2']) && isset($_POST['ewd_name3']) && isset($_FILES['ewd_image1']) && isset($_FILES['ewd_image2']) && isset($_FILES['ewd_image3']) && isset($_POST['id'])) {

            $names = [$_POST['category'], $_POST['ewd_name1'], $_POST['ewd_name2'], $_POST['ewd_name3']];
            $images = ['ewd_image1', 'ewd_image2', 'ewd_image3'];
            $files = [$_FILES['ewd_image1']['name'], $_FILES['ewd_image2']['name'], $_FILES['ewd_image3']['name']];
            $strNames = ['category', 'ewd_name1', 'ewd_name2', 'ewd_name3'];
            $id = htmlspecialchars($_POST['id']);
            $resource = getElevationMaterialsById($id);
            $data = validateEditMultipleResources($names, $images , $files, $strNames, 'elevation_weapon_drop', $resource);
            $resource = editElevationMaterials($id, $data);

            header("location: admin-menu");
        }else if (isset($_POST['category']) && isset($_POST['dwd_name1']) && isset($_POST['dwd_name2']) && isset($_POST['dwd_name3']) && isset($_POST['dwd_name4'])&& isset($_FILES['dwd_image1']) && isset($_FILES['dwd_image2']) && isset($_FILES['dwd_image3']) && isset($_FILES['dwd_image4']) && isset($_POST['id'])) {

            $names = [$_POST['category'], $_POST['dwd_name1'], $_POST['dwd_name2'], $_POST['dwd_name3'], $_POST['dwd_name4']];
            $images = ['dwd_image1', 'dwd_image2', 'dwd_image3', 'dwd_image4'];
            $files = [$_FILES['dwd_image1']['name'], $_FILES['dwd_image2']['name'], $_FILES['dwd_image3']['name'], $_FILES['dwd_image4']['name']];
            $strNames = ['category', 'dwd_name1', 'dwd_name2', 'dwd_name3', 'dwd_name4'];
            $id = htmlspecialchars($_POST['id']);
            $resource = getDjElevationMaterialsById($id);
            $data = validateEditMultipleResources($names, $images , $files, $strNames, 'dungeon_weapon_drop', $resource);
            $resource = editDjElevationMaterials($id, $data);
            header("location: admin-menu");
        }
        require_once "views/edit-resources.php";
    }
}else{
    $error = "Accès interdit!!";
    require_once "views/error.php";
    exit;
}
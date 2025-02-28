<?php
session_start();

// The addition of resources being independent most of the time, we therefore process the forms independently.

if($_SESSION['role'] === 1){

    if(count($_POST) === 0){
        require_once "templates/add-resources.php";
        require_once "views/add-resources.php";
    }else {
        require_once "utilities/validate.php";
        
        if(isset($_POST['bd_name']) && isset($_FILES['bd_image'])){
            $data = simpleResource('bd_name', 'bd_image', 'boss_drop');
            createBossDrop($data);
        }else if(isset($_POST['lc_name']) && isset($_FILES['lc_image'])){
            $data = simpleResource('lc_name', 'lc_image', 'local_material');
            createLocalMaterial($data);
        }else if(isset($_POST['wbd_name']) && isset($_FILES['wbd_image'])){
            $data = simpleResource('wbd_name', 'wbd_image', 'world_boss_drop');
            createWorldBossDrop($data);
        }else if (isset($_POST['category']) && isset($_POST['md_name1']) && isset($_POST['md_name2']) && isset($_POST['md_name3']) && isset($_FILES['md_image1']) && isset($_FILES['md_image2']) && isset($_FILES['md_image3'])) {

            $names = [$_POST['category'], $_POST['md_name1'], $_POST['md_name2'], $_POST['md_name3']];
            $images = ['md_image1', 'md_image2', 'md_image3'];
            $files = [$_FILES['md_image1']['name'], $_FILES['md_image2']['name'], $_FILES['md_image3']['name']];
            $strNames = ['category', 'md_name1', 'md_name2', 'md_name3'];
            $data = multipleResources($names, $images, $files, $strNames, 'mob_drop');

            require_once "models/resources_model.php";
            createMobDrop($data);
            header("location: admin-menu");
        }else if(isset($_POST['category']) && isset($_POST['djd_name1']) && isset($_POST['djd_name2']) && isset($_POST['djd_name3']) && isset($_FILES['djd_image1']) && isset($_FILES['djd_image2']) && isset($_FILES['djd_image3'])) {

            $names = [$_POST['category'], $_POST['djd_name1'], $_POST['djd_name2'], $_POST['djd_name3']];
            $images = ['djd_image1', 'djd_image2', 'djd_image3'];
            $files = [$_FILES['djd_image1']['name'], $_FILES['djd_image2']['name'], $_FILES['djd_image3']['name']];
    
            $strNames = ['category', 'djd_name1', 'djd_name2', 'djd_name3'];
            $data = multipleResources($names, $images, $files, $strNames, 'dungeon_drop');

            require_once "models/resources_model.php";
            createDjDrop($data);
            header("location: admin-menu");
        }else if (isset($_POST['category']) && isset($_POST['ewd_name1']) && isset($_POST['ewd_name2']) && isset($_POST['ewd_name3']) && isset($_FILES['ewd_image1']) && isset($_FILES['ewd_image2']) && isset($_FILES['ewd_image3'])) {

            $names = [$_POST['category'], $_POST['ewd_name1'], $_POST['ewd_name2'], $_POST['ewd_name3']];
            $images = ['ewd_image1', 'ewd_image2', 'ewd_image3'];
            $files = [$_FILES['ewd_image1']['name'], $_FILES['ewd_image2']['name'], $_FILES['ewd_image3']['name']];
    
            $strNames = ['category', 'ewd_name1', 'ewd_name2', 'ewd_name3'];
            $data = multipleResources($names, $images, $files, $strNames, 'elevation_weapon_drop');

            require_once "models/resources_model.php";
            createElevationDrop($data);
            header("location: admin-menu");
        }else if (isset($_POST['category']) && isset($_POST['dwd_name1']) && isset($_POST['dwd_name2']) && isset($_POST['dwd_name3']) && isset($_POST['dwd_name4'])&& isset($_FILES['dwd_image1']) && isset($_FILES['dwd_image2']) && isset($_FILES['dwd_image3']) && isset($_FILES['dwd_image4'])) {

            $names = [$_POST['category'], $_POST['dwd_name1'], $_POST['dwd_name2'], $_POST['dwd_name3'], $_POST['dwd_name4']];
            $images = ['dwd_image1', 'dwd_image2', 'dwd_image3', 'dwd_image4'];
            $files = [$_FILES['dwd_image1']['name'], $_FILES['dwd_image2']['name'], $_FILES['dwd_image3']['name'], $_FILES['dwd_image4']['name']];
    
            $strNames = ['category', 'dwd_name1', 'dwd_name2', 'dwd_name3', 'dwd_name4'];
            $data = multipleResources($names, $images, $files, $strNames, 'dungeon_weapon_drop');

            require_once "models/resources_model.php";
            createDjWeaponDrop($data);
            header("location: admin-menu");
        }
    }

}else{
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
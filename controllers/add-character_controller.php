<?php
session_start();

// If it's the admin
if ($_SESSION['role'] === 1){

    if (isset($_POST['name']) &&
        isset($_POST['element']) &&
        isset($_POST['weapon']) &&
        isset($_POST['rarity']) &&
        isset($_POST['bonus']) &&
        isset($_POST['farm-days']) &&
        isset($_POST['boss-drop']) &&
        isset($_POST['local-mat']) &&
        isset($_POST['wb-drop']) &&
        isset($_POST['mob-drop-category']) &&
        isset($_POST['dj-drop-category']) &&
        isset($_FILES['thumbnail']) &&
        isset($_FILES['card'])
    ) {
        var_dump($_POST);
        // Validate the character name
        if (!preg_match("/^[A-Z][a-zA-Z -éèêë]+\S$/", $_POST['name'])) {
            $error = "Le nom du personnage doit commencer par une majuscule et ne pas comporter ni chiffres ni caractères spéciaux (sauf é, è, ê ou ë) et avoir au moins 3 lettres.";
            require_once "views/error.php";
            exit;
        } else{
            $name = htmlspecialchars($_POST['name']);
        }

        // Validate the element
        if (!is_numeric($_POST['element'])) {
            $error = "L'élément choisi n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $element_id = $_POST['element'];
            $char_jewels_id = $element_id;
        }

        // Validate the weapon type
        if (!is_numeric($_POST['weapon'])) {
            $error = "Le type d'arme choisi n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $weapon_type_id = $_POST['weapon'];
        }
        
        // Validate the rarity
        if (($_POST['rarity']) !== '4' && $_POST['rarity'] !== '5') {
            $error = "La rareté choisie n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $rarity = $_POST['rarity'];
        }
        
        // Validate the bonus
        if (!is_numeric($_POST['bonus'])) {
            $error = "Le bonus choisi n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $stat_id = $_POST['bonus'];
        }

        // Validate the farming days
        if (!is_numeric($_POST['farm-days'])) {
            $error = "Les jours de farm choisis n'est pas valides.";
            require_once "views/error.php";
            exit;
        } else{
            $farm_day_id = $_POST['farm-days'];
        }

        // Validate the boss drop
        if (!is_numeric($_POST['boss-drop'])) {
            $error = "Le drop de boss choisi n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $boss_drop_id = $_POST['boss-drop'];
        }
        
        // Validate the local material
        if (!is_numeric($_POST['local-mat'])) {
            $error = "Le matériau local choisi n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $local_material_id = $_POST['local-mat'];
        }
        
        // Validate the world boss drop
        if (!is_numeric($_POST['wb-drop'])) {
            $error = "Le drop de world boss choisi n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $world_boss_drop_id = $_POST['wb-drop'];
        }
        
        // Validate the mob drop category
        if (!is_numeric($_POST['mob-drop-category'])) {
            $error = "La catégorie de drop de mob choisie n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $mob_drop_id = $_POST['mob-drop-category'];
        }
        
        // Validate the dj material category
        if (!is_numeric($_POST['dj-drop-category'])) {
            $error = "La catégorie de drop de donjon choisie n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $dungeon_drop_id = $_POST['dj-drop-category'];
        }
        
        // Validate the thumbnail and card images
        require_once "utilities/validateFile.php";

        if (!validateFile('thumbnail') || !validateFile('card')){
            exit;
        }else{
            $thumbnailPath = "assets/img/gallery/Characters/".$_FILES['thumbnail']['name'];
            $cardPath = "assets/img/sheet/Characters/Card/".$_FILES['card']['name'];
            if (!file_exists($thumbnailPath) && !file_exists($cardPath)){
                // Save in database
                require_once "models/add-character_model.php";
                $character = createCharacter($name, $element_id, $char_jewels_id, $weapon_type_id, $rarity, $stat_id, $farm_day_id, $boss_drop_id, $local_material_id, $world_boss_drop_id, $mob_drop_id, $dungeon_drop_id, $cardPath, $thumbnailPath);

                // Then save the file in the good directory
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
                move_uploaded_file($_FILES['card']['tmp_name'], $cardPath);
                header("Location: admin-menu");
            } else {
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            }
        }
    } else {
        require_once "models/add-character_model.php";

        $elements = getAllElementNames();
        $weaponTypes = getWeaponTypes();
        $stats = getStats();
        $days = getFarmDays();
        $bossDrops = getBossDropNames();
        $localMaterials = getLocalMaterialNames();
        $wbDrops = getWorldBossDropNames();
        $MobMaterialCategories = getMobMaterialCategory();
        $djMaterialCategories = getDjMaterialCategory();
    
        require_once "views/add-character.php";
    }
} else {
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
<?php
session_start();

// If it's the admin
if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

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

        require_once "utilities/validate.php";

        // Validate the character name
        $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
        $errorName = "Le nom du personnage doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";
        $name = validateTextField('name', $regexName, $errorName);
       

        // Validate the element
        if (!is_numeric($_POST['element'])) {
            $error = "L'élément choisi n'est pas valide.";
            include_once "views/error.php";
            exit;
        } else{
            $element_id = $_POST['element'];
            $char_jewels_id = $element_id;
        }

        // Validate the rarity
        if ($_POST['rarity'] !== '4' && $_POST['rarity'] !== '5') {
            $error = "La rareté choisie n'est pas valide.";
            include_once "views/error.php";
            exit;
        } else{
            $rarity = $_POST['rarity'];
        }

        // Validate other selects
        $selects = ['weapon', 'bonus', 'farm-days', 'boss-drop', 'local-mat', 'wb-drop', 'mob-drop-category', 'dj-drop-category'];
        $errors = [
            "Le type d'arme choisi n'est pas valide.",
            "Le bonus choisi n'est pas valide.",
            "Les jours de farm choisis ne sont pas valides.",
            "Le drop de world boss choisi n'est pas valide.",
            "Le matériel local choisi n'est pas valide.",
            "Le drop de world boss choisi n'est pas valide.",
            "La catégorie de mob drops choisie n'est pas valide.",
            "La catégorie de drop de donjon choisie n'est pas valide."
        ];
        $ids = [];
        for ($i = 0; $i < count($selects); $i++) {
            array_push($ids, validateSelect($selects[$i], $errors[$i]));
        }
        
        // Validate the files
        if (!validateFile('thumbnail') || !validateFile('card')){
            exit;
        }else{
            $thumbnailPath = "assets/img/gallery/Characters/".$_FILES['thumbnail']['name'];
            $cardPath = "assets/img/sheet/Characters/Card/".$_FILES['card']['name'];
            if (!file_exists($thumbnailPath) && !file_exists($cardPath)){
                // Save in database
                require_once "models/characters.php";
                $character = createCharacter($name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath, $ids);

                // Then save the file in the good directory
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
                move_uploaded_file($_FILES['card']['tmp_name'], $cardPath);
                header("Location: admin-menu");
            } else {
                $error = "Le fichier existe déjà.";
                include_once "views/error.php";
                exit;
            }
        }
    } else {
        require_once "models/resources.php";
        require_once "models/common.php";
        require_once "models/weapons.php";

        $elements = getAllElementsOrderedByName();
        $weaponTypes = getAllWeaponTypesOrderedByName();
        $stats = getAllStats();
        $days = getAllFarmDays();
        $bossDrops = getAllBossDrops();
        $localMaterials = getAllLocalMaterials();
        $wbDrops = getAllWorldBossDrops();
        $mobMaterials = getAllMobMaterials();
        $djMaterials = getAllDjMaterials();
    
        include_once "views/add-character.php";
    }
} else {
    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
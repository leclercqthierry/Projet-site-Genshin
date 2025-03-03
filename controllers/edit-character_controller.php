<?php
session_start();

if ($_SESSION['role'] === 'Administrator'){

    require_once "models/characters.php";

    // If both forms have been submitted
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
        isset($_POST['id'])) {

        require_once "utilities/validate.php";

        $id = htmlspecialchars($_POST['id']);
        $character = getCharacterById($id);

        // Validate the character name
        $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
        $errorName = "Le nom du personnage doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";
        $name = validateTextField('name', $regexName, $errorName);

        // Validate the element
        if (!is_numeric($_POST['element'])) {
            $error = "L'élément choisi n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $element_id = $_POST['element'];
            $char_jewels_id = $element_id;
        }

        // Validate the rarity
        if ($_POST['rarity'] !== '4' && $_POST['rarity'] !== '5') {
            $error = "La rareté choisie n'est pas valide.";
            require_once "views/error.php";
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

        if ($_FILES['thumbnail']['size'] !== 0){

            // Validate the file
            if (!validateEditFile('thumbnail')){
                exit;
            }

            // we must delete the old one then add the new one
            unlink($character['image']);
            $thumbnailPath = "assets/img/gallery/Characters/".$_FILES['thumbnail']['name'];
            
            if(!file_exists($thumbnailPath)){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
            }else{
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            }
        } else {
            $thumbnailPath = $character['image'];
        }

        if ($_FILES['card']['size'] !== 0){

            // Validate the file
            if (!validateEditFile('card')){
                exit;
            }

            // we must delete the old one then add the new one
            unlink($character['card']);
            $cardPath = "assets/img/sheet/Characters/Card/".$_FILES['card']['name'];
            
            if(!file_exists($cardPath)){
                move_uploaded_file($_FILES['card']['tmp_name'], $cardPath);
            }else{
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            }
        } else {
            $cardPath = $character['card'];
        }

        $character = editCharacter($id, $name, $element_id, $char_jewels_id, $rarity, $cardPath, $thumbnailPath, $ids);
    }

    // the form for choosing the character to be edited has been submitted

    if (isset($_POST['character'])){

        $id = htmlspecialchars($_POST['character']);
        
        if(!checkExist('zell_characters','character_id', $id)){
            $error = "Ce personnage n'existe pas.";
            require_once "views/error.php";
            exit;
        }else {
            require_once "models/resources.php";
            require_once "models/common.php";
            require_once "models/weapons.php";

            $elements = getAllElementsOrderedByName();
            $weaponTypes = getAllWeaponTypesOrderedByName();
            $stats = getStats();
            $days = getFarmDays();
            $bossDrops = getBossDrops();
            $localMaterials = getLocalMaterials();
            $wbDrops = getWorldBossDrops();
            $mobMaterials = getMobMaterials();
            $djMaterials = getDjMaterials();
            $character = getCharacterById($id);

            require_once "views/edit-character.php";
        }
    }else {
        $characters = getAllCharacters();
        require_once "views/edit-character.php";
    }

}else{
    $error = "Accès interdit!!";
    require_once "views/error.php";
    exit;
}
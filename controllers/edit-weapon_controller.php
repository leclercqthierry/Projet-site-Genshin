<?php
session_start();

if ($_SESSION['role'] === 'Administrator'){

    require_once "models/weapons.php";

    // If both forms have been submitted
    if(isset($_POST['name']) &&
    isset($_POST['type']) &&
    isset($_POST['rarity']) &&
    isset($_POST['bonus']) &&
    isset($_POST['farm-days']) &&
    isset($_POST['obtaining']) &&
    isset($_POST['description']) &&
    isset($_POST['mob-drop-category']) &&
    isset($_POST['dj-drop-category']) &&
    isset($_POST['elevation-drop-category']) &&
    isset($_POST['id'])){

        require_once "utilities/validate.php";

        $id = htmlspecialchars($_POST['id']);
        $weapon = getWeaponById($id);

        // validate the weapon name
        $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
        $errorName = "Le nom de l'arme doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";
        $name = validateTextField('name', $regexName, $errorName);

        // validate the rarity
        if ($_POST['rarity'] !== '3' && $_POST['rarity'] !== '4' && $_POST['rarity'] !== '5') {
            $error = "La rareté choisie n'est pas valide.";
            require_once "views/error.php";
            exit;
        } else{
            $rarity = $_POST['rarity'];
        }

        // validate the description
        $description = htmlspecialchars($_POST['description']);

        // validate the selects
        $selects = ['type', 'bonus', 'farm-days', 'obtaining', 'mob-drop-category', 'dj-drop-category', 'elevation-drop-category'];

        $errors =[
            "Le type d'arme choisi n'est pas valide",
            "Le bonus choisi n'est pas valide",
            "Les jours de farm choisis ne sont pas valides",
            "La source de récupération choisie n'est pas valide",
            "La catégorie de mob drop choisie n'est pas valide",
            "La catégorie de drop de donjon choisie n'est pas valide",
            "La catégorie de drop d'élévation choisie n'est pas valide"
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
            unlink($weapon['image']);
            $thumbnailPath = "assets/img/gallery/Weapons/".$_FILES['thumbnail']['name'];
            
            if(!file_exists($thumbnailPath)){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
            }else{
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            }
        } else {
            $thumbnailPath = $weapon['image'];
        }

        if ($_FILES['card']['size'] !== 0){

            // Validate the file
            if (!validateEditFile('card')){
                exit;
            }

            // we must delete the old one then add the new one
            unlink($weapon['card']);
            $cardPath = "assets/img/sheet/Weapons/Cards/".$_FILES['card']['name'];
            
            if(!file_exists($cardPath)){
                move_uploaded_file($_FILES['card']['tmp_name'], $cardPath);
            }else{
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            }
        } else {
            $cardPath = $weapon['card'];
        }

        $weapon = editWeapon($id, $name, $rarity, $cardPath, $thumbnailPath, $description, $ids);
        header("Location: admin-menu");
    }

    // the form for choosing the weapon to be edited has been submitted

    if (isset($_POST['weapon'])){

        $id = htmlspecialchars($_POST['weapon']);

        if(!checkExist('zell_weapons','weapon_id', $id)){
            $error = "Erreur! L'arme n'existe pas!!!";
            require_once "views/error.php";
            exit;
        }else{
            require_once "models/common.php";
            require_once "models/resources.php";

            $weaponTypes = getAllWeaponTypesOrderedByName();
            $subStats = getStats();
            $obtainings = howToGet();
            $days = getFarmDays();
            $mobMats = getMobMaterials();
            $elevationMats = getElevationMaterials();
            $djElevationMats = getDjElevationMaterials();
            $weapon = getWeaponById($id);

            require_once "views/edit-weapon.php";
        }

    }else{

        $weapons = getAllWeapons();
        require_once "views/edit-weapon.php";
    }
}else {
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
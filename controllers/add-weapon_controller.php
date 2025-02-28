<?php
session_start();

if ($_SESSION['role'] === 1){
    
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
    isset($_FILES['thumbnail']) &&
    isset($_FILES['card'])){
        require_once "utilities/validate.php";

        // validate the weapon name
        $regexName = "/^[A-Z][a-zA-Z \-éèêëàâû']+[a-zA-Zé]$/";
        $errorName = "Le nom de l'arme doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û et ') et avoir au moins 3 lettres.";
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

        // Validate the files
        if (!validateFile('thumbnail') || !validateFile('card')){
            exit;
        }else{
            $thumbnailPath = "assets/img/gallery/Weapons/".$_FILES['thumbnail']['name'];
            $cardPath = "assets/img/sheet/Weapons/Cards/".$_FILES['card']['name'];
            if (!file_exists($thumbnailPath) && !file_exists($cardPath)){
                // Save in database
                require_once "models/weapons.php";
                $weapon = createWeapon($name, $rarity, $cardPath, $thumbnailPath, $description, $ids);

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

    }else{
        require_once "models/common.php";
        require_once "models/resources.php";
        require_once "models/weapons.php";

        $weaponTypes = getAllWeaponTypesOrderedByName();
        $subStats = getStats();
        $obtainings = howToGet();
        $days = getFarmDays();
        $mobMats = getMobMaterials();
        $elevationMats = getElevationMaterials();
        $djElevationMats = getDjElevationMaterials();

        require_once "views/add-weapon.php";
    }

} else{
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
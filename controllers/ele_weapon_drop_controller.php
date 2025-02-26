<?php

session_start();

if($_SESSION['role'] === 1){

    require_once "utilities/validate.php";

    if (isset($_POST['category']) && isset($_POST['ewd_name1']) && isset($_POST['ewd_name2']) && isset($_POST['ewd_name3']) && isset($_FILES['ewd_image1']) && isset($_FILES['ewd_image2']) && isset($_FILES['ewd_image3'])) {

        $names = [$_POST['category'], $_POST['ewd_name1'], $_POST['ewd_name2'], $_POST['ewd_name3']];
        $images = ['ewd_image1', 'ewd_image2', 'ewd_image3'];
        $files = [$_FILES['ewd_image1']['name'], $_FILES['ewd_image2']['name'], $_FILES['ewd_image3']['name']];

        $strNames = ['category', 'ewd_name1', 'ewd_name2', 'ewd_name3'];
        $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâû']+[a-zA-Zé]$/";
        $errorMessage = "Le nom ne commence pas par un espace ni une majuscule (caractères -éèêëàû' autorisés à l'intérieur).";

        // check if there are duplicates values
        if (count(array_unique($names))!= count($names)) {
            $error = "Les noms ne doivent pas être identiques.";
            require_once "views/error.php";
            exit;
        } else if (count(array_unique($files))!= count($files)){
            $error = "Les images doivent être differentes.";
            require_once "views/error.php";
            exit;
        }

        // Validate the names
        for ($i = 0; $i < count($names); $i++){
            $names[$i] = validateTextField($strNames[$i], $regex, $errorMessage);
        }
        
        // Validate the images
        $imagePaths = [];
        foreach ($images as $image){
            if (!validateFile($image)){
                exit;
            } else {
                $imagePath = "assets/img/elevation_weapon_drop/".$_FILES[$image]['name'];
                if (file_exists($imagePath)){
                    $error = "Le fichier existe déjà.";
                    require_once "views/error.php";
                    exit;
                } else {
                    array_push($imagePaths, $imagePath);
                }
            }
        }
        // Save in database
        require_once "models/ele_weapon_drop_model.php";

        // Then save the file in the good directory
        for ($i = 0; $i < count($images); $i++) {
            move_uploaded_file($_FILES[$images[$i]]['tmp_name'], $imagePaths[$i]);
        }
        header("Location: admin-menu");
    }
} else {
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
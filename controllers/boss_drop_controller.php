<?php
session_start();

if ($_SESSION['role'] === 1){
    require_once "utilities/validate.php";

    if (isset($_POST['bd_name']) && isset($_FILES['bd_image'])){
        
        $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâû']+[a-zA-Zé]$/";
        $errorMessage = "Le nom ne commence pas par un espace ni une majuscule (caractères -éèêëàû' autorisés à l'intérieur).";
        $name = validateTextField('bd_name', $regex, $errorMessage);

        // Validate the image
        if (!validateFile('bd_image')){
            exit;
        } else {
            $imagePath = "assets/img/boss_drop/".$_FILES['bd_image']['name'];
            if (!file_exists($imagePath)){
                // Save in database
                require_once "models/boss_drop_model.php";

                // Then save the file in the good directory
                move_uploaded_file($_FILES['bd_image']['tmp_name'], $imagePath);
                header("Location: admin-menu");
            } else {
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            }
        }
    }
} else {
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
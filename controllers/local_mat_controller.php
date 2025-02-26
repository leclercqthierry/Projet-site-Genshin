<?php
session_start();

if ($_SESSION['role'] === 1){
    require_once "utilities/validate.php";

    if (isset($_POST['lc_name']) && isset($_FILES['lc_image'])){

        // Validate the name
        $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâû']+[a-zA-Zé]$/";
        $errorMessage = "Le nom ne commence pas par un espace ni une majuscule (caractères -éèêëàû' autorisés à l'intérieur).";
        $name = validateTextField('lc_name', $regex, $errorMessage);

        // Validate the image
        if (!validateFile('lc_image')){
            exit;
        } else {
            $imagePath = "assets/img/local_material/".$_FILES['lc_image']['name'];
            if (!file_exists($imagePath)){
                // Save in database
                require_once "models/local_mat_model.php";

                // Then save the file in the good directory
                move_uploaded_file($_FILES['lc_image']['tmp_name'], $imagePath);
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
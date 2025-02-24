<?php
session_start();

if ($_SESSION['role'] === 1){
    require_once "utilities/validateFile.php";

    if (isset($_POST['wbd_name']) && isset($_FILES['wbd_image'])){

        // Validate the name
        try{
            if (!preg_match("/^[a-zA-Z]{2}[a-zA-Z ]{1,98}$/", $_POST['wbd_name'])){
                throw new Exception('Le nom doit avoir entre 2 et 100 lettres uniquement (espaces inclus) mais ne pas comporter d\'espaces dans les 2 premiers caractères.');
            } else {
                $name = htmlspecialchars($_POST['wbd_name']);
            }
        
        } catch (Exception $e) {
            $error = $e->getMessage();
            require_once "views/error.php";
            exit;
        }

        // Validate the image
        if (!validateFile('wbd_image')){
            exit;
        } else {
            $imagePath = "assets/img/world_boss_drop/".$_FILES['wbd_image']['name'];
            if (!file_exists($imagePath)){
                // Save in database
                require_once "models/world_boss_drop_model.php";

                // Then save the file in the good directory
                move_uploaded_file($_FILES['wbd_image']['tmp_name'], $imagePath);
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
<?php
session_start();

if ($_SESSION['role'] === 1){
    require_once "utilities/validateFile.php";

    if (isset($_POST['lc_name']) && isset($_FILES['lc_image'])){

        // Validate the name
        try{
            if (!preg_match("/^[a-zA-Z]{2}[a-zA-Z ]{1,98}$/", $_POST['lc_name'])){
                throw new Exception('Le nom doit avoir entre 2 et 100 lettres uniquement (espaces inclus) mais ne pas comporter d\'espaces dans les 2 premiers caractères.');
            } else {
                $name = htmlspecialchars($_POST['lc_name']);
            }
        
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

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
                echo "Le fichier existe déjà.";
                exit;
            }
        }
    }
} else {
    echo "Accès interdit !!";
}
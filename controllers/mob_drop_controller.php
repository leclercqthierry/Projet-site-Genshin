<?php

session_start();

if($_SESSION['role'] === 1){

    require_once "utilities/validateFile.php";

    if (isset($_POST['md_name1']) && isset($_POST['md_name2']) && isset($_POST['md_name3']) && isset($_FILES['md_image1']) && isset($_FILES['md_image2']) && isset($_FILES['md_image3'])) {

        $names = [$_POST['md_name1'], $_POST['md_name2'], $_POST['md_name3']];
        $images = ['md_image1', 'md_image2', 'md_image3'];
        $files = [$_FILES['md_image1']['name'], $_FILES['md_image2']['name'], $_FILES['md_image3']['name']];

        // check if there are duplicates values
        if (count(array_unique($names))!= count($names)) {
            echo "Les noms ne doivent pas être identiques.";
            exit;
        } else if (count(array_unique($files))!= count($files)){
            echo "Les images doivent être differentes.";
            exit;
        }

        // Validate the names
        try {
            foreach ($names as $name) {
                if (!preg_match("/^[a-zA-Z]{2}[a-zA-Z ]{1,98}$/", $name)) {
                    throw new Exception("Le nom doit avoir entre 2 et 100 lettres uniquement (espaces inclus) mais ne pas comporter d'espaces dans les 2 premiers caractères.");
                }else {
                    $name = htmlspecialchars($name);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        
        // Validate the images
        $imagePaths = [];
        foreach ($images as $image){
            if (!validateFile($image)){
                exit;
            } else {
                $imagePath = "assets/img/mob_drop/".$_FILES[$image]['name'];
                if (file_exists($imagePath)){
                    echo "Le fichier existe déjà.";
                    exit;
                } else {
                    array_push($imagePaths, $imagePath);
                }
            }
        }
        // Save in database
        require_once "models/mob_drop_model.php";

        // Then save the file in the good directory
        for ($i = 0; $i < count($images); $i++) {
            move_uploaded_file($_FILES[$images[$i]]['tmp_name'], $imagePaths[$i]);
        }
        header("Location: admin-menu");
    }
} else {
    echo "Accès interdit !!";
}
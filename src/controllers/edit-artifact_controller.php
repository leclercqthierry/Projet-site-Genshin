<?php
/**
 * This file is the controller for the edit artifact page.
 * It handles the form submission for editing an artifact.
 * It validates the input data, updates the artifact in the database,
 * and redirects to the admin menu page.
 * It also handles the case where no form has been submitted,
 * in which case it displays the form for selecting an artifact to edit.
 */

session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){
    require_once "models/artifacts.php";

    // If both forms have been submitted
    if (isset($_POST['name']) && isset($_POST['rarity']) && isset($_POST['description']) && isset($_POST['id'])){

        require_once "utilities/validate.php";

        // Validate the artifact name
        $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûôî']+[a-zA-Zé]$/";
        $errorName = "Le nom du set d'artefacts doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";
        $name = validateTextField('name', $regexName, $errorName);

        // Validate the rarity
        if ($_POST['rarity'] !== '3' && $_POST['rarity'] !== '4' && $_POST['rarity'] !== '5') {
            $error = "La rareté choisie n'est pas valide.";
            include_once "views/error.php";
            exit;
        } else{
            $rarity = $_POST['rarity'];
        }

        $description = htmlspecialchars($_POST['description']);
        $id = htmlspecialchars($_POST['id']);

        $artifact = getArtifactById($id);

        // If we uploaded a new image
        if ($_FILES['thumbnail']['size'] !== 0){

            // Validate the file
            if (!validateEditFile('thumbnail')){
                exit;
            }

            // we must delete the old one then add the new one
            unlink($artifact['image']);
            $thumbnailPath = "assets/img/gallery/Artefacts_set/".$_FILES['thumbnail']['name'];
            
            if(!file_exists($thumbnailPath)){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
            }else{
                $error = "Le fichier existe déjà.";
                include_once "views/error.php";
                exit;
            }
        } else {
            $thumbnailPath = $artifact['image'];
        }
        $artifact = editArtifact($id, $name, $rarity, $description, $thumbnailPath);
        header("Location: admin-menu");
    }

    // the form for choosing the set to be edited has been submitted
    if (isset($_POST['artifact'])){

        $id = htmlspecialchars($_POST['artifact']);
        
        if(!checkExist('zell_artifacts','artifact_id', $id)){
            $error = "Erreur ! L'artéfact n'existe pas !!!";
            include_once "views/error.php";
            exit;
        }else{
            $artifact = getArtifactById($id);
            include_once "views/edit-artifact.php";
        }

    // If no form has been submitted
    }else{
        $artifacts = getAllArtifacts();
    
        include_once "views/edit-artifact.php";
    }
}else {
    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
<?php
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    if (isset($_POST['name']) && isset($_POST['rarity']) && isset($_POST['description']) && isset($_FILES['thumbnail'])){

        require_once "utilities/validate.php";

        // Validate the artifact name
        $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
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

        // Validate the description
        $description = htmlspecialchars($_POST['description']);

        // Validate the files
        if (!validateFile('thumbnail')){
            exit;
        }else{
            $thumbnailPath = "assets/img/gallery/Artefacts_set/".$_FILES['thumbnail']['name'];
            if (!file_exists($thumbnailPath)){
                // Save in database
                require_once "models/artifacts.php";
                $artifact = createArtifact($name, $rarity, $description, $thumbnailPath);

                // Then save the file in the good directory
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath);
                header("Location: admin-menu");
            } else {
                $error = "Le fichier existe déjà.";
                include_once "views/error.php";
                exit;
            }
        }

    } else{
        include_once "views/add-artifact.php";
    }
} else {
    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
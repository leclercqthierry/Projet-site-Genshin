<?php
/**
 * This file is the controller for the add-build page.
 * It handles the logic for displaying the form and processing the form submission.
 * It checks if the user is logged in and has the appropriate role (Administrator or Member).
 * If the user is not logged in or does not have the appropriate role, an error message is displayed.
 * If the first form is not submitted, it displays the form for selecting a character and an artifact.
 * Otherwise, it displays the second form for selecting a weapon.
 * If the second form is submitted, it validates the input and checks if the build already exists.
 * If the build does not exist, it creates a new build and redirects the user to the appropriate page.
 * Otherwise, an error message is displayed.
 */

session_start();

if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Administrator' || $_SESSION['role'] === 'Member')) {

    // If no form has been submitted yet.
    if(!isset($_POST['form'])){

        require_once "models/characters.php";
        require_once "models/artifacts.php";
    
        $characters = getAllCharacters();
        $artifacts = getAllArtifacts();
    
        include_once "views/add-build.php";

    }else{

        // If the first form was submitted
        if(isset($_POST['character']) && isset($_POST['artifact']) && isset($_POST['form'])){

            require_once "utilities/validate.php";

            // Validate the character and artifact selection
            $errorChar = 'Le choix du personnage est invalide!';
            $errorArt = "Le choix de l'artefact est invalide!";

            $_SESSION['character_id'] = validateSelect('character', $errorChar);
            $_SESSION['artifact_id'] = validateSelect('artifact', $errorArt);

            require_once "models/characters.php";
            require_once "models/weapons.php";

            $chosenChar = getCharacterById(($_SESSION['character_id']));

            // To only offer weapons that match the character's weapon type
            $weapons = getAllWeaponsOfType($chosenChar['weapon_type_id']);

            include_once "views/add-build.php";

        }elseif(isset($_POST['form']) && isset($_POST['weapon'])){ // The second form submitted

            require_once "utilities/validate.php";

            // Validate the weapon selection
            $errorMessage = "Le choix de l'arme est invalide!";

            $_SESSION['weapon_id'] = validateSelect('weapon', $errorMessage);

            require_once "models/builds.php";

            // We check if the build doesn't already exist
            if(getBuild($_SESSION['character_id'], $_SESSION['weapon_id'], $_SESSION['artifact_id'])){

                $error = 'Le build existe déjà.';
                include_once "views/error.php";
                exit;

            }else{

                // We can create the new build
                createBuild($_SESSION['character_id'], $_SESSION['weapon_id'], $_SESSION['artifact_id'], $_SESSION['user_id']);

                // we delete variables stored in session that have become useless
                unset($_SESSION['character_id']);
                unset($_SESSION['weapon_id']);
                unset($_SESSION['artifact_id']);

                header('Location: '.($_SESSION['role'] === 'Administrator' ? 'admin-menu' : 'member'));
            }

        }else{

            $error = "Veuillez remplir correctement le formulaire.";
            include_once "views/error.php";
            exit;
        }
    }
}else{

    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
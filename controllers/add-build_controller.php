<?php
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    // If no form has been submitted yet.
    if(!isset($_POST['form'])){

        require_once "models/characters.php";
        require_once "models/artifacts.php";
    
        $characters = getAllCharacters();
        $artifacts = getAllArtifacts();
    
        require_once "views/add-build.php";

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

            require_once "views/add-build.php";

        }elseif(isset($_POST['form']) && isset($_POST['weapon'])){ // The second form submitted

            require_once "utilities/validate.php";

            // Validate the weapon selection
            $errorMessage = "Le choix de l'arme est invalide!";

            $_SESSION['weapon_id'] = validateSelect('weapon', $errorMessage);

            require_once "models/builds.php";

            // We check if the build doesn't already exist
            if(getBuild($_SESSION['character_id'], $_SESSION['weapon_id'], $_SESSION['artifact_id'])){

                $error = 'Le build existe déjà.';
                require_once "views/error.php";
                exit;

            }else{

                // We can create the new build
                createBuild($_SESSION['character_id'], $_SESSION['weapon_id'], $_SESSION['artifact_id']);

                // we delete variables stored in session that have become useless
                unset($_SESSION['character_id']);
                unset($_SESSION['weapon_id']);
                unset($_SESSION['artifact_id']);
            }

        }else{

            $error = "Veuillez remplir correctement le formulaire.";
            require_once "views/error.php";
            exit;
        }
    }
}else{

    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
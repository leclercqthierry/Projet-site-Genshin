<?php
/**
 * This file is the controller for the delete build page.
 * It is only accessible to administrators. 
 * It allows the administrator to delete a build from the database.
 * The administrator can choose the character whose build he wants to delete, and then select the build to delete from a list of builds associated with that character.
 */

session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    // If no form has been submitted, we will propose the form to choose the character whose build we want to delete
    if (!isset($_POST['form'])){

        require_once "models/characters.php";

        $characters = getAllCharacters();

        include_once "views/delete-build.php";

    }else{

        // The admin has delete rights on all existing builds, so we start by choosing the character whose build we want to delete in order to limit the length of the list
        if ($_POST['form'] === "delete-build-char" && isset($_POST['character'])){

            require_once "utilities/validate.php";

            // Validate the character selection
            $errorMessage = "Le choix du personnage est invalide!";
            $characterId = validateSelect('character', $errorMessage);
            $_SESSION['character_id'] = $characterId;

            require_once "models/builds.php";
            require_once "models/weapons.php";
            require_once "models/artifacts.php";

            // We retrieve all builds with this character
            $builds = getAllBuildsByCharacterId($characterId);

            // We offer all the weapon/artifact pairs corresponding to the character in the list of builds
            $weapons = [];
            $artifacts = [];

            foreach ($builds as $build){
                $weapon = getWeaponById($build['weapon_id']);
                array_push($weapons, $weapon);
                $artifact = getArtifactById($build['artifact_id']);
                array_push($artifacts, $artifact);
            }

            include_once "views/delete-build.php";

        }else if(isset($_POST['build'])){

            $ids = explode("_", $_POST['build']);
            $weaponId = (int)($ids[0]);
            $artifactId = (int)($ids[1]);

            // We have the character, the weapon and the artifact set (so we have the corresponding build to delete)

            // We retrieve the corresponding build
            require_once "models/builds.php";
            $build_id = getBuild($_SESSION['character_id'], $weaponId, $artifactId)['build_id'];

            // We delete the build from the database
            deleteBuild($build_id);
            unset($_SESSION['character_id']);

            header('Location: admin-menu');
            exit;

        }else{
            $error = "Erreur lors de la suppression du build!";
            include_once "views/error.php";
        }
    }

}else{

    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
<?php
/**
 * This file is the controller for the edit build page.
 * It is used to edit a build of a character.
 */

session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    // If no form has been submitted, we will propose the form to choose the character whose build we want to edit
    if (!isset($_POST['form'])){

        require_once "models/characters.php";

        $characters = getAllCharacters();

        include_once "views/edit-build.php";

    }else{

        // The admin has edit rights on all existing builds, so we start by choosing the character whose build we want to edit in order to limit the length of the list
        if ($_POST['form'] === "edit-build-char" && isset($_POST['character'])){

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

            include_once "views/edit-build.php";

        }else if(isset($_POST['build'])){

            $ids = explode("_", $_POST['build']);
            $weaponId = (int)($ids[0]);
            $artifactId = (int)($ids[1]);

            // We have the character, the weapon and the artifact set (so we have the corresponding build to edit)

            // We retrieve the corresponding build
            require_once "models/builds.php";
            $_SESSION['build_id'] = getBuild($_SESSION['character_id'], $weaponId, $artifactId)['build_id'];

            require_once "models/characters.php";
            require_once "models/weapons.php";
            require_once "models/artifacts.php";

            // Now we have to offer the weapons authorized by the character
            $character = getCharacterById($_SESSION['character_id']);
            $allowedWeaponTypeId = $character['weapon_type_id'];
            $allowedWeapons = getAllWeaponsOfType($allowedWeaponTypeId);

            $artifacts = getAllartifacts();

            include_once "views/edit-build.php";

        }else if(isset($_POST['artifact']) && isset($_POST['weapon'])){

            // we have the character, the new weapon and artifact ids so we have all the values ​​to edit the build

            require_once "utilities/validate.php";

            $errorMessage = "Le choix de l'arme et/ou du set d'artéfacts est invalide!";
            $weaponId = validateSelect('weapon', $errorMessage);
            $artifactId = validateSelect('artifact', $errorMessage);
    
            require_once "models/builds.php";
            editBuild($_SESSION['character_id'], $weaponId, $artifactId, $_SESSION['build_id']);

            // Variables stored in the session that have become useless can be deleted.
            unset($_SESSION['character_id']);
            unset($_SESSION['build_id']);

            header("Location: admin-menu");
        }else{
            $error = "Erreur lors de l'édition du build!";
            include_once "views/error.php";
        }
    }

}else{

    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
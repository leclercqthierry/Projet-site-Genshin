<?php
/**
 * This file is the controller for the edit team page.
 * It handles the logic for editing a team, including selecting a team, editing its name,
 * editing the characters, and editing the builds.
 * It also handles the validation of the form inputs and the display of error messages.
 */

if(session_status() !== PHP_SESSION_ACTIVE || session_status() === PHP_SESSION_NONE){
    session_start();
} 

if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Administrator' || $_SESSION['role'] === 'Member')){

    // If no form has been submitted yet.
    if (count($_POST) === 0 || isset($_POST['edit-team'])){

        require_once "models/teams.php";

        if (count($_POST) === 0){
            $teams = getAllTeams();
        } else {
            $teams[] = getTeamById($_POST['edit-team']);
        }

    include_once "views/edit-team.php";

    }else {

        if (isset($_POST['form-name']) && $_POST['form-name'] === 'select-team-form' && isset($_POST['team'])) {

            require_once "utilities/validate.php";

            $teamId = validateSelect('team', 'Choix de la team invalide !');
            $_SESSION['teamId'] = $teamId;

            require_once "models/teams.php";

            $teamName = getTeamById($teamId)['name'];

            include_once "views/edit-team.php";

        }else if(isset($_POST['form-name']) && $_POST['form-name'] === 'edit-team-name' && isset($_POST['team-name'])){

            require_once "utilities/validate.php";

            $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûôî']+[a-zA-Zé]$/";
            $errorName = "Le nom doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";
            $teamName = validateTextField('team-name', $regexName, $errorName);
            $_SESSION['teamName'] = $teamName;

            require_once "models/builds.php";
            $teamBuilds = getBuildsByTeamId($_SESSION['teamId']);

            require_once "models/characters.php";
            foreach($teamBuilds as $build){
                $oldBuildIds[] = $build['build_id'];
                $teamCharacters[] = getCharacterById($build['character_id']);
            }
            $characters = getAllCharacters();
            $_SESSION['oldBuildIds'] = $oldBuildIds;

            include_once "views/edit-team.php";

        }else if(isset($_POST['form-name']) && $_POST['form-name'] === 'edit-chars' && isset($_POST['char1']) && isset($_POST['char2']) && isset($_POST['char3']) && isset($_POST['char4'])){

            require_once "utilities/validate.php";

            $errorMessage = "Valeur incorrecte de l'id du personnage";
            $char1Id = validateSelect('char1',$errorMessage);
            $char2Id = validateSelect('char2',$errorMessage);
            $char3Id = validateSelect('char3',$errorMessage);
            $char4Id = validateSelect('char4',$errorMessage);

            $ids = [$char1Id, $char2Id, $char3Id, $char4Id];

            // Check if the characters are differents
            if (count(array_unique($ids)) !== count($ids)){
                $error = "Les personnages doivent être differents.";
                include_once "views/error.php";
                exit;
            }

            $_SESSION['teamChars'] = $ids;

            require_once "models/builds.php";
            require_once "models/characters.php";
            require_once "models/weapons.php";
            require_once "models/artifacts.php";

            // For each character you must choose a build from their existing builds.

            $weaponsTeam = [];
            $artifactsTeam = [];
            $checkedTeam = [];
            for($i = 0; $i < 4; $i++){
                $builds = getAllBuildsByCharacterId($ids[$i]);
                if (count($builds) === 0){
                    $error = "Le personnage ". getCharacterById($ids[$i])['name']. " n'a aucun build.";
                    include_once "views/error.php";
                    exit;
                }
                // We offer all the weapon/artifact pairs corresponding to the character in the list of builds
                $weapons = [];
                $artifacts = [];
                $checkeds = [];
                foreach ($builds as $build){
                    $weapon = getWeaponById($build['weapon_id']);
                    array_push($weapons, $weapon);
                    $artifact = getArtifactById($build['artifact_id']);
                    array_push($artifacts, $artifact);

                    // if the builds match, set the checked attribute, otherwise nothing
                    $checked = $build['build_id'] === $_SESSION['oldBuildIds'][$i] ? "checked = checked" : '';
                    array_push($checkeds, $checked);
                }
                array_push($weaponsTeam, $weapons);
                array_push($artifactsTeam, $artifacts);
                array_push($checkedTeam, $checkeds);
            }

            // We return to the page to continue editing the team
            include_once "views/edit-team.php";

        }else if (isset($_POST['form-name']) && $_POST['form-name'] === 'edit-build' && isset($_POST['build0']) && isset($_POST['build1']) && isset($_POST['build2']) && isset($_POST['build3'])){

            require_once "models/builds.php";

            $teamBuildIds = [];

            for($j = 0; $j < 4; $j++){
                $ids = explode("_", $_POST['build'.$j]);
                $weaponId = (int)($ids[0]);
                $artifactId = (int)($ids[1]);
                $teamBuildId = getBuild($_SESSION['teamChars'][$j], $weaponId, $artifactId)['build_id'];
                array_push($teamBuildIds, $teamBuildId);
            }

            // We add the builds to the database

            require_once "models/teams.php";
            editTeam($_SESSION['teamName'], $_SESSION['oldBuildIds'], $teamBuildIds, $_SESSION['teamId']);
            unset($_SESSION['teamId']);
            unset($_SESSION['teamName']);
            unset($_SESSION['oldBuildIds']);
            unset($_SESSION['teamChars']);

            header('Location: '.($_SESSION['role'] === 'Administrator' ? 'admin-menu' : 'member'));
        }
    }

}else{
    $error = "Accès interdit!!";
    include_once "views/error.php";
    exit;
}
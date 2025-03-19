<?php
session_start();

if(isset($_SESSION['role']) && ($_SESSION['role'] === 'Administrator' || $_SESSION['role'] === 'Member')){

    $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûôî']+[a-zA-Zé]$/";
    $errorName = "Le nom doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";

    // If no form has been submitted yet
    if(!isset($_POST['form-name'])){

        include_once "views/add-team.php";

    }else{

        // If the team name creation form has been submitted
        if ($_POST['form-name'] === 'add-team-name'){

            require_once "utilities/validate.php";

            // Validate the team name
            $_SESSION['teamName'] = validateTextField('team-name', $regexName, $errorName);

            require_once "models/characters.php";

            $characters  = getAllCharacters();

            // We return to the page to continue creating the team
            include_once "views/add-team.php";
        }else{

            // The character selection form has been submitted.
            if ($_POST['form-name'] === 'add-chars'){
                
                if (isset($_POST['char1']) && isset($_POST['char2']) && isset($_POST['char3']) && isset($_POST['char4'])){

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
                    foreach ($ids as $id){
                        $builds = getAllBuildsByCharacterId($id);
                        if (count($builds) === 0){
                            $error = "Le personnage ". getCharacterById($id)['name']. " n'a aucun build.";
                            include_once "views/error.php";
                            exit;
                        }
                        // We offer all the weapon/artifact pairs corresponding to the character in the list of builds
                        $weapons = [];
                        $artifacts = [];
                        foreach ($builds as $build){
                            $weapon = getWeaponById($build['weapon_id']);
                            array_push($weapons, $weapon);
                            $artifact = getArtifactById($build['artifact_id']);
                            array_push($artifacts, $artifact);
                        }
                        array_push($weaponsTeam, $weapons);
                        array_push($artifactsTeam, $artifacts);
                    }

                    // We return to the page to continue creating the team
                    include_once "views/add-team.php";

                }else{
                    $error = "Erreur lors de la sélection des personnages.";
                    include_once "views/add-team.php";
                    exit;
                }
            }else if($_POST['form-name'] === 'add-build'){

                if (isset($_POST['build0']) && isset($_POST['build1']) && isset($_POST['build2']) && isset($_POST['build3'])){

                    require_once "models/builds.php";

                    $teamBuildsId = [];

                    for($j = 0; $j < 4; $j++){
                        $ids = explode("_", $_POST['build'.$j]);
                        $weaponId = (int)($ids[0]);
                        $artifactId = (int)($ids[1]);
                        $teamBuildId = getBuild($_SESSION['teamChars'][$j], $weaponId, $artifactId)['build_id'];
                        array_push($teamBuildsId, $teamBuildId);
                    }

                    // We add the builds to the database
                    require_once "models/teams.php";
                    
                    createTeam($_SESSION['teamName'], $teamBuildsId, $_SESSION['user_id']);
                    unset($_SESSION['teamName']);
                    unset($_SESSION['teamChars']);

                    header('location: '.($_SESSION['role'] === 'Administrator' ? 'admin-menu' :'member'));
                    
                }else {
                    $error = "Erreur lors de la sélection des builds.";
                    include_once "views/error.php";
                    exit;
                }

            }else{
                $error = "Erreur le nom du formulaire est incorrect.";
                include_once "views/error.php";
                exit;
            }
        }
    }
}else{
    $error = "Accès interdit!!";
    include_once "views/error.php";
    exit;
}
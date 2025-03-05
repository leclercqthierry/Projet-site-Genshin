<?php
session_start();

if($_SESSION['role'] === 'Administrator' || $_SESSION['role'] === 'Member'){

    $regexName = "/^[A-Z][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
    $errorName = "Le nom doit commencer par une majuscule et ne pas comporter de chiffres (caractères spéciaux autorisés: -, é, è, ê, ë, à, â, û, ô et ') et avoir au moins 3 lettres.";

    // If no form has been submitted yet
    if(!isset($_POST['form-name'])){

        require_once "views/add-team.php";
    }else{

        // If the team name creation form has been submitted
        if ($_POST['form-name'] === 'add-team-name'){

            require_once "utilities/validate.php";

            // Validate the team name
            $_SESSION['teamName'] = validateTextField('team-name', $regexName, $errorName);

            require_once "models/characters.php";

            $characters  = getAllCharacters();

            // We return to the page to continue creating the team
            require_once "views/add-team.php";
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
                        require_once "views/error.php";
                        exit;
                    }

                    $_SESSION['teamChars'] = $ids;

                    require_once "models/characters.php";
                    require_once "models/weapons.php";

                    // For each character I have to determine the type of weapon allowed
                    $allowedWeaponsByChar = [];
                    $charNames = [];
                    foreach ($ids as $id){
                        $character = getCharacterById($id);
                        $allowedWeaponTypeId = $character['weapon_type_id'];
                        $allowedWeapons = getAllWeaponsOfType($allowedWeaponTypeId);
                        array_push($allowedWeaponsByChar, $allowedWeapons);
                        array_push($charNames, $character['name']);
                    }

                    // We return to the page to continue creating the team
                    require_once "views/add-team.php";

                }else{
                    $error = "Erreur lors de la sélection des personnages.";
                    require_once "views/add-team.php";
                    exit;
                }
            }else if($_POST['form-name'] === 'add-weapons'){

                if (
                isset($_POST['weapon1']) && 
                isset($_POST['weapon2']) && 
                isset($_POST['weapon3']) && 
                isset($_POST['weapon4']) && 
                isset($_POST['char-name1']) && 
                isset($_POST['char-name2']) && 
                isset($_POST['char-name3']) && 
                isset($_POST['char-name4'])){

                    require_once "utilities/validate.php";

                    $errorMessage = "Valeur incorrecte de l'id de l'arme";
                    $weapon1Id = validateSelect('weapon1',$errorMessage);
                    $weapon2Id = validateSelect('weapon2',$errorMessage);
                    $weapon3Id = validateSelect('weapon3',$errorMessage);
                    $weapon4Id = validateSelect('weapon4',$errorMessage);

                    $_SESSION['teamWeapons'] = [$weapon1Id, $weapon2Id, $weapon3Id, $weapon4Id];
                    $charNames = 
                    [
                        htmlspecialchars($_POST['char-name1']),
                        htmlspecialchars($_POST['char-name2']),
                        htmlspecialchars($_POST['char-name3']),
                        htmlspecialchars($_POST['char-name4'])
                    ];

                    require_once "models/weapons.php";
                    require_once "models/artifacts.php";

                    $artifacts = getAllArtifacts();

                    // We return to the page to continue creating the team
                    require_once "views/add-team.php";
                }else {
                    $error = "Erreur lors de la sélection des armes.";
                    require_once "views/error.php";
                    exit;
                }
            }else if($_POST['form-name'] === 'add-artifacts'){
                
                if (isset($_POST['artifact1']) && isset($_POST['artifact2']) && isset($_POST['artifact3']) && isset($_POST['artifact4'])){

                    require_once "utilities/validate.php";

                    $errorMessage = "Valeur incorrecte de l'id de l'artefact";
                    $artifact1Id = validateSelect('artifact1',$errorMessage);
                    $artifact2Id = validateSelect('artifact2',$errorMessage);
                    $artifact3Id = validateSelect('artifact3',$errorMessage);
                    $artifact4Id = validateSelect('artifact4',$errorMessage);
                    
                    $teamArtifacts = [$artifact1Id, $artifact2Id, $artifact3Id, $artifact4Id];

                    // We have all the necessary information so we can create the team.

                    require_once "models/teams.php";
                    $error = $teamName;
                    require_once "views/error.php";
                    createTeam($_SESSION['teamName'], $_SESSION['teamChars'], $_SESSION['teamWeapons'], $teamArtifacts, $_SESSION['user_id']);

                    unset($_SESSION['teamName']);
                    unset($_SESSION['teamChars']);
                    unset($_SESSION['teamWeapons']);

                    header('location: '.($_SESSION['role'] === 'Administrator' ? 'admin-menu' : 'member'));
                }

            }else{
                $error = "Erreur le nom du formulaire est incorrect.";
                require_once "views/error.php";
                exit;
            }
        }
    }
}else{
    $error = "Accès interdit!!";
    require_once "views/error.php";
    exit;
}

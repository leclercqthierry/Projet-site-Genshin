<?php
/**
 * This file is the controller for the member page.
 * It handles the logic for displaying the member page and processing form submissions.
 * It checks if the user is logged in and has the role of 'Member'.
 * If the user is not logged in or does not have the correct role, it redirects them to the error page.
 * Otherwise it retrieves their teams and builds from the database and displays them on the member page.
 * It also handles form submissions for editing and deleting teams, as well as deleting the user's account.
 * If the form submission is for editing a team, it includes the edit-team_controller.php file to handle the logic for editing a team.
 * If the form submission is for deleting a team, it includes the delete-team_controller.php file to handle the logic for deleting a team.
 * If the form submission is for deleting the user's account, it calls the deleteUser function from the users model and destroys the session.
 */
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Member'){

    if(count($_POST) === 0){

        require_once "models/teams.php";
        require_once "models/builds.php";
        require_once "models/characters.php";
        require_once "models/common.php";

        $myTeams = getAllUserTeams($_SESSION['user_id']);
        
        for ($i = 0; $i < count($myTeams); $i++){
            $names[$i] = $myTeams[$i]['name'];
            $teamBuilds[$i] = getBuildsByTeamId($myTeams[$i]['team_id']); // 4 per team
            for($j = 0; $j < 4; $j++){
                $teamCharacters[$j] = getCharacterById($teamBuilds[$i][$j]['character_id']);
                $teamElement[$j] = getElementById(getCharacterById($teamBuilds[$i][$j]['character_id'])['element_id']);
            }
            $characters[$i] = $teamCharacters;
            $elements[$i] = $teamElement;
        }

        include_once "views/member.php";
    } else{

        if (isset($_POST['edit-team'])){

            require_once "controllers/edit-team_controller.php";

        }else if(isset($_POST['delete-team'])){

            require_once "controllers/delete-team_controller.php";

        }else if(isset($_POST['delete-account'])){

            require_once "models/users.php";
            deleteUser($_SESSION['user_id']);
            session_destroy();
            header("Location: index");

        }else{
            $error = "Action inconnue!";
            include_once "views/error.php";
            exit;
        }
    }

} else{
    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
<?php
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
        } else{
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
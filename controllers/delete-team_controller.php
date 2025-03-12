<?php
session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    // If no form has been submitted yet.
    if(count($_POST) === 0){

        require_once "models/teams.php";

        $teams = getAllTeams();

        include_once "views/delete-team.php";
    }else{

        if (isset($_POST['team'])){

            require_once "utilities/validate.php";

            $teamId = validateSelect('team','Sélection de la team invalide !');

            require_once "models/teams.php";

            deleteTeam($teamId);
            header('location: admin-menu');
        }
    }

}else{
    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
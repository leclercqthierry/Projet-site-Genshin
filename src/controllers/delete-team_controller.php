<?php
/**
 * This file is the controller for the delete team page.
 * It handles the form submission and displays the delete team page.
 */

if(session_status() !== PHP_SESSION_ACTIVE || session_status() === PHP_SESSION_NONE){
    session_start();
} 

if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Administrator' || $_SESSION['role'] === 'Member')){

    // If no form has been submitted yet.
    if (count($_POST) === 0 || isset($_POST['delete-team'])){

        require_once "models/teams.php";

        if (count($_POST) === 0){
            $teams = getAllTeams();
        } else {
            $teams[] = getTeamById($_POST['delete-team']);
        }

        include_once "views/delete-team.php";
    }else{

        if (isset($_POST['team'])){

            require_once "utilities/validate.php";

            $teamId = validateSelect('team','Sélection de la team invalide !');

            require_once "models/teams.php";

            deleteTeam($teamId);
            header('Location: '.($_SESSION['role'] === 'Administrator' ? 'admin-menu' : 'member'));
        }
    }

}else{
    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
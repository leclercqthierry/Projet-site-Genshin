<?php
session_start();

if ($_SESSION['role'] === 1){

    require_once "views/add-weapon.php";

} else{
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
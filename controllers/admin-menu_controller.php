<?php
session_start();

// If it's the admin
if ($_SESSION['role'] === 1){
    require_once "templates/sub_menu.php";
    require_once "views/admin-menu.php";
} else {
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
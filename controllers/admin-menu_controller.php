<?php
session_start();

// If it's the admin
if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){
    require_once "templates/sub_menu.php";
    require_once "views/admin-menu.php";
} else {
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
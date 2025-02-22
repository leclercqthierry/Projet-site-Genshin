<?php
session_start();

// The addition of resources being independent most of the time, we therefore process the forms independently.

if ($_SESSION['role'] === 1){
    require_once "templates/add-resources.php";
    require_once "views/add-resources.php";
} else {
    echo "Accès interdit !!";
}
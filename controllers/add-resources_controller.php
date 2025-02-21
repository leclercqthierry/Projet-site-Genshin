<?php
session_start();

if ($_SESSION['role'] === 1){
    require_once "templates/add-resources.php";
    require_once "views/add-resources.php";
} else {
    echo "Accès interdit !!";
}
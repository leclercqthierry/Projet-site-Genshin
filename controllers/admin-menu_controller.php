<?php
session_start();

if ($_SESSION['role'] === 1){
    require_once "views/admin-menu.php";
} else {
    echo "Accès interdit !!";
}
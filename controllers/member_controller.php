<?php
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Member'){
    require_once "views/member.php";
} else{
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
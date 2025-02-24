<?php
session_start();

if ($_SESSION['role'] === 2){
    require_once "views/member.php";
} else{
    $error = "Accès interdit !!";
    require_once "views/error.php";
    exit;
}
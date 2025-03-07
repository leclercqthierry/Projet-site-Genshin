<?php
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Member'){
    include_once "views/member.php";
} else{
    $error = "Accès interdit !!";
    include_once "views/error.php";
    exit;
}
<?php
session_start();

if (isset($_POST['nickname']) && isset($_POST['password'])){

    // Validate the nickname
    try{
        if (!preg_match("/^[\w\d]{4,}$/", $_POST['nickname'])){
            throw new Exception('Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!');
        } else {
            $nickname = htmlspecialchars($_POST['nickname']);
        }
    
    } catch (Exception $e) {
        $error = $e->getMessage();
        include_once "views/error.php";
        exit;
    }

    // Validate the password
    try{
        if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $_POST['password'])){
            throw new Exception('Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères');
        } else {
            $password = htmlspecialchars($_POST['password']);
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
        include_once "views/error.php";
        exit;
    }

    // Ready to compare with the BDD
    require "models/users.php";

    $user = getUser($nickname, $password);

    // We look at the user's role and redirect them to their page
    if ($user){
        switch ($user['role_id']){
            case 1: {
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['role'] = 'Administrator';
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: admin-menu");
                break;
            }
            case 2: {
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['role'] = 'Member';
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: member");
                break;
            }
            default: {
                $error = "Rôle inconnu."; 
                include_once "views/error.php";
                exit;
            }
        }
    } else{
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
        include_once "views/error.php";
        exit;
    }

} else {
    include_once "views/login.php";
}
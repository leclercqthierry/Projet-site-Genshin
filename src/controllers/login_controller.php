<?php
session_start();

if (isset($_POST['nickname']) && isset($_POST['password'])){

    require_once "utilities/validate.php";
    
    // Validate the nickname
    $nickname = validateTextField('nickname', "/^[\w\d]{4,}$/", 'Votre pseudo doit contenir au moins 4 caractères 
    alphanumériques sans espaces ni caractères spéciaux!');

    // Validate the password
    $password = validateTextField('password', "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", 'Le mot de passe doit 
    contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères!');

    // Ready to compare with the BDD
    require_once "models/users.php";

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
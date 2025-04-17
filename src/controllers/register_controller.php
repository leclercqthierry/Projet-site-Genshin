<?php
/**
 * This file is the controller for the registration page.
 * It handles the form submission, validates the input, and creates a new user in the database.
 */

if (isset($_POST['nickname']) && (isset($_POST['email'])) && isset($_POST['password'])){

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
    
    // Validate the email
    try{
        $tmp = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($tmp, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email est invalide.");
        } else {
            $email = filter_var($tmp, FILTER_VALIDATE_EMAIL);
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
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
        include_once "views/error.php";
        exit;
    }

    require_once "models/users.php";

    // check if the nickname is already taken
    if (checkExist("zell_users", "nickname", $nickname)){
        $error = "Ce pseudo est déjà utilisé.";
        include_once "views/error.php";
        exit;
    }

    // check if the email is already taken
    if (checkExist("zell_users", "email", $email)) {
        $error = "Cette adresse email est déjà utilisée.";
        include_once "views/error.php";
        exit;
    }

    // insert the new user as member into the database
    createUser($nickname, $email, $password);
    header("location: index");

} else {
    include_once "views/register.php";
}
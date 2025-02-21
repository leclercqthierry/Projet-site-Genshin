<?php

if (isset($_POST['nickname']) && (isset($_POST['email'])) && isset($_POST['password'])){

    // Validate the nickname
    try{
        if (!preg_match("/^[\w\d]{4,}$/", $_POST['nickname'])){
            throw new Exception('Votre pseudo doit contenir au moins 4 caractères alphanumériques sans espaces ni caractères spéciaux!');
        } else {
            $nickname = htmlspecialchars($_POST['nickname']);
        }
    
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
    
    // Validate the email
    try{
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email est invalide.");
        } else {
            $email = htmlspecialchars($_POST['email']);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
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
        echo $e->getMessage();
        exit;
    }

    require_once "models/register_model.php";
    echo "Vous avez créer votre compte avec succès !";

} else {
    require_once "views/register.php";
}
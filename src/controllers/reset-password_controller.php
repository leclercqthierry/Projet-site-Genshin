<?php
/**
 * This file is the reset password controller.
 * It handles the logic for resetting a user's password.
 */

if ((isset($_POST['email'])) && isset($_POST['password'])){
    
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

    require_once "models/users.php";

    // Vérifier si l'utilisateur existe
    $user = getUserByEmail($email);

    if ($user){
        // Validate the password
        try{
            if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $_POST['password'])){
                throw new Exception('Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères');
            } else {
                $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            include_once "views/error.php";
            exit;
        }
    }else{
        $error = "Aucun utilisateur trouvé avec cette adresse email.";
        include_once "views/error.php";
        exit;
    }

    updatePassword($email, $newPassword);
    header("location: index");

} else {
    include_once "views/reset-password.php";
}
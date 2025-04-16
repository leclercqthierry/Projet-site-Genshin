<?php

require_once "models/database.php";

// returns the user with the nickname $nickname and the password $password if it exists otherwise false
/**
 * returns the user with the nickname $nickname and the password $password if it exists otherwise false
 * @param string $nickname the nickname of the user
 * @param string $password the password of the user
 * @return array the user if it exists otherwise false 
 */
function getUser($nickname, $password){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE nickname = ?");
        $stmt->execute([$nickname]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['password']) ? $user : false;

    } catch (PDOException $e){
        $error =  "Erreur lors de la vérification de l'existence d'un utilisateur: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new user
 * @param string $nickname the nickname of the user
 * @param string $email the email address of the user
 * @param string $password the hashed password of the user
 */
function createUser($nickname, $email, $password){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_users (nickname, email, `password`, role_id) VALUES (?,?,?,?)");
        $stmt->execute([$nickname, $email, $password, 2]);
    } catch(PDOException $e){
        $error = "Echec lors la création de l'utilisateur: ". $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the user with the given id
 * @param int $id
 * @return array the corresponding user
 */
function getUserById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE user_id =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de l'utilisateur par id: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the user with the given email
 * @param string $email
 * @return array the corresponding user
 */
function getUserByEmail($email){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE email =?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de l'utilisateur par email: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

function updatePassword($email, $newPassword){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_users SET password = ? WHERE email = ?");
        $stmt->execute([$newPassword, $email]);
    } catch(PDOException $e){
        $error = "Erreur lors de la mise à jour du mot de passe: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
<?php

require_once "models/database.php";

// returns the user with the nickname $nickname and the password $password if it exists otherwise false
/**
 * @param string $nickname, $password
 */
function checkUser($nickname, $password){
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
 * @param string $nickname, $email, $password
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
 * @param int $id
 * @return array
 */
function getUserById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE user_id =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de l'utilisateur: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
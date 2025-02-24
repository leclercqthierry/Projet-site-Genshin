<?php

require_once "models/database.php";

// returns the user with the nickname $nickname and the password $password if it exists otherwise false
function checkUser($nickname, $password){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE nickname = ?");
        $stmt->execute([$nickname]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['password']) ? $user : false;

    } catch (PDOException $e){
        $error =  "Erreur lors de la vérification de l'existence d'un utilisateur: ".$e->getMessage();
        require_once "views/error.php";
        exit;
    }
}

$user = checkUser($nickname, $password);
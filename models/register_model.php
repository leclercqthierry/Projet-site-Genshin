<?php

require_once "models/database.php";

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
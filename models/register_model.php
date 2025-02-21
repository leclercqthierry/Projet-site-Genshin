<?php

require_once "models/database.php";

function createUser($nickname, $email, $password){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_users (nickname, email, `password`, role_id) VALUES (?,?,?,?)");
        $stmt->execute([$nickname, $email, $password, 2]);
    } catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
}

// check if the nickname is already taken
if (checkExist("zell_users", "nickname", $nickname)){
    echo "Ce pseudo est déjà utilisé.";
    exit;
}

// check if the email is already taken
if (checkExist("zell_users", "email", $email)) {
    echo "Cette adresse email est déjà utilisée.";
    exit;
}

// insert the new user as member into the database
createUser($nickname, $email, $password);
header("Location:index");
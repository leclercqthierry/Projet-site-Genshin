<?php

// Database connection
function getConnexion() {
    try {
        $dsn = "mysql:host=localhost;dbname=genshinteam;charset=utf8";
        $user = "Thierry";
        $pass = "Aubvu7k7";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        $error = "Erreur de connexion à la base de donnée: " . $e->getMessage();
        include_once "views/error.php";
        exit;
    }
}

/**
 * @param string $table
 * @param string $col
 * @param string $value
 * @return array
 */
// Check in $table if $value exists in $col
function checkExist($table, $col, $value){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE ".$col." =?");
        $stmt->execute([$value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de l'utilisation de la fonction checkExist: ".$e->getMessage();
        include_once "views/error.php";
        exit;
    }
}
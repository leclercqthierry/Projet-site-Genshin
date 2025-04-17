<?php
/**
 * This file contains all the functions related to the database
 * and the connection to it.
 */

/**
 * Database connexion
 */
function getConnexion() {
    try {
        $dsn = "mysql:host=mysql-container;dbname=genshinteam;charset=utf8";
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
 * Get the element in the given table, in the given column with the given value
 * @param string $table the table name
 * @param string $col the column name
 * @param string $value the value
 * @return array the element
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
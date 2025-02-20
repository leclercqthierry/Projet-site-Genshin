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
        echo "Erreur de connexion : " . $e->getMessage();
        exit;
    }
}
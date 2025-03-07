<?php

session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    require_once "models/weapons.php";

    if (isset($_POST['weapon'])){
        $id = htmlspecialchars($_POST['weapon']);

        // We delete the corresponding image then the artifact from the database
        $weapon = getWeaponById($id);
        unlink($weapon['image']);
        unlink($weapon['card']);
        
        deleteWeapon($id);
        header('Location: admin-menu');
        exit;
    }

    $weapons = getAllWeapons();
    include_once "views/delete-weapon.php";

} else {
    $error = "Accès interdit!!";
    include_once "views/error.php";
    exit;
}
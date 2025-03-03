<?php

session_start();

if ($_SESSION['role'] === 'Administrator') {

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
    require_once "views/delete-weapon.php";

} else {
    $error = "Accès interdit!!";
    require_once "views/error.php";
    exit;
}
<?php

session_start();

if ($_SESSION['role'] === 'Administrator') {

    require_once "models/characters.php";

    if (isset($_POST['character'])){
        $id = htmlspecialchars($_POST['character']);

        // We delete the corresponding image then the artifact from the database
        $character = getCharacterById($id);
        unlink($character['image']);
        unlink($character['card']);
        
        deleteCharacter($id);
        header('Location: admin-menu');
        exit;
    }

    $characters = getAllCharacters();
    require_once "views/delete-character.php";

} else {
    $error = "Accès interdit!!";
    require_once "views/error.php";
    exit;
}
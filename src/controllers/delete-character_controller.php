<?php
/**
 * This file is the controller for the delete character page.
 * It handles the deletion of a character from the database and the corresponding image file.
 */

session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    require_once "models/characters.php";

    if (isset($_POST['character'])){
        $id = htmlspecialchars($_POST['character']);

        // We delete the corresponding image then the artifact from the database
        $character = getCharacterById($id);
        unlink($character['image']);
        $cardPath = preg_replace('/(\.[^.]+)$/', '_w174$1', $character['card']);
        unlink($cardPath);
        
        deleteCharacter($id);
        header('Location: admin-menu');
        exit;
    }

    $characters = getAllCharacters();
    include_once "views/delete-character.php";

} else {
    $error = "Accès interdit!!";
    include_once "views/error.php";
    exit;
}
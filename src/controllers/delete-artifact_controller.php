<?php
/**
 * This file is the controller for the delete artifact page.
 * It handles the deletion of an artifact from the database and the file system.
 */

session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'Administrator'){

    require_once "models/artifacts.php";

    if (isset($_POST['artifact'])){
        $id = htmlspecialchars($_POST['artifact']);

        // We delete the corresponding image then the artifact from the database
        $artifact = getArtifactById($id);
        unlink($artifact['image']);
        
        deleteArtifact($id);
        header('Location: admin-menu');
        exit;
    }

    $artifacts = getAllArtifacts();
    include_once "views/delete-artifact.php";

} else {
    $error = "Accès interdit!!";
    include_once "views/error.php";
    exit;
}
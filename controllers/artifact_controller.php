<?php
session_start();

if (isset($_GET['id'])){

    $id = $_GET['id'];
    if (!is_numeric($id)){
        header('Location: 404');
        exit;
    }

    require_once "models/artifacts.php";

    $artifact = getArtifactById($id);
    $name = $artifact['name'];
    $image = $artifact['image'];
    $rarity = $artifact['rarity'];
    $description = $artifact['description'];

    include_once "views/artifact.php";
}else{
    header("location: 404");
}
<?php

// file validation function

/**
 * @param string $filename
 */
function validateFile($fileName){
    if ($_FILES[$fileName]['size'] === 0){
        $error = "L'image $fileName n'a pas été envoyé.";
        require_once "views/error.php";
        exit;
    } else if ($_FILES[$fileName]['size'] > 1048576){
        $error = "L'image $fileName est trop volumineuse. La taille maximum est de 1MB.";
        require_once "views/error.php";
        exit;
    } else {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'];
    
        if (!in_array($_FILES[$fileName]['type'], $allowedMimeTypes)) {
            $error = "L'image $fileName n'est pas au bon format";
            require_once "views/error.php";
            exit;
        } else{
            return true;
        }
    }
}
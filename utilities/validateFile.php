<?php

// file validation function
function validateFile($fileName){
    if ($_FILES[$fileName]['size'] === 0){
        echo "L'image $fileName n'a pas été envoyé.";
        return false;
    } else if ($_FILES[$fileName]['size'] > 1048576){
        echo "L'image $fileName est trop volumineuse. La taille maximum est de 1MB.";
        return false;
    } else {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'];
    
        if (!in_array($_FILES[$fileName]['type'], $allowedMimeTypes)) {
            echo "L'image $fileName n'est pas au bon format";
            return false;
        } else{
            return true;
        }
    }
}
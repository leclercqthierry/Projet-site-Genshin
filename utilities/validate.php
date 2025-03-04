<?php

/**
 * @param string $filename
 * @param string $regex
 * @param string $errorMessage
 * @return string
 */
function validateTextField($fieldName, $regex, $errorMessage){
    try{
        if (!preg_match($regex, $_POST[$fieldName])){
            throw new Exception($errorMessage);
        } else {
            $field = htmlspecialchars($_POST[$fieldName]);
        }
    
    } catch (Exception $e) {
        $error = $e->getMessage();
        require_once "views/error.php";
        exit;
    }
    return $field;
}

// file validation function

/**
 * @param string $filename
 * @return true
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

/**
 * @param string $filename
 * @return true
 */
function validateEditFile($fileName){
    if ($_FILES[$fileName] === null){
        return true;
    }else{
        if ($_FILES[$fileName]['size'] > 1048576){
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
}

function validateSelect($select, $errorMessage){
    if (!is_numeric($_POST[$select])){
        $error = $errorMessage;
        require_once "views/error.php";
        exit;
    } else {
        return $_POST[$select];
    }
}

/**
 * @param string $strName
 * @param string $strImage
 * @param string $directory
 * @return array
 */
function validateSimpleResource($strName, $strImage, $directory){

    // Validate the name
    $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
    $errorMessage = "Le nom ne doit pas commencer par un espace ni une majuscule (caractères -éèêëàûô' autorisés à l'intérieur).";
    $name = validateTextField($strName, $regex, $errorMessage);

    // Validate the image
    if (!validateFile($strImage)){
        exit;
    } else {
        $imagePath = "assets/img/".$directory."/".$_FILES[$strImage]['name'];
        if (!file_exists($imagePath)){
            // Save in database
            require_once "models/resources.php";

            // check if the object already exist
            if (checkExist("zell_".$directory."s", "name", $name) || checkExist("zell_".$directory."s", "image", $imagePath)){
                $error = "L'objet existe déjà.";
                require_once "views/error.php";
                exit;
            }

            // Then save the file in the good directory
            move_uploaded_file($_FILES[$strImage]['tmp_name'], $imagePath);
            header("Location: admin-menu");
        } else {
            $error = "Le fichier existe déjà.";
            require_once "views/error.php";
            exit;
        }
        return [$name, $imagePath];
    }
}

/** 
 * @param array $names
 * @param array $images
 * @param array $files
 * @param array $strNames
 * @param string $directory
 * @return array
 */
function validateMultipleResources($names, $images, $files, $strNames, $directory){
    $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
    $errorMessage = "Le nom ne doit pas commencer par un espace ni une majuscule (caractères -éèêëàûô' autorisés à l'intérieur).";

    // check if there are duplicates values
    if (count(array_unique($names))!= count($names)) {
        $error = "Les noms ne doivent pas être identiques.";
        require_once "views/error.php";
        exit;
    } else if (count(array_unique($files))!= count($files)){
        $error = "Les images doivent être differentes.";
        require_once "views/error.php";
        exit;
    }

    // Validate the names
    for ($i = 0; $i < count($names); $i++){
        $names[$i] = validateTextField($strNames[$i], $regex, $errorMessage);
    }
    
    // Validate the images
    $imagePaths = [];
    foreach ($images as $image){
        if (!validateFile($image)){
            exit;
        } else {
            $imagePath = "assets/img/".$directory."/".$_FILES[$image]['name'];
            if (file_exists($imagePath)){
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            } else {
                array_push($imagePaths, $imagePath);
            }
        }
    }

    require_once "models/database.php";

    // check if the objects already exist
    for ($i = 0; $i < count($images); $i++) {
        $j = $i + 1;
        if (checkExist("zell_".$directory."s", "name".$j, $names[$i]) || checkExist("zell_".$directory."s", "image".$j, $images[$i])){
            $error = "L'objet existe déjà.";
            require_once "views/error.php";
            exit;
        }
    }

    // Then save the file in the good directory
    for ($i = 0; $i < count($images); $i++) {
        move_uploaded_file($_FILES[$images[$i]]['tmp_name'], $imagePaths[$i]);
    }
    // header("Location: admin-menu");

    return array_merge($names, $imagePaths);
}

/**
 * @param string $strName
 * @param string $strImage
 * @param string $directory
 * @param array $resource
 * @return array
 */
function validateEditSimpleResource($strName, $strImage, $directory, $resource){

    // Validate the name
    $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
    $errorMessage = "Le nom ne doit pas commencer par un espace ni une majuscule (caractères -éèêëàûô' autorisés à l'intérieur).";
    $name = validateTextField($strName, $regex, $errorMessage);

    if($_FILES[$strImage]['size'] !== 0){

        // Validate the image
        if (!validateEditFile($strImage)){
            exit;
        }

        // we must delete the old one then add the new one
        unlink($resource['image']);
        $imagePath = "assets/img/".$directory."/".$_FILES[$strImage]['name'];

        if(!file_exists($imagePath)){
            move_uploaded_file($_FILES[$strImage]['tmp_name'],$imagePath);
        } else {
            $error = "Le fichier existe déjà.";
            require_once "views/error.php";
            exit;
        }
    }else{
        $imagePath = $resource['image'];
    }
    return [$name, $imagePath];
}

/** 
 * @param array $names
 * @param array $images
 * @param array $files
 * @param array $strNames
 * @param string $directory
 * @param array $resource
 * @return array
 */
function validateEditMultipleResources($names, $images, $files, $strNames, $directory, $resource){
    $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâûô']+[a-zA-Zé]$/";
    $errorMessage = "Le nom ne doit pas commencer par un espace ni une majuscule (caractères -éèêëàûô' autorisés à l'intérieur).";

    $isOneFileEmpty = false;
    for($i = 0; $i < count($files); $i++){
        if (fileEmpty($images[$i])){
            $isOneFileEmpty = true;
            break;
        }
    }

    // check if there are duplicates values
    if (count(array_unique($names))!= count($names)) {
        $error = "Les noms ne doivent pas être identiques.";
        require_once "views/error.php";
        exit;
    } else if (count(array_unique($files))!= count($files) && !$isOneFileEmpty){
        
        $error = "Les images doivent être differentes.";
        require_once "views/error.php";
        exit;
    }

    for ($i = 0; $i < count($names); $i++){

        // Validate the names
        $names[$i] = validateTextField($strNames[$i], $regex, $errorMessage);
    }

    $imagePaths = [];
    for ($i = 0; $i < count($images); $i++){
        $j = $i + 1;
        if ($_FILES[$images[$i]]['size'] !== 0){

            // Validate the image
            if (!validateEditFile($images[$i])){
                exit;
            }

            // we must delete the old one then add the new one
            unlink($resource['image'.$j]);
            $imagePath = "assets/img/".$directory."/".$_FILES[$images[$i]]['name'];

            if(!file_exists($imagePath)){
                move_uploaded_file($_FILES[$images[$i]]['tmp_name'],$imagePath);
            } else {
                $error = "Le fichier existe déjà.";
                require_once "views/error.php";
                exit;
            }
        }else {
            $imagePath = $resource['image'.$j];
        }
        array_push($imagePaths, $imagePath);
    }

    require_once "models/database.php";

    // check if the objects already exist
    for ($i = 0; $i < count($images); $i++) {
        $j = $i + 1;
        if (checkExist("zell_".$directory."s", "name".$j, $names[$i]) || checkExist("zell_".$directory."s", "image".$j, $images[$i])){
            $error = "L'objet existe déjà.";
            require_once "views/error.php";
            exit;
        }
    }

    return array_merge($names, $imagePaths);
}

function fileEmpty($file){
    return $_FILES[$file]['size'] === 0;
}
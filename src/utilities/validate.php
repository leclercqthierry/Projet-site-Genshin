<?php

/**
 * Validates a text field
 * @param string $fieldname the name of the field to be validated
 * @param string $regex the regular expression to match against
 * @param string $errorMessage the error message
 * @throws exception with the error message
 * @return string the validated field
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

/**
 * File validation function
 * @param string $filename the name of the field to be validated
 * @return true if the file is valid
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
 * File validation function when editing
 * @param string $filename the name of the file to be validated
 * @return true if validation succeeded
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

/**
 * Validation function of a select, here we verify if the value is a number
 * @param string $select the value of the select that was submitted
 * @param string $errorMessage the error message
 * @return int
 */
function validateSelect($select, $errorMessage){
    if (!is_numeric($_POST[$select])){
        $error = $errorMessage;
        require_once "views/error.php";
        exit;
    } else {
        return (int)$_POST[$select];
    }
}

/**
 * Validates data submitted by a simple resource form
 * @param string $strName the name of the resource to validate
 * @param string $strImage the image of the image to validate
 * @param string $directory the directory where the image will be saved
 * @return array the array that contains the validated name and directory
 */
function validateSimpleResource($strName, $strImage, $directory){

    // Validate the name
    $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâûôî']+[a-zA-Zé]$/";
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
 * Validates data submitted by a multiple resources form
 * @param array $names an array of names of the resources
 * @param array $images an array of filenames of the images
 * @param array $files the files to upload
 * @param array $strNames the names of the text fields in the form
 * @param string $directory the directory where the images will be saved
 * @return array an array of the names of the resources validated and the paths of the images to save
 */
function validateMultipleResources($names, $images, $files, $strNames, $directory){
    $regex = "/^[a-zéèê][a-zA-Z \-éèêëàâûôî']+[a-zA-Zé]$/";
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

    return array_merge($names, $imagePaths);
}

/**
 * Validates data submitted by a simple resource form when editing
 * @param string $strName the name of the text field to be validated
 * @param string $strImage the name of the image to be validated
 * @param string $directory the directory where the image should be saved
 * @param array $resource an array witch contains the resource informations
 * @return array an array of the name of the resource and the file path of the image corresponding
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
 * Validates data submitted by a multiple resources form when editing
 * @param array $names an array of names of the resources
 * @param array $images an array of filenames of the images
 * @param array $files the files to upload
 * @param array $strNames the names of the text fields in the form
 * @param string $directory the directory where the images will be saved
 * @param array $resource an array witch contains the resource informations
 * @return array an array of the names of the resources validated and the paths of the images to save
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

/**
 * Determines whether a file is empty or not
 * @param string $file the file name
 * @return boolean whether the file is empty or not
 */
function fileEmpty($file){
    return $_FILES[$file]['size'] === 0;
}
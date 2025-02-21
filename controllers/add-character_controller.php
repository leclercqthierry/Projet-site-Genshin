<?php
session_start();

// file validation function
function validateFile($fileName){
    if ($_FILES[$fileName]['size'] === 0){
        echo "L'image $fileName n'a pas été envoyé.";
    } else if ($_FILES[$fileName]['size'] > 1048576){
        echo "L'image $fileName est trop volumineuse. La taille maximum est de 1MB.";
    } else {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'];
    
        if (!in_array($_FILES[$fileName]['type'], $allowedMimeTypes)) {
            echo "L'image $fileName n'est pas au bon format";
        }
    }
}

if (isset($_POST['name']) && 
    isset($_POST['element']) &&
    isset($_POST['weapon']) &&
    isset($_POST['rarity']) &&
    isset($_POST['bonus']) &&
    isset($_POST['farm-days']) &&
    isset($_FILES['card']) &&
    isset($_FILES['thumbnail']) &&
    isset($_FILES['boss-mat']) &&
    isset($_FILES['local-mat']) &&
    isset($_FILES['wb-mat']) &&
    isset($_FILES['mob-mat-r1']) &&
    isset($_FILES['mob-mat-r2']) &&
    isset($_FILES['mob-mat-r3']) &&
    isset($_FILES['dj-mat-r2']) &&
    isset($_FILES['dj-mat-r3']) &&
    isset($_FILES['dj-mat-r4'])) {

        // Validate the character name
        try{
            if (!preg_match("/^[A-Z][a-zA-Z -éèê]+\S$/", $_POST['name'])){
                throw new Exception('Le nom du personnage doit commencer par une majuscule et ne pas comporter ni chiffres ni caractères spéciaux (sauf é, è ou ê) et avoir au moins 2 lettres.');
            } else {
                $name = htmlspecialchars($_POST['name']);
            }
        
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        
        // Validate the element
        if (!in_array($_POST['element'], ['anemo','geo','electro','dendro','hydro','pyro','cryo'])) {
            echo "élément invalide.";
        }
        
        // Validate the weapon
        if (!in_array($_POST['weapon'], ['sword','claymore','bow','polearm','catalyst'])) {
            echo "Arme invalide.";
        }
        
        // Validate the rarity
        if ($_POST['rarity'] !== '4' && $_POST['rarity'] !== '5') {
            echo "Rareté invalide.";
        }
        
        // Validate the bonus
        if (!in_array($_POST['bonus'], ['atq','def','pv','dgt-anemo','dgt-geo','dgt-electro','dgt-dendro','dgt-hydro','dgt-pyro','dgt-cryo','dgt-phy','crit-rate','crit-dgt', 're', 'me', 'heal'])) {
            echo "Bonus invalide.";
        }
        
        // Validate the farm-days
        if (!in_array($_POST['farm-days'], ['mo-th-su','tu-fr-su','we-sa-su'])) {
            echo "Jours de farm invalides.";
        }

        // Validate the file types
        validateFile('card');
        validateFile('thumbnail');
        validateFile('boss-mat');
        validateFile('local-mat');
        validateFile('wb-mat');
        validateFile('mob-mat-r1');
        validateFile('mob-mat-r2');
        validateFile('mob-mat-r3');
        validateFile('dj-mat-r2');
        validateFile('dj-mat-r3');
        validateFile('dj-mat-r4');

        require_once "models/add-character_model.php";

}else {
    require_once "views/add-character.php";
}
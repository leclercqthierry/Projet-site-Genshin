<?php
function extractNameString(String $fileName){
        // on extrait les sous-chaines délimitées par /, on inverse le tableau obtenu et prend le premier élément (on obtient le fichier avec l'extension))
        $tmp = array_reverse(explode('/', $fileName))[0];
        // on extrait cette fois les sous-chaines délimitées par . 
        return explode('.', $tmp)[0];
}

function extractNameArray(Array $array){
        // on appelle la fonction extractNameString pour chaque élément du tableau
        return array_map('extractNameString', $array);
}
?>
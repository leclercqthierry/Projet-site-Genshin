<?php

/**
 * @param String $controller, $title
 * @param Array $names, $images
 * @return String $html
 */
function addResourceForm($title, $controller, $names, $images){
    $html ='
    <div class="container">
        <h2>Ajout '.$title.'</h2>
        <i class="fa-solid fa-chevron-down"></i>
        <form action="'.$controller.'" method="post" enctype="multipart/form-data">';
    for ($i = 0; $i < count($names); $i++){
        $html .= '
            <div class="form-label">
                <label for="'.$names[$i].'">Nom</label>
                <input type="text" id="'.$names[$i].'" name="'.$names[$i].'">
            </div>
            <div class="form-label">
                <fieldset>
                    <legend>Image</legend>
                    <input type="file" id="'.$images[$i].'" name="'.$images[$i].'" accept="image/*">
                </fieldset>
            </div>';
    }
    $html.= '         
            <button type="submit" class="btn">Ajouter</button>
        </form>
    </div>';
    return $html;
}
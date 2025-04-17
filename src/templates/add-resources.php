<?php
/**
 * This file contains templates for the add resources page.
 * It contains the following functions:
 * - addSimpleResourceForm: template for the simple resource form to add
 * - addMultiplesResourcesForm: template for the multiple resources form to add
 */

/**
 * Template for the simple resource form to add
 * @param string $title title of the resource form
 * @param string $name name of the resource
 * @param string $image name of the image file
 * @return string the template to be used with an echo
 */
function addSimpleResourceForm($title, $name, $image){
    $html ='
    <div class="container">
        <h2>Ajout '.$title.'</h2>
        <i class="fa-solid fa-chevron-down"></i>
        <form action="add-resources" method="post" enctype="multipart/form-data">
            <div class="form-label">
                <label for="'.$name.'">Nom</label>
                <input type="text" id="'.$name.'" name="'.$name.'" aria-required="true">
            </div>
            <div class="form-label">
                <fieldset>
                    <legend>Image</legend>
                    <input type="file" id="'.$image.'" name="'.$image.'" accept="image/*" aria-required="true">
                </fieldset>
            </div>
            <button type="submit" class="btn">Ajouter</button>
        </form>
    </div>';
    return $html;
}

/**
 * Template for the multiple resources form to add
 * @param string $title title of the resource form
 * @param array $names names of the resources
 * @param array $images names of the image files
 * @return string the template to be used with an echo
 */
function addMultiplesResourcesForm($title, $names, $images){
    $html ='
    <div class="container">
        <h2>Ajout '.$title.'</h2>
        <i class="fa-solid fa-chevron-down"></i>
        <form action="add-resources" method="post" enctype="multipart/form-data">
            <div class="form-label">
                <label for="category">Catégorie</label>
                <input type="text" id="category" name="category" aria-required="true">
            </div>';
    for ($i = 0; $i < count($names); $i++){
        $html .= '
            <div class="form-label">
                <label for="'.$names[$i].'">Nom</label>
                <input type="text" id="'.$names[$i].'" name="'.$names[$i].'" aria-required="true">
            </div>
            <div class="form-label">
                <fieldset>
                    <legend>Image</legend>
                    <input type="file" id="'.$images[$i].'" name="'.$images[$i].'" accept="image/*" aria-required="true">
                </fieldset>
            </div>';
    }
    $html.= '         
            <button type="submit" class="btn">Ajouter</button>
        </form>
    </div>';
    return $html;
}
<?php
/**
 * This file contains templates for the edit resources page.
 * It contains the following functions:
 * - editSimpleResourceForm: template for the simple resource form to edit
 * - editMultiplesResourcesForm: template for the multiple resources form to edit
 */

/**
 * Template for the simple resource form to edit
 * @param string $title title of the resource form
 * @param string $name name of the resource
 * @param string $image name of the image file
 * @param array $resource array of the resource informations
 * @param string $resource_id id of the resource in the database
 * @return string the template to be used with an echo
 */
function editSimpleResourceForm($title, $name, $image, $resource, $resource_id){
    $html ='
    <h2>Edition '.$title.'</h2>
    <form action="edit-resources" name ="edit-resource-form" method="post" enctype="multipart/form-data">
        <div class="form-label">
            <label for="'.$name.'">Nom</label>
            <input type="text" id="'.$name.'" name="'.$name.'" value="'.$resource['name'].'" aria-required="true">
            <input type="hidden" name="id" value="'.$resource_id.'">
        </div>
        <div class="form-label">
            <fieldset>
                <legend>Image</legend>
                <input type="file" id="'.$image.'" name="'.$image.'" accept="image/*" aria-required="true">
                <img src="'.$resource['image'].'" alt="'.$resource['name'].'">
            </fieldset>
        </div>
        <button type="submit" class="btn">Ajouter</button>
    </form>';
    return $html;
}

/**
 * Template for the multiple resources form to edit
 * @param string $title title of the resource form
 * @param array $names names of the resources
 * @param array $images names of the image file
 * @param array $resource array of the resource informations
 * @param string $resource_id id of the resource in the database
 * @return string the template to be used with an echo
 */
function editMultiplesResourcesForm($title, $names, $images, $resource, $resource_id){
    $html ='
    <h2>Ajout '.$title.'</h2>
    <form action="edit-resources" name ="edit-resource-form" method="post" enctype="multipart/form-data">
        <div class="form-label cat">
            <label for="category">Catégorie</label>
            <input type="text" id="category" name="category" value="'.$resource['category'].'" aria-required="true">
            <input type="hidden" name="id" value="'.$resource_id.'">
        </div>
        <div class="resource-container">';
    for ($i = 0; $i < count($names); $i++){
        $j = $i + 1;
        $html .= '
            <div>
                <div class="form-label">
                    <label for="'.$names[$i].'">Nom</label>
                    <input type="text" id="'.$names[$i].'" name="'.$names[$i].'" value="'.$resource['name'.$j].'" aria-required="true">
                </div>
                <div class="form-label">
                    <fieldset>
                        <legend>Image</legend>
                        <input type="file" id="'.$images[$i].'" name="'.$images[$i].'" accept="image/*" aria-required="true">
                        <img src="'.$resource['image'.$j].'" alt="'.$resource['name'.$j].'">
                    </fieldset>
                </div>
            </div>';
    }
    $html.= '
        </div>
        <div class="submit-container">
            <button type="submit" class="btn">Ajouter</button>
        </div>
    </form>';
    return $html;
}
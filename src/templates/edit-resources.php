<?php

/**
 * @param string $title, $names, $images, $resource_id
 * @param array $resource
 * @return string $html
 */
function editSimpleResourceForm($title, $name, $image, $resource, $resource_id){
    $html ='
    <h2>Edition '.$title.'</h2>
    <form action="edit-resources" name ="edit-resource-form" method="post" enctype="multipart/form-data">
        <div class="form-label">
            <label for="'.$name.'">Nom</label>
            <input type="text" id="'.$name.'" name="'.$name.'" value="'.$resource['name'].'">
            <input type="hidden" name="id" value="'.$resource_id.'">
        </div>
        <div class="form-label">
            <fieldset>
                <legend>Image</legend>
                <input type="file" id="'.$image.'" name="'.$image.'" accept="image/*">
                <img src="'.$resource['image'].'" alt="'.$resource['name'].'">
            </fieldset>
        </div>
        <button type="submit" class="btn">Ajouter</button>
    </form>';
    return $html;
}

/**
 * @param string $controller, $title
 * @param array $names, $images
 * @return string $html
 */
function editMultiplesResourcesForm($title, $names, $images, $resource, $resource_id){
    $html ='
    <h2>Ajout '.$title.'</h2>
    <form action="edit-resources" name ="edit-resource-form" method="post" enctype="multipart/form-data">
        <div class="form-label cat">
            <label for="category">Catégorie</label>
            <input type="text" id="category" name="category" value="'.$resource['category'].'">
            <input type="hidden" name="id" value="'.$resource_id.'">
        </div>
        <div class="resource-container">';
    for ($i = 0; $i < count($names); $i++){
        $j = $i + 1;
        $html .= '
            <div>
                <div class="form-label">
                    <label for="'.$names[$i].'">Nom</label>
                    <input type="text" id="'.$names[$i].'" name="'.$names[$i].'" value="'.$resource['name'.$j].'">
                </div>
                <div class="form-label">
                    <fieldset>
                        <legend>Image</legend>
                        <input type="file" id="'.$images[$i].'" name="'.$images[$i].'" accept="image/*">
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
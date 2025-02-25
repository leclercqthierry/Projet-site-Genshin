<?php

/**
 * @param string $title, $action
 */
function subMenu($title, $action){
    $html = '
    <div class="container">
        <h2>'.$title.'</h2>
        <i class="fa-solid fa-chevron-down"></i>
        <div class="link-container">
            <a href="'.$action.'-resources">Ressources</a>
            <a href="'.$action.'-character">Personnage</a>
            <a href="'.$action.'-weapon">Arme</a>
            <a href="'.$action.'-artifact">Artefact</a>
            <a href="'.$action.'-team">Team</a>
        </div>
    </div>';
    return $html;
}
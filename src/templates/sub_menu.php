<?php
/**
 * This file contains a template for the admin side submenu.
 */

/**
 * Admin side submenu template
 * @param string $title title of the menu section
 * @param string $action action to perform when selected
 * @return string template to be used with an echo
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
            <a href="'.$action.'-build">Build</a>
            <a href="'.$action.'-team">Team</a>
        </div>
    </div>';
    return $html;
}
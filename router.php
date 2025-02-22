<?php

/* We use a .htaccess file because otherwise we will have to go through GET or POST and the Google robot will only see one page: index.php and all the links that redirect to it, which will penalize in terms of SEO */

$path = $_SERVER['REDIRECT_URL'];

if ($path === '/GenshinTeam/' || $path === '/GenshinTeam/index'){
    require_once "controllers/index_controller.php";
} else {

    // we retrieve the name of the route to determine its controller
    $path = explode("/GenshinTeam/", $path)[1];
    $controller = 'controllers/' . $path . '_controller.php';

    // we load the corresponding controller if it exists otherwise we return to a 404 page
    if (file_exists($controller)){
        require_once $controller;
    } else 
    require_once "controllers/404_controller.php";
}
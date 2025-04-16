<?php

/* We use a .htaccess file because otherwise we will have to go through GET or POST and the Google robot will only see one page: index.php and all the links that redirect to it, which will penalize in terms of SEO */

$path = $_SERVER['REDIRECT_URL'];

if ($path === '/' || $path === '/index'){

    require_once "controllers/index_controller.php";

}else if($path === '/character.php'){

    require_once "controllers/character_controller.php";

}else if($path === '/weapon.php'){

    require_once "controllers/weapon_controller.php";
}else if($path === '/artifact.php'){

    require_once "controllers/artifact_controller.php";
}else if($path === '/team.php'){

    require_once "controllers/team_controller.php";
}else if ($path === '/builds.php'){

    require_once "controllers/builds_controller.php";
}else if ($path === '/robots.txt'){

    include_once "robots.txt";
}else if ($path === '/legal_notices.php'){

    include_once "views/legal_notices.php";
}else {

    // we retrieve the name of the route to determine its controller
    $path = explode("/", $path)[1];
    $controller = 'controllers/' . $path . '_controller.php';

    // we load the corresponding controller if it exists otherwise we return to a 404 page
    if (file_exists($controller)){
        require_once $controller;
    } else 
    require_once "controllers/404_controller.php";
}
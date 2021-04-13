<?php

require_once 'autoload.php';

use Controller\CreateIngredientController;
use Controller\ListIngredientController;

//on determine l'url demandé
$uri = $_SERVER['REQUEST_URI'];

//on instancie le controller qui correspond à notre URL
if($uri == "/createIngredient"){
    $controller = new CreateIngredientController();
}
elseif($uri == "/listIngredient"){
    $controller = new ListIngredientController();
}
else{
    throw new Exception('404 not found');
}

$controller->execute();

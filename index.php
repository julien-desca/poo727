<?php

require_once 'autoload.php';
session_start();

use Controller\CreateIngredientController;
use Controller\CreatePizzaController;
use Controller\DeleteIngredientController;
use Controller\ListIngredientController;
use Controller\ListPizzaController;
use Controller\DetailPizzaController;
use Controller\DeletePizzaController;

//on determine l'url demandé
$uri = $_SERVER['REQUEST_URI'];
//on instancie le controller qui correspond à notre URL
if($uri == "/createIngredient"){
    $controller = new CreateIngredientController();
}
elseif($uri == "/listIngredient"){
    $controller = new ListIngredientController();
}
elseif($uri == "/createPizza"){
    $controller = new CreatePizzaController();
}
elseif($uri == "/listPizza"){
    $controller = new ListPizzaController();
}
elseif(explode("?", $uri)[0] == "/detailPizza"){
    $controller = new DetailPizzaController();
}
elseif(explode("?", $uri)[0] == "/deletePizza"){
    $controller = new DeletePizzaController();
}
elseif(explode("?", $uri)[0] == "/deleteIngredient"){
    $controller = new DeleteIngredientController();
}
else{
    throw new Exception('404 not found');
}

$controller->execute();

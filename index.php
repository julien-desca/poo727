<?php

use DAO\IngredientDAO;

require_once 'autoload.php';


$ingredientDAO = new IngredientDAO();
//$ingredients = $ingredientDAO->getAll();
$ingredients = $ingredientDAO->getById(1);

var_dump($ingredients);
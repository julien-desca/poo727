<?php

use DAO\IngredientDAO;
use Entity\Ingredient;

require_once 'autoload.php';


$ingredient = new Ingredient();
$ingredient->setName("Ananas");
$ingredient->setIsAllergen(1);

$ingredientDAO = new IngredientDAO();
$lastInsertId = $ingredientDAO->create($ingredient);
echo "ingredient $lastInsertId enregistré";
//$ingredients = $ingredientDAO->getAll();
/*try{
    $ingredients = $ingredientDAO->getById(98);
    var_dump($ingredients);
}
catch(Exception $e){
    echo "404 not found <br/>" ;
    echo "exception à la ligne: " . $e->getFile() . " : " $e->getLine() ;
}
*/
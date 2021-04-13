<?php 

namespace Controller;

use DAO\IngredientDAO;

class ListIngredientController{

    public function execute(){
        $dao = new IngredientDAO();
        $listIngredient = $dao->getAll();
        $_SESSION['listIngredient'] = $listIngredient;
        include ('View/listIngredient.php');
    }
}
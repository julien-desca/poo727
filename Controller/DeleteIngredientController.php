<?php 

namespace Controller;

use DAO\IngredientDAO;

class DeleteIngredientController{

    public function execute(){
        $ingredientId = $_GET['id'];
        $ingredientDao = new IngredientDAO();
        $ingredientDao->delete($ingredientId);

        header("location: /listIngredient");
    }
}
<?php

namespace Controller;

use DAO\IngredientDAO;
use Entity\Ingredient;

/**
 * Class appelé lors de la demande de l'URL /createIngredient
 */
class CreateIngredientController{

    public function execute(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){ //requete GET ou requete POST
            //afficher la vue
            $this->doGet();
        }
        else{
            //traiter les données postés
            $this->doPost();
        }
    }

    private function doGet(){
        include "View/createIngredient.php";
    }

    private function doPost(){
        $datas = $_POST;
        $ingredient = new Ingredient();
        $ingredient->setName($datas['name']);
        $ingredient->setIsAllergen(array_key_exists('isAllergen', $datas));
        $dao = new IngredientDAO();
        $dao->create($ingredient);

        echo "Ingredient crée";
    }
}
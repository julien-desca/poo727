<?php

namespace Controller;

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

    }
}
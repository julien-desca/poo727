<?php

namespace Controller;

use DAO\IngredientDAO;
use DAO\PizzaDAO;

class DetailPizzaController{

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
        //recuperer la pizza
        $pizzaid = $_GET['id']; //on recupere l'id demandé
        $pizzaDao = new PizzaDAO();
        $pizza = $pizzaDao->getById($pizzaid);

        $ingredientDao = new IngredientDAO();
        $listIngredients = $ingredientDao->getAll();//recuperer nos ingredients 

        $_SESSION['pizza'] = $pizza;
        $_SESSION['listIngredients'] = $listIngredients;

        include 'View/detailPizza.php';
    }

    private function doPost(){
        $pizzaId = $_GET['id'];
        $ingredients = $_POST['ingredient'];

        $pizzaDao = new PizzaDAO();
        $pizzaDao->updateIngredient($pizzaId, $ingredients);

        header("location: /detailPizza?id=$pizzaId");
    }
}
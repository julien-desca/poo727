<?php

namespace Controller;

use DAO\PizzaDAO;

class DeletePizzaController{

    public function execute(){
        $pizzaId = $_GET['id'];
        $pizzaDao = new PizzaDAO();
        $pizzaDao->delete($pizzaId);

        header("location: /listPizza");
    }
}
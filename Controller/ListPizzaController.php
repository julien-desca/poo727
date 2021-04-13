<?php

namespace Controller;

use DAO\PizzaDAO;

class ListPizzaController{
    
    public function execute(){
        $dao = new PizzaDAO();
        $pizzaList = $dao->getAll();
        $_SESSION['listPizza'] = $pizzaList;
        include 'View/listPizza.php';
    }
}
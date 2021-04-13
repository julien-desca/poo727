<?php 

namespace Controller;

use DAO\PizzaDAO;
use Entity\Pizza;

class CreatePizzaController{

    public function execute(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $this->doGet();
        }
        else{
            $this->doPost();
        }
    }

    private function doGet(){
        include ('View/createPizza.php');
    }

    private function doPost(){
        $datas = $_POST;
        $pizza = new Pizza();
        $pizza->setName($datas['name']);

        $dao = new PizzaDAO();
        $dao->create($pizza);

        echo "pizza créée";

    }
}
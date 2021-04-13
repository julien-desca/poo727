<?php

namespace DAO;

use Entity\Pizza;
use Exception;
use PDO;

class PizzaDAO{

    /**
     * @var PDO
     */
    private $pdo;
    
    public function __construct()
    {
        try{
            $this->pdo = 
            new PDO(
                "mysql:dbname=formationPoo;host=127.0.0.1",
                "dolibarr",
                "password"
            );
        }
        catch(Exception $e){
            var_dump($e);die();
        }
    }
    
    public function create(Pizza $pizza){
        try{
            $sql = "INSERT INTO pizza (name) VALUE (?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$pizza->getName()]);
            return $this->pdo->lastInsertId();
        }catch(Exception $e){
            var_dump($e);die;
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM pizza";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $this->dataTransform($result);
    }

    private function dataTransform(array $dbResult){
        $pizzas = [];
        foreach($dbResult as $result){
            $pizza = new Pizza();
            $pizza->setId($result['id']);
            $pizza->setName($result['name']);
            $pizzas[] = $pizza;
        }
        return $pizzas;
    }
}
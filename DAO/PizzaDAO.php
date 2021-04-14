<?php

namespace DAO;

use Entity\Ingredient;
use Entity\Pizza;
use DAO\IngredientDAO;
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

    /**
     * Recupere une pizza par id
     */
    public function getById_avecJointure(int $id){
        $sql = "SELECT 
                pizza.id, pizza.name,
                ingredient.id as id_ingredient, ingredient.name as name_ingredient, ingredient.isAllergen
                FROM pizza 
                LEFT JOIN ingredient_pizza ON pizza.id = ingredient_pizza.pizza_id
                LEFT JOIN ingredient ON ingredient_pizza.ingredient_id = ingredient.id
                WHERE pizza.id=?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        
        $pizza = new Pizza();
        $pizza->setName($result[0]['name']);
        $pizza->setId($result[0]['id']);

        $pizzaIngredient = [];
        foreach($result as $r){
            if($r['id_ingredient']){
                $ingredient = new Ingredient();
                $ingredient->setName($r['name_ingredient']);
                $ingredient->setIsAllergen($r['isAllergen']);
                $ingredient->setId($r['id_ingredient']);
                $pizzaIngredient[$ingredient->getId()] = $ingredient;
            }
        }
        $pizza->setIngredients($pizzaIngredient);

        return $pizza;
    }

    public function getById(int $id){
        //on commence par recuperer notre pizza;
        $sql = "SELECT * FROM pizza WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $pizza = $this->dataTransform($stmt->fetchAll())[0];

        //on récupere les 'liens' dans la table ingredient_pizza
        $sql = "SELECT * FROM ingredient_pizza WHERE pizza_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        //maintenant qu'on a les id des ingredient, 
        //on peut les récuperer grace a notre IngredientDAO
        $dbResult = $stmt->fetchAll();
        $ingredients = [];
        $ingredientDAO = new IngredientDAO();
        foreach($dbResult as $result){
            $ingredientId = $result['ingredient_id'];
            $ingredients[$ingredientId] = $ingredientDAO->getById($ingredientId);
        }
        $pizza->setIngredients($ingredients);
        return $pizza;
    }

    public function updateIngredient(int $pizzaId, array $ingredientsIds){
        
    }
}
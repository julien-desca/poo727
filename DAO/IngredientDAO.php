<?php

namespace DAO;

use Entity\Ingredient;
use Exception;
use PDO;
use PDOException;

class IngredientDAO{
    //CRUD
    //Create
    //Read
    //Update
    //Delete

    /**
     * Connexion PDO à la base de données
     */
    private $pdo;

    /**
     * __construct est appelé AUTOMATIQUEMENT 
     * lors de l'appel à new IngredientDAO()
     */
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

    /**
     * Création d'un ingredient en BDD
     */
    public function create(Ingredient $ingredient){
        try{
            $sql = "INSERT INTO 
                    ingredient(name, isAllergen)
                    VALUE (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $params = [
                $ingredient->getName(),
                (int)$ingredient->getIsAllergen(),
            ];
            //$stmt->bindValue(':name', $ingredient->getName());
            //$stmt->bindValue(':isAllergen', $ingredient->getIsAllergen());
            $stmt->execute($params);
            return $this->pdo->lastInsertId();
        }catch(Exception $e){
            echo "Erreur lors de l'insertion en BDD <br/>";
            echo $e->getMessage();
            die;
        }
    }

    /**
     * Récupère tous les ingrédients en BDD
     */
    public function getAll(){
        
        $sql = "SELECT * FROM ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetchAll();
        $result = $this->dataTransform($stmt->fetchAll());
        return $result;
    }


    private function dataTransform(array $dbResult){
        $ingredients = [];
        foreach($dbResult as $result){
            $ingredient = new Ingredient();
            $ingredient->setId($result['id']);
            $ingredient->setName($result['name']);
            $ingredient->setIsAllergen($result['isAllergen']);
            $ingredients[] = $ingredient;
        }
        return $ingredients;
    }

    /**
     * Recupère un ingrédients (par id)
     */
    public function getById(int $id){

        $sql = "SELECT * FROM ingredient WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute( [$id] );

        $pdoResult = $stmt->fetchAll();
        if(count($pdoResult) == 0){
            throw new Exception("Ingredient $id not found");
        }
        $result = $this->dataTransform($pdoResult);
        return $result[0];
    }

    public function delete(int $ingredientId){
        $sql = "DELETE FROM ingredient_pizza WHERE ingredient_id = ?" ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ingredientId]); 

        $sql = "DELETE FROM ingredient WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$ingredientId]);
    }
}
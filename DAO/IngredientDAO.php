<?php

namespace DAO;

use Entity\Ingredient;
use PDO;

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
            $this->pdo = new PDO("mysql:dbname=formationPoo;host=127.0.0.1",
             "dolibarr",
             "password"
            );
        }
        catch(\Exception $e){
            var_dump($e);die();
        }
    }

    /**
     * Création d'un ingredient en BDD
     */
    public function create(Ingredient $ingredient){

    }

    /**
     * Récupère tous les ingrédients en BDD
     */
    public function getAll(){
        
        $sql = "SELECT * FROM ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        //return $stmt->fetchAll();
        $result = [];
        foreach($stmt->fetchAll() as $dbResult){
            $result[] = $this->dataTransform($dbResult); 
        }
        return $result;
    }

    private function dataTransform(array $dbResult){
        $ingredient = new Ingredient();
        $ingredient->setId($dbResult['id']);
        $ingredient->setName($dbResult['name']);
        $ingredient->setIsAllergen($dbResult['isAllergen']);
        return $ingredient;
    }

    /**
     * Recupère un ingrédients (par id)
     */
    public function getById(int $id){

        $sql = "SELECT * FROM ingredient WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute( [$id] );

        $result = [];
        foreach($stmt->fetchAll() as $dbResult){
            $result[] = $this->dataTransform($dbResult);
        }
        return $result[0];
    }

}
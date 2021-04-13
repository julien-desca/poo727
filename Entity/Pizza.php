<?php

namespace Entity;

class Pizza
{

    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $ingredients;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }
}
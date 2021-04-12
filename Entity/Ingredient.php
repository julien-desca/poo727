<?php

namespace Entity;

class Ingredient
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $isAllergen;

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param int
     */
    public function setId(int $id){
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
     * @return bool
     */
    public function isAllergen()
    {
        return $this->isAllergen;
    }

    /**
     * @param bool $isAllergen
     */
    public function setIsAllergen($isAllergen)
    {
        $this->isAllergen = $isAllergen;
    }


}
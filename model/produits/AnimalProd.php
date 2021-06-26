<?php

class AnimalProd{
    private $typeAnimal;
   
    function __construct($typeAn){
        $this->typeAnimal = $typeAn;
    }

    function getTypeAnimal(){
        return $this->typeAnimal;
    }
    function setTypeAnimal($typeAn){
        $this->typeAnimal = $typeAn;
    }
}

?>
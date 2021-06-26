<?php

class CathProd{
private $typeAnimal, $designationCath;

function __construct($typeAnimal, $desig){
    $this->typeAnimal = $typeAnimal;
    $this->designationCath = $desig;
}

function getTypeAnimal(){
    return $this->typeAnimal;
}

function getDesignationCath(){
    return $this->designationCath;
}

function setIdDesignationCath($desig){
    $this->designationCath = $desig;
}

}

?>
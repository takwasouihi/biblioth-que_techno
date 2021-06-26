<?php

class Produits{

    private $designation, $descrip, $marque, $cath, $img, $qtiteStock, $prixA, $prixV;

    function __construct($dsg, $descrip, $marq, $cath, $img, $qtiteS, $prixA, $prixV){
        $this->designation = $dsg;
        $this->marque = $marq;
        $this->cath = $cath;
        $this->img = $img;
        $this->qtiteStock = $qtiteS;
        $this->prixA = $prixA;
        $this->descrip = $descrip;
        $this->prixV = $prixV;
    }

    function getDesignation(){
        return $this->designation;
    }
    function getDescrip(){
        return $this->descrip;
    }
    function getMarque(){
        return $this->marque;
    }
    function getCath(){
        return $this->cath;
    }
    function getImg(){
        return $this->img;
    }
    function getQtiteStock(){
        return $this->qtiteStock;
    }
    function getPrixA(){
        return $this->prixA;
    }
    function getPrixV(){
        return $this->prixV;
    }
}

?>
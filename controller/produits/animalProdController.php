<?php

include_once "../../model/produits/AnimalProd.php";
include_once "../../config.php";

class AnimalProdController{
    private $conn, $error;

    function ajouterAnimalProd($animalProd) {
        $conn = config :: getConnexion();
        $sql = "insert into animal (type_animal) values (:typeAnimal) ";
        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':typeAnimal', $animalProd->getTypeAnimal());
            $req->execute();
            echo "New records created successfully";
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
}

    function getAllAnimalProd($page){
        $conn = config :: getConnexion();
        $limit = 2;
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        // var_dump($page);
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM animal LIMIT $start, $limit";
        try {
            $result=$conn->query($sql);
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row;
            if(!empty($row)){
                return $row[0];
            }
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getAllAnimalProdSelect(){
        $conn = config :: getConnexion();
        $sql = "SELECT * FROM animal ";
        try {
            $result=$conn->query($sql);
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row;
            if(!empty($row)){
                return $row[0];
            }
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function countRows(){
        $conn = config :: getConnexion();
        $sql = "SELECT COUNT(id_animal) as id FROM animal";
        $limit = 2;
        try {
            $result=$conn->query($sql);
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            $total = $row[0]['id'];
            $pages = ceil($total/$limit);
            return $pages;  
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getAnimalProdByID($idAnimal){
        $conn = config :: getConnexion();
        $sql = "SELECT * FROM animal WHERE id_animal=:idAnimal";

        try {
            $req = $conn->prepare($sql);
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->bindValue(":idAnimal", $idAnimal);
            $req->execute();
            return $result;
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function deleteAnimal($id){
        $conn = config :: getConnexion();
        $sql = "DELETE FROM animal WHERE id_animal=:id";
        try{
            $req = $conn->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function liveSearch($search){
        $conn = config :: getConnexion();
        $sql = "SELECT * FROM animal WHERE type_animal LIKE '%" .$search."%'";
        try{
            $req = $conn->query($sql);
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
}

?>
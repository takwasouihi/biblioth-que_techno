<?php

//include_once '../../model/produits/CathegorieProd.php';
include_once '../../config.php';

class CathProdController{
    private $error;
    function ajouterCathProd($CathProd){
        
        $conn = config::getConnexion();
        $sql = "INSERT INTO cathegorie (type_animal,designation) VALUES (:typeAnimal, :designation)";

        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':typeAnimal', $CathProd->getTypeAnimal());
            $req->bindValue(':designation', $CathProd->getDesignationCath());
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getAllCathProd(){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM cathegorie";

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

    function getAllCathProdPagn(){
        $conn = config :: getConnexion();
        $limit = 2;
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        // var_dump($page);
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM cathegorie LIMIT $start, $limit";
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
        $sql = "SELECT COUNT(id_cath) as id FROM cathegorie";
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

    function deleteCath($idCath){
        $conn = config::getConnexion();
        $sql = "DELETE FROM cathegorie WHERE id_cath=:idCath";
        
        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':idCath', $idCath);
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getCathByID($idCath){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM cathegorie WHERE id_cath=:idCath";

        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':idCath', $idCath);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            if(count($result)>1){
                 $this->error = "erreur";
                 return $this->error;
            }
            return $result;
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
    function getCathByTypeAnimal($typeAnimal){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM cathegorie WHERE type_animal=:typeCath";

        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':typeCath', $typeAnimal);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function updateCath($CathProd, $idCath){
        $conn = config::getConnexion();
        $sql="UPDATE cathegorie SET designation=:designation, type_animal=:typeAnimal   WHERE id_cath=:idCath";

        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':idCath', $idCath);
            $req->bindValue(':typeAnimal', $CathProd->getTypeAnimal());
            $req->bindValue(':designation', $CathProd->getDesignationCath());
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function unique($data){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM cathegorie WHERE designation=:desgn";
        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':desgn', $data);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);

            return count($result);
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function liveSearch($search){
        $conn = config :: getConnexion();
        $sql = "SELECT * FROM cathegorie WHERE designation LIKE '%" .$search."%' 
        OR type_animal LIKE '%" .$search."%'";
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
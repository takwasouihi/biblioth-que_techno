<?php
include_once '../../config.php';

class ProduitCtrl{
    function ajouterProd($produits){
        $conn = config::getConnexion();

        $sql = "INSERT INTO produits (cathegorie,designation,marque	,descriptionProd,
        prix_achat,prix_vente,quantiteStock,img) VALUES (:cathegorie,:designation,:marque,:descriptionProd,
        :prixA, :prixV,:quantiteStock,:img)";
        
        try {
            $req = $conn->prepare($sql);
            $req->bindValue(":cathegorie", $produits->getCath());
            $req->bindValue(":marque", $produits->getMarque());
            $req->bindValue(":descriptionProd", $produits->getDescrip());
            $req->bindValue(":prixA", $produits->getPrixA());
            $req->bindValue(":prixV", $produits->getPrixV());
            $req->bindValue(":quantiteStock", $produits->getQtiteStock());
            $req->bindValue(":img", $produits->getImg());
            $req->bindValue(":designation", $produits->getDesignation());

            $req->execute();
            //die("je suis une erreur");
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function deleteProd($idProd){
        $conn = config::getConnexion();
        $sql = "DELETE FROM produits WHERE id_produit=:idProd";

        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':idProd', $idProd);
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getAllProd(){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM produits";

        try {
            $result=$conn->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
            if(!empty($rows)){
                return $rows[0];
            }
            
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getAllProdPagn(){
        $conn = config :: getConnexion();
        $limit = 2;
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        // var_dump($page);
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM produits LIMIT $start, $limit";
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

    function getAllProdPagnFront(){
        $conn = config :: getConnexion();
        $limit = 6;
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        // var_dump($page);
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM produits LIMIT $start, $limit";
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
        $sql = "SELECT COUNT(id_produit) as id FROM produits";
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

    function countRowsFront(){
        $conn = config :: getConnexion();
        $sql = "SELECT COUNT(id_produit) as id FROM produits";
        $limit = 6;
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

    function getProdById($idProd){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM produits WHERE id_produit=:idProd";
        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':idProd', $idProd);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);        
            return $result;
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function updateProd($produits, $idProd){
        $conn = config::getConnexion();
        $sql="UPDATE produits SET designation=:designation, cathegorie=:cathegorie, marque=:marque, 
        descriptionProd=:descriptionProd, prix_achat=:prixA, prix_vente=:prixV, 
        quantiteStock=:quantiteStock,img=:img WHERE id_produit=:idProd";
        
        try {
            $req = $conn->prepare($sql);
            
            $req->bindValue(":cathegorie", $produits->getCath());
            $req->bindValue(":marque", $produits->getMarque());
            $req->bindValue(":descriptionProd", $produits->getDescrip());
            $req->bindValue(":prixA", $produits->getPrixA());
            $req->bindValue(":prixV", $produits->getPrixV());
            $req->bindValue(":quantiteStock", $produits->getQtiteStock());
            $req->bindValue(":img", $produits->getImg());
            $req->bindValue(":designation", $produits->getDesignation());
            $req->bindValue(":idProd", $idProd);

            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
    function liveSearch($search){
        $conn = config :: getConnexion();
        $sql = "SELECT * FROM produits WHERE designation LIKE '%" .$search."%' 
        OR marque LIKE '%" .$search."%' OR cathegorie LIKE '%" .$search."%' ";
        try{
            $req = $conn->query($sql);
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getAllBrand(){
        $conn = config :: getConnexion();
        $sql = "SELECT DISTINCT marque FROM  produits ORDER BY  marque";
        try {
            $result=$conn->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
            if(!empty($rows)){
                return $rows[0];
            }
        } catch (PDOException $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}

?>
<?php 
include "../views/db.php";

class commentaireC{
    function afficherCommentaire(){

        $sql="SELECT * FROM commentaires";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
    function ajouterCommentairee($commentaire)
    {
        $sql="INSERT INTO commentaires (sujet,comment,idc,email,idforum)
        VALUES(:sujet,:comment,:idc,:email,:idforum)";
        $db= config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $test=$query->execute([
             'sujet'=>$commentaire->getSujet(),
             'comment'=>$commentaire->getComment(),
             'email'=>$commentaire->getEmail(),
             'idforum'=>$commentaire->getIdforum()

             
            ]);
        } catch (Exception $e){
            echo 'error: '.$e->getMessage();
        }
       
    }

    function ajouterCommentaire($commentaire){
       
        $conn = db::getConnexion();
        $sql = "INSERT INTO commentaires (sujet, comment, email, idforum) values (:sujet, :comment , :email , :idforum) ";
        
        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':sujet',$commentaire->getSujet());
            $req->bindValue(':comment',$commentaire->getComment());
            $req->bindValue(':email',$commentaire->getEmail());
            $req->bindValue(':idforum',$commentaire->getIdforum());
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    function SupprimerCommentaire($idr)
    { $sql = "DELETE FROM commentaires WHERE idc= :idc";
        $db= config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindvalue(':idc',$idr);
        try {
            $query->execute();
        } catch (Exception $e)
        { die ('Erreur:'.$e->getMessage());}
    }

    function rechercherCommentaire($valueToSearch1){
        $query = "SELECT * FROM `commentaires` WHERE CONCAT(`Idc`, `Sujet`, `comment`,`email`) LIKE '%".$valueToSearch1."%'";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function tridsc(){
        $query = "SELECT * FROM `commentaires` ORDER BY `idc` DESC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function triasc(){
        $query = "SELECT * FROM `commentaires` ORDER BY `idc` ASC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function getCommentaireById($idforum){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM commentaires WHERE idforum=:idforum";
        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':idforum', $idforum);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }







}




?>
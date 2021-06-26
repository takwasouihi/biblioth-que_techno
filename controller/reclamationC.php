<?php 

class reclamationC{
    function afficherReclamation(){

        $sql="SELECT * FROM reclamations";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterReclamation($reclamation,$id)
    {
        $sql="INSERT INTO reclamations (sujet,comment,id)
        VALUES(:sujet,:comment,:id)";
        $db= config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $test=$query->execute([
             'sujet'=>$reclamation->getSujet(),
             'comment'=>$reclamation->getComment(),
             'id'=>$id,
            ]);
        } catch (Exception $e){
            echo 'error: '.$e->getMessage();
        }
       
    }

    function SupprimerReclamation($idr)
    { $sql = "DELETE FROM reclamations WHERE Idr= :idr";
        $db= config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindvalue(':idr',$idr);
        try {
            $query->execute();
        } catch (Exception $e)
        { die ('Erreur:'.$e->getMessage());}
    }

    function rechercherReclamation($valueToSearch1){
        $query = "SELECT * FROM `reclamations` WHERE CONCAT(`Id`, `Sujet`, `Idr`, `comment`) LIKE '%".$valueToSearch1."%'";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function tridsc(){
        $query = "SELECT * FROM `reclamations` ORDER BY `Id` DESC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function triasc(){
        $query = "SELECT * FROM `reclamations` ORDER BY `Id` ASC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }








}




?>
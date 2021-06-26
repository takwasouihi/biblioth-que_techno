<?php
include_once "config.php";

class evenements
{

    function ajouterevenement($evenement)
    {
        $sql = "insert into evenements(reference ,titre,dateS ,endroit,description,stock,prix ,image) values (:reference,:titre,:dateS,:endroit,:description,:stock,:prix,:image)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':reference', $evenement->getReference());
            $req->bindValue(':titre', $evenement->getTitre());
            $req->bindValue(':dateS', $evenement->getDate());
            $req->bindValue(':endroit', $evenement->getendroit());
            $req->bindValue(':description', $evenement->getDescription());
            $req->bindValue(':image', $evenement->getImage());
           
            $req->bindValue(':prix', $evenement->getPrix());
            $req->bindValue(':stock', $evenement->getStock());

            $req->execute();

        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();
        }

    }

    function afficher($var)
    {

        $query = "SELECT * FROM evenements LIMIT $var,6";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function afficherevenement($id)
    {

        $query = "SELECT * FROM evenements where ID='$id' ";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }


    function modifierevenement($evenement)
    {
        $sql = "UPDATE evenements SET reference=:reference,titre=:titre, dateS=:dateS,endroit=:endroit,description=:description,image=:image,prix=:prix,stock=:stock where ID= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':id', $evenement->getId());
        $req->bindValue(':reference', $evenement->getReference());
        $req->bindValue(':titre', $evenement->getTitre());
        $req->bindValue(':dateS', $evenement->getDate());
        $req->bindValue(':endroit', $evenement->getendroit());
        $req->bindValue(':description', $evenement->getDescription());
        $req->bindValue(':image', $evenement->getImage());
        
        $req->bindValue(':prix', $evenement->getPrix());
        $req->bindValue(':stock', $evenement->getStock());
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierevenement2($evenement)
    {
        $sql = "UPDATE evenements SET reference=:reference,titre=:titre, dateS=:dateS,endroit=:endroit,description=:description,prix=:prix,stock=:stock where ID= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':id', $evenement->getId());
        $req->bindValue(':reference', $evenement->getReference());
        $req->bindValue(':titre', $evenement->getTitre());
        $req->bindValue(':dateS', $evenement->getDate());
        $req->bindValue(':endroit', $evenement->getendroit());
        $req->bindValue(':description', $evenement->getDescription());
       
        $req->bindValue(':prix', $evenement->getPrix());
        $req->bindValue(':stock', $evenement->getStock());
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimer($id)
    {

        $sql = "DELETE FROM evenements WHERE 	ID ='" . $id . "'";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->execute();
            return ("ok");
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();
            return ("no");
        }

    }

    function count()
    {
        $sql = "SELECT * FROM  evenements";
        $db = config::getConnexion();
        try {
            $S = $db->query($sql);
            return $S->rowCount();
        } catch (Exception $err) {
            die('Erreur: ' . $err->getMessage());
        }
    }


  

    function top5()
    {

        $query = "SELECT * FROM evenements ORDER BY note DESC LIMIT 5";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function note($note, $idc, $id_evenement)
    {

        $query = "insert into  note (note,id_client,id_evenement) values ($note,'$idc',$id_evenement)";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function updatenote($note, $idc, $id_evenement)
    {

        $query = "UPDATE note set NOTE=$note where (id_client='$idc' && id_evenement=$id_evenement)";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function AVG($id_evenement)
    {

        $query = " UPDATE evenements SET note=(select AVG (note) from  note where (id_evenement='$id_evenement')) where  ID=$id_evenement";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

   

}
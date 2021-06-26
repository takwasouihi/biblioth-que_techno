<?php
include_once "config.php";

class revues
{

    function ajouterrevue($revue)
    {
        $sql = "insert into revues(reference ,titre,dateS ,nomAuteur,categorie,description,stock,prix ,image) values (:reference,:titre,:dateS,:nomAuteur,:ouvrage,:description,:stock,:prix,:image)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':reference', $revue->getReference());
            $req->bindValue(':titre', $revue->getTitre());
            $req->bindValue(':dateS', $revue->getDate());
            $req->bindValue(':nomAuteur', $revue->getNomAuteur());
            $req->bindValue(':description', $revue->getDescription());
            $req->bindValue(':image', $revue->getImage());
            $req->bindValue(':categorie', $revue->getcategorie());
            $req->bindValue(':prix', $revue->getPrix());
            $req->bindValue(':stock', $revue->getStock());

            $req->execute();

        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();
        }

    }

    function afficher($var)
    {

        $query = "SELECT * FROM revues LIMIT $var,6";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function afficherrevue($id)
    {

        $query = "SELECT * FROM revues where ID='$id' ";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }


    function modifierrevue($revue)
    {
        $sql = "UPDATE revues SET reference=:reference,titre=:titre, dateS=:dateS,nomAuteur=:nomAuteur,description=:description,image=:image,categorie=:categorie,prix=:prix,stock=:stock where ID= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':id', $revue->getId());
        $req->bindValue(':reference', $revue->getReference());
        $req->bindValue(':titre', $revue->getTitre());
        $req->bindValue(':dateS', $revue->getDate());
        $req->bindValue(':nomAuteur', $revue->getNomAuteur());
        $req->bindValue(':description', $revue->getDescription());
        $req->bindValue(':image', $revue->getImage());
        $req->bindValue(':categorie', $revue->getCategorie());
        $req->bindValue(':prix', $revue->getPrix());
        $req->bindValue(':stock', $revue->getStock());
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierRevue2($revue)
    {
        $sql = "UPDATE revues SET reference=:reference,titre=:titre, dateS=:dateS,nomAuteur=:nomAuteur,description=:description,categorie=:categorie,prix=:prix,stock=:stock where ID= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':id', $revue->getId());
        $req->bindValue(':reference', $revue->getReference());
        $req->bindValue(':titre', $revue->getTitre());
        $req->bindValue(':dateS', $revue->getDate());
        $req->bindValue(':nomAuteur', $revue->getNomAuteur());
        $req->bindValue(':description', $revue->getDescription());
        $req->bindValue(':categorie', $revue->getCategorie());
        $req->bindValue(':prix', $revue->getPrix());
        $req->bindValue(':stock', $revue->getStock());
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimer($id)
    {

        $sql = "DELETE FROM revues WHERE 	ID ='" . $id . "'";
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
        $sql = "SELECT * FROM  revues";
        $db = config::getConnexion();
        try {
            $S = $db->query($sql);
            return $S->rowCount();
        } catch (Exception $err) {
            die('Erreur: ' . $err->getMessage());
        }
    }


    function afficherrevueparcategorie($categorie, $var)
    {

        $query = "SELECT * FROM revues where revue='$categorie' LIMIT $var,6";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function top5()
    {

        $query = "SELECT * FROM revues ORDER BY note DESC LIMIT 5";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function note($note, $idc, $id_livre)
    {

        $query = "insert into  reference (note,id_client,id_revue) values ($note,'$idc',$id_revue)";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function updatenote($note, $idc, $id_livre)
    {

        $query = "UPDATE note set NOTE=$note where (id_client='$idc' && id_livre=$id_livre)";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function AVG($id_livres)
    {

        $query = " UPDATE revues SET reference=(select AVG (reference) from  reference where (id_livre='$id_livre')) where  ID=$id_livre";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function countbycategorie($categorie)
    {
        $sql = "SELECT * FROM  revues where revue ='" . $categorie . "'";
        $db = config::getConnexion();
        try {
            $S = $db->query($sql);
            return $S->rowCount();
        } catch (Exception $err) {
            die('Erreur: ' . $err->getMessage());
        }
    }


}
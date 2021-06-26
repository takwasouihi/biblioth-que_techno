<?php
include_once "config.php";

class ouvrages
{

    function ajouterouvrage($ouvrage)
    {
        $sql = "insert into ouvrages(name) values (:name)";
        $db = config::getConnexion();
        try {
				$req = $db->prepare($sql);
				$name = $ouvrage->getName();
	
	
				$req->bindValue(':name', $name);
	
				$req->execute();

			} catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();
        }

    }


    function modifierouvrage($id, $nom)
    {
        $sql = "UPDATE ouvrages SET name=:nom where id= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);


        $req->bindValue(':id', $id);
        $req->bindValue(':nom', $nom);
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function afficherouvrage($id)
    {

        $query = "SELECT * FROM ouvrages where id='$id' ";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function afficher($var)
    {

        $query = "SELECT * FROM ouvrages LIMIT $var,6";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }


    function supprimer($id)
    {

        $sql = "DELETE FROM ouvrages WHERE 	id ='" . $id . "'";
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

    function supprimer_revues($ouvrage)
    {

        $sql = "DELETE FROM revues WHERE 	revue='" . $categorie . "'";
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
        $sql = "SELECT * FROM  ouvrages";
        $db = config::getConnexion();
        try {
            $S = $db->query($sql);
            return $S->rowCount();
        } catch (Exception $err) {
            die('Erreur: ' . $err->getMessage());
        }
    }


    function selectouvrage()
    {

        $query = "SELECT * FROM ouvrages ";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }


}
<?php
class userC {
    function ajouterUser($etudiants)
    {
        $sql="INSERT INTO etudiants (id,nom,prenom,email,tel,naiss,classe,sexe,mdp)
        VALUES(:id,:nom,:prenom,:email,:tel,:naiss,:classe,:sexe,:mdp)";
        $db= config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $test=$query->execute([
             'id'=>$etudiants->getId(),
             'nom'=>$etudiants->getNom(),
             'prenom'=>$etudiants->getPrenom(),
             'email'=>$etudiants->getMail(),
             'tel'=>$etudiants->getTel(),
             'naiss'=>$etudiants->getNaiss(),
             'classe'=>$etudiants->getClasse(),
             'sexe'=>$etudiants->getSexe(),
             'mdp'=>$etudiants->getMdp(),
            ]);
        } catch (Exception $e){
            echo 'error: '.$e->getMessage();
        }
       
    }

    function ajouterimage($image,$id){
        $sql="UPDATE etudiants  SET pic= :image WHERE id = :id";
        $db= config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $test=$query->execute([
            'image'=>$image,
             'id'=>$id,
            ]);
        } catch (Exception $e){
            echo 'error: '.$e->getMessage();
        }
    }

    function updateUser($etudiants , $id)
    {
        $sql="UPDATE etudiants  SET id= :id,nom= :nom,prenom= :prenom,email= :email,tel= :tel,naiss= :naiss,classe= :classe,sexe= :sexe,mdp= :mdp WHERE id = :idu";
        $db= config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $test=$query->execute([
             'id'=>$etudiants->getId(),
             'nom'=>$etudiants->getNom(),
             'prenom'=>$etudiants->getPrenom(),
             'email'=>$etudiants->getMail(),
             'tel'=>$etudiants->getTel(),
             'naiss'=>$etudiants->getNaiss(),
             'classe'=>$etudiants->getClasse(),
             'sexe'=>$etudiants->getSexe(),
             'mdp'=>$etudiants->getMdp(),
             'idu'=>$id,
            ]);
        } catch (Exception $e){
            echo 'error: '.$e->getMessage();
        }
       
    }

    function afficherUserWithID($id){
        $sql = "SELECT * FROM Etudiants where id= :id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindvalue(':id',$id );
        try {  $query->execute();
            $liste = $query->fetchAll();
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function afficherUser(){
        $sql = "SELECT * FROM Etudiants";
        $db = config::getConnexion();
        try { $liste = $db->query($sql);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function findUser($id){
        $sql = "SELECT * FROM Etudiants where id= :id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindvalue(':id',$id );
        try {  $query->execute();
            $liste = $query->fetchAll();
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function SupprimerUser($id)
    { $sql = "DELETE FROM Etudiants WHERE Id= :id";
        $db= config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindvalue(':id',$id);
        try {
            $query->execute();
        } catch (Exception $e)
        { die ('Erreur:'.$e->getMessage());}
    }

    function rechercherUser($valueToSearch){
        $query = "SELECT * FROM `Etudiants` WHERE CONCAT(`Id`, `Nom`, `Prenom`, `Email`, `tel`, `naiss`, `classe`, `sexe`, `mdp`) LIKE '%".$valueToSearch."%'";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }
    

    static function connexionUser($id,$mdp){
        $sql="SELECT * FROM etudiants WHERE Id='".$id."' and mdp = '".$mdp."'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            if($count==0) {
                $message = "pseudo ou le mot de passe est incorrect";
            } else {
                $x=$query->fetch();
                $message = $x['role'];
            }
        }
        catch (Exception $e){
                $message= " ".$e->getMessage();
        }
      return $message;
    }
    function tridscu(){
        $query = "SELECT * FROM `etudiants` ORDER BY `classe` DESC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function triascu(){
        $query = "SELECT * FROM `etudiants` ORDER BY `classe` ASC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }
 
    static function RecEmail($email){
        $sql="SELECT * FROM etudiants WHERE Email ='".$email."'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            if($count==0) {
                $message = "Désolé, votre Adresse est inexistante";
            } else {
                $x=$query->fetch();
                $message = $x['mdp'];
            }
        }
        catch (Exception $e){
                $message= " ".$e->getMessage();
        }
      return $message;
    }

    function findEmail($id){
        $sql = "SELECT Email FROM etudiants WHERE Id= :id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindvalue(':id',$id );
        try {  $query->execute();
            
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }











    

}
?>
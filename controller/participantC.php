<?php



  class ParticipantC
  {
    function afficherParticipant($Participant){

echo "Idparticipant: ".$Participant->getIdparticipant()."<br>";        
echo "Idevenement: ".$Participant->getIdevenement()."<br>";
        echo "nom: ".$Participant->getnom()."<br>";
        echo "prenom: ".$Participant->getprenom()."<br>";
        echo "email: ".$Participant->getemail()."<br>";
                              }
    

    function ajouterParticipant($Participant){
        $sql="INSERT INTO Participant (Idparticipant,Idevenement,nom,prenom,email) VALUES (:Idparticipant,:Idevenement,:nom,:prenom,:email)";
        $db = config::getConnexion();
        try{
            $req = $db->prepare($sql);
            
$Idparticipant=$Participant->getIdparticipant();                     
$Idevenement=$Participant->getIdevenement();
                     $nom=$Participant->getnom();
                     $prenom=$Participant->getprenom();
                     $email=$Participant->getemail();


             
$req->bindVAlue(':Idparticipant',$Idparticipant);                            
$req->bindVAlue(':Idevenement',$Idevenement);
                            $req->bindVAlue(':nom',$nom);
                            $req->bindVAlue(':prenom',$prenom);
                            $req->bindVAlue(':email',$email);

          $req->execute();
            
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
 
        }
    }




    function afficherParticipants(){
        $sql = "SElECT * From Participant ORDER BY Idparticipant";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
   
    
    }




    




    function supprimerParticipant($Idparticipant)
    {
        $sql = "DELETE FROM Participant WHERE Idparticipant= :Idparticipant";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Idparticipant', $Idparticipant);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }





    function recupererParticipant($Idparticipant){
        $sql="SELECT * from Participant where Idparticipant=$Idparticipant";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

   

      

    function modifierParticipant($Participant,$Idparticipant){
        $sql="UPDATE Participant SET Idparticipant=:Idparticipant,Idevenement=:Idevenement, nom=:nom,prenom=:prenom,email=:email WHERE Idparticipant=:Idparticipant";
        
        $db = config::getConnexion();
       
try{        
    $req = $db->prepare($sql);
$Idparticipant=$Participant->getIdparticipant();
       $Idevenement=$Participant->getIdevenement();
       $nom=$Participant->getnom();
       $prenom=$Participant->getprenom();
       $email=$Participant->getemail();

        $datas=array(':Idparticipant'=>$Idparticipant,':Idevenement'=>$Idevenement, ':nom'=>$nom,':prenom'=>$prenom,':email'=>$email);
$req->bindValue(':Idparticipant',$Idparticipant);         
$req->bindValue(':Idevenement',$Idevenement);
         $req->bindVAlue(':nom',$nom);
         $req->bindVAlue(':prenom',$prenom);
         $req->bindVAlue(':email',$email);

         $s=$req->execute();
            
           
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }

    function tridscu(){
        $query = "SELECT * FROM `participant` ORDER BY `idevenement` DESC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function triascu(){
        $query = "SELECT * FROM `participant` ORDER BY `idevenement` ASC";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }

    function rechercherUser($valueToSearch){
        $query = "SELECT * FROM `participant` WHERE CONCAT(`Idparticipant`, `Idevenement`, `nom`, `prenom`, `email`) LIKE '%".$valueToSearch."%'";
        $db= config::getConnexion();
        try { 
            $liste = $db->query($query);
        return $liste;
        }
        catch (Exception $e)
        {die ('Erreur:'.$e->getMessage());}
    }





}



    


    
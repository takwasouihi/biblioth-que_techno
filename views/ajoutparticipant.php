<?PHP
include "../model/participant.php";
include "../controller/participantC.php";

if (isset($_GET['Idparticipant']) and isset($_GET['Idevenement']) and isset($_GET['nom']) and isset($_GET['prenom'])and isset($_GET['email'])){
$email= $_GET['email'] ;
$Idparticipant=$_GET['Idparticipant'];
$Idevenement=$_GET['Idevenement'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
if($email!= "" && $Idparticipant!= "" && $Idevenement!= "" && $nom!= "" && $prenom!= "")
{ // si les saisies ne sont pas vides
if ( preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $email ) )
{
if((!(is_numeric($nom))) && (!(is_numeric($prenom))) && (is_numeric($Idevenement)) && (is_numeric($Idparticipant)) ){
$participant1=new participant($_GET['Idparticipant'],$_GET['Idevenement'],$_GET['nom'],$_GET['prenom'],$_GET['email']);

$participant1C=new participantC();
$participant1C->ajouterParticipant($participant1);
header('Location: participant.html');  
} else{ echo "respecter le formulaire" ;}
} else {echo "L'adresse eMail est pas valide";}
}else {echo" les champs sont vides";}
} 
else{
  echo "verifier les champs";
}



?>
<?PHP
include "../../controller/participantC.php";
include "../../config.php";
$participantC=new ParticipantC();
if (isset($_POST["Idparticipant"])){
    $participantC->supprimerParticipant($_POST["Idparticipant"]);
    header('Location: afficherparticipant.php');
}

?>
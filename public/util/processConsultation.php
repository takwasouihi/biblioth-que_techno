<?php

include_once '../../model/e-consulting/consultation.php';
include_once '../../controller/e-consulting/consultationC.php';

$consultationCtrl = new consultationC();
$Objet= $Typeanim= $age= $description= $id_consultation= "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}

 var_dump($_POST);

if(isset($_POST['envoyer'])){
    $Objet = $_POST['objet'];
    $Typeanim = $_POST['typeAnimal'];
    $age= $_POST['age'];
    $description= test_input($_POST['descrp']);
    $idUser = 0;
    
    $consultation = new consultation($Objet, $Typeanim, $age, $description, $idUser);
    var_dump($consultation);
    
    $consultationC = new consultationC();
    $consultationC->ajouterconsultation($consultation);
    header("location:../../views/frontend/e-consulting.php");
}
if(isset($_GET['delete'])){
    $idConsultation = test_input($_GET['delete']);

    $consultationCtrl->deleteConsultation($idConsultation);
    $_SESSION['message'] = "Consultation has been deleted !";
    $_SESSION['msg_type'] = "danger";
    header("location:../../views/admin/e-consultation.php");
}
?>
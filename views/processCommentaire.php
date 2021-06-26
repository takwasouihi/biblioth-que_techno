<?php
session_start();
include '../model/commentaire.php';

include '../controller/commentaireC.php';

$CommentaireCtrl = new CommentaireC();
$sujet = $email = $comment =$idforum= $idc="";
$update = false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}



    if(isset($_POST['ajouterCommentaire'])){
        $sujet = $_POST['sujet'];
        $comment = $_POST['comment'];
        $email = $_POST['email'];
        $idforum = $_POST['idforum'];
        $commentaire = new commentaire($sujet, $comment, $email,  $idforum);
        //$commentaireC = new commentaireC();
        $CommentaireCtrl->ajouterCommentaire($commentaire);
        header("location:details-forumLivres2.php?idForum=$idforum");
}




?>
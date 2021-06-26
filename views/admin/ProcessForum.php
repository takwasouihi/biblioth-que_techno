<?php
include "../../config.php";
    require_once '../../model/forum.php';
    require_once '../../controller/CForum.php';
    include_once '../../controller/commentaireC.php';
    include_once '../../model/commentaire.php';
    
    $CForum = new CForum();
    $commentaireC = new commentaireC();
    


    if(isset($_POST['submit'])){
        $forum = new forum($_POST["name"],$_POST["cont"],$_POST["typp"]);
        $b=$CForum->ajouterforumC($forum);  
        header("Location:ForumDash.php");
    }

    if(isset($_POST['updatesubmit'])){
        $forum = new forum($_POST["name"],$_POST["cont"],$_POST["typp"]);
      $b=$CForum->updateForum($forum,$_POST["idu"]);  
      header("Location:ForumDash.php"); 
  

  
}
  ?>

  ?>
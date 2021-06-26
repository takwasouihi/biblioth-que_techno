<?php
include "../../config.php";
    require_once '../../model/user.php';
    require_once '../../controller/userC.php';
    include_once '../../controller/reclamationC.php';
    include_once '../../model/reclamation.php';
    
    $userC = new userC();
    $reclamationC = new reclamationC();

    if(isset($_POST['submit'])){
        $user = new user($_POST["id1"],$_POST["fname"],$_POST["name"],$_POST["email"],$_POST["num"],$_POST["date"],$_POST["class"],$_POST["sex"],$_POST["passw"]);
        $b=$userC->ajouterUser($user); 
    ?>
        <script type=""> location.replace("../../controller/succes_forms.html");</script>
     <?php           
        //header("Location:forms.php");
    }

    if(isset($_POST['updatesubmit'])){
      $user = new user($_POST["id1"],$_POST["fname"],$_POST["name"],$_POST["email"],$_POST["num"],$_POST["date"],$_POST["class"],$_POST["sex"],$_POST["passw"]);
      $b=$userC->updateUser($user,$_POST["idu"]);  
      header("Location:forms.php");
  }
  ?>
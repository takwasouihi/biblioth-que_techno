
<?php
include "../config.php";
include_once '../model/user.php';
include_once '../controller/userC.php';
$message2="";
session_start();

if (isset($_POST['reset_request_submit']) && (!empty($_POST["email"]))) 
{ 
    
    $message2=userC::RecEmail($_POST["email"]);
      if($message2!='Désolé, votre Adresse est inexistante')
      {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"ESPRITHEQUE"<Espritheque@esprit.tn>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
       
       
       $message='
       <html>
       
           <body>
               <div align="center">
              <h1>Vous trouvez le nouveau mot de passe ci dessous</h1>
              <img class="logo-default scroll-hide" src="https://image.freepik.com/vecteurs-libre/illustration-concept-bibliotheque_114360-2673.jpg"/>
       
                   <br />
                   ';
              $message.=$message2;
              $message.='
                   
                   <br />
               </div>
           </body>
       </html>
       ';
       
       mail($_POST["email"], "Mot de Passe", $message, $header);
       header('location:connexion.php');
       }
        else{
          $message2='Désolé, votre Adresse est inexistante';
          $_SESSION['xxx']=$message2;
          header('location:forget.php');
      }
    }
      else 
      {
      $message2 = "Merci de saisir votre Adresse Email pour pouvoir récupérer votre mot de passe";
      header('location:forget2.php');
      }

 
?>
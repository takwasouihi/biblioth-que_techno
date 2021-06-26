<?php
include "../../config.php";
include '../../controller/userC.php';
$uc = new userC();

if (isset($_POST['avertissement']))
{    //$uc->findEmail($_POST['avertissement']);
    $userx=$uc->findUser($_POST['avertissement']);
  
      
      foreach($userx as $u){
      
  
        $id=$u['Id'];
        $nom=$u['Nom'];
        $prenom=$u['Prenom'];
        $mail=$u['Email'];
        $telephone=$u['tel'];
        $dateNaissance=$u['naiss'];
        $classe=$u['classe'];
        $sexe=$u['sexe'];
        $password=$u['mdp'];
  
      }
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"ESPRITHEQUE"<Espritheque@esprit.tn>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
   
   
   $message='
   <html>
   
       <body>
           <div align="center">
           <FONT color="red"> <h1> Avertissement</h1></FONT>
         
			<h2>Bonjour '.$prenom.',</h2> <br>
            Merci de passer le plus tôt possible au bureau de Mr Zerai <br>

          <img class="logo-default scroll-hide" src="https://image.freepik.com/vecteurs-libre/minuscules-personnes-examinant-avertissement-erreur-du-systeme-exploitation-page-web-isolee-illustration-plate_74855-11104.jpg"/>
   
               <br />
               
               
           </div>
       </body>
   </html>
   ';
   
   mail( $mail , "Avertissement", $message, $header);
   header('location: forms.php');
   }














?>
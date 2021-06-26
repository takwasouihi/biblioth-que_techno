<?php

$message="";

if (isset($_POST["loginUsername"]) &&
    isset($_POST["loginPassword"])) 
    {
          if (!empty($_POST["loginUsername"]) &&
            !empty($_POST["loginPassword"]))
                    {
                        if (($_POST["loginUsername"])=="admin" &&
                               ($_POST["loginPassword"])=="admin")
        
                                header('Location:forms.php');
                    }
        else{
            $message='pseudo ou le mot de passe est incorrect';
        }
    }
    else
        $message = "Merci de Saisir vos cordonnées";
?>






<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Esprithèque Espace Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.red.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Esprit</span><strong class="text-primary">Thèque</strong></div>
            <p>Bienvenue à Esprithèque <br> Espace Administration. <br>  </p>
            <form method="POST" action="logad.php" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="text" name="loginUsername" required data-msg="Merci d'entrer votre identifiant" class="input-material">
                <label for="login-username" class="label-material">Identifiant Admin</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="loginPassword" required data-msg="Merci d'entrer votre Mdp" class="input-material">
                <label for="login-password" class="label-material">Mot de passe</label>
              </div>
              <div class="form-group text-center"><a id="login" href="forms.php" class="btn btn-primary">Connexion</a>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
         </form>
          </div>
          
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>
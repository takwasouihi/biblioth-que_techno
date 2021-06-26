<?php
include "../config.php";
include_once '../model/user.php';
include_once '../controller/userC.php';
include_once '../controller/reclamationC.php';
include_once '../model/reclamation.php';

// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e'])){
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
}

   $userC = new userC();
   $listeU=$userC->afficherUserWithID($_SESSION['e']);

   
   foreach($listeU as $row){
        $image=$row['pic'];
        $id=$row['Id'];
   }


   if(isset($_POST['save'])){
    $user = new user($_POST["id2"],$_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["phone"],$_POST["date"],$_POST["class"],$_POST["sexe"],$_POST["password"]);
    $b=$userC->updateUser($user,$_POST["id2"]);  
   header('Location: profil.php');
   }




   $reclamationC = new reclamationC();
    if(isset($_POST['send'])){
        $reclamation = new reclamation($_POST["sujet"],$_POST["details"]);
        $r=$reclamationC->ajouterReclamation($reclamation,$_SESSION['e']);  
    }
   
//if ($_SERVER['REQUEST_METHOD']=="POST")
//{
    if(isset($_POST['tt'])){
        
        
    $filename=$_FILES['file']['name'];
    if(isset($_FILES['file']['name'])&& $_FILES['file']['name']!="")
    {
    //    $filename="/uploads/".$_FILES['file']['name'];
     //   move_uploaded_file($f_FILES['file']['tmp_name'], "uploads/".$filename);

   // if(file_exists($filename))
        $userC->ajouterimage($filename,$id);

header("Location:profil.php");


}else
{ echo"<div style='text-align:center;font-size:12px;color:white;background-color:grey'> <br> ";
  echo "<br> the following errors occured: <br> <br>";
  echo " pls add a valid image";
  echo "</div>";
}





}




  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gp Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Gp - v4.1.0
    * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0 "><a href="index.html"><span>E</span>T<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar ml-auto order-last order-lg-0">
            <ul>
            <li><a class="nav-link scrollto " href="index2.html">Accueil</a></li>
                <li><a class="nav-link scrollto" href="deconnexion.php" >Déconnexion</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1><span>ESPRIT</span>thèque<span>.</span></h1>
          <h2>Se documenter autrement</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bx bx-library"></i>
            <h3><a href="Revues.php">Ouvrages</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bx bx-brain"></i>
            <h3><a href="">Cours</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bx bx-message-rounded-detail"></i>
            <h3><a href="">Actualités</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="http://localhost/ESPRITHEQUE/views/evenements.php">Evènements</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bx bx-book"></i>
            <h3><a href="Livres.php">Livres</a></h3>
          </div>
        </div>
        
      </div>

    </div>
  </section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->


    <!-- ======= Clients Section ======= -->


    <!-- ======= Features Section ======= -->

    <section>
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                       <span style="font-size: 13px;"> 
                         <br>
                             <img src="uploads/<?php echo $image ?>"
                             class="avatar img-circle img-thumbnail" alt="avatar"> 
                             
                             <br>
                              Changer votre photo 
                            <br>
                            </span>

                         <br> 
                         <form method="POST" enctype="multipart/form-data">
                        <input type="file" class="text-center center-block file-upload" name="file">
                        <br>
                     
                        <input  name="tt" type="submit" class="btn btn-dark" value="Changer">
                           </form>

                    </div>
                    </hr><br>


                </div><!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">

                        <li class="active"><a data-toggle="tab" href="#messages">Fiche</a></li>
                        <li><a data-toggle="tab" href="#home">Modification</a></li>
                        <li><a data-toggle="tab" href="#reclamations">Réclamations</a></li>
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane " id="home">
                            <hr>
                            <form class="form" action="##" method="POST" id="registrationForm">
                            <div class="form-group">

                          <div class="col-xs-6">
                            <label ><h4>Votre Identifiant</h4></label>
                            <input type="text" class="form-control" name="id2" id="id"
                                placeholder="" title="peut pas etre changé" value="<?php echo $listeU[0]['Id'];?>">
                          </div>
                         </div> 
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>Votre Prénom</h4></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                               placeholder="" title="entrez votre nom." value="<?php echo $listeU[0]['Nom'];?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Votre Nom</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                               placeholder="" title="entrez votre prénom."value="<?php echo $listeU[0]['Prenom'];?>">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Numéro</h4></label>
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder=""
                                               title="entrez votre numéro." value="<?php echo $listeU[0]['tel'];?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="date"><h4>Date de Naissance</h4></label>
                                        <input type="date" class="form-control" name="date" id="date"
                                               title="entrez votre date de Naissance." value="<?php echo $listeU[0]['naiss'];?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="moi.you@esprit.tn" title="entrez votre email." value="<?php echo $listeU[0]['Email'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="password"><h4>Mot de Passe</h4></label>
                                        <input type="text" class="form-control" name="password" id="password" placeholder="" title="Tapez votre mdp."value="<?php echo $listeU[0]['mdp'];?>">
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <div class="col-xs-6" >
                                        <label for="classe"><h4>Classe</h4></label>
                                        <select class="form-control" name="class" id="class" style="height: 40px;">
                                            <?php 
                                            if ($listeU[0]['classe']=="1"){
                                                echo"<option selected='selected' value='1'>1ère Année</option>";
                                            }
                                            else{
                                                echo"<option value='1'>1ère Année</option>";
                                            }
                                            if ($listeU[0]['classe']=="2"){
                                                echo"<option selected='selected' value='2'>2ème Année</option>";
                                            }
                                            else{
                                                echo"<option value='2'>2ème Année</option>";
                                            }
                                            if ($listeU[0]['classe']=="3"){
                                                echo"<option selected='selected' value='3'>3ème Année</option>";
                                            }
                                            else{
                                                echo"<option value='3'>3ème Année</option>";
                                            }
                                            if ($listeU[0]['classe']=="4"){
                                                echo"<option selected='selected' value='4'>4ème Année</option>";
                                            }
                                            else{
                                                echo"<option value='4'>4ème Année</option>";
                                            }
                                            if ($listeU[0]['classe']=="5"){
                                                echo"<option selected='selected' value='5'>5ème Année</option>";
                                            }
                                            else{
                                                echo"<option value='5'>5ème Année</option>";
                                            }
                                            
                                            
                                            ?>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="sexe"><h4>Sexe</h4></label>
                                        <select class="form-control" name="sexe" id="sexe"  style="height: 40px;" value="<?php echo $listeU[0]['sexe'];?>">

                                            <?php 
                                            if ($listeU[0]['sexe']=="femme"){
                                                echo"<option selected='selected' value='femme'>Femme</option>";
                                            }
                                            else {
                                                echo "<option value='femme'>Femme</option>";
                                            }
                                            if ($listeU[0]['sexe']=="homme"){
                                                echo"<option selected='selected' value='homme'>Homme</option>";
                                            }
                                            else {
                                                echo "<option value='homme'>Homme</option>";
                                            }  
                                            if ($listeU[0]['sexe']=="autre"){
                                                echo"<option selected='selected' value='autre'>Autre</option>";
                                            }
                                            else {
                                                echo "<option value='autre'>Autre</option>";
                                            }                                             
                                            ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" name="save" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        
                                    </div>
                                </div>

                                

                            </form>

                            

                        </div><!--/tab-pane-->

                        <div class="tab-pane active" id="messages">

                            

                            <hr>
                            <form class="form" action="##" method="POST" id="registrationForm">
                            <div class="form-group">

                                    <div class="col-xs-6">
                             <label for="id"><h4>Votre Identifiant</h4></label>
                            <input type="text" class="form-control" name="id" id="id"
                            placeholder="" title="peut pas etre changé" disabled value="<?php echo $listeU[0]['Id'];?>">
                             </div>
                               </div>                            
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>Prénom</h4></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $listeU[0]['Prenom'];?>"disabled>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Nom</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $listeU[0]['Nom'];?>"disabled>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Numéro</h4></label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $listeU[0]['tel'];?>"disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="date"><h4>Date de Naissance</h4></label>
                                        <input type="text" class="form-control" name="date" id="date" value="<?php echo $listeU[0]['naiss'];?>"disabled>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $listeU[0]['Email'];?>"disabled>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="classe"><h4>Classe</h4></label>
                                        <input type="text" class="form-control" id="classe" value="
                                        <?php 
                                            if ($listeU[0]['classe']=="1"){
                                                echo"1ère Année";
                                            }
                                            
                                            
                                            if ($listeU[0]['classe']=="2"){
                                                echo"2ème Année";
                                            }
                                            
                                            
                                            if ($listeU[0]['classe']=="3"){
                                                echo"3ème Année";
                                            }
                                            
                                            
                                            if ($listeU[0]['classe']=="4"){
                                                echo"4ème Année";
                                            }
                                            
                                            if ($listeU[0]['classe']=="5"){
                                                echo"5ème Année";
                                            }
                                            
                                            
                                            ?>
                                        " disabled>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="sexe"><h4>sexe</h4></label>
                                        <input type="text" class="form-control" name="sexe" id="sexe" value="<?php echo $listeU[0]['sexe'];?>" disabled>
                                    </div>
                                </div>
                                

                            </form>

                        </div><!--/tab-pane-->




                       

                          <div class="tab-pane" id="reclamations">
                          <hr>
                            <form class="form" action="profil.php" method="post" id="registrationForm">
                          

                                     <div class="form-group">
                                         <div class="col-xs-12">
                                           <label>Sujet</label>
                                            <select class="form-control" name="sujet" id="sujet" style="height: 40px;">
                                                   <option value="Produit">Produit</option>
                                                    <option value="Site">Site</option>
                                                        <option value="Service">Service</option>
                        
                        
                                            </select> 
                                        </div>
                  
                                   </div>             
                                   <div class="col-xs-12">
                                  <label ><h4> Détails </h4></label>
                            <br>
                            <textarea name="details" style="width:800px; height:300px;">
                           
                            </textarea>
                          </div>              
                                
                          <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        
                                        <button class="btn btn-lg btn-success" name="send" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Envoyer </button>
                                        
                                    </div>
                                </div>
                                
                                

                            </form>

                        </div><!--/tab-pane-->
                                        

















                    </div><!--/tab-content-->

                </div><!--/col-9-->
            </div><!--/row-->
        </div>

    </section>
    <!--end connexion section-->


</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
              
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Contact:</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#"> <strong> Téléphone:</strong> +216 55 622 768<br></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#"><strong> Adresse:</strong> El Ghazela<br></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#"><strong> Email:</strong> Esprithèque@esprit.tn <br></a></li>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </ul>
          </div>

                

                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Gp</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>

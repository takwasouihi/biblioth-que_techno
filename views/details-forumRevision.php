<?php
    include "../config.php";
    require_once '../model/forum.php';
    require_once '../controller/CForum.php';
    include_once '../controller/commentaireC.php';
    include_once '../model/commentaire.php';
    
    
    $connection=mysqli_connect('localhost','root','','web');
    $result1=mysqli_query($connection, "SELECT  * FROM forum");



    $CForum = new CForum();
    $commentaireC = new commentaireC();

     
    $listeU=$CForum->afficherForumRevision();

    $listeR=$commentaireC->affichercommentaire();

    


    if(isset($_POST['modifier'])){
      $Forum2=$CForum->findForum($_POST['idForum']);
  
      
      foreach($Forum2 as $u){
      
  
        $id=$u['idForum'];
        $nom=$u['nomForum'];
        $contenu=$u['contenu'];
        $typpe=$u['typpe'];

        
  
      }
      
    }
    


if(isset($_POST['search']))
{
  $listeU=$CForum->rechercherForum($_POST['valueToSearch']);
}
 
if(isset($_POST['search1']))
{
  $listeR=$commentaireC->recherchercommentaire($_POST['valueToSearch1']);
}
    
 
if(isset($_POST['DSC']))
{ 
  $listeR=$commentaireC->tridsc();
}
 
if(isset($_POST['ASC']))
{ 
  $listeR=$commentaireC->triasc();
}

if(isset($_POST['DSCU']))
{ 
  $listeU=$CForum->tridscu();
}
 
if(isset($_POST['ASCU']))
{ 
  $listeU=$CForum->triascu();
}


/*if(isset($_POST['pdf']))
{ require_once('../../tcpdf/tcpdf.php');
  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $obj_pdf->SetCreator(PDF_CREATOR);
  $obj_pdf->SetTitle("Export HTML table to pdf");
  $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj_pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetFooterFont(array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
 $obj_pdf->SetDefaultMonospacedFont('helvetica');
 $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
  $obj_pdf->setPrintHeader(false);
  $obj_pdf->setPrintFooter(false);
  $obj_pdf->setAutoPageBreak(TRUE,10);
  $obj_pdf->setFont('helvetica','',12);
  $obj_pdf->AddPage();
  //$content='';
  //$content=$commentaireC->affichercommentaire();
  $obj_pdf->writeHTML($content);
  $obj_pdf->Output("sample.pdf");



}*/

















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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html"><span>E</span>T<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        
      <ul>
              <li><a class="nav-link scrollto " active href="index.html">Accueil</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/ESPRITHEQUE/views/profil.php">Profil</a></li>
          <li><a class="nav-link scrollto" href="#about">Ouvrages</a></li>
          <li><a class="nav-link scrollto" href="#services">Cours</a></li>
          <li><a class="nav-link scrollto " href="http://localhost/ESPRITHEQUE/views/forum-details.php">Actualités</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/ESPRITHEQUE/views/evenements.php">Evènements</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/ESPRITHEQUE/views/Livres.php">Livres</a></li>
          <li><a class="nav-link scrollto" href="http://localhost/ESPRITHEQUE/views/deconnexion.php">Deconnexion</a></li>
          

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
            <h3><a href="details-forumLivres.php">Livres</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bx bx-brain"></i>
            <h3><a href="details-forumExamens.php">Examens</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bx bx-message-rounded-detail"></i>
            <h3><a href="">Revisions</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="details-forumInfo.php">Informatiques</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bx bx-book"></i>
            <h3><a href="details-forumAutres.php">Autres</a></h3>
          </div>
        </div>
        
      </div>

    </div>
  </section><!-- End Hero -->
<section>
  <?php
                           foreach($listeU as $forum) {
                             ?> 
                           <form>
                            
                           
                           
                           <div >
          
          <div class=" text-center">
            <header>
            <h3 class="blog-title"> <a href="details-forumLivres2.php?idForum=<?PHP echo $forum['idForum']; ?>"><?=$forum['contenu']; ?></a></h3>
              <div class="post-meta">
                <span class="post-author">
                  <i class="fas fa-user"></i>
                  <span class="text-gray">Posted : <?=$forum['date_creation']; ?></span>
                  
                </span>
              </div>

            </header>
            
            

								
            </div>
          </div>
        </div>
                          
                          </form>
                           <?php
                          } ?>
</section>
   <section id="Create" class="Create">
   <div class="row">
            <div class="col-lg-6">
              <div >
                <div class="card-header d-flex align-items-center">
                  <h4>Ajouter un Forum</h4>
                </div>
                <div >
                  <p>Veuillez remplir les champs suivants:</p>
                  <form  method="POST" onsubmit="return verif()"  action="ProcessForum.php" > 
                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text" name="name" id="name" class="form-control"  value="<?php if (isset($nom)) echo $nom; ?>" >
                    </div>
                    <div class="form-group">
                      <label>Sujet</label>
                      <input type="text"  name="cont" id="cont" class="form-control" value="<?php if (isset($contenu)) echo $contenu ?>"  >
                    </div>

                  

                  
                    <div class="form-group">
                    <label>Type</label>
                      <select class="form-control" name="typp" id="typp"  >
                  <option value="Révisions">Révsions</option>
                  
                  </select>

                  </div>

                  <button  name="submit" class="btn btn-dark" style="margin-left:170px;"> ajouter</button>
                    
                  </form>
                </div>
              </div>
            </div>
    </section>

    
    <!--end connexion section-->

    <div class="container-fluid">
          

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
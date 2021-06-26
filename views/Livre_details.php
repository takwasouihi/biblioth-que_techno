<?php

session_start();

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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style2.css"/>
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

        <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar  order-last order-lg-0">
            <ul>
            <li><a class="nav-link scrollto " href="index.html">Accueil</a></li>
                    <li><a class="nav-link scrollto" href="#about">Ouvrages</a></li>
          <li><a class="nav-link scrollto" href="#services">Cours</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Actualités</a></li>
          <li><a class="nav-link scrollto" href="#team">Evènements</a></li>
          <li><a class="nav-link scrollto" href="Livres.php">Livres</a></li>
                <?php
                if (isset($_SESSION['e']))
                {
                    ?>
                    <li><a class="nav-link scrollto" href="deconnexion.php">déonnexion</a></li>
                    <?php
                }
                else {
                    ?>
                    <li><a class="nav-link scrollto" active href="connexion.php">Connexion</a></li>
                    <?php
                }
                ?>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        

    </div>
</header><!-- End Header -->

<?php include "../controller/livres.php";
$l = new livres();
$result = $l->afficherlivre($_GET['id']);
while ($row = $result->fetch()){
?>
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
                <div class="icon-box2">
                    <i class="bx bx-library"></i>
                    <h3><a href="Livres.php">Livres Et Ouvrages</a></h3>
                </div>
            </div>


        </div>

    </div>
  </section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->


    <!-- ======= Clients Section ======= -->


    <!-- ======= Features Section ======= -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="livres/<?php echo $row["image"]; ?>" style="width: 400px ; height: 450px"
                                     alt="">
                            </div>


                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Details de Livre </h3>
                        <ul>
                            <li><strong>Titre </strong>: <?php echo $row["titre"]; ?></li>
                            <li><strong>Categorie </strong>: <?php echo $row["categorie"]; ?></li>
                            <li><strong>Auteur</strong>: <?php echo $row["nomAuteur"]; ?></li>
                            <li><strong>Date de sortie</strong>:<?php echo $row["dateS"]; ?></li>
                            <li><strong>Prix </strong>: <?php echo $row["prix"]; ?> DT</li>
                            <li><strong>Disponiblité </strong>: <?php if ($row['stock'] > 0) { ?>
                                    en stock
                                <?php } else { ?> En rupture de stock     <?php } ?>
                            </li>
                        </ul>
                        <br>
                        <div class="product-rating">
                            <strong>notez ce livre :</strong>
                            <?php
                            if (isset($_SESSION['e'])) {
                                $idc = $_SESSION['e'];

                                //afficher note
                            } else {
                                $idc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            }
                            $idl = $_GET['id'];
                            $sql = " SELECT * from note where (id_client='$idc' and  id_livre=$idl)";
                            $db = config::getConnexion();

                            $listnote = $db->query($sql);


                            if ($listnote->rowCount()) {

                            foreach ($listnote

                            as $row1){

                            for ($i = 0;
                            $i < 5;
                            $i++){
                            if ($row1['note'] > $i)
                            {
                            ?>
                            <td width="80%"><a
                                        href="<?php echo "../controller/ajouter_note.php?id=" . $idc . "&note=" . ($i + 1) . "&livre=" . $idl . "" ?> "
                                        class="social-info">
                                    <i class="fa fa-star"></i>
                                    <?php }else{ ?>
                            <td>
                                <a href="<?php echo "../controller/ajouter_note.php?id=" . $idc . "&note=" . ($i + 1) . "&livre=" . $idl . "" ?> "
                                   class="social-info">
                                    <i class="fa fa-star-o empty"></i> </a>
                                <?php }
                                }
                                }
                                ?>
                                <?php
                                }
                                else{
                                for ($i = 0;
                                $i < 5;
                                $i++){
                                ?>
                            <td>
                                <a href="<?php echo "../controller/ajouter_note.php?id=" . $idc . "&note=" . ($i + 1) . "&livre=" . $idl . "" ?> "
                                   class="social-info">
                                    <i class="fa fa-star-o empty"> </i> </a>
                                <?php
                                }
                                } ?>

                        </div>
                        <br>
                        <div class="product-btns">
                            <div class="qty-input">
                                <span class="text-uppercase">Nombre d'exemplaire: </span>
                                <input class="input" type="number" style="width: 90px">

                            </div>
                            <br>
                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> ajouter au
                                panier
                            </button>
                            <div class="pull-right">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="portfolio-description">

                    <h2>Description de livre </h2>
                    <span> Reference :   <?php echo $row["ID"]; ?> </span>
                    <p>
                        <?php echo $row["description"];
                        } ?>
                    </p>

                </div>
                <div>

                </div>

            </div>
    </section><!-- End Portfolio Details Section -->
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

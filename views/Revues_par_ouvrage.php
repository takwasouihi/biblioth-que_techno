<?php

include "../controller/ouvrages.php";
include "../controller/revues.php";
$l = new revues();
$c = new ouvrages();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}
if ($page == "" || $page == 1) {
    $page_1 = 0;
} else {
    $page_1 = ($page * 6) - 6;
}
$result = $l->afficherrevueparcategorie($_GET['categorie'], $page_1);
$top = $l->top5();
$ouvrages = $c->selectouvrage();
$count = ceil(($l->countbyouvrage($_GET['categorie'])) / 6);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DIGITAL_IMPERIUM</title>
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
                    <li><a class="nav-link scrollto" href="Livres.php">Livres</a></li>
          <li><a class="nav-link scrollto" href="#services">Cours</a></li>
          <li><a class="nav-link scrollto " href="Evenements.php">Actualités</a></li>
          <li><a class="nav-link scrollto" href="#team">Evènements</a></li>
          <li><a class="nav-link scrollto" href="revues.php">Revues</a></li>
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
            <h3><a href="revues.php">REVUE</a></h3>
          </div>
        </div>

        
      </div>

    </div>
  </section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->


    <!-- ======= Clients Section ======= -->


    <!-- ======= Features Section ======= -->

    <section class="inner-page">
        <div class="container">

            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter par ouvrage</h3>
                        <ul class="list-links">
                            <?php foreach ($categories

                            as $row)  { ?>
                            <li>
                                <a href="Revues_par_ouvrage.php?ouvrage=<?php echo $row["name"]; ?>"><?php echo $row["name"];
                                    } ?></a></li>


                        </ul>
                    </div>
                    <!-- /aside widget -->
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Revue le plus vue</h3>

                        <?php foreach ($top as $row) { ?>
                            <div class="product product-widget">
                                <div class="product-thumb">
                                    <img src="revues/<?php echo $row["image"]; ?>" alt="">
                                </div>
                                <div class="product-body">
                                    <h2 class="product-name"><a
                                                href="Revue_details.php?id=<?php echo $row["ID"]; ?>"><?php echo $row["titre"]; ?></a>
                                    </h2>
                                    <h3 class="product-price"><?php echo $row["prix"]; ?> EU </h3>
                                    
                                        <?php
                                        $idl= $row["ID"];
                                        $sql = " SELECT * from revues where (ID='$idl')";
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
                                        <td width="80%">
                                            <i class="fa fa-star"></i>
                                            <?php }else{ ?>
                                        <td>
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
                                            
                                            <?php

                                            }
                                            } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>

                </div>
                <div id="main" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">

                            </div>

                        </div>
                        <div class="pull-right">

                            <ul class="store-pages">

                                <?php
                                if ($count > 1) { ?>
                                    <li><span class="text-uppercase">Page:</span></li>
                                    <?php
                                    $c = $_GET['ouvrage'];
                                    for ($i = 1; $i <= $count; $i++) {
                                        if ($i == $page) {
                                            echo "<li> <a style='color: orangered' href='revues_par_ouvrage.php?ouvrage={$c}&page={$i}'>{$i}</a> </li>  ";
                                        } else {
                                            echo "<li> <a href='revues_par_ouvrage.php?ouvrage={$c}&page={$i}'>{$i}</a> </li>  ";
                                        }

                                    }
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->

                        <div class="row">

                            <!-- Product Single -->
                            <?php

                            foreach ($result as $row) { ?>
                                <div class="col-md-4 col-sm-6 col-xs-6">

                                    <div class="product product-single">
                                        <div class="product-thumb">

                                            <button onClick="location.href='Revue_details?id=<?php echo $row["ID"]; ?>'"
                                                    class="main-btn quick-view"><i class="fa fa-search-plus"></i> Voir Plus

                                            </button>
                                            <img style="width: 250px; height: 200px"
                                                 src="revues/<?php echo $row["image"]; ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <div class="product-rating">
                                                <?php

                                                $idp = $row["ID"];
                                                $sql = " SELECT * from revues where (ID='$idp')";
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
                                                <td width="80%">
                                                    


                                                    <?php }else{ ?>


                                                <td>
                                                    
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
                                                    


                                                    <?php

                                                    }
                                                    } ?>
                                            </div>
                                            <h2 class="product-name"><a
                                                        href="Revue_details?id=<?php echo $row["ID"]; ?>"><?php echo $row["titre"]; ?></a>
                                            </h2>
 
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>

                            <?php
                            $count2 = ceil(($l->countbycategorie($_GET['categorie'])));
                            if ($count2 == 0) {
                                ?>
                                <H2 style="color: red">DÉSOLÉ NOUS N'AVONS AUCUN revue DANS CETTE OUVRAGE</H2>
                            <?php } else { ?>

                                <H1 style="color: red"></H1>
                            <?php } ?>



                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">

                            </div>

                        </div>
                        <div class="pull-right">

                            <ul class="store-pages">

                                <?php
                                if ($count > 1) { ?>
                                    <li><span class="text-uppercase">Page:</span></li>
                                    <?php
                                    $c = $_GET['ouvrage'];
                                    for ($i = 1; $i <= $count; $i++) {
                                        if ($i == $page) {
                                            echo "<li> <a style='color: orangered' href='Revues_par_ouvrage.php?ouvrage={$c}&page={$i}'>{$i}</a> </li>  ";
                                        } else {
                                            echo "<li> <a href='Revues_par_ouvrage.php?ouvrage={$c}&page={$i}'>{$i}</a> </li>  ";
                                        }

                                    }
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
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

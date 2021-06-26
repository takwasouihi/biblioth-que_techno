<?php

include "../../model/Categorie.php";
include "../../controller/categories.php";
include "../../controller/livres.php";
$connection=mysqli_connect('localhost','root','','web');

if (isset($_GET['id'])) {
    $c = new categories();
    $result = $c->affichercategorie($_GET['id']);
}
?>
<?php
foreach ($result

as $row){
$id = $row['id'];
$nom = $row['name'];


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Esprithèque</title>
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
    <script src="../../verifadmin.js"></script>
</head>
<body>
<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
                <h2 class="h5">Esprithèque</h2><span>Espace Admin</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Menu</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="forms.html"> <i class="icon-user"></i>Etudiants</a></li>
                <li><a href="index.html"> <i class="icon-bill"></i>Ouvrages</a></li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                                class="icon-interface-windows"></i>Gestion des livres </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="livres.php"> <i class="icon-check"></i>Livres</a></li>
                        <li class="active"><a href="categories.php">Categories</a></li>

                    </ul>
                </li>

                <li><a href="tables.html"> <i class="icon-clock"></i>Evènements</a></li>
                <li><a href="login.html"> <i class="icon-pencil-case"></i>Cours </a></li>
                <li> <a href="#"> <i class="icon-paper-airplane"></i>Actualités</a></li>
            </ul>
        </div>

    </div>
</nav>
<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block"><strong class="text-primary"> Esprit</strong><span>thèque </span></div></a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                        <!-- Messages dropdown-->
                        <?php
                        $sql_get = mysqli_query($connection,"SELECT * FROM reclamations WHERE status=0");
                        $count= mysqli_num_rows($sql_get);
                        ?>


                        <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-danger" id="count" ><?php echo $count; ?></span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <?php
                                $sql_get1 = mysqli_query($connection,"SELECT * FROM reclamations WHERE status=0");
                                if (mysqli_num_rows($sql_get1)>0)
                                {
                                    while($result=mysqli_fetch_assoc($sql_get1))
                                    {
                                        echo '<a class="dropdown-item text-dark font-weight-bold href="#">'.$result['Sujet'].'</a>';
                                        echo '<a class="dropdown-item text-danger href="#">'.$result['comment'].'</a>';
                                        echo '<div class="dropdown-divider"></div>';

                                    }
                                }
                                else
                                {
                                    echo "Pas de notifications";
                                } ?>


                                <li><a rel="nofollow" href="#rec" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-list"></i> Voir tous les détails</strong></a></li>
                            </ul>
                        </li>

                        <!-- Log out-->
                        <li class="nav-item"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline-block">Se déconnecter</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<!-- Header Section-->
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">

            <form method="post" action="../../controller/modifier_categorie.php" style="margin: 0 auto;
    width:80%">


                <input type="text" hidden name="ID" value=" <?php echo $id; ?>" class="form-control" id="ID">
                <div class="col-12 col-md-9">
                    <label>Categorie:</label>
                    <input type="text" required name="name" value=" <?php echo $nom; ?>" class="form-control"
                           id="reference">
                </div>

                <div>
                    <br>
                    <br>
                    <button type="submit" name='modifier' class="btn btn-primary">modifier</button>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">reset</button>
                </div>
            </form>
            <?PHP

            }
            ?>
        </div>
</section>


<!-- JavaScript files-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/charts-home.js"></script>
<!-- Main File-->
<script src="js/front.js"></script>
</body>
</html>
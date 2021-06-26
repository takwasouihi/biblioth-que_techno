<?php
include "../../model/Categorie.php";
include "../../controller/categories.php";
include "../../controller/livres.php";
$l = new livres();
$c = new categories();
$categories = $c->selectcategorie();
$connection=mysqli_connect('localhost','root','','web');
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
            <li ><a href="forms.php"> <i class="icon-user"></i>Etudiants</a></li>
            <li><a href="cathegorieProd.php?page=1"> <i class="icon-bill"></i>Ouvrages</a></li>
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                              class="icon-interface-windows"></i>Gestion des livres </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <li class="active" ><a href="livres.php"> Livres</a></li>
                      <li><a href="categories.php">Categories</a></li>

                  </ul>
              </li>
            <li><a href="evenements.php"> <i class="icon-clock"></i>Evènements</a></li>
            <li><a href="login.html"> <i class="icon-pencil-case"></i>Cours </a></li>
            <li> <a href="ForumDash.php"> <i class="icon-paper-airplane"></i>Actualités</a></li>
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
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Livres</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoutModal">
                Ajouter un livre
            </button>
            <div class="row d-flex align-items-md-stretch">


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Listes des livres</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Referecne</th>
                                        <th>Titre</th>
                                        <th>Auteur</th>
                                        <th>Categorie</th>
                                        <th>Description</th>
                                        <th>Date de sortie</th>
                                        <th>Image</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th width="17%">Actions</th>

                                    </tr>
                                    </thead>
                                    <?php

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
                                    $result = $l->afficher($page_1);

                                    $count = ceil(($l->count()) / 6);


                                    ?>
                                    <tbody>
                                    <?php
                                    $j = 0;
                                    foreach ($result as $row)

                                    {   $j++; ?>
                                    <tr>
                                        <th scope="row"><?php echo $j ; ?></th>
                                        <td><?php echo $row["reference"]; ?></td>
                                        <td><?php echo $row["titre"]; ?></td>
                                        <td><?php echo $row["nomAuteur"]; ?></td>
                                        <td><?php echo $row["categorie"]; ?></td>
                                        <td><?php echo $row["description"]; ?></td>
                                        <td><?php echo $row["dateS"]; ?></td>
                                        <td><img id="output2" style="  height:70px  ;width:110px ;   "
                                                 src="../livres/<?php echo $row["image"] ?>"/></td>
                                        <td><?php echo $row["prix"]; ?></td>
                                        <td><?php echo $row["stock"]; ?></td>
                                        <td>
                                            <form action="modifier_livre.php" style="float:left;">

                                                <button class="btn btn-sm btn-success" type="submit" name="modifier"
                                                        value="modifier"><i class="fa fa-pencil"> </i> Update
                                                </button>

                                                <input type="hidden" value="<?php echo $row['ID']; ?>" name="id">

                                            </form>
                                            <form action="../../controller/supprimer_livre.php" style="float:right;">
                                                <button class="btn btn-sm btn-danger" type="submit" id="supprimer"
                                                        name="supprimer" value="supprimer"><i class="fa fa-trash"></i>
                                                    Delete
                                                </button>

                                                <input type="hidden" id="id" value="<?php echo $row['ID']; ?>" name="id">
                                            </form>
                                        </td>
                                    </tr>


                                    </tbody>
                                <?php } ?>
                                </table>
                            </div>
                            <div>
                                <ul class="pagination">
                                    <?php
                                    if ($count > 1) {
                                        for ($i = 1; $i <= $count; $i++) {
                                            if ($i == $page) {
                                                echo "<li> <a  style=' color: white;  background: #33b35a ; width: 15px' href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                            } else {
                                                echo "<li> <a href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                            }

                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </section>


        <!-- Modal AJOUT  -->
        <div class="modal fade" id="ajoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ajouter un livre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div>

                        <form method="post" action="../../controller/ajouterlivre.php" enctype='multipart/form-data'>


                            <div class="col-12 col-md-9">
                                <label>Reférence:</label>
                                <input type="text" required name="reference" class="form-control" id="reference">
                            </div>
                            <div class="col-12 col-md-9">
                                <label>Titre:</label>
                                <input type="text" required name="titre" class="form-control" id="titre">
                            </div>
                            <div class="col-12 col-md-9">
                                <label>Auteur:</label>
                                <input type="text" required name="auteur" class="form-control" id="auteur">
                            </div>
                            <div class="col-12 col-md-9">
                                <label>Date de sortie:</label>
                                <input type="date" id="date" name="date" class="form-control " required><br>
                            </div>

                            <div class="col-12 col-md-9">
                                <label>Categorie</label>
                                <?php if ($categories->rowCount() > 0) { ?>
                                    <select class="myselect" style="width:200px;" name="categorie" id="categorie"> <?php
                                        foreach ($categories

                                        as $row) { ?>
                                        <option value="<?PHP echo $row['name']; ?>">  <?PHP echo $row['name'];
                                            } ?></option>
                                    </select>

                                <?php } else { ?>  <h4 style="color:#ff004a">vous n'avez pas encore de
                                    catégorie </h4>    <?php } ?>

                            </div>
                            <div class="col-12 col-md-9">
                                <label>DESCRIPTION:</label>
                                <textarea type="text" name="description" required class="form-control" id="des"> </textarea>
                            </div>


                            <div class="col-12 col-md-9">
                                <label>PRIX:</label>
                                <input style="width: 200px" required type="number" name="prix" class="form-control" id="prix">
                                <span id="error_price" class="text-danger"></span>
                            </div>
                            <div class="col-12 col-md-9">

                                <label>Stock:</label>
                                <input style="width: 200px" required type="number" name="stock" class="form-control" id="stock">
                                <span id="error_stock" class="text-danger"></span>

                            </div>
                            <div class="col-12 col-md-9">
                                <label for="images_input" class=" form-control-label">Images </label>
                                <input type="file" required id="images_input" name="fileToUpload" onchange="readURL(this);"
                                       class="form-control-file">
                                <br>
                                <img id="preview" src="#" alt=""/>


                            </div>

                    </div>
                    <div class="modal-footer">
                        <?php if ($categories->rowCount() <= 0) { ?>
                            <input type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal2"
                                   value="Envoyer" id="button-blue" name="button-blue">
                        <?php } else { ?>
                            <button type="submit" name='ajout' class="btn btn-primary">Ajouter</button>
                        <?php } ?>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4 style="color: red">vous devez ajouter au moins une categorie
                            <a href="categories.php">ajouter une categorie ..</a>
                        </h4>
                    </div>

                </div>
            </div>
        </div>





      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p> Esprithèque &copy; 2020-2021</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
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
    <script src="js/charts-home.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="js/verifier.js"></script>
  </body>
</html>
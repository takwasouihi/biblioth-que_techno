<?php
    include "../../config.php";
    require_once '../../model/user.php';
    require_once '../../controller/userC.php';
    include_once '../../controller/reclamationC.php';
    include_once '../../model/reclamation.php';
    
    $connection=mysqli_connect('localhost','root','','web');
    $sexeClasse1=mysqli_query($connection, "SELECT  count(*),sexe FROM etudiants where classe='1' GROUP BY sexe");
    $sexeClasse2=mysqli_query($connection, "SELECT  count(*),sexe FROM etudiants where classe='2' GROUP BY sexe");
    $sexeClasse3=mysqli_query($connection, "SELECT  count(*),sexe FROM etudiants where classe='3' GROUP BY sexe");
    $sexeClasse4=mysqli_query($connection, "SELECT  count(*),sexe FROM etudiants where classe='4' GROUP BY sexe");
    $sexeClasse5=mysqli_query($connection, "SELECT  count(*),sexe FROM etudiants where classe='5' GROUP BY sexe");


    $data1=array();
    $h=0;
    $f=0;
    $a=0;
    while($row = mysqli_fetch_array($sexeClasse1)){
        if($row[1]=="homme"){
          
           $h=$row[0];
        }
        if($row[1]=="femme"){
          $f=$row[0];
        }
        if($row[1]=="autre"){
            $a=$row[0];
        }
    }   
    array_push($data1,$h,$f,$a);
    $h=0;
    $f=0;
    $a=0;



    $data2=array();
    while($row = mysqli_fetch_array($sexeClasse2)){
        if($row[1]=="homme"){
          $h=$row[0];
        }
        if($row[1]=="femme"){
          $f=$row[0];
        }
        if($row[1]=="autre"){
          $a=$row[0];
        }
    }   
    array_push($data2,$h,$f,$a);
    $h=0;
    $f=0;
    $a=0;

    $data3=array();
    while($row = mysqli_fetch_array($sexeClasse3)){
        if($row[1]=="homme"){
          $h=$row[0];
        }
        if($row[1]=="femme"){
          $f=$row[0];
        }
        if($row[1]=="autre"){
          $a=$row[0];
        }
    }   
    array_push($data3,$h,$f,$a);
    $h=0;
    $f=0;
    $a=0;
     
    $data4=array();
    while($row = mysqli_fetch_array($sexeClasse4)){
        if($row[1]=="homme"){
          $h=$row[0];
        }
        if($row[1]=="femme"){
          $f=$row[0];
        }
        if($row[1]=="autre"){
          $a=$row[0];
        }
    }   
    array_push($data4,$h,$f,$a);
    $h=0;
    $f=0;
    $a=0;
       
    $data5=array();
    while($row = mysqli_fetch_array($sexeClasse5)){
        if($row[1]=="homme"){
          $h=$row[0];
        }
        if($row[1]=="femme"){
          $f=$row[0];
        }
        if($row[1]=="autre"){
          $a=$row[0];
        }
    }   
    array_push($data5,$h,$f,$a);
    $h=0;
    $f=0;
    $a=0;
       
        



    $userC = new userC();
    $reclamationC = new reclamationC();

     
    $listeU=$userC->afficherUser();

    $listeR=$reclamationC->afficherReclamation();

    


    if(isset($_POST['modifier'])){
      $user2=$userC->findUser($_POST['id2']);
  
      
      foreach($user2 as $u){
      
  
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
      
    }
    


if(isset($_POST['search']))
{
  $listeU=$userC->rechercherUser($_POST['valueToSearch']);
}
 
if(isset($_POST['search1']))
{
  $listeR=$reclamationC->rechercherReclamation($_POST['valueToSearch1']);
}
    
 
if(isset($_POST['DSC']))
{ 
  $listeR=$reclamationC->tridsc();
}
 
if(isset($_POST['ASC']))
{ 
  $listeR=$reclamationC->triasc();
}
if(isset($_POST['DSCU']))
{ 
  $listeU=$userC->tridscu();
}
 
if(isset($_POST['ASCU']))
{ 
  $listeU=$userC->triascu();
}




















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
            <li class="active"><a href="forms.html"> <i class="icon-user"></i>Etudiants</a></li>
            <li><a href="cathegorieProd.php?page=1"> <i class="icon-bill"></i>Ouvrages</a></li>
            <li><a href="livres.php"> <i class="icon-check"></i>Livres</a></li>
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
                <li class="nav-item"><a href="logad.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Se déconnecter</span><i class="fa fa-sign-out"></i></a></li>
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
            <li class="breadcrumb-item active">Etudiants</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">   Etudiants          </h1>
          </header>
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Lise des étudiants</h4> <br>
                  <form method="POST">
                  <input type="text" name="valueToSearch" placeholder="valeur à chercher" style="width:150px; height:39px;">
                 
                 <button type="submit"  class="btn btn-dark" name="search"  >  <i class="fa fa-search" > </i></button>
          
                 <button type="submit" class="btn btn-danger pull-right " name="ASCU" value="ASCU">  <i class="fa fa-sort-up"> </i></button>
                  <button type="submit" class="btn btn-danger pull-right" style="margin-right:10px;"  name="DSCU" value="DSCU" >  <i class="fa fa-sort-down"> </i></button>
                  <br><br>
                
              </form>
              <form action="excel.php" method="post">
                 <input type="submit" name="export_excel" class="btn btn-success  pull-right" value="excel"/>
                </form>
            
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead  class="thead-dark">
                        <tr>
                          <th>Identifiant</th>
                          <th>Email</th>
                          <th>Nom</th>
                          <th>Préom</th>
                          <th>Numéro</th>
                          <th>Classe</th>
                          <th>Date de Naissance</th>
                          <th>Sexe</th>
                          <th>Mot de Passe</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                           foreach($listeU as $user) {
                             ?> 
                           <tr> 
                           <td><?php echo $user['Id']; ?></td>
                           <td><?php echo $user['Email']; ?></td>
                           <td><?php echo $user['Nom']; ?></td>
                           <td><?php echo $user['Prenom']; ?></td>
                           <td><?php echo $user['tel']; ?></td>
                           <td><?php echo $user['classe']; ?></td>
                           <td><?php echo $user['naiss']; ?></td>
                           <td><?php echo $user['sexe']; ?></td>
                           <td><?php echo $user['mdp']; ?></td>
                           <td><?php echo "<img class='img-fluid rounded-circle' width='50%' src='../uploads/".$user['pic']."'>"; ?></td>
                           
                           <td>
                           <form action="avertissement.php" method="POST">
                               <input type="hidden" name="avertissement" value="<?php echo $user['Id']; ?>" >
                              
                               <button type="submit" class="btn btn-dark "  style="width:37px; height:37px;">  <i class="fa fa-exclamation-triangle" > </i></button>
                             </form>
                             <form action="supression.php" method="POST">
                               <input type="hidden" name="id" value="<?php echo $user['Id']; ?>" >
                              
                               <button type="submit" class="btn btn-danger "  >  <i class="fa fa-trash" > </i></button>
                             </form>

                             <form method="POST">
                              <input type="hidden" name="id2" value="<?php echo $user['Id']; ?>" >
                              <button type="submit" class="btn btn-dark"  name="modifier"  ><i class="fa fa-pencil"> </i></button>
                              
                           </form>
                           </td>

                          </tr>
                           <?php
                          } ?>
                      
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Ajouter un étudiant</h4>
                </div>
                <div class="card-body">
                  <p>Veuillez remplir les champs suivants:</p>
                  <form  method="POST" onsubmit="return verif()"  action="test.php" > 
                    <div class="form-group">
                      <label>Prénom</label>
                      <input type="text" name="name" id="name" class="form-control"  value="<?php if (isset($prenom)) echo $prenom; ?>" >
                    </div>
                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text"  name="fname" id="fname" class="form-control" value="<?php if (isset($nom)) echo $nom ?>"  >
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="email" 
                       class="form-control" value="<?php if (isset($mail )) echo $mail ?>"  >
                    </div>
                    <div class="form-group">
                      <label>Identifiant</label>
                      <input type="text" name="id1" id="id1" class="form-control" value="<?php if (isset($id)) echo $id ?>">
                      <input type="text" name="idu" id="idu" class="form-control" value="<?php if (isset($id)) echo $id ?>" hidden>
                    </div>
                    <div class="form-group">
                      <label>Téléphone</label>
                      <input type="tel" name="num" id="num" class="form-control" value="<?php if (isset($telephone)) echo $telephone ?>"  >
                    </div>
                    <div class="form-group">
                      <label>Date Naissance</label>
                      <input type="date" class="form-control" name="date" id="date"  value="<?php if (isset($dateNaissance)) echo $dateNaissance ?>">
                    </div>
                    <div class="form-group">
                      <label>Classe</label>
                      <select class="form-control" name="class" id="class"  >
                  <option value="1">1ère Année</option>
                  <option value="2">2ème Année</option>
                  <option value="3">3ème Année</option>
                  <option value="4">4ème Année </option>
                  <option value="5">5ème Année</option>
                  

                 </select>

                    </div>
                    <div class="form-group">
                      <label>Sexe</label>
                     <select class="form-control" name="sex" id="sex"  >
                      <option value="femme">Femme</option>
                      <option value="homme">Homme</option>
                        <option value="autre">Autre</option>
                        
                        
                       </select>
                  
                    </div>

                    <div class="form-group">       
                      <label>Password</label>
                      <input type="Mot de Passe" name="passw" id="passw" class="form-control" value="<?php  if (isset($password)) echo $password ?>"  >
                    </div>
                    <div class="form-group">      
                    
                    <div id="erreur">

                    </div >     
                   
                   <button  name="submit" class="btn btn-dark" style="margin-left:170px;">  <i class="fa fa-plus" > </i></button>
                   <button type="submit" name="updatesubmit" class="btn btn-dark" >  <i class="fa fa-save" > </i></button>
                   
                    </div>
                  </form>
                </div>
              </div>
            </div>

             


           


            <div class="col-lg-6">
              <div class="card">
                <div id="rec" class="card-header">
                  <h4>Lise des réclamations</h4> <br>
                  <form method="POST">
                  <input type="text" name="valueToSearch1" placeholder="valeur à chercher" style="width:150px; height:39px;">
                  <button type="submit"  class="btn btn-dark" name="search1" >  <i class="fa fa-search" > </i></button>
                  <a target="_blank" href="generate_pdf.php" class="btn btn-dark pull-right" > <i class="icon-bill"></i></a>
                  <button type="submit" class="btn btn-danger pull-right " style="margin-right:10px;" name="ASC" value="ASC">  <i class="fa fa-sort-up"> </i></button>
                  <button type="submit" class="btn btn-danger pull-right" style="margin-right:10px;"  name="DSC" value="DSC" >  <i class="fa fa-sort-down"> </i></button><br><br>
              </form>
              
            
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  
                    <table class="table table-striped table-sm">
                      <thead class="thead-dark">
                        <tr>
                          <th>Etudiant</th>
                          <th>Sujet</th>
                          <th>Commentaire</th>
                          <th>Numéro</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                           foreach($listeR as $reclamation) {
                             ?> 
                           <tr> 
                           <td><?php echo $reclamation['Id']; ?></td>
                           <td><?php echo $reclamation['Sujet']; ?></td>
                           <td><?php echo $reclamation['comment']; ?></td>
                           <td><?php echo $reclamation['Idr']; ?></td>
                          
                           <td>

                             <form action="supressionReclamation.php" method="POST">
                               <input type="hidden" name="idr" value="<?php echo $reclamation['Idr']; ?>" >
                               <button type="submit" class="btn btn-danger " value="Supprimer ">  <i class="fa fa-trash" > </i></button>
                             </form>

                            
                           </td>

                          </tr>
                           <?php
                          } ?>
                      
                    </table>
                    <br>




                  </div>
                    <br>
                    <div class="card">
                    <div class="card-header d-flex align-items-center">
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data2 = google.visualization.arrayToDataTable([
          ['classe', 'homme','femme','autre'],
          <?php
            echo "['Classe 1', $data1[0], $data1[1], $data1[2]],";
            echo "['Classe 2', $data2[0], $data2[1], $data2[2]],"; 
            echo "['Classe 3', $data3[0], $data3[1], $data3[2]],"; 
            echo "['Classe 4', $data4[0], $data4[1], $data4[2]],"; 
            echo "['Classe 5', $data5[0], $data5[1], $data5[2]],"; 
          ?>
        ]);

        var options = { 
            title: 'Nombre des étudiants par classe',
            subtitle: 'Homme, Femme, et autre',
            vAxis: {}
          
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data2, google.charts.Bar.convertOptions(options));
      } 
    </script> <div id="columnchart_material" style="width: 800px; height: 500px;"></div></div></div>








                </div>
              </div>
              
            </div>

















































































            
            
            
            
            
        </div>
      </section>
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
  </body>
</html>
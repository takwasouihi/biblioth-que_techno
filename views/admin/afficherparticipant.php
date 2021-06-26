<?php
include "../../config.php";
include "../../controller/participantC.php";
$participantC=new participantC();
$listeparticipant=$participantC->afficherParticipants();
if(isset($_POST['DSCU']))
{ 
  $listeparticipant=$participantC->tridscu();
}
 
if(isset($_POST['ASCU']))
{ 
  $listeparticipant=$participantC->triascu();
}

if(isset($_POST['search']))
{
  $listeparticipant=$participantC->rechercherUser($_POST['valueToSearch']);
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
            <li ><a href="forms.php"> <i class="icon-user"></i>Etudiants</a></li>
            <li><a href="cathegorieProd.php?page=1"> <i class="icon-bill"></i>Ouvrages</a></li>
            <li ><a href="livres.php"> <i class="icon-check"></i>Gestion des livres</a></li>

              
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                              class="icon-clock"></i>Gestion des evenements </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <li class="active" ><a href="afficherparticipant.php"> Participants</a></li>
                      <li><a href="evenements.php">evenement</a></li>

                  </ul>
              </li>
            
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
                
                

                          
                    
               
                <!-- Log out-->
                <li class="nav-item"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline-block">Se déconnecter</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>







   <!--            xttttttt          -->



   




    <div class="ms-content-wrapper"  >
      <div class="row">

            <div class="col-md-12" >
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                  <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> </a></li>
                  <li class="breadcrumb-item"><a href="#">participant</a></li>
                  <li class="breadcrumb-item active" aria-current="page">affiche d'un participant</li>
                </ol>
              </nav>
            </div>





        <div class="col-xl-6 col-md-12"  >
          <div class="ms-panel ms-panel-fh" style="width:1500px ; margin-left: 120px;"  >
            <div class="ms-panel-body"  >
              
                <div class="form-row">
                   <div class="col-xl-7 col-md-12 ">
                          <h5>Liste des participants</h5><br>
                          <form method="POST">
                          <button type="submit" class="btn btn-danger pull-right " name="ASCU" value="ASCU">  <i class="fa fa-sort-up"> </i></button>
                  <button type="submit" class="btn btn-danger pull-right" style="margin-right:10px;"  name="DSCU" value="DSCU" >  <i class="fa fa-sort-down"> </i></button>
                  </form>
                  <br>
                  <form method="POST">
                  <input type="text" name="valueToSearch" placeholder="valeur à chercher" style="width:150px; height:39px;">
                 
                 <button type="submit"  class="btn btn-dark" name="search"  >  <i class="fa fa-search" > </i></button>
                 </form>
                 <br>








<table class="table table-bordered">
			
			<thead>
			<tr>
                <th scope="col">Idparticipant</th>
                <th scope="col">Idevenement</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
<th scope="col">email</th>
				<th scope="col">supprimer</th>
<th scope="col">mailling</th>
<th scope="col">modifier</th>
				
            </tr>
             </thead>

               


                          
<?PHP
foreach($listeparticipant as $row){
  ?>
  <tr>
  <td><?PHP echo $row['Idparticipant']; ?></td>
  <td><?PHP echo $row['Idevenement']; ?></td>
  <td><?PHP echo $row['nom']; ?></td>
  <td><?PHP echo $row['prenom']; ?></td>
<td><?PHP echo $row['email']; ?></td>
  <td><form method="POST" action="supprimerparticipant.php">
  <input type="submit" name="supprimer" value="supprimer">
  <input type="hidden" value="<?PHP echo $row['Idparticipant']; ?>" name="Idparticipant">
   </form>
  </td>
<td><form method="POST" action="MailingInvitation.php">
  <input type="submit" name="mailling" value="mailling">
  <input type="hidden" value="<?PHP echo $row['Idparticipant']; ?>" name="Idparticipant">
   </form>
  </td>
  <td><a href="../modifierparticipant.php?Idparticipant=<?PHP echo $row['Idparticipant']; ?>">
  <input type="submit" name="modifier" value="modifier"></a></td>
  </tr>
  <?PHP
}
?>

</tbody>
</table>

                
              
            
             </div>
         
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div> 





 <!--            xttttttt          -->



 


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
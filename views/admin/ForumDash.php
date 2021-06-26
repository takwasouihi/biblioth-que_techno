<?php
    include "../../config.php";
    require_once '../../model/forum.php';
    require_once '../../controller/CForum.php';
    include_once '../../controller/commentaireC.php';
    include_once '../../model/commentaire.php';
    
    $connection=mysqli_connect('localhost','root','','web');
    $result1=mysqli_query($connection, "SELECT  * FROM forum");



    $CForum = new CForum();
    $commentaireC = new commentaireC();

     
    $listeU=$CForum->afficherForum();

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
            <li><a href="forms.php"> <i class="icon-user"></i>Etudiants</a></li>
            <li><a href="cathegorieProd.php?page=1"> <i class="icon-bill"></i>Ouvrages</a></li>

            <li><a href="livres.php"> <i class="icon-check"></i>Livres</a></li>
            
            <li><a href="evenements.php"> <i class="icon-clock"></i>Evenements</a></li>
           
          
            <li><a href="login.html"> <i class="icon-pencil-case"></i>Cours </a></li>
            <li class="active"><a href="ForumDash.php"> <i class="icon-pencil-case"></i>Acutalités</a></li>
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
               //  $sql_get = mysqli_query($connection,"SELECT * FROM commentaires WHERE status=0");
               //  $count= mysqli_num_rows($sql_get);
                 ?>



               
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
            <li class="breadcrumb-item active">Actualités</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">   Actualités          </h1>
          </header>
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Liste des forums</h4> <br>
                  <form method="POST">
                  <input type="text" name="valueToSearch" placeholder="valeur à chercher" style="width:150px; height:39px;">
                 
                 <button type="submit"  class="btn btn-dark" name="search"  >  <i class="fa fa-search" > </i></button>
                 <button type="submit" class="btn btn-danger pull-right " name="ASCU" value="ASCU">  <i class="fa fa-sort-up"> </i></button>
                  <button type="submit" class="btn btn-danger pull-right" style="margin-right:10px;"  name="DSCU" value="DSCU" >  <i class="fa fa-sort-down"> </i></button><br><br>
                
              </form>
                  
            
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead  class="thead-dark">
                        <tr>
                          <th>Identifiant</th>
                          <th>Nom</th>
                          <th>contenu</th>
                          <th>typpe</th>
                          
                        </tr>
                      </thead>
                        <?php
                           foreach($listeU as $forum) {
                             ?> 
                           <tr> 
                           <td><?php echo $forum['idForum']; ?></td>
                           <td><?php echo $forum['nomForum']; ?></td>
                           <td><?php echo $forum['contenu']; ?></td>
                           <td><?php echo $forum['typpe']; ?></td>
                           
                           <td>

                             <form action="supressionForum.php" method="POST">
                               <input type="hidden" name="idForum" value="<?php echo $forum['idForum']; ?>" >
                              
                               <button type="submit" class="btn btn-danger "  >  <i class="fa fa-trash" > </i></button>
                             </form>

                             <form method="POST">
                              <input type="hidden" name="idForum" value="<?php echo $forum['idForum']; ?>" >
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
                  <h4>Ajouter un Forum</h4>
                </div>
                <div class="card-body">
                  <p>Veuillez remplir les champs suivants:</p>
                  <form  method="POST" onsubmit="return verif()"  action="ProcessForum.php" > 
                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text" name="name" id="name" class="form-control"  value="<?php if (isset($nom)) echo $nom; ?>" >
                    </div>
                    <div class="form-group">
                      <label>contenu</label>
                      <input type="text"  name="cont" id="cont" class="form-control" value="<?php if (isset($contenu)) echo $contenu ?>"  >
                    </div>

                  
                    <div class="form-group">
                    <label>Type</label>
                      <select class="form-control" name="typp" id="typp"  >
                  <option value="Livres">Livres</option>
                  <option value="Examens">Examens</option>
                  <option value="Revisions">Revisions</option>
                  <option value="Informatique">Informatique </option>
                  <option value="Autres">Autres</option>
                  </select>

                  </div>

                
                    <div class="form-group">      
                    
                      <div id="erreur">

                        </div >     
                   
                       <button  name="submit" class="btn btn-dark" style="margin-left:170px;">  <i class="fa fa-plus" > </i></button>
                      <button type="submit" name="modifier" class="btn btn-dark" >  <i class="fa fa-save" > </i></button>
                   
                    </div>
                  </form>
                </div>
              </div>
            </div>

             


           


            <div class="col-lg-6">
              <div class="card">
                 <div class="card-header">
                  <h4>Liste des Commentaires</h4> <br>
                  <form method="POST">
                  <input type="text" name="valueToSearch1" placeholder="valeur à chercher" style="width:150px; height:39px;">
                  <button type="submit"  class="btn btn-dark" name="search1" >  <i class="fa fa-search" > </i></button>
                  <button type="submit" class="btn btn-dark pull-right" name="pdf" value="pdf"> <i class="icon-bill"></i></button>
                  <button type="submit" class="btn btn-danger pull-right " style="margin-right:10px;" name="ASC" value="ASC">  <i class="fa fa-sort-up"> </i></button>
                  <button type="submit" class="btn btn-danger pull-right" style="margin-right:10px;"  name="DSC" value="DSC" >  <i class="fa fa-sort-down"> </i></button><br><br>
                    </form>
                  
            
                </div>
              

                <div class="card-body">
                  <div class="table-responsive">
                  
                    <table class="table table-striped table-sm">
                      <thead class="thead-dark">
                        <tr>
                         
                          <th>idc</th>
                          <th>Nom</th>
                          <th>Commentaire</th>
                          <th>email</th>
                          
                        </tr>
                      </thead>
                        <?php
                           foreach($listeR as $commentaire) {
                             ?> 
                           <tr> 
                                                      <td><?php echo $commentaire['idc']; ?></td>
                           <td><?php echo $commentaire['sujet']; ?></td>
                           <td><?php echo $commentaire['comment']; ?></td>
                           <td><?php echo $commentaire['email']; ?></td>
                          
                           <td>

                             <form action="supressionCommentaire.php" method="POST">
                               <input type="hidden" name="idc" value="<?php echo $commentaire['idc']; ?>" >
                               <button type="submit" class="btn btn-danger " value="Supprimer "  >  <i class="fa fa-trash" > </i></button>
                             </form>

                            
                           </td>

                          </tr>
                           <?php
                          } ?>
                      
                    </table>
                    <br>




                  








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
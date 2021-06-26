<?php 
  session_start();
  include_once '../../controller/produits/produitsController.php';

  $page = $_GET['page'];
  $next = $page + 1;
  $previous = $page-1;  
?>

<?php require './header.php'; ?>
    <!-- Side Navbar -->
    <?php require './sideNavBar.php'?>
    <div class="page">
      <!-- navbar-->
      <?php require './headerContent.php'; ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="produits.html">Produits</a></li>
              </ul>
            </div>
            <div class="col-sm-9">
              
            </div>
        </div>          
        </div>
      </div>
      <section>
        <div>
        <?php
        // var_dump($_SESSION['message']);
        // die("je suis là");
          if(isset($_SESSION['message'])):
        ?>
      <div class="alert-msg alert alert-<?=$_SESSION['msg_type'];?>">
      <p class="alert-msg">
        <?php echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
      </p>
      </div>
      <?php endif ?>
        <div class="container-fluid">
          <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <a class="navbar-brand btn btn-primary btnSpecial" href="ajouterProduits.php">Ajouter</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" id="search_text" type="search" placeholder="Search" aria-label="Search">
              </form>
            </div>
          </nav>
          </div>
          <h1 class="titre1">GERER VOS PRODUITS</h1>
          <table class="table  table-hover" id="table_data">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Cathégorie</th>
                <th scope="col">Désignation</th>
                <th scope="col">Marque</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix Achat</th>
                <th scope="col">Prix vente</th>
                <th scope="col">Disponibilité</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
              $prodCtrl = new ProduitCtrl();
              $rows = $prodCtrl->getAllProdPagn();
              $i=1;
              foreach($rows as $row) :
            ?>
              <tbody>
                <td><?=$i++;?></td>
                
                <td><?=$row['cathegorie']; ?></td>
                <td><?=$row['designation']; ?></td>
                <td><?=$row['marque']; ?></td>
                <td><?=$row['quantiteStock'];?></td>
                <td><?=$row['prix_achat'];?> &#36;</td>
                <td><?=$row['prix_vente'];?> &#36;</td>
                <td>
                  <?php 
                  if($row['quantiteStock']>0):
                  ?>
                  <i class="fas fa-check"></i>
                  <?php else :?>
                    <i class="fas fa-times"></i>
                  <?php endif ?>
                </td>
                <td>
                    <a href="../../public/util/processProd.php?edit=<?php echo $row['id_produit'] ?>">
                      <i class="far fa-edit"></i>
                    </a>  
                    <a href="../../public/util/processProd.php?delete=<?php echo $row['id_produit'] ?>">
                      <i class="fas fa-trash-alt"></i> 
                    </a>
                </td>
              </tbody>
            <?php endforeach ?>
          </table>
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item ">
                  <?php 
                  if($previous ==0):
                  ?>
                  <a class="page-link"  tabindex="-1" aria-disabled="true">Previous</a>
                  <?php else :?>
                    <a class="page-link" href="./produits.php?page=<?=$previous;?>">Previous</a>
                  <?php endif; ?>
                </li>
                <?php
                  $countRow = $prodCtrl->countRows();
                  for($i=1; $i<=$countRow; $i++):
                  ?>
                  <li class="page-item"><a class="page-link" href="./produits.php?page=<?=$i;?>"><?=$i;?></a></li>
                  <?php endfor; ?>
                  <li class="page-item">
                    <?php
                    if($next>$countRow):
                    ?>
                    <a class="page-link"  tabindex="-1" aria-disabled="true">Next</a>
                    <?php
                      else:
                    ?>
                    <a class="page-link" href="./produits.php?page=<?=$next ;?>">Next</a>
                    <?php endif;?>
                </li>
              </ul>
          </nav>
        </div>
        </div>
      </section>
      <?php require './footerContent.php'; ?>
    </div>

    <?php require './script.php' ?>
    <!-- Main File-->
    <!-- <script src="js/front.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#search_text").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url:'../../public/util/processProd.php',
                    method:'get',
                    data:{query:search},
                    success:function(response){
                      console.log("response: " + response);

                        $("#table_data").html(response);
                    },
                    error:function(response){
                        alert(response);
                        console.log('reponse:'+ response);
                    }
                });
            });
        });
  </script>
  </body>
</html>
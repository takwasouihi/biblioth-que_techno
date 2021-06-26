
<?php
  session_start();
  include_once '../../model/produits/AnimalProd.php';
  include_once '../../controller/produits/animalProdController.php';
  $page = $_GET['page'];
  $next = $page + 1;
  $previous = $page-1;
  
?>

<?php require './header.php';?>
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
              <li class="breadcrumb-item active">Revues</li>
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
          if(isset($_SESSION['message'])):
        ?>
    <div class="delete alert alert-<?=$_SESSION['msg_type'];?>">
      <p class="alert-msg"> 
      <?php echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
      </p>  
  </div>
    <?php endif ?>
      <div class="container-fluid">
        <!-- formulaire ajouter produit-->
        <h1 class="titre1">GESTION DES REVUES</h1>
        <form class="form-inline">
          <input class="form-control mr-sm-2" id="search_text" type="search" placeholder="Search" aria-label="Search">
        </form>
        <form class="form-size" action="../../public/util/processAnimaux.php" method="post">
              <div class="form-group">
                  <label for="exampleInputNom">TYPE REVUE</label>
                  <input type="text" name="typeAnimal" class="form-control" id="exampleInputNom" aria-describedby="emailHelp"placeholder="Type de revues">
              </div>
              <button type="submit" name="ajouterAniProd" class="btn btn-outline-success my-2 my-sm-0">Ajouter</button>
          </form>
        <table id="table_data" class="table  table-hover">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">TYPE REVUE</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          <?php
                $animalProdController = new AnimalProdController();
                $result = $animalProdController->getAllAnimalProd($_GET['page']);
                $i=1;
                foreach($result as $row1){
          ?>
          <tbody>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$row1['type_animal'];?></td>
                <td>
                  <a href="../../public/util/processAnimaux.php?delete=<?php echo $row1['id_animal'] ?>" >
                      <i class="fas fa-trash-alt"></i>  
                  </a>
                </td>
            </tr>
          </tbody>
        <?php
          }
        ?>
        </table>
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item ">
                  <?php 
                  if($previous ==0):
                  ?>
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  <?php else :?>
                    <a class="page-link" href="./animalProd.php?page=<?=$previous ;?>">Previous</a>
                  <?php endif; ?>
                </li>
                <?php
                  $countRow = $animalProdController->countRows();
                  for($i=1; $i<=$countRow; $i++):
                  ?>
                  <li class="page-item"><a class="page-link" href="./animalProd.php?page=<?=$i;?>"><?=$i;?></a></li>
                  <?php endfor; ?>
                  <li class="page-item">
                    <?php
                    if($next>$countRow):
                    ?>
                    <a class="page-link"  tabindex="-1" aria-disabled="true">Next</a>
                    <?php
                      else:
                    ?>
                    <a class="page-link" href="./animalProd.php?page=<?=$next ;?>">Next</a>
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
                console.log(search);
                $.ajax({
                    url:'../../public/util/processAnimaux.php',
                    method:'post',
                    data:{query:search},
                    success:function(response){
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

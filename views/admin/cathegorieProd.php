

<?php
session_start();
include_once '../../controller/produits/cathegorieProd.php';
include_once '../../controller/produits/animalProdController.php';

$designationCath=$typeAnimal="";
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
                <li class="breadcrumb-item active">Ouvrage</li>
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
    <div class=" alert-msg alert alert-msg alert-<?=$_SESSION['msg_type'];?>">
    <p class="alert-msg">
      <?php echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?>
    </p>
  </div>
    <?php endif ?>
        <div class="container-fluid">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" id="search_text" type="search" placeholder="Search" aria-label="Search">
              </form>
            </div>
          </nav>
          </div>
          <form class="row g-3 form-size" method="POST" action="../../public/util/processCath.php">
            <div class="col-md-6">
              <label for="inputNomProd" class="form-label">Désignation</label>
              <input type="text" name="inputDesignationCath" value = "<?php echo isset($_GET["designationCath"]) ? $_GET["designationCath"]:'';?>" 
              class="form-control" id="inputNomProd">
            </div>
            <div class="col-md-6">
              <label for="inputMarqueProd" class="form-label">Ouvrage</label>
              <select id="inputState" class="form-selectProd" value = "<?php echo isset($_GET["typeAnimal"]) ? $_GET["typeAnimal"]:'';?>" name="typeAnimal">
                <?php
                include_once '../../controller/produits/animalProdController.php';
                  $animalControler = new AnimalProdController();
                  $rows = $animalControler->getAllAnimalProdSelect();
                  foreach($rows as $row):
                    if(isset($_GET["typeAnimal"]) and $_GET["typeAnimal"]==$row['type_animal'])
                    {
                      ?>
                      <option > <?=$row['type_animal'];?> </option>
                    <?php
                    }
                    else
                    ?>
                  <option selected="selected"> <?=$row['type_animal'];?> </option>
                <?php
                  endforeach;
                ?>
              </select>
            </div>
            <div class="col-12">
              <?php if(isset($_GET["update"]) and $_GET["update"]==true) :?>

                <input type="hidden" name="idCath" value = "<?php  echo isset($_GET["idCath"]) ? $_GET["idCath"]:'';?>">
                <button type="submit" name ="modifierCath" class="btn btn-primary btn-engrst">Modifier</button>

                <?php else: ?>
                <button type="submit" name ="ajouterCath" class="btn btn-primary btn-engrst">Ajouter</button>
                <?php endif; ?>
            </div>
          </form>
          <table class="table table-hover" id="table_data">
            <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">DESIGNATION</th>
              <th scope="col">TYPE REVUE</th>
              <th scope="col">ACTION</th>
            </tr>
            </thead>
            <?php

              $cathProd = new CathProdController();
              $rows = $cathProd->getAllCathProdPagn();
              $i=1;
              foreach($rows as $row):
            ?>
              <tbody>
                  <tr>
                    <td><?=$i++;?></td>
                    <td><?=$row['designation'];?></td>
                    <td><?=$row['type_animal'];?></td>
                    <td>
                      <a href="../../public/util/processCath.php?edit=<?php echo $row['id_cath'] ?>">
                          <i class="far fa-edit"></i>
                      </a>  
                      <a href="../../public/util/processCath.php?delete=<?php echo $row['id_cath'] ?>">
                          <i class="fas fa-trash-alt"></i>  
                      </a>
                    </td>
                </tr>
              </tbody>
            <?php endforeach ?>
          </table>
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item ">
                  <?php 
                  if($previous ==0):
                  ?>
                    <a class="class="page-link" href="#"   aria-disabled="true">Previous</a>
                  <?php else :?>
                    <a class="page-link" href="./cathegorieProd.php?page=<?=$previous;?>">Previous</a>
                  <?php endif; ?>
                </li>
                <?php
                  $countRow = $cathProd->countRows();
                  for($i=1; $i<=$countRow; $i++):
                  ?>
                  <li class="page-item"><a class="page-link" href="./cathegorieProd.php?page=<?=$i;?>"><?=$i;?></a></li>
                  <?php endfor; ?>
                  <li class="page-item">
                    <?php
                    if($next>$countRow):
                    ?>
                    <a class="page-link"  tabindex="-1" aria-disabled="true">Next</a>
                    <?php
                      else:
                    ?>
                    <a class="page-link" href="./cathegorieProd.php?page=<?=$next ;?>">Next</a>
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
                    url:'../../public/util/processCath.php',
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
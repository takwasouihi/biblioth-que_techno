<?php
session_start();
?>


<?php require './header.php'; ?>
    <!-- Side Navbar -->
    <?php require './sideNavBar.php'?>
    
    <?php require './topHeader.php';?>
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
        </div>          
        </div>
      </div>
      <section>
      <div>
      <?php
          if(isset($_SESSION['message'])):
        ?>
      <div class="alert-msg alert alert-<?=$_SESSION['msg_type'];?>">
      <p class = "alert-msg">
      <?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?>
      </p>
      </div>
      <?php endif ?>
        <div class="container-fluid">
          <!-- formulaire ajouter produit-->
          <h1 class="titre1">AJOUTER PRODUITS</h1>
          <form class="row g-3 form-size" action="../../public/util/processProd.php" method="POST">
            <div class="col-12">
              
              <label for="inputNomProd" class="form-label">Désignation</label>
              <input type="text" name="designationProd" value="<?php echo isset($_GET["desgn"]) ? $_GET["desgn"]:'';?>"  class="form-control" id="inputNomProd">
            </div>
            <div class="col-md-6 margin-top">
              <label for="inputMarqueProd" class="form-label">Cathégorie</label>
              <select id="inputState" name="cathg" class="form-selectProd custom-select custom-select-lg mb-3">
                <?php 
                  include_once '../../controller/produits/cathegorieProd.php';
                  $cathCtrl = new CathProdController();
                  $rows = $cathCtrl->getAllCathProd();

                  foreach($rows as $row):
                ?>
                  <option> <?=$row['designation'];?></option>
                <?php endforeach?>
              </select>
            </div>
            <div class="col-md-6">
            <label for="inputMarqueProd" class="form-label">Marque</label>
              <input type="text" value="<?php echo isset($_GET["marq"]) ? $_GET["marq"]:'';?>" name="marque" class="form-control" id="inputMarqueProd">
            </div>
            
            <div class="col-md-4">
              <label for="inputQtiteStck" class="form-label">Quantité Stock</label>
              <input type="number" name="qtiteStock" value="<?php echo isset($_GET["qtite"]) ? $_GET["qtite"]:'';?>" class="form-control" id="inputQtiteStck" placeholder="Quantité" >
            </div>
            <div class="col-md-4">
              <label for="inputPrixUnit" class="form-label">Prix Achat </label>
              <input type="number" name="prixA" value="<?php echo isset($_GET["prixA"]) ? $_GET["prixA"]:'';?>" class="form-control" id="inputPrixUnit" placeholder="Prix unitaire" >
            </div>
            <div class="col-md-4">
              <label for="inputvente" class="form-label">Prix Vente</label>
              <input type="number" name="prixV" value="<?php echo isset($_GET["prixV"]) ? $_GET["prixV"]:'';?>" class="form-control" id="inputPrixVente" placeholder="Prix vente" >
            </div>
            <div class="col-12">
              <label for="inputCity" class="form-label">Description</label>
              <textarea class="form-control" name="descrp" id="validationTextarea" placeholder="entrer un description du produit" >
                <?php echo isset($_GET["descProd"]) ? $_GET["descProd"]:'';?>
              </textarea>
            </div>
            <div class="col-12 margin-top">
            <div class="custom-file">
              <input type="file" name="img" value="<?php echo isset($_GET["img"]) ? $_GET["img"]:'';?>" class="custom-file-input" id="validatedCustomFile" >
              <label class="custom-file-label" for="validatedCustomFile">choisir une image</label>
            </div>
            </div>
            <div class="col-12">
            <?php if(isset($_GET["update"]) and $_GET["update"]==true) :?>

              <input type="hidden" name="idProd" value = "<?php  echo isset($_GET["idProd"]) ? $_GET["idProd"]:'';?>">
              <button type="submit" name="modifierProd" class="btn btn-primary btn-engrst">Modifier</button>
              <?php else :?>
                <button type="submit" name="ajouterProd" class="btn btn-primary btn-engrst">Ajouter</button>
              <?php endif ?>
            </div>
          </form> 
        </div>
        </div>
      </section>
      <?php require './footer.php';?>
<?php
include '../../config.php';
$conn = config::getConnexion();

if(isset($_POST['action'])){
    $sql = "SELECT * FROM produits WHERE marque !='' ";
    if(isset($_POST['marq'])){
        $brand = implode("','", $_POST['marq']);
        $sql .= "AND  marque IN('".$brand."')";
    }
    if(isset($_POST['cath'])){
        $cath = implode("','", $_POST['cath']);
        $sql .= "AND  cathegorie IN('".$cath."')";
    }

    $result = $conn->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $output ='';

    if(count($rows)>0){
        foreach($rows as $row){
            $output .='<div class="col-lg-4 col-sm-6">
            <div class="pm-product">
              <a href="product-details.php?idProd='.$row['id_produit'].'" class="image">
                <img src="../../public/img/produits/home-1/'.$row['img'].'" alt="">
              </a>
              <div class="hover-conents">
                <ul class="product-btns">
                  <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                  <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                  <li><a href="#" data-toggle="modal" data-target="#quickModal"><i class="ion-ios-search"></i></a>
                  </li>
                </ul>
              </div>
              <div class="content">
                <h3 class="font-weight-500"><a href="product-details.html"> '.$row['designation'].'</a></h3>
                <div class="price text-red">
                  <span class="old">'.$row['prix_vente'].'></span>
                  <span>'.$row['prix_achat'].'</span>
                </div>
                <div class="btn-block grid-btn">
                  <a href="cart.html" class="btn btn-outlined btn-rounded btn-mid">Add to Cart</a>
                </div>
                
              </div>
            </div>
          </div>';
        }
    }
    else{
        $output = "<h3>Aucun produit n'a été trouver</h3>";
    }
    echo $output;
}

if (isset($_POST['query'])) {
  $inpText = $_POST['query'];
  $lim = 3;
  $sql = "SELECT designation, id_produit FROM produits WHERE designation LIKE :dsign LIMIT $lim";
  $stmt = $conn->prepare($sql);
  $stmt->execute(['dsign' => '%' . $inpText . '%']);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($result) {
    foreach ($result as $row) {
      echo '<a href="product-details.php?idProd='.$row['id_produit'].'" class="list-group-item list-group-item-action border-1">' . $row['designation'] . '</a>';
    }
  } else {
    echo '<p class="list-group-item border-1">No Record</p>';
  }
}

?>
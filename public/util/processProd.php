<?php
session_start();
include_once '../../controller/produits/produitsController.php';
include_once '../../model/produits/Produits.php';

$prodCtrl = new ProduitCtrl();

$designation = $cath = $marq  =$descProd = $prixA = $qtiteS = $idProduit = "";
$update = false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}

if(isset($_POST['ajouterProd'])){
    if(empty($_POST['designationProd']) || empty($_POST['cathg']) || empty($_POST['qtiteStock']) || empty($_POST['prixA']) 
    || empty($_POST['prixV'])){
        $_SESSION['message'] ="some information missing!";
        $_SESSION['msg_type'] = "warning";
        header("location:../../views/admin/ajouterProduits.php?page=1");
    }else{
        
        $desgn = test_input($_POST['designationProd']);
        $cathg = test_input($_POST['cathg']);
        
        $marq=  test_input($_POST['marque']);
        $qtiteS = test_input($_POST['qtiteStock']);
        $prixA = test_input($_POST['prixA']);
        $prixV = test_input($_POST['prixV']);
        $descrp = test_input($_POST['descrp']);
        $img = test_input($_POST['img']);

        $produit = new Produits($desgn, $descrp, $marq, $cathg, $img, $qtiteS, $prixA, $prixV);
        $prodCtrl->ajouterProd($produit);

        $_SESSION['message'] ="record has been saved!";
        $_SESSION['msg_type'] = "success";

        header("location:../../views/admin/ajouterProduits.php?page=1");
    }
}

if(isset($_GET['delete'])){
    $idProd = test_input($_GET['delete']);

    $prodCtrl->deleteProd($idProd);
    $_SESSION['message'] = "record has been deleted !";
    $_SESSION['msg_type'] = "danger";
    header("location:../../views/admin/produits.php?page=1");
}

if(isset($_GET['edit'])){
    $idProd = test_input($_GET['edit']);
    $row = $prodCtrl->getProdById($idProd);
    $update = true;

    foreach($row as $row1){
        $designation = $row1['designation'];
        $cath = $row1['cathegorie'];
        $marq = $row1['marque'];
        $descProd = $row1['descriptionProd'];
        $prixV = $row1['prix_vente'];
        $prixA = $row1['prix_achat'];
        $qtiteS = $row1['quantiteStock'];
        $idProduit = $row1['id_produit'];
    }

    header("location:../../views/admin/ajouterProduits.php?page=1?desgn=".$designation."&cath=".$cath."&update=".$update."&idProd=".$idProduit."&marq=".$marq."&descProd=".$descProd."&prixV=".$prixV."&prixA=".$prixA."&qtite=".$qtiteS." ");
}

    if(isset($_POST['modifierProd'])){
        var_dump($_POST);

        $desgnM = test_input($_POST['designationProd']);
        $cathgM = test_input($_POST['cathg']);
        $marqM=  test_input($_POST['marque']);
        $qtiteSM = test_input($_POST['qtiteStock']);
        $prixAM = test_input($_POST['prixA']);
        $prixVM = test_input($_POST['prixV']);
        $descrpM = test_input($_POST['descrp']);
        $imgM = test_input($_POST['img']);
        $idProdM = test_input($_POST['idProd']);

        $produit = new Produits($desgnM, $descrpM, $marqM, $cathgM, $imgM, $qtiteSM, $prixAM, $prixVM);
        $prodCtrl->updateProd($produit, $idProdM);

        header("location:../../views/admin/produits.php?page=1");
    }

$output =$result= "";
if(isset($_GET['query'])){
        $search = $_GET['query'];
        $result = $prodCtrl->liveSearch($search);
}
else{
    $result = $prodCtrl->getAllProd($_GET['page']);
}

if(count($result)>0){
    $output ="<thead>
    <th scope='col'></th>
    <th scope='col'>Cathégorie</th>
    <th scope='col'>Désignation</th>
    <th scope='col'>Marque</th>
    <th scope='col'>Quantité</th>
    <th scope='col'>Prix Achat</th>
    <th scope='col'>Prix vente</th>
    <th scope='col'>Disponibilité</th>
    <th scope='col'>Action</th>
    </thead>
    <tbody>";
    $i =1;
    foreach($result as $result){
        $output .="
        <tr>
        <td>".$i++."</td>
                <td> ".$result['cathegorie']."</td>
                <td> ".$result['designation']."</td>
                <td> ".$result['marque']."</td>
                <td> ".$result['quantiteStock']."</td>
                <td> ".$result['prix_achat']."</td>
                <td> ".$result['prix_vente']."</td>
                <td>
                    <a href='../../public/util/processProd.php?delete=".$result['id_produit']."'>
                        <i class=far fa-edit'></i>
                    </a>
                    <a href='../../public/util/processProd.php?delete=".$result['id_produit']."'>
                        <i class='fas fa-trash-alt' style='color:#33b35a'></i>  
                    </a>
                </td>
        </tr>
        ";    
    }
    $output .= "</tbody>";
    echo $output;
}else{
    echo "<h3>Not record found</h3>";
}


?>
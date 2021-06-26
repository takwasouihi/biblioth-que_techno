<?php
session_start();

include_once '../../model/produits/CathegorieProd.php';
include_once '../../controller/produits/cathegorieProd.php';


$cathProdCtrl = new CathProdController();
$designationCath = $typeAnimal="";
$update = false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if(isset($_POST['ajouterCath'])){

    if(empty($_POST['inputDesignationCath'])){
        $_SESSION['message'] ="some informations required!";
        $_SESSION['msg_type'] = "warning";
        header("location:../../views/admin/cathegorieProd.php");
    }else {
        $result = $cathProdCtrl->unique(test_input($_POST['inputDesignationCath']));
        if($result==1){
            $_SESSION['message'] ="this record already exist!";
            $_SESSION['msg_type'] = "warning";
            header("location:../../views/admin/cathegorieProd.php"); 
        }else{
            $designationCathAjt = test_input($_POST['inputDesignationCath']);
            $typeAnimalAjt = test_input($_POST['typeAnimal']);

            $cathProd = new CathProd($typeAnimalAjt, $designationCathAjt);
            $cathProdCtrl->ajouterCathProd($cathProd);

            $_SESSION['message'] ="record has been saved!";
            $_SESSION['msg_type'] = "success";
        
            header("location:../../views/admin/cathegorieProd.php");
        }
        

    }
    
}

if(isset($_GET['delete']))
{   
    $idCath = $_GET['delete'];
      
    $cathProdCtrl->deleteCath($idCath);
    $_SESSION['message'] = "record has been deleted !";
    $_SESSION['msg_type'] = "danger";
    header("location:../../views/admin/cathegorieProd.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $cathProdCtrl->getCathByID($id);
    $update = true;
    foreach($result as $row){
        $designationCath = $row['designation'];
        $typeAnimal = $row['type_animal'];
        $idCath = $row['id_cath'];
    }

    header("location:../../views/admin/cathegorieProd.php?designationCath=".$designationCath."&typeAnimal="
    .$typeAnimal."&update=".$update."&idCath=".$idCath."");
}

if(isset($_POST['modifierCath'])){

    if(empty($_POST['inputDesignationCath']) || empty($_POST['typeAnimal']) || empty($_POST['idCath'])){
        $_SESSION['message'] ="some informations required!";
        $_SESSION['msg_type'] = "warning";
        header("location:../../views/admin/cathegorieProd.php?page=1");
    }else{
        $result = $cathProdCtrl->unique(test_input($_POST['inputDesignationCath']));
        if($result == 1){
            $_SESSION['message'] ="this record already exist!";
            $_SESSION['msg_type'] = "warning";
            header("location:../../views/admin/cathegorieProd.php");
        }else{
            $designationCathMod = test_input($_POST['inputDesignationCath']);
            $typeAnimalMod = test_input($_POST['typeAnimal']);
            $idCath = test_input($_POST['idCath']);

            $_SESSION['message'] ="record has been Modified!";
            $_SESSION['msg_type'] = "success";

            $cathProd = new CathProd($typeAnimalMod,$designationCathMod);
            $cathProdCtrl->updateCath($cathProd, $idCath);

            header("location:../../views/admin/cathegorieProd.php?page=1");
        }
        
    }
    
}

$output =$result= "";
if(isset($_GET['query'])){
        $search = $_GET['query'];
        $result = $cathProdCtrl->liveSearch($search);
}
else{
    $result = $cathProdCtrl->getAllCathProd();
}

if(count($result)>0){
    $output ="<thead>
    <th scope='col'></th>
    <th scope='col'>Désignation</th>
    <th scope='col'>TYPE ANIMAL</th>
    <th scope='col'>Action</th>
    </thead>
    <tbody>";
    $i =1;
    foreach($result as $result){
        $output .="
        <tr>
        <td>".$i++."</td>
                <td> ".$result['designation']."</td>
                <td> ".$result['type_animal']."</td>
                <td>
                    <a href='../../public/util/processCath.php?delete=".$result['id_cath']."'>
                        <i class=far fa-edit'></i>
                    </a>
                    <a href='../../public/util/processCath.php?delete=".$result['id_cath']."'>
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
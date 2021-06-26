<?php

session_start();

include_once '../../controller/produits/animalProdController.php';

$typeAnimal = "";
$animalControler = new AnimalProdController();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_GET['delete']))
{   
    $idAnimal = test_input($_GET['delete']);
    
    $animalControler->deleteAnimal($idAnimal);

    $_SESSION['message'] = "l'animal a été supprimé";
    $_SESSION['msg_type'] = "danger";
    header("location:../../views/admin/animalProd.php?page=1");
}

if(isset($_POST['ajouterAniProd'])){
    $typeAnimal = test_input($_POST['typeAnimal']);

    if(empty($_POST['typeAnimal'])){
        $_SESSION['message'] = "some informations missing";
        $_SESSION['msg_type'] = "warning";
        header("location:../../views/admin/animalProd.php");
    }else{
        $animalProd = new AnimalProd($typeAnimal);
        $animalControler->ajouterAnimalProd($animalProd);

        $_SESSION['message'] = "l'animal a été ajouté";
        $_SESSION['msg_type'] = "success";

        header("location:../../views/admin/animalProd.php?page=1");
    }
}

$output =$result= "";

if(isset($_GET['query'])){
    $search = $_GET['query'];
    $result = $animalControler->liveSearch($search);
}
else{
    $result = $animalControler->getAllAnimalProd($_GET['page']);
}

if(count($result)>0){
    $output ="<thead>
    <th></th>
    <th>Designation</th>
    <th>Action</th>
    </thead>
    <tbody>";
    $i =1;
    foreach($result as $result){
        $output .="
        <tr>
        <td>".$i++."</td>
                <td> ".$result['type_animal']."</td>
                <td> 
                <a href='../../public/util/processAnimaux.php?delete=".$result['id_animal']."'>
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
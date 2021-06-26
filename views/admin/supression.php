<?php
include "../../config.php";
include '../../controller/userC.php';
$uc = new userC();

if (isset($_POST['id']))
{$uc->SupprimerUser($_POST['id']);
    header('Location:forms.php');
}
?>
<?php
include "../../config.php";
include '../../controller/reclamationC.php';
$rc = new reclamationC();

if (isset($_POST['idr']))
{$rc->SupprimerReclamation($_POST['idr']);
    header('Location:forms.php');
}
?>
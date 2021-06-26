<?php
include "../../config.php";
include '../../controller/commentaireC.php';
$rc = new commentaireC();

if (isset($_POST['idc']))
{$rc->SupprimerCommentaire($_POST['idc']);
    header('Location:ForumDash.php');
}
?>
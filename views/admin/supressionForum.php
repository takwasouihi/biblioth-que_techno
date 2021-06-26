<?php
include "../../config.php";
include '../../controller/CForum.php';
$uc = new CForum();

if (isset($_POST['idForum']))
{$uc->SupprimerForum($_POST['idForum']);
    header('Location:ForumDash.php');
}
?>
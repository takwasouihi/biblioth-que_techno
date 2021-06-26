<?php
include "../model/Ouvrage.php";
include "ouvrages.php";

if (isset($_POST['ajout']) and isset($_POST['name'])) {

    $ouvrage = new Ouvrage($_POST["name"]);
    $ouvrages = new ouvrages();
    $ouvrages->ajouterouvrage($ouvrage);

    ?>
    <script type=""> location.replace("succes_ajout_categorie.html");</script>
    <?php

} else {
    echo "Sorry, there was an error ";
}


?>
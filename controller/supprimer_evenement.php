<?PHP
include "evenements.php";

$p = new evenements();
if (isset($_GET["id"])) {
    $p->supprimer($_GET["id"]);

    echo '<script type=""> location.replace("supprimerE.html");</script>';


    echo '</script>';
} else {
    echo "cannot get this page";
}
?>
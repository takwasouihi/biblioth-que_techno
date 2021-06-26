<?PHP
include "revues.php";

$p = new revues();
if (isset($_GET["id"])) {
    $p->supprimer($_GET["id"]);

    echo '<script type=""> location.replace("supprimer.html");</script>';


    echo '</script>';
} else {
    echo "cannot get this page";
}
?>
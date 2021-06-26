<?PHP
include "ouvrages.php";


$c = new ouvrages();

$c->modifierouvrage($_POST["ID"], $_POST["name"]);

sleep(5);

echo '<script type=""> location.replace("succes_modification_categorie.html");</script>';


echo '</script>';


?>
















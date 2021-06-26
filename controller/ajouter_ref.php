<?PHP

include "revues.php";
session_start();
$idc = $_GET['id'];
$reference = $_GET['reference'];
$revues = $_GET['revue'];
if (isset($_GET['id'])) {

    $sql = " SELECT * from reference where (id_client='$idc' and  id_livre=$revues)";
    $db = config::getConnexion();
    $listreference = $db->query($sql);
    if ($listreference->rowCount() == 0) {
        $l = new revues();
        $l->reference($reference, $idc, $revues);
        $l->AVG($revues);
        header("location:" . $_SERVER['HTTP_REFERER']);
    } else {


        $l = new revues();
        $l->updatenote($note, $idc, $revues);
        $l->AVG($revues);

        header("location:" . $_SERVER['HTTP_REFERER']);

    }
}
?>
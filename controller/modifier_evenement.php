<?PHP

include "../model/evenement.php";
include "evenements.php";

$target_dir = "../views/livres/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["modifier"]) and isset($_POST["fileToUpload"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 100000000) {
    echo "Sorry, your file is too large.";

    $uploadOk = 0;


}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {


    $uploadOk = 0;

}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

    $evenement = new evenement($_POST["ID"], $_POST["reference"], $_POST["titre"], $_POST["date"], $_POST["auteur"], $_POST["description"], $_POST["stock"], basename($_FILES["fileToUpload"]["name"]), $_POST["prix"]);
    $evenements = new evenements();

    $evenements->modifierevenement2($evenement);


    echo '<script type=""> location.replace("succes_modificationE.html");</script> ';


    echo '</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        $evenement = new evenement($_POST["reference"], $_POST["reference"], $_POST["titre"], $_POST["date"], $_POST["auteur"], $_POST["description"], $_POST["stock"], basename($_FILES["fileToUpload"]["name"]), $_POST["prix"]);
        $evenements = new evenements();
        $evenements->modifierevenement($evenement);

        sleep(5);

        echo '<script type=""> location.replace("succes_modificationE.html");</script> ';


        echo '</script>';

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>
















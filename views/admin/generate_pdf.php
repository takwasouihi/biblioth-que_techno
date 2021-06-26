
<?php
//include connection file 
//include_once("../config.php");
include_once('pdf/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('C:/wamp64/www/LSM/front/views/img/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(70,10,'Liste des reclamations',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$dbConnection = mysqli_connect('localhost', 'root', '', 'web');
$query  = "SELECT * FROM reclamations";
$result = mysqli_query($dbConnection, $query);


$e=0;
$i=0;
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
if (mysqli_num_rows($result) > 0) {

    $pdf->Cell(35,10,"id reclamation",1,0);
    $pdf->Cell(30,10,"id etudiant",1,0);
    $pdf->Cell(30,10,"sujet",1,0);
    $pdf->Cell(80,10,"Commentaire",1,1);



;
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $id = $row['Idr'];
          $idetudiant = $row['Id'];
          $sujet= $row['Sujet'];
          $commentaire=$row['comment'];
        


          if($e==0)
          {
          $pdf->Cell(35,10,"{$id}",1,0);
          $pdf->Cell(30,10,"{$idetudiant} ",1,0);
          $pdf->Cell(30,10,"{$sujet}",1,0);
          $pdf->Cell(80,10,"{$commentaire} ",1,1);
  
          }
  
  
  
      } }
$pdf->Output();
?>

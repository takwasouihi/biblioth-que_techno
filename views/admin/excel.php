<?php

$connect=mysqli_connect("localhost","root","","web");
$output='';
if(isset($_POST["export_excel"]))
{
   $sql="SELECT Id,Nom,Prenom FROM etudiants";
   $result = mysqli_query($connect,$sql);
   if(mysqli_num_rows($result)>0)
   { $output .= '
   <table class="table" bordered="1">
   <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prenom</th>
    </tr>
    ';
    while($row=mysqli_fetch_array($result))
    { $output .='
    <tr> 
        <td>'.$row["Id"].'</td>
         <td>'.$row["Nom"].'</td>
         <td>'.$row["Prenom"].'</td>
    </tr>
    ';
    }
    $output.='</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
   }
}
        








?>
<?php

$connect=mysqli_connect("localhost","root","","evenements");
$output='';
if(isset($_POST["export"]))
{
   $sql="SELECT Idevenement,Idparticipant,nom,endroit,email FROM evenement";
   $result = mysqli_query($connect,$sql);
   if(mysqli_num_rows($result)>0)
   { $output .= '
   <table class="table" bordered="1">
   <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Nom</th>
      <th>Prenom</th>
    </tr>
    ';
    while($row=mysqli_fetch_array($result))
    { $output .='
    <tr> 
        <td>'.$row['Idevenement'].'</td>
         <td>'.$row['Idparticipant'].'</td>
         <td>'.$row['nom'].'</td>
         <td>'.$row['endroit'].'</td>
         <td>'.$row['email'].'</td>
    </tr>
    ';
    }
    $output.='</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
   }
}

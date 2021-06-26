<?php

$connect=mysqli_connect("localhost","root","","web");
$output='';
if(isset($_POST["export"]))
{
   $sql="SELECT ID,reference,titre,dateS,endroit,description,stock,image,prix,note FROM evenements";
   $result = mysqli_query($connect,$sql);
   if(mysqli_num_rows($result)>0)
   { $output .= '
   <table class="table" bordered="1">
   <tr>
      <th>Cls</th>
      <th>Reference</th>
      <th>Titres</th>
      <th>dates</th>
      <th>endroit</th>
      <th>description</th>
      <th>stock</th>
      <th>image</th>
      <th>prix</th>
      
    </tr>
    ';
    while($row=mysqli_fetch_array($result))
    { $output .='
    <tr> 
        <td>'.$row['ID'].'</td>
         <td>'.$row['reference'].'</td>
         <td>'.$row['titre'].'</td>
         <td>'.$row['dateS'].'</td>
         <td>'.$row['endroit'].'</td>
         <td>'.$row['description'].'</td>
         <td>'.$row['stock'].'</td>
         <td>'.$row['image'].'</td>
         <td>'.$row['prix'].'</td>
         <td>'.$row['note'].'</td>
    </tr>
    ';
    }
    $output.='</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
   }
}

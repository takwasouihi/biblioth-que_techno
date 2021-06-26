<?php
  $name=$_POST['name'];
  $fname=$_POST['fname'];
  $email=$_POST['email'];
  $id1=$_POST['id1'];
  $num=$_POST['num'];
  $num=$_POST['date'];
  $class=$_POST['class'];
  $sex=$_POST['sex'];
  $passw=$_POST['passw'];

  //data base connection
  $conn = new mysqli('localhost','root','','web');
  if($conn->connect_error){
      die('Connection failed : '.$conn->connect_error);
  } else{
      $stmt=$conn->prepare("insert into etudiants(name,fname,email,id1,num,date,class,sex,passw) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssissss",$name, $fname, $email, $id1, $num, $date, $class, $sex, $passw);
      $stmt->execute();
      echo "success";
      $stmt->close();
      $conn->close();
  }



?>
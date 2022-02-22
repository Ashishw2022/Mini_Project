<?php
include 'config.php';
$email=$_POST['emailId'];
$sql="select email from login where  email='$email'";

$res=mysqli_query($con,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  echo 1;
  exit();
  }else{
    echo -1;
    exit();
  }


?>
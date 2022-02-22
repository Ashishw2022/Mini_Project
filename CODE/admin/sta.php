<?php
include "config.php"; 

$id = $_GET['id']; 

$sta = $_GET['status']; 
mysqli_query($con,"update login set sta=$sta where loginid=$id");
header("Location:doctor.php")
?>
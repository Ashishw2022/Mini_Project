<?php

  require "../config.php";
 
  $did =json_decode($_POST['id']);

  $str = '';
  $query = "SELECT * FROM mapping WHERE did= '$did' ";
    $q_run=mysqli_query($con,$query);
    if(mysqli_num_rows($q_run) > 0){
      while ($row = mysqli_fetch_assoc($q_run)) {
        $s_id = $row['s_id'];
        $q1 = "select  Description from symptom where s_id= '$s_id' ";
        $res = mysqli_query($con,$q1);
        $row2 = mysqli_fetch_assoc($res);
        $str = $str.$row2['Description'].'|';
      }
    }

  echo $str;
  ?>
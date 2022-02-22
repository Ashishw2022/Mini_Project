<?php

require "../config.php";
$did =json_decode($_POST['id']);
  $all_syms = array_of_syms($con,$did);

  function array_of_syms($con,$did)
  {
   

    $str = '';
    $query = "SELECT s_id FROM mapping WHERE did='$did' ";

    $qu_run=mysqli_query($con,$query);
    if(mysqli_num_rows($qu_run) > 0){
      while ($row = mysqli_fetch_assoc($qu_run)) {
        $s_id = $row['s_id'];
        $q1 = "SELECT * from symptom where s_id='$s_id'";
        $res = mysqli_query($con,$q1);
        $row2 = mysqli_fetch_assoc($res);
        $id = $row2['s_id'];
        $str = $str.$row2['s_name'].','.$row2['fuzzy_set'].'|';
    }
  }
   

        echo substr($str,0,strlen($str)-1);
  }
  ?>

<?php

require '../config.php';
    $disease = $_POST['disease'];
    $q1 = "select did from disease where dname ='".$disease."'";
    $res = mysqli_query($con,$q1);
    $no = mysqli_num_rows($res);
    $did = '';
    while($row = $res->fetch_array())
    {
        $did = $row['did'];
    }
    //echo $did;
    $q1 = "select did,s.s_id,s_name,weight,fuzzy_set,rangevalue,fv from mapping as m, symptom as s where s.s_id = m.s_id and did ='".$did."'";
    $res = mysqli_query($con,$q1);
    $no = mysqli_num_rows($res);
    $str = '';
    while($row = $res->fetch_array())
    {
        $str .= $row['did']."|".$row['s_id']."|".$row['s_name']."|".$row['weight']."|".$row['fuzzy_set']."|".$row['rangevalue']."|".$row['fv'].'/';
    }
    echo $str;
?>

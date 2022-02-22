<?php

require '../config.php';
    $did= $_POST['diseaseid'];
    $q1 = "delete from disease where did ='". $did."'";
    
    if (mysqli_query($con, $q1)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }

    $query = "SELECT * FROM mapping WHERE did= '$did' ";
    $q_run=mysqli_query($con,$query);
    if(mysqli_num_rows($q_run) > 0){
      while ($row = mysqli_fetch_assoc($q_run)) {
          $s_id = $row['s_id'];
          $q3 = "Delete from symptom where s_id='$s_id'";
         
          if (mysqli_query($con, $q3)) {
            $q4 = "Delete from mapping where s_id='$s_id' and did ='$did'";
            if (mysqli_query($con, $q4)) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . mysqli_error($conn);
            }
          }
        
      }
    }

?>

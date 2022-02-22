<?php

require '../config.php';
    $sid= $_POST['sym_id'];
    $did= $_POST['d_id'];

    

          $q3 = "Delete from symptom where s_id='$sid'";
         
          if (mysqli_query($con, $q3)) {
            $q4 = "Delete from mapping where s_id='$s_id' and did ='$did'";
            if (mysqli_query($con, $q4)) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . mysqli_error($conn);
            }
          }
        
      
    
?>

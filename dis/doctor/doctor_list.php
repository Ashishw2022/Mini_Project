<?php

  require "../config.php";

  $all_disease = array_of_disease($con);

  function array_of_disease($con)
  {
        $i = 1;
        $output = '<div><table class="table  table-bordered  ">
                <tr>
                     <th >Diseases in database</th>
                     
                     <th>Actions</th>
                     </tr>';
                     //<th >Details</th><th >Accuracy Testing</th> '';
                
        $q1 = "Select * from disease";
        $res = mysqli_query($con,$q1);

        while($row = $res->fetch_array())
        {
            $id = $row['did'];
            //$str = $str.$row['dname'];
            $output .= '<tr><td id='.$row['dname'].'>'.$row['dname'].'</td>
            <td><button class="btn btn-default btn-primary button" onclick="disease_data(this)" id='.$row['dname'].'>View</button>
           <a href="editdis.php?id='.$id.'" class="btn btn-default btn-primary button">Edit</a>
           <button type="submit" id="delete" name="submit" class="btn btn-default btn-primary button" onclick="delete_dis('.$row['did'].')">Delete</button>
           </td>';
            $i += 1;
        }

        echo $output;
  }

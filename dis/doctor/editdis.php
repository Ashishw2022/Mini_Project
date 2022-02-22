<?php
include '../config.php';
session_start();
$uname = $_SESSION['UserID'];
echo $uname;
$did = $_GET['id']; 
$query = "select * from login l,d_reg d where l.loginid = d.loginid AND l.loginid='$uname'";
//$query = “select * from tbl_login";
$result = mysqli_query($con, $query);

$row1 = mysqli_fetch_array($result);
// $imageURL='image/'.$row["image"];
$q2 = "Select did,dname,specialist,precaution from disease where did='$did'";
$res2 = mysqli_query($con,$q2);
$data = mysqli_fetch_array($res2);
$q1 = "select did,s.s_id,s_name,weight,fuzzy_set,rangevalue,fv,s.Description from mapping as m, symptom as s where s.s_id = m.s_id and did ='".$did."'";
    $res = mysqli_query($con,$q1);
    $no = mysqli_num_rows($res);
    
?>

<!Doctype HTML>
<html>

<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="../doctor/js/edit.js" type="text/javascript"></script>
    <script type="text/javascript">

     

        //delete the symptom
        function delete_dis(sid,did){
            if (confirm("Are you sure you want to delete the disease")) {
            $.ajax({
                url   : "../doctor/del_symptom.php",
                type  : "POST",
                async : false,
                data  : {
							"sym_id":sid,
                            "did":did
                        },
                success: function(data)
                {
                    window.location.href="../doctor/editdis.php?id="+did
                }
            });
        }
        }
</script>
</head>


<body>
    <header class="header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>
        <nav class="navbar">

            <a class="icon-a" style="color: #16a085;">&nbsp&nbsp<?php echo $row1['FirstName'] ?></a>
            <a href="../logout.php" class="btn" id="loginbtn" href="../login.php">Logout</a>
        </nav>


        <div id="menu-btn" class="fas fa-bars"></div>

    </header>
    <div id="mySidenav" class="sidenav">


        <a href="index.php" class="icon-a "><i class="fas fa-user-circle"></i> &nbsp;&nbsp;Profile</a>
        <a href="listdis.php" class="icon-a active"><i class="fas fa-disease"></i> &nbsp;&nbsp;Diseases</a>
        <a href="dis.php" class="icon-a "><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Add Diseases</a>
        <!-- <a href="#" class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->



    </div>
    <div class="body">

        <div class='main'>


            <h1 align="center"><b>Disease Knowledge Base</b></h1>

            <br><br>

            <div class="container vertical-gap">
                <div class="jumbotron" style="background-color: transparent;">
                    <div class="row container">
                        <h2><u>Disease Details:<u></h2>
                    </div>
                    <br>
                    <div class="row">
                        <table border="0" cellspacing="4px">
                            <tr>
                                <td>Disease Name:</td>
                                <td><?php echo $data['dname'] ?>
                                <input type="text" hidden value="<?php echo $data['dname']?>" name="dname" placeholder="Disease Name" class="form-control input-group-lg " id="dname" autofocus>
                            </td>
                            </tr>
                            <tr>
                                <td>Specialist:</td>
                                <td> <input type="text" value="<?php echo $data['specialist']?>" name="specialist" placeholder="change Specialist" class="form-control input-group-lg " id="specialist"></td>
                            </tr>
                            <tr>
                                <td>Precaution:</td>
                                <td> <textarea placeholder="Enter Precautions"  name="precaution" class="form-control input-group-lg" rows="5" id="change precaution"><?php echo $data['precaution'] ?></textarea></td>
                            </tr>
                        </table>
                        <!-- col-md-offset-2 -->


                    </div>
                </div>
            </div>
            <br>
            <br>


            <div class="container main_sym vertical-gap">
                <div class="jumbotron" style="background-color: transparent; ">
                    <div class=" row container">
                        <h2>Symptom Details:</h2>
                    </div>

                    <div class=" add_sym">
                        <div class="row">
                            
                            <table border="0" cellspacing="4px">
                                <thead>
                                <tr>
                                    <td>Symptom</td>
                                    
                                    <td>Values</td>
                                    <td>Effect</td>
                                    <td>Description</td>
                                    <td>weight</td>
                         
                                </tr> 
                                </tr>
    </thead>    <tbody>
                                <?php
                     
                                  if($no > 0) 
                                     {
                                   
                                         while($rowtab = mysqli_fetch_assoc($res))
                                             {
                                         ?>
    
                                  <tr>
                                    <td><?php echo $rowtab['s_name'] ?>
                                  </td>
                                  
                                    
                                    <td> <?php echo $rowtab['fuzzy_set'] ?></td>
                                    <td>
                                    <?php echo $rowtab['fv'] ?></td>
                                    <td>
                                    <?php echo $rowtab['Description'] ?>
                                    </td>
                                    <td> <input  style=" width: 32%;" type="text" value="<?php echo $rowtab['weight'] ?>" name="weight"  class="form-control input-group-lg " id="weight">
                                        
                                                                       
                                    <button type="submit" id="delete" name="submit" class="btn btn-default btn-primary button" onclick="delete_dis(<?php echo $rowtab['s_id'] ?> ,<?php echo $rowtab['did'] ?>)">Delete</button>
                                    </td>

                                </tr>
                                <?php

                                    }
                                }

                                ?>
                                    </tbody>
                            </table>
                            <!-- col-md-offset-2 -->
                            <br>
                            <div align="right">
                            <button type="submit" id="add" name="submit" class="btn btn-default btn-primary button" onclick="addsym()">Add</button></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="addhere" class="container">

            </div>
            <div class="container" id="disease_info">

      </div>
            <div class="container vertical-gap">
                <div class="row">
                    <div align="center" class="col-md-2 col-md-offset-5">
                        <button align="center" type="submit" id="save" name="submit" class="btn btn-default btn-primary button" onclick="send_data()">SAVE</button>
                        <!-- <button align="center" type="submit" id="submit" name="submit" class="btn btn-default btn-primary button" onclick="onSubmitDis()">SUBMIT</button> -->
                    </div>
                </div>
            </div>
            <!-- <button type="button" class="btn btn-info " data-toggle="modal" id="modal_button" data-target="#myModal">Open Modal</button> -->

 



        </div>
    </div>

 
</body>

</html>
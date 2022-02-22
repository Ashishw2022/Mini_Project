<?php
include '../config.php';
session_start();
if($_SESSION['UserID']==""){
	header("location:../login.php");
}
                  $uname=$_SESSION['UserID'];
                  echo $uname;
                  
                  $query="select * from login l,u_reg d where l.loginid = d.loginid AND l.loginid='$uname'";
                  //$query = “select * from tbl_login";
                  $result = mysqli_query($con ,$query);
                 
                  $row=mysqli_fetch_array($result);
                  // $imageURL='image/'.$row["image"];

                  $qu_run = mysqli_query($con, "SELECT did,dname,specialist FROM disease ");
?>
<!Doctype HTML>
<html>
<head>
	<title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<body>
	<header class="header">
    
    
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>
       <nav class="navbar"> 

        <a  class="icon-a"><?php echo $row['FirstName'] ?></a>
        <a href="../logout.php" class="btn" id="loginbtn" href="../login.php">Logout</a>
     </nav> 

    
        <div id="menu-btn" class="fas fa-bars"></div>
    
    </header>
	<div id="mySidenav" class="sidenav">
    
 
  <a href="index.php" class="icon-a "><i class="fas fa-user-circle"></i> &nbsp;&nbsp;Profile</a>
  <a href="diseasetype.php"class="icon-a active"><i class="fas fa-disease"></i> &nbsp;&nbsp;Health checkup</a>
 <!-- <a href="appointment.php"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
 <a href="feedback.php"class="icon-a"><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Feedback</a>
</div>

<div id="main">
<table id="diseaselist">
      <tbody>

        <tr>
          <td>Type of Disease</td>
          <td>Fill the symptoms</td>
          
         
        </tr>
        <tr>
        <?php
        if(mysqli_num_rows($qu_run)>0) 
        {
            while($row = mysqli_fetch_assoc($qu_run))
            {
              ?>
                <tr>
               
                <td><?php echo $row['dname']; ?></td>
               <td>
               <a href="cheart.php?id=<?php echo $row['did']; ?>" type="submit" class="btn btn-default btn-primary">Check Symptoms</a></td>
                </td>
               <?php

            }
        }
      
      ?>

            </tr>
      </tbody>
    </table>
     
       
</div>
      </tbody>
</html>

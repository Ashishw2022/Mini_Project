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
?>
<!Doctype HTML>
<html>
<head>
	<title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
    <script src="../patient/js/user_form.js"  type="text/javascript"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../patient/css/basic style.css">
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
  <a href="diseasetype.php"class="icon-a"><i class="fas fa-disease"></i> &nbsp;&nbsp;Health checkup</a>
 <!-- <a href="appointment.php"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
 <a href="feedback.php"class="icon-a"><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Feedback</a>
  


</div>
<div id="main">

	<div class="head">
    <h1>Select your symptom levels!</h1>
				</div>


		<div class="container ">
	    <div id="add_here">
	    </div>
	</div>

	<div class="container">
		<div class="vertical-gap" align="center">
				<button class="btn btn-default btn-primary col-sm-offset-5" onclick="make_string()">Evaluate Symptoms!</button>
				
		</div>
    <div id="results">
	    </div>
	</div>
	<div class="container">
			<!-- <div id="map" style ="height:750px;"><h5><b>Doctors Nearby: <b></h5><br><iframe width="100%" height="90%" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/search?q=doctors%20near%20me&key=AIzaSyBhKby_bqftsSOZnHM3H0DBor_I1iJlFpY"></iframe></div> -->
    		<div id="precaution" style="margin-top: 30px">
		
		</div>
	</div>

</body>


</html>

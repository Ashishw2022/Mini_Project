<?php
  session_start();
  if($_SESSION['UserID']==""){
      header("location:../login.php");
  }
  include 'config.php';
  ?>
<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="stylesheet" href="../css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
  <?
  ?>
	<header class="header">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>
       <nav class="navbar"> 

        <a  class="icon-a"><i class="fas fa-users-cog"></i>Admin</a>
        <a href="../logout.php" class="btn" id="loginbtn">Logout</a>
     </nav> 

    
        <div id="menu-btn" class="fas fa-bars"></div>
    
    </header>
	<div id="mySidenav" class="sidenav">
    
 
  <a href="index.php" class="icon-a active"><i class="fas fa-tachometer-alt"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="patient.php"class="icon-a"><i class="fas fa-users"></i> &nbsp;&nbsp;Patients</a>
  <a href="doctor.php"class="icon-a "><i class="fas fa-user-md"></i> &nbsp;&nbsp;Doctors</a>
  <!-- <a href="#"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
  <a href="disease.php"class="icon-a"><i class="fas fa-disease"></i> &nbsp;&nbsp;Diseases</a>
  


</div>
<div id="main">

	<div class="head">
		<!-- <div class="col-div-6">
<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Dashboard</span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Dashboard</span>
</div> -->
	
	
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
	<div class="col-div-3">
		<div class="box">
            <?php
            $pat="SELECT * from u_reg";
            $pat_run=mysqli_query($con,$pat);
            if($total=mysqli_num_rows($pat_run))
            {
                echo '<p>'.$total.'<br/><span>Patients</span></p>';


            }
            else
            {
                echo '<p>0<br/><span>Patients</span></p>';
            }
            ?>
			
			<i class="fa fa-users box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
        <?php
            $pat="SELECT * from d_reg";
            $pat_run=mysqli_query($con,$pat);
            if($total=mysqli_num_rows($pat_run))
            {
                echo '<p>'.$total.'<br/><span>Doctors</span></p>';


            }
            else
            {
                echo '<p>0<br/><span>Doctors</span></p>';
            }
            ?>			
			<i class="fas fa-user-md box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p>0<br/><span>Appointments</span></p>
			<i class="far fa-calendar-check box-icon"></i>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<br/><br/>
	<div class="col-div-8">
		<div class="box-8">
		<div class="content-box">
			
		</div>
	</div>
	</div>

	<div class="col-div-4">
		<div class="box-4">
		<div class="content-box">
			<img src="images/winning-the-battle-against-coronavirus-animate.svg" alt="">
		</div>
	</div>
	</div>
		
	<div class="clearfix"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

</body>


</html>

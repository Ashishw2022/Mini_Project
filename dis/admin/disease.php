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
    
 
  <a href="index.php" class="icon-a"><i class="fas fa-tachometer-alt"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="patient.php"class="icon-a"><i class="fas fa-users"></i> &nbsp;&nbsp;Patients</a>
  <a href="doctor.php"class="icon-a "><i class="fas fa-user-md"></i> &nbsp;&nbsp;Doctors</a>
  <!-- <a href="#"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
  <a href="disease.php"class="icon-a active"><i class="fas fa-disease"></i> &nbsp;&nbsp;Diseases</a>
  


</div>
<div id="main">

</div>

</body>


</html>

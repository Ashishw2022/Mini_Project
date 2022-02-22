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
  
	<header class="header">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>
       <nav class="navbar"> 

        <a href="#" class="icon-a"><i class="fas fa-users-cog"></i>Admin</a>
        <a href="../logout.php" class="btn" id="loginbtn">Logout</a>
     </nav> 

    
        <div id="menu-btn" class="fas fa-bars"></div>
    
    </header>
	<div id="mySidenav" class="sidenav">
    
 
  <a href="index.php" class="icon-a"><i class="fas fa-tachometer-alt"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="patient.php"class="icon-a active"><i class="fas fa-users"></i> &nbsp;&nbsp;Patients</a>
  <a href="doctor.php"class="icon-a "><i class="fas fa-user-md"></i> &nbsp;&nbsp;Doctors</a>
<!-- <a href="#"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
<a href="disease.php"class="icon-a"><i class="fas fa-disease"></i> &nbsp;&nbsp;Diseases</a>
  


</div>
<div id="main">
    <?php
    $query = "SELECT u_id,FirstName,LastName,email,pass,d.loginid,l.sta,phonenumber,address FROM u_reg d,login l WHERE d.loginid=l.loginid";
    $qu_run=mysqli_query($con,$query);

    ?>

	<table class="doctortable" width="100%" cellspacing="0">
    <thead>    
    <tr>

            <td> ID</td>
            <td> FirstName </td>
            <td> LastName </td>
            <td> Email</td>
            <td> Password</td>
            <td> PhoneNumber</td>
            <td> Address</td>
            <td> Status </td>
            <td>  </td>
    </tr>
    </thead>
    <tbody>

        <?php
        if(mysqli_num_rows($qu_run)>0) 
        {
            while($row = mysqli_fetch_assoc($qu_run))
            {
              ?>
                <tr>
                <td><?php echo $row['u_id']; ?></td>
                <td><?php echo $row['FirstName'] ?></td>
                <td><?php echo $row['LastName']?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['pass']; ?></td>
                <td><?php echo $row['phonenumber']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php 
                    if($row['sta']==1){
                    echo '<p><a href="psta.php?id='.$row['loginid'].'&status=0" type="submit"   class="btn">Enable</a></p></td>';
                 
                    }
                  else{
                    echo '<p><a href="psta.php?id='.$row['loginid'].'&status=1" type="submit" id="dangbtn" class="btn " >Disable</a></p></td>';
                      }?>
               <!-- <td>
                 <a href="p_edit.php?id=<?php echo $row['loginid']; ?>" type="submit" class="btn btn-primary">Edit</a></td> -->
               
               <?php

            }
        }
      
      ?>
    </tbody>
    
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });

</script>

</body>
</html>
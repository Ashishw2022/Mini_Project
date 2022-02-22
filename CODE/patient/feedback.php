<?php
include '../config.php';
session_start();
if($_SESSION['UserID']==""){
	header("location:../login.php");
}
                  $uname=$_SESSION['UserID'];
                  //echo $uname;
                  
                  $query="select * from login l,u_reg d where l.loginid = d.loginid AND l.loginid='$uname'";
                  //$query = “select * from tbl_login";
                  $result = mysqli_query($con ,$query);
                 
                  $row=mysqli_fetch_array($result);
                  // $imageURL='image/'.$row["image"];
            //    $id = $_GET['id'];
        
?>
<!Doctype HTML>
<html>
<head>
	<title>Profile</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
*{
  box-sizing:border-box;}
input{padding:5px;  margin-bottom:5px;}
.heading{background-color:#ac1219; color:white; height:40px; width:100%; line-height:40px; text-align:center;}

.pic{text-align:left; width:33%; float:left;}
</style>


<body>
	<header class="header">
    
    
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>
       <nav class="navbar"> 

        <a  class="icon-a" style="color: #16a085;"><?php echo $row['FirstName'] ?></a>
        <a href="../logout.php" class="btn" id="loginbtn" href="../login.php">Logout</a>
     </nav> 

    
        <div id="menu-btn" class="fas fa-bars"></div>
    
    </header>
	<div id="mySidenav" class="sidenav">
    
 
  <a href="index.php" class="icon-a"><i class="fas fa-user-circle"></i> &nbsp;&nbsp;Profile</a>
  <a href="diseasetype.php"class="icon-a"><i class="fas fa-disease"></i> &nbsp;&nbsp;Health checkup</a>
  <!-- <a href="appointment.php"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
  <a href="feedback.php"class="icon-a active"><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Feedback</a>
  


</div>

<div id="main">
 <h2 align="center">Feedback Page</h2>

 <div class="form_box shadow">
 <form method="POST" action="#">
 <br/>
 <h3 align="center">Feedback for Vcare disease Prediction</h3>
 
 
 <p align="center">Do you have any suggestion for us? </p>
 <div align="center">
 <input class="input-group-lg" type="text" name="FirstName" value="<?php echo $row['FirstName']," ",$row['LastName'] ?>" placeholder="change First Name" >
</div>
 <div align="center">
 <textarea class="input-group-lg"name="suggestion" rows="8" cols="40"></textarea>
</div>
<div align="center">
  <input  type="submit" name="submit" class="btn"  value="Submit">
</form>
 </div>
</div>
<?php
    if (isset($_POST['submit'])) {
      $msg = $_POST['suggestion'];
      $qur="INSERT INTO feedback (`message`, `loginid`) VALUES ('$msg',' $uname')";
      $sql = mysqli_query($con,$qur);
      // mysqli_query($con,$sql1);
      echo "<script>location='feedback.php'</script>";
    }
  ?>
</body>


</html>

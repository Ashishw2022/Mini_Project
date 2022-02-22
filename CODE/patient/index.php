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
            //    $id = $_GET['id'];

                $qry = mysqli_query($con, "SELECT u_id,FirstName,LastName,email,pass,gender,d.loginid,d.phonenumber,d.address FROM u_reg d,login l WHERE d.loginid=l.loginid AND l.loginid='$uname'");

                $data = mysqli_fetch_array($qry);

                if (isset($_POST['update'])) {
                  $fn = $_POST['FirstName'];
                  $ln = $_POST['LastName'];
                  $email = $_POST['email'];
                  $phonenumber = $_POST['phonenumber'];
                  $address = $_POST['address'];


                  $edit = mysqli_query($con, "update u_reg d,login l set FirstName='$fn', LastName='$ln',email='$email',phonenumber='$phonenumber',address='$address' where d.loginid=l.loginid and d.loginid='$uname'");

                 
                 // echo "<script>location='index.php'</script>";
                  if ($edit) {
                   
                    //header("location:doctor.php");
                    echo "<script>location='../patient/index.php'
                    
                    </script>";
                  } else {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                  }
                }
?>
<!Doctype HTML>
<html>
<head>
	<title>Profile</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../patient/js/profile.js"  type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script>
   
   function validate() {
    if (document.getElementById("fn").value.trim() == "") {
       printError("fnErr", "Please enter firstname");
       document.getElementById("fn").classList.add("errorClass");
       // return false;
     } 
     else {
       printNoError("fnErr", "");
       document.getElementById("fn").classList.remove("errorClass");
     }
     if (document.getElementById("ln").value.trim() == "") {
       printError("lnErr", "Please enter lastname");
       document.getElementById("ln").classList.add("errorClass");
       // return false;
     } 
     else {
       printNoError("lnErr", "");
       document.getElementById("ln").classList.remove("errorClass");
     }

     if (document.form1.email.value.trim() == "") {
       printError("nameErr", "Please enter email address");
       document.getElementById("email").classList.add("errorClass");
       // return false;
     } 
     else {
       printNoError("nameErr", "");
       document.getElementById("email").classList.remove("errorClass");
     }

     if (document.getElementById("pn").value.trim() == "") {
       printError("pnErr", "Please enter phonenumber");
       document.getElementById("pn").classList.add("errorClass");
       // return false;
     } 
     else {
       printNoError("pnErr", "");
       document.getElementById("pn").classList.remove("errorClass");
     }
     if (document.getElementById("address").value.trim() == "") {
       printError("addressErr", "Please enter address");
       document.getElementById("address").classList.add("errorClass");
       // return false;
     } 
     else {
       printNoError("addressErr", "");
       document.getElementById("address").classList.remove("errorClass");
     }

     if (document.getElementById("fn").value.trim() == "" || document.getElementById("ln").value.trim() == "" || document.getElementById("email").value.trim() == "" || document.getElementById("pn").value.trim() == ""  || document.getElementById("address").value.trim() == "") {
       return false;
     } else {
       return true;
     }
   }

   function printError(elemId, hintMsg) {
     var elem = document.getElementById(elemId);
     elem.classList.add("error")
     elem.innerHTML = hintMsg;
   }
    function printNoError(elemId, hintMsg) {
     var elem = document.getElementById(elemId);
     elem.classList.remove("error");
     elem.innerHTML = hintMsg;
     //   

   }
   function errorMsg(hintMsg){
     
     var elem = document.getElementById("mismatchError");
     elem.classList.add("error")
     elem.innerHTML = hintMsg;
     document.getElementById("email").classList.add("errorSub");
     document.getElementById("pass").classList.add("errorSub");
     
   }
   
 </script>

</head>


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
    
 
  <a href="index.php" class="icon-a active"><i class="fas fa-user-circle"></i> &nbsp;&nbsp;Profile</a>
  <a href="diseasetype.php"class="icon-a"><i class="fas fa-disease"></i> &nbsp;&nbsp;Health checkup</a>
  <!-- <a href="appointment.php"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
  <a href="feedback.php"class="icon-a"><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Feedback</a>
  


</div>

<div id="main">

<!--  div for viewing the profile page -->
  <div id="userdetails">
  <table id="userprofile">
      <tbody>
      <tr>
        <td></td>
          <td>
            <div align="right">
              <button type="submit" id="editButton" name="edit" class="submit btn btn-default btn-primary button" onclick="editProfile()">Edit profile</button>
              </div>
          </td>
        </tr>
        <tr>
          <td>UserId 
              </td>
            <td><?php echo $data['loginid'] ?></td>
        </tr>
        <tr>
          <td>
            FirstName 
          </td>
          <td>
            <?php echo $data['FirstName'] ?>
          </td>
        </tr>
        <tr>
          <td>
            Lastname 
          </td>
          <td>
          <?php echo $data['LastName'] ?>
          </td>
        </tr>

        
        <tr>
          <td>Email</td>
          <td>
          <?php echo $data['email'] ?>

          </td>
        </tr>
        <tr>
          <td>Phone Number</td>
          <td> <?php if($data['phonenumber'] != 0){
             echo $data['phonenumber'] ;
          }else{
            echo "";

          }
          
          ?>
          </td>
        </tr>
        <tr>
          <td>Address</td>
          <td> <?php echo $data['address'] ?>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>

  <!--  div for editing  the profile page -->
    <div id="add_here" class="container">
    <form name="form1" method="POST" onsubmit="return validate()" >
    <table id="userprofile">
      <tbody>
      <tr>
          <td>
            FirstName 
          </td>
          <td>
            <input id ="fn" class="input-group-lg" type="text" name="FirstName" value="<?php echo $data['FirstName'] ?>" placeholder="change First Name" >
            <div class="id" id="fnErr"></div>
          </td>
        </tr>
        <tr>
          <td>
            Lastname 
          </td>
          <td>
            <input id="ln" class="input-group-lg" type="text" name="LastName" value="<?php echo $data['LastName'] ?>" placeholder="change Last Name" >
            <div class="id" id="lnErr"></div>
          </td>
        </tr>

       
        <tr>
          <td>Email</td>
          <td>
            <input id="email" class="input-group-lg" type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="change email" >
            <div class="id" id="nameErr"></div>
          </td>
        </tr>
        <tr>
          <td>Phone Number</td>
          <td>
           
            <?php if($data['phonenumber'] == 0){ ?>
              <input  id ="pn" class="input-group-lg" type="text" name="phonenumber"  placeholder="phonenumber" maxlength="10" >
              
             
              <?php }else{   ?>

            <input id ="pn" class="input-group-lg" type="text" name="phonenumber" maxlength="10" value="<?php echo $data['phonenumber']?> " placeholder="phone number" >

           <?php } ?>
           <div class="id" id="pnErr"></div>
          </td>
        </tr>
        <tr>
        <td>Address</td>
        <td>
          <input id="address" class="input-group-lg" type="text" name="address" value="<?php echo $data['address'] ?>" placeholder="Address" >
          <div class="id" id="addressErr"></div>
        </td>
      </tr>

      
       
        <tr>
          <td></td>
          <td>
          <input class="submit btn btn-default btn-primary button" type="submit" name="update" value="update">
          <input type="submit" class="submit btn btn-default btn-primary button" value="cancel" onClick="document.location.href='../patient/index.php';" />
        </td>
        </tr>
      </tbody>
    </table>
              </form>
        </div>


</div>
	

</body>


</html>

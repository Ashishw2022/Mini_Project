<html>

<head>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign in</title>
</head>
<?php include'header.php'; ?>

<body>
<?php
include 'config.php';
?>
<section class="tab" >

<div class="clearfix secondary-nav" style="margin-left:627px;margin-top:65px;">
              <ul class="list">
                 <li><a class="logintab" href="login.php">Login</a></li>
                 <li><a style="text-decoration : underline;color: #16a085;" class="rtab" href="uregister.php">Register</a></li>
              </ul>
          </div>
</section>
 
<section class="home loginpage" id="home">
    
        <div class="loginimage"   align ="center">
            <img src="image/online-doctor-animate.svg" alt="">
        </div>
    
  <div class="main" id="main1"  align ="center">
    <a class="doctorregister" href="uregister.php">Not a Doctor?Click Here to Register</a>
    <p class="sign" align="center">Register</p>
   
    <form name="form1" class="form1" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
<img src="image/profile.png" onClick="triggerClick()" id="pd"/>
<input type="file" name="pi" onChange="displayImage(this)"  id="pi" style="display:none;">
<div class="id" id="pf"></div>
<input name="fn" class="un " type="text" id="fn" align="center" placeholder="First Name">
<div class="id" id="fname"></div>
<input name="ln" class="un " type="text" id="ln" align="center" placeholder="Last Name">
<div class="id" id="lname"></div>
<!-- <input type="date" data-date-inline-picker="true" class="un" align="center" placeholder="Date Of Birth"> -->
<!-- <label for="gender">Gender :</label> -->
<select name="gender" name="gender" id="gender" class="un" align="center" value="gender">
  <option class="un " value="">Select Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
<div class="id" id="genderErr"></div>
<input name="email" class="un" type="email" id="email" align="center" placeholder="email">
<div class="id" id="emailError"></div>
      <select name="spec" id="specialization"  class="un" align="center" value="specialization">
        <option  class="un " name="spec" value="">Select specialization</option>
        <option value="gp">General Physician</option>
        <option value="cardio">Cardiologists</option>
        <option value="ortho">Orthopedist</option>
        </select>
        <div class="id" id="specErr"></div>

        <input name="pass" class="pass" id="pass1" type="password" align="center" placeholder="password">
        <div class="id" id="passError1"></div>
        <input name="conpass" class="pass" id="pass2" type="password" align="center" placeholder="Confirm Password">
        <div class="id" id="passError2"></div>
        <input type="submit" name="submit" class="submit" value="Register">
      <!-- <p class="forgot" align="center"><a href="#">Forgot Password?</p> -->
          
                
    </div>

</section>
<script>
    function validate() {
      if (document.form1.pi.value.trim() == "") {
        printError("pf", "Please insert profile pic");
        document.getElementById("pi").classList.add("errorClass");
        // return false
      } 
      else {
        printNoError("pf", "");
        document.getElementById("fn").classList.remove("errorClass");
      }

      if (document.form1.fn.value.trim() == "") {
        printError("fname", "Please enter first name");
        document.getElementById("fn").classList.add("errorClass");
        // return false
      } 
      else {
        printNoError("fname", "");
        document.getElementById("fn").classList.remove("errorClass");
      }

      if (document.form1.ln.value.trim() == "") {
        printError("lname", "Please enter Last name");
        document.getElementById("ln").classList.add("errorClass");
      } 
      else {
        printNoError("lname", "");
        document.getElementById("ln").classList.remove("errorClass");
      }

      // if (document.form1.email.value.trim() == "") {
      //   printError("emailError", "Please enter email");
      //   document.getElementById("email").classList.add("errorClass");
      // } 
      // else {
      //   printNoError("emailError", "");
      //   document.getElementById("email").classList.remove("errorClass");
      // }
     
      if (document.getElementById("pass1").value.trim() == "") {
        printError("passError1", "Please enter password");
        document.getElementById("pass1").classList.add("errorClass");
      } 
      else {
        if (document.getElementById("pass1").value.length <= 8) {
          printError("passError1", "password length is less than 8");
          document.getElementById("pass1").classList.add("errorClass");
        } else {
          printNoError("passError1", "");
          document.getElementById("pass1").classList.remove("errorClass");
        }
      }

      if (document.getElementById("pass2").value.trim() == "") {
        printError("passError2", "Please enter confirm password");
        document.getElementById("pass2").classList.add("errorClass");
      } else {
        if (document.getElementById("pass2").value.length <= 8) {
          printError("passError2", "password length is less than 8");
          document.getElementById("pass1").classList.add("errorClass");
        } else if (document.getElementById("pass1").value.trim() != document.getElementById("pass2").value.trim()) {
          printError("passError2", "Password does not match");
          document.getElementById("pass2").classList.add("errorClass");
        } else {
          printNoError("passError2", "");
          document.getElementById("pass2").classList.remove("errorClass");
        }
      }

      if (document.form1.gender.value.trim() == "") {
        printError("genderErr", "Please enter gender");
        document.getElementById("gender").classList.add("errorClass");
      } else {
        printNoError("genderErr", "");
        document.getElementById("gender").classList.remove("errorClass");
      }
      if (document.form1.specialization.value.trim() == "") {
        printError("specErr", "Please enter specialization");
        document.getElementById("specialization").classList.add("errorClass");
      } else {
        printNoError("specErr", "");
        document.getElementById("specialization").classList.remove("errorClass");
      }
      var email=  document.getElementById("email").value;
       $.ajax({
        url   : "/dis/emailcheck.php",
        type  : "POST",
        async : false,
        data  : {
          "emailId" : email
                   },
        success: function(data)
        {
            //alert(data);
            if (document.form1.email.value.trim() == "") {
        printError("emailError", "Please enter email");
        document.getElementById("email").classList.add("errorClass");
      } 
           else if(data==-1){
        printNoError("emailError", "");
        document.getElementById("email").classList.remove("errorClass");
        	}	else
    	    {
            printError("emailError", "Email Exists already");
            document.getElementById("email").classList.add("errorClass");
    	    }
        }
    });

      if (document.form1.pi.value.trim() == "" ||document.form1.fn.value.trim() == "" || document.form1.ln.value.trim() == "" || document.form1.email.value.trim() == "" || document.form1.gender.value.trim() == "" || document.getElementById("pass2").value.trim() == "" || document.getElementById("pass1").value.trim() == "" || document.getElementById("pass1").value.trim() != document.getElementById("pass2").value.trim() || document.form1.specialization.value.trim() == "" || document.getElementById("emailError").innerHTML === "Email Exists already") {
        return false;
      } else {
        return true;
      }
    }

    function printError(elemId, hintMsg) {
      var elem = document.getElementById(elemId);
      elem.classList.add("error");
      elem.innerHTML = hintMsg;
      //   

    }

    function printNoError(elemId, hintMsg) {
      var elem = document.getElementById(elemId);
      elem.classList.remove("error");
      elem.innerHTML = hintMsg;
      //   

    }

    
  
  function triggerClick() {
    document.querySelector('#pi').click();
}
function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.querySelector('#pd').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
  </script>
<?php


if(isset($_POST['submit'])){
  //$image=basename($_FILES["pi"]["name"]);
//   $targetDir="profs/";
//   $filename=$_FILES["pi"]["name"];
//   $temp=$_FILES["pi"]["tmp_name"];
  
//   $targetFilePath=$targetDir.$filename;
//  // move_uploaded_file($_FILES["pi"]["tmp_name"],$targetFilePath);
//  move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath);

$image=basename($_FILES["pi"]["name"]);
$targetDir="profs/";
$targetFilePath=$targetDir.$image;
move_uploaded_file($_FILES["pi"]["tmp_name"],$targetFilePath);

$email=$_POST['email'];
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$gen=$_POST['gender'];
$spec=$_POST['spec'];
$pass=$_POST['pass'];
$sql=mysqli_query($con,"INSERT into login ( `email`, `pass`, `role`, `sta`) values('$email','$pass','doc',1)");
 $roleid = mysqli_insert_id($con);
 $sql1="INSERT into d_reg (FirstName, LastName, gender, speciali, Sta, role, loginid,img,experience,education,phonenumber, address) values ('$fn','$ln','$gen','$spec',1,'doc','$roleid','$image',0,'',0, '')";
 echo $sql,$sql1;
 // mysqli_query($con,$sql1);
 if(mysqli_query($con,$sql1)){
  echo"<script>location='login.php'</script>";
 }else{
  echo"<script>location='doctorregister.php'</script>";
 }
 
}
?>
<?php include'footer.php'; ?>
</body>

</html>
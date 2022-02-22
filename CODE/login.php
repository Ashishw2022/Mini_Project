<html>

<head>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/style.css">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <title>Sign in</title>
</head>
<?php
session_start();

include 'header.php';
include 'config.php';
?>

<body>


  <section class="tab">

    <div class="clearfix secondary-nav" style="margin-left:627px;margin-top:65px;">
      <ul class="list">
        <li><a style="text-decoration : underline;color: #16a085;" class="logintab" href="login.php">Login</a></li>
        <li><a class="rtab" href="uregister.php">Register</a></li>
      </ul>
    </div>
  </section>

  <section class="home loginpage" id="home">

    <div class="loginimage" align="center">
      <img src="image/online-doctor-animate (1).svg" alt="">
    </div>

    <div class="main" align="center">
      <p class="sign" align="center">Login</p>
      <form name="form1" class="form1" method="POST" onsubmit="return validate()">

        <div class="id" id="mismatchError"></div>
        <input class="un" type="email" id="email" name="email" align="center" placeholder="email">
        <div class="id" id="nameErr"></div>
        <input class="pass" type="password" id="pass" name="pass" align="center" placeholder="Password">
        <div class="id" id="passErr"></div>
        <input class="submit" type="submit" name="submit" align="center" value="Login">
        <!-- <p class="forgot" align="center"><a style="margin-left: 38px; " href="#">Forgot Password?</p> -->

      </form>
    </div>

  </section>
  <script>
   
    function validate() {
     
      if (document.form1.email.value.trim() == "") {
        printError("nameErr", "Please enter email address");
        document.getElementById("email").classList.add("errorClass");
        // return false;
      } 
      else {
        printNoError("nameErr", "");
        document.getElementById("email").classList.remove("errorClass");
      }


      if (document.form1.pass.value.trim() == "") {
        printError("passErr", "Please enter password");
        document.getElementById("pass").classList.add("errorClass");
        //   return false;

      }
      else {
        printNoError("passErr", "");
        document.getElementById("pass").classList.remove("errorClass");
      }

      if (document.form1.email.value.trim() == "" || document.form1.pass.value.trim() == "") {
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
  <?php

  if (isset($_POST['submit'])) {
    $user = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = mysqli_query($con, "SELECT * FROM login WHERE email='$user' AND pass='$pass'");
    if (mysqli_num_rows($sql) > 0) {
      while ($row = mysqli_fetch_assoc($sql)) {
        if ($row['sta'] == 1) {
          if ($row['role'] == 'admin') {
            $_SESSION['UserID'] = $row['loginid'];
            header("location: admin");
          } else if ($row['role'] == 'user') {
            $_SESSION['UserID'] = $row['loginid'];
            header("location: patient");
          } else if ($row['role'] == 'doc') {
            $_SESSION['UserID'] = $row['loginid'];
            header("location: doctor");
          }
          // elseif($row['role']=='user')
          // {
          //   $_SESSION['login_admin']=$row['role_id'];
          //   header("location: user_dashboard.php");
          // }
        } else {
          ?>
          <script>errorMsg('User is blocked by admin')
          </script>
          <?php  }
      }
    } else { ?>
     <script>
    errorMsg('Username and password are incorrect');
     
</script>
     
      <?php   }
  }

  ?>
  <?php include 'footer.php'; ?>
</body>

</html>
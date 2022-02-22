<?php
include '../config.php';
session_start();
$uname = $_SESSION['UserID'];
echo $uname;

$query = "select * from login l,d_reg d where l.loginid = d.loginid AND l.loginid='$uname'";
//$query = “select * from tbl_login";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);
// $imageURL='image/'.$row["image"];
?>

<!Doctype HTML>
<html>

<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css">
    <script src="../doctor/js/add_disease.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<body>
    <header class="header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>
        <nav class="navbar">

            <a class="icon-a" style="color: #16a085;">&nbsp&nbsp<?php echo $row['FirstName'] ?></a>
            <a href="../logout.php" class="btn" id="loginbtn" href="../login.php">Logout</a>
        </nav>


        <div id="menu-btn" class="fas fa-bars"></div>

    </header>
    <div id="mySidenav" class="sidenav">


        <a href="index.php" class="icon-a "><i class="fas fa-user-circle"></i> &nbsp;&nbsp;Profile</a>
        <a href="listdis.php" class="icon-a"><i class="fas fa-disease"></i> &nbsp;&nbsp;Diseases</a>
        <a href="dis.php" class="icon-a active"><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Add Diseases</a>
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
                                <td> <input type="text" name="dname" placeholder="Disease Name" class="form-control input-group-lg " id="dname" autofocus></td>
                            </tr>
                            <tr>
                                <td>Specialist:</td>
                                <td> <input type="text" name="specialist" placeholder="Specialist" class="form-control input-group-lg " id="specialist"></td>
                            </tr>
                            <tr>
                                <td>Precaution:</td>
                                <td> <textarea placeholder="Enter Precautions" name="precaution" class="form-control input-group-lg" rows="5" id="precaution"></textarea></td>
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
                                <tr>
                                    <td>Symptom:</td>
                                    <td> <input type="text" placeholder="Symptom" class="form-control input-group-lg" id="sname"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <label><input id="mycheck" type="checkbox" value="">Range</label>

                                </tr>
                                <tr>
                                    <td>no:</td>
                                    <td> <input type="number" placeholder="No." class="form-control input-group-lg" id="no"></td>
                                </tr>
                                <tr>
                                    <td>weight:</td>
                                    <td> <input type="number" placeholder="Weight" class="form-control  input-group-lg" id="weight"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <button style ="margin-left:25%"type="submit" name="submit" class="btn btn-default btn-primary button" onclick="f2()">ADD SYMPTOM</button></td>
                                </tr>
                            </table>
                            <!-- col-md-offset-2 -->
                            <br>


                        </div>
                    </div>
                </div>
            </div>

            <div id="add_here" class="container">

            </div>
            
            <div class="container vertical-gap">
                <div class="row">
                    <div align="center" class="col-md-2 col-md-offset-5">
                        <button align="center" type="submit" id="save" name="submit" class="btn btn-default btn-primary button" onclick="send_data()">SAVE</button>
                        <!-- <button align="center" type="submit" id="submit" name="submit" class="btn btn-default btn-primary button" onclick="onSubmitDis()">SUBMIT</button> -->
                        <button align="center" type="submit" id="submit" name="submit" class="btn btn-default btn-primary button" onclick="document.location.href='../doctor/dis.php';">CANCEL</button>
                    </div>
                </div>
            </div>
            <!-- <button type="button" class="btn btn-info " data-toggle="modal" id="modal_button" data-target="#myModal">Open Modal</button> -->

 



        </div>
    </div>

           <!-- Modal -->
           <!-- <div id="myModal" class="modal"> -->

<!-- Modal content -->
<!-- <div class="modal-content">
  <span class="close">&times;</span>
<h1 style= "padding: 40px;">Symptom added to knowledge base.</h1>
<button class="btn btn-default btn-primary button" onclick="onSubmitDis()" style="float:right;">OK</button>


  
</div> -->

<!-- </div> -->
<!-- <script>
// Get the modal
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
 // onSubmitDis();
}

function 
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> -->
</body>

</html>
<?php
include '../config.php';
session_start();
if($_SESSION['UserID']==""){
  header("location:../login.php");
}
                  $uname=$_SESSION['UserID'];
                  echo $uname;
                  
                  $query="select * from login l,d_reg d where l.loginid = d.loginid AND l.loginid='$uname'";
                  //$query = “select * from tbl_login";
                  $result = mysqli_query($con ,$query);
                 
                  $row=mysqli_fetch_array($result);
                  // $imageURL='image/'.$row["image"];
                  ?>
                
<!Doctype HTML>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="../css/style.css">
	
    <script type="text/javascript">

		var no=0;
        $(document).ready(function(){
            ajax_call();
        });


        function ajax_call()
        {
            $.ajax({
                url   : "../doctor/doctor_list.php",
                type  : "POST",
                async : false,
                data  : {

                        },
                success: function(data)
                {
                	//console.log(data);
                    $('#add_here').append(data);
                }
            });
        }

		function disease_info(str)
        {
            $.ajax({
                url   : "../doctor/disease_info.php",
                type  : "POST",
                async : false,
                data  : {
							"disease":str,
                        },
                success: function(data)
                {
					format(data);
                }
            });
        }

		function disease_data(e)
		{
					//alert(e.id);
					//$('#add_here').append(e.id);
					disease_info(e.id);
		}
        function delete_dis(did){
            if (confirm("Are you sure you want to delete the disease")) {
            $.ajax({
                url   : "../doctor/del_disease.php",
                type  : "POST",
                async : false,
                data  : {
							"diseaseid":did,
                        },
                success: function(data)
                {
                    $('#add_here').children().remove();
                    ajax_call();
                }
            });
        }
        }
		function format(str)
		{
					var row = '';
					var fi = '';
					var a = str.split('/');
					//alert(a.length);
					for(var i=0;i<a.length-1;i++)
					{
							row = a[i].split('|');
							//alert(row);
							fi += f3(i ,row);

					}
					//alert(final);
					$('#disease_info').html(fi);
					//$(window).scrollTop($('#disease_info').offset().top);
					$('html, body').animate({
							 scrollTop: $("#disease_info").offset().top
				    }, 2000);
		}

		function f3(ind , rows)
		{

			var eff = ["Yes" , "Maybe" , "No"];
			var name = '<div class=" vertical-gap sym_header"><h2>'+(ind+1)+'. '+rows[2]+'</h2><h5> Weight of the symptom '+rows[2] + ' = ' +(rows[3])+'</h5></div>';
	    	var tuple1 = '<td><input type="text" class="form-control" disabled value="'
			var tuple2 = '"></td><td><input class="form-control input-group-lg" disabled name="cars"  value="'

	   		var tb1 = '<div class="vertical-gap"><table class="table table-responsive table-bordered table-hover"><thead><tr><th>Sr No. </th><th>Fuzzy Values</th><th>Effect</th></tr></thead><tbody>';
	    	var tb2 = '</tbody></table></div>';

			var fuzzy = rows[4].split(',');

			var effect = rows[6].split(',');
			//alert(fuzzy);
			var s = '';
			for(var i=0; i<fuzzy.length;i++)
			{
					s += '<tr><td>'+(parseInt(i)+1)+'</td>'+tuple1 + fuzzy[i]  + tuple2 + eff[parseInt(effect[i])-1]+'"></td></tr>';
			}
			var tp = (name+tb1+s+tb2);
			//alert(tp);
			return tp;
		}

  </script>
</head>


<body>
	<header class="header">

        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> V-care. </a>
       <nav class="navbar"> 

        <a  class="icon-a" style="color: #16a085;">&nbsp&nbsp<?php echo $row['FirstName'] ?></a>
        <a href="../logout.php" class="btn" id="loginbtn" href="../login.php">Logout</a>
     </nav> 

    
        <div id="menu-btn" class="fas fa-bars"></div>
    
    </header>
	<div id="mySidenav" class="sidenav">
    
 
  <a href="index.php" class="icon-a "><i class="fas fa-user-circle"></i> &nbsp;&nbsp;Profile</a>
  <a href="listdis.php"class="icon-a active"><i class="fas fa-disease"></i> &nbsp;&nbsp;Diseases</a>
  <a href="dis.php"class="icon-a"><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Add Diseases</a>
  <!-- <a href="#"class="icon-a"><i class="far fa-calendar-check"></i> &nbsp;&nbsp;Appointments</a> -->
  


</div>
<div id="main">
    <div align='right'>
<a href="dis.php" class="btn btn-default btn-primary button">Add Diseases</a>
      
<a href="listdis.php"  class="btn btn-default btn-primary button">Back</a>
    </div>
<div class="container" id="add_here">
    </div>
    <div class="container" id="disease_info">

      </div>
      
</div>

</body>
</html>

<?php
include'connection.php';
session_start();
$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];


if(isset($_POST['sub']))
{
    $d_name=$_POST['dep'];
    

    mysqli_query($conn,"INSERT INTO department_tb(hospital_id,department_name) VALUES('$hospital_id','$d_name') ");
      

  

           echo "<script> alert(' New department added'); </script>";

           
           echo "<script> window.location.href='add_department.php';</script>";  
}




?>
<!DOCTYPE html>
<html lang="en">


<!-- form-vertical23:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>ADD DEPARTMENT</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
       <?php include 'include/header.php'?>
       <?php include 'include/sidebar.php'?>
        <div class="page-wrapper">
            <div class="content">
               <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">ADD DEPARTMENT</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title"></h4>

                                       
                                        <div class="form-group">
                                                <label>Department Name:</label><span style="color: white; background-color: red;" id="spdep"></span>
                                                <input type="text" name="dep" id="dep_id" onkeyup="clrmsg('spdep')" class="form-control" >
                                        </div>
                                                                                                                                                                                                                                                                                        
                                <div class="text-center">
                                    <button type="submit" name="sub" onclick="return validate()" class="btn btn-primary">Submit</button>
                                </div>
                                  </div>
                            </div>
                        </form>
                    </div>
                
            </div>
      
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        function validate()
        {
            var department=document.getElementById("dep_id").value;
            

            if(department=="")
            {
                document.getElementById('spdep').innerHTML="* empty field";
                return false;
            }
           

        }
        function clrmsg(p)
        {
            document.getElementById(p).innerHTML="";
        }
    </script>
</body>


<!-- form-vertical23:59-->
</html>
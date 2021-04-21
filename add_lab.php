<?php
include 'connection.php';
session_start();
$log=$_SESSION['login_id'];
$hosp=mysqli_query($conn,"SELECT * from hospital_tb WHERE login_id='$log'");

$h=mysqli_fetch_assoc($hosp);

$hos=$h['hospital_id'];


if(isset($_POST['sub']))
{
    $lab_name=$_POST['testname'];
    
    $lab_rate=$_POST['rate'];
   
    $lab_time=$_POST['time'];
    
    $lab_description=$_POST['description'];
    

   mysqli_query($conn,"INSERT INTO lab_test(hospital_id,test_name,time_taken,test_rate,description) VALUES('$hos','$lab_name','$lab_time','$lab_rate','$lab_description')");

           echo "<script> alert('lab added'); </script>";

           
           echo "<script> window.location.href='index.php';</script>";  
}




?>
<!DOCTYPE html>
<html lang="en">


<!-- form-vertical23:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>ADD lab</title>
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
                        <h4 class="page-title">ADD lab</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title"></h4>

                                       
                                        <div class="form-group">
                                                <label>test Name:</label>
                                                <input type="text" name="testname" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                                <label>test rate:</label>
                                                <input type="number" name="rate" class="form-control" required>
                                        </div>
                            <div class="form-group">
                                <label>time taken</label>
                                <textarea cols="30" rows="4" class="form-control" name="time"></textarea>
                            </div>
                            <div class="form-group">
                                <label>description</label>
                                <textarea cols="30" rows="4" class="form-control" name="description"></textarea>
                            </div>
                                                                  
                                                                                                                                                                                                                                                                  
                                <div class="text-center">
                                    <button type="submit" name="sub" class="btn btn-primary">Submit</button>
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
</body>


<!-- form-vertical23:59-->
</html>
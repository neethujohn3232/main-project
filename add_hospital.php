<?php
include'connection.php';
session_start();

if(isset($_POST['sub']))
{
    $h_name=$_POST['hospital'];
    $contact_num=$_POST['contact'];
    $addr=$_POST['address'];
    $user=$_POST['username'];
    $pass=$_POST['pass_word'];

 mysqli_query($conn,"INSERT INTO login_tb(username,password,role) VALUES('$user','$pass','1') ");
      $last_login_id=mysqli_insert_id($conn);

   mysqli_query($conn,"INSERT INTO hospital_tb(login_id,hospital_name,address,contact_no)VALUES('$last_login_id','$h_name','$addr','$contact_num')");

           echo "<script> alert('Registration completed'); </script>";

           
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
    <title>ADD HOSPITAL</title>
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
                        <h4 class="page-title">ADD HOSPITAL</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                             <div class="col-md-12">
                             <h4 class="card-title">Form</h4>

                                   
                            <div class="form-group">
                            <label>Hospital Name:</label>
                            <input type="text" name="hospital" class="form-control" required>
                            </div>

                            <div class="form-group">
                            <label>Address</label>
                            <textarea placeholder="Enter Address" name="address" class="form-control" required></textarea> 
                            </div>

                                        

                            <div class="form-group">
                            <label>Contact:</label>
                            <input type="text" maxlength="10"  name="contact" class="form-control" required>
                            </div>

                                       
                            <div class="form-group">
                            <label>username:</label>
                            <input type="text" name="username" class="form-control" required>
                            </div>

                                      

                           <div class="form-group">
                            <label>Password:</label>
                            <input type="text" name="pass_word" class="form-control" required>
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
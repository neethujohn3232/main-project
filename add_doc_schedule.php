<?php
include 'connection.php';
session_start();
$log=$_SESSION['login_id'];
$hosp=mysqli_query($conn,"SELECT * from hospital_tb WHERE login_id='$log'");

$h=mysqli_fetch_assoc($hosp);

$hos=$h['hospital_id'];


if(isset($_POST['sub']))
{
    $doc_name=$_POST['doctorname'];
    
    $doc_avldays=$_POST['avl_days'];
   
    $doc_s_time=$_POST['start_time'];
    $doc_e_time=$_POST['end_time'];
    

   mysqli_query($conn,"INSERT INTO doc_schedule_tb(`doctor_id`, `hospital_id`, `start_time`, `end_time`) VALUES('$doc_name','$hos','$doc_s_time','$doc_e_time')");

           echo "<script> alert('doctor added'); </script>";

           
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
    <title>ADD DOCTOR</title>
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
                        <h4 class="page-title">ADD DOCTOR SCHEDULE</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title"></h4>

                                       
                                        <div class="form-group">
                                        <label>Doctor Name:</label>
                                   <select id="doc_name" name="doctorname" class="form-control">
                                   <option value=""></option>
                               <?php
                               include'connection.php';
                               session_start();
                               $login=$_SESSION['login_id'];
                                    $hosp= mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
                                    $row1=mysqli_fetch_assoc($hosp);
                                    $hos=$row1['hospital_id'];
                               $query="SELECT * FROM `doctor_tb`WHERE hospital_id='$hos' ORDER BY `doc_name`";
                               $result= mysqli_query($conn,$query) or die(mysqli_query($conn));
                               while ($obj=mysqli_fetch_object($result))
                               {
                                  echo "<option value=\"$obj->doctor_id\">$obj->doc_name</option>";

                               }
                               ?>
                               </select>
                        </div>

                        

                                        <div class="form-group">
                                                <label>starting time:</label>
                                                <input type="text" name="start_time" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                                <label>End time:</label>
                                                <input type="text" name="end_time" class="form-control" required>
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
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
    
    $doc_qualification=$_POST['qualification'];
   
    $doc_place=$_POST['place'];
    $dept=$_POST['deptname'];
//echo "INSERT INTO doctor_tb(hospital_id,department_id,doc_name,qualification,place) VALUES('$hos','$dept','$doc_name','$doc_qualification','$doc_place')";
   mysqli_query($conn,"INSERT INTO doctor_tb(hospital_id,department_id,doc_name,qualification,place) VALUES('$hos','$dept','$doc_name','$doc_qualification','$doc_place')");

         ///  echo "<script> alert('doctor added'); </script>";

           
         //  echo "<script> window.location.href='index.php';</script>";  
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
                        <h4 class="page-title">ADD DOCTOR</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title"></h4>

                                       
                                        <div class="form-group">
                                                <label>Doctor Name:</label>
                                                <input type="text" name="doctorname" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                <label>qualification</label>
                                <textarea cols="30" rows="4" class="form-control" name="qualification"></textarea>
                            </div>
                            <div class="form-group">
                                <label>place</label>
                                <textarea cols="30" rows="4" class="form-control" name="place"></textarea>
                            </div>
                            <div class="form-group">
                                        <label>department Name:</label>
                                   <select id="dept_name" name="deptname">
                                   <option value=""></option>
                               <?php
                               include'connection.php';
                               session_start();
                               $login=$_SESSION['login_id'];
                                $hosp= mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
                                $row1=mysqli_fetch_assoc($hosp);
                                $hos=$row1['hospital_id'];
                               $query="SELECT * FROM `department_tb` WHERE hospital_id='$hos' ORDER BY `department_name`";
                               $result= mysqli_query($conn,$query) or die(mysqli_query($conn));
                               while ($obj=mysqli_fetch_object($result))
                               {
                                  echo "<option value=\"$obj->department_id\">$obj->department_name</option>";

                               }
                               ?>
                               </select>
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
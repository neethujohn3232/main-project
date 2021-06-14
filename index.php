<?php 
include 'connection.php';
session_start();

if($_SESSION['role']=='1'){
 $login=$_SESSION['login_id'];
 $query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
 $row_data=mysqli_fetch_assoc($query_hospital);
 $hospital_id=$row_data['hospital_id'];
 $query=mysqli_query($conn,"SELECT * FROM doctor_tb WHERE hospital_id='$hospital_id'");
}
?>


<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Hospital E-Tocken</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <?php include 'include/header.php';?>
        <?php include 'include/sidebar.php';?>
        <div class="page-wrapper">
            <div class="content">
                
                
             <?php if($_SESSION['role']!='0'){ ?>
                 
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Doctors</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                                   <?php
                                    
                                     while ($row=mysqli_fetch_assoc($query)) { 
                                       
                                    ?>

                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><?php echo $row['doc_name'];?></span>
                                                <span class="contact-date"><?php echo $row['qualification'];?></span>
                                            </div>
                                        </div>
                                    </li>
                                   
                                   <?php } ?>
                                 
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="view_doctor.php" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div>
    
             <?php  } ?>
            </div>
           
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>


<!-- index22:59-->
</html>
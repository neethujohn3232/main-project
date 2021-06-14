<?php
session_start();
include'connection.php';

$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];

$schedule=$_GET['edit_id'];

$doc=mysqli_query($conn,"SELECT * FROM doctor_schedule_tb JOIN doctor_tb ON doctor_schedule_tb.doctor_id=doctor_tb.doctor_id WHERE doctor_schedule_tb.schedule_id='$schedule' ");
$doc_name=mysqli_fetch_assoc($doc);
$name=$doc_name['doc_name'];

$schedule_query=mysqli_query($conn,"SELECT * FROM doctor_schedule_tb WHERE schedule_id='$schedule'");
$data=mysqli_fetch_assoc($schedule_query);


if(isset($_POST['sub']))
{
    @$d_name=$_POST['doc_name'];
    @$start_time=$_POST['start'];
    @$end_time=$_POST['endtime'];
    @$status=$_POST['status'];
   

  //echo "UPDATE doctor_schedule_tb SET available_days='$days',start_time='$start_time',end_time='$end_time',status='$status' WHERE schedule_id='$schedule'";

    mysqli_query($conn,"UPDATE doctor_schedule_tb SET start_time='$start_time',end_time='$end_time',status='$status' WHERE schedule_id='$schedule'");

    echo "<script> alert('Doctor Schedule Updated'); </script>";

           
           echo "<script> window.location.href='schedule.php';</script>";  
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- edit-schedule24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
 <?php include'include/header.php';?> 
         <?php include'include/sidebar.php';?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Schedule</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <select class="select"  name="doc_name" disabled>
                                            <option><?php echo $name;?></option>
                                            <?php 
                                            $query_doc=mysqli_query($conn,"SELECT * FROM doctor_tb WHERE hospital_id='$hospital_id'");
                                            while ($row=mysqli_fetch_assoc($query_doc)) {
                                            ?>                                            
                                            <option disabled><?php echo $row['doc_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <div class="time-icon">
                                            <input type="text" name="start" value="<?php echo $data['start_time'];?>"  class="form-control" id="datetimepicker3" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <div class="time-icon">
                                            <input type="text"  name="endtime" value="<?php echo $data['end_time'];?>" class="form-control" id="datetimepicker4" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="form-group">
                                <label class="display-block">Schedule Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="active" 
                                     <?php if( $data['status']=='active')
                                    { ?>
                                        checked
                                 <?php   }  ?>>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="inactive"
                                    <?php if( $data['status']=='inactive'){ ?>
                                        checked
                                 <?php   }  ?>>
                                    <label class="form-check-label" for="product_inactive" >
                                    Inactive
                                    </label>
                                </div>

                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="sub" type="submit">Update Schedule</button>
                            </div>
                        </form>
                    </div>
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
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
	    <script src="assets/js/app.js"></script>
		<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
	 <script>
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
</body>


<!-- edit-schedule24:07-->
</html>

<?php
include'connection.php';
session_start();
$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];

if(isset($_POST['sub']))
{
    $d_name=$_POST['doc_name'];
    $start_time=$_POST['start'];
    $end_time=$_POST['endtime'];
    $status=$_POST['status'];
    

   

    mysqli_query($conn,"INSERT INTO doctor_schedule_tb(doctor_id,hospital_id,start_time,end_time,status) VALUES ('$d_name','$hospital_id','$start_time','$end_time','$status')");


   

           echo "<script> alert('Doctor Schedule Added'); </script>";

           
           echo "<script> window.location.href='schedule.php';</script>";  
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- add-schedule24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Add Doctor Schedule</title>
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
                        <h4 class="page-title">Add Schedule</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<label>Doctor Name</label>
										<select class="select"  name="doc_name">
											<option>Select Doctor</option>
                                            <?php 
                                            $query_doc=mysqli_query($conn,"SELECT * FROM doctor_tb WHERE hospital_id='$hospital_id'");
                                            while ($row=mysqli_fetch_assoc($query_doc)) {
                                            ?>                                            
											<option value="<?php echo $row['doctor_id'];?>"><?php echo $row['doc_name'];?></option>
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
                                            <input type="text" name="start"  class="form-control" id="datetimepicker3" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <div class="time-icon">
                                            <input type="text"  name="endtime"  class="form-control" id="datetimepicker4" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="form-group">
                                <label class="display-block">Schedule Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="product_active" value="active" checked>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="product_inactive" value="inactive">
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>

                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="sub" type="submit">Create Schedule</button>
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
	<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
				$('#datetimepicker4').datetimepicker({
                    format: 'LT'
                });
            });
     </script>
     <!-- <script>
        function validate()
        {
            var name=document.getElementById("name_id").value;
            
             var stym=document.getElementById("start_id").value;
             var endtym=document.getElementById("end_id").value;

            if(name=="")
            {
                document.getElementById('spname').innerHTML="* empty field";
                return false;
            }
          



              if(stym=="")
            {
                document.getElementById('spstime').innerHTML="* empty field";
                return false;
            }
             if(endtym=="")
            {
                document.getElementById('spend').innerHTML="* empty field";
                return false;
            }

        }
        function clrmsg(p)
        {
            document.getElementById(p).innerHTML="";
        }
    </script> -->
</body>


<!-- add-schedule24:07-->
</html>

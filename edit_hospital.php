<?php
include'connection.php';
session_start();

$hospital=$_GET['edit_id'];
$hospital_query=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE hospital_id='$hospital'");
$hospital_data=mysqli_fetch_assoc($hospital_query);


if(isset($_POST['sub']))
{
    @$h_name=$_POST['hospital'];
    @$contact_num=$_POST['contact'];
    @$addr=$_POST['address'];
   

    

   mysqli_query($conn,"UPDATE hospital_tb SET hospital_name='$h_name',address='$addr',contact_no='$contact_num' WHERE hospital_id='$hospital'");

           echo "<script> alert('Details updated!'); </script>";

           
           echo "<script> window.location.href='view_hospital.php';</script>";  
}




?>
<!DOCTYPE html>
<html lang="en">


<!-- form-vertical23:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>EDIT HOSPITAL </title>
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
                        <h4 class="page-title">EDIT HOSPITAL DETAILS</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title">Form</h4>

                                       
                                        <div class="form-group">
                                                <label>Hospital Name:</label>
                                                <input type="text" name="hospital" value="<?php echo $hospital_data['hospital_name'];?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                            <label>Address</label>
                            <textarea placeholder="Enter Address"  name="address" class="form-control" required><?php echo $hospital_data['address'];?></textarea> 
                        </div>

                                        

                                        <div class="form-group">
                                                <label>Contact:</label>
                                                <input type="text" maxlength="10" value="<?php echo $hospital_data['contact_no'];?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="contact" class="form-control" required>
                                        </div>

                                       
                                         

                                                                                                                                                                                                                                                                                                    
                                <div class="text-center">
                                    <button type="submit" name="sub" class="btn btn-primary">Update</button>
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
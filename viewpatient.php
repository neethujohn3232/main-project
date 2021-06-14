<?php
include 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">


<!-- employees23:21-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>VIEW DOCTORS</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
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
       <?php include 'include/header.php'?>
        <?php include 'include/sidebar.php'?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctor Details</h4>
                    </div>
                  
                </div>
              
                <div class="row">
                    <div class="col-md-12">
						<div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Sl-no</th>
                                        <th style="min-width:200px;">Name</th>   
                                        <th>id</th>
                                        <th>token no</th>
                                        <th></th>                                  
                                       <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $login=$_SESSION['login_id'];
                                    $query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
                                    $row_data=mysqli_fetch_assoc($query_hospital);
                                    $hospital_id=$row_data['hospital_id'];

                                     $query=mysqli_query($conn,"SELECT * FROM registration_tb JOIN booking_tb ON registration_tb.reg_id=booking_tb.reg_id WHERE registration_tb.hospital_id='$hospital_id'");
                                     $count=0;
                                     while ($row=mysqli_fetch_array($query)) { 
                                        $count++;
                                    ?>
                                   
                                    <tr>
                                        <td>
											<h2><?php echo $count;?></h2>
										</td>
                                       <td><?php echo $row['name'];?></td>
                                       <td><?php echo $row['reg_id'];?></td>
                                       <td><?php echo $row['booking_id'];?></td>
                                       
                                       


                                        <td class="text-center">
                                            <!-- <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit_patient.php?edit_id=<?php// echo $row['role_id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                     <a class="dropdown-item" href="edit_patient.php?edit_id=<?php// echo $row['role_id'];?>"><i class="fa fa-pencil m-r-5"></i>Covid-Test</a>
                                                  
                                                </div>
                                            </div> -->
                                            <div class="dropdown action-label">
                                                <a class="custom-badge status-purple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    ACTION
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                     <a class="dropdown-item custom-badge status-green" href="edit_doctor.php?edit_id=<?php echo $row['doctor_id'];?>">Edit</a>
                                                    
                                                    <a class="dropdown-item custom-badge status-red" onclick="return confirm('Remove Doctor?')" href="delete_doctor.php?doc_id=<?php echo $row['doctor_id'];?>">Delete</a>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr> 
                                   <?php } ?>                        																											
                                </tbody>
                            </table>
						</div>
                    </div>
                </div>
            </div>

        </div>
		<div id="delete_employee" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Employee?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<a type="submit" href="delete.php?delete_id=<?php echo $row['collector_id'];?>" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- employees23:22-->
</html>
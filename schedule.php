<?php
include'connection.php';
session_start();
$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];

$query_doc=mysqli_query($conn,"SELECT * FROM doctor_schedule_tb JOIN doctor_tb ON doctor_schedule_tb.doctor_id=doctor_tb.doctor_id WHERE doctor_schedule_tb.hospital_id='$hospital_id'");

?>

<!DOCTYPE html>
<html lang="en">


<!-- schedule23:20-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Doctor Schedule</title>
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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedule</h4>
                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20">
                    	 <a href="close_schedule.php" class="btn btn btn-danger btn-rounded float-right"><i class="fa fa-plus"></i> Close Schedule</a>
                        <a href="add_schedule.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                        
                    </div>
                     
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>Doctor Name</th>
										
										
										<th>Available Time</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($row=mysqli_fetch_assoc($query_doc)) { ?>
									
									<tr>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""><?php echo $row['doc_name']; ?></td>
										
										
										<td><?php echo $row['start_time']; ?> - <?php echo $row['end_time']; ?></td>
										<td>
											<?php if( $row['status']=='active')
														{ ?>
															<span class="custom-badge status-green">Active</span>
											<?php } else { ?>
															<span class="custom-badge status-red">Inactive</span>
											<?php } ?>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit_schedule.php?edit_id=<?php echo $row['schedule_id']; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" onclick="return confirm()" href="delete_schedule.php?schedule_id=<?php echo $row['schedule_id']; ?>" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
</body>


<!-- schedule23:21-->
</html>
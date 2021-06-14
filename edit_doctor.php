<?php
include'connection.php';
session_start();
$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];

$doc_id=$_GET['edit_id'];

$query_doc=mysqli_query($conn,"SELECT * FROM doctor_tb WHERE doctor_id='$doc_id'");

$doc_data=mysqli_fetch_assoc($query_doc);

if(isset($_POST['sub']))
{
    @$d_name=$_POST['doc_name'];
    @$quali=$_POST['qualific'];
    @$dep_id=$_POST['department'];
    @$addr=$_POST['address'];

   

    mysqli_query($conn,"UPDATE doctor_tb SET department_id='$dep_id',doc_name='$d_name',qualification='$quali',place='$addr' WHERE doctor_id='$doc_id'");


   

           echo "<script> alert('Details updated'); </script>";

           
           echo "<script> window.location.href='view_doctor.php';</script>";  
}




?>
<!DOCTYPE html>
<html lang="en">


<!-- form-vertical23:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>EDIT DOCTOR</title>
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
                        <h4 class="page-title">EDIT DOCTOR</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title">Form</h4>

                                       
                                        <div class="form-group">
                                                <label>Name:</label><span style="color: white; background-color: red;" id="spname"></span>
                                                <input type="text" id="name_id" value="<?php echo $doc_data['doc_name'];?>" onkeyup="clrmsg('spname')" name="doc_name" class="form-control" >
                                        </div>
                                         <div class="form-group">
                                                <label>Qualification:</label><span style="color: white; background-color: red;" id="spqua"></span>
                                                <input type="text" id="qua_id" value="<?php echo $doc_data['qualification'];?>" onkeyup="clrmsg('spqua')" name="qualific" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Department:</label>
                                            <select class="select" name="department"  required>
                                                 <option value="<?php echo $doc_data['department_id '];?>"><?php echo $doc_data['department_id'];?></option>
                                                <?php 
                                                $query_depart=mysqli_query($conn,"SELECT * FROM department_tb WHERE hospital_id='$hospital_id'");
                                                while($row1=mysqli_fetch_assoc($query_depart))
                                                { ?>
                                               
                                                <option value="<?php echo $row1['department_id']; ?>"><?php echo $row1['department_name']; ?></option>
                                               <?php } ?>
                                            </select>
                                       </div> 

                                        <div class="form-group">
                                            <label>Place</label><span style="color: white; background-color: red;" id="spadd"></span>
                                            <textarea placeholder="Enter Address" id="add_id" onkeyup="clrmsg('spadd')" name="address" class="form-control" ><?php echo $doc_data['place'];?></textarea>
                                        <div class="text-center mt-3" >
                                            <button type="submit" onclick="return validate()" name="sub" class="btn btn-primary">Update</button>
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
     <script>
        function validate()
        {
            var name=document.getElementById("name_id").value;
            var qualification=document.getElementById("qua_id").value;
             var place=document.getElementById("add_id").value;

            if(name=="")
            {
                document.getElementById('spname').innerHTML="* empty field";
                return false;
            }
              if(qualification=="")
            {
                document.getElementById('spqua').innerHTML="* empty field";
                return false;
            }
             if(place=="")
            {
                document.getElementById('spadd').innerHTML="* empty field";
                return false;
            }

        }
        function clrmsg(p)
        {
            document.getElementById(p).innerHTML="";
        }
    </script>
</body>


<!-- form-vertical23:59-->
</html>
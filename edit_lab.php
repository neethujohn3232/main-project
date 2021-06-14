<?php
include'connection.php';
session_start();
$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];

$id=$_GET['edit_id'];
$lab_query=mysqli_query($conn,"SELECT * FROM lab_test WHERE test_id='$id'");
$row_data=mysqli_fetch_assoc($lab_query);


if(isset($_POST['sub']))
{
    $t_name=$_POST['test_name'];
    $t_rate=$_POST['rate'];
    $time=$_POST['timetaken'];
    $desc=$_POST['desc'];

   

    mysqli_query($conn,"UPDATE lab_test SET test_name='$t_name',test_rate='$t_rate',time_taken='$time',description='$desc' WHERE test_id='$id'");


   

           echo "<script> alert('Test Details Updated'); </script>";

           
            echo "<script> window.location.href='view_lab.php';</script>";  
}




?>
<!DOCTYPE html>
<html lang="en">


<!-- form-vertical23:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>EDIT LAB TEST</title>
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
                        <h4 class="page-title">EDIT LAB TEST</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title">Form</h4>

                                       
                                        <div class="form-group">
                                                <label>Test-Name:</label><span style="color: white; background-color: red;" id="spname"></span>
                                                <input type="text" value="<?php echo $row_data['test_name'];?>" id="name_id" onkeyup="clrmsg('spname')" name="test_name" class="form-control" >
                                        </div>
                                         <div class="form-group">
                                                <label>Test-Rate:</label><span style="color: white; background-color: red;" id="sprate"></span>
                                                <input type="text" value="<?php echo $row_data['test_rate'];?>" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" id="rate_id" onkeyup="clrmsg('sprate')" name="rate" class="form-control" >
                                         </div>
                                     

                                         <div class="form-group">
                                            <label>Time-Taken:</label><span style="color: white; background-color: red;" id="sptime"></span>
                                            <select class="select" id="time_id" onchange="clrmsg('sptime')" name="timetaken" required>
                                                 <option value="<?php echo $row_data['time_taken'];?>"><?php echo $row_data['time_taken'];?></option>
                                                
                                                <option value="15-min">15-min</option>
                                                <option value="30-min">30-min</option>
                                                <option value="45-min">45-min</option>
                                                <option value="1hour">1hour</option>
                                                <option value="1hour-15-min">1hour-15-min</option>

                                            
                                            </select>
                                       </div>                                       

                                        <div class="form-group">
                                            <label>Description</label><span style="color: white; background-color: red;" id="spdes"></span>
                                            <textarea placeholder="Enter Description" id="des_id" onkeyup="clrmsg('spdes')" name="desc" class="form-control" ><?php echo $row_data['test_name'];?></textarea>
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
            var rate=document.getElementById("rate_id").value;
             var time=document.getElementById("time_id").value;
             var des=document.getElementById("des_id").value;

            if(name=="")
            {
                document.getElementById('spname').innerHTML="* empty field";
                return false;
            }
              if(rate=="")
            {
                document.getElementById('sprate').innerHTML="* empty field";
                return false;
            }
             if(time=="")
            {
                document.getElementById('sptime').innerHTML="* empty field";
                return false;
            }
            if(des=="")
            {
                document.getElementById('spdes').innerHTML="* empty field";
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
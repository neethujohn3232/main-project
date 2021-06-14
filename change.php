<?php
include'connection.php';
session_start();
require '../src/Fernet.php';
require '../src/Exception.php';
require '../src/InvalidTokenException.php';
require '../src/TypeException.php';
require '../src/FernetMsgpack.php';

use Fernet\Fernet;
use Fernet\InvalidTokenException;
$login=$_SESSION['login_id'];




if(isset($_POST['sub']))
{
   
    $new=$_POST['new'];
    $retyped=$_POST['retype'];
    

    if($new==$retyped)
    {
            $key = Fernet::generateKey();
            $fernet = new Fernet($key); // or new FernetMsgpack($key);

            $token = $fernet->encode($retyped);

            $message = $fernet->decode($token);
           // var_dump($token,$message);exit();

             mysqli_query($conn,"UPDATE login_tb SET password='$token',key_pass='$key' WHERE login_id='$login'");



        echo "<script> alert('Password Changed'); </script>";

           
          // echo "<script> window.location.href='add_doctor.php';</script>";

    }
    else{
         echo "<script> alert('enter same password'); </script>";
         echo "<script>window.history.back();</script>";
    }
   

   
   

             
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
                        <h4 class="page-title">Change Password</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title">change password</h4>

                                       
                                       
                                         <div class="form-group">
                                                <label>New password:</label><span style="color: white; background-color: red;" id="spqua"></span>
                                                <input type="text" id="n_pass" onkeyup="clrmsg('spqua')" name="new" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                                <label>Retype new password:</label><span style="color: white; background-color: red;" id="spqua"></span>
                                                <input type="text" id="r_n_pass" onkeyup="clrmsg('spqua')" name="retype" class="form-control" >
                                        </div>
                                       

                                        <div class="form-group">
                                            
                                        <div class="text-center mt-3" >
                                            <button type="submit" onclick="return validate()" name="sub" class="btn btn-primary">Submit</button>
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

            var new_pass=document.getElementById("n_pass").value;
             var retype=document.getElementById("r_n_pass").value;

            
              if(new_pass=="")
            {
                document.getElementById('spqua').innerHTML="* empty field";
                return false;
            }
             if(retype=="")
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
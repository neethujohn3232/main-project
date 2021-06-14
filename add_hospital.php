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

if(isset($_POST['sub']))
{
    $h_name=$_POST['hospital'];
    $contact_num=$_POST['contact'];
    $email=$_POST['email'];
    $addr=$_POST['address'];
    $user=$_POST['username'];
    $pass=$_POST['pass_word'];

    $key = Fernet::generateKey();
$fernet = new Fernet($key); // or new FernetMsgpack($key);

$token = $fernet->encode($pass);

$message = $fernet->decode($token);
//var_dump( $token,$key,$message); exit();

$check_mail=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE email='$email'");

$check_num=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE contact_no='$contact_num'");

$check_user=mysqli_query($conn,"SELECT * FROM login_tb WHERE username='$user'");

if(mysqli_num_rows($check_num)>0)
{
  echo "<script>alert('Try different contact number!')</script>";
  echo "<script>window.history.back();</script>";

}
elseif (mysqli_num_rows($check_mail)>0) {
  echo "<script>alert('Try different email!')</script>";
  echo "<script>window.history.back();</script>";
}

elseif (mysqli_num_rows($check_user)>0) {
  echo "<script>alert('Try different username!')</script>";
  echo "<script>window.history.back();</script>";
}

else{

    mysqli_query($conn,"INSERT INTO login_tb(username,password,role,key_pass) VALUES('$user','$token','1','$key') ");
      $last_login_id=mysqli_insert_id($conn);

   mysqli_query($conn,"INSERT INTO hospital_tb(login_id,hospital_name,address,contact_no,email)VALUES('$last_login_id','$h_name','$addr','$contact_num','$email')");




       
require 'PHPMailer/PHPMailerAutoload.php';
  $to_address =$email;

  $subject ="Password";
  $msg     =$pass;


  //echo "<script>window.history.back();</script>";
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mailertest28@gmail.com';                   // SMTP username
$mail->Password = 'floodRelief';               // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 465;       
//$mail->SMTPDebug = 2;                             //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('mailertest28@gmail.com','hospital');     //Set who the message is to be sent from

$mail->addAddress($to_address); 
           
//$mail->addCC('example@xyz.com', 'name');
//$mail->addBCC('example@xyz.com', 'name');
$mail->WordWrap = 50;                                  
        
$mail->isHTML(true);                                   
 
$mail->Subject = $subject;
$mail->Body    = "<html>
<head>

<title>HOSPITAL E-TOKEN</title>
</head>

<body>

<table width='300'>
  <tr>
    <th scope='row'>Mail From</th>
    <td>HOSPITAL E-TOKEN </td>
  </tr>
  <tr>
    <th scope='row'>Subject</th>
    <td>$subject</td>
  </tr>
  <tr>
    <th scope='row'>Username</th>
    <td>$user</td>
  </tr>
  <tr>
    <th scope='row'>Password</th>
    <td>$msg</td>
  </tr>
</table>

</body>
</html>
";
  $mail->AltBody = 'msg';
 
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
  if(!$mail->send()) 
  {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
     exit;
  }

  else
  {
    echo "<script>alert('Message has been sent');</script>";

    
  }
 
 echo "<script> alert('Registration completed'); </script>";

           
          // echo "<script> window.location.href='index.php';</script>"; 
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
    <title>ADD HOSPITAL</title>
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
                        <h4 class="page-title">ADD HOSPITAL</h4>
                    </div>
                </div>
          
               
                    <div class="col-md-8">
                        <form method="post">
                            <div class="card-box">
                               
                                    <div class="col-md-12">
                                        <h4 class="card-title">Form</h4>

                                       
                                        <div class="form-group">
                                                <label>Hospital Name:</label>
                                                <input type="text" name="hospital" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                            <label>Address</label>
                            <textarea placeholder="Enter Address" name="address" class="form-control" required></textarea> 
                        </div>

                                        

                                        <div class="form-group">
                                                <label>Contact:</label>
                                                <input type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="contact" class="form-control" required>
                                        </div>
                                         <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email"  name="email" class="form-control" required>
                                        </div>

                                       
                                          <div class="form-group">
                                                <label>username:</label>
                                                <input type="text" name="username" class="form-control" required>
                                        </div>


                                      


                                        <div class="form-group">
                                                <label>Password:</label>
                                                <input type="text" name="pass_word" class="form-control" required>
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
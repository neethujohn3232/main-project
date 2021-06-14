<?php

include 'loginpanel/connection.php';
session_start();

if(!isset($_SESSION['role']))
{
    // echo "<script>alert('you have to login first')</script>";
    echo "<script>window.location.href='../loginpanel/login.php';</script>";
} 

$login=$_SESSION['login_id'];
$req_query=mysqli_query($conn,"SELECT * FROM registration_tb WHERE login_id='$login'");
$reg_data=mysqli_fetch_assoc($req_query);
$reg_id=$reg_data['reg_id'];

if(isset($_GET['sub']))
{
  $doc_name=$_GET['doctor'];
  
  $schedule_query=mysqli_query($conn,"SELECT * FROM doctor_schedule_tb  WHERE doctor_id='$doc_name'");
  $id=mysqli_fetch_assoc($schedule_query);
  $schedule_id=$id['schedule_id'];


  $token=$id['count'];
  $token_no=$token + 1;


   $check_booking=mysqli_query($conn,"SELECT * FROM booking_tb WHERE reg_id='$reg_id' AND schedule_id='$schedule_id' AND status='0'");

   if(mysqli_num_rows($check_booking)>0)
   {
    echo "<script>alert('already booked'); </script>";
    echo "<script>window.history.back();</script>";
   }

else{


   mysqli_query($conn,"INSERT INTO booking_tb(schedule_id,reg_id,token_no) VALUES('$schedule_id','$reg_id','$token_no') ");
      // $last_login_id=mysqli_insert_id($conn);

  mysqli_query($conn,"UPDATE doctor_schedule_tb SET count=count + 1 WHERE doctor_id='$doc_name'");
   echo "<script> alert('Registration completed Token no is $token_no'); </script>";           
   echo "<script>window.location.href='payment1.php';</script>";

}

}
$rate=80;
if(isset($_POST['submit1']))
{
  

  $exdate=$_POST['expirymonth'];
  $cvcode=$_POST['cvcode'];
  $cardnum=$_POST['cardnumber'];
  $year=$_POST['expityyear'];
  $rate=80;
  

  

   mysqli_query($conn,"INSERT INTO transaction_tb(reg_id,card_num,month,exp_year,amount,cvcode) VALUES
   ('$reg_id','$cardnum','$exdate','$year','$rate','$cvcode') ");
  
   
 
     
 
  echo "<script>window.location.href='success.php';</script>";         
     
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hospital E-Token</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    #btnb{ background: #3fbbc0;
  border: 0;
  padding: 10px 35px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;
}
  </style>

  <!-- =======================================================
  * Template Name: Medicio - v2.1.1
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-clock-time"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="icofont-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->


  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <!--  <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <h1 class="logo mr-auto"><a href="index.php">E-TOKEN</a></h1> 

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
        <!--   <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#departments">Departments</a></li>
          <li><a href="#doctors">Doctors</a></li> -->
          <!-- <li class="drop-down"><a href="">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
        <!--   <li><a href="#contact">Contact</a></li> -->

        </ul>
      
      

   

    </div>
  </header>




  


  
  
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
         <div class="container">
            









<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<br>

     
    <div class="row" style="align-content: center;"><br><br><br>


        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" >
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                    
                </div>
                <div class="panel-body">
                    <form method="post" >
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardnumber" name="cardnumber" maxlength="16" onkeyup="clearmsg('sp1')" placeholder="Valid Card Number" />
                            <span id="sp1" style="color: red;"></span>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth" >
                                    EXPIRY DATE</label><span id="sp2" style="color: red;"></span>
                                <div class="col-xs-6 col-lg-6 pl-ziro">

        

                                  <select type="text" class="form-control" name="expirymonth" id="expirymonth" placeholder="MM" onchange="clearmsg('sp2')" required >
                                    <option value=""></option>
                                   <option value="January">January</option>
                                   <option value="February">February</option>
                                   <option value="March">March</option>
                                   <option value="April">April</option>
                                   <option value="May">May</option>
                                   <option value="June">June</option>
                                   <option value="July">July</option>
                                   <option value="August">August</option>
                                   <option value="September">September</option>
                                   <option value="October">October</option>
                                   <option value="November">November</option>
                                   <option value="December">December</option>
                                  
                                </div>
                            
                            
                            <div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">

                                    <input type="year" class="form-control" name="expityyear" id="expityyear" placeholder="YYYY" onchange="clearmsg('sp3')" /><span id="sp3" style="color: red;"></span></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode"> CODE</label>
                            </div>
                                <input type="password" class="form-control" id="cvcode" name="cvcode" placeholder="CV" maxlength="3" onchange="clearmsg('sp4')"    required/><span id="sp4" style="color: red; "></span>
                        </div>
                    </div>
                   
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>   <?php echo $rate ?> </span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <input type="submit" value="pay" name="submit1" id="submit" onclick="return valid();" class="btn btn-success btn-block">
        </div>
         </form>

    </div>
</div>
</div>
</div>























           
  <!-- ======= Footer ======= -->
  <footer id="footer">
   
    

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Medicio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
    <script type="text/javascript">
      function valid()
      {
        var no=document.getElementById('cardnumber').value;
        var mo=document.getElementById('expirymonth').value;    
         var y=document.getElementById('expityyear').value; 
          var cv=document.getElementById('cvcode').value;   

        if (no=="") 
        {
          document.getElementById("sp1").innerHTML="Enter a valid card number !";

          return false;
        }
        
        if(no.length != 16) 
        {
             document.getElementById("sp1").innerHTML="Card number must have 16 digit !";
    
             return false;

        }

    

    if (mo=="") 
    {
      document.getElementById("sp2").innerHTML="Select a valid month !";

          return false;  
    }

    if (y=="") 
    {
      document.getElementById("sp3").innerHTML="Enter a valid year !";

          return false;  
    }


    if (cv=="") 
    {
      document.getElementById("sp4").innerHTML="Enter a valid code !";

          return false;  
    }
}

    


      function clearmsg(sp)
{
  document.getElementById(sp).innerHTML="";
}





    </script>























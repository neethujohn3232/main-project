<?php
include 'loginpanel/connection.php';
session_start();

if(!isset($_SESSION['role']))
{
    // echo "<script>alert('you have to login first')</script>";
    echo "<script>window.location.href='loginpanel/login.php';</script>";
} 
$hospital_id=$_GET['hospital_id'];
$login=$_SESSION['login_id'];
$req_query=mysqli_query($conn,"SELECT * FROM registration_tb WHERE login_id='$login'");
$reg_data=mysqli_fetch_assoc($req_query);
$reg_id=$reg_data['reg_id'];
$hospital_query=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE hospital_id='$hospital_id'");
$hospital_data=mysqli_fetch_assoc($hospital_query);


if(isset($_POST['sub']))
{
  $doc_name=$_POST['doctor'];
  $schedule_query=mysqli_query($conn,"SELECT * FROM doctor_schedule_tb  WHERE doctor_id='$doc_name'");
  $id=mysqli_fetch_assoc($schedule_query);
  $schedule_id=$id['schedule_id'];


  $token=$id['count'];
  $token_no=$token + 1;


   $check_booking=mysqli_query($conn,"SELECT * FROM booking_tb WHERE reg_id='$reg_id' AND schedule_id='$schedule_id' AND status='0'");

   if(mysqli_num_rows($check_booking)>0)
   {
    echo "<script>alert('already booked'); </script>";

   }

else{


   mysqli_query($conn,"INSERT INTO booking_tb(schedule_id,reg_id,token_no) VALUES('$schedule_id','$reg_id','$token_no') ");
      // $last_login_id=mysqli_insert_id($conn);

  mysqli_query($conn,"UPDATE doctor_schedule_tb SET count=count + 1 WHERE doctor_id='$doc_name'");
  echo "<script> alert('Registration completed Token no is $token_no'); </script>";           
    
}

}

if(isset($_POST['book_lab']))
{
  $test=$_POST['test_name'];
  $date=$_POST['book_date'];
  $time=$_POST['book_time'];
  $today=date('Y-m-d');



  if ($date<$today) {
  echo "<script>alert('Check DOB!')</script>";

  echo "<script>window.history.back();</script>";
}
else{



    mysqli_query($conn,"INSERT INTO lab_booking_tb(reg_id,test_id,hospital_id,test_date,test_time) VALUES('$reg_id','$test','$hospital_id','$date','$time') ");
     
      echo "<script>alert('SUCCESS '); </script>";

    }    
    

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
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">  
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
#token{
      color: #444444;
    text-align: center;
    box-shadow: 0 0 20px rgb(214 215 216 / 50%);
    padding: 20px 0 30px 0;
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
        <i class="icofont-phone"></i> Call us now +91 9061832320
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  







<?php include 'include/user_header.php';?>










  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>Welcome to <span><?php echo $hospital_data['hospital_name'];?></span></h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>Welcome to <span><?php echo $hospital_data['hospital_name'];?></span></h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
         <div class="container">
            <h2>Welcome to <span><?php echo $hospital_data['hospital_name'];?></span></h2>
            <p>A hospital is a residential establishment which provides short-term and long-term medical care consisting of observational, diagnostic, therapeutic and rehabilitative services for persons suffering or suspected to be suffering from a disease or injury and for parturients.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="icofont-doctor"></i></div>
              <h4 class="title"><a href="#doctors" class="scrollto">Doctors</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="icofont-test-bulb"></i></div>
              <h4 class="title"><a href="#Laboratory" class="scrollto">Laboratory</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="icofont-blood"></i></div>
              <h4 class="title"><a href="#blood" class="scrollto">Blood Bank</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->
     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form  method="GET"  data-aos="fade-up" data-aos-delay="100" action="payment1.php">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <select name="department" onclick="clrmsg('spdep')" onchange="get_doc(this.value)" id="blood_id" class="form-control" >
                <option value="" >Select Department</option>
                <?php 
                 $dep_query=mysqli_query($conn,"SELECT * FROM department_tb WHERE Hospital_id='$hospital_id'");
                while ($row=mysqli_fetch_assoc($dep_query)) { 
               ?>
                
                
                <option value="<?php echo $row['department_id'];?>"><?php echo $row['department_name'];?></option>
                <?php } ?>
              </select>
              <span id="spdep" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            <div class="col-md-4 form-group">
              <span id="doctors_name">
              <select name="doctor" onclick="clrmsg('spdoc')" onchange="get_time(this.value)" id="doc_id" class="form-control" >
               
              </select></span>
              <span id="spdoc" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            <div class="col-md-4 form-group">
              <span id="time">
             
              </span>
              <span id="spphone" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
          </div>
         
         <div class="text-center"><input type="submit" onclick="return valid()"  id="submit" name="sub"></div>
        </form>
        <div class="row mt-5">
        <?php 
        $token_query=mysqli_query($conn,"SELECT * FROM booking_tb JOIN 
        doctor_schedule_tb ON booking_tb.schedule_id=doctor_schedule_tb.schedule_id JOIN 
        doctor_tb ON doctor_schedule_tb.doctor_id=doctor_tb.doctor_id WHERE booking_tb.reg_id='$reg_id' 
        AND booking_tb.status='0' AND doctor_schedule_tb.hospital_id='$hospital_id'");

        if(mysqli_num_rows($token_query)>0){

            while ( $token_row_data=mysqli_fetch_assoc($token_query)) {
            
            
        
        $t_no=$token_row_data['token_no'];
        $d=$token_row_data['doc_name'];
        $t=$token_row_data['start_time'];
        $t_e=$token_row_data['end_time'];
        $time=$token_row_data['time'];
        ?>
         
              <div class="col-md-4">
                <div class="info-box" id="token">
                 
                  <i class="icofont-ticket"></i><h3><b>TOKEN NO: <?php echo $t_no ?></b></h3>
                  <h4><b>DOCTOR NAME: <?php echo $d ?></b></h4>
                  <p>Time :<?php echo $t ."  to  ". $t_e ?></p>
                  <p>Time-Slot :<?php echo  $time ?></p>
                  <button ><a href="printt.php?edit_id=<?php echo$token_row_data['token_no'];?>">PRINT</a>
                                                    
                </div>
              </div>
            
            <?php }?>
             <?php }?>
               </div>


      </div>

    </section><!-- End Appointment Section -->

    <!-- ======= Cta Section ======= -->
    <section id="blood" class="cta">
      <div class="container" data-aos="zoom-in">
       
        <div class="text-center">
          <h3>Donate Blood</h3>
          <p>Do you feel you don’t have much to offer? You have the most precious resource of all: the ability to save a life by donating blood! Help share this invaluable gift with someone in need.</p>
        
          <a class="cta-btn " href= "donate_blood.php?hospital_id=<?php echo $hospital_id; ?>">Ready To Donate?</a>
          
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>A hospital is a residential establishment which provides short-term and long-term medical care consisting of observational, diagnostic, therapeutic and rehabilitative services for persons suffering or suspected to be suffering from a disease or injury and for parturients.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="font-italic">
            
            The experience a patient has while they visit the hospital should be hassle-free and also personalised care should be provided so there is individual attention given to each patient that visit the hospital. Also, the type of treatment provided should be of a specialized nature
            
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> uality healthcare Services backed by highly qualified doctors and specialists, medical professionals, nurses, and dedicated to providing round the clock service also plays a very important role.</li>
              <li><i class="icofont-check-circled"></i> As it is rightly said health is wealth. Yes, undoubtedly our health is the most important thing we need to consider in our lives. And it is also our sole responsibility to take care of our health. </li>
              
            </ul>
            
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->





    <!-- ======= Services Section ======= -->
   <!--  <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="icofont-heart-beat"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="icofont-drug"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="icofont-dna-alt-2"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="icofont-heartbeat"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="icofont-disabled"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="icofont-autism"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>

      </div>
    </section> --><!-- End Services Section -->

   

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Departments</h2>
          
        </div>
       

        <div class="row" >
           <?php 
          $query_dep=mysqli_query($conn,"SELECT * FROM department_tb WHERE hospital_id='$hospital_id'");
          while ($row_data=mysqli_fetch_assoc($query_dep)) { ?>
          <div class="col-lg-3 mb-5 mb-lg-0">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link ">
                  <h4><?php echo $row_data['department_name'];?></h4>                  
                </a>
              </li>                    
            </ul>
          </div>         
         <?php } ?>
          
        </div>

      </div>
    </section><!-- End Departments Section -->

    


  

   

    
    <!-- ======= Contact Section ======= -->
    <section id="doctors" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>DOCTORS</h2>
        
        </div>

      </div>

     

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12">

            <div class="row">
             <?php 
             $doc=mysqli_query($conn,"SELECT * FROM doctor_tb JOIN department_tb ON doctor_tb.department_id=department_tb.department_id ");
             while ($row=mysqli_fetch_assoc($doc)) {
              ?>
              <div class="col-md-3">
                <div class="info-box mt-4">
                  <i class="icofont-doctor-alt"></i>
                  <h3><?php echo $row['doc_name'];?></h3>
                  <p><?php echo $row['qualification'];?><br><b><?php echo $row['department_name'];?></b></p>
                </div>
              </div>


              <?php } ?>
            

          </div>

          

        </div>

      </div>
    </div>
    </section><!-- End Contact Section -->






  






    <section id="Laboratory" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>LABORATORY</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

      </div>

     

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12">

            <div class="row">

               <?php $lab_query=mysqli_query($conn,"SELECT * FROM lab_test WHERE hospital_id='$hospital_id'");
               while ($lab_data=mysqli_fetch_assoc($lab_query)) { ?>
               <div class="col-md-6 mb-2">
                 <div class="info-box pl-2 pr-2">
                  <i class="icofont-test-bulb"></i>
                  <h3><?php echo $lab_data['test_name'];?></h3>
                  <p> Rate: <?php echo $lab_data['test_rate'];?></p>
                   <p> Time: <?php echo $lab_data['time_taken'];?></p>
                   <p><?php echo $lab_data['description'];?></p>
                   <div class="text-center mt-5"><a class="scrollto"  href="#book-lab" id="btnb" name="sub">Book Now</a></div>
                  </div>
                   </div>
               <?php } ?>
              

          </div>

          

        </div>

      </div>
    </section>


         <!-- ======= Appointment Section ======= -->
    <section id="book-lab" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>LAB TEST BOOKING</h2>
          <p>A medical laboratory or clinical laboratory is a laboratory where tests are carried out on clinical specimens to obtain information about the health of a patient to aid in diagnosis, treatment, and prevention of disease.</p>
        </div>

        <form  method="post"  data-aos="fade-up" data-aos-delay="100" action="payment.php">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <select name="test_name"   class="form-control" required>
                <option value="" >Select Lab Test</option>
                <?php 
                 $dep_query=mysqli_query($conn,"SELECT * FROM lab_test WHERE Hospital_id='$hospital_id'");
                while ($row=mysqli_fetch_assoc($dep_query)) { 
               ?>
                
                
                <option value="<?php echo $row['test_id'];?>"><?php echo $row['test_name'];?></option>
                <?php } ?>
               </select>
              
          
            </div>
            
            <div class="col-md-4 form-group" id= "datepicker">
                <input type="date"  name="date" class="form-control" id="txtDate" required>
            </div>
            <div class="col-md-4 form-group">
              <input type="time" name="book_time" class="form-control" required >
              
          </div>
          </div>
         
         <div class="text-center"><input type="submit"    id="btnb" name="book_lab"></div>
        </form>
        

      </div>
    </section><!-- End Appointment Section -->

  </main><!-- End #main -->
 

  <!-- ======= Footer ======= -->
  <footer id="footer">
    

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Medicio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- ; All the links in the footer should remain intact. -->
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
  
   <script>
        function valid()
        {
            var dep=document.getElementById("blood_id").value;
            var doc=document.getElementById("doc_id").value;
           
            

            if(dep=="")
            {
                document.getElementById('spdep').innerHTML=" empty field";
                return false;
            }
            if(doc=="")
            {
                document.getElementById('spdoc').innerHTML=" empty field";
                return false;
            }
                      

        }
        function clrmsg(p)
        {
            document.getElementById(p).innerHTML="";
        }
       
    </script>
<script type="text/javascript">
     
    function get_doc(id)
    {
        jQuery.ajax({
        type:"POST",
        url:"doctor_ajax.php",
        datatype:'html',
        data:{dep_id: id},
       success:function(data)
        {
                 jQuery("#doctors_name").html(data);
        },
        error:function(data)
        {
            jQuery("#doctors_name").html("failed");
        }    
    });    
    };
</script>


</script>
<script type="text/javascript">
    function get_time(id)
    {
        jQuery.ajax({
        type:"POST",
        url:"time_ajax.php",
        datatype:'html',
        data:{doc_id: id},
       success:function(data)
        {
                 jQuery("#time").html(data);
        },
        error:function(data)
        {
            jQuery("#time").html("failed");
        }    
    });    
    };
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
      $(function(){
          var dtToday = new Date();
          
          var month = dtToday.getMonth() + 1;
          var day = dtToday.getDate();
          var year = dtToday.getFullYear();
          if(month < 10)
              month = '0' + month.toString();
          if(day < 10)
              day = '0' + day.toString();
          
          var minDate= year + '-' + month + '-' + day;
          
          $('#txtDate').attr('min', minDate);
      });
    </script>  

</body>

</html>
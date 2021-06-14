<?php 
include 'loginpanel/connection.php';
session_start();
// $user=$_SESSION['login_id'];
// var_dump($user);exit();
require 'src/Fernet.php';
require 'src/Exception.php';
require 'src/InvalidTokenException.php';
require 'src/TypeException.php';
require 'src/FernetMsgpack.php';

use Fernet\Fernet;
use Fernet\InvalidTokenException;

if(isset($_POST['sub']))
{
  $u_name=$_POST['name'];
  $email_id=$_POST['email'];
  $num=$_POST['phone'];
  $date=$_POST['dob'];
  $b_grp=$_POST['blood'];
  $gen=$_POST['gender'];
  $ad=$_POST['address'];
  $user=$_POST['username'];
  $pswrd=$_POST['pass'];

$key = Fernet::generateKey();
$fernet = new Fernet($key); // or new FernetMsgpack($key);

$token = $fernet->encode($pswrd);
//var_dump( $token,$key); exit();
$message = $fernet->decode($token);
//var_dump($message);exit();
$today=date('Y-m-d');
//var_dump($date,$today);exit();

$check_mail=mysqli_query($conn,"SELECT * FROM registration_tb WHERE email='$email_id'");
$check_num=mysqli_query($conn,"SELECT * FROM registration_tb WHERE phone='$num'");
$check_user=mysqli_query($conn,"SELECT * FROM login_tb WHERE username='$user'");

if(mysqli_num_rows($check_mail)>0)
{
  echo "<script>alert('Try different email!')</script>";
  echo "<script>window.history.back();</script>";

}
elseif (mysqli_num_rows($check_num)>0) {
  echo "<script>alert('Try different number!')</script>";
  echo "<script>window.history.back();</script>";
}
elseif (mysqli_num_rows($check_user)>0) {
  echo "<script>alert('Try different username!')</script>";
  echo "<script>window.history.back();</script>";
}
elseif ($date>$today) {
  echo "<script>alert('Check DOB!')</script>";
  echo "<script>window.history.back();</script>";
}
else{




   mysqli_query($conn,"INSERT INTO login_tb(username,password,role,key_pass) VALUES('$user','$token','2','$key') ");
      $last_login_id=mysqli_insert_id($conn);

  mysqli_query($conn,"INSERT INTO registration_tb(login_id,name,email,phone,dbo,blood_group,gender,address) VALUES ('$last_login_id','$u_name','$email_id','$num','$date','$b_grp','$gen','$ad')");
  
  $_SESSION['success_message'] = "registerd  successfully.";
  header("Location: loginpanel/login.php");
  exit();

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
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  
  <link rel="stylesheet" href="assets/css/style.css">
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

 
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-clock-time"></i> Monday - Saturday, 8AM to 11PM
      </div>
      <div class="d-flex align-items-center">
        <i class="icofont-phone"></i> Call us now +91 9061832320
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
<?php include 'include/header.php';?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
         <div class="container">
            <h2>Hospital-E-tocken management </h2>
            <p>A hospital is a residential establishment which provides short-term and long-term medical care consisting of observational, diagnostic, therapeutic and rehabilitative services for persons suffering or suspected to be suffering from a disease or injury and for parturients.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>Hospital-E-tocken management</h2>
            <p>A hospital is a residential establishment which provides short-term and long-term medical care consisting of observational, diagnostic, therapeutic and rehabilitative services for persons suffering or suspected to be suffering from a disease or injury and for parturients.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
         <div class="container">
            <h2>Hospital-E-tocken management</h2>
            <p>The hospital is an integral part of a social and medical organization, the function of which is to provide for the population complete healthcare, both curative and preventive, and whose out- patient services reach out to the family in its home environment; the hospital is also a centre for the training of health workers and for bio- social research’.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
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
        <?php 
          $query1="SELECT * FROM hospital_tb";
          if(isset($_POST['search']))
          {
            $value=$_POST['search1'];
            $query1="SELECT * FROM  hospital_tb  WHERE address like '%$value%' OR  hospital_name like '%$value%'";
          }
          $query_hospitals=mysqli_query($conn,$query1);
          while ($row=mysqli_fetch_assoc($query_hospitals)) { ?>
                  

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="icofont-hospital"></i></div>
              <h4 class="title"><a href="user-index.php?hospital_id=<?php echo $row['hospital_id'];?>"><?php echo $row['hospital_name'];?></a></h4>
              <p class="description"><?php echo $row['address'];?></p>
            </div>
          </div>

        <?php } ?>

        
            
         

        </div>

</div>
</section><!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>In an emergency? Need help now?</h3>
          <p> We will help you get a same day appointment based on the emergency of your condition. If you call +91 8129990212 before noon, we  will try to provide an appointment on the same day. If you call after noon, we will ensure your appointment for the next day, or schedule an appointment the same evening depending upon the availability of the doctors at the hospitals.</p>
          
        </div>

      </div>
    </section><!-- End Cta Section -->


<?php if(!isset($_SESSION['role']))

{ ?>

    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Registration Form</h2>
          <p></p>
        </div>
       
        <form  method="post"   data-aos="fade-up" data-aos-delay="100">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" onkeyup="clrmsg('spname')" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <span id="spname" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            <div class="col-md-4 form-group">
              <input type="email" class="form-control" onclick="clrmsg('spemail')" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <span id="spemail" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            <div class="col-md-4 form-group">
              <input type="tel" class="form-control" onclick="clrmsg('spphone')" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <span id="spphone" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="date" onclick="clrmsg('spdob')" name="dob" class="form-control datepicker" id="date" placeholder="Date Of Birth" required>
              <span id="spdob" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            <div class="col-md-4 form-group">
              <select name="blood" onchange="clrmsg('spblood')" id="blood_id" class="form-control" >
                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
              <span id="spblood" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            <div class="col-md-4 form-group">
              <label>GENDER:&nbsp;&nbsp;</label>
             Male <input type="radio" name="gender" onclick="clrmsg('sgen')" value="male" >Female<input type="radio" onclick="clrmsg('sgen')" value="female" name="gender" >
              <span id="sgen" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;" ></span>
            </div>
          </div>

          <div class="form-group">
            <textarea class="form-control" onclick="clrmsg('spadd')" name="address" id="address" rows="5" placeholder="Address (Optional)" ></textarea>
            <span id="spadd" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="username"  onclick="clrmsg('spuser')" class="form-control" id="uname" placeholder=" Enter userame" >
              <span id="spuser" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            <div class="col-md-6 form-group">
              <input type="password" onclick="clrmsg('sppass')" class="form-control" name="pass" id="passwrd" placeholder="Your password" >
             <span id="sppass" style="color: red; margin: 0 0 15px 0;  font-weight: 400;  font-size: 13px;"></span>
            </div>
            
          </div>
          
          <div class="text-center"><input type="submit" onclick="return valid()" id="btnb" name="sub"></div>
        </form>
         

  </div>
    </section><?php
}?>
  
  <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->




  

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
   
    

    <div class="container">
      <div class="copyright">
        &copy;  <strong><span>HOSPITAL E-TOKEN</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="https://bootstrapmade.com/">HOSPITALS</a>
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
            var namee=document.getElementById("name").value;
            var email=document.getElementById("email").value;
            var phone=document.getElementById("phone").value;
            var date=document.getElementById("date").value;
            var blood=document.getElementById("blood_id").value;
            var ugen=document.getElementsByName("gender");
             var add=document.getElementById("address").value;
              var uname=document.getElementById("uname").value;
               var pass=document.getElementById("passwrd").value;
            

            if(namee=="")
            {
                document.getElementById('spname').innerHTML=" empty field";
                return false;
            }
            if(email=="")
            {
                document.getElementById('spemail').innerHTML=" empty field";
                return false;
            }
             if(phone=="")
            {
                document.getElementById('spphone').innerHTML=" empty field";
                return false;
            }
            if(date=="")
            {
                document.getElementById('spdob').innerHTML=" empty field";
                return false;
            }
             if(blood=="")
            {
                document.getElementById('spblood').innerHTML=" empty field";
                return false;
            }
            flag=0;
              for(i=0;i<ugen.length;i++)
               {
                if (ugen[i].checked==true)
                {
                  flag=1;
                  break;
                }
               }
                if (flag==0)
                {
             
                document.getElementById("sgen").innerHTML="select a gender";
                return false;
              } 
               if(add=="")
            {
                document.getElementById('spadd').innerHTML=" empty field";
                return false;
            }
            if(uname=="")
            {
                document.getElementById('spuser').innerHTML=" empty field";
                return false;
            }
            if(pass=="")
            {
                document.getElementById('sppass').innerHTML=" empty field";
                return false;
            }
           

        }
        function clrmsg(p)
        {
            document.getElementById(p).innerHTML="";
        }
       
    </script>

</body>

</html>
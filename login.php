 <?php
include('connection.php');
session_start();
if(isset($_SESSION['login_id']))

{
  header("location:index.php");  
}

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($conn,"SELECT * from login_tb where username='$username' and password='$password'");
$result=mysqli_fetch_assoc($query);
if(mysqli_num_rows($query)>0)
{

    
    $role=$result['role'];


        if($role=='0')
          {
              $_SESSION['login_id']=$result['login_id'];
              $_SESSION['role']=$result['role'];
              header("location:index.php");
          } 

         if($role=='1')
          {
              $_SESSION['login_id']=$result['login_id'];
              $_SESSION['role']=$result['role'];
              header("location:index.php");
          }   

        


          if($role=='2')
          {
              $_SESSION['login_id']=$result['login_id'];
              $_SESSION['role']=$result['role'];
              header("location:../index.php");
          }   

}
 else
          {
             echo "<script>alert('invalid username or password')</script>";
          }  
}

?>




<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form method="post" class="form-signin">
                        <div class="account-logo">
                            <a href="../index.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>

                        <div class="form-group">
                            <label>Username</label><span style="color: white; background-color: red;" id="spname"></span>
                            <input type="text" name="username" id="uname_id"  autofocus="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label><span style="color: white; background-color: red;" id="sppass"></span>
                            <input type="password" name="password" id="pass_id" class="form-control">
                        </div>
                      
                        <div class="form-group text-center">
                            <button type="submit" name="login"  class="btn btn-primary account-btn">Login</button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    
</body>


<!-- login23:12-->
</html>
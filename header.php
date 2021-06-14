

  <header id="header" class="fixed-top">
  <style>



  </style>
    <div class="container d-flex align-items-center">
    
     <!--  <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <h1 class="logo mr-auto"><a href="index.php">E-TOKEN</a></h1> 

      <nav class="nav-menu d-none d-lg-block">
        <ul>
       
          <li class="active"><a href="index.php">Home</a></li>
          
         <!-- <li><a href="#about">About</a></li> -->
          <!-- <li><a href="#services">Services</a></li>
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
        
      </nav><!-- .nav-menu -->
       <?php if(isset($_SESSION['role']))
      {?>
      <style>
      .search-box {

border:3px solid #000;
border-radius:100vh 100vh;
width:350px;
position:absolute;
top:30%;
left:35%;
background-color:#3fbbc0;
}
input{
  width:280px;
  height:50px;
  border-radius:100vh 0 150vh 100vh;
  outline:none;
  padding:0 10px;
}
i
{
  padding:10px 5px;
}
button{
  background-color:#3fbbc0;
  outline:none;
  cursor:pointer;

}
}

</style>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

          <div class="search-box">
          <form action="" method="POST">
          <input type="text" class="input-group-addon" name="search1" placeholder="type to search">
          <button name="search"><i class="fa fa-search"></i></button>
          </form>
          </div>
          
      <a href="logout.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Logout</a>
     
      <?php } ?>
      <?php if(!isset($_SESSION['role']))
      {?> <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Register</a> 
        <a href="loginpanel/login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login</a> 
      <?php } ?>


   

    </div>
  </header>




  


  
  
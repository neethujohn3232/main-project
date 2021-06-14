<?php

include'../loginpanel/connection.php';
session_start();

if(!isset($_SESSION['role']))
{
    // echo "<script>alert('you have to login first')</script>";
    echo "<script>window.location.href='../loginpanel/login.php';</script>";
} 


$login=$_SESSION['login_id'];
// var_dump($login);exit();


$req_query=mysqli_query($conn,"SELECT reg_id FROM registration_tb WHERE login_id='$login'");
$reg_data=mysqli_fetch_assoc($req_query);
$reg_id=$reg_data['reg_id'];
//var_dump($reg_id);exit();

$test_query=mysqli_query($conn,"SELECT * FROM lab_booking_tb WHERE reg_id='$reg_id'");
$test_id=mysqli_fetch_assoc($test_query);
$id=$test_id['test_id'];
//var_dump($rate_query);exit();
$rate_query=mysqli_query($conn,"SELECT * FROM lab_test WHERE test_id='$id'");

//var_dump($rate_query);exit();
$test_rate=mysqli_fetch_assoc($rate_query);



$rate =$test_rate['test_rate'];



if(isset($_POST['submit']))
{
  


  

   mysqli_query($conn,"INSERT INTO payment(reg_id,test_id,test_rate) VALUES('$reg_id','$id','$rate') ");
     
 
  echo "<script> alert('payment completed '); </script>";           
     
}


?>








<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" ><br><br><br><br><br>

     
    <div class="row"><br><br><br>


        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                    
                </div>
                <div class="panel-body">
                    <form method="post">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Valid Card Number" required="required" pattern="[0-9].{15}" required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">

                                   



                                  <select type="text" class="form-control" name="expitymonth" id="expitymonth" placeholder="MM" required /><option value="">month</option>
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

                                    <input type="text" class="form-control" name="expityyear" id="expityyear" placeholder="YY" required required="required" pattern="[0-9].{3}" /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvcode" name="cvcode" placeholder="CV" required="required" pattern="[0-9].{2}" />
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>   <?php echo $rate ?> </span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <input type="submit" value="pay" name="submit" id="submit" class="btn btn-success btn-block">
        </div>
         </form>

    </div>
</div>
</div>
</div>

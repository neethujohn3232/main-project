<?php
session_start();
include('connection.php');


$del_sche=$_GET['schedule_id'];





$delete=mysqli_query($conn,"DELETE FROM doctor_schedule_tb WHERE schedule_id='$del_sche'");

header('location:schedule.php');



?>
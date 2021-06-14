<?php
session_start();
include('connection.php');



$lb_id=$_GET['lab_id'];




$delete_lab=mysqli_query($conn,"DELETE FROM lab_test WHERE test_id='$lb_id'");

header('location:view_lab.php');



?>
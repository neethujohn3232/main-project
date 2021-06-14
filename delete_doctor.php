<?php
session_start();
include('connection.php');



$doctor_id=$_GET['doc_id'];




$delete_hospital=mysqli_query($conn,"DELETE FROM doctor_tb WHERE doctor_id='$doctor_id'");

header('location:view_doctor.php');



?>
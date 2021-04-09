<?php
session_start();
include('connection.php');


$del_hospital=$_GET['delete_id'];
$query_login=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE hospital_id='$del_hospital'");
$login_id=mysqli_fetch_Assoc($query_login);
$id=$login_id['login_id'];




$delete_hospital=mysqli_query($conn,"DELETE FROM hospital_tb WHERE hospital_id='$del_hospital'");
$delete_hospital_login=mysqli_query($conn,"DELETE FROM login_tb WHERE login_id='$id'");
header('location:view_hospital.php');



?>
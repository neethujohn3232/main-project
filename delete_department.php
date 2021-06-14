<?php
session_start();
include('connection.php');
$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];


$del_dep=$_GET['delete_id'];




$delete_hospital=mysqli_query($conn,"DELETE FROM department_tb WHERE hospital_id='$hospital_id' AND department_id='$del_dep'");

header('location:view_department.php');



?>
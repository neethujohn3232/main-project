<?php 
include'connection.php';
session_start();
$login=$_SESSION['login_id'];
$query_hospital=mysqli_query($conn,"SELECT * FROM hospital_tb WHERE login_id='$login'");
$row_data=mysqli_fetch_assoc($query_hospital);
$hospital_id=$row_data['hospital_id'];

mysqli_query($conn,"UPDATE booking_tb JOIN doctor_schedule_tb ON booking_tb.schedule_id=doctor_schedule_tb.schedule_id SET booking_tb.status='1' WHERE doctor_schedule_tb.hospital_id='$hospital_id'");

echo "<script> alert('booking status updated'); </script>";
echo "<script>window.location.href='schedule.php'; </script>";
?>
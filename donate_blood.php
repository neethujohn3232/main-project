 <?php
 include'loginpanel/connection.php';
 session_start();
 $login=$_SESSION['login_id'];
 $hospital_id=$_GET['hospital_id'];

$req_query=mysqli_query($conn,"SELECT * FROM registration_tb WHERE login_id='$login'");
$reg_data=mysqli_fetch_assoc($req_query);
$reg_id=$reg_data['reg_id'];

$check=mysqli_query($conn,"SELECT * FROM blood_donation_tb WHERE reg_id='$reg_id'");

if($row=mysqli_num_rows($check))
{
 echo "<script>alert('We Remember You!');</script>";
 echo "<script>window.location.href='user-index.php?hospital_id=$hospital_id'</script>";
}
else{
            
            
 mysqli_query($conn,"INSERT INTO blood_donation_tb (reg_id,hospital_id) VALUES ('$reg_id','$hospital_id')");
 echo "<script>alert('We Will Contact You!');</script>";
 echo "<script>window.location.href='user-index.php?hospital_id=$hospital_id'</script>";

}
            


 ?>
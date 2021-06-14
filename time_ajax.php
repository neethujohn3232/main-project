
<?php include 'loginpanel/connection.php';
$doc=$_POST['doc_id'];
$query=mysqli_query($conn,"SELECT * FROM doctor_schedule_tb  WHERE doctor_id='$doc'");
$data=mysqli_fetch_assoc($query);
$time=$data['start_time'];
$end=$data['end_time'];

?>



 <input type="tel" class="form-control" onclick="clrmsg('spphone')" value="<?php echo $time;?>   to   <?php echo $end;?>"  name="phone" id="phone"  disabled>
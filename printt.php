<?php
require('admin/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

include 'loginpanel/connection.php';

$token=$_GET['edit_id'];

$query=mysqli_query($conn,"SELECT * FROM booking_tb where token_no= '$token'");
while ($row=mysqli_fetch_assoc($query)) { 

    $time=$row['time'];
    $sh_id=$row['schedule_id'];
}
$query=mysqli_query($conn,"SELECT * FROM doctor_schedule_tb where schedule_id= '$sh_id'");
                   
while ($row=mysqli_fetch_assoc($query)) { 

    $time1=$row['start_time'];
    $time2=$row['end_time'];
    $dctr=$row['doctor_id'];
  
}               
$query=mysqli_query($conn,"SELECT * FROM doctor_tb where doctor_id= '$dctr'");
                   
while ($row=mysqli_fetch_assoc($query)) { 
    $dctrna=$row['doc_name'];
   
}

$pdf->Cell(39,11,"Token_no",1);
$pdf->Cell(80,11,"$token",1);
$pdf->Ln();      
$pdf->Cell(39,11,"Doctor_name",1);
$pdf->Cell(80,11,"$dctrna",1);
$pdf->Ln();
$pdf->Cell(39,11,"Time",1);
$pdf->Cell(80,11,"$time1 to $time2",1);
$pdf->Ln();
$pdf->Cell(39,11,"Time-Slot",1);
$pdf->Cell(80,11,"$time",1);
$pdf->Ln();


$pdf->Output();

?>
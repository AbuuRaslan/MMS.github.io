<?php
session_start();
$con=mysqli_connect("localhost","root","","mall");
if (isset($_POST["button"])) {
  $id=$_POST["id"];
  $name=$_POST["name"];
  $phase=$_POST["phase"];
  $pdate=$_POST["pdate"];
  $rnum=$_POST["rnumber"];
  $amount=$_POST["amount"];
  $insert="INSERT INTO payment(/*paymentID,*/ tenantID,phase,amount,payment_date,reciept_number) values('$id','$phase','$amount','$pdate','$rnum')";
  $send=mysqli_query($con,$insert);
  if (!$send) {
    die(mysqli_error($con));
    echo("<script> alert('failed to upload') </script>");
  }
  else
    $_SESSION['phase']=$phase;
    $_SESSION['id']=$id;
    $_SESSION['phase']=$phase;
    $_SESSION['amount']=$amount;
    header("Location: payment to rent payment record.php");
}
?>
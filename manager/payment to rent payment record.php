<?php
session_start();
$con=mysqli_connect("localhost","root","","mall");
$tid=$_SESSION['id'];
$phase=$_SESSION['phase'];
//   $amount=$_SESSION['amount'];
//   $select = "SELECT * FROM rent_paymnet_record  WHERE  'tenantID' = '$tid' AND phase=$phase";
//   $query1 = mysqli_query($con,$select);
//   if ($query1) {
//     $fetch1=mysqli_fetch_assoc($query1);
//     $pamount=$fetch1['amount_payed'];
//     $damount=$fetch1['amount_due'];
//     $ramount=$fetch1['rental_amount'];
//     $_SESSION['id']=$tid;
//     $_SESSION['phase']=$phase;
//     $_SESSION['amount']=$amount;
//     $_SESSION['pamount']=$pamount;
//     $_SESSION['damount']=$damount;
//     $_SESSION['ramount']=$ramount;

  $fees = $con->query("SELECT * FROM tenants_agreements INNER JOIN payment ON tenants_agreements.tenant_ID=payment.tenantID and tenants_agreements.phase=payment.phase where (tenantID = '$tid') ");
  //while ($fetch=mysqli_fetch_assoc($query)) {
  while($row=$fees->fetch_assoc()){
    $rid=$row['tenantID'];
    if ($rid==$tid) {
      $paid = $con->query("SELECT sum(amount) as paid FROM payment where phase=".$row['phase']);
      $paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid']:'';
      $balance = $row['rental_amount'] - $paid;
      $id=$row['tenantID'];
      $phase=$row['phase'];

      $update=" UPDATE rent_paymnet_record SET amount_payed= $paid, amount_due=$balance WHERE tenantID='$id' AND phase = $phase";
      $query2=mysqli_query($con,$update);
      // header("Location: finish payment.php");
    }
  }

  header("Location: rental payments.php");
  // else{
  //   echo "<script>alert('failed to add payment')</script>";
  //   echo mysqli_error($con);
  // }
?>
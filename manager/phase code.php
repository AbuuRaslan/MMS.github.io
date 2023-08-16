<?php
session_start();
$con=mysqli_connect("localhost","root","","mall");
if (isset($_POST['button1'])) {
  $tid=$_POST['tid'];
  $phase=$_POST['phase'];
  $sdate=$_POST['sdate'];
  $edate=$_POST['edate'];
  $ramount=$_POST['ramount'];
  $select1=" SELECT * FROM tenants_agreements ";
  $query1 = mysqli_query($con,$select1);
  $select="SELECT * FROM tenants_agreements WHERE tenant_ID='$tid' AND floor_number>0 ";
  if ($select) {
    $query=mysqli_query($con,$select);
    $fetch=mysqli_fetch_assoc($query);
    $pname=$fetch['property_name'];
    $fnum=$fetch['floor_number'];
    $pfreq=$fetch['payment_frequency'];
    $aid=mysqli_num_rows($query1)+100;
    $insert = "INSERT INTO tenants_agreements(agreementID,phase,property_name,floor_number,rental_amount,payment_frequency,lease_start_date,lease_end_date,tenant_ID) values('$aid','$phase','$pname','$fnum','$ramount','$pfreq','$sdate','$edate','$tid')";
    $query1=mysqli_query($con,$insert);
    if ($query1) {
      echo "<script> alert('phase added') </script>";
      $_SESSION['tid']=$tid;
      $_SESSION['phase']= $phase;
      $_SESSION['sdate']=$sdate;
      $_SESSION['edate']=$edate;
      $_SESSION['ramount']=$ramount;
      header("Location: rpr.code.php");
    }
    else{
      echo "<script> alert('failed to insert') </script>";
      echo mysqli_error($con);
    }
  }
  else{
    echo "<script> alert('failed to select') </script>";
  }
}
else{
  echo "<script> alert('failed to set button') </script>";
}

?>
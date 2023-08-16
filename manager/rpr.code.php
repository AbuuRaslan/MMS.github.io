<?php
session_start();
$con=mysqli_connect("localhost","root","","mall");
if ($_SESSION['tid']) {
	echo "<script> alert('session started') </script>";
	$tid=$_SESSION['tid'];
	$select="SELECT * FROM tenants_details WHERE tenantID='$tid'";
	if ($select) {
		echo "<script> alert('selection succees') </script>";
	}
	else{
		echo "<script> alert('selection failed') </script>";
	}
	$query=mysqli_query($con,$select);
	$fetch=mysqli_fetch_assoc($query);
	$name= $fetch['FullName'];
    $phase=$_SESSION['phase'];
    $ramount=$_SESSION['ramount'];
	$ammount_payed = 0;
	$amount_due=$ramount;
	$clearance = "X";
	$insert = "INSERT INTO rent_paymnet_record (tenantID,tenant_name,phase,rental_amount,amount_payed,amount_due,clearance) values('$tid','$name','$phase','$ramount','$ammount_payed','$amount_due','$clearance')";
	$query2=mysqli_query($con,$insert);
	if ($query2) {
		echo "<script> alert('pahse added') </script>";
		session_destroy();
		header("Location: lease.php");
	}
}
?>
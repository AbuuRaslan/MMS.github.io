<?php
session_start();
$con=mysqli_connect("localhost","root","","mall");
echo $_SESSION['from']."<br>".$_SESSION['prname']."<br>".$_SESSION['flnumber']."<br>".$_SESSION['to']."<br>".$_SESSION['subject']."<br>".$_SESSION['message']."<br>".$_SESSION['date']."<br>".$_SESSION['time']."<br>";
if ($_SESSION['date']) {
	$from=$_SESSION['from'];
	$fid=$_SESSION['fid'];
	$prname=$_SESSION['prname'];
	$flnumber=$_SESSION['flnumber'];
	$to=$_SESSION['to'];
	$subj=$_SESSION['subject'];
	$mssg=$_SESSION['message'];
	$date=$_SESSION['date'];
	$time=$_SESSION['time'];
	$send=" INSERT INTO messages (ffrom,tenantID,property_name,floor_number,tto,subject,message,ddate,ttime) VALUES('$from','$fid','$prname','$flnumber','$to','$subj','$mssg','$date','$time')";
	$query=mysqli_query($con,$send);
	if ($query) {
		echo "<script> alert('message sent') </script>";
		header("Location: tenant communication channel.php");
	}
	else{
		echo "<script> alert('failed to send message') </script>";
		echo mysqli_error($con);
	}
		

}

?>
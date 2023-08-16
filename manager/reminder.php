<?php
session_start();
$con=mysqli_connect("localhost","root","","mall");
if (isset($_POST["rbutton"])) {
  //$ted=$_POST['tenid'];
  $select=" SELECT * FROM  tenants_agreements inner join rent_paymnet_record on tenants_agreements.tenant_ID = rent_paymnet_record.tenantID  ";
  // if ($select) {
  //   $query = mysqli_query($con,$select);
  //   $fetch=  mysqli_fetch_assoc($query);
  //   $tenid=$_POST['tenid'];
  //   $rdate=$_POST['rdate'];
  //   $ram=$_POST['ram'];
  //   $rphase=$_POST['rphase'];
  //   $insert = " INSERT INTO reminder (tenantID,rdate,amount,phase) VALUES ('$tenid','$rdate','$ram','$rphase') " ;
  //   $send=mysqli_query($con,$insert);
  //   if ($send) {
  //     echo "<script> alert('reminder sent') </script>";
  //     if ($send) {
  //       header("Location: rental payments.php");
  //     }
  //   }
  //   else{
  //     echo "<script> alert('reminder not sent') </script>";
  //   }
  $query=mysqli_query($con,$select);
  date_default_timezone_set('Africa/Dar_es_Salaam');
  $date=date("Y/m/d");
  while ($fetch=mysqli_fetch_assoc($query)) {
    $phone_number="255".$fetch['phone_number'];
    $name=$fetch['tenant_name'];
    $debit=number_format($fetch['amount_due'],1);
    $lease_end_date=$fetch['lease_end_date'];
    $amount_due=$fetch['amount_due'];
    if ($lease_end_date<=(date("Y/m/d")) and $amount_due>0) {

      $api_key='9aed5250af8eafdd';
      $secret_key = 'ZTljNWFlOGMxZDZmMDE3MjVjYjRkOTA2ZDhhZGViYjYwYTk0ZDlhOTE4YTU4NmRkMzE1MGE4MTIyMTA5YTJhOA==';

      $postData = array(
          'source_addr' => 'INFO',
          'encoding'=>0,
          'schedule_time' => '',
          'message' => 'MESSAGE FROM MICHENZANI MALL: Dear '.$name.', the rent payment deadline has arrived, You have a debt of $'.$debit.' please visit http://localhost/mall%20management%20system/user.php   for more information', 
          'recipients' => [array('recipient_id' => '1','dest_addr'=>$phone_number)]
      );

      $Url ='https://apisms.beem.africa/v1/send';

      $ch = curl_init($Url);
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt_array($ch, array(
          CURLOPT_POST => TRUE,
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_HTTPHEADER => array(
              'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
              'Content-Type: application/json'
          ),
          CURLOPT_POSTFIELDS => json_encode($postData)
      ));

      $response = curl_exec($ch);

      if($response === FALSE){
              echo $response;

          die(curl_error($ch));
      }
      var_dump($response);

          }
    }
    header("Location:rental payments.php");

}
?>
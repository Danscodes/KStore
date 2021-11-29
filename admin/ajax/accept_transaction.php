<?php

$transaction_id=$_POST['trans_id'];


include ('../../db_connect.php');
date_default_timezone_set('Asia/Manila');
$date_added = date("Y-m-d H:i:s");

$sql="UPDATE `transactions` SET `status` = 'pickup', date_updated ='$date_added' WHERE trans_id ='$transaction_id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

if($q){
echo 1;
}else{
echo 0;
}
?>
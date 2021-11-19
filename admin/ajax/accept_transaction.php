<?php

$transaction_id=$_POST['trans_id'];


include ('../../db_connect.php');

$sql="UPDATE `transactions` SET `status` = 'pickup' WHERE trans_id ='$transaction_id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

if($q){
echo 1;
}else{
echo 0;
}
?>
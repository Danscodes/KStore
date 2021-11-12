<?php

$product_id=$_POST['product_id'];


include ('../../db_connect.php');

$sql="DELETE FROM product WHERE product_id = $product_id";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

if($q){
echo 1;
}else{
echo 0;
}
?>
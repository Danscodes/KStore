<?php

$category_id=$_POST['category_id'];


include ('../../db_connect.php');

$sql="DELETE FROM category WHERE category_id = $category_id";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

if($q){
echo 1;
}else{
echo 0;
}
?>
<?php
include ('../db_connect.php');
session_start();

	$product_id    =  $_POST['u_product_id'];
	$category_id    =  $_POST['u_category'];
	$product_name    =  $_POST['u_productname'];
	$price    =  $_POST['u_price'];



        $sql="UPDATE `product` SET `category_id` = '$category_id', `product_name` = '$product_name', `price` = '$price' WHERE `product_id` = '$product_id'";
        $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if ($q) {
        header('location: ../admin/index.php?page=product');
	}else{
        echo 'err';
    }

?>
<?php
include ('../db_connect.php');
session_start();

	$u_category_id    =  $_POST['u_category_id'];
	$u_category_name    =  $_POST['u_category_name'];


        $sql="UPDATE `category` SET `name` = '$u_category_name' WHERE `category_id` = '$u_category_id'";
        $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

      

	if ($q) {
        header('location: ../admin/index.php?page=category');
	}else{
        echo 'error connection';
    }

?>
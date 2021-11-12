<?php

include ('../db_connect.php');
session_start();
$category_name = $_POST['category_name'];


    $todays_date = date("Y-m-d H:i:s");
    $sql="INSERT INTO `category` (`category_id`, `name`) VALUES (NULL, '$category_name')";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
    if($q){
      header('location: ../admin/index.php?page=category');
    }else{
      echo "Error connection";
    }
?>
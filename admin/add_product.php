<?php

include ('../db_connect.php');

$product_name    =  $_POST['productname'];
$price    = $_POST['price'];
$category    = $_POST['category'];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if file already exists
if (file_exists($target_file)) {
  $sql="INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `price` ,`file_path`) VALUES (NULL, '$category', '$product_name', '$price', '')";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
    if($q){
      header('location: ../admin/index.php?page=product');
    }else{
      echo "Sorry, there was an error uploading your file.";
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "hello";
    date_default_timezone_set('Asia/Manila');
    $todays_date = date("Y-m-d H:i:s");
    $sql="INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `price` ,`file_path`) VALUES (NULL, '$category', '$product_name', '$price', '$target_file')";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
    if($q){
      header('location: ../admin/index.php?page=product');
    }else{
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// INSERT INTO `files` (`f_id`, `user_id`, `filename`, `file_type`, `date_uploaded`, `remarks`, `file_path`) VALUES (NULL, '', 'test', 'testtes', '', 'test', 'test');
?>
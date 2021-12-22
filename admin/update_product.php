<?php

include ('../db_connect.php');
$u_product_id = $_POST['u_product_id'];
$u_productname    =  $_POST['u_productname'];
$u_price    = $_POST['u_price'];
$u_stocks    = $_POST['u_stocks'];
$u_category    = $_POST['u_category'];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["u_fileToUpload"]["name"]);
$filename = $_FILES["u_fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if file already exists
if (file_exists($target_file)) {
	$sql="UPDATE product SET category_id = '$u_category', product_name = '$u_productname',  price = '$u_price', qty = '$u_stocks' WHERE product_id = $u_product_id";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
    if($q){
      header('location: ../admin/index.php?page=product');
    }else{
      echo "Sorry, there was an error uploading your file.";
    }
}

// Check file size
if ($_FILES["u_fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["u_fileToUpload"]["tmp_name"], $target_file)) {
      echo "hello";
    date_default_timezone_set('Asia/Manila');
    $todays_date = date("Y-m-d H:i:s");
    $sql="UPDATE product SET category_id = '$u_category', product_name = '$u_productname',  price = '$u_price', file_path = '$target_file' WHERE product_id = $u_product_id";
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
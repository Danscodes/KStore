<?php
include '../db_connect.php';
$user_id = $_GET ['user_id'];
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];
$password = $_POST['password'];
$password = md5($password);



$sql = "UPDATE users SET username = '$username', name = '$name',  email = '$email', user_type = '$user_type', password = '$password' WHERE user_id = $user_id " ; 
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

header ("location: ../admin/index.php?page=users");
?>		

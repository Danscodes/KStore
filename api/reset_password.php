<?php
include ('../db_connect.php');

	$u_username    =  $_POST['username'];
	$u_email   =  $_POST['email'];
	$password    = md5($_POST['password']);


		$sql="UPDATE `users` SET password='$password' WHERE `username` = '$u_username' and `email` = '$u_email'";
		$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
		if ($q) {
            echo 1;
		}else{
			echo 0;
		}
	
?>
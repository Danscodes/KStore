<?php
    include '../db_connect.php';
	$username    =  $_POST['username'];
	$name    =  $_POST['name'];
	$email = $_POST['email'];
	$password  =  md5($_POST['password']);
    $age = $_POST['age'];

	$gender    =  $_POST['sex'];
	$address = $_POST['address'];
	$contact_no = $_POST['contact_no'];

  

   
    $query2 = mysqli_query($db,"SELECT * FROM users  where name = '$name' or email = '$email'");
    $insert_user2 = mysqli_num_rows($query2);
    
    if($insert_user2>0){
        echo 0;
    }else{
        $query = "INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `user_type`, `password`, `age`, `sex`, `address`, `contact_no`) VALUES (NULL, '$username', '$name', '$email', 'user', '$password', '$age', '$gender', '$address', '$contact_no ')";
        $insert_user = mysqli_query($db, $query);
        if($insert_user){
            echo 1;
        }else{
            echo 2;
        }
    }


?>
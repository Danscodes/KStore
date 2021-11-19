<?php
include ('../../db_connect.php');
$transaction_id=$_POST['trans_id'];
$sql="UPDATE `transactions` SET `status` = 'finished' WHERE trans_id ='$transaction_id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

if($q){


    

    $sql2 = "SELECT * FROM `cart` WHERE transaction_id='$transaction_id'";
    $q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));

        while($row = mysqli_fetch_assoc($q2))

        {
            $cart_id = $row['cart_id'];

            $query = "UPDATE `cart` SET  `status` = 'finished'  WHERE `cart_id` = '$cart_id'";
            $results = mysqli_query($conn, $query) or die (mysqli_error($conn));
        
        }
    
echo 1;
}else{
echo 0;
}
?>
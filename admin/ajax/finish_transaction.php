<?php

$transaction_id=$_POST['trans_id'];


include ('../../db_connect.php');

$sql="UPDATE `transactions` SET `status` = 'finished' WHERE trans_id ='$transaction_id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

if($q){


    

    $sql2 = "SELECT * FROM `cart` WHERE transaction_id='$transaction_id'";
    $q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));

        while($r = mysqli_fetch_assoc($q2))

        {
            $cart_id = $r['cart_id'];

            $query = "UPDATE `cart` SET  `status` = 'finished'  WHERE `transaction_id` = '$transaction_id'";
            $results = mysqli_query($db, $query);
        
        }


        $response["status"] =1;


echo 1;
}else{
echo 0;
}
?>
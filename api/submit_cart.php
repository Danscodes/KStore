

<?php
include '../db_connect.php';
$user_id = $_REQUEST['user_id'];
$sql = "SELECT * FROM `cart` WHERE user_id='$user_id';";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

$min=5;
$max=20;

$minutes =  rand($min,$max);
$delivery_fee = 0;
if($minutes>10){
    $delivery_fee = 100;
}else{
    $delivery_fee = 50;
}


    $query = "INSERT INTO `transactions` (`trans_id`, `user_id`, `transaction_date`, `status`,`total`,`minutes`,`delivery_fee`) VALUES (NULL, '$user_id', '2021-10-29 20:17:10.000000','requested','0','$minutes','$delivery_fee'); ";
    $results = mysqli_query($db, $query);
    
    $response_array['data'] = array();

    if ($results) { // user found
        $last_id = mysqli_insert_id($db);


    $sql2 = "SELECT * FROM `cart` WHERE user_id='$user_id'";
    $q2 = mysqli_query($db,$sql2) or die (mysqli_error($conn));

        while($r = mysqli_fetch_assoc($q2))

        {
            $cart_id = $r['cart_id'];

            $query = "UPDATE `cart` SET `transaction_id` = '$last_id', `status` = 'requested'  WHERE `cart`.`cart_id` = '$cart_id' and status !='finished'";
            $results = mysqli_query($db, $query);
        
        }


        $response["status"] =1;
	array_push($response_array['data'], $response);
    }else {
        $response["status"] =0;
	array_push($response_array['data'], $response);
    }
    echo json_encode($response_array);


    
    
?>
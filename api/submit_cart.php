

<?php
include '../db_connect.php';
$user_id = $_REQUEST['user_id'];
$sql = "SELECT * FROM `cart` WHERE user_id='$user_id';";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));




    $query = "INSERT INTO `transactions` (`trans_id`, `user_id`, `transaction_date`, `status`) VALUES (NULL, '$user_id', '2021-10-29 20:17:10.000000','requested'); ";
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


<?php
// $user_id = $_REQUEST['user_id'];
$db = mysqli_connect('localhost', 'root', '', 'db_kstore');
$sql = "SELECT * FROM `cart` WHERE user_id='3';";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

    $response_array['data'] = array();

    $query = "INSERT INTO `transactions` (`trans_id`, `user_id`, `transaction_date`, `status`) VALUES (NULL, '3', '2021-10-29 20:17:10.000000','requested'); ";
    $results = mysqli_query($db, $query);
    
    $response_array['data'] = array();

    if ($results) { // user found
        $last_id = mysqli_insert_id($db);


    $sql2 = "SELECT * FROM `cart` WHERE user_id='3' and transaction_id='0';";
    $q2 = mysqli_query($db,$sql2) or die (mysqli_error($conn));

        while($r = mysqli_fetch_assoc($q2))

        {
            $cart_id = $r['cart_id'];

            $query = "UPDATE `cart` SET `transaction_id` = '$last_id' WHERE `cart`.`cart_id` = '$cart_id'";
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
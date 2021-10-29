<?php
$product_id = $_REQUEST['product_id'];
$product_name = $_REQUEST['product_name'];
$user_id  = $_REQUEST['user_id'];
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'db_kstore');


    $query = "INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `transaction_id`, `product_name`, `quantity`, `status`) VALUES (NULL, '$product_id', '$user_id', '0', '$product_name', '1', 'pending');";
    $results = mysqli_query($db, $query);
    
    $response_array['data'] = array();

    if ($results) { // user found

        $response["status"] =1;
	array_push($response_array['data'], $response);
    }else {
        $response["status"] =0;
	array_push($response_array['data'], $response);
    }
    echo json_encode($response_array);

    
?>
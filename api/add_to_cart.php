<?php
$product_id = $_REQUEST['product_id'];
$product_name = $_REQUEST['product_name'];
$user_id  = $_REQUEST['user_id'];
$qty  = $_REQUEST['qty'];
// connect to database

$response_array['data'] = array();
$db = mysqli_connect('localhost', 'root', '', 'db_kstore');
        $sql2 = "SELECT * FROM transactions where user_id = '$user_id'";
      
        $q2 = mysqli_query($db,$sql2) or die (mysqli_error($conn));
        $count_trans = mysqli_num_rows($q2);
        $r = mysqli_fetch_array($q2);
if($count_trans>0){
    if($r['status']=='requested'){
        $response["status"] =0;
        $response["message"] ='Unable to add cart if cart status is submitted order.';
        array_push($response_array['data'], $response);
    }else{
        $query = "INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `transaction_id`, `product_name`, `quantity`, `status`) VALUES (NULL, '$product_id', '$user_id', '0', '$product_name', '$qty', 'pending');";
        $results = mysqli_query($db, $query);
        
    
        if ($results) { // user found
    
            $response["status"] =1;
            $response["message"] ='Item added to cart';
        array_push($response_array['data'], $response);
        }else {
            $response["status"] =0;
            $response["message"] ='Failed to insert';
        array_push($response_array['data'], $response);
        }
      
    
    } 
    echo json_encode($response_array);
}else{

        $query = "INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `transaction_id`, `product_name`, `quantity`, `status`) VALUES (NULL, '$product_id', '$user_id', '0', '$product_name', '$qty', 'pending');";
        $results = mysqli_query($db, $query);
        
    
        if ($results) { // user found
    
            $response["status"] =1;
            $response["message"] ='Item added to cart';
        array_push($response_array['data'], $response);
        }else {
            $response["status"] =0;
            $response["message"] ='Failed to insert';
        array_push($response_array['data'], $response);
        }
      
    
    
    echo json_encode($response_array);
}
   
?>
<?php
include '../db_connect.php';
$product_id = $_REQUEST['product_id'];
$product_name = $_REQUEST['product_name'];
$user_id  = $_REQUEST['user_id'];
$qty  = $_REQUEST['qty'];
// connect to database

$response_array['data'] = array();
        $sql2 = "SELECT * FROM transactions where user_id = '$user_id' and status!='finished'";
      
        $q2 = mysqli_query($db,$sql2) or die (mysqli_error($conn));
        $count_trans = mysqli_num_rows($q2);
        $r = mysqli_fetch_array($q2);
if($count_trans>0){
    if($r['status']=='requested'||$r['status']=='pickup'){
        $response["status"] =0;
        $response["message"] ='Unable to add cart if cart status is submitted order or for delivery.';
        array_push($response_array['data'], $response);
    }else{
        $sql3 = "SELECT * FROM cart where product_id = '$product_id' and status = 'pending'";
      
        $q3 = mysqli_query($db,$sql3) or die (mysqli_error($conn));
        $count_same = mysqli_num_rows($q3);
        $r3 = mysqli_fetch_array($q3);


        if($count_same==0){ //update cart
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
        }else{
            $fqty = $r3['quantity']+$qty;
            $cart_id = $r3['cart_id']; 
            $query = "UPDATE `cart` SET `quantity` = '$fqty' WHERE `cart_id` = '$cart_id'";
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
      
      
    
    } 
    echo json_encode($response_array);
}else{

       
    
     $sql3 = "SELECT * FROM cart where product_id = '$product_id' and status = 'pending'";
      
        $q3 = mysqli_query($db,$sql3) or die (mysqli_error($conn));
        $count_same = mysqli_num_rows($q3);
        $r3 = mysqli_fetch_array($q3);


        if($count_same==0){ //update cart
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
        }else{
            $fqty = $r3['quantity']+$qty;
            $cart_id = $r3['cart_id']; 
            $query = "UPDATE `cart` SET `quantity` = '$fqty' WHERE `cart_id` = '$cart_id'";
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
}
   
?>
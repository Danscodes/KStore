
<?php
// $user_id = $_REQUEST['user_id'];
$db = mysqli_connect('localhost', 'root', '', 'db_kstore');
$sql = "SELECT * FROM `cart` WHERE user_id='3';";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

    $response_array['data'] = array();
  

    while($r = mysqli_fetch_assoc($q))
    {
        $response["cart_id"] =$r['cart_id'];
        $response["product_id"] =$r['product_id'];
        $response["product_name"] =$r['product_name'];       
        $response["quantity"] =$r['quantity'];
	    array_push($response_array['data'], $response);
    }


    echo json_encode($response_array);

    
?>
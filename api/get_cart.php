
<?php
include '../db_connect.php';
include '../functions.php'; 
$user_id = $_REQUEST['user_id'];
$sql = "SELECT * FROM `cart` WHERE user_id='$user_id' and status !='finished'";
$q = mysqli_query($db,$sql) or die (mysqli_error($db));

    $response_array['data'] = array();
  

    while($r = mysqli_fetch_assoc($q))
    {
        $response["cart_id"] =$r['cart_id'];
        $response["product_id"] =$r['product_id'];
        $product_id= $r["product_id"];
       
        $sql2 = "SELECT * FROM product where product_id = '$product_id'";
        $q2 = mysqli_query($db,$sql2) or die (mysqli_error($db));
        $price = 0;
                    while($row = mysqli_fetch_assoc($q2))
                    {
                        $price =  $row['price'];
                        $response["price"] = $row['price'];
                    }
        $response["total"] =$price*$r['quantity'];  

            $response["total_price"] =get_total_price($db,$user_id);     
              
            $trans_id= $r["transaction_id"];
            $sql3 = "SELECT * FROM transactions where trans_id = '$trans_id'";
            $q3 = mysqli_query($db,$sql3) or die (mysqli_error($db));
            $price = 0;
                        while($row2 = mysqli_fetch_assoc($q3))
                        {
                           
                            $response["minutes"] = $row2['minutes'];
                            $response["delivery_fee"] = $row2['delivery_fee'];
                        }

        $response["product_name"] =$r['product_name'];       
        $response["quantity"] =$r['quantity'];
	    array_push($response_array['data'], $response);
    }


    echo json_encode($response_array);

    
?>
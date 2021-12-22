<?php
     include '../../../db_connect.php';
    $sql = "SELECT * FROM transactions";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

        $response["data"] = array();
        while ($data = mysqli_fetch_array($q)) {
            $delivery_fee = $data["delivery_fee"];
            $list["trans_id"] = $data["trans_id"];
            $list["user_id"] = $data["user_id"];
            $list["date_updated"] = date("Y-m-d h:i:s a", strtotime($data["date_updated"]));
            $user_id = $data["user_id"];
            $sql2 = "SELECT * FROM users where user_id = '$user_id'";
            $q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
         
						while($r = mysqli_fetch_assoc($q2))
						{
                            $list["user_name"] =  $r['name'];
                        }
            $status =  $data["status"];



            $transaction_id =  $data["trans_id"];
            $cart_sql = "SELECT * FROM cart where transaction_id = '$transaction_id'";
            $q_cart = mysqli_query($conn,$cart_sql) or die (mysqli_error($conn));
            $total_cart = 0.00;
            while ($cart_data = mysqli_fetch_array($q_cart)) {
              
                $product_id= $cart_data["product_id"];
       
                $sql3 = "SELECT * FROM product where product_id = '$product_id'";
                $q3 = mysqli_query($conn,$sql3) or die (mysqli_error($conn));
                $price = 0;
                            while($r3 = mysqli_fetch_assoc($q3))
                            {
                                $price =  $r3['price'];
                            }
                $total_cart += $cart_data["quantity"]*$price;
             
            }

            $list["total_cart"] = number_format((float)$total_cart+ $delivery_fee, 2);
          
            if($status=="pickup"){
                $list["status"] = "for delivery";
            }else{
                $list["status"] =  $data['status'];
            }
            array_push($response["data"], $list);
        }



    	echo json_encode($response);
?>
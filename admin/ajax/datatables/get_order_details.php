<?php
      include '../../../db_connect.php';
    $transaction_id = $_POST['transaction_id'];
    $sql = "SELECT * FROM cart where transaction_id = '$transaction_id'";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

        $response["data"] = array();
        while ($data = mysqli_fetch_array($q)) {
            $list["product_name"] = $data["product_name"];
            $product_id= $data["product_id"];
       
            $sql2 = "SELECT * FROM product where product_id = '$product_id'";
            $q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
            $price = 0;
						while($r = mysqli_fetch_assoc($q2))
						{
                            $price =  $r['price'];
                            $list["price"] = $r['price'];
                        }
            $list["quantity"] = $data["quantity"];
            $list["total"] = $data["quantity"]*$price;
            array_push($response["data"], $list);
        }
    	echo json_encode($response);
?>
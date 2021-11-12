<?php
    $conn = mysqli_connect("localhost","root","") or die (mysqli_error($conn));
    $db = mysqli_select_db($conn,"db_kstore");
    $sql = "SELECT * FROM product";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

        $response["data"] = array();
        while ($data = mysqli_fetch_array($q)) {
            $list["product_id"] = $data["product_id"];
            $list["category_id"] = $data["category_id"];

            $category_id = $data["category_id"];
            $sql2 = "SELECT * FROM category where category_id = '$category_id'";
            $q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
         
						while($r = mysqli_fetch_assoc($q2))
						{
                            $list["category_name"] =  $r['name'];
                        }
            $list["product_name"] = $data["product_name"];
            $list["price"] = $data["price"];
            array_push($response["data"], $list);
        }
    	echo json_encode($response);
?>
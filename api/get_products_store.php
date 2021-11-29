
<?php
include '../db_connect.php';
$category_id = $_REQUEST['category_id'];
$sql = "SELECT * FROM `product` where category_id ='$category_id'";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

    $response_array['data'] = array();
  

    while($r = mysqli_fetch_assoc($q))
    {
        $response["product_id"] =$r['product_id'];
        $response["product_name"] =$r['product_name']."   -   ".number_format((float)$r['price'], 2, '.', '')." Php";
        
	    array_push($response_array['data'], $response);
    }
    echo json_encode($response_array);
?>
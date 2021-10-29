
<?php
$category_id = $_REQUEST['category_id'];
$db = mysqli_connect('localhost', 'root', '', 'db_kstore');
$sql = "SELECT * FROM `product` where category_id ='$category_id'";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

    $response_array['data'] = array();
  

    while($r = mysqli_fetch_assoc($q))
    {
        $response["product_id"] =$r['product_id'];;
        $response["product_name"] =$r['product_name'];;
	    array_push($response_array['data'], $response);
    }


    echo json_encode($response_array);

    
?>
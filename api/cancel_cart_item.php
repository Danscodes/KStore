<?php

$cart_id=$_POST['cart_id'];

$db = mysqli_connect('localhost', 'root', '', 'db_kstore');
$sql="DELETE FROM cart WHERE cart_id = $cart_id";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

$response_array['data'] = array();
if($q){
    $response["status"] =1;
    $response["message"] ='Success';
    array_push($response_array['data'], $response);
}else{
    $response["status"] =0;
    $response["message"] ='Error Something went wrong';
    array_push($response_array['data'], $response);
}

echo json_encode($response_array);

?>

<?php

$db = mysqli_connect('localhost', 'root', '', 'db_kstore');
$sql = "SELECT * FROM `category`";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

    $response_array['data'] = array();
  

    while($r = mysqli_fetch_assoc($q))
    {
        $response["category_id"] =$r['category_id'];;
        $response["category_name"] =$r['name'];;
	    array_push($response_array['data'], $response);
    }





    echo json_encode($response_array);

    
?>
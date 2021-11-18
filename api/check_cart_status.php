
<?php
$user_id = $_REQUEST['user_id'];
$db = mysqli_connect('localhost', 'root', '', 'db_kstore');
$sql = "SELECT * FROM `transactions` WHERE user_id='$user_id';";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

    $response_array['data'] = array();
  

    while($r = mysqli_fetch_assoc($q))
    {
        $response["status"] =$r['status'];
	    array_push($response_array['data'], $response);
    }


    echo json_encode($response_array);

    
?>
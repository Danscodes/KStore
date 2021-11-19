
<?php
$user_id = $_REQUEST['user_id'];
$db = mysqli_connect('localhost', 'root', '', 'db_kstore');


    $response_array['data'] = array();
    $sql2 = "SELECT * FROM `transactions` WHERE user_id='$user_id' ORDER BY trans_id DESC LIMIT 0, 1;";
      
    $q2 = mysqli_query($db,$sql2) or die (mysqli_error($conn));
    $count_trans = mysqli_num_rows($q2);
    if($count_trans>0){

        $sql = "SELECT * FROM `transactions` WHERE user_id='$user_id' ORDER BY trans_id DESC LIMIT 0, 1";
        $q = mysqli_query($db,$sql) or die (mysqli_error($conn));   
        while($r = mysqli_fetch_assoc($q))
        {
            $response["status"] =$r['status'];
            array_push($response_array['data'], $response);
        }
        echo json_encode($response_array);

    }else{
        $response["status"] ='pending';
	    array_push($response_array['data'], $response);
        echo json_encode($response_array);
    }
?>
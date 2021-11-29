
<?php
include '../db_connect.php';
$user_id = $_REQUEST['user_id'];
$sql = "SELECT * FROM `transactions` where user_id ='$user_id' and status='finished' order by trans_id DESC";
$q = mysqli_query($db,$sql) or die (mysqli_error($conn));

    $response_array['data'] = array();
  

    while($r = mysqli_fetch_assoc($q))
    {
        $response["details"] = "Transaction No. ".$r['trans_id']." \n \n".date("Y/m/d h:i a", strtotime($r["date_updated"]))."\n \n Total Payment: \n".$r['total']." Php";

	    array_push($response_array['data'], $response);
    }
    echo json_encode($response_array);
?>
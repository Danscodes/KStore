

<?php
include '../../db_connect.php';
$trans_id = $_REQUEST['trans_id'];

    $response_array['data'] = array();

    $query = "DELETE FROM `transactions` WHERE `transactions`.`trans_id` = '$trans_id' and status !='finished'";
    $results = mysqli_query($db, $query);
    
    $response_array['data'] = array();

    if ($results) { // user found
        $last_id = mysqli_insert_id($db);


    $sql2 = "SELECT * FROM `cart` WHERE transaction_id='$trans_id' and status ='requested'";
    $q2 = mysqli_query($db,$sql2) or die (mysqli_error($conn));

        while($r = mysqli_fetch_assoc($q2))

        {
            $cart_id = $r['cart_id'];

            $query = "UPDATE `cart` SET `status` = 'pending', transaction_id = '0' WHERE transacttion_id='$trans_id' and status ='requested'";
            $results = mysqli_query($db, $query);
        
        }

echo 1;
    }else {
      echo 0;
    }
  
    
?>
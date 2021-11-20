<?php
     include '../../../db_connect.php';
    $sql = "SELECT * FROM transactions";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

        $response["data"] = array();
        while ($data = mysqli_fetch_array($q)) {
            $list["trans_id"] = $data["trans_id"];
            $list["user_id"] = $data["user_id"];

            $user_id = $data["user_id"];
            $sql2 = "SELECT * FROM users where user_id = '$user_id'";
            $q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
         
						while($r = mysqli_fetch_assoc($q2))
						{
                            $list["user_name"] =  $r['name'];
                        }


            $list["status"] = $data["status"];
            array_push($response["data"], $list);
        }
    	echo json_encode($response);



?>
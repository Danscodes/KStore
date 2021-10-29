<?php
    $conn = mysqli_connect("localhost","root","") or die (mysqli_error($conn));
    $db = mysqli_select_db($conn,"db_kstore");
    $sql = "SELECT * FROM transactions";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

        $response["data"] = array();
        while ($data = mysqli_fetch_array($q)) {
            $list["trans_id"] = $data["trans_id"];
            $list["user_id"] = $data["user_id"];
            $list["status"] = $data["status"];
            array_push($response["data"], $list);
        }
    	echo json_encode($response);



?>
<?php
    $conn = mysqli_connect("localhost","root","") or die (mysqli_error($conn));
    $db = mysqli_select_db($conn,"db_kstore");
    $sql = "SELECT * FROM users order by user_id DESC";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

        $response["data"] = array();
        while ($data = mysqli_fetch_array($q)) {
            $list["user_id"] = $data["user_id"];
            $list["username"] = $data["username"];
            $list["name"] = $data["name"];
            $list["email"] = $data["email"];
            $list["user_type"] = $data["user_type"];
            $list["password"] = $data["password"];
            array_push($response["data"], $list);
        }
    	echo json_encode($response);



?>
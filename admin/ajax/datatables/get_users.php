<?php
     include '../../../db_connect.php';
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
            $list["age"] = $data["age"];
            $list["gender"] = $data["sex"];
            $list["address"] = $data["address"];
            $list["contact_no"] = $data["contact_no"];
            array_push($response["data"], $list);
        }
    	echo json_encode($response);



?>
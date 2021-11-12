<?php
    $conn = mysqli_connect("localhost","root","") or die (mysqli_error($conn));
    $db = mysqli_select_db($conn,"db_kstore");
    $sql = "SELECT * FROM category";
    $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

        $response["data"] = array();
        while ($data = mysqli_fetch_array($q)) {
            $list["category_id"] = $data["category_id"];
            $list["category_name"] = $data["name"];
            array_push($response["data"], $list);
        }
    	echo json_encode($response);
?>
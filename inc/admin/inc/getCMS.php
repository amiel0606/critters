<?php
session_start();
require_once './dbCon.php';

$query = "SELECT * FROM tbl_cms";
$result = mysqli_query($conn, $query);

$data = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row; 
    }
    echo json_encode($data); 
} else {
    echo json_encode(array("error" => "Error fetching data: " . mysqli_error($conn)));
}

mysqli_close($conn);
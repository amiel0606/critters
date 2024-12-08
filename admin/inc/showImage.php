<?php

include_once './dbCon.php';
$sql = "SELECT *FROM tbl_images";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
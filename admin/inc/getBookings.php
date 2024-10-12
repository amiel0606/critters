<?php
include_once './dbCon.php';

$sql = "SELECT * FROM tbl_bookings";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
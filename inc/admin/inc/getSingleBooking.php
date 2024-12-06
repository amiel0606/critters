<?php
include_once './dbCon.php';

$bookingID = $_GET['bookingID'];

$query = "SELECT * FROM tbl_bookings WHERE id = '$bookingID'";
$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
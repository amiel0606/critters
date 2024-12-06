<?php
header('Content-Type: application/json');

include_once './dbCon.php';
$serviceId = $_POST['service_id'];

$query = "SELECT * FROM tbl_categories WHERE category_parent = '$serviceId'";
$result = mysqli_query($conn, $query);

$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

mysqli_close($conn);

echo json_encode($categories);
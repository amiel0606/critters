<?php
// Database connection
include 'db.php';

$query = "SELECT * FROM carousel_images";
$result = mysqli_query($conn, $query);

$images = [];
while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
}

echo json_encode($images);
?>

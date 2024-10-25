<?php
include_once './dbCon.php'; 

$category_id = intval($_POST['category_id']); 

$sql = "SELECT * FROM tbl_services WHERE category_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();

$services = [];

while ($row = $result->fetch_assoc()) {
    $services[] = [
        'id' => $row['service_id'],
        'name' => htmlspecialchars($row['service_name']),
        'description' => htmlspecialchars($row['service_description']),
        'price' => htmlspecialchars($row['service_price']),
        'image' => htmlspecialchars($row['service_image']), 
        'visibility' => htmlspecialchars($row['visibility']) 
    ];
}

header('Content-Type: application/json');
echo json_encode($services);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'JSON encoding error: ' . json_last_error_msg()]);
}

$stmt->close();
$conn->close();
<?php
include_once './dbCon.php'; 

$sql = "
    SELECT 
        COUNT(CASE WHEN role = 'Customer' THEN id END) AS customer_count,
        COUNT(CASE WHEN role != 'Customer' THEN id END) AS non_customer_count,
        (SELECT COUNT(DISTINCT appointment_id) FROM tbl_setappointment) AS appointment_count
    FROM tbl_users;
";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode([
        'status' => 'success',
        'data' => $data
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to fetch data'
    ]);
}

$conn->close();

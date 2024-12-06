<?php
include_once './dbCon.php';
$sql = "SELECT MONTH(booking_date) AS month, COUNT(*) AS total_patients 
        FROM tbl_setappointment 
        WHERE YEAR(booking_date) = YEAR(CURDATE()) AND status = 'Completed' 
        GROUP BY MONTH(booking_date) 
        ORDER BY total_patients DESC";

$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'month' => $row['month'], 
            'total_patients' => $row['total_patients']
        ];
    }
}

header('Content-Type: application/json');

echo json_encode($data);

$conn->close();
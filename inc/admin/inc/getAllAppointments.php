<?php
require_once './dbCon.php';

$sql = "SELECT st.*, s.*, p.* 
        FROM tbl_setappointment st
        INNER JOIN tbl_services s ON st.booking_id = s.service_id
        INNER JOIN tbl_pets p ON st.pet_id = p.id
        WHERE st.status = 'Active' 
        AND DATE(st.booking_date) = CURDATE() 
        ORDER BY st.booking_date DESC;";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result(); 

$appointments = []; 

while ($row = $result->fetch_assoc()) {
    $appointments[] = [
        'title' => $row['service_name'], 
        'date' => $row['booking_date'],
        'petName' => $row['petName'], 
        'ownerName' => $row['ownerName'], 
        'time' => $row['time'],
        'petType'=> $row['petType'],
        'id'=> $row['appointment_id'],
    ];
}

echo json_encode($appointments);

$stmt->close();
$conn->close();
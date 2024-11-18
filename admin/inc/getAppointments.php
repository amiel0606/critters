<?php
include_once './dbCon.php';

$sql = "SELECT a.*, s.*, p.* 
FROM tbl_setappointment a 
INNER JOIN tbl_services s ON a.booking_id = s.service_id 
INNER JOIN tbl_pets p ON a.pet_id = p.id
WHERE a.status != 'Completed'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $appointments = array();
    while($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
    echo json_encode($appointments);
} else {
    echo json_encode(array());
}

$conn->close();
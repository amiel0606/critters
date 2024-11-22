<?php
include_once './dbCon.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'thisWeek'; 

$sql = "SELECT a.*, s.*, p.* 
        FROM tbl_setappointment a 
        INNER JOIN tbl_services s ON a.booking_id = s.service_id 
        INNER JOIN tbl_pets p ON a.pet_id = p.id 
        WHERE a.status = 'Completed'";

if (!empty($search)) {
    $searchTerm = $conn->real_escape_string($search);
    $sql .= " AND (p.petName LIKE '%$searchTerm%' OR a.ownerName LIKE '%$searchTerm%')";
}

switch ($sort) {
    case 'thisWeek':
        $sql .= " AND WEEK(a.booking_date) = WEEK(CURDATE())";
        break;
    case 'lastWeek':
        $sql .= " AND WEEK(a.booking_date) = WEEK(CURDATE()) - 1";
        break;
    case 'lastMonth':
        $sql .= " AND MONTH(a.booking_date) = MONTH(CURDATE()) - 1 AND YEAR(a.booking_date) = YEAR(CURDATE())";
        break;
    case 'all':
        break;
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $appointments = array();
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
    echo json_encode($appointments);
} else {
    echo json_encode(array());
}

$conn->close();
<?php
include_once './dbCon.php';

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'all';
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$sql = "SELECT a.*, s.*, p.* 
        FROM tbl_setappointment a 
        INNER JOIN tbl_services s ON a.booking_id = s.service_id 
        INNER JOIN tbl_pets p ON a.pet_id = p.id 
        WHERE a.status = 'Active'";

if (!empty($search)) {
    $sql .= " AND (p.petName LIKE '%$search%' OR a.ownerName LIKE '%$search%')";
}

switch ($sort) {
    case 'thisWeek':
        $sql .= " AND WEEK(a.booking_date, 1) = WEEK(CURDATE(), 1) AND YEAR(a.booking_date) = YEAR(CURDATE())";
        break;
    case 'nextWeek':
        $sql .= " AND WEEK(a.booking_date, 1) = WEEK(CURDATE(), 1) + 1 AND YEAR(a.booking_date) = YEAR(CURDATE())";
        break;
    case 'nextMonth':
        $sql .= " AND MONTH(a.booking_date) = MONTH(CURDATE()) + 1 AND YEAR(a.booking_date) = YEAR(CURDATE())";
        break;
    case 'all':
        break; 
    default:
        echo json_encode(array("error" => "Invalid sort option"));
        exit;
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

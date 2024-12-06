<?php
session_start();
include_once './dbCon.php';

$month = isset($_GET['month']) ? intval($_GET['month']) : null;

$query = "
SELECT 
    s.service_id, 
    s.service_name, 
    COUNT(st.booking_id) AS total_bookings 
FROM 
    tbl_setappointment st
INNER JOIN 
    tbl_services s ON st.booking_id = s.service_id 
WHERE 
    st.status = 'Completed' 
";

if ($month) {
    $query .= " AND MONTH(st.booking_date) = $month"; 
}

$query .= "
GROUP BY 
    s.service_id, s.service_name 
ORDER BY 
    total_bookings DESC 
LIMIT 3;
";

$result = $conn->query($query);

$topServices = [];
while ($row = $result->fetch_assoc()) {
    $topServices[] = $row;
}

header('Content-Type: application/json');
echo json_encode($topServices);
$conn->close();
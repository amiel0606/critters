<?php
require_once './dbCon.php'; // Include your database connection

// SQL query to fetch all active appointments
$sql = "SELECT s.*, b.* 
        FROM tbl_setappointment s
        JOIN tbl_bookings b ON s.booking_id = b.id
        WHERE s.status = 'Active'
        ORDER BY s.time DESC";

$stmt = $conn->prepare($sql); // Prepare the SQL statement
$stmt->execute(); // Execute the statement
$result = $stmt->get_result(); // Get the result set

$appointments = []; // Initialize an array to hold the appointments

// Fetch the results and populate the appointments array
while ($row = $result->fetch_assoc()) {
    $appointments[] = [
        'title' => $row['name'], // Assuming 'name' is the title of the appointment
        'start' => $row['booking_date'], // Assuming 'booking_date' is the start date
        'description' => $row['description'], // Additional details if needed
        'ownerName' => $row['ownerName'], // Assuming 'ownerName' is available
        'time' => $row['time'] 
    ];
}

echo json_encode($appointments);

$stmt->close();
$conn->close();
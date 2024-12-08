<?php
header('Content-Type: application/json');
include_once './dbCon.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
$userId = isset($_POST['userId']) ? intval($_POST['userId']) : 0;

$response = [];

if ($action === 'getInfo' && $userId > 0) {
    $customerSql = "
        SELECT 
            u.firstName, 
            u.lastName, 
            u.contact, 
            u.username,
            COUNT(DISTINCT p.id) AS petCount
        FROM 
            tbl_users u
        LEFT JOIN 
            tbl_pets p ON p.owner_ID = u.id
        WHERE 
            u.id = ?
        GROUP BY 
            u.id
    ";

    $stmt = $conn->prepare($customerSql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response['customerInfo'] = $result->fetch_assoc();
    } else {
        $response['customerInfo'] = null;
    }

    $stmt->close();

    $petsSql = "
        SELECT 
            petName, petType, breed, birth_date, gender, color, uniqueness
        FROM 
            tbl_pets
        WHERE 
            owner_ID = ?
    ";

    $stmt = $conn->prepare($petsSql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $petsResult = $stmt->get_result();

    $pets = [];
    while ($pet = $petsResult->fetch_assoc()) {
        $pets[] = $pet;
    }

    $response['pets'] = $pets;
    $stmt->close();

    $bookingSql = "
                SELECT 
                    st.appointment_id AS bookingId, 
                    st.booking_date, 
                    st.booking_id, 
                    st.status,
                    s.service_name 
                FROM 
                    tbl_setappointment st
                INNER JOIN 
                    tbl_services s ON st.booking_id = s.service_id
                WHERE 
                    st.owner_id = ?
    ";

    $stmt = $conn->prepare($bookingSql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $bookingResult = $stmt->get_result();

    $bookings = [];
    while ($booking = $bookingResult->fetch_assoc()) {
        $bookings[] = $booking;
    }

    $response['bookings'] = $bookings;
    $stmt->close();

} else {
    $sql = "
        SELECT 
            p.*, 
            u.id, 
            u.username, 
            u.firstName, 
            u.lastName
        FROM 
            tbl_pets p
        INNER JOIN 
            tbl_users u ON p.owner_ID = u.id
    ";

    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $response = $data;
}

echo json_encode($response);
$conn->close();
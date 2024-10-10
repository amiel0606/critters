<?php
include_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['bookingName'];
    $slot = $_POST['slot'];
    $description = $_POST['description'];

    if (empty($name) || empty($slot) || empty($description)) {
        echo json_encode(['status' => 'error', 'message' => 'Missing fields']);
        exit();
    }

    $sql = "INSERT INTO tbl_bookings (name, slot, description, status) VALUES (?, ?, ?, 'Active')";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo json_encode(['status' => 'error', 'message' => 'Statement preparation failed']);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $name, $slot, $description);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Booking added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }

    mysqli_stmt_close($stmt);
    exit();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
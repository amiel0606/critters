<?php
include_once './dbCon.php';

$bookingID = $_POST['booking_id'];

$targetDir = "uploads/";
$fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$img1 = uniqid('', true) . '-' . time() . '.' . $fileExtension; 

if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $img1)) {
    $sql = "UPDATE tbl_bookings SET img = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../service_booking.php?stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $img1, $bookingID); 
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>alert('Booking added successfully');</script>";
    header("location: ../service_booking.php?error=none");
    exit();
} else {
    echo "<script>alert('Error uploading file');</script>";
    header("location: ../service_booking.php?error=fileUploadFailed");
    exit();
}
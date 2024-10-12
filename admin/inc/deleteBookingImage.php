<?php
include_once './dbCon.php';

if (isset($_POST['bookingID'])) {
    $bookingID = $_POST['bookingID'];

    $query = "UPDATE tbl_bookings SET 
                img = 'No Image Available'
              WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "i", $bookingID);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../service_booking.php");
        echo "<script>alert('Booking updated successfully!');</script>";
    } else {
        header("Location: ../service_booking.php");
        echo '<script>alert("Failed to update booking. Please try again.");</script>';
    }

    mysqli_close($conn);
} else {
    header("Location: ../service_booking.php");
    echo '<script>alert("Invalid request. Please try again.");</script>';
}
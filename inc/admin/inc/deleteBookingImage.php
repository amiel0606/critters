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
        echo "<script> 
        alert('Booking Deleted successfully'); 
        window.location.href='../service_booking.php';
        </script>";
    } else {
        echo "<script> 
        alert('Statement preparation failed'); 
        window.location.href='../service_booking.php';
        </script>";    
    }

    mysqli_close($conn);
} else {
    echo "<script> 
    alert('Statement preparation failed'); 
    window.location.href='../service_booking.php';
    </script>";  
}
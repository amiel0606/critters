<?php
include_once './dbCon.php';

$name = $_POST['bookingName'];
$slot = $_POST['slot'];
$service = $_POST['service'];
$description = $_POST['description'];
$categories = $_POST['categories'];

if (empty($name) || empty($slot) || empty($description)) {
    echo "<script> alert('Missing fields'); </script>";
    exit();
}

$sql = "INSERT INTO tbl_bookings (name, slot, description, categories, service) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "<script> 
    alert('Statement preparation failed'); 
    window.location.href='../service_booking.php';
    </script>";
    exit();
}

$categories_str = implode(',', $categories); 

mysqli_stmt_bind_param($stmt, "sssss", $name, $slot, $description, $categories_str, $service);

if (mysqli_stmt_execute($stmt)) {
    echo "<script> 
    alert('Booking added successfully'); 
    window.location.href='../service_booking.php';
    </script>";
} else {
    echo "<script> 
    alert('Failed to add booking. Contact your administrator.'); 
    window.location.href='../service_booking.php';
    </script>";
}

mysqli_stmt_close($stmt);
exit();
<?php
include_once 'dbCon.php';

$targetDir = "uploads/";
$fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$img = uniqid('', true) . '.' . $fileExtension;
move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $img);

$service_name = $_POST['offer_name'];
$description_name = $_POST['description'];
$price = $_POST['price'];

$sql = "INSERT INTO tbl_services(service_name, service_image, service_description, service_price) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./service_offer.php?stmtFailed");
    exit();
}
mysqli_stmt_bind_param($stmt, "ssss", $service_name, $img, $description_name, $price);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: ../service_offer.php?error=none");
exit();
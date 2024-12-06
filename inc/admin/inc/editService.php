<?php
include_once './dbCon.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceId = $_POST['service_id']; 
    $serviceName = $_POST['edit-service-name'];
    $serviceDescription = $_POST['edit-service-description'];
    $servicePrice = $_POST['edit-service-price'];

    $sqlSelect = "SELECT service_image FROM tbl_services WHERE service_id = ?";
    $stmtSelect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtSelect, $sqlSelect)) {
        header("location: ../service_offer.php?stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmtSelect, "i", $serviceId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $currentImage);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    if (!empty($_FILES['edit-service-image']['name'])) {
        $targetDir = "uploads/";
        $fileExtension = pathinfo($_FILES['edit-service-image']['name'], PATHINFO_EXTENSION);
        $newImageName = uniqid('', true) . '-' . time() . '.' . $fileExtension;

        if (move_uploaded_file($_FILES['edit-service-image']['tmp_name'], $targetDir . $newImageName)) {
            $sqlUpdateImage = "UPDATE tbl_services SET service_image = ? WHERE service_id = ?";
            $stmtUpdateImage = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmtUpdateImage, $sqlUpdateImage)) {
                header("location: ../service_offer.php?stmtFailed");
                exit();
            }

            mysqli_stmt_bind_param($stmtUpdateImage, "si", $newImageName, $serviceId);
            mysqli_stmt_execute($stmtUpdateImage);
            mysqli_stmt_close($stmtUpdateImage);
        } else {
            echo "<script>alert('Error uploading file');</script>";
            header("location: ../service_offer.php?error=fileUploadFailed");
            exit();
        }
    } else {
        $newImageName = $currentImage;
    }

    $sqlUpdateService = "UPDATE tbl_services SET service_name = ?, service_description = ?, service_price = ? WHERE service_id = ?";
    $stmtUpdateService = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtUpdateService, $sqlUpdateService)) {
        header("location: ../service_offer.php?stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmtUpdateService, "ssdi", $serviceName, $serviceDescription, $servicePrice, $serviceId);
    mysqli_stmt_execute($stmtUpdateService);
    mysqli_stmt_close($stmtUpdateService);

    echo "<script>alert('Service updated successfully');</script>";
    header("location: ../service_offer.php?error=none");
    exit();
} else {
    header("location: ../service_offer.php");
    exit();
}
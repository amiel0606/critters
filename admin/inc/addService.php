<?php
include_once './dbCon.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCategory = $_POST['idCategory'];
    $serviceName = $_POST['service_name'];
    $serviceDescription = $_POST['service_description'];
    $servicePrice = $_POST['service_price'];

    $targetDir = "uploads/";
    $fileExtension = pathinfo($_FILES['service_image']['name'], PATHINFO_EXTENSION);
    $img1 = uniqid('', true) . '-' . time() . '.' . $fileExtension;

    if (move_uploaded_file($_FILES['service_image']['tmp_name'], $targetDir . $img1)) {
        $sqlCategory = "SELECT category_name FROM tbl_categories WHERE category_id = ?";
        $stmtCategory = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtCategory, $sqlCategory)) {
            header("location: ../service_offer.php?stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmtCategory, "i", $idCategory);
        mysqli_stmt_execute($stmtCategory);
        mysqli_stmt_bind_result($stmtCategory, $categoryName);
        mysqli_stmt_fetch($stmtCategory);
        mysqli_stmt_close($stmtCategory);

        $sqlInsert = "INSERT INTO tbl_services (service_name, category_id, category_name, service_description, service_price, service_image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsert = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtInsert, $sqlInsert)) {
            header("location: ../service_offer.php?stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmtInsert, "ssssis", $serviceName, $idCategory, $categoryName, $serviceDescription, $servicePrice, $img1);
        mysqli_stmt_execute($stmtInsert);
        mysqli_stmt_close($stmtInsert);

        echo "<script>alert('Service added successfully');</script>";
        header("location: ../service_offer.php?error=none");
        exit();
    } else {
        echo "<script>alert('Error uploading file');</script>";
        header("location: ../service_offer.php?error=fileUploadFailed");
        exit();
    }
} else {
    header("location: ../service_offer.php");
    exit();
}
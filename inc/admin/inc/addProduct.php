<?php
include_once './dbCon.php';

$productName = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$targetDir = "uploads/";
$fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$img1 = uniqid('', true) . '-' . time() . '.' . $fileExtension; 

if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $img1)) {
    $sql = "INSERT INTO tbl_products (name, description, price, image) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../product_offer.php?stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssis", $productName, $description, $price, $img1); 
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>
    alert('Product added successfully');
    window.location.href='../product_offer.php?error=none';
    </script>";
    exit();
} else {
    echo "<script>
    alert('Product Upload Failed');
    window.location.href='../product_offer.php?error=fileUploadFailed';
    </script>";
    exit();
}
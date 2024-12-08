<?php
include_once './dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['id'];

    $sql = "DELETE FROM tbl_products WHERE product_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../products.php?stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
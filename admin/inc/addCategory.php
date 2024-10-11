<?php
include_once 'dbCon.php';



$category = $_POST['category'];
$price = $_POST['price'];
$parent = $_POST['parent'];
$sql = "INSERT INTO tbl_categories(category_name, category_parent, category_price) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ./service_offer.php?stmtFailed");
    exit();
}
mysqli_stmt_bind_param($stmt, "ssi", $category, $parent, $price);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: ../service_offer.php?error=none");
exit();
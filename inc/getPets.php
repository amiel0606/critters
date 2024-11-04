<?php
session_start();
require_once '../admin/inc/dbCon.php';


$query = "SELECT * FROM tbl_pets WHERE owner_id = " . $_SESSION['id'];
$result = mysqli_query($conn, $query);

$pets = array();

while ($row = mysqli_fetch_assoc($result)) {
  $pets[] = array(
    "name" => $row["petName"],
    "type" => $row["petType"],
    "breed" => $row["breed"],
    "birthdate" => $row["birth_date"],
    "gender" => $row["gender"],
    "id" => $row["id"],
    "img" => $row["img"]
  );
}

mysqli_close($conn);

echo json_encode($pets);
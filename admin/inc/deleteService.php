<?php
require_once 'dbCon.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_services WHERE service_id = '$id'";
    $conn->query($sql);
}
<?php
require_once 'dbCon.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_categories WHERE offer_id = '$id'";
    $conn->query($sql);
}
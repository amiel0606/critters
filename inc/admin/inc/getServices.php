<?php
require_once 'dbCon.php';

function getOffers() {
    global $conn;
    $sql = "SELECT * FROM tbl_services";
    $result = $conn->query($sql);
    $offers = array();
    while ($row = $result->fetch_assoc()) {
        $offers[] = $row;
    }
    return json_encode($offers);
}

echo getOffers();
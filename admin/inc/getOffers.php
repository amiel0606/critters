<?php

function getOffers() {
    require_once 'dbCon.php';
    $sql = "SELECT * FROM tbl_offers";
    $result = $conn->query($sql);
    $offers = array();
    while ($row = $result->fetch_assoc()) {
        $offers[] = $row;
    }
    return json_encode($offers);
}

echo getOffers();
<?php
require_once 'dbCon.php';

function getOtherTableData() {
    global $conn;
    $sql = 'SELECT s.*, o.* FROM tbl_services s INNER JOIN tbl_offers o ON 1 = 1'; 
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return json_encode($data);
}

echo getOtherTableData();
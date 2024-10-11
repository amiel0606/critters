<?php
require_once 'dbCon.php';

function getOtherTableData() {
    global $conn;
    $sql = 'SELECT * FROM tbl_categories'; 
    $result = $conn->query(query: $sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return json_encode($data);
}

echo getOtherTableData();